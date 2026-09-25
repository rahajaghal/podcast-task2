@extends('layouts.website')

@section('title', 'Podcasts')

@push('styles')
<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .podcasts-page {
        padding: 30px 0 50px;
    }

    .podcasts-container {
        max-width: 1100px;
        margin: 0 auto;
    }


    /* =========================================================
       PAGE HEADER
    ========================================================= */

    .page-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
    }

    .header-icon {
        width: 50px;
        height: 50px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eee6f6;
        color: #5b2c83;

        border-radius: 12px;

        font-size: 22px;
    }

    .page-header h1 {
        margin: 0;

        font-size: 28px;
        font-weight: 700;

        color: #343a40;
    }

    .page-header p {
        margin: 3px 0 0;

        color: #888;
        font-size: 14px;
    }


    /* =========================================================
       SEARCH
    ========================================================= */

    .search-card {
        background: #fff;

        border-radius: 12px;

        padding: 15px;

        margin-bottom: 20px;

        box-shadow: 0 3px 15px rgba(0, 0, 0, .06);
    }

    .search-form {
        display: flex;

        gap: 10px;
    }

    .search-input-wrapper {
        position: relative;

        flex: 1;
    }

    .search-input-wrapper i {
        position: absolute;

        left: 14px;
        top: 50%;

        transform: translateY(-50%);

        color: #999;
    }

    .search-input {
        width: 100%;

        height: 42px;

        border: 1px solid #ddd;

        border-radius: 8px;

        padding: 0 15px 0 40px;

        outline: none;

        font-size: 14px;
    }

    .search-input:focus {
        border-color: #8b5aa8;

        box-shadow: 0 0 0 2px rgba(91, 44, 131, .08);
    }

    .search-button {
        height: 42px;

        padding: 0 20px;

        border: none;

        border-radius: 8px;

        background: #5b2c83;

        color: #fff;

        font-size: 14px;

        cursor: pointer;
    }

    .search-button:hover {
        background: #482267;
    }


    /* =========================================================
       FILTERS
    ========================================================= */

    .filter-card {
        background: #fff;

        border-radius: 12px;

        padding: 15px;

        margin-bottom: 25px;

        box-shadow: 0 3px 15px rgba(0, 0, 0, .06);
    }

    .filter-title {
        font-size: 13px;

        font-weight: 600;

        color: #555;

        margin-bottom: 10px;
    }

    .filter-buttons {
        display: flex;

        flex-wrap: wrap;

        gap: 7px;
    }

    .filter-button {
        display: inline-block;

        padding: 6px 12px;

        border-radius: 20px;

        background: #f3f3f3;

        color: #555;

        text-decoration: none;

        font-size: 12px;

        transition: all .15s ease;
    }

    .filter-button:hover {
        background: #eee6f6;

        color: #5b2c83;

        text-decoration: none;
    }

    .filter-button.active {
        background: #5b2c83;

        color: #fff;
    }


    /* =========================================================
       PODCASTS HEADER
    ========================================================= */

    .podcasts-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        margin-bottom: 15px;
    }

    .podcasts-header h2 {
        margin: 0;

        font-size: 20px;

        font-weight: 700;

        color: #343a40;
    }

    .podcasts-count {
        color: #888;

        font-size: 13px;
    }


    /* =========================================================
       PODCAST GRID
    ========================================================= */

    .podcasts-grid {
        display: grid;

        grid-template-columns:
            repeat(auto-fill, minmax(250px, 1fr));

        gap: 18px;
    }


    /* =========================================================
       PODCAST CARD
    ========================================================= */

    .podcast-card {
        display: block;

        background: #fff;

        border-radius: 12px;

        overflow: hidden;

        box-shadow: 0 3px 15px rgba(0, 0, 0, .07);

        text-decoration: none !important;

        color: inherit;

        transition:
            transform .18s ease,
            box-shadow .18s ease;
    }

    .podcast-card:hover {
        transform: translateY(-3px);

        box-shadow: 0 7px 22px rgba(0, 0, 0, .12);
    }


    /* =========================================================
       PODCAST IMAGE
    ========================================================= */

    .podcast-image-wrapper {
        position: relative;

        width: 100%;

        height: 165px;

        overflow: hidden;

        background: #f0e8f7;
    }

    .podcast-image {
        width: 100%;

        height: 100%;

        object-fit: cover;

        transition: transform .25s ease;
    }

    .podcast-card:hover .podcast-image {
        transform: scale(1.03);
    }

    .podcast-placeholder {
        width: 100%;

        height: 100%;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #5b2c83;

        font-size: 45px;
    }


    /* =========================================================
       PLAY OVERLAY
    ========================================================= */

    .podcast-overlay {
        position: absolute;

        inset: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        background: rgba(0, 0, 0, .08);

        opacity: 0;

        transition: opacity .2s ease;
    }

    .podcast-card:hover .podcast-overlay {
        opacity: 1;
    }

    .play-overlay {
        width: 48px;

        height: 48px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 50%;

        background: #5b2c83;

        color: #fff;

        font-size: 18px;

        box-shadow: 0 4px 12px rgba(0, 0, 0, .2);
    }


    /* =========================================================
       CARD BODY
    ========================================================= */

    .podcast-body {
        padding: 15px;
    }

    .podcast-title {
        margin: 0 0 6px;

        font-size: 17px;

        line-height: 1.3;

        font-weight: 700;

        color: #343a40;

        display: -webkit-box;

        -webkit-line-clamp: 2;

        -webkit-box-orient: vertical;

        overflow: hidden;
    }

    .podcast-channel {
        color: #777;

        font-size: 13px;

        margin-bottom: 0;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;
    }

    .podcast-channel i {
        color: #5b2c83;

        margin-right: 4px;
    }


    /* =========================================================
       CATEGORY + RATING ROW
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

        border-radius: 12px;

        padding: 50px 20px;

        text-align: center;

        box-shadow: 0 3px 15px rgba(0, 0, 0, .06);
    }

    .empty-state i {
        font-size: 45px;

        color: #d8c9e3;

        margin-bottom: 15px;
    }

    .empty-state h3 {
        margin: 0 0 7px;

        color: #555;

        font-size: 18px;
    }

    .empty-state p {
        margin: 0;

        color: #999;

        font-size: 13px;
    }


    /* =========================================================
       NO CATEGORIES
    ========================================================= */

    .no-categories {
        padding: 20px;

        background: #fff8e1;

        border: 1px solid #ffe082;

        border-radius: 10px;

        color: #856404;

        font-size: 14px;

        margin-bottom: 20px;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 768px) {

        .podcasts-page {
            padding: 20px 0 40px;
        }

        .podcasts-container {
            padding: 0 10px;
        }

        .page-header h1 {
            font-size: 24px;
        }

        .search-form {
            flex-direction: column;
        }

        .search-button {
            width: 100%;
        }

        .podcasts-grid {
            grid-template-columns:
                repeat(auto-fill, minmax(220px, 1fr));

            gap: 15px;
        }
    }


    @media (max-width: 480px) {

        .podcasts-grid {
            grid-template-columns: 1fr;
        }

        .podcast-image-wrapper {
            height: 190px;
        }

        .podcast-info-row {
            gap: 5px;
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

<div class="podcasts-page">

    <div class="podcasts-container">


        {{-- =====================================================
             PAGE HEADER
        ====================================================== --}}

        <div class="page-header">

            <div class="header-icon">

                <i class="fas fa-podcast"></i>

            </div>

            <div>

                <h1>
                    Podcasts
                </h1>

                <p>
                    Discover podcasts based on your interests.
                </p>

            </div>

        </div>



        {{-- =====================================================
             SEARCH
        ====================================================== --}}

        <div class="search-card">

            <form
                action="{{ route('dashboard') }}"
                method="GET"
                class="search-form"
            >

                <div class="search-input-wrapper">

                    <i class="fas fa-search"></i>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search podcasts..."
                        class="search-input"
                    >

                </div>


                <button
                    type="submit"
                    class="search-button"
                >
                    <i class="fas fa-search mr-1"></i>
                    Search
                </button>

            </form>

        </div>



        {{-- =====================================================
             CATEGORY FILTER
        ====================================================== --}}

        @if($categories->count())

            <div class="filter-card">

                <div class="filter-title">

                    <i class="fas fa-filter mr-1"></i>

                    Filter by category

                </div>


                <div class="filter-buttons">


                    {{-- ALL --}}

                    <a
                        href="{{ route('dashboard', [
                            'search' => request('search')
                        ]) }}"
                        class="filter-button
                        {{ !request('categoryId') ? 'active' : '' }}"
                    >
                        All
                    </a>


                    {{-- CATEGORIES --}}

                    @foreach($categories as $category)

                        <a
                            href="{{ route('dashboard', [
                                'categoryId' => $category->id,
                                'search' => request('search')
                            ]) }}"
                            class="filter-button
                            {{ request('categoryId') == $category->id
                                ? 'active'
                                : '' }}"
                        >
                            {{ $category->name }}
                        </a>

                    @endforeach

                </div>

            </div>

        @else

            <div class="no-categories">

                <i class="fas fa-info-circle mr-1"></i>

                You have not selected any podcast categories yet.

            </div>

        @endif



        {{-- =====================================================
             PODCASTS HEADER
        ====================================================== --}}

        <div class="podcasts-header">

            <h2>
                Latest Podcasts
            </h2>

            <span class="podcasts-count">

                {{ $podcasts->count() }}

                {{ Str::plural('podcast', $podcasts->count()) }}

            </span>

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

                            @else

                                <div class="podcast-placeholder">

                                    <i class="fas fa-podcast"></i>

                                </div>

                            @endif


                            {{-- PLAY OVERLAY --}}

                            <div class="podcast-overlay">

                                <div class="play-overlay">

                                    <i class="fas fa-play"></i>

                                </div>

                            </div>


                        </div>



                        {{-- =====================================
                             CARD BODY
                        ====================================== --}}

                        <div class="podcast-body">


                            {{-- TITLE --}}

                            <h3 class="podcast-title">

                                {{ $podcast->title }}

                            </h3>


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


                                        <span class="rating-number">

                                            {{ number_format(
                                                $podcast->ratings_avg_rating,
                                                1
                                            ) }}

                                        </span>


                                        <span class="rating-count">

                                            ({{ $podcast->ratings_count }})

                                        </span>


                                    @else


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
                    Try changing your search or category filter.
                </p>

            </div>


        @endif


    </div>

</div>

@endsection