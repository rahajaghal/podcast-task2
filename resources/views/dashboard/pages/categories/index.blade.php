@extends('layouts.dashboard')
@section('title','categories')
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Categories</a></li>
@endsection
@section('content')
    <x-flash-message/>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">create category</a>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="{{ route('categories.edit',$item->id) }}">Edit</a>
                    </td>
                
                    <td>
                        <form action="{{ route('categories.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection
@push('styles')
    <style>
        .btn{
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: blue;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th,td {
            border:1px solid #ddd;
            padding: 8px;
        }
    </style>
@endpush