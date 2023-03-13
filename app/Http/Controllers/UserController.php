<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $rows=User::all();
        return view('user.index',['rows'=>$rows]);
    }

    public function update(Request $request)
    {
        $user=User::find($request->id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
        ]);
    
    //登録処理後、一覧画面に遷移する
    return redirect('/user');
    }

    public function edit(Request $request)
    {
        $user=User::find($request->id);
        return view('user.edit',['user'=>$user]);
    }
    // 削除のコマンド
    public function delete(Request $request)
    {
        $user=User::find($request->id)->delete();

        return redirect('/user');
    }
}

