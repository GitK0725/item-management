<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        echo "index";
    }

    public function form(Request $request)
    {
        echo "form";
    }

    public function edit(Request $request)
    {
        echo $request->id;
    }
}