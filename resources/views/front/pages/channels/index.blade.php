@extends('layouts.website')

@section('title', 'My Channel')


@push('styles')

<style>

/* =========================================================
   CHANNEL PAGE
========================================================= */

.channel-page {
    min-height: 80vh;

    padding: 70px 0;

    background: linear-gradient(
        180deg,
        #faf9ff 0%,
        #f5f3fb 100%
    );
}

.channel-container {
    max-width: 1000px;

    margin: 0 auto;
}


/* =========================================================
   ALERT
========================================================= */

.channel-page .alert {
    border: 0;

    border-radius: 12px;

    padding: 15px 20px;

    margin-bottom: 25px;

    box-shadow:
        0 5px 20px rgba(0, 0, 0, 0.05);
}


/* =========================================================
   CHANNEL CARD
========================================================= */

.channel-card {
    position: relative;

    background: #ffffff;

    border-radius: 24px;

    overflow: hidden;

    box-shadow:
        0 15px 45px rgba(76, 29, 149, 0.10);

    border:
        1px solid rgba(124, 58, 237, 0.08);

    transition:
        all 0.3s ease;
}

.channel-card:hover {
    transform:
        translateY(-4px);

    box-shadow:
        0 20px 55px rgba(76, 29, 149, 0.14);
}


/* =========================================================
   CHANNEL COVER
========================================================= */

.channel-cover {
    height: 220px;

    position: relative;

    background:
        radial-gradient(
            circle at 15% 20%,
            rgba(255,255,255,0.20),
            transparent 30%
        ),

        radial-gradient(
            circle at 85% 80%,
            rgba(255,255,255,0.15),
            transparent 30%
        ),

        linear-gradient(
            135deg,
            #4c1d95 0%,
            #6d28d9 45%,
            #8b5cf6 100%
        );
}

.channel-cover::after {
    content: "";

    position: absolute;

    width: 220px;

    height: 220px;

    border-radius: 50%;

    background:
        rgba(255,255,255,0.06);

    right: -60px;

    top: -90px;
}

.channel-cover::before {
    content: "";

    position: absolute;

    width: 150px;

    height: 150px;

    border-radius: 50%;

    background:
        rgba(255,255,255,0.05);

    left: -40px;

    bottom: -70px;
}


/* =========================================================
   CHANNEL CONTENT
========================================================= */

.channel-content {
    padding:
        0 50px 45px;

    text-align:
        center;
}


/* =========================================================
   CHANNEL IMAGE
========================================================= */

.channel-image {
    display:
        block;

    width:
        155px;

    height:
        155px;

    object-fit:
        cover;

    border-radius:
        50%;

    border:
        7px solid #ffffff;

    margin:
        -78px auto 0;

    position:
        relative;

    z-index:
        2;

    background:
        #f5f3ff;

    box-shadow:
        0 10px 30px rgba(76, 29, 149, 0.20);

    transition:
        transform 0.3s ease;
}

.channel-card:hover .channel-image {
    transform:
        scale(1.03);
}


/* =========================================================
   CHANNEL NAME
========================================================= */

.channel-name {
    margin-top:
        22px;

    margin-bottom:
        0;

    font-size:
        34px;

    font-weight:
        800;

    letter-spacing:
        -0.5px;

    color:
        #1f1633;
}


/* =========================================================
   CHANNEL DESCRIPTION
========================================================= */

.channel-description {
    max-width:
        650px;

    margin:
        16px auto 0;

    color:
        #716b7d;

    font-size:
        17px;

    line-height:
        1.8;
}


/* =========================================================
   CREATE PODCAST BUTTON
========================================================= */

.create-podcast-button {
    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        8px;

    margin-top:
        25px;

    padding:
        12px 24px;

    border-radius:
        10px;

    color:
        #ffffff;

    background:
        linear-gradient(
            135deg,
            #6d28d9,
            #8b5cf6
        );

    border:
        none;

    font-size:
        14px;

    font-weight:
        700;

    text-decoration:
        none;

    box-shadow:
        0 7px 18px rgba(109, 40, 217, 0.22);

    transition:
        all 0.25s ease;
}

.create-podcast-button:hover {
    color:
        #ffffff;

    text-decoration:
        none;

    transform:
        translateY(-2px);

    box-shadow:
        0 10px 25px rgba(109, 40, 217, 0.30);
}

