@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">

                    <div class="btn btn-group">
                        <a class="btn btn-sm btn-success" href="{{ route('account.create') }}">
                            New Account
                        </a>
                    </div>
                    
                    <table class="table table-striped table-hover" id="post-table" width="100%">
                        <thead>
                            <tr>
                                <th>Manage</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Role</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td>
                                        <div class="btn btn-group">
                                            <a class="btn btn-sm btn-warning" href="{{ route('account.change') }}?username={{ $account->username }}">
                                                Edit
                                            </a>
                                            <a class="btn btn-sm btn-danger" href="{{ route('account.delete') }}?username={{ $account->username }}">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $account->username }}</td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->role }}</td>
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
