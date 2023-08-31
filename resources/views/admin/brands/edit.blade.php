@extends('layouts.admin')
@section('title','editBRAND')
@section('content')
        <section class="row m-0 mt-5">
            <section class="col-12 p-3 bg-gray-400 text-dark">
                {!! Form::model($brand,['route'=>['Brands.update','id'=>$brand->id],'method'=>'put','files'=>true]) !!}
                <div class="mb-3">
                    <label>SELECT CATEGORY</label>
                    <select name="categoryID" required class="form-control">
                        <option value="">--SELECT CATEGORY--</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('categoryID')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('name','name') !!}
                    {!! Form::text('name',null,['class'=>'form-control','style'=>'bordered:2px inset black']) !!}
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('slug','slug') !!}
                    {!! Form::text('slug',null,['class'=>'form-control']) !!}
                    @error('slug')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('status','status') !!}
                    <input type="checkbox" name="status" {{ $brand->status == 'on'?'checked':'' }}>
                    @error('status')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-5">
                    {!! Form::submit('update',['class'=>'btn btn-success']) !!}
                </section>
                {!! Form::close() !!}
                <a href="{{route('Brands.index')}}" class="btn btn-warning mt-2">return back</a>
            </section>
        </section>
@endsection

