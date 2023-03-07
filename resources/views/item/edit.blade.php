<!-- 新規作成 -->
@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')

<h1>商品編集</h1>
@stop

@section('content')
<a href="/items">商品一覧に戻る</a>

<p>詳細
        <textarea name="detail" class="form-control" cols="30" rows="10">{{$item->detail}}</textarea>
        </p>

        <button type="submit" class="btn btn-info">更新</button>
    <input type="hidden" name="id" value="{{$item->id}}">
    </form>

    <br>
    <form action="/item/delete" method="post">

    @csrf
    <input type="hidden" name="id" value="{{$item->id}}">
    <button type="submit" class="btn btn-danger">削除</button> 
    </form>
@stop

@section('css')
@stop

@section('js')
@stop
