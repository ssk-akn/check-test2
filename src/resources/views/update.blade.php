@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/update.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="products-content">
        <form action="/products/{{ $product->id }}/update" method="post" enctype="multipart/form-data" class="form">
            @csrf
            @method('PATCH')
            <div class="products-link">
                <nav>
                    <ul class="products__page-path">
                        <li class="products__page-path--list">
                            <a href="/products">商品一覧</a>
                        </li>
                        <span>&nbsp;>&nbsp;</span>
                        <li class="products__page-path--list">
                            商品名
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="products-wrap">
                <div class="product__img">
                    <img src="{{ asset('storage/' . $product->image) }}" alt=" ">
                    <div class="form__img-input">
                        <label>
                            <div class="form__img-input--custom">ファイルを選択</div>
                            <input class="input-hidden" type="file" name="image" accept="image/png, image/jpeg">
                        </label>
                        <input class="image-filename" type="text" name="image-filename" value="{{ basename($product->image) }}" readonly>
                    </div>
                </div>
                <div class="products__item">
                    <div class="products-name">
                        <div class="products-name__title">
                            商品名
                        </div>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="商品名を入力">
                        @error('name')
                        <div class="products-error">
                            <li>{{ $message }}</li>
                        </div>
                        @enderror
                    </div>
                    <div class="products-price">
                        <div class="products-price__title">
                            値段
                        </div>
                        <input type="text" name="price" value="{{ old('price', $product->price) }}" placeholder="値段を入力">
                        @error('price')
                        <div class="products-error">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="products-season">
                        <div class="products-season__title">
                            季節
                        </div>
                        <div class="season-wrap">
                            @foreach ($seasons as $season)
                            <div class="products-season__kinds">
                                <label>
                                    <input class="checkbox" type="checkbox" name="seasons[]" value="{{ $season->id }}"
                                    {{ in_array($season->id, old('seasons', $productSeasons)) ? 'checked' : '' }}>
                                    <span class="custom-checkbox"></span>
                                    <span class="season">{{ $season->name }}</span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                        @error('seasons')
                        <div class="products-error">
                            <li>{{ $message }}</li>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="products-detail">
                <div class="products-detail__title">
                    商品説明
                </div>
                <div class="products-detail__text">
                    <textarea name="description" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
                </div>
                @error('description')
                <div class="products-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="products-button__wrap">
                <div class="products-button__return">
                    <a class="products-button__return-submit" href="/products">
                        戻る
                    </a>
                </div>
                <div class="products-button__update">
                    <button class="products-button__update-submit" type="submit">
                        変更を保存
                    </button>
                </div>
            </div>
        </form>
        <div class="products-button__delete">
            <form action="/products/{{ $product->id }}/delete" method="post">
                @csrf
                @method('DELETE')
                <button class="products-button__delete-submit">
                    <img src="{{ asset('storage/dust-box.png')}}">
                </button>
            </form>
        </div>
    </div>
</div>
@endsection