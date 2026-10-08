@extends('layouts.website')

@section('title', 'Podcasts')


@push('styles')

<style>

/* =========================================================
   PAGE
========================================================= */

.guest-podcasts-page {
    padding: 45px 0 60px;
}

.guest-podcasts-container {
    max-width: 1100px;
    margin: 0 auto;
}


/* =========================================================
   PAGE HEADER
========================================================= */

.guest-page-header {
    text-align: center;

    margin-bottom: 35px;
}

.guest-page-header-icon {
    width: 58px;
    height: 58px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin: 0 auto 15px;

    background: #eee6f6;

    color: #6f42c1;

    border-radius: 15px;

    font-size: 25px;
}

.guest-page-header h1 {
    margin: 0;

    color: #343a40;

    font-size: 30px;

    font-weight: 700;
}

.guest-page-header p {
    margin: 7px 0 0;

    color: #888;

    font-size: 14px;
}


/* =========================================================
   SEARCH
========================================================= */

.guest-search-card {
    background: #ffffff;

    border-radius: 12px;

    padding: 15px;

    margin-bottom: 25px;

    box-shadow:
        0 3px 15px rgba(0, 0, 0, .06);
}

.guest-search-form {
    display: flex;

    gap: 10px;
}

.guest-search-input-wrapper {
    position: relative;

    flex: 1;
}

.guest-search-input-wrapper i {
    position: absolute;

    left: 14px;

    top: 50%;

    transform: translateY(-50%);

    color: #999;
}

.guest-search-input {
    width: 100%;

    height: 44px;

    padding: 0 15px 0 40px;

    border: 1px solid #ddd;

    border-radius: 8px;

    outline: none;

    font-size: 14px;

    box-sizing: border-box;
}

.guest-search-input:focus {
    border-color: #6f42c1;

    box-shadow:
        0 0 0 2px rgba(111, 66, 193, .08);
}

.guest-search-button {
    height: 44px;

    padding: 0 22px;

    border: none;

    border-radius: 8px;

    background: #6f42c1;

    color: #fff;

    font-size: 14px;

    cursor: pointer;

    white-space: nowrap;

    transition: background .15s ease;
}

.guest-search-button:hover {
    background: #59339d;
}


/* =========================================================
   CATEGORIES
========================================================= */

.guest-category-card {
    background: #ffffff;

    border-radius: 12px;

    padding: 18px;

    margin-bottom: 30px;

    box-shadow:
        0 3px 15px rgba(0, 0, 0, .06);
}

.guest-category-title {
    margin-bottom: 12px;

    color: #555;

    font-size: 13px;

    font-weight: 600;
}

.guest-category-buttons {
    display: flex;

    flex-wrap: wrap;

    gap: 7px;
}

.guest-category-button {
    display: inline-flex;

    align-items: center;

    gap: 5px;

    padding: 7px 13px;

    border-radius: 20px;

    background: #f3f3f3;

    border: 1px solid #eeeeee;

    color: #555;

    text-decoration: none;

    font-size: 12px;

    transition: all .15s ease;
}

.guest-category-button:hover {
    background: #eee6f6;

    border-color: #d9c8e8;

    color: #6f42c1;

    text-decoration: none;
}

.guest-category-button.active {
    background: #6f42c1;

    border-color: #6f42c1;

    color: #ffffff;
}


/* =========================================================
   RESULTS HEADER
========================================================= */

.guest-results-header {
    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 18px;
}

.guest-results-header h2 {
    margin: 0;

    color: #343a40;

    font-size: 21px;

    font-weight: 700;
}

.guest-results-count {
    color: #888;

    font-size: 13px;
}


/* =========================================================
   PODCAST GRID
========================================================= */

.guest-podcasts-grid {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 20px;
}


/* =========================================================
   PODCAST CARD
========================================================= */

.guest-podcast-card {
    display: block;

    overflow: hidden;

    background: #ffffff;

    border-radius: 12px;

    color: inherit;

    text-decoration: none !important;

    box-shadow:
        0 3px 15px rgba(0, 0, 0, .07);

    transition:
        transform .2s ease,
        box-shadow .2s ease;
}

