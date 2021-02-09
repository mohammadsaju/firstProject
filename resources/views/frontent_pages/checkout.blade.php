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
                    <h2>product checkout</h2>
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


    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>product checkout</h4>
                <form action="{{ url('store/order') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="shipping_first_name">
                                        <span class="text-danger">@error('shipping_first_name') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="shipping_last_name">
                                        <span class="text-danger">@error('shipping_last_name') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="number" name="shipping_phone">
                                        <span class="text-danger">@error('shipping_phone') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="shipping_email">
                                        <span class="text-danger">@error('shipping_email') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="address">
                                <span class="text-danger">@error('address') {{ $message }} @enderror</span>
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="state">
                                <span class="text-danger">@error('state') {{ $message }} @enderror</span>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="post_code">
                                <span class="text-danger">@error('post_code') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                @if(Session::has('coupon'))
                                <div class="checkout__order__subtotal">Subtotal <span>${{ $subtotal - $subtotal * Session()->get('coupon')['discount'] / 100 }}</span></div>
                                <input type="hidden" name="coupon_discount" value="{{ Session()->get('coupon')['discount'] }}">
                                <input type="hidden" name="total" value="{{ $subtotal }}">
                                <input type="hidden" name="subtotal" value="{{ $subtotal - $subtotal * Session()->get('coupon')['discount'] / 100 }}">
                                @else
                                <div class="checkout__order__total">Total <span>${{ $subtotal }}</span></div>
                                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                <input type="hidden" name="total" value="{{ $subtotal }}">
                                @endif
                                <ul>
                                    @foreach ($carts as $cart)
                                    <li>{{ $cart->product->product_name }} ({{ $cart->qty }}) <span>${{ $cart->product_price * $cart->qty }}</span></li>
                                    @endforeach
                                </ul>
                                @if(Session::has('coupon'))
                                <div class="checkout__order__subtotal">Subtotal <span>${{ $subtotal - $subtotal * Session()->get('coupon')['discount'] / 100 }}</span></div>
                                @else
                                <div class="checkout__order__total">Total <span>${{ $subtotal }}</span></div>
                                @endif
                                <div class="checkout__input__checkbox">
                                   <h4 class="text-info">select payment method</h4>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Hancash
                                        <input type="checkbox" id="payment" value="hancash" name="payment_type">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal" value="paypal" name="payment_type">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->


@endsection