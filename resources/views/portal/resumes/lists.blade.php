@extends('layouts.portal')

@section('content')
    <div class="mj_mapmarker">
        <div id="map" data-markers="{{ $markers }}"> </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mj_top_searchbox">
                        <form>
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                {!! Form::select('skills[]', $skills, $selectSkills, ['class' => 'custom-select', 'placeholder' => 'Habilidades']) !!}
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                {!! Form::select('location', $locations, $location, ['class' => 'custom-select', 'placeholder' => 'Ubicación']) !!}
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <input name="search" type="text" class="form-control" value="{{ $search }}" placeholder="Palabra clave..">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <button type="submit" class="mj_mainbtn mj_btnyellow" data-text="Buscar"><span>Buscar</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <th>Habilidades</th>
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
                                <td>
                                    <ul>
                                        @foreach($resume->skills as $skill)
                                            <li> {{ $skill->name }} </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    <div class="mj_paginations">
                         {!! $resumes->appends(['skills' =>  $selectSkills, 'location' =>  $location, 'search' =>  $search])->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

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
