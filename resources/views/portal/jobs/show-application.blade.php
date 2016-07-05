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
                                    <div class="mj_pageheading mj_toppadder10">
                                        <h1><a href="#" title="Volver a la oferta" style="color:white;"><span>{{  $application->job->name }}</span></a></h1>
                                        <p style="font-size: 30px; color:white; margin-left: 6px; margin-bottom: 20px;">
                                            Trabajador: <strong>{{  $resume->jobseeker->full_name }}</strong> 
                                        </p>
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
                                                <label>Aspiración salarial: </label><span class="mj_green_text salary">{{ $resume->wage_aspiration }}</span>
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
                            <li style="margin-top: 23px; margin-right: 10px;">
                                <div class="mj_checkbox">
                                    <input type="checkbox" value="1" data-company="{{ $application->job->company->id }}" data-job="{{ $application->job->id }}"
                                    data-application="{{ $application->id }}" id="app-{{ $application->id }}" @if($application->accepted) checked @endif>

                                    <label for="app-{{ $application->id }}" style="border: 1px solid gray;"></label>
                                </div>
                                    <span>Contratado</span>
                            </li>
                            <li style="margin-top:10px;"><a target="_blank" href="{{ $resumeFileUrl }}"><i class="fa fa-2x fa-download"></i> Descargar Hoja de Vida</a></li>
                            <li>
                                <a href="{{ route('companies.jobs.applications', [$application->job->company, $application->job]) }}" class="mj_mainbtn mj_bluebtn" data-text="Volver a solicitudes">
                                    <span> <i class="fa fa-arrow-circle-left"></i> Volver a solicitudes</span>
                                </a>
                            </li>
                        </ul>
                        
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
                                            @foreach($resume->skills_array as $skill)
                                                <li>
                                                    <a href="#"> <i class="fa fa-check"></i> {{ $skill }}</a>
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

@section('extra-js')

    <script type="text/javascript">
        $('.mj_checkbox input').change(function () {

            company_id = $(this).data('company');
            job_id = $(this).data('job');
            application_id = $(this).data('application');

            if (confirm('¿Está seguro?')) {
                $.ajax({
                    url: '/companies/' + company_id + '/jobs/' + job_id + '/accept-application',
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        'application': application_id
                    },
                    success: function (data) {
                        if (data['success']) {
                        }
                        else {
                        }
                    },
                    error: function () {
                        alert('fallo la conexión');
                    }
                });
            }
        });
    </script>

@endsection