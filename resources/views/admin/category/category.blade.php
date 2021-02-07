@extends('layouts.admin_master')
@section('category_active')
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
                    <th class="wd-15p">category name</th>
                    <th class="wd-20p">status</th>
                    <th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            @if( $category->status === 1)
                            <span class="badge badge-success">active</span>
                            @else
                            <span class="badge badge-danger">inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('edit/category/'.$category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ url('delete/category/'.$category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            @if( $category->status === 1)
                            <a href="{{ url('inactive/category/'.$category->id) }}" class="btn btn-sm btn-warning">inactive</a>
                            @else
                            <a href="{{ url('active/category/'.$category->id) }}" class="btn btn-sm btn-success">active</a>
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
        <h4>add category</h4>
        <div class="row">

        <form action="{{ url('store/category') }}" method="POST">
            @csrf
          <div class="col-lg">
            <div class="form-group has-success mg-b-0">
              <input type="text" class="form-control is-valid" name="category_name" placeholder="enter your category name">
              <span class="text-danger">@error('category_name') {{ $message }} @enderror</span>
            </div><!-- form-group --><br/>
            <button type="submit" class="btn btn-primary">add</button>
          </div><!-- col -->
        </form>

        </div><!-- row -->
    </div><!-- card -->

</div>
</div>



@endsection