@extends('layouts.admin')
@section('title','createCategory')
@section('content')
    <div class="row">
        <div class="c0l-md-12">
            @if (session('message'))
                <h5 class="text-center text-success">{{ session('message') }}</h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Add category</h4>
                    <a href="{{route('category.index')}}" class="btn btn-warning btn-sm float-end">returnBack</a>
                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>name</label>
                                <input type="text" name="name" class="form-control" style="border: 2px inset lightslategray">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>slug</label>
                                <input type="text" name="slug" class="form-control" rows="3" style="border: 2px inset lightslategray">
                                @error('slug')
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
                            <div class="col-md-12 text-center mb-3">
                                <h4>SEO tags</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>metaTitle</label>
                                <input type="text" name="metaTitle" class="form-control" style="border: 2px inset lightslategray">
                                @error('metaTitle')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>metaKeywords</label>
                                <textarea type="text" name="metaKeywords" class="form-control" rows="3" style="border: 2px inset lightslategray"></textarea>
                                @error('metaKeywords')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>metaDescription</label>
                                <textarea type="text" name="metaDescription" class="form-control" rows="3" style="border: 2px inset lightslategray"></textarea>
                                @error('metaDescription')
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
