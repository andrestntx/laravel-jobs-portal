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
                                {!! Form::select('occupation_id', $occupations, null, ['class' => 'custom-select', 'placeholder' => 'Ocupación']) !!}
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
    <div class="mj_filter_section">
        <div class="container">
            <div class="row">
                <div class="mj_filter_slider">
                    <form>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="form-group">
                                    <label>Experiencia:<span>{{ $experienceMin }} to {{ $experienceMax }} Años</span>
                                    </label>
                                    <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="{{ $experienceMin }}" data-slider-max="{{ $experienceMax }}" data-slider-step="1" data-slider-value="{{ $experienceMin }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="form-group">
                                    <label>Salario:<span> {{ $salaryMin }} - {{ $salaryMax }}</span>
                                    </label>
                                    <input id="ex2" type="text" class="span2" value="" data-slider-min="{{ $salaryMin }}" data-slider-max="{{ $salaryMax }}" data-slider-step="5" data-slider-value="[{{ $salaryMin }}, {{ $salaryMax }}]" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mj_check_filter">
                    <form class="form-inline">
                        @foreach($types as $type)
                            <div class="form-group">
                                <div class="mj_checkbox">
                                    <input type="checkbox" value="{{ $type->id }}" id="check-{{ $type->id }}" name="contrat-types">
                                    <label for="check-{{ $type->id }}"></label>
                                </div>
                                <span> {{ $type->name }}</span>
                            </div>
                        @endforeach
                    </form>
                </div>
                <div class="mj_jobinfo">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="row">
                            <div class="mj_showjob">
                                <p>Actualmente hay <strong> {{ $jobs->total() }}</strong> ofertas de empleo</p>
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
                        @foreach($jobs as $job)
                            <tr>
                                <td>
                                    <div class="mj_liks"><a href="#"><i class="fa fa-heart"></i></a><span>Aplicar</span>
                                    </div>
                                </td>
                                <td>
                                    <a href="#"><img src="{{ $logos->getLogoUrl($job->company) }}" class="img-responsive" alt="">
                                    </a>
                                </td>
                                <td>
                                    <h4><a href="{{ route('companies.jobs.show', [$job->company, $job]) }}">{{ $job->name }}</a></h4>
                                    <p>{{ $job->company->name }}</p>
                                </td>
                                <td>{{ $job->occupation->name }}</td>
                                <td><i class="fa fa-map-marker"></i>
                                    <P>{{ $job->address }}</P>
                                </td>
                                <td><a href="#" class="mj_btn mj_greenbtn">{{ $job->contractType->name }}</a>
                                </td>
                                <td><span>{{ $job->salary }}</span>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    <div class="mj_paginations">
                        {!! $jobs->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
