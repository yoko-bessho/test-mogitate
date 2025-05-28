@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection


@section('content')
<div class="product-create">
    <form class="product-form" action="" method="POST">
        @csrf
        <h3 class="page-title">商品登録</h3>
        <div class="form-group">
            <label class="form-label" for="name">
                商品名 <span class="required">必須</span>
            </label>
            <input class="form-input" type="text" name="name"  value="キウイなど">
            <div class="error-message">エラー表示</div>
            <!-- @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror -->
        </div>
        
        <div class="form-group">
            <label class="form-label" for="price">
                値段 <span class="required">必須</span>
            </label>
            <input class="form-input" type="text"  name="price"  value="600">
            <div class="error-message">エラー表示</div>
            <!-- @error('price')
                <span class="error-message">{{ $message }}</span>
            @enderror -->
        </div>
        
        <div class="form-group">
            <label class="form-label" for="image">
                商品画像 <span class="required">必須</span>
            </label>
            <div>ファイル選択ボタン入れる</div>
            <div class="error-message">エラー表示</div>
            <!-- @error('image')
                <span class="error-message">{{ $message }}</span>
            @enderror -->
        </div>
        
        <div class="form-group">
            <label class="form-label">
                季節 <span class="required">必須</span> <span class="multiple-select">複数選択可</span>
            </label>
            <div class="season-checkboxes">
                <div>季節選択ボックス入れる</div>
            </div>
            <div class="error-message">エラー表示</div>
            <!-- @error('seasons')
                <span class="error-message">{{ $message }}</span>
            @enderror -->
        </div>
        
        <div class="form-group">
            <label class="form-label" for="description" >
                商品説明 <span class="required">必須</span>
            </label>
            <textarea class="form-textarea" name="description" rows="5">テキスト入力画面</textarea>
            <div class="error-message">エラー表示</div>
            <!-- @error('description')
                <span class="error-message">{{-- $message --}}</span>
            @enderror -->
        </div>
        
        <div class="form-actions">
            <a href="" class="button button-back">戻る</a>
            <button type="submit" class="button button-submit">登録</button>
        </div>
    </form>
</div>
@endsection