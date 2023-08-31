@extends('layouts.admin')
@section('title','Sliders')
@section('content')
    <div class="row">
        <div class="c0l-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>category</h4>
                    <a href="{{route('Sliders.create')}}" class="btn btn-primary btn-sm float-end">AddSlider</a>
                </div>
                <div class="card-body">
                        @if(session('update'))
                            <h3 class="text-center text-success">{{session('update')}}</h3>
                        @endif
                        @if(session('delete'))
                            <h3 class="text-center text-danger">{{session('delete')}}</h3>
                        @endif
                    <h1 class="text-center mb-2">main page slider</h1>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>ID</td>
                            <td>title</td>
                            <td>description</td>
                            <td>image</td>
                            <td>status</td>
                            <td>delete</td>
                            <td>update</td>
                        </tr>
                        @forelse($slider as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->description}}</td>
                                <td><img src="{{asset('image/slider/'.$item->image)}}" width="50px" height="50px"></td>
                                <td>{{$item->status == 'on'?'visible':'hidden'}}</td>
                                <td>
                                    {!! Form::open(['route'=>['Sliders.destroy','id'=>$item->id],'method'=>'delete']) !!}
                                        {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route'=>['Sliders.edit','id'=>$item->id],'method'=>'get']) !!}
                                        {!! Form::submit('update',['class'=>'btn btn-warning']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <td colspan="8">no data</td>
                        @endforelse
                    </table>
                    <div>{{ $slider->links('vendor.pagination.bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
