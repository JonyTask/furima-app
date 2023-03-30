<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;


class PurchaseController extends Controller
{
    public function index(Item $item){
        $user = User::find(Auth::id());
        return view('purchase',compact('item','user'));
    }
}
