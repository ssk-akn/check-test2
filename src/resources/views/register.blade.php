@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="register-title">
        <h1>商品登録</h1>
    </div>
    <form action="/products/register" method="post" enctype="multipart/form-data" class="register-form">
        @csrf
        <div class="form-group">
            <div class="form-group__title">
                <span class="form-group__title-item">商品名</span>
                <span class="form-group__title-required">必須</span>
            </div>
            <div class="form-group__content">
                <div class="form__input--text">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
                </div>
                <div class="form__error">
                    @error('name')
                    <li>{{ $message }}</li>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group__title">
                <span class="form-group__title-item">値段</span>
                <span class="form-group__title-required">必須</span>
            </div>
            <div class="form-group__content">
                <div class="form__input--text">
                    <input type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力">
                </div>
                <div class="form__error">
                    @error('price')
                    <li>{{ $message }}</li>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group__title">
                <span class="form-group__title-item">商品画像</span>
                <span class="form-group__title-required">必須</span>
            </div>
            <div class="form-group__content">
                <div class="form__img-input">
                    <label>
                        <div class="form__img-input--custom">ファイルを選択</div>
                        <input type="file" name="image" value="{{ old('image') }}" accept="image/png, image/jpeg">
                    </label>
                </div>
                <div class="form__error">
                    @error('image')
                    <li>{{ $message }}</li>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group__title">
                <span class="form-group__title-item">季節</span>
                <span class="form-group__title-required">必須</span>
                <span class="form-group__title-allow">複数選択可</span>
            </div>
            <div class="form-group__content">
                <div class="season-wrap">
                    @foreach ($seasons as $season)
                    <div class="products-season__kinds">
                        <label>
                            <input class="checkbox" name="seasons[]" type="checkbox" value="{{ $season->id }}">
                            <span class="custom-checkbox"></span>
                            <span class="season">{{ $season->name }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="form__error">
                    @error('seasons')
                    <li>{{ $message }}</li>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group__title">
                <span class="form-group__title-item">商品説明</span>
                <span class="form-group__title-required">必須</span>
            </div>
            <div class="form-group__content">
                <div class="form__input--text">
                    <textarea name="description" id="" placeholder="商品の説明を入力"></textarea>
                </div>
                <div class="form__error">
                    @error('description')
                    <li>{{ $message }}</li>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button--wrap">
            <div class="return-button">
                <button class="return-button__submit" onclick="window.location.href='{{ URL::previous() }}'">戻る</button>
            </div>
            <div class="register-button">
                <button class="register-button__submit" type="submit">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection