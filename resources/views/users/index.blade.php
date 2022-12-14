@extends('layouts.app')

@section('content')
    <div class="row w-100 card m-auto mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{__('Users Management')}}</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>

    @include('layouts.sessions')
    <div class="card">
        <table class="table table-bordered w-100">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {!! $data->render() !!}
@endsection