.create-podcast-button i {
    font-size:
        13px;
}


/* =========================================================
   PODCASTS SECTION
========================================================= */

.podcasts-section {
    margin-top:
        45px;
}


/* =========================================================
   PODCAST HEADER
========================================================= */

.podcasts-header {
    display:
        flex;

    align-items:
        center;

    justify-content:
        space-between;

    margin-bottom:
        22px;
}

.podcasts-title {
    margin:
        0;

    font-size:
        28px;

    font-weight:
        800;

    color:
        #1f1633;
}

.podcasts-title i {
    color:
        #6d28d9;
}

.podcasts-count {
    color:
        #716b7d;

    font-size:
        14px;

    font-weight:
        500;

    margin-left:
        8px;
}


/* =========================================================
   PODCAST GRID
========================================================= */

.podcasts-grid {
    display:
        grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap:
        22px;
}


/* =========================================================
   PODCAST CARD
========================================================= */

.podcast-card {
    background:
        #ffffff;

    border-radius:
        18px;

    overflow:
        hidden;

    border:
        1px solid rgba(124, 58, 237, 0.08);

    box-shadow:
        0 10px 30px rgba(76, 29, 149, 0.07);

    transition:
        all 0.3s ease;

    display:
        block;
}

.podcast-card:hover {
    transform:
        translateY(-5px);

    box-shadow:
        0 15px 40px rgba(76, 29, 149, 0.13);
}


/* =========================================================
   PODCAST IMAGE
========================================================= */

.podcast-image-wrapper {
    width:
        100%;

    aspect-ratio:
        1 / 1;

    overflow:
        hidden;

    background:
        #f3f0ff;
}

.podcast-image {
    width:
        100%;

    height:
        100%;

    object-fit:
        cover;

    display:
        block;

    transition:
        transform 0.35s ease;
}

.podcast-card:hover .podcast-image {
    transform:
        scale(1.05);
}


/* =========================================================
   PODCAST INFO
========================================================= */

.podcast-info {
    padding:
        16px 18px 20px;
}

.podcast-title {
    margin:
        0;

    font-size:
        18px;

    font-weight:
        750;

    color:
        #1f1633;

    white-space:
        nowrap;

    overflow:
        hidden;

    text-overflow:
        ellipsis;
}


/* =========================================================
   DELETE PODCAST
========================================================= */

.delete-podcast-form {
    margin-top:
        14px;
}

.delete-podcast-button {
    width:
        100%;

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        7px;

    padding:
        9px 14px;

    border-radius:
        8px;

    border:
        1px solid #fecaca;

    background:
        #ffffff;

    color:
        #dc2626;

    font-size:
        13px;

    font-weight:
        700;

    cursor:
        pointer;

    transition:
        all 0.2s ease;
}

.delete-podcast-button:hover {
    color:
        #ffffff;

    background:
        #dc2626;

    border-color:
        #dc2626;

    transform:
        translateY(-1px);
}

.delete-podcast-button i {
    font-size:
        12px;
}


/* =========================================================
   EMPTY PODCASTS
========================================================= */

.empty-podcasts {
    background:
        #ffffff;

    border-radius:
        20px;

    padding:
        55px 30px;

    text-align:
        center;

    border:
        1px solid rgba(124, 58, 237, 0.08);

    box-shadow:
        0 10px 30px rgba(76, 29, 149, 0.06);
}

.empty-podcasts-icon {
    width:
        75px;

    height:
        75px;

    margin:
        0 auto 20px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        50%;

    background:
        #f3f0ff;

    color:
        #7c3aed;

    font-size:
        30px;
}

.empty-podcasts h3 {
    margin-bottom:
        8px;

    font-size:
        22px;

    font-weight:
        750;

    color:
        #1f1633;
}

.empty-podcasts p {
    margin:
        0;

    color:
        #817a8d;
}


/* =========================================================
   CREATE CHANNEL CARD
========================================================= */

.create-card {
    position:
        relative;

    background:
        #ffffff;

    padding:
        70px 45px;

    text-align:
        center;

    border-radius:
        24px;

    border:
        1px solid rgba(124, 58, 237, 0.08);

    box-shadow:
        0 15px 45px rgba(76, 29, 149, 0.08);

    overflow:
        hidden;
}

