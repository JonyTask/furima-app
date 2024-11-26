<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\SoldItem;

class PurchaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $param = $request->route()->parameter('item_id');

        $item = Item::find($param);
        if($item->user_id == Auth::id()){
            return redirect()->route('item.detail',['item' => $request->item_id])->with('flash_alert', '出品者が購入することはできません');
        }

        return $next($request);
    }
}
