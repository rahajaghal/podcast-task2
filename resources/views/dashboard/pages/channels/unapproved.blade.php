@extends('layouts.dashboard')

@section('title', 'Pending Channels')

@section('breadcrumb')
    <li class="breadcrumb-item active">
        Pending Channels
    </li>
@endsection

@section('content')

    <x-flash-message/>

    <div class="channels-page">

        {{-- Page Header --}}
        <div class="page-header">
            <div>
                <h3>
                    <i class="fas fa-podcast"></i>
                    Pending Channels
                </h3>

                <p>
                    Review and manage channels waiting for approval.
                </p>
            </div>

            <div class="channel-count">
                <span>{{ $channels->count() }}</span>
                Pending
            </div>
        </div>


        {{-- Channels Card --}}
        <div class="card channels-card">

            <div class="card-header">
                <div class="card-title">
                    <i class="fas fa-list"></i>
                    Unapproved Channels
                </div>
            </div>

            <div class="card-body p-0">

                @if($channels->count())

                    <div class="table-responsive">

                        <table class="channels-table">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Channel</th>
                                    <th>Owner</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($channels as $channel)

                                    <tr>

                                        {{-- ID --}}
                                        <td class="channel-id">
                                            {{ $channel->id }}
                                        </td>


                                        {{-- Channel --}}
                                        <td>
                                            <div class="channel-info">

                                                @if($channel->image)

                                                    <img
                                                        src="{{ asset('storage/' . $channel->image) }}"
                                                        alt="{{ $channel->name }}"
                                                        class="channel-image"
                                                    >

                                                @else

                                                    <div class="channel-image channel-placeholder">
                                                        <i class="fas fa-podcast"></i>
                                                    </div>

                                                @endif


                                                <div class="channel-name">
                                                    {{ $channel->name }}
                                                </div>

                                            </div>
                                        </td>


                                        {{-- Owner --}}
                                        <td>
                                            @if($channel->user)
                                                <div class="owner-info">

                                                    <i class="fas fa-user"></i>

                                                    <span>
                                                        {{ $channel->user->name }}
                                                    </span>

                                                </div>
                                            @else
                                                <span class="text-muted">
                                                    Unknown
                                                </span>
                                            @endif
                                        </td>


                                        {{-- Description --}}
                                        <td>

                                            <div class="description">

                                                {{ $channel->description ?: 'No description available.' }}

                                            </div>

                                        </td>


                                        {{-- Status --}}
                                        <td>

                                            @if($channel->approved)

                                                <span class="status approved">
                                                    <i class="fas fa-check-circle"></i>
                                                    Approved
                                                </span>

                                            @else

                                                <span class="status pending">
                                                    <i class="fas fa-clock"></i>
                                                    Pending
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Actions --}}
                                        <td>

                                            <div class="actions">

                                                {{-- Approve --}}
                                                <a
                                                    href="{{ route('approve.channel', $channel->id) }}"
                                                    class="action-btn approve-btn"
                                                >
                                                    <i class="fas fa-check"></i>
                                                    Approve
                                                </a>


                                                {{-- Delete --}}
                                                <form
                                                    action="{{ route('delete.channel', $channel->id) }}"
                                                    method="POST"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="action-btn delete-btn"
                                                    >
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    {{-- Empty State --}}
                    <div class="empty-state">

                        <div class="empty-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>

                        <h4>No Pending Channels</h4>

                        <p>
                            There are currently no channels waiting for approval.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

@endsection


@push('styles')

