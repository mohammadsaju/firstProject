@extends('layouts.admin_master')
@section('order_active')
    active
@endsection

@section('content')

<div class="container mb-5">  
    <div class="row">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">shipping address</h6>
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="firstname" value="{{ $shipping->shipping_first_name }}" readonly>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="lastname" value="{{ $shipping->shipping_last_name }}" readonly>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{ $shipping->shipping_email}}" readonly>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Phone <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{ $shipping->shipping_phone}}" readonly>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">address<span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{ $shipping->address}}" readonly>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">State <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="address" value="{{ $shipping->state }}" readonly>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">post code <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="address" value="{{ $shipping->post_code }}" readonly>
                  </div>
                </div><!-- col-4 -->

              </div><!-- row -->
            </div><!-- form-layout -->
        </div><!-- card -->
    </div>
    <div class="row">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">order</h6>
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">order</h6>
                    <div class="form-layout">
                      <div class="row mg-b-25">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">Invoice no: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="firstname" value="{{ $order->invoice_no }}" readonly>
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">payment type: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="lastname" value="{{ $order->payment_type }}" readonly>
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">total <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="email" value="{{ $order->total }}" readonly>
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">subtotal <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="email" value="{{ $order->subtotal }}" readonly>
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">discount<span class="tx-danger">*</span></label>
                            @if( $order->coupon_discount === Null)
                            <span class="badge badge-danger">NO discount</span>
                            @else
                           <span class="badge badge-success">{{ $order->coupon_discount }}%</span>
                            @endif
                          </div>
                        </div><!-- col-4 -->
        
                      </div><!-- row -->
                    </div><!-- form-layout -->
                </div><!-- card -->
        
              </div><!-- row -->
            </div><!-- form-layout -->
        </div><!-- card -->
    </div>
    <div class="row">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">order</h6>
            <div class="form-layout">
              <div class="row mg-b-25">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">order item</h6>
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">image</th>
                    <th class="wd-15p">product name</th>
                    <th class="wd-15p">quantity</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($order_item as $item)
                    <tr>
                        <td><img style="height: 50px; width: 50px;" src="{{ asset($item->product->image_one) }}" alt=""></td>
                        <td>{{ $item->product->product_name }}</td>
                        <td>{{ $item->product_qty }}</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
              </div><!-- row -->
            </div><!-- form-layout -->
        </div><!-- card -->
    </div>
</div>

@endsection