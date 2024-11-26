<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\Profile;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    //会員情報登録
    public function test_register_user(){
        $response = $this->post('/register',[
            'name' => "テストユーザ",
            'email' => "test@gmail.com",
            'password' => "password",
            'password_confirmation' => "password",
        ]);

        $response->assertRedirect('/mypage/profile');
        $this->assertDatabaseHas( User::class, [
            'name' => "テストユーザ",
            'email' => "test@gmail.com",
        ]);
    }

    //ログイン機能
    public function test_login_user(){
        $user = User::find(2);

        $response = $this->post('/login', [
            'email' => "general2@gmail.com",
            'password' => "password",
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    //ログアウト機能
    public function test_logout_user(){
        $user = User::find(1);
        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    //ユーザ情報取得
    public function test_get_profile(){
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/mypage/profile');

        $response->assertSeeInOrder([
            '一般ユーザ1',
            '1080014',
            '東京都港区芝5丁目29-20610',
            'クロスオフィス三田'
        ]);
    }

    //ユーザ情報変更
    public function test_change_profile(){
        $user = User::find(1);
        $response = $this->actingAs($user)->post('/mypage/profile',[
            'name' => "変更後ネーム",
            'postcode' => "1110032",
            'address' => "東京都台東区浅草2-3-1",
            'building' => "浅草寺",
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas( Profile::class, [
            'user_id' => 1,
            'postcode' => "1110032",
            'address' => "東京都台東区浅草2-3-1",
            'building' => "浅草寺",
        ]);
    }

    //出品情報登録
    public function test_listing_item(){
        $user = User::find(1);

        Storage::fake('local');
        $image = UploadedFile::fake()->create('test_item.png', 150);

        $response = $this->actingAs($user)->post('/sell',[
            'img_url' => $image,
            'categories' => [2,3,4],
            'condition_id' => 4,
            'name' => "テストアイテム",
            'description' => "テストテストテストテスト",
            'price' => 5000,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas( Item::class, [
            'name' => "テストアイテム",
            'price' => 5000,
            'description' => "テストテストテストテスト",
            'user_id' => 1,
            'condition_id' => 4,
        ]);

        Storage::disk('local')->assertExists('public/img/'.$image->hashName());
    }
}