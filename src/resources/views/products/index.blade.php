@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
<div class="products-index">
    <div class="page-header">
        <h2 class="page-title">商品一覧</h2>
        <x-link-button href="/products/register" />
    </div>

    <div class="search-container">
        <div class="search-section">
            <form action="/products/register" method="GET">
            @csrf
                <input
                class="search-input"
                type="text"
                name="name"
                placeholder="商品名で検索"
                value="" >

                @php
                $label="検索";
                @endphp
                <x-button :label="$label" />
            </form>

            <div class="sort-section">
                <p>価格順で表示</p>
                <x-select-box/>
            </div>
        </div>

        <div class="card-container">

            @foreach ($products as $product)
                <a href="/products/{{ $product->id }}/edit" class="card-link">
                <x-image-card
                :src="asset($product->image)"
                :alt="$product->name" :name="$product->name" :price="$product->price" />
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection