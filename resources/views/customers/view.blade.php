@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('crm.crm'), 'description' => __('crm.crm_desc')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('crm.crm'), 'icon' => 'fa fa-address-book', 'route' => route('crm.index'), 'active' => 0], 1 => ['text' => $data->name_en . ' ('.$data->name_cn.')', 'icon' => 'fa fa-address-card', 'route' => route('crm.index'), 'active' => 1]]])

@section('content')
    <div class="row">
        <div class="col-md-4">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('crm.information') }}</h3>
                </div>

                <div class="box-body box-profile">

                    <ul class="list-group list-group-unbordered">

                        @if ($data->name_en)
                            <li class="list-group-item">
                                <b>{{ __('crm.name_en') }}</b> <a class="pull-right">{{ $data->name_en }}</a>
                            </li>
                        @endif

                        @if ($data->name_cn)
                            <li class="list-group-item">
                                <b>{{ __('crm.name_cn') }}</b> <a class="pull-right">{{ $data->name_cn }}</a>
                            </li>
                        @endif

                        @if ($data->name_en)
                            <li class="list-group-item">
                                <b>{{ __('crm.country') }}</b> <a class="pull-right"><img
                                            src="/images/flags/{{ strtolower($data->country_id) }}.png" alt="flag"/>
                                    &nbsp; {{ __("countries.".$data->country_id) }}</a>
                            </li>
                        @endif

                        @if ($data->assigned_to_id)
                            <li class="list-group-item">
                                <b>{{ __('crm.sales_responsible') }}</b> <a
                                        class="pull-right">{{ App\User::find($data->assigned_to_id)->name }}</a>
                            </li>
                        @endif

                        @if ($data->phone)
                            <li class="list-group-item">
                                <b>{{ __('crm.phone') }}</b> <a class="pull-right">{{ $data->phone }}</a>
                            </li>
                        @endif

                        @if ($data->fax)
                            <li class="list-group-item">
                                <b>{{ __('crm.fax') }}</b> <a class="pull-right">{{ $data->fax }}</a>
                            </li>
                        @endif

                        @if ($data->email)
                            <li class="list-group-item">
                                <b>{{ __('crm.email') }}</b> <a class="pull-right">{{ $data->email }}</a>
                            </li>
                        @endif

                        @if ($data->website)
                            <li class="list-group-item">
                                <b>{{ __('crm.website') }}</b> <a href="{{ $data->website }}" target="_self" class="pull-right">{{ $data->website }} <i class="fa fa-external-link"></i></a>
                            </li>
                        @endif

                    </ul>

                </div>

            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Address</h3>
                </div>

                <div class="allmap"></div>

                <div class="box-body">

                    @if ($data->business_address == $data->postal_address)
                        <strong><i class="fa fa-address-book margin-r-5"></i> {{ __('crm.business_address') }}
                            & {{ __('crm.postal_address') }}</strong>
                        <p class="text-muted">{{ $data->business_address }}</p>
                    @else
                        <strong><i class="fa fa-address-book margin-r-5"></i> {{ __('crm.business_address') }}</strong>
                        <p class="text-muted">{{ $data->business_address }}</p>
                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> {{ __('crm.postal_address') }}</strong>
                        <p class="text-muted">{{ $data->postal_address }}</p>
                    @endif

                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Banking Information</h3>
                </div>

                <div class="box-body">

                    <ul class="list-group list-group-unbordered">

                        <li class="list-group-item">
                            <b>{{ __('crm.bank_name') }}</b> <a class="pull-right">xxxx</a>
                        </li>

                        <li class="list-group-item">
                            <b>{{ __('crm.bank_number') }}</b> <a class="pull-right">xxx</a>
                        </li>

                        <li class="list-group-item">
                            <b>{{ __('crm.has_vat') }}</b> <a class="pull-right">xxx</a>
                        </li>

                        <li class="list-group-item">
                            <b>{{ __('crm.vat_number') }}</b> <a
                                    class="pull-right">xxxx</a>
                        </li>

                    </ul>

                </div>
            </div>

        </div>

        <div class="col-md-8">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#orders" data-toggle="tab">Orders</a>
                    </li>
                    <li>
                        <a href="#contacts" data-toggle="tab">Contacts</a>
                    </li>
                    <li>
                        <a href="#mails" data-toggle="tab">Mails</a>
                    </li>
                    <li>
                        <a href="#payments" data-toggle="tab">Payment Terms</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        function init() {
            var map = new BMap.Map("allmap");
            map.centerAndZoom("{{ $data->business_address }}", 15);
        }

        function loadMap() {
            var script = document.createElement("script");
            script.src = "http://api.map.baidu.com/api?v=2.0&ak=tvnK6vxplRAZEz0BeBZ7DG4K6XBiUOA7&callback=init";
            document.body.appendChild(script);
        }

        window.onload = loadMap();

    </script>
@endsection