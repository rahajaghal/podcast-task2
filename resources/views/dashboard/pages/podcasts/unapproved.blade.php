@extends('layouts.dashboard')

@section('title', 'Pending Podcasts')


@section('breadcrumb')

    <li class="breadcrumb-item active">
        Pending Podcasts
    </li>

@endsection


@section('content')

    <x-flash-message/>


    <div class="podcasts-page">

        {{-- =====================================================
             PAGE HEADER
        ====================================================== --}}

        <div class="page-header">

            <div>

                <h3>
                    <i class="fas fa-podcast"></i>
                    Pending Podcasts
                </h3>

                <p>
                    Review and manage podcasts waiting for approval.
                </p>

            </div>


            <div class="podcast-count">

                <span>
                    {{ $podcasts->count() }}
                </span>

                Pending

            </div>

        </div>



        {{-- =====================================================
             PODCASTS CARD
        ====================================================== --}}

        <div class="card podcasts-card">


            {{-- Card Header --}}

            <div class="card-header">

                <div class="card-title">

                    <i class="fas fa-list"></i>

                    Unapproved Podcasts

                </div>

            </div>



            {{-- Card Body --}}

            <div class="card-body p-0">


                @if($podcasts->count())


                    <div class="table-responsive">


                        <table class="podcasts-table">


                            {{-- =====================================================
                                 TABLE HEADER
                            ====================================================== --}}

                            <thead>

                                <tr>

                                    <th>
                                        #
                                    </th>

                                    <th>
                                        Podcast
                                    </th>

                                    <th>
                                        Channel
                                    </th>

                                    <th>
                                        Category
                                    </th>

                                    <th>
                                        Size
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Actions
                                    </th>

                                </tr>

                            </thead>



                            {{-- =====================================================
                                 TABLE BODY
                            ====================================================== --}}

                            <tbody>


                                @foreach($podcasts as $podcast)


                                    <tr>


                                        {{-- =================================================
                                             ID
                                        ================================================== --}}

                                        <td class="podcast-id">

                                            {{ $podcast->id }}

                                        </td>



                                        {{-- =================================================
                                             PODCAST
                                        ================================================== --}}

                                        <td>

                                            <div class="podcast-info">


                                                <div class="podcast-icon">

                                                    <i class="fas fa-microphone"></i>

                                                </div>


                                                <div class="podcast-name">

                                                    {{ $podcast->title }}

                                                </div>

                                            </div>

                                        </td>



                                        {{-- =================================================
                                             CHANNEL
                                        ================================================== --}}

                                        <td>

                                            @if($podcast->channel)

                                                <div class="channel-info">

                                                    @if($podcast->channel->image)

                                                        <img
                                                            src="{{ asset('storage/' . $podcast->channel->image) }}"
                                                            alt="{{ $podcast->channel->name }}"
                                                            class="channel-image"
                                                        >

                                                    @else

                                                        <div class="channel-image channel-placeholder">

                                                            <i class="fas fa-podcast"></i>

                                                        </div>

                                                    @endif


                                                    <span class="channel-name">

                                                        {{ $podcast->channel->name }}

                                                    </span>

                                                </div>

                                            @else

                                                <span class="text-muted">
                                                    Unknown
                                                </span>

                                            @endif

                                        </td>



                                        {{-- =================================================
                                             CATEGORY
                                        ================================================== --}}

                                        <td>

                                            @if($podcast->category)

                                                <span class="category">

                                                    {{ $podcast->category->name }}

                                                </span>

                                            @else

                                                <span class="text-muted">
                                                    Unknown
                                                </span>

                                            @endif

                                        </td>



                                        {{-- =================================================
                                             SIZE
                                        ================================================== --}}

                                        <td>

                                            <span class="size">

                                                {{ number_format($podcast->size, 2) }} MB

                                            </span>

                                        </td>



                                        {{-- =================================================
                                             STATUS
                                        ================================================== --}}

                                        <td>

                                            @if($podcast->approved)

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



                                        {{-- =================================================
                                             ACTIONS
                                        ================================================== --}}

                                        <td>


                                            <div class="actions">


                                                {{-- Approve --}}

                                                <a
                                                    href="{{ route('approve.podcasts', $podcast->id) }}"
                                                    class="action-btn approve-btn"
                                                >

                                                    <i class="fas fa-check"></i>

                                                    Approve

                                                </a>



                                                {{-- Delete --}}

                                                <form
                                                    action="{{ route('podcast.delete', $podcast->id) }}"
                                                    method="POST"
                                                    
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="action-btn delete-btn">
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


                    {{-- =================================================
                         EMPTY STATE
                    ================================================== --}}

                    <div class="empty-state">


                        <div class="empty-icon">

                            <i class="fas fa-check-circle"></i>

                        </div>


                        <h4>
                            No Pending Podcasts
                        </h4>


                        <p>
                            There are currently no podcasts waiting for approval.
                        </p>


                    </div>


                @endif


            </div>


        </div>


    </div>


