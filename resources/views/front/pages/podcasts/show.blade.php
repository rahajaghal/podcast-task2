@extends('layouts.website')

@section('title', $podcast->title)

@push('styles')
<style>

    /* ========================================
       MAIN CONTAINER
    ======================================== */

    .podcast-show {
        max-width: 850px;
        margin: 30px auto;
    }

    .podcast-box {
        background: #fff;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
    }


    /* ========================================
       TOP SECTION
    ======================================== */

    .podcast-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
    }

    .podcast-info {
        display: flex;
        align-items: center;
        gap: 15px;
        min-width: 0;
    }


    /* ========================================
       PODCAST IMAGE
    ======================================== */

    .podcast-image {
        width: 75px;
        height: 75px;
        object-fit: cover;
        border-radius: 12px;
        flex-shrink: 0;
    }

    .podcast-placeholder {
        width: 75px;
        height: 75px;
        border-radius: 12px;

        background: #f0e8f7;
        color: #5b2c83;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 28px;

        flex-shrink: 0;
    }


    /* ========================================
       TITLE / CHANNEL
    ======================================== */

    .podcast-title {
        margin: 0 0 5px;

        font-size: 24px;
        font-weight: 700;

        color: #343a40;

        word-break: break-word;
    }

    .podcast-channel {
        color: #777;
        font-size: 14px;
    }


    /* ========================================
       ACTIONS
    ======================================== */

    .podcast-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;

        gap: 12px;

        flex-shrink: 0;

        min-width: 190px;
    }


    /* ========================================
       RATING
    ======================================== */

    .rating-form {
        display: flex;
        align-items: center;

        gap: 0;

        margin: 0;
    }

    .rating-star {
        border: none !important;
        background: transparent !important;

        padding: 2px !important;
        margin: 0 !important;

        cursor: pointer;

        font-size: 25px !important;
        line-height: 1;

        color: #cccccc !important;

        transition:
            color .15s ease,
            transform .15s ease;
    }

    .rating-star:hover {
        color: #f5b301 !important;

        transform: scale(1.1);
    }

    .rating-star.selected {
        color: #f5b301 !important;
    }


    /* ========================================
       FAVORITE
    ======================================== */

    .favorite-form {
        margin: 0;
    }

    .favorite-button {
        width: 42px !important;
        height: 42px !important;

        padding: 0 !important;

        border-radius: 50%;

        border: 1px solid #ddd !important;

        background: #fff !important;

        color: #d63384 !important;

        cursor: pointer;

        font-size: 25px !important;
        line-height: 1;

        display: flex !important;
        align-items: center;
        justify-content: center;

        transition: all .15s ease;
    }

    .favorite-button.is-favourite {
        background: #d63384 !important;
        border-color: #d63384 !important;
        color: #fff !important;
    }

    .favorite-button:hover {
        background: #fff0f6 !important;
        border-color: #d63384 !important;

        transform: scale(1.05);
    }

    .favorite-button.is-favourite:hover {
        background: #c2186a !important;
        border-color: #c2186a !important;
        color: #fff !important;
    }


    /* ========================================
       AUDIO
    ======================================== */

    .audio-box {
        background: #f7f4f9;

        border-radius: 12px;

        padding: 14px;
    }

    .audio-label {
        font-size: 13px;

        font-weight: 600;

        color: #5b2c83;

        margin-bottom: 7px;
    }

    .audio-player {
        width: 100%;
        height: 42px;
    }


    /* ========================================
       META
    ======================================== */

    .podcast-meta {
        display: flex;

        align-items: center;

        gap: 10px;

        margin-top: 12px;

        flex-wrap: wrap;
    }

    .meta {
        font-size: 12px;

        color: #777;

        background: #f5f5f5;

        padding: 5px 9px;

        border-radius: 7px;
    }

    .meta i {
        color: #5b2c83;

        margin-right: 4px;
    }


    /* ========================================
       AVERAGE RATING
    ======================================== */

    .average-rating {
        font-size: 12px;

        color: #777;

        margin-top: 8px;
    }

    .average-rating strong {
        color: #f5b301;
    }


    /* ========================================
       TAGS
    ======================================== */

    .podcast-tags {
        margin-top: 15px;
    }

    .tags-title {
        font-size: 13px;

        font-weight: 600;

        color: #555;

        margin-bottom: 6px;
    }

    .tag {
        display: inline-block;

        font-size: 11px;

        color: #5b2c83;

        background: #eee6f6;

        padding: 5px 9px;

        border-radius: 12px;

        margin: 2px;

        text-decoration: none;

        transition: all .15s ease;
    }

    .tag:hover {
        color: #fff;

        background: #5b2c83;

        text-decoration: none;

        transform: translateY(-1px);
    }


    /* ========================================
       MOBILE
    ======================================== */

    @media (max-width: 650px) {

        .podcast-show {
            margin: 20px 0;
        }

        .podcast-box {
            padding: 15px;
        }

        .podcast-top {
            align-items: flex-start;

            flex-direction: column;
        }

        .podcast-info {
            align-items: flex-start;

            width: 100%;
        }

        .podcast-image,
        .podcast-placeholder {
            width: 60px;
            height: 60px;
        }

        .podcast-title {
            font-size: 19px;
        }

        .podcast-actions {
            width: 100%;

            min-width: 0;

            justify-content: flex-start;

            gap: 8px;
        }

        .rating-star {
            font-size: 21px !important;
        }

        .favorite-button {
            width: 38px !important;
            height: 38px !important;

            font-size: 21px !important;
        }
    }

