@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <form class="form-inline mb-4">
                <label class="sr-only" for="status"></label>
                <select class="custom-select mr-2" name="status" id="status">
                    <option selected>Status</option>
                    <option value="1">Requested</option>
                    <option value="2">Pending</option>
                    <option value="3">Received</option>
                    <option value="4">Returned</option>
                    <option value="5">Waitlisted</option>
                    <option value="active">All Active</option>
                </select>

                <label class="sr-only" for="requested_at">Requested Date</label>
                <input class="form-control mr-2" type="month" id="requested_at" name="requested_at">

                <label class="sr-only" for="search">Search</label>
                <input class="form-control mr-2" type="text" id="search" name="search">

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
                    <table class="table table-dark table-striped table-sm mb-0">
                        <thead>
                            <th><a href="{{ request()->url() . '?sort=title'}}">Title</a></th>
                            <th>Patron</th>
                            <th><a href="{{ request()->url() . '?sort=binder_pocket'}}">Pocket</th>
                            <th><a href="{{ request()->url() . '?sort=requested_at'}}">Requested</a></th>
                            <th><a href="{{ request()->url() . '?sort=status'}}">Status</a></th>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                                <tr>
                                    <td><a href="{{ route('loan', array_merge(request()->query(), ['loan' => $loan])) }}">
                                        {{ $loan->title }}
                                    </a></td>
                                    <td><a href="{{ route('patron', array_merge(request()->query(), ['patron' => $loan->patron])) }}">
                                        {{ $loan->patron->name }}
                                    </a></td>
                                    <td>{{ $loan->binder_pocket }}</td>
                                    <td>{{ $loan->requested_at }}</td>
                                    <td>{{ $loan->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $loans->links() }}
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
                            <small class="text-muted">{{ $patron->barcode }}
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
                            <small class="text-muted">{{ $loanDetail->id }}
                        </h4>
                        <h5 class="card-subtitle">
                            RPL {{ $loanDetail->internal_barcode }}<br/>
                            OI {{ $loanDetail->external_barcode}}
                        </h5>

                        <div class="card mt-2">
                            <div class="card-body">
                                <h6 class="card-title">{{ $loanDetail->patron->name }}</h6>
                                @if ($loanDetail->patron->preferred_contact === 0)
                                    <p><a href="mailto:{{ $loanDetail->patron->email }}">{{ $loan->patron->email }}</a></p>
                                @else
                                    <p>{{ $loanDetail->patron->phone }}</p>
                                @endif
                                <a href="{{ route('patron', array_merge(request()->query(), ['patron' => $loanDetail->patron])) }}">Details ></a>
                            </div>
                        </div>

                        <div class="card mt-2">
                            <div class="card-body">
                                <h6 class="card-title">{{ $loanDetail->institution->name }}</h6>
                                <p><a href="mailto:{{ $loanDetail->institution->email }}">{{ $loanDetail->institution->email }}</a></p>
                                <a href="{{ route('institution', array_merge(request()->query(), ['institution' => $loanDetail->institution])) }}">Details ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        @endif
    </div>
</div>
@endsection
