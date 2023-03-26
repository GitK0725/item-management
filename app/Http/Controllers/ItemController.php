<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        return view('items.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id=1,
                'name' => $request->name,
                'status'=> $request->status,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('items.add');
    }
    public function edit(Request $request)
    {
        $item=Item::find($request->id);
        return view('items.edit',['item'=>$item]);

    }

    public function update(Request $request)
    {
        $item=Item::find($request->id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'edetail' => $request->detail,
        ]);
        return redirect('/items');
    }

    public function delete(Request $request)
        {
        $item=Item::find($request->id)->delete();
        return redirect('/items');
    }
}
