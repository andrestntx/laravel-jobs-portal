@extends('layouts.portal')

@section('content')
<div class="mj_pagetitle2" data-url="{{ route('companies.jobs.accept-application', [$job->company, $job]) }}" id="url-post">
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
                                            <td class="text-center">
                                                @if($application->accepeted)
                                                    {!! Form::select('contratado', ['1' => 'Si', '0' => 'No'], '1', ['id' => 'application' . $application->id, 'class' => 'select-application', 'data-application' => $application->id])!!}
                                                @else
                                                    {!! Form::select('contratado', ['1' => 'Si', '0' => 'No'], '0', ['id' => 'application' . $application->id, 'class' => 'select-application', 'data-application' => $application->id])!!}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('companies.jobs.applications.show', [$job->company, $job, $application]) }}"><img src="{{ $photos->getPhotoUrl($application->resume->jobseeker) }}" class="img-responsive" alt="">
                                                </a>
                                            </td>
                                            <td> 
                                                <a href="{{ route('companies.jobs.applications.show', [$job->company, $job, $application]) }}">
                                                    {{ $application->resume->jobseeker->full_name }} 
                                                </a>
                                            </td>
                                            <td style="font-size: 15px;"> {{ $application->resume->jobseeker->phone }} </td>
                                            <td style="font-size: 15px;"> {{ $application->resume->jobseeker->email }} </td>
                                            <td style="font-size: 15px; width: 500px;"> {{ $application->intro }} </td>
                                        </tr>
                                    @endforeach
                                </table>
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
        $( document ).ready(function() {
            $(".select-application").change(function(){
                console.log($(this).data('application'));
                $.post( $("#url-post").data("url"), {application: $(this).data('application')}, function( ) {
                    console.log('contratado');
                }); 
            });
        });

        
    </script>
@endsection