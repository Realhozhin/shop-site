@extends('layouts.app')

@section('title')
{{ $product->metaTitle }}
@endsection
@section('metaKeyword')
{{ $product->metaKeyword }}
@endsection
@section('metaDescription')
{{ $product->metaDescription }}
@endsection
@section('content')

    <div>
        <livewire:product.view :category="$category" :product="$product"/>
    </div>

@endsection
