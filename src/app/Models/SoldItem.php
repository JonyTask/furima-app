<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldItem extends Model
{
    use HasFactory;

    protected $primaryKey = ['user_id', 'item_id'];
    
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'item_id'
    ];
}