.guest-podcast-card:hover {
    transform: translateY(-4px);

    color: inherit;

    box-shadow:
        0 9px 25px rgba(0, 0, 0, .12);
}


/* =========================================================
   IMAGE
========================================================= */

.guest-podcast-image-wrapper {
    position: relative;

    width: 100%;

    height: 200px;

    overflow: hidden;

    background: #f1eafa;
}

.guest-podcast-image {
    width: 100%;

    height: 100%;

    object-fit: cover;

    display: block;

    transition: transform .3s ease;
}

.guest-podcast-card:hover .guest-podcast-image {
    transform: scale(1.04);
}


/* =========================================================
   IMAGE PLACEHOLDER
========================================================= */

.guest-podcast-placeholder {
    width: 100%;

    height: 100%;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #f1eafa;

    color: #6f42c1;

    font-size: 55px;
}


/* =========================================================
   PLAY BUTTON
========================================================= */

.guest-play-button {
    position: absolute;

    right: 14px;

    bottom: 14px;

    width: 44px;

    height: 44px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    background: #6f42c1;

    color: #ffffff;

    font-size: 15px;

    box-shadow:
        0 4px 12px rgba(0, 0, 0, .22);

    transition:
        transform .2s ease,
        background .2s ease;
}

.guest-podcast-card:hover .guest-play-button {
    background: #59339d;

    transform: scale(1.06);
}


/* =========================================================
   CARD BODY
========================================================= */

.guest-podcast-body {
    padding: 16px;
}


/* =========================================================
   CATEGORY BADGE
========================================================= */

.guest-podcast-category {
    display: inline-flex;

    align-items: center;

    gap: 5px;

    padding: 5px 9px;

    margin-bottom: 9px;

    border-radius: 20px;

    background: #f1eafa;

    color: #6f42c1;

    font-size: 10px;

    font-weight: 600;
}


/* =========================================================
   TITLE
========================================================= */

.guest-podcast-title {
    margin: 0 0 7px;

    color: #343a40;

    font-size: 17px;

    font-weight: 700;

    line-height: 1.35;

    display: -webkit-box;

    -webkit-line-clamp: 2;

    -webkit-box-orient: vertical;

    overflow: hidden;
}


/* =========================================================
   CHANNEL
========================================================= */

.guest-podcast-channel {
    display: flex;

    align-items: center;

    gap: 5px;

    margin-bottom: 10px;

    color: #777;

    font-size: 12px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}

.guest-podcast-channel i {
    color: #6f42c1;

    flex-shrink: 0;
}


/* =========================================================
   RATING
========================================================= */

.guest-podcast-rating {
    display: flex;

    align-items: center;

    gap: 5px;
}

.guest-rating-stars {
    display: inline-flex;

    align-items: center;

    gap: 1px;

    color: #f5b301;

    font-size: 12px;
}

.guest-rating-stars .empty-star {
    color: #d9d9d9;
}

.guest-rating-number {
    color: #666;

    font-size: 11px;

    font-weight: 600;
}

.guest-rating-count {
    color: #999;

    font-size: 10px;
}


/* =========================================================
   CUSTOM PAGINATION
========================================================= */

.guest-custom-pagination {
    width: 100%;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    margin-top: 32px;

    padding: 0;

    box-sizing: border-box;
}


/* =========================================================
   PAGINATION NUMBERS
========================================================= */

.guest-pagination-numbers {
    display: flex;

    flex-direction: row;

    align-items: center;

    justify-content: center;

    gap: 5px;

    margin: 0;

    padding: 0;

    white-space: nowrap;
}


/* =========================================================
   PAGINATION BUTTON
========================================================= */

.guest-pagination-button {
    width: 34px;

    height: 34px;

    min-width: 34px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    flex: 0 0 34px;

    padding: 0;

    margin: 0;

    border: 1px solid #e3d9eb;

    border-radius: 7px;

    background: #ffffff;

    color: #6f42c1;

    text-decoration: none;

    font-size: 10px;

    line-height: 1;

    box-sizing: border-box;

    transition: all .15s ease;
}

