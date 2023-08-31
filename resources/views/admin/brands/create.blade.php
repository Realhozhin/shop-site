@extends('layouts.admin')
@section('title','createBrands')
@section('content')
    <div class="row">
        <div class="c0l-md-12">
            @if (session('create'))
                <h5 class="text-center text-success">{{ session('create') }}</h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Add category</h4>
                    <a href="{{route('Brands.index')}}" class="btn btn-warning btn-sm float-end">returnBack</a>
                </div>
                <div class="card-body">
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
                    <form action="{{route('Brands.store')}}" method="POST" enctype="multipart/form-data">
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
