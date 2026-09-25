@extends('layouts.website')

@section('title', '#' . $tag->name)

@push('styles')
<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .tag-page {
        padding: 30px 0;
    }


    /* =========================================================
       TAG HEADER
    ========================================================= */

    .tag-header {
        background: #fff;

        border-radius: 15px;

        padding: 20px;

        margin-bottom: 25px;

        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
    }

    .tag-header h1 {
        margin: 0;

        font-size: 26px;

        font-weight: 700;

        color: #343a40;
    }

    .tag-header p {
        margin: 5px 0 0;

        color: #777;

        font-size: 14px;
    }


    /* =========================================================
       PODCAST GRID
    ========================================================= */

    .podcasts-grid {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 20px;
    }


    /* =========================================================
       PODCAST CARD
    ========================================================= */

    .podcast-card {
        display: block;

        background: #fff;

        border-radius: 15px;

        overflow: hidden;

        box-shadow: 0 4px 15px rgba(0, 0, 0, .07);

        text-decoration: none !important;

        color: inherit;

        transition:
            transform .2s ease,
            box-shadow .2s ease;
    }

    .podcast-card:hover {
        transform: translateY(-4px);

        box-shadow: 0 8px 25px rgba(0, 0, 0, .12);
    }


    /* =========================================================
       PODCAST IMAGE
    ========================================================= */

    .podcast-image-wrapper {
        position: relative;

        width: 100%;

        height: 190px;

        overflow: hidden;

        background: #f0e8f7;
    }

    .podcast-image {
        width: 100%;

        height: 100%;

        object-fit: cover;
    }

    .podcast-placeholder {
        width: 100%;

        height: 100%;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #5b2c83;

        font-size: 45px;

        background: #f0e8f7;
    }


    /* =========================================================
       IMAGE OVERLAY
    ========================================================= */

    .podcast-overlay {
        position: absolute;

        inset: 0;

        background: rgba(0, 0, 0, .15);
    }


    /* =========================================================
       PLAY BUTTON
    ========================================================= */

    .play-overlay {
        position: absolute;

        inset: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        opacity: 0;

        transition: opacity .2s ease;
    }

    .podcast-card:hover .play-overlay {
        opacity: 1;
    }

    .play-button {
        width: 55px;

        height: 55px;

        border-radius: 50%;

        background: #5b2c83;

        color: #fff;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 20px;

        padding-left: 3px;
    }


    /* =========================================================
       PODCAST BODY
    ========================================================= */

    .podcast-body {
        padding: 15px;
    }


    /* =========================================================
       TITLE
    ========================================================= */

    .podcast-title {
        font-size: 17px;

        font-weight: 700;

        color: #343a40;

        margin-bottom: 8px;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;
    }


    /* =========================================================
       CHANNEL
    ========================================================= */

    .podcast-channel {
        color: #777;

        font-size: 13px;

        margin-bottom: 0;
    }

    .podcast-channel i {
        color: #5b2c83;

        margin-right: 5px;
    }


    /* =========================================================
       CATEGORY + RATING
    ========================================================= */

    .podcast-info-row {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 8px;

        margin-top: 12px;

        min-width: 0;
    }


    /* =========================================================
       CATEGORY
    ========================================================= */

    .podcast-category {
        display: inline-flex;

        align-items: center;

        gap: 5px;

        padding: 5px 9px;

        border-radius: 20px;

        background: #f1eafa;

        color: #5b2c83;

        font-size: 11px;

        font-weight: 600;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;

        max-width: 52%;

        flex-shrink: 1;
    }

    .podcast-category i {
        font-size: 10px;
    }


    /* =========================================================
       RATING
    ========================================================= */

    .podcast-rating {
        display: inline-flex;

        align-items: center;

        gap: 4px;

        margin-left: auto;

        white-space: nowrap;

        flex-shrink: 0;
    }

    .rating-stars {
        display: inline-flex;

        align-items: center;

        gap: 0;

        color: #f5b301;

        font-size: 12px;

        line-height: 1;
    }

    .rating-stars .empty-star {
        color: #d9d9d9;
    }

    .rating-number {
        color: #666;

        font-size: 11px;

        font-weight: 700;
    }

    .rating-count {
        color: #999;

        font-size: 10px;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        background: #fff;

        border-radius: 15px;

        padding: 50px 20px;

        text-align: center;

        box-shadow: 0 5px 20px rgba(0, 0, 0, .07);
    }

    .empty-state i {
        font-size: 45px;

        color: #cfcfcf;

        margin-bottom: 15px;
    }

    .empty-state h3 {
        font-size: 20px;

        color: #555;

        margin-bottom: 5px;
    }

    .empty-state p {
        color: #888;

        margin: 0;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 992px) {

        .podcasts-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }

    }


    @media (max-width: 600px) {

        .podcasts-grid {
            grid-template-columns: 1fr;
        }

        .tag-page {
            padding: 20px 0;
        }

        .podcast-image-wrapper {
            height: 210px;
        }

        .podcast-category {
            max-width: 48%;
        }

        .rating-stars {
            font-size: 11px;
        }

        .rating-number {
            font-size: 10px;
        }

        .rating-count {
            font-size: 9px;
        }

    }

