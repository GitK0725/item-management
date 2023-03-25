@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('items.update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <div class="form-group">
            <label for="name">商品名</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
        </div>
        <div class="form-group">
            <label for="type">種別</label>
            {{-- <input type="number" name="type" id="type" class="form-control" value="{{ $item->type }}"> --}}
            <select class="form-control" name="type" required>
                <option value="1" @if($item->type== 1) selected @endif >ボール</option>
                <option value="2" @if($item->type== 2) selected @endif >ウェア</option>
                <option value="3" @if($item->type== 3) selected @endif >シューズ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="detail">詳細</label>
            <input type="text" name="detail" id="detail" class="form-control" value="{{ $item->detail }}">
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
    <form method="post" action="{{ route('items.delete') }}">
    
    @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <button type="submit" class="btn btn-secondry">削除</button>
    </form>


    <!-- <td>
	@if(Auth::user(1)->id === $item->user_id)
	<form method="POST" action="/item{{ $item->id }}">
	@method('delete')
	@csrf
	<button type="submit" class="btn btn-danger">削除</button>
	</form>
	@endif
</td> -->
@stop