@extends('layouts.app')
@section('title','thankyou')
@section('content')

@if (session('message'))
<h5 class="text-center text-success">{{ session('message') }}</h5>
@endif
@if (session('message1'))
<h5 class="text-center text-warning">{{ session('message1') }}</h5>
@endif
<h5>thank you for chose us </h5>

@endsection
