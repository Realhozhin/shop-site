@extends('layouts.admin')
@section('title','editProduct')
@section('content')
@foreach ($errors->all() as $error)
    <p>{{  $error }}</p>
@endforeach
        <section class="row m-0 mt-5">
            <section class="col-12 p-3 bg-gray-400 text-dark">
                {!! Form::model($product,['route'=>['Products.update','id'=>$product->id],'method'=>'post','files'=>true]) !!}
                {{ method_field('patch') }}
                <div class="mb-3">
                    <label>select CATEGORY</label>
                    <select name="category_id" class="form-control" style="border: 2px inset lightslategray">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':'' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
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
                <div class="mb-3">
                    <label>select BRAND</label>
                    <select name="brand" class="form-control" style="border: 2px inset lightslategray">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected':'' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                   </div>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('smallDescription','smallDescription') !!}
                    {!! Form::text('smallDescription',null,['class'=>'form-control']) !!}
                    @error('smallDescription')
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
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('originalPrice','originalPrice') !!}
                    {!! Form::text('originalPrice',null,['class'=>'form-control']) !!}
                    @error('originalPrice')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('sellingPrice','sellingPrice') !!}
                    {!! Form::text('sellingPrice',null,['class'=>'form-control']) !!}
                    @error('sellinglPrice')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('quantity','quantity') !!}
                    {!! Form::text('quantity',null,['class'=>'form-control']) !!}
                    @error('quantity')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('trending','trending') !!}
                    <input type="checkbox" name="trending" {{ $product->trending == 'on'?'checked':'' }}>
                    @error('trending')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('status','status') !!}
                    <input type="checkbox" name="status" {{ $product->status == 'on'?'checked':'' }}>
                    @error('status')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('metaTitle','metaTitle') !!}
                    {!! Form::text('metaTitle',null,['class'=>'form-control']) !!}
                    @error('metaTitle')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('metaKeywords','metaKeywords') !!}
                    {!! Form::text('metaKeywords',null,['class'=>'form-control']) !!}
                    @error('metaKeywords')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('metaDescription','metaDescription') !!}
                    {!! Form::text('metaDescription',null,['class'=>'form-control']) !!}
                    @error('metaDescription')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <div class="mb-3">
                    <label>ADD product images</label>
                    <input type="file" name="image[]" multiple class="form-control" style="border: 2px inset lightslategray">
                </div>
                <div>
                    @if($product->productImage)
                        @foreach ($product->productImage as $image)
                            <img src="{{ asset($image->image) }}" alt="img" style="widt: 80px;height:80px;" class="me-4 border">
                        @endforeach
                    @else
                        <h4>No  Data To Show</h4>
                    @endif
                </div>
                <div class="mb-3">
                    <h4>add product color</h4>
                    <label>Select product color</label>
                    <div class="row">
                        <div class="col-md-3">
                            @forelse ($colors as $item)
                               Color:  <input type="checkbox" name="colors[{{ $item->id }}]" style="border: 2px inset lightslategray" value="{{ $item->id }}">{{ $item->name }}
                               <br/>
                               Quantity: <input type="number" class="form-control" name="Colorquantity[{{ $item->id }}]" style="width: 70px; border:1px solid">
                           @empty
                                <h3>no color available</h3>
                            @endforelse
                        </div>
                    </div>
                    <div class="table">
                        <table class="table table-sm table-bordered">
                                <tr>
                                    <td>Color name</td>
                                    <td>Quantity</td>
                                    <td>Delete</td>
                                </tr>
                                @foreach ($product->productColor as $item)
                                <tr class="prod-color-tr">
                                        <td>
                                            @if ($item->color)
                                            {{ $item->color->name }}
                                            @else
                                            <h3>no color found</h3>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="input-group mb-3" style="width:150px">
                                                <input type="text" value="{{ $item->quantity }}" class="productColorQuantity form-control form-control-sm">
                                                <button type="button" value="{{ $item->id }}" class="updateProductColor btn btn-primary btn-sm text-white">update</button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" value="{{ $item->id }}" class="deleteProductColor btn btn-danger btn-sm text-white">delete</button>
                                        </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
                <section class="d-block mt-5">
                    {!! Form::submit('update',['class'=>'btn btn-success']) !!}
                </section>
                {!! Form::close() !!}
                <a href="{{route('Products.index')}}" class="btn btn-warning mt-2">return back</a>
            </section>
        </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $(document).on('click', '.updateProductColor', function() {

                var item_id = $(this).val();
                alert(item_id);
            });
        });
    </script>
@endsection
