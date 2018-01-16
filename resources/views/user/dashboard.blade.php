@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Users</div>

                <div class="panel-body">
                    <p>General information about the users.</p>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                            </tr>
                        </thead>

                        <tbody>

                            @if (count($users) > 0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                @endforeach
                            @else
                                There are no users.
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

            <a href="/user/create" class="btn btn-success">Add User</a>
        </div>
    </div>
</div>
@endsection