.create-card::before {
    content:
        "";

    position:
        absolute;

    width:
        260px;

    height:
        260px;

    border-radius:
        50%;

    background:
        rgba(124, 58, 237, 0.05);

    top:
        -150px;

    right:
        -100px;
}

.create-card::after {
    content:
        "";

    position:
        absolute;

    width:
        200px;

    height:
        200px;

    border-radius:
        50%;

    background:
        rgba(139, 92, 246, 0.04);

    bottom:
        -120px;

    left:
        -80px;
}


/* =========================================================
   CREATE CHANNEL ICON
========================================================= */

.create-icon {
    width:
        95px;

    height:
        95px;

    margin:
        0 auto 28px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    background:
        linear-gradient(
            135deg,
            #ede9fe,
            #ddd6fe
        );

    color:
        #6d28d9;

    border-radius:
        50%;

    font-size:
        40px;

    box-shadow:
        0 10px 25px rgba(109, 40, 217, 0.12);

    position:
        relative;

    z-index:
        1;
}


/* =========================================================
   CREATE CHANNEL TITLE
========================================================= */

.create-card h1 {
    position:
        relative;

    z-index:
        1;

    font-weight:
        800;

    color:
        #1f1633;

    font-size:
        32px;

    margin-bottom:
        15px;
}


/* =========================================================
   CREATE CHANNEL DESCRIPTION
========================================================= */

.create-card p {
    position:
        relative;

    z-index:
        1;

    max-width:
        600px;

    margin:
        0 auto 32px;

    color:
        #716b7d;

    font-size:
        17px;

    line-height:
        1.8;
}


/* =========================================================
   CREATE CHANNEL BUTTON
========================================================= */

.create-button {
    position:
        relative;

    z-index:
        1;

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    padding:
        14px 30px;

    border:
        0;

    border-radius:
        12px;

    font-weight:
        700;

    font-size:
        16px;

    color:
        #ffffff;

    background:
        linear-gradient(
            135deg,
            #6d28d9,
            #8b5cf6
        );

    box-shadow:
        0 8px 20px rgba(109, 40, 217, 0.25);

    transition:
        all 0.3s ease;
}

.create-button:hover {
    color:
        #ffffff;

    transform:
        translateY(-2px);

    box-shadow:
        0 12px 28px rgba(109, 40, 217, 0.32);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {

    .podcasts-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }
}


@media (max-width: 768px) {

    .channel-page {
        padding:
            40px 15px;
    }

    .channel-cover {
        height:
            180px;
    }

    .channel-content {
        padding:
            0 25px 35px;
    }

    .channel-image {
        width:
            135px;

        height:
            135px;

        margin-top:
            -68px;
    }

    .channel-name {
        font-size:
            28px;
    }

    .channel-description {
        font-size:
            16px;
    }

    .podcasts-header {
        align-items:
            flex-start;

        flex-direction:
            column;

        gap:
            5px;
    }

    .podcasts-title {
        font-size:
            25px;
    }

    .create-card {
        padding:
            55px 25px;
    }

    .create-card h1 {
        font-size:
            27px;
    }
}


@media (max-width: 550px) {

    .podcasts-grid {
        grid-template-columns:
            1fr;
    }
}

</style>

@endpush



@section('content')

