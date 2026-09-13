@extends('layouts.dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('categories.edit',$category->id) }}">{{ $category->name }}</a></li>
@endsection
@section('title','Edit Category')

@section('content')

        <div class="container-fluid">
            <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">Edit Category</a>
            <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('categories.update',$category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('dashboard.pages.categories._form')
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                    
                </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    
@endsection

@push('styles')
   
@endpush