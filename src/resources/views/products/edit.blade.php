@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="edit-container">
    <div class="edit-container__inner">
        <a class="detail" href="#">商品一覧</a> &gt;{{ $product->name }}

        <form class="edit-form" method="POST" action="/products/{{ $product->id }}/update" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form__inner">
                <!-- 左カラム：画像・ファイル選択・商品説明 -->
                <div class="image-file">
                    <x-image-card
                    :src="'/storage/' . $product->image"
                    :alt="$product->name"
                    :name="$product->name"
                    :price="$product->price"/>
                    <label class="select-file__label">ファイルを選択</label>
                    <input
                    class="select-file__input" type="file"
                    name="image">
                    <input
                    type="hidden"
                    name="current_image"
                    value="{{  old('image', $product->image) }}">
                    @if ($product->image)
                    <span class="current-image">{{ basename($product->image) }}</span>
                    @endif
                    @error('image')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 右カラム：商品名・値段・季節 -->
                <div class="product-information">
                    <div class="form-groupe">
                        <label for="name">商品名</label><br>
                        <input
                        class="form-input"
                        type="text"
                        name="name"
                        id="name"
                        placeholder="商品名を入力"
                        value="{{ old('name', $product->name) }}">
                        @error('name')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-groupe">
                        <label for="price">値段</label><br>
                        <input
                        class="form-input"
                        type="text"
                        name="price"
                        id="price"
                        placeholder="値段を入力"
                        value="{{ old('price', $product->price) }}">
                        @error('price')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-groupe">
                        <label>季節</label><br>
                        <label class="seasons-checkbox">
                        <input type="checkbox" name="season_id[]" value="1" {{ in_array(1, $productSeasonIds) ? 'checked' : '' }}>春</label>

                        <label class="seasons-checkbox">
                        <input type="checkbox" name="season_id[]" value="2" {{ in_array(2, $productSeasonIds) ? 'checked' : '' }}>夏</label>

                        <label class="seasons-checkbox">
                        <input type="checkbox" name="season_id[]" value="3" {{ in_array(3, $productSeasonIds) ? 'checked' : '' }}>秋</label>

                        <label class="seasons-checkbox">
                        <input type="checkbox" name="season_id[]" value="4" {{ in_array(4, $productSeasonIds) ? 'checked' : '' }}>冬</label>


                        @error('seasons')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="product-description">
                <label for="description">商品説明</label><br>
                <textarea class="product-description__textarea" name="description"
                id="description"
                rows="4"
                placeholder="商品の説明を入力">
                {{ old('description', $product->description) }}
                </textarea>
                @error('description')
                <p class="error-message">{{-- $message --}}</p>
                @enderror
            </div>

            <div class="form-button">
                <a class="back-button" href="/products">戻る</a>
                <button class="edit-button__submit" type="submit">変更を保存</button>
            </div>
        </form>
    </div>
</div>
@endsection
