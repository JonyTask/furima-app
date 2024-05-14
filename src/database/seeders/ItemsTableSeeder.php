<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Condition;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'スニーカー',
            'price' => 8000,
            'description' => '3ヶ月ほど履いたスニーカーです。そこまで履いていないため、比較的状態は良いです。',
            'img_url' => 'public/img/sneaker.jpeg',
            'user_id' => 2,
            'condition_id' => Condition::$HARMLESS,
        ];
        Item::create($param);

        $param = [
            'name' => '帽子',
            'price' => 3200,
            'description' => '6ヶ月ほど前に買いました。ほとんど使用していません。',
            'img_url' => 'public/img/hat.jpeg',
            'user_id' => 2,
            'condition_id' => Condition::$UNUSED,
        ];
        Item::create($param);

        $param = [
            'name' => 'メガネ',
            'price' => 1000,
            'description' => '1年以上使用しました。度は左右-1.75です。',
            'img_url' => 'public/img/glasses.jpeg',
            'user_id' => 2,
            'condition_id' => Condition::$BAD_CONDITION,
        ];
        Item::create($param);

        $param = [
            'name' => 'テレビ',
            'price' => 10000,
            'description' => '2年ほど使用しました。画面は32インチです。',
            'img_url' => 'public/img/TV.jpeg',
            'user_id' => 2,
            'condition_id' => Condition::$HARMED,
        ];
        Item::create($param);

        $param = [
            'name' => '財布',
            'price' => 4000,
            'description' => '半年ほど使用しました。傷はありません。',
            'img_url' => 'public/img/wallet.jpeg',
            'user_id' => 2,
            'condition_id' => Condition::$HARMLESS,
        ];
        Item::create($param);

        $param = [
            'name' => 'イアリング',
            'price' => 8000,
            'description' => '2ヶ月ほど前に海外で購入しました。ブランド品です。未使用です。',
            'img_url' => 'public/img/earrings.jpeg',
            'user_id' => 2,
            'condition_id' => Condition::$UNUSED,
        ];
        Item::create($param);
    }
}
