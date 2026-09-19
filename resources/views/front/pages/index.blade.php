@extends('layouts.website')

@section('title', 'Dashboard')

@push('styles')
{{-- <style>

    .channel-page {
        min-height: 75vh;
        padding: 60px 0;
        background: #f8f9fa;
    }

    .channel-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .channel-card {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;

        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    }

    .channel-cover {
        height: 180px;
        background: linear-gradient(
            135deg,
            #007bff,
            #6610f2
        );
    }

    .channel-content {
        padding: 0 45px 40px;
        text-align: center;
    }

    .channel-image {
        width: 150px;
        height: 150px;

        object-fit: cover;

        border-radius: 50%;

        border: 6px solid white;

        margin-top: -75px;

        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .channel-name {
        margin-top: 20px;
        font-size: 32px;
        font-weight: 700;
        color: #212529;
    }

    .channel-description {
        max-width: 650px;
        margin: 15px auto 0;

        color: #6c757d;

        font-size: 17px;
        line-height: 1.7;
    }

    .channel-actions {
        margin-top: 30px;
    }

    .create-card {
        background: white;

        padding: 60px 40px;

        text-align: center;

        border-radius: 20px;

        box-shadow: 0 8px 30px rgba(0,0,0,0.06);
    }

    .create-icon {
        width: 90px;
        height: 90px;

        margin: 0 auto 25px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #e8f1ff;
        color: #007bff;

        border-radius: 50%;

        font-size: 40px;
    }

    .create-card h1 {
        font-weight: 700;
        margin-bottom: 15px;
    }

    .create-card p {
        max-width: 600px;
        margin: 0 auto 30px;

        color: #6c757d;

        font-size: 17px;
    }

    .create-button {
        padding: 13px 30px;

        border-radius: 10px;

        font-weight: 600;
        font-size: 16px;
    }

</style> --}}
@endpush


@section('content')
    
@endsection

