@extends('layouts.admin')
@section('title','createproduct')
@section('content')
    <div class="row">
        <div class="c0l-md-12">
            @if (session('create'))
                <h5 class="text-center text-success">{{ session('create') }}</h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Add product</h4>
                    <a href="{{route('Products.index')}}" class="btn btn-warning btn-sm float-end">returnBack</a>
                </div>
                <div class="card-body">
                    <form action="{{route('Products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="mb-3">
                            <label>select CATEGORY</label>
                            <select name="category_id" class="form-control" style="border: 2px inset lightslategray">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                           </div>
                            <div class="col-md-6 mb-3">
                                <label>name</label>
                                <input type="text" name="name" class="form-control" style="border: 2px inset lightslategray">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>slug</label>
                                <input type="text" name="slug" class="form-control" style="border: 2px inset lightslategray">
                                @error('slug')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>select BRAND</label>
                                <select name="brand" class="form-control" style="border: 2px inset lightslategray">
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                               </div>
                            <div class="col-md-12 mb-3">
                                <label>smallDescription</label>
                                <textarea type="text" name="smallDescription" class="form-control" rows="3" style="border: 2px inset lightslategray"></textarea>
                                @error('smallDescription')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>description</label>
                                <textarea type="text" name="description" class="form-control" rows="5" style="border: 2px inset lightslategray"></textarea>
                                @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>originalPrice</label>
                                <input type="text" name="originalPrice" class="form-control" style="border: 2px inset lightslategray">
                                @error('originalPrice')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>sellingPrice</label>
                                <input type="text" name="sellingPrice" class="form-control" style="border: 2px inset lightslategray">
                                @error('sellingPrice')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>quantity</label>
                                <input type="text" name="quantity" class="form-control" style="border: 2px inset lightslategray">
                                @error('quantity')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3 p-3">
                                <label>trending</label></br>
                                <input type="checkbox" name="trending">
                                @error('trending')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3 p-3">
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
                                <textarea type="text" name="metaDescription" class="form-control" rows="5" style="border: 2px inset lightslategray"></textarea>
                                @error('metaDescription')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>ADD product images</label>
                                <input type="file" name="image[]" multiple class="form-control" style="border: 2px inset lightslategray">
                            </div>
                            <div class="mb-3">
                                <label>Select product color</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        @forelse ($color as $item)
                                           Color:  <input type="checkbox" name="colors[{{ $item->id }}]" style="border: 2px inset lightslategray" value="{{ $item->id }}">{{ $item->name }}
                                           <br/>
                                           Quantity: <input type="number" class="form-control" name="Colorquantity[{{ $item->id }}]" style="width: 70px; border:1px solid">
                                       @empty
                                            <h3>no color available</h3>
                                        @endforelse
                                    </div>
                                </div>
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
