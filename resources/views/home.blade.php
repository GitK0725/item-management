@extends('adminlte::page')

@section('title', 'サッカー用具専門店')
<input class="block-global-search--keyword js-suggest-search keyword_ sample" type="text" value="" tabindex="1" id="keyword" placeholder="キーワードを入力" title="商品を検索する" name="keyword" data-suggest-submit="on" autocomplete="off">
@section('content_header')
    <h1>サッカー用具専門店</h1>
@stop

@section('content')
    <p>ようこそ</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

