@extends('layouts.admin')
@section('title','Users')
@section('content')
    <div class="row">
        <div class="c0l-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Users</h4>
                    <a href="{{route('users.create')}}" class="btn btn-primary btn-sm float-end">Add User</a>
                </div>
                <div class="card-body">
                        @if(session('update'))
                            <h3 class="text-center text-success">{{session('update')}}</h3>
                        @endif
                        @if(session('delete'))
                            <h3 class="text-center text-danger">{{session('delete')}}</h3>
                        @endif
                    <h1 class="text-center mb-2">main page Products</h1>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>delete</td>
                            <td>update</td>
                        </tr>
                        @forelse($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->role_as == '1')
                                        <label class="badge btn-success">Admin</label>
                                    @elseif ($item->role_as == '0')
                                        <label class="badge btn-primary">User</label>
                                    @endif
                                </td>
                                <td>
                                    {!! Form::open(['route'=>['users.destroy','id'=>$item->id],'method'=>'delete']) !!}
                                        {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route'=>['users.edit','id'=>$item->id],'method'=>'get']) !!}
                                        {!! Form::submit('update',['class'=>'btn btn-warning']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <td colspan="5">no data</td>
                        @endforelse
                    </table>
                    <div>{{ $users->links('vendor.pagination.bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
