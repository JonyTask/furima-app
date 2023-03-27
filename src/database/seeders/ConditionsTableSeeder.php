<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'condition' => '良好'
        ];
        Condition::create($param);
        $param = [
            'condition' => '目立った傷や汚れなし'
        ];
        Condition::create($param);
        $param = [
            'condition' => 'やや傷や汚れあり'
        ];
        Condition::create($param);
        $param = [
            'condition' => '状態が悪い'
        ];
        Condition::create($param);
    }
}
