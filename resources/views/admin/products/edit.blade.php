@extends('layouts.admin_master')

@section('product_active') active show-sub @endsection
@section('manage_product') active @endsection

@section('content')
<div class="container">

<form action="{{ url('update/product/'.$product->id) }}" method="POST">
    @csrf
   <div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title"> update product</h6>
    <p class="mg-b-20 mg-sm-b-30">you can update this product from here</p>

    <div class="form-layout">
      <div class="row mg-b-25">

        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">product name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" placeholder="product name">
            <span class="text-danger">@error('product_name') {{ $message }} @enderror</span>
          </div>
        </div><!-- col-4 -->

        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">product code: <span class="tx-danger">*</span></label>
            <input class="form-control" type="number" name="product_code" value="{{ $product->product_code }}" placeholder="product code">
            <span class="text-danger">@error('product_code') {{ $message }} @enderror</span>
          </div>
        </div><!-- col-4 -->

        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">product price <span class="tx-danger">*</span></label>
            <input class="form-control" type="number" name="product_price" value="{{ $product->product_price }}" placeholder="product price">
            <span class="text-danger">@error('product_price') {{ $message }} @enderror</span>
          </div>
        </div><!-- col-4 -->

        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">product quantity<span class="tx-danger">*</span></label>
            <input class="form-control" type="number" name="product_quantity" value="{{ $product->product_quantity }}" placeholder="product quantity">
            <span class="text-danger">@error('product_quantity') {{ $message }} @enderror</span>
          </div>
        </div><!-- col-8 -->

        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">category <span class="tx-danger">*</span></label>
            <select class="form-control select2" name="category_id"  data-placeholder="choose category">
                <option label="Choose category"></option>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}" {{ $item->id === $product->category_id ? "selected": "" }}>{{ $item->category_name }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('category_id') {{ $message }} @enderror</span>
          </div>
        </div><!-- col-4 -->

        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">brand <span class="tx-danger">*</span></label>
            <select class="form-control select2" name="brand_id" data-placeholder="choose category">
                <option label="Choose brand"></option>
                @foreach ($brands as $item)
                <option value="{{ $item->id }}" {{ $item->id === $product->brand_id ? "selected" : "" }}>{{ $item->brand_name }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('brand_id') {{ $message }} @enderror</span>
          </div>
        </div><!-- col-4 -->

      </div><!-- row -->

    </div><!-- form-layout -->
  </div><!-- card -->

  <div class="card pd-20 pd-sm-40 ">
    <h6 class="card-body-title">product short describtion</h6>
    <textarea name="short_describtion" id="summernote">{{ $product->short_describtion }}</textarea>
    <span class="text-danger">@error('short_describtion') {{ $message }} @enderror</span>
  </div><!-- card -->

  <div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">product long describtion</h6>
    <textarea name="long_describtion" id="summernote2">{{ $product->long_describtion }}</textarea>
    <span class="text-danger">@error('long_describtion') {{ $message }} @enderror</span>
  </div><!-- card -->
  <div class="form-layout-footer mg-t-30 pb-5 ">
    <button class="btn btn-info mg-r-5" type="submit">update data</button>
  </div><!-- form-layout-footer -->
</form>

<form action="{{ url('update/image/'.$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row mt-3">

  <input type="hidden" name="img_one" value="{{ $product->image_one }}">
  <input type="hidden" name="img_two" value="{{ $product->image_two }}">
  <input type="hidden" name="img_three" value="{{ $product->image_three }}">

  <div class="col-lg-4">
    <div class="form-group mg-b-10-force">
      <label class="form-control-label">image_one<span class="tx-danger">*</span></label>
      <input class="form-control" type="file" name="image_one">
      <span class="text-danger">@error('image_one') {{ $message }} @enderror</span>
      <br>
      <img src="{{ asset($product->image_one) }}" style="height: 250px; width: 230px;" alt="">
     
    </div>
  </div><!-- col-8 -->
  <div class="col-lg-4">
    <div class="form-group mg-b-10-force">
      <label class="form-control-label">image_two<span class="tx-danger">*</span></label>
      <input class="form-control" type="file" name="image_two">
      <span class="text-danger">@error('image_two') {{ $message }} @enderror</span>
      <br>
      <img src="{{ asset($product->image_two) }}" style="height: 250px; width: 230px;" alt="">
     
    </div>
  </div><!-- col-8 -->
  <div class="col-lg-4">
    <div class="form-group mg-b-10-force">
      <label class="form-control-label">image_three<span class="tx-danger">*</span></label>
      <input class="form-control" type="file" name="image_three">
      <span class="text-danger">@error('image_three') {{ $message }} @enderror</span>
      <br>
      <img src="{{ asset($product->image_three) }}" style="height: 250px; width: 230px;" alt="">
      
    </div>
  </div><!-- col-8 -->
</div>

  <div class="form-layout-footer mg-t-30 pb-5 ">
    <button class="btn btn-info mg-r-5" type="submit">update</button>
  </div><!-- form-layout-footer -->
</form>

</div>

@endsection