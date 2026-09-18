@extends('layouts.website')

@section('title', 'Podcasts')


@push('styles')

<style>

/* =========================================================
   PAGE
========================================================= */

.podcasts-page {
    min-height: calc(100vh - 140px);

    padding: 50px 20px 70px;

    background:
        linear-gradient(
            135deg,
            #f8f5ff 0%,
            #ffffff 50%,
            #f8f5ff 100%
        );
}

.podcasts-container {
    max-width: 1200px;

    margin: 0 auto;
}


/* =========================================================
   PAGE HEADER
========================================================= */

.page-header {
    text-align: center;

    margin-bottom: 35px;
}

.header-icon {
    width: 75px;
    height: 75px;

    margin: 0 auto 18px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 22px;

    background: #5b2c83;

    color: #ffffff;

    font-size: 30px;

    box-shadow:
        0 10px 25px rgba(91, 44, 131, 0.20);
}

.page-header h1 {
    margin: 0 0 10px;

    color: #3f205c;

    font-size: 38px;

    font-weight: 800;
}

.page-header p {
    margin: 0;

    color: #777;

    font-size: 16px;
}


/* =========================================================
   SEARCH CARD
========================================================= */

.search-card {
    background: #ffffff;

    border-radius: 22px;

    padding: 25px;

    margin-bottom: 25px;

    box-shadow:
        0 8px 30px rgba(91, 44, 131, 0.08);
}

.search-form {
    display: flex;

    align-items: center;

    gap: 12px;
}

.search-input-wrapper {
    position: relative;

    flex: 1;
}

.search-input-wrapper i {
    position: absolute;

    left: 17px;
    top: 50%;

    transform: translateY(-50%);

    color: #8c6ba5;

    font-size: 16px;
}

.search-input {
    width: 100%;

    height: 52px;

    padding: 0 18px 0 48px;

    border: 1px solid #e2dce8;

    border-radius: 14px;

    outline: none;

    background: #faf9fc;

    color: #333;

    font-size: 15px;

    transition: all 0.2s ease;
}

.search-input:focus {
    border-color: #5b2c83;

    background: #ffffff;

    box-shadow:
        0 0 0 3px rgba(91, 44, 131, 0.08);
}

.search-input::placeholder {
    color: #aaa;
}

.search-button {
    height: 52px;

    padding: 0 25px;

    border: none;

    border-radius: 14px;

    background: #5b2c83;

    color: #ffffff;

    font-size: 15px;

    font-weight: 700;

    cursor: pointer;

    transition: all 0.2s ease;
}

.search-button:hover {
    background: #472066;

    transform: translateY(-1px);

    box-shadow:
        0 7px 18px rgba(91, 44, 131, 0.20);
}

.search-button i {
    margin-right: 7px;
}


/* =========================================================
   SEARCH RESULT
========================================================= */

.search-result {
    margin-top: 18px;

    padding-top: 18px;

    border-top: 1px solid #eeeeee;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;
}

.search-result-text {
    color: #666;

    font-size: 14px;
}

.search-result-text strong {
    color: #5b2c83;
}

.clear-search {
    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 7px 12px;

    border-radius: 9px;

    background: #f5eff9;

    color: #5b2c83;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

    transition: all 0.2s ease;
}

.clear-search:hover {
    background: #5b2c83;

    color: #ffffff;

    text-decoration: none;
}


/* =========================================================
   CATEGORY FILTER CARD
========================================================= */

.filter-card {
    background: #ffffff;

    border-radius: 22px;

    padding: 25px;

    margin-bottom: 35px;

    box-shadow:
        0 8px 30px rgba(91, 44, 131, 0.08);
}

.filter-header {
    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    margin-bottom: 18px;
}

.filter-title {
    display: flex;

    align-items: center;

    gap: 9px;

    color: #3f205c;

    font-size: 18px;

    font-weight: 750;
}

.filter-title i {
    color: #5b2c83;
}

.filter-subtitle {
    color: #999;

    font-size: 13px;
}

.filter-buttons {
    display: flex;

    flex-wrap: wrap;

    gap: 10px;
}

.filter-button {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 10px 18px;

    border-radius: 25px;

    border: 1px solid #e0d9e6;

    background: #ffffff;

    color: #666;

    text-decoration: none;

    font-size: 14px;

    font-weight: 600;

    transition: all 0.2s ease;
}