@endsection



@push('styles')

<style>


/* =========================================================
   PAGE
========================================================= */

.podcasts-page {

    padding:
        5px 0 20px;

}



/* =========================================================
   PAGE HEADER
========================================================= */

.page-header {

    display:
        flex;

    align-items:
        center;

    justify-content:
        space-between;

    margin-bottom:
        18px;

    gap:
        15px;

}


.page-header h3 {

    margin:
        0;

    color:
        #2d2438;

    font-size:
        22px;

    font-weight:
        600;

}


.page-header h3 i {

    color:
        #6d28d9;

    margin-right:
        7px;

}


.page-header p {

    margin:
        4px 0 0;

    color:
        #716b7d;

    font-size:
        13px;

}



/* =========================================================
   COUNTER
========================================================= */

.podcast-count {

    background:
        #f5f3fb;

    color:
        #6d28d9;

    border:
        1px solid #ddd6fe;

    padding:
        7px 13px;

    border-radius:
        8px;

    font-size:
        13px;

    font-weight:
        500;

    white-space:
        nowrap;

}


.podcast-count span {

    font-weight:
        700;

    font-size:
        16px;

    margin-right:
        3px;

}



/* =========================================================
   CARD
========================================================= */

.podcasts-card {

    border:
        1px solid #e8e4f0;

    border-radius:
        10px;

    box-shadow:
        0 2px 8px rgba(76, 29, 149, 0.06);

    overflow:
        hidden;

    margin-bottom:
        0;

}


.podcasts-card .card-header {

    background:
        #fff;

    border-bottom:
        1px solid #eeeaf5;

    padding:
        13px 17px;

}


.card-title {

    color:
        #2d2438;

    font-size:
        15px;

    font-weight:
        600;

}


.card-title i {

    color:
        #6d28d9;

    margin-right:
        6px;

}



/* =========================================================
   TABLE
========================================================= */

.podcasts-table {

    width:
        100%;

    border-collapse:
        collapse;

    margin:
        0;

}


.podcasts-table thead {

    background:
        #faf9ff;

}


.podcasts-table th {

    padding:
        11px 13px;

    color:
        #716b7d;

    font-size:
        12px;

    font-weight:
        600;

    text-transform:
        uppercase;

    letter-spacing:
        .3px;

    border-bottom:
        1px solid #eeeaf5;

    white-space:
        nowrap;

}


.podcasts-table td {

    padding:
        11px 13px;

    vertical-align:
        middle;

    border-bottom:
        1px solid #f0edf5;

    color:
        #40384b;

    font-size:
        13px;

}


.podcasts-table tbody tr:last-child td {

    border-bottom:
        none;

}


.podcasts-table tbody tr {

    transition:
        background-color .15s ease;

}


.podcasts-table tbody tr:hover {

    background:
        #faf9ff;

}



/* =========================================================
   ID
========================================================= */

.podcast-id {

    color:
        #9993a2 !important;

    font-weight:
        600;

    width:
        45px;

}



/* =========================================================
   PODCAST
========================================================= */

.podcast-info {

    display:
        flex;

    align-items:
        center;

    gap:
        10px;

    min-width:
        190px;

}


.podcast-icon {

    width:
        42px;

    height:
        42px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    flex-shrink:
        0;

    border-radius:
        8px;

    background:
        #ede9fe;

    color:
        #6d28d9;

    font-size:
        16px;

}


.podcast-name {

    color:
        #2d2438;

    font-weight:
        600;

    font-size:
        13px;

    max-width:
        220px;

    overflow:
        hidden;

    text-overflow:
        ellipsis;

    white-space:
        nowrap;

}



