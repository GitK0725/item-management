@extends('adminlte::page')

@section('title', 'ユーザー編集')

@section('content_header')
<H1>ユーザー編集</H1>
@stop

@section('content')
登録番号：{{ $user->id }}
  <form action="/user/update" method="post">
   <table class="table">
   @csrf
    <tr>
     <th scope="col">氏名</th>
     <td><input type="text" name="name" value="{{ $user->name }}"  required></td>
    </tr>
    <tr>
     <th scope="col">権限</th>
     <td><input type="radio" name="role" value="1" @if ($user->role == 1) checked @endif required>管理者</td></td>
     <td><input type="radio" name="role" value="0" @if ($user->role == 0) checked @endif required>利用者</td></td> 
    </tr>
    <tr>
     <th scope="col">メールアドレス</th>
     <td><input type="email" name="email" value="{{ $user->email }}" required></td></td>

    </tr>
   </table>
   <input class="btn btn-secondary" type="submit" value="更新">
  <input type="hidden" name="id" value="{{ $user->id }}">

  <a class="btn btn-secondary" href="/user/delete/{{ $user->id }}">削除</a>
@stop

@section('css')
@stop

@section('js')
@stop