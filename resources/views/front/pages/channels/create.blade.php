@extends('layouts.website')

@section('title', 'Create Channel')

@push('styles')
<style>

    /* =========================
       Create Channel Page
    ========================== */

    .channel-create-page {
        min-height: 75vh;

        padding: 40px 15px;

        background:
            linear-gradient(
                180deg,
                #faf9ff 0%,
                #f5f3fb 100%
            );
    }

    .channel-create-wrapper {
        max-width: 720px;
        margin: 0 auto;
    }


    /* =========================
       Main Card
    ========================== */

    .channel-card {
        position: relative;

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

    .channel-card .card-header {
        position: relative;

        padding: 22px 28px;

        background: #ffffff;

        border-bottom: 1px solid #f0edf7;
    }

    .channel-header-content {
        position: relative;
        z-index: 1;

        display: flex;

        align-items: center;

        gap: 13px;
    }


    /* =========================
       Icon
    ========================== */

    .channel-icon {
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

    .channel-header-text h4 {
        margin: 0;

        color: #1f1633;

        font-size: 21px;

        font-weight: 800;
    }

    .channel-header-text p {
        margin: 3px 0 0;

        color: #716b7d;

        font-size: 14px;
    }


    /* =========================
       Card Body
    ========================== */

    .channel-card .card-body {
        padding: 28px;
    }


    /* =========================
       Form
    ========================== */

    .channel-card .form-group {
        margin-bottom: 18px;
    }

    .channel-card label {
        color: #30263d;

        font-size: 14px;

        font-weight: 700;

        margin-bottom: 6px;
    }

    .channel-card .form-control {
        min-height: 42px;

        border: 1px solid #e3dff0;

        border-radius: 9px;

        padding: 8px 12px;

        font-size: 14px;

        color: #30263d;

        background: #ffffff;

        box-shadow: none;

        transition:
            border-color 0.2s ease,
            box-shadow 0.2s ease;
    }

    .channel-card .form-control:focus {
        border-color: #8b5cf6;

        box-shadow:
            0 0 0 3px rgba(139, 92, 246, 0.10);
    }

    .channel-card textarea.form-control {
        min-height: 100px;

        resize: vertical;
    }

    .channel-card .form-control::placeholder {
        color: #aaa4b5;
    }


    /* =========================
       File Input
    ========================== */

    .channel-card input[type="file"] {
        padding: 7px 10px;

        background: #faf9ff;

        cursor: pointer;
    }


    /* =========================
       Errors
    ========================== */

    .channel-card .text-danger {
        display: block;

        margin-top: 4px;

        font-size: 12px;
    }


    /* =========================
       Footer
    ========================== */

    .channel-card .card-footer {
        padding: 16px 28px;

        background: #ffffff;

        border-top: 1px solid #f0edf7;

        display: flex;

        align-items: center;

        justify-content: flex-end;
    }


    /* =========================
       Cancel Button
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


    /* =========================
       Create Button
    ========================== */

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

        .channel-create-page {
            padding: 25px 12px;
        }

        .channel-card .card-header {
            padding: 18px 20px;
        }

        .channel-card .card-body {
            padding: 22px 20px;
        }

        .channel-card .card-footer {
            padding: 14px 20px;
        }

        .channel-icon {
            width: 42px;
            height: 42px;

            font-size: 18px;
        }

        .channel-header-text h4 {
            font-size: 19px;
        }

        .channel-header-text p {
            font-size: 13px;
        }

    }

</style>
@endpush


@section('content')

<div class="channel-create-page">

    <div class="channel-create-wrapper">

        <div class="card channel-card">

            {{-- Header --}}
            <div class="card-header">

                <div class="channel-header-content">

                    <div class="channel-icon">

                        <i class="fas fa-podcast"></i>

                    </div>

                    <div class="channel-header-text">

                        <h4>
                            Create Your Channel
                        </h4>

                        <p>
                            Create your podcast channel and start sharing your content.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('channel.store') }}"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="card-body">

                    @include('front.pages.channels._form')

                </div>


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
                        Create Channel
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection