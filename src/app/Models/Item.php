<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'price',
        'description',
        'img_url',
        'user_id', 
        'condition_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function condition()
    {
        return $this->belongsTo('App\Models\Condition');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function categoryItem()
    {
        return $this->hasMany('App\Models\CategoryItem');
    }

    public function categories()
    {
        // $categories_items = CategoryItem::where('item_id', $this->id)->get();
        // $categories = [];
        // foreach ($categories_items as $category_item){
        //     $category = Category::find($category_item->category_id);
        //     array_push($categories, $category);
        // }

        $categories = $this->categoryItem->map(function ($item) {
            return $item->category;
        });
        return $categories;
    }

    public function liked()
    {
        return Like::where(['item_id' => $this->id, 'user_id' => Auth::id()])->exists();
    }

    public function likeCount()
    {
        return Like::where('item_id', $this->id)->count();
    }

    public function getComments(){
        $comments = Comment::where('item_id', $this->id)->get();
        return $comments;
    }

    public function sold(){
        return SoldItem::where('item_id',$this->id)->exists();
    }

    public function mine(){
        return $this->user_id == Auth::id();
    }

    public static function scopeItem($query, $item_name){
        return $query->where('name', 'like', '%'.$item_name.'%');
    }

}