.guest-pagination-button:hover {
    background: #eee6f6;

    border-color: #d4c2df;

    color: #59339d;

    text-decoration: none;
}


/* =========================================================
   PAGINATION ARROWS
========================================================= */

.guest-pagination-button i {
    display: inline-block;

    width: auto;

    height: auto;

    margin: 0;

    padding: 0;

    font-size: 9px;

    line-height: 1;
}


/* =========================================================
   PAGINATION NUMBER
========================================================= */

.guest-pagination-number {
    width: 34px;

    height: 34px;

    min-width: 34px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    flex: 0 0 34px;

    padding: 0;

    margin: 0;

    border: 1px solid #e3d9eb;

    border-radius: 7px;

    background: #ffffff;

    color: #6f42c1;

    text-decoration: none;

    font-size: 12px;

    font-weight: 500;

    line-height: 1;

    box-sizing: border-box;

    transition: all .15s ease;
}

.guest-pagination-number:hover {
    background: #eee6f6;

    border-color: #d4c2df;

    color: #59339d;

    text-decoration: none;
}


/* =========================================================
   ACTIVE PAGE
========================================================= */

.guest-pagination-number.active {
    background: #6f42c1;

    border-color: #6f42c1;

    color: #ffffff;

    font-weight: 600;
}


/* =========================================================
   DISABLED PAGINATION
========================================================= */

