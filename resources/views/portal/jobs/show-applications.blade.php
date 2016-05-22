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
                                    <p style="font-size: 30px; color:white; margin-left: 6px;">
                                        <strong>{{ $job->company->name }}</strong> 
                                        - Solicitudes de empleo
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mj_lightgraytbg mj_bottompadder80 mj_toppadder50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                <div class="mj_social_media_section mj_candidatepage_media mj_bottompadder40">
                    <ul>
                        <li>
                            <a href="{{ route('companies.jobs.show', [$job->company, $job]) }}" class="mj_mainbtn mj_bluebtn" data-text="Oferta de empleo">
                                <span>Oferta de empleo</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('companies.applications', $job->company) }}" class="mj_mainbtn mj_greenbtn" data-text="Todas las solicitudes">
                                <span>Todas las solicitudes</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mj_postdiv mj_jobdetail mj_toppadder50 mj_bottompadder50">
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                        <div class="row">
                            <div class="mj_tabcontent mj_bottompadder80">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Contratado</th>
                                        <th class="text-center" colspan="2">Postulante</th>
                                        <th>Télefono</th>
                                        <th>Email</th>
                                        <th>Mensaje</th>
                                     </tr>
                                    @foreach($applications as $application)
                                        <tr>
                                            <td> 
                                                <div class="mj_checkbox" style="float: none; margin: auto;">
                                                    <input type="checkbox" value="1" data-company="{{ $job->company->id }}" data-job="{{ $job->id }}"
                                                    data-application="{{ $application->id }}" id="app-{{ $application->id }}" @if($application->accepted) checked @endif>


                                                    <label for="app-{{ $application->id }}" style="border: 1px solid gray;"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('resumes.show', $application->resume) }}" target="_blank"><img src="{{ $logos->getPhotoUrl($application->resume->jobseeker) }}" class="img-responsive" alt="">
                                                </a>
                                            </td>
                                            <td> 
                                                <a href="{{ route('resumes.show', $application->resume) }}" target="_blank">
                                                    {{ $application->resume->jobseeker->full_name }} 
                                                </a>
                                            </td>
                                            <td style="font-size: 15px;"> {{ $application->resume->jobseeker->phone }} </td>
                                            <td style="font-size: 15px;"> {{ $application->resume->jobseeker->email }} </td>
                                            <td style="font-size: 15px; width: 500px;"> {{ $application->intro }} </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="mj_paginations">
                                      {!! $applications->render() !!}
                                </div>
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
                            console.log('contratado');
                        }
                        else {
                            console.log('No se eliminó');
                        }
                    },
                    error: function () {
                        alert('fallo la conexión');
                    }
                });
            }
            console.log();
        });
    </script>

@endsection