.filter-button:hover {
    border-color: #5b2c83;

    color: #5b2c83;

    background: #faf7fd;

    text-decoration: none;

    transform: translateY(-1px);
}

.filter-button.active {
    background: #5b2c83;

    border-color: #5b2c83;

    color: #ffffff;

    box-shadow:
        0 5px 15px rgba(91, 44, 131, 0.20);
}

.filter-button.active:hover {
    background: #472066;

    color: #ffffff;
}


/* =========================================================
   PODCAST HEADER
========================================================= */

.podcasts-header {
    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 20px;
}

.podcasts-header h2 {
    margin: 0;

    color: #3f205c;

    font-size: 23px;

    font-weight: 750;
}

.podcasts-count {
    display: inline-flex;

    align-items: center;

    padding: 6px 13px;

    border-radius: 20px;

    background: #eee6f5;

    color: #5b2c83;

    font-size: 13px;

    font-weight: 700;
}


/* =========================================================
   PODCAST GRID
========================================================= */

.podcasts-grid {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 25px;
}


/* =========================================================
   PODCAST CARD
========================================================= */

.podcast-card {
    position: relative;

    display: block;

    overflow: hidden;

    background: #ffffff;

    border-radius: 20px;

    border: 1px solid rgba(91, 44, 131, 0.06);

    box-shadow:
        0 8px 25px rgba(91, 44, 131, 0.08);

    text-decoration: none;

    color: inherit;

    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease;
}

.podcast-card:hover {
    transform: translateY(-6px);

    box-shadow:
        0 15px 35px rgba(91, 44, 131, 0.15);

    text-decoration: none;

    color: inherit;
}


/* =========================================================
   PODCAST IMAGE
========================================================= */

.podcast-image-wrapper {
    position: relative;

    width: 100%;
    height: 220px;

    overflow: hidden;

    background: #eee7f5;
}

.podcast-image {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: transform 0.35s ease;
}

.podcast-card:hover .podcast-image {
    transform: scale(1.05);
}

.podcast-overlay {
    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(35, 15, 50, 0.55),
            transparent 55%
        );

    pointer-events: none;
}


/* =========================================================
   PLAY OVERLAY
========================================================= */

.play-overlay {
    position: absolute;

    inset: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    opacity: 0;

    background: rgba(63, 32, 92, 0.20);

    transition: opacity 0.25s ease;
}

.podcast-card:hover .play-overlay {
    opacity: 1;
}

.play-button {
    width: 68px;
    height: 68px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #5b2c83;

    color: #ffffff;

    font-size: 23px;

    box-shadow:
        0 10px 30px rgba(0, 0, 0, 0.30);

    transition: transform 0.2s ease;
}

.podcast-card:hover .play-button {
    transform: scale(1.08);
}

.play-button i {
    margin-left: 4px;
}


/* =========================================================
   IMAGE PLACEHOLDER
========================================================= */

.podcast-placeholder {
    position: relative;

    width: 100%;
    height: 100%;

    display: flex;

    align-items: center;
    justify-content: center;

    background:
        linear-gradient(
            135deg,
            #eee6f5,
            #faf7fd
        );

    color: #9b7bb5;
}

.podcast-placeholder i {
    font-size: 50px;
}


/* =========================================================
   PLACEHOLDER PLAY
========================================================= */

.podcast-placeholder .play-overlay {
    display: flex;
}


/* =========================================================
   PODCAST BODY
========================================================= */

.podcast-body {
    padding: 20px;
}

.podcast-title {
    margin-bottom: 12px;

    color: #333;

    font-size: 19px;

    font-weight: 750;

    line-height: 1.4;

    display: -webkit-box;

    -webkit-line-clamp: 2;

    -webkit-box-orient: vertical;

    overflow: hidden;
}

.podcast-channel {
    display: flex;

    align-items: center;

    gap: 7px;

    color: #777;

    font-size: 14px;
}

.podcast-channel i {
    color: #5b2c83;
}


/* =========================================================
   CATEGORY BADGE
========================================================= */

