@extends('layouts.frontent_master_two')

@section('frontent_content')
   <!-- Hero Section Begin -->
   <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All categories</span>
                    </div>
                    @php
                        $categoriess = App\category::latest()->get();
                    @endphp
                    <ul>
                        @foreach ($categoriess as $category)
                        <li><a href="#">{{ $category->category_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontent') }}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    @if( Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif
                    @if( Session::has('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('delete') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{ $cart->product->image_one }}" style="height: 70px; width: 70px;" alt="">
                                    <h5>{{ $cart->product->product_name }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{ $cart->product_price }}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                       
                                    <form action="{{ url('update/quantity/'.$cart->id) }}" method="POST">
                                        @csrf
                                        <div class="pro-qty">
                                            <input type="text" name="qty" value="{{ $cart->qty }}" min="1">
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success">update</button>
                                    </form>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    ${{ $cart->product_price * $cart->qty }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{ url('delete/cart/'.$cart->id) }}"><span class="icon_close"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ url('/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            @if(Session::has('coupon'))
            @else
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="{{ url('apply/coupon') }}" method="POST">
                            @csrf
                            <input type="text" name="coupon_name" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
           
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        
                        @if(Session::has('coupon'))
                        <li>total <span>${{ $subtotal }}</span></li>
                        <li>coupon name <span>{{ Session()->get('coupon')['coupon_name'] }} <a href="{{ url('coupon/destroy') }}" class="text-dark ml-3">X</a></span></li>
                        <li>discount <span>{{ Session()->get('coupon')['discount'] }}% ( {{ $discount = $subtotal * Session()->get('coupon')['discount'] / 100}} ) tk</span></li>
                        <li>subtotal <span>${{ $subtotal - $discount }}</span></li>
                        @else
                        <li>total <span>${{ $subtotal }}</span></li>
                        @endif
                        
                    </ul>
                    <a href="{{ url('product/checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection