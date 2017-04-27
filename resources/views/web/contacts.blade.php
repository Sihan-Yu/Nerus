@extends('layouts.web')

@section('content')
    <section id="contact-info">
        <div class="center">
            <h2>{{ __('web.reach_us') }}</h2>
            <p class="lead">{{ __('web.get_in_touch') }}</p>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            @if (\Session::get('language') != 'cn')
                                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7766.271656398231!2d121.66670083113279!3d29.925924820383738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x344d6354630858f7%3A0x948723f846ccf173!2sNingbo%2C+Zhejiang%2C+China!5e0!3m2!1sen!2sjp!4v1492740735909;output=embed"></iframe>
                            @else
                                <div id="allmap"></div>@endif
                        </div>
                    </div>
                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <div class="col-sm-6">
                                <address>
                                    <h5>{{ __('web.office_1') }}</h5>
                                    <p>{{ __('web.address_1') }}<br/>
                                        {{ __('web.address_2') }}</p>
                                    <p>{{ __('web.phone') }}: {{ __('web.phone_number') }} <br/>
                                        {{ __('web.email') }}: {{ __('web.email_address') }}</p>
                                </address>
                                <address>
                                    <h5>{{ __('web.office_poland') }}</h5>
                                    <p>{{ __('web.address_1_poland') }}<br/>
                                        {{ __('web.address_2_poland') }}</p>
                                    <p>{{ __('web.phone') }}: {{ __('web.phone_number_poland') }} <br/>
                                        {{ __('web.email') }}: {{ __('web.email_address_poland') }}</p>
                                </address>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-page">
        <div class="container">
            <div class="center">
                <h2>{{ __('web.request_a_quote') }}</h2>
                <p class="lead">{{ __('web.drop_us_message') }}</p>
            </div>
            <div class="row contact-wrap">
                <div class="status alert-success" style="display: none"></div>
                <form id="contact-form" class="contact-form" name="contact-form" method="POST"
                      action="{{ route('send.rfq') }}">
                    {{ csrf_field() }}

                    <div class="col-sm-5 col-sm-offset-1">

                        <div class="form-group">
                            <label>{{ __('web.name') }} <span style="color: red">*</span></label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label>{{ __('web.company') }} <span style="color: red">*</span></label>
                            <input type="text" name="company" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label>{{ __('web.email') }} <span style="color: red">*</span></label>
                            <input type="text" name="email" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label>{{ __('web.phone') }}</label>
                            <input type="text" name="phone" class="form-control">
                        </div>

                    </div>

                    <div class="col-sm-5">

                        <div class="form-group">
                            <label>{{ __('web.volume') }}</label>
                            <input type="text" name="volume" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('web.static_pressure') }}</label>
                            <input type="text" name="pressure" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('web.temperature') }}</label>
                            <input type="text" name="temperature" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('web.fan_position') }}</label>
                            <input type="text" name="fan_position" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('web.description') }}</label>
                            <textarea name="description" id="message" class="form-control" rows="8"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">{{ __('web.send_request') }}</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection

@if (\Session::get('language') == 'cn')
@section('scripts')
    <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=2.0&ak=TvnK6vxplRAZEz0BeBZ7DG4K6XBiUOA7"></script>
    <script type="text/javascript">

        function loadJScript() {
            var script = document.createElement("script");
            script.type = "text/javascript";
            script.src = "http://api.map.baidu.com/api?v=2.0&ak=vAL4nmLGFExhVsnbjsGWasaMfqDvqnbt&callback=init";
            document.body.appendChild(script);
        }

        function init() {
            var map = new BMap.Map('allmap');
            map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
            map.addControl(new BMap.MapTypeControl());
            map.setCurrentCity('北京');
            map.enableScrollWheelZoom(true);
        }

        window.onload = loadJScript();
    </script>
@endsection
@endif