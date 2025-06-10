@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection


@section('content')
<div class="product-create">
    <form class="product-form" action="/products/register" enctype="multipart/form-data" method="POST">
        @csrf
        <h3 class="page-title">商品登録</h3>

        <div class="form-group">
            <label class="form-label" for="name">
                商品名 <span class="required">必須</span>
            </label>
            <input
            class="form-input"
            type="text"
            name="name"
            value="{{ old('name')}}">
            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label" for="price">
                値段 <span class="required">必須</span>
            </label>
            <input
            class="form-input"
            type="text"
            name="price"
            value="{{ old('price') }}">
            @error('price')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label" for="image">
                商品画像 <span class="required">必須</span>
            </label>
            <input
            class="select-file__input"
            type="file"
            name="image" >
            @error('image')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label">
                季節 <span class="required">必須</span> <span class="multiple-select">複数選択可</span>
            </label>
            <div class="season-checkboxes">
                <x-checkbox
                productSeasonIds="old('season_id')"
                />
            </div>
            @error('seasons')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label" for="description" >
                商品説明 <span class="required">必須</span>
            </label>
            <textarea class="form-textarea" name="description" rows="5">{{ old('description') }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="form-actions">
            <a href="/products" class="button button-back">戻る</a>
            <button type="submit" class="button button-submit">登録</button>
        </div>
    </form>
</div>
@endsection