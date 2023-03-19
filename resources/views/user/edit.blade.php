@extends('adminlte::page')

@section('title', 'ユーザー編集')

@section('content_header')
    <h1>ユーザー編集</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('users.update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        <label for="role">role</label>
        <td><input type="radio" name="role" value="1" @if ($user->role == 1) checked @endif required>管理者</td></td>
        <td><input type="radio" name="role" value="0" @if ($user->role == 0) checked @endif required>利用者</td></td> 
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
        <a class="btn btn-secondary" href="/user/delete/{{ $user->id }}">削除</a>
    </form>
@stop