.guest-pagination-button.disabled {
    background: #f7f7f7;

    border-color: #eeeeee;

    color: #bdbdbd;

    cursor: default;

    pointer-events: none;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.guest-empty-state {
    padding: 60px 20px;

    text-align: center;

    background: #ffffff;

    border-radius: 12px;

    box-shadow:
        0 3px 15px rgba(0, 0, 0, .06);
}

.guest-empty-icon {
    margin-bottom: 15px;

    color: #d8c9e3;

    font-size: 50px;
}

.guest-empty-state h3 {
    margin: 0 0 7px;

    color: #555;

    font-size: 19px;
}

.guest-empty-state p {
    margin: 0 0 18px;

    color: #999;

    font-size: 13px;
}

.guest-empty-button {
    display: inline-flex;

    align-items: center;

    gap: 5px;

    padding: 8px 15px;

    border-radius: 8px;

    background: #6f42c1;

    color: #ffffff;

    text-decoration: none;

    font-size: 13px;

    transition: background .15s ease;
}

.guest-empty-button:hover {
    background: #59339d;

    color: #ffffff;

    text-decoration: none;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 900px) {

    .guest-podcasts-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 650px) {

    .guest-podcasts-page {
        padding: 30px 10px 45px;
    }

    .guest-page-header h1 {
        font-size: 25px;
    }

    .guest-page-header p {
        font-size: 13px;
    }

    .guest-search-form {
        flex-direction: column;
    }

    .guest-search-button {
        width: 100%;
    }

    .guest-podcasts-grid {
        grid-template-columns: 1fr;

        gap: 15px;
    }

    .guest-results-header {
        align-items: flex-start;

        gap: 10px;
    }

    .guest-results-header h2 {
        font-size: 18px;
    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 480px) {

    .guest-podcast-image-wrapper {
        height: 190px;
    }

    .guest-custom-pagination {
        gap: 5px;
    }

    .guest-pagination-numbers {
        gap: 3px;
    }

    .guest-pagination-button {
        width: 31px;

        height: 31px;

        min-width: 31px;

        flex-basis: 31px;
    }

    .guest-pagination-number {
        width: 31px;

        height: 31px;

        min-width: 31px;

        flex-basis: 31px;

        font-size: 11px;
    }

    .guest-pagination-button i {
        font-size: 8px;
    }

}

</style>

@endpush


@section('content')

<div class="guest-podcasts-page">

    <div class="guest-podcasts-container">


        {{-- =====================================================
             PAGE HEADER
        ====================================================== --}}

        <div class="guest-page-header">

            <div class="guest-page-header-icon">

                <i class="fas fa-podcast"></i>

            </div>


            <h1>
                Discover Podcasts
            </h1>


            <p>
                Explore our podcasts and discover something you love.
            </p>

        </div>


        {{-- =====================================================
             SEARCH
        ====================================================== --}}

        <div class="guest-search-card">

            <form
                action="{{ route('guest.index') }}"
                method="GET"
                class="guest-search-form"
            >

                <div class="guest-search-input-wrapper">

                    <i class="fas fa-search"></i>

                    <input
                        type="text"
                        name="search"
                        class="guest-search-input"
                        placeholder="Search podcasts..."
                        value="{{ request('search') }}"
                    >

                </div>


                <button
                    type="submit"
                    class="guest-search-button"
                >

                    <i class="fas fa-search mr-1"></i>

                    Search

                </button>

            </form>

        </div>


        {{-- =====================================================
             CATEGORIES
        ====================================================== --}}

        <div class="guest-category-card">


            <div class="guest-category-title">

                <i class="fas fa-filter mr-1"></i>

                Browse by category

            </div>


            <div class="guest-category-buttons">


                {{-- ALL --}}

                <a
                    href="{{ route('guest.index', [
                        'search' => request('search')
                    ]) }}"
                    class="guest-category-button
                        {{ !request('categoryId')
                            ? 'active'
                            : '' }}"
                >

                    <i class="fas fa-th-large"></i>

                    All

                </a>


                {{-- CATEGORIES --}}

                @foreach ($categories as $category)

                    <a
                        href="{{ route('guest.index', [
                            'categoryId' => $category->id,
                            'search' => request('search')
                        ]) }}"
                        class="guest-category-button
                            {{ request('categoryId') == $category->id
                                ? 'active'
                                : '' }}"
                    >

                        {{ $category->name }}

                    </a>

                @endforeach


            </div>

        </div>


        {{-- =====================================================
             RESULTS HEADER
        ====================================================== --}}

        <div class="guest-results-header">


            <div>

                <h2>

                    @if(request('categoryId'))

                        @php

                            $selectedCategory =
                                $categories->firstWhere(
                                    'id',
                                    request('categoryId')
                                );

                        @endphp

                        {{ $selectedCategory?->name ?? 'Podcasts' }}

                    @else

                        Latest Podcasts

                    @endif

                </h2>

            </div>


            {{-- TOTAL RESULTS --}}

            <div class="guest-results-count">

                {{ $podcasts->total() }}

                {{ Str::plural(
                    'podcast',
                    $podcasts->total()
                ) }}

            </div>


        </div>


        {{-- =====================================================
             PODCASTS
        ====================================================== --}}

        @if($podcasts->count())


            <div class="guest-podcasts-grid">


                @foreach($podcasts as $podcast)


                    <a
                        href="{{ route(
                            'podcast.show',
                            $podcast->id
                        ) }}"
                        class="guest-podcast-card"
                    >


                        {{-- =================================================
                             IMAGE
                        ================================================== --}}

                        <div class="guest-podcast-image-wrapper">


                            @if($podcast->channel?->image)

                                <img
                                    src="{{ asset(
                                        'storage/' .
                                        $podcast->channel->image
                                    ) }}"
                                    alt="{{ $podcast->channel->name }}"
                                    class="guest-podcast-image"
                                >

                            @else

                                <div class="guest-podcast-placeholder">

                                    <i class="fas fa-podcast"></i>

                                </div>

                            @endif


                            {{-- PLAY BUTTON --}}

                            <div class="guest-play-button">

                                <i class="fas fa-play"></i>

                            </div>


                        </div>


                        {{-- =================================================
                             CARD BODY
                        ================================================== --}}

                        <div class="guest-podcast-body">


                            {{-- CATEGORY --}}

                            @if($podcast->category)

                                <div class="guest-podcast-category">

                                    <i class="fas fa-tag"></i>

                                    {{ $podcast->category->name }}

                                </div>

                            @endif


                            {{-- TITLE --}}

                            <h3 class="guest-podcast-title">

                                {{ $podcast->title }}

                            </h3>


                            {{-- CHANNEL --}}

                            @if($podcast->channel)

                                <div class="guest-podcast-channel">

                                    <i class="fas fa-microphone"></i>

                                    <span>
                                        {{ $podcast->channel->name }}
                                    </span>

                                </div>

                            @endif


                            {{-- RATING --}}

                            <div class="guest-podcast-rating">


                                @if($podcast->ratings_count > 0)


                                    <div class="guest-rating-stars">


                                        @for($i = 1; $i <= 5; $i++)


                                            @if(
                                                $podcast->ratings_avg_rating >= $i
                                            )

                                                <i class="fas fa-star"></i>


                                            @elseif(
                                                $podcast->ratings_avg_rating >= ($i - 0.5)
                                            )

                                                <i class="fas fa-star-half-alt"></i>


                                            @else

                                                <i class="far fa-star empty-star"></i>

                                            @endif


                                        @endfor


                                    </div>


                                    <span class="guest-rating-number">

                                        {{ number_format(
                                            $podcast->ratings_avg_rating,
                                            1
                                        ) }}

                                    </span>


                                    <span class="guest-rating-count">

                                        ({{ $podcast->ratings_count }})

                                    </span>


                                @else


                                    <div class="guest-rating-stars">

                                        <i class="far fa-star empty-star"></i>

                                        <i class="far fa-star empty-star"></i>

                                        <i class="far fa-star empty-star"></i>

                                        <i class="far fa-star empty-star"></i>

                                        <i class="far fa-star empty-star"></i>

                                    </div>


                                    <span class="guest-rating-count">

                                        No ratings

                                    </span>


                                @endif


                            </div>


                        </div>


                    </a>


                @endforeach


            </div>


            {{-- =====================================================
                 CUSTOM PAGINATION
            ====================================================== --}}

            @if($podcasts->hasPages())

                <div class="guest-custom-pagination">


                    {{-- PREVIOUS --}}

                    @if($podcasts->onFirstPage())

                        <span class="guest-pagination-button disabled">

                            <i class="fas fa-chevron-left"></i>

                        </span>

                    @else

                        <a
                            href="{{ $podcasts->previousPageUrl() }}"
                            class="guest-pagination-button"
                            aria-label="Previous page"
                        >

                            <i class="fas fa-chevron-left"></i>

                        </a>

                    @endif


                    {{-- PAGE NUMBERS --}}

                    <div class="guest-pagination-numbers">


                        @for(
                            $page = 1;
                            $page <= $podcasts->lastPage();
                            $page++
                        )


                            @if(
                                $page == $podcasts->currentPage()
                            )

                                <span class="guest-pagination-number active">

                                    {{ $page }}

                                </span>

                            @else

                                <a
                                    href="{{ $podcasts->url($page) }}"
                                    class="guest-pagination-number"
                                >

                                    {{ $page }}

                                </a>

                            @endif


                        @endfor


                    </div>


                    {{-- NEXT --}}

                    @if($podcasts->hasMorePages())

                        <a
                            href="{{ $podcasts->nextPageUrl() }}"
                            class="guest-pagination-button"
                            aria-label="Next page"
                        >

                            <i class="fas fa-chevron-right"></i>

                        </a>

                    @else

                        <span class="guest-pagination-button disabled">

                            <i class="fas fa-chevron-right"></i>

                        </span>

                    @endif


                </div>

            @endif


        @else


            {{-- =====================================================
                 EMPTY STATE
            ====================================================== --}}

            <div class="guest-empty-state">


                <div class="guest-empty-icon">

                    <i class="fas fa-podcast"></i>

                </div>


                <h3>
                    No podcasts found
                </h3>


                <p>
                    Try another search or category.
                </p>


                <a
                    href="{{ route('guest.index') }}"
                    class="guest-empty-button"
                >

                    <i class="fas fa-redo"></i>

                    Show All Podcasts

                </a>


            </div>


        @endif


    </div>

</div>

@endsection