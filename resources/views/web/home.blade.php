@extends('layouts.web')

@section('content')
    @include('web.parts.slider')

    <section id="home">

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="images/lasting_design.jpg" alt="Image" class="frontpage-image"/>
                    <div class="frontpage-title green"><i class="fa fa-gears"></i> {{ __('web.lasting_design') }}</div>
                    <p>{{ __('web.lasting_design_desc') }}</p>
                </div>
                <div class="col-md-4">
                    <img src="images/quality_service.jpg" alt="Image" class="frontpage-image"/>
                    <div class="frontpage-title green"><i class="fa fa-archive"></i> {{ __('web.quality_service') }}
                    </div>
                    <p>{{ __('web.quality_service_desc') }}</p>
                </div>
                <div class="col-md-4">
                    <img src="images/high_efficiency.jpg" alt="Image" class="frontpage-image"/>
                    <div class="frontpage-title green"><i class="fa fa-leaf"></i> {{ __('web.high_efficiency') }}</div>
                    <p>{{ __('web.high_efficiency_desc') }}</p>
                </div>
            </div>

            <br/><br/>

            <div class="row">

                <div class="col-md-6">

                    <div class="frontpage-title green">{{ __('web.who_we_are') }}</div>
                    <p>{{ __('web.who_we_are_desc') }}</p>

                </div>

                <div class="col-md-6">

                    <div class="frontpage-title green">{{ __('web.what_we_do') }}</div>
                    <p>{{ __('web.what_we_do_desc') }}</p>

                    <ul>
                        <li>{{ __('web.what_we_do_bullet_1') }}</li>
                        <li>{{ __('web.what_we_do_bullet_2') }}</li>
                        <li>{{ __('web.what_we_do_bullet_3') }}</li>
                        <li>{{ __('web.what_we_do_bullet_4') }}</li>
                        <li>{{ __('web.what_we_do_bullet_5') }}</li>
                    </ul>

                </div>

            </div>

        </div>

    </section>

    <section id="stats">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-2">
                    <div class="stats">
                        <div class="stats-number">3000</div>
                        <div class="stats-text">{{ __('web.fans_per_year') }}</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="stats">
                        <div class="stats-number">25000</div>
                        <div class="stats-text">{{ __('web.projects_and_counting') }}</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="stats">
                        <div class="stats-number">18</div>
                        <div class="stats-text">{{ __('web.countries_of_installation') }}</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="stats">
                        <div class="stats-number">85</div>
                        <div class="stats-text">{{ __('web.employees') }}</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="stats">
                        <div class="stats-number">18%</div>
                        <div class="stats-text">{{ __('web.annual_growth') }}</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="stats">
                        <div class="stats-number">15</div>
                        <div class="stats-text">{{ __('web.qualified_engineers') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="home">
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="frontpage-title green">{{ __('web.company_history') }}</div>

                    <br/>

                    <div class="history wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="history-title">1919-2006</div>
                        <div class="history-description">{{ __('web.history_1') }}</div>
                    </div>
                    <div class="history wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="history-title">2006</div>
                        <div class="history-description">{{ __('web.history_2') }}</div>
                    </div>
                    <div class="history wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="history-title">2007</div>
                        <div class="history-description">{{ __('web.history_3') }}</div>
                    </div>
                    <div class="history wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="history-title">2008</div>
                        <div class="history-description">{{ __('web.history_4') }}</div>
                    </div>
                    <div class="history wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="history-title">2009</div>
                        <div class="history-description">{{ __('web.history_5') }}</div>
                    </div>
                    <div class="history wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="history-title">2013</div>
                        <div class="history-description">{{ __('web.history_6') }}</div>
                    </div>
                    <div class="history-last wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="history-title">2015</div>
                        <div class="history-description">{{ __('web.history_7') }}</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection