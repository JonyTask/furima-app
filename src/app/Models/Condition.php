<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    public static $UNUSED = 1;
    public static $HARMLESS = 2;
    public static $HARMED = 3;
    public static $BAD_CONDITION = 4;
    
    protected $fillable = [
        'condition', 
    ];
}
