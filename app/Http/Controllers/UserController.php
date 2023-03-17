<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
    
        return view('user.index', ['users' => $users]);
    }

    public function edit(Request $request)
    {
        $user=User::find($request->id);
        return view('user.edit',['user'=>$user]);
    }
    public function update(Request $request)
    {
        $user=User::find($request->id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
        ]);
        return redirect('/users');
    }

        public function delete(Request $request)
        {
            $user=User::find($request->id)->delete();
            return redirect('/user');
    }

}