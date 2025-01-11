@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/update.css') }}">
@endsection

@section('content')
<div class="content">
    <form action="" class="form">
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
            <div class="products__img">
                <input type="file" name="" id="">
            </div>
            <div class="products__item">
                <div class="products-name">
                    <div class="products-name__title">
                        商品名
                    </div>
                    <input type="text" value="商品名" placeholder="商品名を入力">
                </div>
                <div class="products-price">
                    <div class="products-price__title">
                        値段
                    </div>
                    <input type="text" value="値段" placeholder="値段を入力">
                </div>
                <div class="products-season">
                    <div class="products-season__title">
                        季節
                    </div>
                    <div class="season-wrap">
                        <div class="products-season__kinds">
                            <label>
                                <input class="checkbox" type="checkbox">
                                <span class="custom-checkbox"></span>
                                <span class="season">春</span>
                            </label>
                        </div>
                        <div class="products-season__kinds">
                            <label>
                                <input class="checkbox" type="checkbox">
                                <span class="custom-checkbox"></span>
                                <span class="season">夏</span>
                            </label>
                        </div>
                        <div class="products-season__kinds">
                            <label>
                                <input class="checkbox" type="checkbox">
                                <span class="custom-checkbox"></span>
                                <span class="season">秋</span>
                            </label>
                        </div>
                        <div class="products-season__kinds">
                            <label>
                                <input class="checkbox" type="checkbox">
                                <span class="custom-checkbox"></span>
                                <span class="season">冬</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="products-detail">
            <div class="products-detail__title">
                商品説明
            </div>
            <div class="products-detail__text">
                <textarea name="" placeholder="商品の説明を入力"></textarea>
            </div>
        </div>
        <div class="products-button__wrap">
            <div class="products-button__return">
                <button class="products-button__return-submit">
                    戻る
                </button>
            </div>
            <div class="products-button__update">
                <button class="products-button__update-submit">
                    変更を保存
                </button>
            </div>
            <div class="products-button__delete">
                <button class="products-button__delete-submit">
                    <img src="{{ asset('storage/dustbox.png')}}">
                </button>
            </div>
        </div>
    </form>
</div>
@endsection