</style>
@endpush


@section('content')

<div class="podcast-show">

    {{-- ========================================
         BACK TO PODCASTS
    ======================================== --}}

    <a
        href="{{ route('dashboard') }}"
        class="btn btn-sm btn-link text-primary mb-3 p-0"
    >
        <i class="fas fa-arrow-left"></i>

        Back to Podcasts
    </a>


    <div class="podcast-box">


        {{-- ========================================
             PODCAST HEADER
        ======================================== --}}

        <div class="podcast-top">


            {{-- Podcast information --}}

            <div class="podcast-info">


                {{-- Channel image --}}

                @if($podcast->channel && $podcast->channel->image)

                    <img
                        src="{{ asset('storage/' . $podcast->channel->image) }}"
                        alt="{{ $podcast->channel->name }}"
                        class="podcast-image"
                    >

                @else

                    <div class="podcast-placeholder">

                        <i class="fas fa-podcast"></i>

                    </div>

                @endif


                {{-- Title + Channel --}}

                <div>

                    <h1 class="podcast-title">
                        {{ $podcast->title }}
                    </h1>


                    @if($podcast->channel)

                        <div class="podcast-channel">

                            <i class="fas fa-microphone"></i>

                            {{ $podcast->channel->name }}

                        </div>

                    @endif

                </div>

            </div>


            {{-- ========================================
                 RATING + FAVORITE
            ======================================== --}}

            <div class="podcast-actions">


                {{-- Rating --}}

                <form
                    action="{{ route('podcast.rate', $podcast->id) }}"
                    method="POST"
                    class="rating-form"
                >

                    @csrf

                    @for($i = 1; $i <= 5; $i++)

                        <button
                            type="submit"
                            name="rating"
                            value="{{ $i }}"
                            class="rating-star
                            @if(
                                isset($userRating) &&
                                $userRating &&
                                $userRating->rating >= $i
                            )
                                selected
                            @endif"
                            title="{{ $i }} stars"
                            aria-label="Rate {{ $i }} stars"
                        >
                            ★
                        </button>

                    @endfor

                </form>


                {{-- Favorite --}}

                <form
                    action="{{ route('podcast.favorite', $podcast->id) }}"
                    method="POST"
                    class="favorite-form"
                >

                    @csrf

                    <button
                        type="submit"
                        class="favorite-button
                        {{ $isFavourite ? 'is-favourite' : '' }}"
                        title="{{ $isFavourite
                            ? 'Remove from favourites'
                            : 'Add to favourites'
                        }}"
                        aria-label="{{ $isFavourite
                            ? 'Remove from favourites'
                            : 'Add to favourites'
                        }}"
                    >
                        ♥
                    </button>

                </form>

            </div>

        </div>


        {{-- ========================================
             AUDIO PLAYER
        ======================================== --}}

        <div class="audio-box">

            <div class="audio-label">

                <i class="fas fa-headphones"></i>

                Listen

            </div>


            <audio
                controls
                preload="metadata"
                class="audio-player"
            >

                <source
                    src="{{ asset('storage/' . $podcast->podcast) }}"
                    type="audio/mpeg"
                >

                Your browser does not support audio playback.

            </audio>

        </div>


        {{-- ========================================
             PODCAST META
        ======================================== --}}

        <div class="podcast-meta">


            {{-- Category --}}

            @if($podcast->category)

                <span class="meta">

                    <i class="fas fa-tag"></i>

                    {{ $podcast->category->name }}

                </span>

            @endif


            {{-- File size --}}

            @if($podcast->size)

                <span class="meta">

                    <i class="fas fa-file-audio"></i>

                    {{ number_format($podcast->size, 2) }} MB

                </span>

            @endif

        </div>


        {{-- ========================================
             AVERAGE RATING
        ======================================== --}}

        @if($podcast->ratings_count > 0)

            <div class="average-rating">

                <strong>
                    ★ {{ number_format($podcast->ratings_avg_rating, 1) }}
                </strong>

                ({{ $podcast->ratings_count }} ratings)

            </div>

        @else

            <div class="average-rating">

                No ratings yet.

            </div>

        @endif


        {{-- ========================================
             TAGS
        ======================================== --}}

        @if($podcast->tags->count())

            <div class="podcast-tags">

                <div class="tags-title">
                    <i class="fas fa-tags"></i>
                    Tags
                </div>

                @foreach($podcast->tags as $tag)

                    <a
                        href="{{ route('podcasts.tag', $tag->id) }}"
                        class="tag"
                    >
                        #{{ $tag->name }}
                    </a>

                @endforeach

            </div>

        @endif


    </div>

</div>

@endsection