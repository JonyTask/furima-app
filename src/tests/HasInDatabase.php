<?php

namespace Tests;

use Illuminate\Testing\Constraints\HasInDatabase as PackageHasInDatabase;

/**
 * このクラスはテストで実行されるassertionHasDatabaseメソッドの仕様を一部変更するためのものです。
 * 日本語部分がエンコードされてしまうため、それを回避しています。
 * 親クラスである元のクラスを継承したうえで、プロバイダでバインドしているため、編集されたこのファイルが呼び出されるという仕組みです。
*/

class HasInDatabase extends PackageHasInDatabase
{
    public function failureDescription($table): string
    {
        return sprintf(
            "a row in the table [%s] matches the attributes %s.\n\n%s",
            $table,
            $this->toString(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            $this->getAdditionalInfo($table)
        );
    }

    protected function getAdditionalInfo($table)
    {
        $query = $this->database->table($table);

        $similarResults = $query->where(
            array_key_first($this->data),
            $this->data[array_key_first($this->data)]
        )->limit($this->show)->get();

        if ($similarResults->isNotEmpty()) {
            $description = 'Found similar results: ' . json_encode($similarResults, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            $query = $this->database->table($table);

            $results = $query->limit($this->show)->get();

            if ($results->isEmpty()) {
                return 'The table is empty.';
            }

            $description = 'Found: ' . json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

        if ($query->count() > $this->show) {
            $description .= sprintf(' and %s others', $query->count() - $this->show);
        }

        return $description;
    }

}