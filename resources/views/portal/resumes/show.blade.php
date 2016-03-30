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
                                        <img src="{{ $photoUrl }}" class="img-responsive" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="mj_pageheading mj_toppadder50">
                                        <h1><span>{{  $resume->jobseeker->full_name }}</span></h1>
                                        <ul>
                                            <li>
                                                <label><i class="fa fa-map-marker"></i>
                                                </label><a href="#">{{  $resume->jobseeker->address }}</a>
                                            </li>
                                            <li>
                                                <label><i class="fa fa-phone"></i>
                                                </label><a href="#">{{ $resume->jobseeker->phone }}</a>
                                            </li>
                                            <li>
                                                <label>Aspiración salarial: </label><span class="mj_green_text">${{ $resume->wage_aspiration }}</span>
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
                            @can('edit', $resume)
                                <li><a href="{{ route('resumes.edit', $resume) }}" class="mj_mainbtn mj_btnyellow" data-text="Editar Hoja de Vida">
                                        <span>Editar Hoja de Vida</span>
                                    </a>
                                </li>
                            @else
                               {{--  <li><a href="contact.html" class="mj_mainbtn mj_btnblue" data-text="Contactar"><span>Contactar</span></a>
                                </li>
                                --}}
                            @endcan
                        </ul>
                        <p><a target="_blank" href="{{ $resumeFileUrl }}"><i class="fa fa-2x fa-download"></i></a>
                        </p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mj_postdiv mj_jobdetail mj_toppadder50 mj_bottompadder50">
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Perfil</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="mj_detaildiv">
                                        {!! $resume->profile !!}
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
                                            @foreach($resume->skills as $skill)
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
                                    <label>Educación</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                @foreach($resume->studies as $study)
                                    <div class="mj_detaildiv">
                                        <span>{{ $study->institution }}</span>
                                        <blockquote class="mj_blueblockquote">
                                            <span><i class="fa fa-calendar"></i> {{ $study->init }} - {{ $study->finish }}</span>
                                            <h5>{{ $study->title }}</h5>
                                            <p>{{ $study->notes }}</p>
                                        </blockquote>
                                    </div>
                                @endforeach
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Experiencia</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    @foreach($resume->experiences as $experience)
                                        <div class="mj_detaildiv mj_bottompadder30">
                                            <span>{{ $experience->company }}</span>
                                            <blockquote class="mj_yellowblockquote">
                                                <span><i class="fa fa-calendar"></i> {{ $experience->init }} - {{ $experience->finish }}</span>
                                                <h5>{{ $experience->name }}</h5>
                                                <p>{{ $experience->notes }}</p>
                                            </blockquote>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection