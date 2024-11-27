<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Like;
use App\Models\Category;
use App\Models\Condition;
use App\Models\CategoryItem;

class ItemController extends Controller
{
    protected $previous_query;

    public function __construct()
    {
        $this->previous_query = $this->getPreviousQuery();
    }

    public function index(Request $request){
        if ($request->page == 'mylist'){
            if ($this->previous_query !== null){
                $items = Like::where('user_id', Auth::id())
                    ->whereHas('item', function ($query) {
                        $query->where('name', 'like', '%' . $this->previous_query . '%');
                    })
                    ->get()
                    ->map(function ($like_item) {
                        return $like_item->item;
                    });
            }else{
                $items = Like::where('user_id', Auth::id())->get()->map(function ($like_item) {
                    return $like_item->item;
                });
            }
        }else {
            $items = Item::where('user_id', '<>', Auth::id())->get();
        }
        return view('index',compact('items'));
    }
    
    public function detail(Item $item){
        return view('detail', compact('item'));
    }
    
    public function search(Request $request){
        $search_word = $request->search_item;
        $query = Item::query();
        $query = Item::scopeItem($query, $search_word);
        
        $items = $query->get();
        return view('index', compact('items'));
    }
    
    public function sellView(){
        $categories = Category::all();
        $conditions = Condition::all();
        return view('sell',compact('categories', 'conditions'));
    }
    
    public function sellCreate(ItemRequest $request){
        
        $img = $request->file('img_url');
        
        try {
            //code...
            $img_url = Storage::disk('local')->put('public/img', $img);
        } catch (\Throwable $th) {
            throw $th;
        }
        
        $item = Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'img_url' => $img_url,
            'condition_id' => $request->condition_id,
            'user_id' => Auth::id(),
        ]);
        
        foreach ($request->categories as $category_id){
            CategoryItem::create([
                'item_id' => $item->id,
                'category_id' => $category_id
            ]);
        }
        
        return redirect()->route('item.detail',['item' => $item->id]);
    }
    
    //mylist表示前の検索クエリを取得
    private function getPreviousQuery() : ?string
    {
        $previousUrl = url()->previous();
        $previousQueryParams = [];
        parse_str(parse_url($previousUrl, PHP_URL_QUERY), $previousQueryParams);
        return isset($previousQueryParams['search_item']) ? $previousQueryParams['search_item'] : null;
    }
}
