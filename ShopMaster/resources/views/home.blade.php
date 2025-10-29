@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Welcome to {{ config('app.name') }}</h1>
    <p>Browse our wide selection of products!</p>
    <a href="{{ route('products.index') }}" class="btn btn-primary">Shop Now</a>
@endsection
