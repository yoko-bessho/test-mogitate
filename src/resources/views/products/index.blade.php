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
            <form action="{{ route('products.search') }}" method="GET">
                <input
                class="search-input"
                type="text"
                name="keyword"
                placeholder="商品名で検索"
                value="{{ request('keyword') }}" >

                @php
                $label="検索";
                @endphp
                <x-button :label="$label" />

                <div class="sort-section">
                    <p class="price-order">価格順で表示</p>
                    <select name="price" class="sort-select" aria-label="価格順">
                        <option class="option-disabled" disabled {{ request('price') ? '' : 'selected' }}>価格で並び替え</option>
                        <option value="price_asc" {{ request('price') === 'price_asc' ? 'selected' : '' }}>安い順に表示</option>
                        <option value="price_desc" {{ request('price') === 'price_desc' ? 'selected' : '' }}>高い順に表示</option>
                    </select>
                </div>

                <div class="sort-clear__button-wrapper">
                @php
                    $price = request()->input('price');
                    $resetLabel = '価格で並びかえ';

                    if ($price === 'price_asc') {
                        $resetLabel = '高い順に表示';
                    } elseif ($price === 'price_desc') {
                        $resetLabel = '安い順に表示';
                    }
                @endphp
                    <input class="sort-clear__button" type="submit" name="reset_search" value="{{ $resetLabel }}         ✖️">
                </div>
            </form>
        </div>

        <div class="card-container">

            @foreach ($products as $product)
                <a href="{{ route('products.edit', $product->id) }}" class="card-link">
                <x-image-card
                :src="asset($product->image)"
                :alt="$product->name" :name="$product->name" :price="$product->price" />
                </a>
            @endforeach
        </div>
    </div>
    <div>
    {{ $products->links('vendor.pagination.product-pagenate') }}
    </div>
</div>
@endsection