<style>

    .channels-page {
        padding: 5px 0 20px;
    }


    /* =========================
       Page Header
    ========================= */

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
        gap: 15px;
    }

    .page-header h3 {
        margin: 0;
        color: #2d2438;
        font-size: 22px;
        font-weight: 600;
    }

    .page-header h3 i {
        color: #6d28d9;
        margin-right: 7px;
    }

    .page-header p {
        margin: 4px 0 0;
        color: #716b7d;
        font-size: 13px;
    }


    /* =========================
       Counter
    ========================= */

    .channel-count {
        background: #f5f3fb;
        color: #6d28d9;
        border: 1px solid #ddd6fe;
        padding: 7px 13px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        white-space: nowrap;
    }

    .channel-count span {
        font-weight: 700;
        font-size: 16px;
        margin-right: 3px;
    }


    /* =========================
       Card
    ========================= */

    .channels-card {
        border: 1px solid #e8e4f0;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(76, 29, 149, 0.06);
        overflow: hidden;
        margin-bottom: 0;
    }

    .channels-card .card-header {
        background: #fff;
        border-bottom: 1px solid #eeeaf5;
        padding: 13px 17px;
    }

    .card-title {
        color: #2d2438;
        font-size: 15px;
        font-weight: 600;
    }

    .card-title i {
        color: #6d28d9;
        margin-right: 6px;
    }


    /* =========================
       Table
    ========================= */

    .channels-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .channels-table thead {
        background: #faf9ff;
    }

    .channels-table th {
        padding: 11px 13px;
        color: #716b7d;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .3px;
        border-bottom: 1px solid #eeeaf5;
        white-space: nowrap;
    }

    .channels-table td {
        padding: 11px 13px;
        vertical-align: middle;
        border-bottom: 1px solid #f0edf5;
        color: #40384b;
        font-size: 13px;
    }

    .channels-table tbody tr:last-child td {
        border-bottom: none;
    }

    .channels-table tbody tr {
        transition: background-color .15s ease;
    }

    .channels-table tbody tr:hover {
        background: #faf9ff;
    }


    /* =========================
       ID
    ========================= */

    .channel-id {
        color: #9993a2 !important;
        font-weight: 600;
        width: 45px;
    }


    /* =========================
       Channel
    ========================= */

    .channel-info {
        display: flex;
        align-items: center;
        gap: 9px;
        min-width: 170px;
    }

    .channel-image {
        width: 42px;
        height: 42px;
        border-radius: 8px;
        object-fit: cover;
        flex-shrink: 0;
        border: 1px solid #e5def5;
    }

    .channel-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f5f3fb;
        color: #8b5cf6;
        font-size: 16px;
    }

    .channel-name {
        color: #2d2438;
        font-weight: 600;
        font-size: 13px;
    }


    /* =========================
       Owner
    ========================= */

    .owner-info {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #51495d;
        white-space: nowrap;
    }

    .owner-info i {
        color: #8b5cf6;
        font-size: 12px;
    }


    /* =========================
       Description
    ========================= */

    .description {
        max-width: 250px;
        color: #716b7d;
        line-height: 1.4;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }


    /* =========================
       Status
    ========================= */

    .status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status.pending {
        color: #6d28d9;
        background: #ede9fe;
    }

    .status.approved {
        color: #15803d;
        background: #dcfce7;
    }


    /* =========================
       Actions
    ========================= */

    .actions {
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
    }

    .actions form {
        margin: 0;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;

        min-height: 32px;
        padding: 5px 10px;

        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;

        text-decoration: none;
        cursor: pointer;

        transition: all .15s ease;
    }

    .approve-btn {
        color: #fff;
        background: #6d28d9;
        border: 1px solid #6d28d9;
    }

    .approve-btn:hover {
        color: #fff;
        background: #4c1d95;
        border-color: #4c1d95;
        text-decoration: none;
    }

    .delete-btn {
        color: #dc2626;
        background: #fff;
        border: 1px solid #fecaca;
    }

    .delete-btn:hover {
        color: #fff;
        background: #dc2626;
        border-color: #dc2626;
    }


    /* =========================
       Empty State
    ========================= */

    .empty-state {
        text-align: center;
        padding: 50px 20px;
    }

    .empty-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #ede9fe;
        color: #6d28d9;

        font-size: 25px;
    }

    .empty-state h4 {
        margin: 0 0 5px;
        color: #2d2438;
        font-size: 17px;
    }

    .empty-state p {
        margin: 0;
        color: #9993a2;
        font-size: 13px;
    }


    /* =========================
       Responsive
    ========================= */

    @media (max-width: 992px) {

        .channels-table th:nth-child(4),
        .channels-table td:nth-child(4) {
            display: none;
        }

    }


    @media (max-width: 768px) {

        .page-header {
            align-items: flex-start;
        }

        .channels-table th:nth-child(3),
        .channels-table td:nth-child(3) {
            display: none;
        }

        .actions {
            flex-direction: column;
            align-items: stretch;
        }

        .action-btn {
            width: 85px;
        }

    }


    @media (max-width: 576px) {

        .page-header {
            flex-direction: column;
        }

        .channel-count {
            align-self: flex-start;
        }

        .channels-table th,
        .channels-table td {
            padding: 9px 8px;
        }

        .channel-image {
            width: 36px;
            height: 36px;
        }

        .channel-info {
            min-width: 130px;
        }

        .status {
            padding: 4px 7px;
        }

    }

</style>

@endpush