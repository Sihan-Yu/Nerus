@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('crm.crm'), 'description' => __('crm.crm_desc')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('crm.crm'), 'icon' => 'fa fa-address-book', 'route' => route('crm.index'), 'active' => 1]]])

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('crm.customers') }}</h3>

                    <div class="box-tools">

                        <form action="{{ route('crm.search') }}" method="post">
                            {{ csrf_field() }}

                            <div class="input-group input-group-sm" style="width: 450px;">
                                <input type="text" name="company_search" class="form-control pull-right"
                                       placeholder="{{ __('crm.search') }}" value="{{ $old }}">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                <a href="{{ route('crm.company.create') }}" class="btn btn-default"><i class="fa fa-plus"></i>
                                    &nbsp; {{ __('crm.add_new_customer') }}</a>
                                <a href="{{ route('crm.company.create') }}" class="btn btn-info"><i class="fa fa-search-plus"></i>
                                    &nbsp; {{ __('crm.advanced_search') }}</a>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>{{ __('crm.name_en') }}</th>
                            <th>{{ __('crm.name_cn') }}</th>
                            <th>{{ __('crm.country') }}</th>
                            <th>{{ __('crm.sales_responsible') }}</th>
                        </tr>
                        @if (count($customers) > 0)
                            @foreach ($customers as $customer)
                            <tr>
                                <td><a href="{{ route('crm.view', $customer->id) }}">{{ $customer->name_en }}</a></td>
                                <td><a href="{{ route('crm.view', $customer->id) }}">{{ $customer->name_cn }}</a></td>
                                <td><img src="/images/flags/{{ strtolower($customer->country_id) }}.png" alt="flag"/>
                                    &nbsp; {{ __("countries.".$customer->country_id) }}</td>
                                <td><i class="fa fa-user"></i> &nbsp; <a
                                            href="{{ route('user.view', $customer->assigned_to_id) }}">{{ App\User::find($customer->assigned_to_id)->name }}</a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center" style="height: 100px;vertical-align: middle"><i class="fa fa-search"></i> &nbsp; {{ __('crm.no_companies_found') }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection