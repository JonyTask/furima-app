<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'category' => 'ファッション'
        ];
        Category::create($param);
        $param = [
            'category' => '家電'
        ];
        Category::create($param);
        $param = [
            'category' => 'インテリア'
        ];
        Category::create($param);
        $param = [
            'category' => 'レディース'
        ];
        Category::create($param);
        $param = [
            'category' => 'メンズ'
        ];
        Category::create($param);
        $param = [
            'category' => 'コスメ'
        ];
        Category::create($param);
        $param = [
            'category' => '本'
        ];
        Category::create($param);
        $param = [
            'category' => 'ゲーム'
        ];
        Category::create($param);
        $param = [
            'category' => 'スポーツ'
        ];
        Category::create($param);
        $param = [
            'category' => 'キッチン'
        ];
        Category::create($param);
        $param = [
            'category' => 'ハンドメイド'
        ];
        Category::create($param);
        $param = [
            'category' => 'アクセサリー'
        ];
        Category::create($param);
        $param = [
            'category' => 'おもちゃ'
        ];
        Category::create($param);
        $param = [
            'category' => 'ベビー・キッズ'
        ];
        Category::create($param);
    }
}
