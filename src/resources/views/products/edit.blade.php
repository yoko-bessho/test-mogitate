@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="edit-container">
    <div class="edit-container__inner">
        <a class="detail" href="#">商品一覧</a> &gt; キウイ

        <form class="edit-form" method="POST" action="#" enctype="multipart/form-data">
            {{-- @csrf --}}

            <div class="form__inner">
                <!-- 左カラム：画像・ファイル選択 -->
                <div class="image-file">
                    <label class="select-file__label">ファイルを選択</label>
                    <input
                    class="select-file__input" type="file"
                    name="image">
                    {{-- ここにバリデーションエラーがあれば下記を表示 --}}
                    <div class="error-massage">商品画像を登録してください</div>
                    <div class="error-massage">
                        「.png」または「.jpeg」形式でアップロードしてください
                    </div>
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
                        placeholder="商品名を入力">
                        <div class="error-massage">商品名を入力してください</div>
                    </div>
                    <div class="form-groupe">
                        <label for="price">値段</label><br>
                        <input
                        class="form-input"
                        type="number"
                        name="price"
                        id="price"
                        placeholder="値段を入力">
                        <div class="error-massage">
                            値段を入力してください<br>
                            数値で入力してください<br>
                            0-10000円以内で入力してください
                        </div>
                    </div>
                    <div class="form-groupe">
                        <label>季節</label><br>
                        <label class="seasons-checkbox">
                          <input type="checkbox" name="season" value="1">春</label>
                        <label class="seasons-checkbox">
                          <input type="checkbox" name="season" value="2">夏</label>
                        <label class="seasons-checkbox">
                          <input type="checkbox" name="season" value="3">秋</label>
                        <label class="seasons-checkbox">
                          <input type="checkbox" name="season" value="4">冬</label>
                        <div class="error-message">季節を選択してください</div>
                    </div>
                </div>
            </div>

            <!-- 商品説明 -->
            <div class="product-description">
                <label for="description">商品説明</label><br>
                <textarea class="product-description__textarea" name="description"
                id="description"
                rows="4"
                placeholder="商品の説明を入力">
                </textarea>
                <div class="error-message" >
                    商品説明を入力してください<br>
                    120文字以内で入力してください
                </div>
            </div>

            <!-- ボタン -->
            <div class="form-button">
                <a class="back-button" href="#">戻る</a>
                <button class="edit-button__submit" type="submit">変更を保存</button>
            </div>
        </form>
    </div>
</div>
@endsection
