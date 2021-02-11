@extends('layouts.admin_master')
@section('order_active')
    active
@endsection

@section('content')

<div class="container">  
    <div class="row">
      <div class="col-md-12">
          @if( Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">order table</h6>
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Sl no:</th>
                    <th class="wd-15p">invoice no</th>
                    <th class="wd-15p">total</th>
                    <th class="wd-20p">subtotal</th>
                    <th class="wd-15p">coupon discount</th>
                    <th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->invoice_no }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->subtotal }}</td>
                        <td>
                            @if( $order->coupon_discount === null)
                            <span class="badge badge-danger">no</span>
                            @else
                            <span class="badge badge-success">yes</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('view/order/'.$order->id) }}" class="btn btn-sm btn-primary">view</a>
                            <a href="{{ url('delete/order/'.$order->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
        </div>
</div>



@endsection