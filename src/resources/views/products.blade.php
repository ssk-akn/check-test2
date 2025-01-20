@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="products-item">
        <div class="products-title">
            <h1>商品一覧</h1>
        </div>
        <div class="products-add">
            <a class="products-add__button" href="/products/register">＋ 商品を追加</a>
        </div>
    </div>
    <div class="products-table">
        <div class="products-search">
            <div class="products-search__item">
                <form action="/products/search" method="get" class="products-search__form">
                    @csrf
                    <div class="products-search__text">
                        <input type="text" name="name" placeholder="商品名で検索">
                    </div>
                    <div class="products-search__button">
                        <button class="products-search__button-submit" type="submit">検索</button>
                    </div>
                </form>
            </div>
            <div class="products-sort">
                <div class="products-sort__title">
                    <h2>価格順で表示</h2>
                </div>
                <div class="products-sort__select">
                    <form action="/products" method="get">
                        <select name="" id="">
                            <option value="">価格で並べ替え</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>高い順に表示</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>低い順に表示</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="products-list">
            @foreach ($products as $product)
            <a href="/products/{{ $product->id }}" class="products-detail__button">
                <div class="products-detail">
                    <div class="products-detail__img">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="products-detail__item">
                        <div class="products-detail__name">
                            {{ $product->name }}
                        </div>
                        <div class="products-detail__price">
                            &yen;{{ $product->price }}
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="products-pagination">
        {{ $products->links('vendor.pagination.fruits') }}
    </div>
</div>

@endsection