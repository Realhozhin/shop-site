@extends('layouts.admin')
@section('title','Storages')
@section('content')
    <div class="row">
        <div class="c0l-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Storages</h4>
                    <a href="{{route('storage.create')}}" class="btn btn-primary btn-sm float-end">AddStorage</a>
                </div>
                <div class="card-body">
                        @if(session('update'))
                            <h3 class="text-center text-success">{{session('update')}}</h3>
                        @endif
                        @if(session('delete'))
                            <h3 class="text-center text-danger">{{session('delete')}}</h3>
                        @endif
                    <h1 class="text-center mb-2">main page Color</h1>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>ID</td>
                            <td>Ram</td>
                            <td>Storage</td>
                            <td>status</td>
                            <td>delete</td>
                        </tr>
                        @forelse($storage as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->ram}}</td>
                                <td>{{ $item->storage }}</td>
                                <td>{{$item->status == 'on'?'visible':'hidden'}}</td>
                                <td>
                                    {!! Form::open(['route'=>['storage.destroy','id'=>$item->id],'method'=>'delete']) !!}
                                        {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <td colspan="5">no data</td>
                        @endforelse
                    </table>
                    <div>{{ $storage->links('vendor.pagination.bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
