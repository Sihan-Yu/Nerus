@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('products.products'), 'description' => __('products.products_description')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('products.products'), 'icon' => 'fa fa-tag', 'route' => route('products.index'), 'active' => 1]]])

@section('content')
    <h4>{{ __('products.fans') }}</h4>


@endsection