@extends('adminlte::page')

@section('title', 'ユーザー編集')

@section('content_header')
    <h1>ユーザー編集</h1>
@stop

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('users.update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="form-group">
            <label for="name">名前（フルネーム）</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_confirmation">パスワード（確認）</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        <label for="role">権限</label>
        <td><input type="radio" name="role" value="1" @if ($user->role == 1) checked @endif required>管理者</td></td>
        <td><input type="radio" name="role" value="0" @if ($user->role == 0) checked @endif required>利用者</td></td> 
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
    <form method="POST" action="{{ route('users.delete') }}">
    @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <button type="submit" class="btn btn-secondry">削除</button> 
    </form>

@stop
