@extends('layouts.admin_master')
@section('coupon_active')
    active
@endsection

@section('content')

<div class="container">  
    <div class="row">
      <div class="col-md-8">
          @if( Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">category table</h6>
           
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Sl no:</th>
                    <th class="wd-15p">coupon name</th>
                    <th class="wd-15p">discount</th>
                    <th class="wd-20p">status</th>
                    <th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->coupon_name }}</td>
                        <td>{{ $coupon->discount }}%</td>
                        <td>
                            @if( $coupon->status === 1)
                            <span class="badge badge-success">active</span>
                            @else
                            <span class="badge badge-danger">inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('edit/coupon/'.$coupon->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ url('delete/coupon/'.$coupon->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            @if( $coupon->status === 1)
                            <a href="{{ url('inactive/coupon/'.$coupon->id) }}" class="btn btn-sm btn-warning">inactive</a>
                            @else
                            <a href="{{ url('active/coupon/'.$coupon->id) }}" class="btn btn-sm btn-success">active</a>
                            @endif
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
        </div>
<div class="col-md-4">
    <div class="card pd-20">
        <h4>add coupon</h4>
        <div class="row">

        <form action="{{ url('store/coupon') }}" method="POST">
            @csrf
          <div class="col-lg">
            <div class="form-group has-success mg-b-0">
              <input type="text" class="form-control is-valid" name="coupon_name" placeholder="enter your coupon name">
              <span class="text-danger">@error('coupon_name') {{ $message }} @enderror</span>
            </div><!-- form-group --><br/>
            <div class="form-group has-success mg-b-0">
              <input type="number" class="form-control is-valid" name="discount" placeholder=" coupon discount">
              <span class="text-danger">@error('discount') {{ $message }} @enderror</span>
            </div><!-- form-group --><br/>
            <button type="submit" class="btn btn-primary">add coupon</button>
          </div><!-- col -->
        </form>

        </div><!-- row -->
    </div><!-- card -->

</div>
</div>



@endsection