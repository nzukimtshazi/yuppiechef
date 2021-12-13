<!-- app/views/user/index.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Current Users -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <h4>Users</h4>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="user/add" role="button" class="btn btn-default">Add User</a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped" id="dataTable">
                @if (count($users) > 0)

                    <!-- Table Headings -->
                    <thead>
                        <th width="30%">User</th>
                        <th width="30%">Email</th>
                        <th width="*">Action</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <!-- User Name -->
                                <td class="table-text">
                                    <div>{{ $user->name }}</div>
                                </td>

                                <!-- User Email -->
                                <td class="table-text">
                                    <div>{{ $user->email }}</div>
                                </td>

                                <td>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-2">
                                            {!! Form::model($user, ['method' => 'GET', 'route' => ['editUser', $user->id]]) !!}
                                            <button type="submit" class="btn btn-warning">
                                                <i class="fa fa-trash"></i> Edit
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <div class="alert alert-info" role="alert">No users are available</div>
                @endif
            </table>
        </div>
    </div>
@endsection
