@extends('layouts.admin')
@section('title','Colors')
@section('content')
    <div class="row">
        <div class="c0l-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>colors</h4>
                    <a href="{{route('colors.create')}}" class="btn btn-primary btn-sm float-end">AddColor</a>
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
                            <td>Name</td>
                            <td>code</td>
                            <td>status</td>
                            <td>delete</td>
                        </tr>
                        @forelse($color as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{$item->status == 'on'?'visible':'hidden'}}</td>
                                <td>
                                    {!! Form::open(['route'=>['colors.destroy','id'=>$item->id],'method'=>'delete']) !!}
                                        {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <td colspan="5">no data</td>
                        @endforelse
                    </table>
                    <div>{{ $color->links('vendor.pagination.bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
