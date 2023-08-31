@extends('layouts.admin')
@section('title','Brand')
@section('content')
    <div class="row">
        <div class="c0l-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>BRAND</h4>
                    <a href="{{route('Brands.create')}}" class="btn btn-primary btn-sm float-end">AddBrand</a>
                </div>
                <div class="card-body">
                        @if(session('update'))
                            <h3 class="text-center text-success">{{session('update')}}</h3>
                        @endif
                        @if(session('delete'))
                            <h3 class="text-center text-danger">{{session('delete')}}</h3>
                        @endif
                    <h1 class="text-center mb-2">main page BRAND</h1>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>category</td>
                            <td>Slug</td>
                            <td>status</td>
                            <td>delete</td>
                            <td>update</td>
                        </tr>
                        @forelse($brand as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @if ($item->category)
                                        {{$item->category->name}}
                                    @else
                                        no category
                                    @endif
                                </td>
                                <td>{{ $item->slug }}</td>
                                <td>{{$item->status == 'on'?'visible':'hidden'}}</td>
                                <td>
                                    {!! Form::open(['route'=>['Brands.destroy','id'=>$item->id],'method'=>'delete']) !!}
                                        {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route'=>['Brands.edit','id'=>$item->id],'method'=>'get']) !!}
                                        {!! Form::submit('update',['class'=>'btn btn-warning']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <td colspan="5">no data</td>
                        @endforelse
                    </table>
                    <div>{{ $brand->links('vendor.pagination.bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
