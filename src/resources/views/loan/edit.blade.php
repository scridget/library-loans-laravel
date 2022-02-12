@php
use App\Constants\Loan;
@endphp

@extends('layouts.app')

@section('content')
<div class="container-fluid px-3 px-md-4">
    <div class="row">
        <div class="col">
            <form>
                <div class="card bg-dark text-white mb-3">
                    <div class="card-header">Patron</div>

                    <div class="card-body">
                        <div class="form-row align-items-end">
                            <div class="form-group mb-0 col-md-2">
                                <label>Barcode</label>
                                <input type="text" class="form-control" disabled value="{{ $loan->patron->barcode }}" />
                            </div>
                            <div class="form-group mb-0 col">
                                <label>Name</label>
                                <input type="text" class="form-control" disabled value="{{ $loan->patron->name }}" />
                            </div>
                            <div class="form-group mb-0 col">
                                <label>Email</label>
                                <input type="text" class="form-control" disabled value="{{ $loan->patron->email }}" />
                            </div>
                            <div class="form-group mb-0 col-md-2">
                                <label>Phone</label>
                                <input type="text" class="form-control" disabled value="{{ $loan->patron->phone }}" />
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('loans.edit.patron', ['loan' => $loan]) }}" class="btn btn-primary">Change</a>
                                <a href="{{ route('patrons.edit', ['patron' => $loan->patron]) }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-dark text-white mb-3">
                    <div class="card-header">Institution</div>

                    <div class="card-body">
                        <div class="form-row align-items-end">
                            <div class="form-group mb-0 col">
                                <label>Name</label>
                                <input type="text" class="form-control" disabled value="{{ $loan->institution->name }}" />
                            </div>
                            <div class="form-group mb-0 col">
                                <label>Email</label>
                                <input type="text" class="form-control" disabled value="{{ $loan->institution->email }}" />
                            </div>
                            <div class="form-group mb-0 col-md-2">
                                <label>Phone</label>
                                <input type="text" class="form-control" disabled value="{{ $loan->institution->phone }}" />
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('loans.edit.institution', ['loan' => $loan]) }}" class="btn btn-primary">Change</a>
                                <a href="{{ route('institutions.edit', ['institution' => $loan->institution]) }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-dark text-white mb-3">
                    <div class="card-header">Request</div>

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
