@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('products.products'), 'description' => __('products.products_description')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('products.products'), 'icon' => 'fa fa-tag', 'route' => route('products.index'), 'active' => 1]]])

@section('content')
    <h4>{{ __('products.products') }}</h4>

    <div class="row">

        <div class="col-md-4">
qwe
        </div>
        <div class="col-md-4">
ewq
        </div>
        <div class="col-md-4">
wqe
        </div>

    </div>
@endsection