<div class="channel-page">

    <div class="container">

        <div class="channel-container">


            {{-- =================================================
                 SUCCESS MESSAGE
            ================================================== --}}

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    <i class="fas fa-check-circle mr-2"></i>

                    {{ session('success') }}

                    <button
                        type="button"
                        class="close"
                        data-dismiss="alert"
                    >

                        <span>&times;</span>

                    </button>

                </div>

            @endif


            {{-- =================================================
                 ERROR MESSAGE
            ================================================== --}}

            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    <i class="fas fa-exclamation-circle mr-2"></i>

                    {{ session('error') }}

                    <button
                        type="button"
                        class="close"
                        data-dismiss="alert"
                    >

                        <span>&times;</span>

                    </button>

                </div>

            @endif



            {{-- =================================================
                 USER HAS CHANNEL
            ================================================== --}}

            @if($channel)


                {{-- =================================================
                     CHANNEL CARD
                ================================================== --}}

                <div class="channel-card">

                    {{-- Channel Cover --}}

                    <div class="channel-cover"></div>


                    <div class="channel-content">


                        {{-- Channel Image --}}

                        @if($channel->image)

                            <img
                                src="{{ asset('storage/' . $channel->image) }}"
                                alt="{{ $channel->name }}"
                                class="channel-image"
                            >

                        @else

                            <div
                                class="channel-image d-flex align-items-center justify-content-center"
                            >
                                <i class="fas fa-podcast"></i>
                            </div>

                        @endif


                        {{-- Channel Name --}}

                        <h1 class="channel-name">
                            {{ $channel->name }}
                        </h1>


                        {{-- Channel Description --}}

                        @if($channel->description)

                            <p class="channel-description">
                                {{ $channel->description }}
                            </p>

                        @endif


                        {{-- Create Podcast --}}

                        <a
                            href="{{ route('podcasts.create') }}"
                            class="create-podcast-button"
                        >

                            <i class="fas fa-plus"></i>

                            Create Podcast

                        </a>

                    </div>

                </div>



                {{-- =================================================
                     PODCASTS
                ================================================== --}}

                <div class="podcasts-section">


                    {{-- Podcasts Header --}}

                    <div class="podcasts-header">

                        <h2 class="podcasts-title">

                            <i class="fas fa-podcast mr-2"></i>

                            My Podcasts

                            <span class="podcasts-count">
                                ({{ $channelPodacasts->count() }})
                            </span>

                        </h2>

                    </div>



                    {{-- =================================================
                         PODCASTS AVAILABLE
                    ================================================== --}}

                    @if($channelPodacasts->count() > 0)

                        <div class="podcasts-grid">


                            @foreach($channelPodacasts as $podcast)

                                <div class="podcast-card">


                                    {{-- Podcast Image --}}

                                    <div class="podcast-image-wrapper">

                                        @if($channel->image)

                                            <img
                                                src="{{ asset('storage/' . $channel->image) }}"
                                                alt="{{ $podcast->title }}"
                                                class="podcast-image"
                                            >

                                        @else

                                            <div
                                                class="podcast-image d-flex align-items-center justify-content-center"
                                            >

                                                <i class="fas fa-podcast"
                                                   style="font-size: 45px; color: #7c3aed;">
                                                </i>

                                            </div>

                                        @endif

                                    </div>



                                    {{-- Podcast Info --}}

                                    <div class="podcast-info">


                                        {{-- Podcast Title --}}

                                        <h3
                                            class="podcast-title"
                                            title="{{ $podcast->title }}"
                                        >
                                            {{ $podcast->title }}
                                        </h3>


                                        {{-- Delete Podcast --}}

                                        <form
                                            action="{{ route('podcasts.delete', $podcast->id) }}"
                                            method="POST"
                                            class="delete-podcast-form"
                                            onsubmit="return confirm('Are you sure you want to delete this podcast?')"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="delete-podcast-button"
                                            >

                                                <i class="fas fa-trash"></i>

                                                Delete

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            @endforeach


                        </div>


                    {{-- =================================================
                         NO PODCASTS
                    ================================================== --}}

                    @else

                        <div class="empty-podcasts">

                            <div class="empty-podcasts-icon">

                                <i class="fas fa-microphone-slash"></i>

                            </div>


                            <h3>
                                No Podcasts Yet
                            </h3>


                            <p>
                                You haven't uploaded any podcasts
                                to your channel yet.
                            </p>

                        </div>

                    @endif

                </div>



            {{-- =================================================
                 USER DOES NOT HAVE CHANNEL
            ================================================== --}}

            @else

                <div class="create-card">


                    <div class="create-icon">

                        <i class="fas fa-broadcast-tower"></i>

                    </div>


                    <h1>
                        Create Your Podcast Channel
                    </h1>


                    <p>
                        You don't have a podcast channel yet.
                        Create your channel and start sharing
                        your podcasts with the world.
                    </p>


                    <a
                        href="{{ route('channel.create') }}"
                        class="btn create-button"
                    >

                        <i class="fas fa-plus mr-2"></i>

                        Create My Channel

                    </a>

                </div>

            @endif


        </div>

    </div>

</div>

@endsection