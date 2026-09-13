@extends('layouts.dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('tags.index') }}">Tags</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tags.edit',$tag->id) }}">{{ $tag->name }}</a></li>
@endsection
@section('title','Edit Tag')

@section('content')

        <div class="container-fluid">
            <a href="{{ route('tags.index') }}" class="btn btn-primary mb-3">Edit Tag</a>
            <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Tag</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('tags.update',$tag->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('dashboard.pages.tags._form')
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