@extends('layouts.admin')
@section('title','createSliders')
@section('content')
    <div class="row">
        <div class="c0l-md-12">
            @if (session('message'))
                <h5 class="text-center text-success">{{ session('message') }}</h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Add Slider</h4>
                    <a href="{{route('Sliders.index')}}" class="btn btn-warning btn-sm float-end">returnBack</a>
                </div>
                <div class="card-body">
                    <form action="{{route('Sliders.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>title</label>
                                <input type="text" name="title" class="form-control" style="border: 2px inset lightslategray">
                                @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>description</label>
                                <textarea type="text" name="description" class="form-control" style="border: 2px inset lightslategray"></textarea>
                                @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>image</label>
                                <input type="file" name="image" class="form-control" style="border: 2px inset lightslategray">
                                @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 p-3">
                                <label>status</label></br>
                                <input type="checkbox" name="status">
                                @error('status')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-success m-3">save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
