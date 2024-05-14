<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryItem;

class CategoryItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sneaker_categories = [1,5,9];
        foreach($sneaker_categories as $sneaker_category){
            CategoryItem::create([
                'item_id' => 1,
                'category_id' => $sneaker_category,
            ]);
        }

        $hat_categories = [1,4];
        foreach($hat_categories as $hat_category){
            CategoryItem::create([
                'item_id' => 2,
                'category_id' => $hat_category,
            ]);
        }

        $glasses_categories = [1,12];
        foreach ($glasses_categories as $glasses_category) {
            CategoryItem::create([
                'item_id' => 3,
                'category_id' => $glasses_category,
            ]);
        }

        $tv_categories = [2,3];
        foreach ($tv_categories as $tv_category) {
            CategoryItem::create([
                'item_id' => 4,
                'category_id' => $tv_category,
            ]);
        }


        $wallet_categories = [1,5,12];
        foreach ($wallet_categories as $wallet_category) {
            CategoryItem::create([
                'item_id' => 5,
                'category_id' => $wallet_category,
            ]);
        }

        $earrings_categories = [1,4,12];
        foreach ($earrings_categories as $earrings_category) {
            CategoryItem::create([
                'item_id' => 6,
                'category_id' => $earrings_category,
            ]);
        }
    }
}
