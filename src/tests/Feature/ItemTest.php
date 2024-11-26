<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    //商品一覧
    public function test_get_items()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewHas('items', Item::all());
    }

    //mylist取得
    public function test_get_mylist(){
        $user = User::find(1);

        $response = $this->actingAs($user)->get('/?page=mylist');
        $expected_data = [
            'name' => '腕時計',
            'price' => 15000,
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'img_url' => 'public/img/mens_clock.jpg',
            'user_id' => 2,
            'condition_id' => 1,
        ];

        $response->assertStatus(200);
        $response->assertViewHas('items',
        function ($items) use ($expected_data) {
            return $items[0]->name === $expected_data['name']
                && $items[0]->price === $expected_data['price']
                && $items[0]->description === $expected_data['description']
                && $items[0]->img_url === $expected_data['img_url']
                && $items[0]->user_id === $expected_data['user_id']
                && $items[0]->condition_id === $expected_data['condition_id'];
        });
    }

    //商品検索
    public function test_search_item(){
        $response = $this->get('/item?search_item=ノートPC');
        $expected_data = [
            'name' => 'ノートPC',
            'price' => 45000,
            'description' => '高性能なノートパソコン',
            'img_url' => 'public/img/laptop_PC.jpg',
            'user_id' => 2,
            'condition_id' => 1,
        ];

        $response->assertStatus(200);
        $response->assertViewHas('items', function($items) use ($expected_data) {
            return $items[0]->name === $expected_data['name'] 
                && $items[0]->price === $expected_data['price']
                && $items[0]->description === $expected_data['description']
                && $items[0]->img_url === $expected_data['img_url']
                && $items[0]->user_id === $expected_data['user_id']
                && $items[0]->condition_id === $expected_data['condition_id'];
        });
    }

    //商品詳細情報取得
    public function test_item_detail(){
        $response = $this->get('/item/1');
        $item = Item::find(1);

        $response->assertStatus(200);
        $response->assertSeeInOrder([
            $item->name,
            number_format($item->price),
            $item->description,
            $item->condition->condition,
        ]);
    }

    //いいね機能
    public function test_like_item(){
        $user = User::find(1);
        $response = $this->actingAs($user)->post('/item/like/4');

        $response->assertStatus(302);
        $this->assertDatabaseHas('likes', [
            'user_id' => 1,
            'item_id' => 4
        ]);
    }

    //コメント送信機能
    public function test_add_comment(){
        $user = User::find(1);
        $response = $this->actingAs($user)->post('/item/comment/1',[
            'comment' => 'テストコメント'
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('comments',[
            'user_id' => 1,
            'item_id' => 1,
            'comment' => 'テストコメント'
        ]);
    }
} 