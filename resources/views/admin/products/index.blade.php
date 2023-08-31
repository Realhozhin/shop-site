@extends('layouts.admin')
@section('title','Products')
@section('content')
    <div class="row">
        <div class="c0l-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>category</h4>
                    <a href="{{route('Products.create')}}" class="btn btn-primary btn-sm float-end">AddProducts</a>
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
                            <td>Category</td>
                            <td>product</td>
                            <td>price</td>
                            <td>Quantity</td>
                            <td>status</td>
                            <td>delete</td>
                            <td>update</td>
                        </tr>
                        @forelse($product as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    @if ($item->category)
                                        {{$item->category->name}}
                                    @else
                                        no category
                                    @endif
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->sellingPrice}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->status == 'on'?'visible':'hidden'}}</td>
                                <td>
                                    {!! Form::open(['route'=>['Products.destroy','id'=>$item->id],'method'=>'delete']) !!}
                                        {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route'=>['Products.edit','id'=>$item->id],'method'=>'get']) !!}
                                        {!! Form::submit('update',['class'=>'btn btn-warning']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <td colspan="8">no data</td>
                        @endforelse
                    </table>
                    <div>{{ $product->links('vendor.pagination.bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
