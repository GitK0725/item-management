<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class SearchController extends Controller
{
/**
     * 商品一覧画面の表示
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        //dd($request);

        $query = item::where('items.status', 'LIKE', 'active');

        // カテゴリ（type）の検索
        if (!empty($category)) {
            $query->where('type', "$category");
        }

        if(!empty($keyword)) {
            // typeとkeyword検索のandをするため変更
            $query->where(function($query) use($keyword){
                $query->where('name', 'LIKE', '%'. $keyword .'%')
                ->orWhere('detail', 'LIKE', '%'. $keyword .'%');
            });
        }
        $items = $query->get();
        
        $reccount = 0;
        //dd(count($items));
        if(empty($keyword) && count($items) == 0)
        {}
        
        elseif(!empty($keyword) && count($items) == 0){
            if(count(item::limit(1)->get()) >0 ){$reccount = 1;}
            else{$reccount = 0;}
        } 
        
        else{$reccount = 1;}

        return view('search.index', compact('reccount', 'items', 'keyword', 'category')); 
    }

    /**
     * 商品情報画面の表示
     */
    public function show($id)
    {
        $iteminfo = item::find($id);
        $items = item::get();
        return view('search.show',[
            'items' =>$items
        ])->with('item',$iteminfo);
    }
    
}