@extends('layouts.website')

@section('title', 'Create Podcast')

@push('styles')
<style>

    .podcast-create-page {
        min-height: 75vh;

        padding: 40px 15px;

        background:
            linear-gradient(
                180deg,
                #faf9ff 0%,
                #f5f3fb 100%
            );
    }

    .podcast-create-wrapper {
        max-width: 720px;

        margin: 0 auto;
    }


    /* =========================
       Main Card
    ========================== */

    .podcast-card {
        border: 1px solid rgba(124, 58, 237, 0.08);

        border-radius: 18px;

        background: #ffffff;

        overflow: hidden;

        box-shadow:
            0 10px 30px rgba(76, 29, 149, 0.08);
    }


    /* =========================
       Header
    ========================== */

    .podcast-card .card-header {
        padding: 22px 28px;

        background: #ffffff;

        border-bottom: 1px solid #f0edf7;
    }

    .podcast-header-content {
        display: flex;

        align-items: center;

        gap: 13px;
    }


    /* =========================
       Icon
    ========================== */

    .podcast-icon {
        flex-shrink: 0;

        width: 45px;
        height: 45px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 12px;

        color: #ffffff;

        font-size: 19px;

        background:
            linear-gradient(
                135deg,
                #6d28d9,
                #8b5cf6
            );

        box-shadow:
            0 5px 14px rgba(109, 40, 217, 0.20);
    }


    /* =========================
       Header Text
    ========================== */

    .podcast-header-text h4 {
        margin: 0;

        color: #1f1633;

        font-size: 21px;

        font-weight: 800;
    }

    .podcast-header-text p {
        margin: 3px 0 0;

        color: #716b7d;

        font-size: 14px;
    }


    /* =========================
       Footer
    ========================== */

    .podcast-card .card-footer {
        padding: 16px 28px;

        background: #ffffff;

        border-top: 1px solid #f0edf7;

        display: flex;

        align-items: center;

        justify-content: flex-end;
    }


    /* =========================
       Buttons
    ========================== */

    .cancel-button {
        padding: 9px 18px;

        border-radius: 8px;

        font-size: 14px;

        font-weight: 600;

        color: #5f5869;

        background: #f4f2f7;

        border: 1px solid #e8e4ef;

        transition: all 0.2s ease;
    }

    .cancel-button:hover {
        color: #30263d;

        background: #ebe8f0;
    }


    .create-button {
        padding: 9px 20px;

        border: none;

        border-radius: 8px;

        font-size: 14px;

        font-weight: 700;

        color: #ffffff;

        background:
            linear-gradient(
                135deg,
                #6d28d9,
                #8b5cf6
            );

        box-shadow:
            0 5px 14px rgba(109, 40, 217, 0.20);

        transition: all 0.25s ease;
    }

    .create-button:hover {
        color: #ffffff;

        transform: translateY(-1px);

        box-shadow:
            0 8px 18px rgba(109, 40, 217, 0.27);
    }


    /* =========================
       Responsive
    ========================== */

    @media (max-width: 768px) {

        .podcast-create-page {
            padding: 25px 12px;
        }

        .podcast-card .card-header {
            padding: 18px 20px;
        }

        .podcast-card .card-footer {
            padding: 14px 20px;
        }

        .podcast-icon {
            width: 42px;
            height: 42px;

            font-size: 18px;
        }

        .podcast-header-text h4 {
            font-size: 19px;
        }

        .podcast-header-text p {
            font-size: 13px;
        }

    }

</style>
@endpush


@section('content')

<div class="podcast-create-page">

    <div class="podcast-create-wrapper">

        <div class="card podcast-card">

            {{-- Header --}}
            <div class="card-header">

                <div class="podcast-header-content">

                    <div class="podcast-icon">
                        <i class="fas fa-microphone-alt"></i>
                    </div>

                    <div class="podcast-header-text">

                        <h4>
                            Create New Podcast
                        </h4>

                        <p>
                            Upload a new podcast to your channel.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('podcasts.store') }}"
                enctype="multipart/form-data"
            >

                @csrf

                @include('front.pages.podcasts._form')


                {{-- Footer --}}
                <div class="card-footer">

                    <a
                        href="{{ route('channel.index') }}"
                        class="btn cancel-button mr-2"
                    >
                        <i class="fas fa-arrow-left mr-1"></i>

                        Cancel
                    </a>


                    <button
                        type="submit"
                        class="btn create-button"
                    >
                        <i class="fas fa-plus mr-1"></i>

                        Create Podcast
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection