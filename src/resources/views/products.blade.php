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
            <button class="products-add__button">＋ 商品を追加</button>
        </div>
    </div>
    <div class="products-table">
        <div class="products-search">
            <div class="products-search__item">
                <form action="" class="products-search__form">
                    <div class="products-search__text">
                        <input type="text" placeholder="商品名で検索">
                    </div>
                    <div class="products-search__button">
                        <button class="products-search__button-submit">検索</button>
                    </div>
                </form>
            </div>
            <div class="products-sort">
                <div class="products-sort__title">
                    <h2>価格順で表示</h2>
                </div>
                <div class="products-sort__select">
                    <select name="" id="">
                        <option value="">価格で並べ替え</option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="products-list">
            <form action="/update" class="products-list__form">
                <button class="products-detail__button">
                    <div class="products-detail">
                        <div class="products-detail__img">
                            <img src="" alt="">
                        </div>
                        <div class="products-detail__item">
                            <div class="products-detail__name">
                                商品名
                            </div>
                            <div class="products-detail__price">
                                商品値段
                            </div>
                        </div>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection