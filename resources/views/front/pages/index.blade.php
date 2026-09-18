@extends('layouts.website')

@section('title', 'Podcasts')

@push('styles')
<style>
    .podcasts-page {
        min-height: calc(100vh - 140px);
        padding: 50px 20px;
        background: linear-gradient(135deg, #f8f5ff, #ffffff);
    }

    .podcasts-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .page-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .page-header h1 {
        color: #5b2c83;
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .page-header p {
        color: #777;
        font-size: 16px;
        margin: 0;
    }

    /* Filters */
    .filter-card {
        background: #fff;
        border-radius: 18px;
        padding: 25px;
        margin-bottom: 35px;
        box-shadow: 0 8px 25px rgba(91, 44, 131, 0.08);
    }

    .filter-title {
        color: #5b2c83;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 18px;
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
        border: 1px solid #ddd;
        background: #fff;
        color: #555;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .filter-button:hover {
        border-color: #5b2c83;
        color: #5b2c83;
        text-decoration: none;
    }

    .filter-button.active {
        background: #5b2c83;
        border-color: #5b2c83;
        color: #fff;
    }

    /* Podcasts */
    .podcasts-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .podcast-card {
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(91, 44, 131, 0.08);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .podcast-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(91, 44, 131, 0.15);
    }

    .podcast-image {
        width: 100%;
        height: 210px;
        object-fit: cover;
        background: #eee;
    }

    .podcast-body {
        padding: 20px;
    }

    .podcast-title {
        color: #333;
        font-size: 19px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .podcast-channel {
        color: #777;
        font-size: 14px;
    }

    .podcast-channel i {
        color: #5b2c83;
        margin-right: 5px;
    }

    .empty-state {
        background: #fff;
        border-radius: 18px;
        padding: 60px 20px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(91, 44, 131, 0.08);
    }

    .empty-state i {
        font-size: 50px;
        color: #b9a2cc;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        color: #5b2c83;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #777;
        margin: 0;
    }

    @media (max-width: 992px) {
        .podcasts-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .podcasts-page {
            padding: 30px 15px;
        }

        .page-header h1 {
            font-size: 28px;
        }

        .podcasts-grid {
            grid-template-columns: 1fr;
        }

        .filter-card {
            padding: 18px;
        }
    }
</style>
@endpush


@section('content')

<div class="podcasts-page">

    <div class="podcasts-container">

        {{-- Page Header --}}
        <div class="page-header">
            <h1>
                <i class="fas fa-podcast"></i>
                Podcasts
            </h1>

            <p>
                Discover podcasts based on your favorite categories
            </p>
        </div>


        {{-- Category Filters --}}
        <div class="filter-card">

            <div class="filter-title">
                <i class="fas fa-filter"></i>
                Filter by Category
            </div>

            <div class="filter-buttons">

                {{-- All --}}
                <a
                    href="{{ route('podcasts.index') }}"
                    class="filter-button {{ !request()->filled('categoryId') ? 'active' : '' }}"
                >
                    <i class="fas fa-layer-group"></i>
                    All
                </a>


                {{-- User's Categories --}}
                @foreach($categories as $category)

                    <a
                        href="{{ route('podcasts.index', ['categoryId' => $category->id]) }}"
                        class="filter-button
                        {{ request('categoryId') == $category->id ? 'active' : '' }}"
                    >
                        <i class="fas fa-tag"></i>

                        {{ $category->name }}
                    </a>

                @endforeach

            </div>

        </div>


        {{-- Podcasts --}}
        @if($podcasts->count() > 0)

            <div class="podcasts-grid">

                @foreach($podcasts as $podcast)

                    <div class="podcast-card">

                        {{-- Channel Image --}}
                        @if($podcast->channel && $podcast->channel->image)

                            <img
                                src="{{ asset('storage/' . $podcast->channel->image) }}"
                                alt="{{ $podcast->channel->name }}"
                                class="podcast-image"
                            >

                        @else

                            <div
                                class="podcast-image d-flex align-items-center justify-content-center"
                            >
                                <i class="fas fa-podcast fa-3x text-muted"></i>
                            </div>

                        @endif


                        <div class="podcast-body">

                            <div class="podcast-title">
                                {{ $podcast->title }}
                            </div>

                            @if($podcast->channel)

                                <div class="podcast-channel">

                                    <i class="fas fa-microphone"></i>

                                    {{ $podcast->channel->name }}

                                </div>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- Empty State --}}
            <div class="empty-state">

                <i class="fas fa-podcast"></i>

                <h3>
                    No Podcasts Found
                </h3>

                <p>
                    There are no approved podcasts for this category yet.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection