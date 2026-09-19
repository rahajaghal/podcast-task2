@extends('layouts.website')

@section('title', 'My Favourite Podcasts')

@push('styles')

<style>

    .favourites-page {
        padding: 40px 0 60px;
    }

    .favourites-header {
        background: linear-gradient(
            135deg,
            #6f42c1,
            #8e44ad
        );
        border-radius: 20px;
        padding: 35px;
        margin-bottom: 35px;
        color: #fff;
        box-shadow: 0 10px 30px rgba(111, 66, 193, 0.20);
    }

    .favourites-header h1 {
        margin: 0;
        font-size: 32px;
        font-weight: 700;
    }

    .favourites-header p {
        margin: 10px 0 0;
        font-size: 16px;
        opacity: 0.9;
    }

    .favourites-header-icon {
        width: 65px;
        height: 65px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-bottom: 18px;
    }

    .podcasts-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .podcast-card {
        display: block;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        text-decoration: none !important;
        color: inherit;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.25s ease;
        border: 1px solid #eee;
        position: relative;
    }

    .podcast-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(111, 66, 193, 0.18);
    }

    .podcast-image-wrapper {
        height: 210px;
        position: relative;
        overflow: hidden;
        background: #f1f1f1;
    }

    .podcast-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .podcast-card:hover .podcast-image {
        transform: scale(1.05);
    }

    .play-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: rgba(111, 66, 193, 0.92);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        opacity: 0;
        transition: all 0.25s ease;
    }

    .podcast-card:hover .play-overlay {
        opacity: 1;
    }

    .favourite-badge {
        position: absolute;
        top: 14px;
        right: 14px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.95);
        color: #e74c3c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.12);
    }

    .podcast-content {
        padding: 20px;
    }

    .podcast-title {
        font-size: 19px;
        font-weight: 700;
        color: #343a40;
        margin-bottom: 12px;
        line-height: 1.4;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .podcast-info-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }

    .podcast-category {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #6f42c1;
        font-size: 13px;
        font-weight: 600;
    }

    .podcast-category i {
        font-size: 12px;
    }

    .podcast-rating {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .rating-stars {
        display: flex;
        gap: 1px;
        font-size: 15px;
        letter-spacing: 0;
    }

    .rating-stars span {
        color: #f1c40f;
    }

    .rating-stars .empty-star {
        color: #ddd;
    }

    .rating-number {
        font-size: 13px;
        font-weight: 700;
        color: #555;
    }

    .rating-count {
        font-size: 12px;
        color: #999;
    }

    .podcast-channel {
        display: flex;
        align-items: center;
        gap: 8px;
        padding-top: 12px;
        border-top: 1px solid #eee;
        color: #777;
        font-size: 13px;
    }

    .podcast-channel i {
        color: #6f42c1;
    }

    .empty-favourites {
        background: #fff;
        border-radius: 20px;
        padding: 70px 30px;
        text-align: center;
        border: 1px solid #eee;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    }

    .empty-favourites-icon {
        width: 85px;
        height: 85px;
        border-radius: 50%;
        background: #f3edfb;
        color: #6f42c1;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 35px;
    }

    .empty-favourites h3 {
        font-size: 24px;
        font-weight: 700;
        color: #343a40;
        margin-bottom: 10px;
    }

    .empty-favourites p {
        color: #777;
        margin-bottom: 25px;
    }

    .browse-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #6f42c1;
        color: #fff !important;
        padding: 11px 22px;
        border-radius: 10px;
        text-decoration: none !important;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .browse-btn:hover {
        background: #59339d;
        transform: translateY(-2px);
    }

    @media (max-width: 991px) {

        .podcasts-grid {
            grid-template-columns: repeat(2, 1fr);
        }

    }

    @media (max-width: 767px) {

        .favourites-page {
            padding: 25px 0 40px;
        }

        .favourites-header {
            padding: 25px;
        }

        .favourites-header h1 {
            font-size: 26px;
        }

        .podcasts-grid {
            grid-template-columns: 1fr;
        }

        .podcast-image-wrapper {
            height: 220px;
        }

    }

</style>

@endpush


@section('content')

<div class="container favourites-page">

    {{-- Header --}}
    <div class="favourites-header">

        <div class="favourites-header-icon">
            <i class="fas fa-heart"></i>
        </div>

        <h1>My Favourite Podcasts</h1>

        <p>
            Podcasts you have saved to your favourites.
        </p>

    </div>


    {{-- Podcasts --}}
    @if($podcasts->count())

        <div class="podcasts-grid">

            @foreach($podcasts as $podcast)

                <a
                    href="{{ route('podcast.show', $podcast->id) }}"
                    class="podcast-card"
                >

                    {{-- Image --}}
                    <div class="podcast-image-wrapper">

                        @if($podcast->channel && $podcast->channel->image)

                            <img
                                src="{{ asset('storage/' . $podcast->channel->image) }}"
                                alt="{{ $podcast->title }}"
                                class="podcast-image"
                            >

                        @else

                            <img
                                src="{{ asset('images/default-podcast.jpg') }}"
                                alt="{{ $podcast->title }}"
                                class="podcast-image"
                            >

                        @endif


                        {{-- Play --}}
                        <div class="play-overlay">
                            <i class="fas fa-play"></i>
                        </div>


                        {{-- Favourite --}}
                        <div class="favourite-badge">
                            <i class="fas fa-heart"></i>
                        </div>

                    </div>


                    {{-- Content --}}
                    <div class="podcast-content">

                        <div class="podcast-title">
                            {{ $podcast->title }}
                        </div>


                        {{-- Category + Rating --}}
                        <div class="podcast-info-row">

                            @if($podcast->category)

                                <div class="podcast-category">

                                    <i class="fas fa-tag"></i>

                                    {{ $podcast->category->name }}

                                </div>

                            @endif


                            <div class="podcast-rating">

                                @if($podcast->ratings_count > 0)

                                    <div class="rating-stars">

                                        @for($i = 1; $i <= 5; $i++)

                                            @if($podcast->ratings_avg_rating >= $i)

                                                <span>★</span>

                                            @else

                                                <span class="empty-star">
                                                    ★
                                                </span>

                                            @endif

                                        @endfor

                                    </div>

                                    <span class="rating-number">
                                        {{ number_format($podcast->ratings_avg_rating, 1) }}
                                    </span>

                                    <span class="rating-count">
                                        ({{ $podcast->ratings_count }})
                                    </span>

                                @else

                                    <div class="rating-stars">

                                        <span class="empty-star">★</span>
                                        <span class="empty-star">★</span>
                                        <span class="empty-star">★</span>
                                        <span class="empty-star">★</span>
                                        <span class="empty-star">★</span>

                                    </div>

                                    <span class="rating-count">
                                        No ratings
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- Channel --}}
                        @if($podcast->channel)

                            <div class="podcast-channel">

                                <i class="fas fa-microphone"></i>

                                <span>
                                    {{ $podcast->channel->name }}
                                </span>

                            </div>

                        @endif

                    </div>

                </a>

            @endforeach

        </div>

    @else

        {{-- Empty --}}
        <div class="empty-favourites">

            <div class="empty-favourites-icon">
                <i class="far fa-heart"></i>
            </div>

            <h3>No Favourite Podcasts Yet</h3>

            <p>
                You haven't added any podcasts to your favourites yet.
            </p>

            <a
                href="{{ route('podcasts.index') }}"
                class="browse-btn"
            >
                <i class="fas fa-headphones"></i>
                Browse Podcasts
            </a>

        </div>

    @endif

</div>

@endsection