/* =========================================================
   CHANNEL
========================================================= */

.channel-info {

    display:
        flex;

    align-items:
        center;

    gap:
        9px;

    min-width:
        160px;

}


.channel-image {

    width:
        42px;

    height:
        42px;

    border-radius:
        8px;

    object-fit:
        cover;

    flex-shrink:
        0;

    border:
        1px solid #e5def5;

}


.channel-placeholder {

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    background:
        #f5f3fb;

    color:
        #8b5cf6;

    font-size:
        16px;

}


.channel-name {

    color:
        #2d2438;

    font-weight:
        600;

    font-size:
        13px;

}



/* =========================================================
   CATEGORY
========================================================= */

.category {

    display:
        inline-block;

    padding:
        5px 9px;

    border-radius:
        6px;

    background:
        #f5f3ff;

    color:
        #6d28d9;

    font-size:
        11px;

    font-weight:
        600;

    white-space:
        nowrap;

}



/* =========================================================
   SIZE
========================================================= */

.size {

    color:
        #716b7d;

    font-size:
        12px;

    white-space:
        nowrap;

}



/* =========================================================
   STATUS
========================================================= */

.status {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        5px;

    padding:
        5px 9px;

    border-radius:
        20px;

    font-size:
        11px;

    font-weight:
        600;

    white-space:
        nowrap;

}


.status.pending {

    color:
        #6d28d9;

    background:
        #ede9fe;

}


.status.approved {

    color:
        #15803d;

    background:
        #dcfce7;

}



/* =========================================================
   ACTIONS
========================================================= */

.actions {

    display:
        flex;

    align-items:
        center;

    gap:
        6px;

    white-space:
        nowrap;

}


.action-btn {

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        5px;

    min-height:
        32px;

    padding:
        5px 10px;

    border-radius:
        6px;

    font-size:
        12px;

    font-weight:
        600;

    text-decoration:
        none;

    cursor:
        pointer;

    transition:
        all .15s ease;

}


.action-btn:hover {

    text-decoration:
        none;

}



/* Approve */

.approve-btn {

    color:
        #fff;

    background:
        #6d28d9;

    border:
        1px solid #6d28d9;

}


.approve-btn:hover {

    color:
        #fff;

    background:
        #4c1d95;

    border-color:
        #4c1d95;

}



/* Delete */

.delete-btn {

    color:
        #dc2626;

    background:
        #fff;

    border:
        1px solid #fecaca;

}


.delete-btn:hover {

    color:
        #fff;

    background:
        #dc2626;

    border-color:
        #dc2626;

}



/* =========================================================
   EMPTY STATE
========================================================= */

.empty-state {

    text-align:
        center;

    padding:
        50px 20px;

}


.empty-icon {

    width:
        60px;

    height:
        60px;

    margin:
        0 auto 12px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        50%;

    background:
        #ede9fe;

    color:
        #6d28d9;

    font-size:
        25px;

}


.empty-state h4 {

    margin:
        0 0 5px;

    color:
        #2d2438;

    font-size:
        17px;

}


.empty-state p {

    margin:
        0;

    color:
        #9993a2;

    font-size:
        13px;

}



/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1100px) {

    .podcasts-table th:nth-child(5),
    .podcasts-table td:nth-child(5) {

        display:
            none;

    }

}


@media (max-width: 992px) {

    .podcasts-table th:nth-child(4),
    .podcasts-table td:nth-child(4) {

        display:
            none;

    }

}


@media (max-width: 768px) {

    .page-header {

        align-items:
            flex-start;

    }


    .podcasts-table th:nth-child(3),
    .podcasts-table td:nth-child(3) {

        display:
            none;

    }


    .actions {

        flex-direction:
            column;

        align-items:
            stretch;

    }


    .action-btn {

        width:
            85px;

    }

}


@media (max-width: 576px) {

    .page-header {

        flex-direction:
            column;

    }


    .podcast-count {

        align-self:
            flex-start;

    }


    .podcasts-table th,
    .podcasts-table td {

        padding:
            9px 8px;

    }


    .podcast-icon {

        width:
            36px;

        height:
            36px;

    }


    .podcast-info {

        min-width:
            130px;

    }


    .podcast-name {

        max-width:
            140px;

    }


    .status {

        padding:
            4px 7px;

    }

}

</style>

@endpush