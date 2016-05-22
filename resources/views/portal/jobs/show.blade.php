@extends('layouts.portal')

@section('content')
    <div class="mj_pagetitle2">
        <div class="mj_pagetitleimg">
            <img src="/images/background-job.jpg" alt="">
            <div class="mj_mainheading_overlay"></div>
        </div>
        <div class="mj_pagetitle_inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mj_mainheading">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="mj_joblogo">
                                        <img src="{{ $logoUrl }}" class="img-responsive" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="mj_pageheading mj_toppadder50">
                                        <h1><span>{{  $job->name }}</span></h1>
                                        <ul>
                                            <li>
                                                <label><i class="fa fa-map-marker"></i>
                                                </label><a href="#">{{  $job->address }}</a>
                                            </li>
                                            <li>
                                                <a href="#" class="mj_btn mj_greenbtn">{{ $job->contractType->name }}</a>
                                            </li>
                                            <li>
                                                <label>Empresa: </label><span class="mj_green_text"><a href="{{ route('companies.show', $job->company) }}">{{ $job->company->name }}</a></span>
                                            </li>
                                            <li>
                                                <label>Salario: </label><span class="mj_green_text salary">{{ $job->salary }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mj_lightgraytbg mj_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                    <div class="mj_social_media_section mj_candidatepage_media mj_toppadder40 mj_bottompadder40">
                        <ul>
                            @can('edit', $job)
                                <li><a href="{{ route('companies.jobs.edit', [$job->company, $job]) }}" class="mj_mainbtn mj_btnyellow" data-text="Editar Oferta de empleo">
                                        <span>Editar Oferta de empleo</span>
                                    </a>
                                </li>
                                <li><a href="{{ route('companies.jobs.applications', [$job->company, $job]) }}" class="mj_mainbtn mj_btnblue" data-text="solicitudes">
                                        <span>solicitudes</span>
                                    </a>
                                </li>
                            @else
                                @can('apply', $job)
                                    <li><a href="{{ route('companies.jobs.apply', [$job->company, $job]) }}" class="mj_mainbtn mj_btnyellow" data-text="Aplicar"><span>Aplicar</span></a></li>
                                @else
                                    <li style="margin-bottom: 30px;"><a href="#">-</a></li>
                                @endcan
                            @endcan
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mj_postdiv mj_jobdetail mj_toppadder50 mj_bottompadder50">
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Empresa</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="mj_detaildiv">
                                        <a href="{{ route('companies.show', $job->company) }}" title="Ver empresa" style="font-size: 24px;"> 
                                            {!! $job->company->name !!} 
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Ocupación</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="mj_detaildiv">
                                        {!! $job->occupation->name !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Finalización</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="mj_detaildiv">
                                        {!! $job->closing_date_detail !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Descripción</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="mj_detaildiv">
                                        {!! $job->description !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Salario</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="mj_detaildiv salary">
                                        {!! $job->salary !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Quíen debería aplicar</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="mj_detaildiv">
                                        {!! $job->who_apply !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Habilidades</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="mj_detaildiv">
                                        <ul class="mj_selected_content">
                                            @foreach($job->skills as $skill)
                                                <li>
                                                    <a href="#"> <i class="fa fa-check"></i> {{ $skill->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Beneficios del empleo</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="mj_detaildiv">
                                        {!! $job->offer !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Dirección</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    @if($job->geoLocation)
                                        @include('includes.google-maps.init', ['geo_location' => $job->geoLocation])
                                    @endif

                                    @include('includes.google-maps.map')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_bottompadder30">
                    <div class="mj_about_section mj_toppadder80 mj_bottompadder80">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                                <h1><span><a href="{{ route('companies.show', $job->company) }}">{{ $job->company->name }}</a></span></h1>
                                {!! $job->company->description !!}
                                <ul>
                                    <li><a href="{{ route('companies.show', $job->company) }}"><i class="fa fa-plus"></i> Más empleos</a>
                                    </li>
                                    <li><a href="{{ $job->company->website_link }}"><i class="fa fa-link"></i> Página Web</a>
                                    </li>
                                    <li><a href="{{ $job->company->twitter_link }}"><i class="fa fa-twitter"></i>Twitter</a>
                                    </li>
                                    <li><a href="{{ $job->company->facebook_link }}"><i class="fa fa-facebook"></i>facebook</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')
    <script src="/js/services/searchLocation.js"></script>
    <script> searchLocation.initShowLocation(); </script>
@endsection