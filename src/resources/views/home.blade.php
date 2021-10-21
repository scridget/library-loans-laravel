@php
use App\Constants\Loan;
@endphp

@extends('layouts.app')

@section('content')
<div class="container-fluid px-3 px-md-4">
    <div class="row">
        <div class="col">
            <form class="form-inline mb-4">
                <label class="sr-only" for="status"></label>
                <select class="custom-select mr-2" name="status" id="status">
                    <option value="active" {{ request()->input('status') == 'active' ? 'selected' : '' }}>All Active Requests</option>
                    @foreach (Loan::STATUSES as $status)
                        <option value="{{ $status }}" {{ request()->input('status') == $status ? 'selected' : '' }}>{{ Loan::STATUS_LABELS[$status] }}</option>
                    @endforeach
                </select>

                <label class="sr-only" for="requested_at">Requested Date</label>
                <input class="form-control mr-2" type="month" id="requested_at" name="requested_at" value="{{ request()->input('requested_at') }}">

                <label class="sr-only" for="search">Search</label>
                <input class="form-control mr-2" type="text" id="search" name="search" value="{{ request()->input('search') }}">

                <input type="hidden" name="sort" value="{{ request()->query('sort') }}">

                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card bg-dark text-white">
                <div class="card-header">Loans</div>

                <div class="card-body">
                    @if (count($loans))
                        <table class="table table-dark table-striped table-sm mb-0">
                            <thead>
                                <th><a href="{{
                                    request()->url(). '?'
                                    . http_build_query(array_merge(request()->except('page'),['sort' => 'title']))}}">
                                        Title
                                    </a>
                                </th>
                                <th><a href="{{
                                    request()->url(). '?'
                                    . http_build_query(array_merge(request()->except('page'),['sort' => 'patrons.name']))}}">
                                        Patron
                                    </a>
                                </th>
                                <th><a href="{{
                                    request()->url(). '?'
                                    . http_build_query(array_merge(request()->except('page'),['sort' => 'binder_pocket']))}}">
                                        Pocket
                                    </a>
                                </th>
                                <th><a href="{{
                                    request()->url(). '?'
                                    . http_build_query(array_merge(request()->except('page'),['sort' => 'requested_at']))}}">
                                        Date Requested
                                    </a>
                                </th>
                                <th><a href="{{
                                    request()->url(). '?'
                                    . http_build_query(array_merge(request()->except('page'),['sort' => 'status']))}}">
                                        Status
                                    </a>
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td><a href="{{ route('loan', array_merge(request()->query(), ['loan' => $loan])) }}">
                                            {{ $loan->title }}
                                        </a> <a href="{{ route('loans.edit', ['loan' => $loan]) }}">[Edit]</a></td>
                                        <td><a href="{{ route('patron', array_merge(request()->query(), ['patron' => $loan->patron])) }}">
                                            {{ $loan->patron->name }}
                                        </a></td>
                                        <td>{{ $loan->binder_pocket }}</td>
                                        <td>{{ $loan->requested_at->format('F j, y') }}</td>
                                        <td>{{ Loan::STATUS_LABELS[$loan->status] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $loans->links() }}
                    @else
                        <p>No results found. Try broadening your search.</p>
                    @endif
                </div>
            </div>
        </div>
        @if (isset($patron))
            <div class="col-4">
                <div class="card bg-dark text-white">
                    <div class="card-header">Patron</div>

                    <div class="card-body">
                        <h4 class="card-title">
                            {{ $patron->name }}
                            <small class="text-muted">{{ $patron->barcode }}</small>
                        </h4>
                        <p>
                            <a href="mailto:{{ $patron->email }}">{{ $patron->email }}</a> |
                            {{ $patron->phone }}
                        </p>
                        Loans
                        <table class="table table-dark table-striped table-sm mb-0">
                            <thead>
                                <th><a href="{{ request()->url() . '?sort=title'}}">Title</a></th>
                                <th><a href="{{ request()->url() . '?sort=requested_at'}}">Requested</a></th>
                                <th><a href="{{ request()->url() . '?sort=status'}}">Status</a></th>
                            </thead>
                            <tbody>
                                @foreach ($patron->loans as $loan)
                                    <tr>
                                        <td><a href="{{ route('loan', array_merge(request()->query(), ['loan' => $loan])) }}">
                                            {{ $loan->title }}
                                        </a></td>
                                        <td>{{ $loan->requested_at }}</td>
                                        <td>{{ $loan->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if (count($patron->comments))
                            @include('components.comments', ['comments' => $patron->comments])
                        @endif
                    </div>
                </div>
            </div>            
        @endif
        @if (isset($institution))
            <div class="col-4">
                <div class="card bg-dark text-white">
                    <div class="card-header">Institution</div>

                    <div class="card-body">
                        <h4 class="card-title">
                            {{ $institution->name }}
                            <small class="text-muted">{{ $institution->barcode }}</small>
                        </h4>
                        <p>
                            <a href="mailto:{{ $institution->email }}">{{ $institution->email }}</a> |
                            {{ $institution->phone }}
                        </p>
                        Loans
                        <table class="table table-dark table-striped table-sm mb-0">
                            <thead>
                                <th><a href="{{ request()->url() . '?sort=title'}}">Title</a></th>
                                <th><a href="{{ request()->url() . '?sort=requested_at'}}">Requested</a></th>
                                <th><a href="{{ request()->url() . '?sort=status'}}">Status</a></th>
                            </thead>
                            <tbody>
                                @foreach ($institution->loans as $loan)
                                    <tr>
                                        <td><a href="{{ route('loan', array_merge(request()->query(), ['loan' => $loan])) }}">
                                            {{ $loan->title }}
                                        </a></td>
                                        <td>{{ $loan->requested_at }}</td>
                                        <td>{{ $loan->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if (count($institution->comments))
                            @include('components.comments', ['comments' => $institution->comments])
                        @endif
                    </div>
                </div>
            </div>            
        @endif
        @if (isset($loanDetail))
            <div class="col-4">
                <div class="card bg-dark text-white">
                    <div class="card-header">Incoming Loan Request</div>

                    <div class="card-body">
                        <h4 class="card-title">
                            {{ $loanDetail->title }}
                            <small><a href="{{ route('loans.edit', ['loan' => $loan]) }}">[Edit]</a></small>
                        </h4>
                        <h6 class="card-subtitle">
                            NRE {{ $loanDetail->nre_id }}<br/>
                            RPL {{ $loanDetail->internal_barcode }}<br/>
                            OI {{ $loanDetail->external_barcode}}
                        </h6>

                        <div class="card mt-2">
                            <div class="card-body text-dark">
                                <h6 class="card-title">{{ $loanDetail->patron->name }}</h6>
                                @if ($loanDetail->patron->preferred_contact === 0)
                                    <p><a href="mailto:{{ $loanDetail->patron->email }}">{{ $loanDetail->patron->email }}</a></p>
                                @else
                                    <p>{{ $loanDetail->patron->phone }}</p>
                                @endif
                                <a href="{{ route('patron', array_merge(request()->query(), ['patron' => $loanDetail->patron])) }}">Details ></a>
                            </div>
                        </div>

                        <div class="card mt-2">
                            <div class="card-body text-dark">
                                <h6 class="card-title">{{ $loanDetail->institution->name }}</h6>
                                <p><a href="mailto:{{ $loanDetail->institution->email }}">{{ $loanDetail->institution->email }}</a></p>
                                <a href="{{ route('institution', array_merge(request()->query(), ['institution' => $loanDetail->institution])) }}">Details ></a>
                            </div>
                        </div>

                        @if (count($loanDetail->comments))
                            @include('components.comments', ['comments' => $loanDetail->comments])
                        @endif
                    </div>
                </div>
            </div>            
        @endif
    </div>
</div>
@endsection
