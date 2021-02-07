@extends('layouts.admin_master')
@section('category_active')
    active
@endsection

@section('content')

<div class="container">  
    <div class="row justify-content-center">
<div class="col-md-8">
    <div class="card pd-20">
        <h4>edit category</h4>
        <div class="row">

        <form action="{{ url('update/category/'.$categories->id) }}" method="POST">
            @csrf
          <div class="col-lg">
            <div class="form-group has-success mg-b-0">
              <input type="text" class="form-control is-valid" name="category_name" value="{{ $categories->category_name }}" placeholder="enter your category name">
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