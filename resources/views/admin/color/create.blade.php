@extends('layouts.admin')
@section('title','createColor')
@section('content')
    <div class="row">
        <div class="c0l-md-12">
            @if (session('create'))
                <h5 class="text-center text-success">{{ session('create') }}</h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Add colors</h4>
                    <a href="{{route('colors.index')}}" class="btn btn-warning btn-sm float-end">returnBack</a>
                </div>
                <div class="card-body">
                    <form action="{{route('colors.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Color name</label>
                                <input type="text" name="name" class="form-control" style="border: 2px inset lightslategray">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>code</label>
                                <input type="text" name="code" class="form-control" style="border: 2px inset lightslategray">
                                @error('code')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 p-3">
                                <label>status</label></br>
                                <input type="checkbox" name="status">   Checked=visible,unchecked=hidden
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