.podcast-category {
    display: inline-flex;

    align-items: center;

    gap: 5px;

    margin-top: 14px;

    padding: 6px 11px;

    border-radius: 20px;

    background: #f1eafa;

    color: #5b2c83;

    font-size: 12px;

    font-weight: 650;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-state {
    background: #ffffff;

    border-radius: 22px;

    padding: 70px 25px;

    text-align: center;

    box-shadow:
        0 8px 30px rgba(91, 44, 131, 0.08);
}

.empty-icon {
    width: 80px;
    height: 80px;

    margin: 0 auto 20px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #f1eafa;

    color: #8d6aa5;

    font-size: 30px;
}

.empty-state h3 {
    margin: 0 0 10px;

    color: #5b2c83;

    font-size: 24px;
}

.empty-state p {
    margin: 0;

    color: #777;

    font-size: 15px;
}


/* =========================================================
   NO CATEGORIES
========================================================= */

.no-categories {
    background: #ffffff;

    border-radius: 22px;

    padding: 50px 25px;

    margin-bottom: 35px;

    text-align: center;

    box-shadow:
        0 8px 30px rgba(91, 44, 131, 0.08);
}

.no-categories-icon {
    width: 70px;
    height: 70px;

    margin: 0 auto 18px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #f1eafa;

    color: #9b7bb5;

    font-size: 27px;
}

.no-categories h3 {
    margin: 0 0 8px;

    color: #5b2c83;

    font-size: 21px;
}

.no-categories p {
    margin: 0;

    color: #777;
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


@media (max-width: 650px) {

    .podcasts-page {
        padding: 30px 15px 50px;
    }

    .page-header h1 {
        font-size: 30px;
    }

    .header-icon {
        width: 65px;
        height: 65px;

        font-size: 26px;
    }

    .search-form {
        flex-direction: column;
    }

    .search-input-wrapper {
        width: 100%;
    }

    .search-button {
        width: 100%;
    }

    .filter-header {
        align-items: flex-start;

        flex-direction: column;

        gap: 5px;
    }

    .podcasts-grid {
        grid-template-columns: 1fr;
    }

    .podcasts-header h2 {
        font-size: 20px;
    }

    .podcast-image-wrapper {
        height: 210px;
    }

    .search-result {
        align-items: flex-start;

        flex-direction: column;
    }

}


@media (max-width: 400px) {

    .filter-button {
        width: 100%;

        justify-content: center;
    }

    .search-card,
    .filter-card {
        padding: 18px;
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

            <h1>
                Discover Podcasts
            </h1>

            <p>
                Explore podcasts from your favorite categories
            </p>

        </div>



        {{-- =====================================================
             SEARCH
        ====================================================== --}}

        <div class="search-card">

            <form
                action="{{ route('podcasts.index') }}"
                method="GET"
                class="search-form"
            >

                {{-- Keep selected category when searching --}}

                @if(request()->filled('categoryId'))

                    <input
                        type="hidden"
                        name="categoryId"
                        value="{{ request('categoryId') }}"
                    >

                @endif


                <div class="search-input-wrapper">

                    <i class="fas fa-search"></i>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="search-input"
                        placeholder="Search podcast by name..."
                        autocomplete="off"
                    >

                </div>


                <button
                    type="submit"
                    class="search-button"
                >

                    <i class="fas fa-search"></i>

                    Search

                </button>

            </form>


            {{-- Search information --}}

            @if(request()->filled('search'))

                <div class="search-result">

                    <div class="search-result-text">

                        Search results for:

                        <strong>
                            "{{ request('search') }}"
                        </strong>

                    </div>


                    <a
                        href="{{ route(
                            'podcasts.index',
                            request()->except('search')
                        ) }}"
                        class="clear-search"
                    >

                        <i class="fas fa-times"></i>

                        Clear Search

                    </a>

                </div>

            @endif

        </div>



        {{-- =====================================================
             CATEGORY FILTER
        ====================================================== --}}

        @if($categories->count() > 0)

            <div class="filter-card">

                <div class="filter-header">

                    <div class="filter-title">

                        <i class="fas fa-filter"></i>

                        Your Categories

                    </div>

                    <div class="filter-subtitle">

                        Your selected podcast categories

                    </div>

                </div>


                <div class="filter-buttons">


                    {{-- ALL --}}

                    <a
                        href="{{ route(
                            'podcasts.index',
                            request()->except('categoryId')
                        ) }}"
                        class="filter-button
                        {{ !request()->filled('categoryId') ? 'active' : '' }}"
                    >

                        <i class="fas fa-layer-group"></i>

                        All

                    </a>



                    {{-- USER CATEGORIES --}}

                    @foreach($categories as $category)

                        <a
                            href="{{ route(
                                'podcasts.index',
                                array_merge(
                                    request()->except('categoryId'),
                                    [
                                        'categoryId' => $category->id
                                    ]
                                )
                            ) }}"
                            class="filter-button
                            {{ request('categoryId') == $category->id ? 'active' : '' }}"
                        >

                            <i class="fas fa-tag"></i>

                            {{ $category->name }}

                        </a>

                    @endforeach


                </div>

            </div>

        @else

            {{-- =================================================
                 NO CATEGORIES
            ================================================== --}}

            <div class="no-categories">

                <div class="no-categories-icon">

                    <i class="fas fa-tags"></i>

                </div>

                <h3>
                    No Categories Selected
                </h3>

                <p>
                    You have not selected any podcast categories yet.
                </p>

            </div>

        @endif



        {{-- =====================================================
             PODCAST HEADER
        ====================================================== --}}

        <div class="podcasts-header">

            <h2>

                <i class="fas fa-headphones"></i>

                Podcasts

            </h2>


            <span class="podcasts-count">

                {{ $podcasts->count() }}

                {{ $podcasts->count() == 1
                    ? 'Podcast'
                    : 'Podcasts'
                }}

            </span>

        </div>



        {{-- =====================================================
             PODCASTS
        ====================================================== --}}

        @if($podcasts->count() > 0)

            <div class="podcasts-grid">

                @foreach($podcasts as $podcast)


                    {{-- =================================================
                         CLICKABLE PODCAST CARD
                    ================================================== --}}

                    <a
                        href="{{ route(
                            'podcast.show',
                            $podcast->id
                        ) }}"
                        class="podcast-card"
                    >


                        {{-- =================================================
                             IMAGE
                             Podcast has no image,
                             so use channel image.
                        ================================================== --}}

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


                                {{-- PLAY BUTTON --}}

                                <div class="play-overlay">

                                    <div class="play-button">

                                        <i class="fas fa-play"></i>

                                    </div>

                                </div>

                            @else

                                <div class="podcast-placeholder">

                                    <i class="fas fa-podcast"></i>


                                    {{-- PLAY BUTTON --}}

                                    <div class="play-overlay">

                                        <div class="play-button">

                                            <i class="fas fa-play"></i>

                                        </div>

                                    </div>

                                </div>

                            @endif

                        </div>



                        {{-- =================================================
                             PODCAST INFORMATION
                        ================================================== --}}

                        <div class="podcast-body">


                            {{-- TITLE --}}

                            <div class="podcast-title">

                                {{ $podcast->title }}

                            </div>



                            {{-- CHANNEL --}}

                            @if($podcast->channel)

                                <div class="podcast-channel">

                                    <i class="fas fa-microphone"></i>

                                    <span>
                                        {{ $podcast->channel->name }}
                                    </span>

                                </div>

                            @endif



                            {{-- CATEGORY --}}

                            @if($podcast->category)

                                <div class="podcast-category">

                                    <i class="fas fa-tag"></i>

                                    {{ $podcast->category->name }}

                                </div>

                            @endif


                        </div>

                    </a>

                @endforeach

            </div>


        @else

            {{-- =================================================
                 NO PODCASTS
            ================================================== --}}

            <div class="empty-state">

                <div class="empty-icon">

                    @if(request()->filled('search'))

                        <i class="fas fa-search"></i>

                    @elseif(request()->filled('categoryId'))

                        <i class="fas fa-filter"></i>

                    @else

                        <i class="fas fa-podcast"></i>

                    @endif

                </div>


                @if(request()->filled('search'))

                    <h3>
                        No Matching Podcasts
                    </h3>

                    <p>

                        We couldn't find any approved podcasts
                        matching

                        <strong>
                            "{{ request('search') }}"
                        </strong>.

                    </p>

                @elseif(request()->filled('categoryId'))

                    <h3>
                        No Podcasts in This Category
                    </h3>

                    <p>
                        There are currently no approved podcasts
                        in this category.
                    </p>

                @else

                    <h3>
                        No Podcasts Found
                    </h3>

                    <p>
                        There are currently no approved podcasts
                        available for you.
                    </p>

                @endif

            </div>

        @endif


    </div>

</div>

@endsection