@extends('layouts.admin_master')
@section('coupon_active')
    active
@endsection

@section('content')

<div class="container">  
    <div class="row justify-content-center">
<div class="col-md-8">
    <div class="card pd-20">
        <h4>edit coupon</h4>
        <div class="row">

        <form action="{{ url('update/coupon/'.$coupons->id) }}" method="POST">
            @csrf
          <div class="col-lg">
            <div class="form-group has-success mg-b-0">
              <input type="text" class="form-control is-valid" name="coupon_name" value="{{ $coupons->coupon_name }}" placeholder="enter your coupon name">
              <span class="text-danger">@error('coupon_name') {{ $message }} @enderror</span>
            </div><!-- form-group --><br/>
            <div class="form-group has-success mg-b-0">
              <input type="text" class="form-control is-valid" name="discount" value="{{ $coupons->discount }}" placeholder="coupon discount">
              <span class="text-danger">@error('discount') {{ $message }} @enderror</span>
            </div><!-- form-group --><br/>
            <button type="submit" class="btn btn-primary">update</button>
          </div><!-- col -->
        </form>

        </div><!-- row -->
    </div><!-- card -->

</div>
</div>



@endsection