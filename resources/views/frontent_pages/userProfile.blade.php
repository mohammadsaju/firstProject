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
                    <h2>user profile</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>user profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<section class="shoping-cart spad p-5">
<div class="row">
    <div class="col-sm-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="" alt="user img">
            <div class="card-body">
            <ul class="list-group list-group-flush">
              <a href="{{ route('frontent.home') }}" class="btn btn-primary">home</a>
              <a href="{{ url('user/orders') }}" class="btn btn-success"> my orders</a>
              
                <a class="btn btn-warning" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
           
            </ul>
            </div>
          </div>
    </div>
    <div class="col-sm-8">
      <div class="card">
          <div class="card-body">
        <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">name</label>
              <input type="text" class="form-control" id="exampleInputPassword1" value="{{ Auth::user()->name }}">
            </div>
            <button type="submit" class="btn btn-primary">update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection