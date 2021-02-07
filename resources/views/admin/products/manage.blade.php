@extends('layouts.admin_master')

@section('product_active') active show-sub @endsection
@section('manage_product') active @endsection

@section('content')

<div class="container">  
    <div class="row justify-content-center">
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
            <h6 class="card-body-title">category table</h6>
           
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Sl no:</th>
                    <th class="wd-15p">product name</th>
                    <th class="wd-20p">image</th>
                    <th class="wd-20p"> quantity</th>
                    <th class="wd-20p">status</th>
                    <th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>
                          <img src="{{ asset($product->image_one) }}" style="height: 90px; width: 90px;" alt="">
                        </td>
                        <td>{{ $product->product_quantity }}</td>
                        <td>
                            @if( $product->status === 1)
                            <span class="badge badge-success">active</span>
                            @else
                            <span class="badge badge-danger">inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('edit/product/'.$product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ url('delete/product/'.$product->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            @if( $product->status === 1)
                            <a href="{{ url('inactive/product/'.$product->id) }}" class="btn btn-sm btn-warning">inactive</a>
                            @else
                            <a href="{{ url('active/product/'.$product->id) }}" class="btn btn-sm btn-success">active</a>
                            @endif
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