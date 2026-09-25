@extends('layouts.website')

@section('title', 'Podcasts')


@section('content')

<div class="container py-5">


    {{-- Page Header --}}
    <div class="text-center mb-5">

        <h1 class="font-weight-bold">
            Discover Podcasts
        </h1>

        <p class="text-muted">
            Explore our podcasts and discover something you love.
        </p>

    </div>



    {{-- Search --}}
    <div class="row justify-content-center mb-4">

        <div class="col-md-8">

            <form
                action="{{ route('guest.index') }}"
                method="GET"
            >

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search podcasts..."
                        value="{{ request('search') }}"
                    >

                    <div class="input-group-append">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            <i class="fas fa-search mr-1"></i>

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>



    {{-- Categories --}}
    <div class="mb-5">

        <div class="text-center mb-3">

            <h5 class="font-weight-bold">
                Categories
            </h5>

        </div>


        <div class="d-flex flex-wrap justify-content-center">


            {{-- All --}}
            <a
                href="{{ route('guest.index') }}"
                class="btn mr-2 mb-2
                    {{ !request('categoryId')
                        ? 'btn-primary'
                        : 'btn-outline-primary' }}"
            >

                <i class="fas fa-th-large mr-1"></i>

                All

            </a>


            @foreach ($categories as $category)

                <a
                    href="{{ route('guest.index', [
                        'categoryId' => $category->id,
                        'search' => request('search')
                    ]) }}"
                    class="btn mr-2 mb-2
                        {{ request('categoryId') == $category->id
                            ? 'btn-primary'
                            : 'btn-outline-primary' }}"
                >

                    {{ $category->name }}

                </a>

            @endforeach


        </div>

    </div>



    {{-- Results --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="font-weight-bold mb-0">

                @if (request('categoryId'))

                    @php
                        $selectedCategory = $categories->firstWhere(
                            'id',
                            request('categoryId')
                        );
                    @endphp

                    {{ $selectedCategory?->name ?? 'Podcasts' }}

                @else

                    Latest Podcasts

                @endif

            </h3>

        </div>


        <div class="text-muted">

            {{ $podcasts->count() }}

            {{ Str::plural('podcast', $podcasts->count()) }}

        </div>

    </div>



    {{-- Podcast Cards --}}
    @if ($podcasts->count())

        <div class="row">

            @foreach ($podcasts as $podcast)

                <div class="col-lg-4 col-md-6 mb-4">

                    <a
                        href="{{ route('podcast.show', $podcast->id) }}"
                        class="text-decoration-none"
                    >

                        <div class="card h-100 shadow-sm podcast-card">


                            {{-- Podcast Image --}}
                            <div class="position-relative">

                                @if ($podcast->channel?->image)

                                    <img
                                        src="{{ asset('storage/' . $podcast->channel->image) }}"
                                        alt="{{ $podcast->channel->name }}"
                                        class="card-img-top"
                                        style="
                                            height: 220px;
                                            object-fit: cover;
                                        "
                                    >

                                @else

                                    <div
                                        class="d-flex
                                               align-items-center
                                               justify-content-center"
                                        style="
                                            height: 220px;
                                            background: #f1f1f1;
                                        "
                                    >

                                        <i
                                            class="fas fa-podcast text-primary"
                                            style="font-size: 60px;"
                                        ></i>

                                    </div>

                                @endif


                                {{-- Play Icon --}}
                                <div
                                    class="position-absolute"
                                    style="
                                        bottom: 15px;
                                        right: 15px;
                                    "
                                >

                                    <span
                                        class="d-flex
                                               align-items-center
                                               justify-content-center
                                               rounded-circle
                                               bg-primary
                                               text-white"
                                        style="
                                            width: 48px;
                                            height: 48px;
                                        "
                                    >

                                        <i class="fas fa-play"></i>

                                    </span>

                                </div>

                            </div>



                            {{-- Card Body --}}
                            <div class="card-body">


                                {{-- Category --}}
                                @if ($podcast->category)

                                    <span
                                        class="badge badge-primary mb-2"
                                    >

                                        {{ $podcast->category->name }}

                                    </span>

                                @endif


                                {{-- Title --}}
                                <h5
                                    class="card-title
                                           font-weight-bold
                                           text-dark"
                                >

                                    {{ $podcast->title }}

                                </h5>


                                {{-- Channel --}}
                                @if ($podcast->channel)

                                    <p class="text-muted mb-2">

                                        <i class="fas fa-user mr-1"></i>

                                        {{ $podcast->channel->name }}

                                    </p>

                                @endif


                                {{-- Rating --}}
                                <div>

                                    @if ($podcast->ratings_count > 0)

                                        <span class="text-warning">

                                            @for ($i = 1; $i <= 5; $i++)

                                                @if (
                                                    $podcast->ratings_avg_rating >= $i
                                                )

                                                    <i class="fas fa-star"></i>

                                                @elseif (
                                                    $podcast->ratings_avg_rating >= ($i - 0.5)
                                                )

                                                    <i class="fas fa-star-half-alt"></i>

                                                @else

                                                    <i class="far fa-star"></i>

                                                @endif

                                            @endfor

                                        </span>


                                        <small class="text-muted ml-1">

                                            {{ number_format($podcast->ratings_avg_rating, 1) }}

                                            ({{ $podcast->ratings_count }})

                                        </small>

                                    @else

                                        <small class="text-muted">

                                            No ratings

                                        </small>

                                    @endif

                                </div>


                            </div>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>


    @else


        {{-- Empty State --}}
        <div class="text-center py-5">

            <div class="mb-3">

                <i
                    class="fas fa-podcast text-muted"
                    style="font-size: 60px;"
                ></i>

            </div>


            <h4>
                No podcasts found
            </h4>


            <p class="text-muted">

                Try another search or category.

            </p>


            <a
                href="{{ route('guest.index') }}"
                class="btn btn-primary"
            >

                <i class="fas fa-redo mr-1"></i>

                Show All Podcasts

            </a>

        </div>


    @endif


</div>


@endsection


@push('styles')

<style>

    .podcast-card {
        border: none;

        border-radius: 12px;

        overflow: hidden;

        transition:
            transform .2s ease,
            box-shadow .2s ease;
    }


    .podcast-card:hover {

        transform: translateY(-5px);

        box-shadow:
            0 10px 25px rgba(0, 0, 0, .12) !important;
    }


    .podcast-card .card-img-top {

        transition: transform .3s ease;
    }


    .podcast-card:hover .card-img-top {

        transform: scale(1.03);
    }


    .btn-primary {

        background-color: #6f42c1;

        border-color: #6f42c1;
    }


    .btn-primary:hover {

        background-color: #59339d;

        border-color: #59339d;
    }


    .btn-outline-primary {

        color: #6f42c1;

        border-color: #6f42c1;
    }


    .btn-outline-primary:hover {

        background-color: #6f42c1;

        border-color: #6f42c1;

        color: #fff;
    }

</style>

@endpush