@extends('layouts.app')

@include('layouts.parts.page_title', ['title' => __('dashboard.dashboard'), 'description' => __('dashboard.dashboard_description')])
@include('layouts.parts.breadcrumbs', ['breadcrumbs' => [0 => ['text' => __('dashboard.dashboard'), 'icon' => 'fa fa-dashboard', 'route' => route('dashboard'), 'active' => 0]]])

@section('content')

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>0</h3>
                    <p>{{ __('dashboard.new_orders') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">{{ __('dashboard.more_info') }} <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>0</h3>
                    <p>{{ __('dashboard.total_orders') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-checkbox"></i>
                </div>
                <a href="#" class="small-box-footer">{{ __('dashboard.more_info') }} <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>0</h3>
                    <p>{{ __('dashboard.new_rfq') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-alert-circled"></i>
                </div>
                <a href="#" class="small-box-footer">{{ __('dashboard.more_info') }} <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>0</h3>
                    <p>{{ __('dashboard.customers') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-contacts"></i>
                </div>
                <a href="#" class="small-box-footer">{{ __('dashboard.more_info') }} <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">

        <section class="col-lg-7 connectedSortable">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#revenue-chart" data-toggle="tab">{{ __('dashboard.area') }}</a></li>
                    <li class="pull-left header"><i class="fa fa-inbox"> {{ __('dashboard.sales') }}</i></li>
                </ul>
                <div class="tab-content no-padding">
                    <div class="chart tab-pane active" id="revenue-chart"
                         style="position:relative;height: 300px;"></div>
                </div>
            </div>

            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-comments-o"></i>

                    <h3 class="box-title">{{ __('dashboard.notifications') }}</h3>

                </div>
            </div>


        </section>

        <section class="col-lg-5 connectedSortable">
            <div class="box box-solid bg-light-blue-gradient">
                <div class="box-header">

                    <i class="fa fa-map-marker"></i>

                    <h3 class="box-title">
                        Customers
                    </h3>
                </div>
                <div class="box-body">
                    <div id="world-map" style="height: 250px; width: 100%;"></div>
                </div>

            </div>
        </section>

    </div>

@endsection

@section('scripts')
    <script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="/plugins/fastclick/fastclick.js"></script>
    <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript">

        $.widget.bridge('uibutton', $.ui.button);

        $(function () {

            "use strict";

            //Make the dashboard widgets sortable Using jquery UI
            $(".connectedSortable").sortable({
                placeholder: "sort-highlight",
                connectWith: ".connectedSortable",
                handle: ".box-header, .nav-tabs",
                forcePlaceholderSize: true,
                zIndex: 999999
            });
            $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");

            //jvectormap data
            var visitorsData = {
                "CN": 10000
            };

            //World map by jvectormap
            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 1,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 1
                    }
                },
                series: {
                    regions: [{
                        values: visitorsData,
                        scale: ["#92c1dc", "#ebf4f9"],
                        normalizeFunction: 'polynomial'
                    }]
                },
                onRegionLabelShow: function (e, el, code) {
                    if (typeof visitorsData[code] != "undefined")
                        el.html(el.html() + ': ' + visitorsData[code] + '');
                }
            });



        });
    </script>
@endsection