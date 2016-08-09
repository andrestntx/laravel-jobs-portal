@extends('layouts.portal')

@section('extra-css')
    <style type="text/css">
        .btn-group.bootstrap-select.form-control.ajax-select .btn.dropdown-toggle.btn-default {
            height: auto;
            line-height: 40px;
            padding: 4px;
        }
        .bootstrap-select.form-control.ajax-select .btn.dropdown-toggle.btn-default .filter-option.pull-left {
            font-size: 16px;
            margin: 0 10px;
            color: #5d5b5b;
        }
    </style>
@endsection

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
                                {!! Form::select('occupation', $occupations, $occupation, ['class' => 'form-control ajax-select', 'placeholder' => 'Ocupación', 'id' => 'occupation_id']) !!}
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <input name="search" type="text" class="form-control" value="{{ $search }}" placeholder="Buscar...">
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                <button type="submit" class="mj_mainbtn mj_btnyellow" data-text="Buscar"><span>Buscar</span></button>
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
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="mj_candidate_section">
        <div class="container">
            <div class="row">
                <div class="mj_jobinfo">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="row">
                            <div class="mj_showjob">
                                <p>Se encontraron <strong> {{ $resumes->total() }}</strong> Hojas de vida - Total <strong> {{ $total }}</strong></p>
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
                            <th class="text-center">Foto</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                        </tr>
                        @foreach($resumes as $resume)
                            <tr>
                                <td>
                                    <a href="#"><img src="{{ $photos->getPhotoUrlId($resume->user_id) }}" class="img-responsive" alt="">
                                    </a>
                                </td>
                                <td>
                                    <h4><a href="{{ route('resumes.show', $resume->user_id) }}">{{ $resume->first_name . ' ' . $resume->last_name }}</a></h4>
                                    <p>{{ $resume->study_title }}</p>
                                </td>
                                <td><i class="fa fa-map-marker"></i>
                                    <P>{{ $resume->formatted_address }}</P>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    <div class="mj_paginations">
                         {!! $resumes->appends(['occupation' =>  $occupation, 'profile' =>  $profile, 'search' =>  $search])->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')
    <script src="/js/gmaps.js"></script>
    <script src="/js/services/searchOccupations.js"></script>

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

        searchOccupations.init();

    </script>
    
    
@endsection
