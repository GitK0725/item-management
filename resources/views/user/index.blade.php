@extends('adminlte::page')

@section('title', 'ユーザー一覧')

@section('content_header')
    <h1>ユーザー一覧</h1>
@stop

@section('content')
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>権限</th>
            <th>作成日</th>
            <th>更新日</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            @if(Auth::user()->role == 1)
            <td><a class="btn btn-primary" href="/users/edit/{{ $user->id }}">編集</a></td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
@stop

@section('js')
@stop