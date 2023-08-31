@extends('layouts.admin')
@section('title','editCategory')
@section('content')
        <section class="row m-0 mt-5">
            <section class="col-12 p-3 bg-gray-400 text-dark">
                {!! Form::model($category,['route'=>['category.update','id'=>$category->id],'method'=>'put','files'=>true]) !!}
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
                    {!! Form::label('description','description') !!}
                    {!! Form::textarea('description',null,['class'=>'form-control','style'=>'resize:none;height:150px']) !!}
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-5">
                    {!! Form::label('image','image') !!}
                    {!! Form::file('image',['class'=>'form-control']) !!}
                    <img src="{{asset('image/category/'.$category->image)}}" width="100px" height="100px" class="m-3">
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('status','status') !!}
                    <input type="checkbox" name="status" {{ $category->status == 'on'?'checked':'' }}>
                    @error('status')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('metaTitle','metaTitle') !!}
                    {!! Form::text('metaTitle',null,['class'=>'form-control','style'=>'resize:none;height:150px']) !!}
                    @error('metaTitle')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('metaKeywords','metaKeywords') !!}
                    {!! Form::textarea('metaKeywords',null,['class'=>'form-control','style'=>'resize:none;height:150px']) !!}
                    @error('metaKeywords')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('metaDescription','metaDescription') !!}
                    {!! Form::textarea('metaDescription',null,['class'=>'form-control','style'=>'resize:none;height:150px']) !!}
                    @error('metaDescription')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-5">
                    {!! Form::submit('update',['class'=>'btn btn-success']) !!}
                </section>
                {!! Form::close() !!}
                <a href="{{route('category.index')}}" class="btn btn-warning mt-2">return back</a>
            </section>
        </section>
@endsection