</style>
@endpush


@section('content')

<div class="tag-page">


    {{-- =====================================================
         BACK BUTTON
    ====================================================== --}}

    <a
        href="{{ route('dashboard') }}"
        class="btn btn-sm btn-link text-primary mb-3 p-0"
    >

        <i class="fas fa-arrow-left"></i>

        Back to Podcasts

    </a>



    {{-- =====================================================
         TAG HEADER
    ====================================================== --}}

    <div class="tag-header">

        <h1>
            #{{ $tag->name }}
        </h1>

        <p>
            Podcasts tagged with #{{ $tag->name }}
        </p>

    </div>



    {{-- =====================================================
         PODCASTS
    ====================================================== --}}

    @if($podcasts->count())


        <div class="podcasts-grid">


            @foreach($podcasts as $podcast)


                <a
                    href="{{ route('podcast.show', $podcast->id) }}"
                    class="podcast-card"
                >


                    {{-- =====================================
                         IMAGE
                    ====================================== --}}

                    <div class="podcast-image-wrapper">


                        @if(
                            $podcast->channel &&
                            $podcast->channel->image
                        )

                            <img
                                src="{{ asset(
                                    'storage/' .
                                    $podcast->channel->image
                                ) }}"
                                alt="{{ $podcast->channel->name }}"
                                class="podcast-image"
                            >

                            <div class="podcast-overlay"></div>

                        @else

                            <div class="podcast-placeholder">

                                <i class="fas fa-podcast"></i>

                            </div>

                        @endif


                        {{-- PLAY BUTTON --}}

                        <div class="play-overlay">

                            <div class="play-button">

                                <i class="fas fa-play"></i>

                            </div>

                        </div>


                    </div>



                    {{-- =====================================
                         PODCAST INFORMATION
                    ====================================== --}}

                    <div class="podcast-body">


                        {{-- TITLE --}}

                        <div class="podcast-title">

                            {{ $podcast->title }}

                        </div>



                        {{-- CHANNEL --}}

                        @if($podcast->channel)

                            <div class="podcast-channel">

                                <i class="fas fa-microphone"></i>

                                {{ $podcast->channel->name }}

                            </div>

                        @endif



                        {{-- =================================
                             CATEGORY + RATING
                        ================================== --}}

                        <div class="podcast-info-row">


                            {{-- CATEGORY --}}

                            @if($podcast->category)

                                <div class="podcast-category">

                                    <i class="fas fa-tag"></i>

                                    {{ $podcast->category->name }}

                                </div>

                            @endif



                            {{-- RATING --}}

                            <div class="podcast-rating">


                                @if($podcast->ratings_count > 0)


                                    {{-- STARS --}}

                                    <div class="rating-stars">


                                        @for($i = 1; $i <= 5; $i++)


                                            @if(
                                                $podcast->ratings_avg_rating
                                                >= $i
                                            )

                                                <span>
                                                    ★
                                                </span>

                                            @else

                                                <span
                                                    class="empty-star"
                                                >
                                                    ★
                                                </span>

                                            @endif


                                        @endfor


                                    </div>



                                    {{-- AVERAGE --}}

                                    <span class="rating-number">

                                        {{ number_format(
                                            $podcast->ratings_avg_rating,
                                            1
                                        ) }}

                                    </span>



                                    {{-- NUMBER OF RATINGS --}}

                                    <span class="rating-count">

                                        ({{ $podcast->ratings_count }})

                                    </span>


                                @else


                                    {{-- NO RATINGS --}}

                                    <div class="rating-stars">

                                        <span class="empty-star">
                                            ★
                                        </span>

                                        <span class="empty-star">
                                            ★
                                        </span>

                                        <span class="empty-star">
                                            ★
                                        </span>

                                        <span class="empty-star">
                                            ★
                                        </span>

                                        <span class="empty-star">
                                            ★
                                        </span>

                                    </div>


                                    <span class="rating-count">

                                        No ratings

                                    </span>


                                @endif


                            </div>


                        </div>


                    </div>


                </a>


            @endforeach


        </div>


    @else


        {{-- =================================================
             EMPTY STATE
        ================================================== --}}

        <div class="empty-state">

            <i class="fas fa-podcast"></i>

            <h3>
                No podcasts found
            </h3>

            <p>
                There are no approved podcasts with
                the tag #{{ $tag->name }} yet.
            </p>

        </div>


    @endif


</div>

@endsection