@extends('layouts.portal')

@section('content')

    <div class="mj_mapmarker">
        <div id="map"> </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mj_top_searchbox">
                        <form>
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                {!! Form::select('skills', $skills, null, ['class' => 'custom-select', 'placeholder' => 'Habilidades']) !!}
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <select name="timepass" class="custom-select">
                                    <option>Ciudad</option>
                                    <option>Villavicencio</option>
                                    <option>Bogotá</option>
                                    <option>Medellin</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Palabra clave..">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <a href="#" class="mj_mainbtn mj_btnyellow" data-text="Buscar"><span>Buscar</span></a>
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
                                <p>Actualmente hay <strong> {{ $resumes->total() }}</strong> Hojas de vida</p>
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
                        @foreach($resumes as $resume)
                            <tr>
                                <td>
                                    <div class="mj_liks"><a href="#"><i class="fa fa-heart"></i></a><span>Contactar</span>
                                    </div>
                                </td>
                                <td>
                                    <a href="#"><img src="{{ $photos->getPhotoUrl($resume->jobseeker) }}" class="img-responsive" alt="">
                                    </a>
                                </td>
                                <td>
                                    <h4><a href="{{ route('resumes.show', $resume) }}">{{ $resume->jobseeker->full_name }}</a></h4>
                                    <p>{{ $resume->study_title }}</p>
                                </td>
                                <td><i class="fa fa-map-marker"></i>
                                    <P>{{ $resume->jobseeker->address }}</P>
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
                        {!! $resumes->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
