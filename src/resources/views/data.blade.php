@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mb-5">
        <div class="col-12">
            <div class="card bg-dark text-white">
                <div class="card-header">Users</div>

                <div class="card-body p-0">
                    <table class="table table-dark table-striped table-sm mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Barcode</th>
                                <th>Household Members</th>
                                <th>Institutions</th>
                                <th>Loans</th>
                                <th>Loan Assignments</th>
                                <th>Comments</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->getAddress() }}</td>
                                <td>{{ $user->barcode }}</td>
                                <td>{{ $user->household_members_count }}</td>
                                <td>{{ $user->institutions_count }}</td>
                                <td>{{ $user->loans_count }}</td>
                                <td>{{ $user->loan_assignments_count }}</td>
                                <td>{{ $user->comments_count }}</td>
                                <td>{{ $user->role->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-12">
            <div class="card bg-dark text-white">
                <div class="card-header">Institutions</div>

                <div class="card-body p-0">
                    <table class="table table-dark table-striped table-sm mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Contact</th>
                                <th>Users</th>
                                <th>Resources</th>
                                <th>Loans</th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($institutions as $institution)
                            <tr>
                                <td>{{ $institution->id }}</td>
                                <td>{{ $institution->name }}</td>
                                <td>{{ $institution->getAddress() }}</td>
                                <td>{{ $institution->phone }}</td>
                                <td>{{ $institution->contact->name }}</td>
                                <td>{{ $institution->users_count }}</td>
                                <td>{{ $institution->resources_count }}</td>
                                <td>{{ $institution->loans_count }}</td>
                                <td>{{ $institution->comments_count }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-12">
            <div class="card bg-dark text-white">
                <div class="card-header">Resources</div>

                <div class="card-body p-0">
                    <table class="table table-dark table-striped table-sm mb-0">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>Institution</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Barcode</th>
                                <th>Comments</th>
                                <th>Loans</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resources as $resource)
                            <tr>
                                <td>{{ $resource->id }}</td>
                                <td>{{ $resource->institution->name }}</td>
                                <td>{{ $resource->title }}</td>
                                <td>{{ $resource->author }}</td>
                                <td>{{ $resource->barcode }}</td>
                                <td>{{ $resource->comments_count }}</td>
                                <td>{{ $resource->loans_count }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-12">
            <div class="card bg-dark text-white">
                <div class="card-header">Loans</div>

                <div class="card-body p-0">
                    <table class="table table-dark table-striped table-sm mb-0">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>Borrowing Institution</th>
                                <th>Lending Institution</th>
                                <th>Resource</th>
                                <th>Requester</th>
                                <th>Assignee</th>
                                <th>Type</th>
                                <th>Barcode</th>
                                <th>Comments</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                            <tr>
                                <td>{{ $loan->id }}</td>
                                <td>{{ $loan->institution->name }}</td>
                                <td>{{ $loan->lender->name }}</td>
                                <td>{{ $loan->resource->title }}</td>
                                <td>{{ $loan->user->name }}</td>
                                <td>{{ $loan->assignee->name }}</td>
                                <td>{{ $loan->type }}</td>
                                <td>{{ $loan->barcode }}</td>
                                <td>{{ $loan->comments_count }}</td>
                                <td>{{ $loan->type }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
