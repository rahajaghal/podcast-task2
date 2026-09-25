
@extends('layouts.website')

@section('title', $channel->name)

@push('styles')
<style>

    /* ========================================
       MAIN CONTAINER
    ======================================== */

    .channel-show {
        max-width: 1000px;
        margin: 30px auto;
    }


    /* ========================================
       CHANNEL HEADER
    ======================================== */

    .channel-header {
        background: linear-gradient(
            135deg,
            #5b2c83,
            #7b3fb3
        );

        color: #fff;

        border-radius: 18px;

        padding: 30px;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 25px;

        box-shadow:
            0 10px 30px rgba(91, 44, 131, .20);

        margin-bottom: 30px;
    }


    .channel-info {
        display: flex;

        align-items: center;

        gap: 20px;

        min-width: 0;
    }


    /* ========================================
       CHANNEL IMAGE
    ======================================== */

    .channel-image-wrapper {
        flex-shrink: 0;
    }


    .channel-image {
        width: 110px;
        height: 110px;

        border-radius: 50%;

        object-fit: cover;

        border: 4px solid rgba(255, 255, 255, .85);

        box-shadow:
            0 5px 15px rgba(0, 0, 0, .20);
    }


    .channel-placeholder {
        width: 110px;
        height: 110px;

        border-radius: 50%;

        background: rgba(255, 255, 255, .18);

        border: 4px solid rgba(255, 255, 255, .85);

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 40px;
    }


    /* ========================================
       CHANNEL DETAILS
    ======================================== */

    .channel-details {
        min-width: 0;
    }


    .channel-name {
        margin: 0 0 8px;

        font-size: 30px;

        font-weight: 700;

        word-break: break-word;
    }


    .channel-description {
        margin: 0 0 12px;

        color: rgba(255, 255, 255, .85);

        font-size: 14px;

        line-height: 1.6;

        max-width: 600px;
    }


    .channel-count {
        font-size: 13px;

        color: rgba(255, 255, 255, .8);
    }


    .channel-count i {
        margin-right: 4px;
    }


    /* ========================================
       FOLLOW BUTTON
    ======================================== */

    .follow-form {
        margin: 0;

        flex-shrink: 0;
    }


    .follow-button {
        border: 1px solid #fff;

        background: #fff;

        color: #5b2c83;

        border-radius: 30px;

        padding: 11px 20px;

        font-size: 14px;

        font-weight: 600;

        cursor: pointer;

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }


    .follow-button:hover {
        transform: translateY(-2px);

        box-shadow:
            0 5px 15px rgba(0, 0, 0, .20);
    }


    /*
       Following state
    */

    .follow-button.following {
        background: rgba(255, 255, 255, .15);

        color: #fff;

        border-color: rgba(255, 255, 255, .7);
    }


    .follow-button.following:hover {
        background: rgba(255, 255, 255, .25);
    }


    /* ========================================
       PODCAST SECTION
    ======================================== */

    .podcasts-section {
        background: #fff;

        border-radius: 18px;

        padding: 25px;

        box-shadow:
            0 5px 20px rgba(0, 0, 0, .07);
    }


    .section-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        margin-bottom: 20px;
    }


    .section-title {
        margin: 0;

        font-size: 21px;

        font-weight: 700;

        color: #343a40;
    }


    .section-title i {
        color: #5b2c83;

        margin-right: 7px;
    }


    /* ========================================
       PODCAST GRID
    ======================================== */

    .podcast-grid {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 18px;
    }


    /* ========================================
       PODCAST CARD
    ======================================== */

    .podcast-card {
        background: #fafafa;

        border: 1px solid #eee;

        border-radius: 14px;

        overflow: hidden;

        text-decoration: none;

        color: inherit;

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;
    }


    .podcast-card:hover {
        text-decoration: none;

        color: inherit;

        transform: translateY(-4px);

        border-color: #ddd;

        box-shadow:
            0 8px 20px rgba(0, 0, 0, .10);
    }


    .podcast-card-body {
        padding: 16px;
    }


    /* ========================================
       PODCAST ICON
    ======================================== */

    .podcast-icon {
        width: 48px;
        height: 48px;

        border-radius: 12px;

        background: #eee6f6;

        color: #5b2c83;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 21px;

        margin-bottom: 12px;
    }


    /* ========================================
       PODCAST TITLE
    ======================================== */

    .podcast-title {
        margin: 0;

        font-size: 16px;

        font-weight: 700;

        color: #343a40;

        word-break: break-word;

        line-height: 1.4;
    }


    /* ========================================
       PODCAST LINK
    ======================================== */

    .podcast-link {
        display: block;

        margin-top: 8px;

        font-size: 12px;

        color: #5b2c83;
    }


    .podcast-link i {
        margin-left: 3px;

        transition:
            transform .2s ease;
    }


    .podcast-card:hover .podcast-link i {
        transform: translateX(3px);
    }


    /* ========================================
       EMPTY STATE
    ======================================== */

    .empty-podcasts {
        text-align: center;

        padding: 50px 20px;

        color: #777;
    }


    .empty-podcasts > i {
        font-size: 42px;

        color: #d8c9e4;

        margin-bottom: 15px;
    }


    .empty-podcasts h4 {
        color: #555;

        margin-bottom: 5px;
    }


    .empty-podcasts p {
        margin: 0;

        font-size: 14px;
    }


    /* ========================================
       MOBILE
    ======================================== */

    @media (max-width: 750px) {

        .channel-show {
            margin: 20px 0;
        }


        .channel-header {
            padding: 22px;

            flex-direction: column;

            align-items: flex-start;
        }


        .channel-info {
            align-items: flex-start;

            width: 100%;
        }


        .channel-name {
            font-size: 24px;
        }


        .channel-image,
        .channel-placeholder {
            width: 85px;
            height: 85px;
        }


        .channel-placeholder {
            font-size: 30px;
        }


        .follow-form {
            width: 100%;
        }


        .follow-button {
            width: 100%;

            justify-content: center;
        }


        .podcasts-section {
            padding: 18px;
        }


        .podcast-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }
    }


    @media (max-width: 500px) {

        .channel-info {
            flex-direction: column;
        }


        .podcast-grid {
            grid-template-columns: 1fr;
        }
    }

</style>
@endpush


@section('content')

<div class="channel-show">


    {{-- =========================================
         BACK TO PODCASTS
    ========================================== --}}

    <a
        href="{{ route('dashboard') }}"
        class="btn btn-sm btn-link text-primary mb-3 p-0"
    >

        <i class="fas fa-arrow-left"></i>

        Back to Podcasts

    </a>


    {{-- =========================================
         CHANNEL HEADER
    ========================================== --}}

    <div class="channel-header">


        {{-- =====================================
             CHANNEL INFORMATION
        ====================================== --}}

        <div class="channel-info">


            {{-- Channel image --}}

            <div class="channel-image-wrapper">

                @if($channel->image)

                    <img
                        src="{{ asset('storage/' . $channel->image) }}"
                        alt="{{ $channel->name }}"
                        class="channel-image"
                    >

                @else

                    <div class="channel-placeholder">

                        <i class="fas fa-microphone"></i>

                    </div>

                @endif

            </div>


            {{-- Channel details --}}

            <div class="channel-details">

                <h1 class="channel-name">
                    {{ $channel->name }}
                </h1>


                @if($channel->description)

                    <p class="channel-description">
                        {{ $channel->description }}
                    </p>

                @endif


                <div class="channel-count">

                    <i class="fas fa-podcast"></i>

                    {{ $channel->podcasts->count() }}

                    {{ Str::plural(
                        'podcast',
                        $channel->podcasts->count()
                    ) }}

                </div>

            </div>

        </div>


        {{-- =====================================
             FOLLOW TOGGLE
        ====================================== --}}

        @auth

            {{-- Don't show Follow on your own channel --}}

            @if(auth()->id() != $channel->user_id)

                <form
                    action="{{ route(
                        'channel.toggleFollow',
                        $channel->id
                    ) }}"
                    method="POST"
                    class="follow-form"
                >

                    @csrf

                    <button
                        type="submit"
                        class="follow-button
                        {{ $isFollowing ? 'following' : '' }}"
                    >

                        @if($isFollowing)

                            <i class="fas fa-user-check"></i>

                            Following

                        @else

                            <i class="fas fa-user-plus"></i>

                            Follow

                        @endif

                    </button>

                </form>

            @endif

        @endauth

    </div>


    {{-- =========================================
         PODCASTS
    ========================================== --}}

    <div class="podcasts-section">


        {{-- Section header --}}

        <div class="section-header">

            <h2 class="section-title">

                <i class="fas fa-podcast"></i>

                Podcasts

            </h2>

        </div>


        {{-- =====================================
             PODCASTS EXIST
        ====================================== --}}

        @if($channel->podcasts->count())


            <div class="podcast-grid">


                @foreach($channel->podcasts as $podcast)


                    <a
                        href="{{ route(
                            'podcast.show',
                            $podcast->id
                        ) }}"
                        class="podcast-card"
                    >

                        <div class="podcast-card-body">


                            {{-- Podcast icon --}}

                            <div class="podcast-icon">

                                <i class="fas fa-headphones"></i>

                            </div>


                            {{-- Podcast title --}}

                            <h3 class="podcast-title">

                                {{ $podcast->title }}

                            </h3>


                            {{-- Listen link --}}

                            <span class="podcast-link">

                                Listen now

                                <i class="fas fa-arrow-right"></i>

                            </span>


                        </div>

                    </a>


                @endforeach


            </div>


        {{-- =====================================
             NO PODCASTS
        ====================================== --}}

        @else


            <div class="empty-podcasts">

                <i class="fas fa-podcast"></i>

                <h4>
                    No podcasts yet
                </h4>

                <p>
                    This channel hasn't published any
                    approved podcasts yet.
                </p>

            </div>


        @endif


    </div>


</div>

@endsection

