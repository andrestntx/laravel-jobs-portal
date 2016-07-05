@extends('layouts.portal')

@section('content')
    <form>
        <div class="mj_mapmarker">
            <div id="map" data-markers="{{ $markers }}"> </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mj_top_searchbox">
                            <div class="col-sm-3 col-xs-12">
                                {!! Form::select('profile', $profiles, $profile, ['class' => 'custom-select', 'placeholder' => 'Perfil laboral']) !!}
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="location" value="{{ $location }}" class="form-control" placeholder="Ubicación">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Palabra clave..">
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                <button class="mj_mainbtn mj_btnyellow" data-text="Buscar"><span>Buscar</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mj_filter_section">
            <div class="container">
                <div class="row">
                    <div class="mj_filter_slider">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="form-group">
                                    <label>Experiencia:<span>{{ $experienceMin }} a {{ $experienceMax }} años</span>
                                    </label>
                                    <input id="ex1" name="experience" data-slider-id='ex1Slider' type="text" data-slider-min="{{ $experienceMin }}" data-slider-max="{{ $experienceMax }}" data-slider-step="1" data-slider-value="{{ $experience }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="form-group">
                                    <label>Salario:<span> ${{ number_format($salaryMin, 0, ',', '.') }}  -  ${{ number_format($salaryMax, 0, ',', '.') }}</span>
                                    </label>
                                    @if(isset($salaryRange))
                                        <input id="ex2" name="salary" type="text" class="span2" value="" data-slider-min="{{ $salaryMin }}" data-slider-max="{{ $salaryMax }}" data-slider-step="5" data-slider-value="[{{ $salaryRange }}]" />
                                    @else
                                        <input id="ex2" name="salary" type="text" class="span2" value="" data-slider-min="{{ $salaryMin }}" data-slider-max="{{ $salaryMax }}" data-slider-step="5" data-slider-value="[{{ $salaryMin }}, {{ $salaryMax }}]" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mj_check_filter">
                        <div class="form-inline">
                            {!!  Form::checkboxes('contract-types', $types, $contractTypesSelect, ['inline']) !!}
                        </div>
                    </div>
                    <div class="mj_jobinfo">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="row">
                                <div class="mj_showjob">
                                    <p>Se encontraron <strong> {{ $jobs->total() }}</strong> ofertas de empleo cerca - Total <strong> {{ $total }} </strong> </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="row">
                                <div class="mj_rss_feed">
                                    <p>RSS <i class="fa fa-rss"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mj_tabcontent mj_bottompadder80">
                        <table class="table table-striped">
                            <tr>
                               <th>Aplicar</th>
                               <th>Empresa</th>
                               <th>Empleo</th>
                               <th>Ocupación</th>
                               <th>Dirección</th>
                               <th>Tipo de contrato</th>
                             </tr>
                            @foreach($jobs as $job)
                                <tr>
                                    <td>
                                        <div class="mj_liks"><a href="{{ route('companies.jobs.apply', [$job->company_id, $job]) }}"><i style="font-size: 25px;" class="fa fa-envelope-o"></i></a><span>Aplicar</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#"><img src="{{ $logos->getLogoUrl($job->company) }}" class="img-responsive" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <h4><a href="{{ route('companies.jobs.show', [$job->company_id, $job->id]) }}">{{ $job->name }}</a></h4>
                                        <p>{{ $job->company->name }}</p>
                                    </td>
                                    <td>{{ $job->occupation }}</td>
                                    <td><i class="fa fa-map-marker"></i>
                                        <P>{{ $job->formatted_address }}</P>
                                    </td>
                                    <td><a href="#" class="mj_btn mj_greenbtn" style="cursor:default;">{{ $job->contractType }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="mj_paginations">
                             {!! $jobs->appends(['profile' => $profile, 'location' => $location,
                                'search' => $search, 'experience' => $experience, 'contract-types' => $contractTypesSelect,
                                'salaryRange' => $salaryRange])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('extra-js')
    <script src="/js/gmaps.js"></script>
    <script>
        jQuery(document).ready(function($) {
            // map marker js

            var map = new GMaps({
                el: '#map',
                lat: 4.046119,
                lng: -73.599701,
                panControl : false,
                streetViewControl : false,
                mapTypeControl: false,
                overviewMapControl: false,
                scrollwheel: false,
                draggable:true,
                navigationControl: true,
                scaleControl: false,
                zoomControl: true,
                disableDoubleClickZoom: false,
                zoom: 9
            });

            var locations = $('#map').data('markers');

            map.addMarkers(locations);

        });
    </script>
@endsection
