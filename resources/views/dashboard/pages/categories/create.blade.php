
@extends('layouts.dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('categories.create') }}">Create</a></li>
@endsection
@section('title','Create Category')

@section('content')
        @if ($errors ->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="container-fluid">
            <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">create category</a>
            <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    @include('dashboard.pages.categories._form')
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
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