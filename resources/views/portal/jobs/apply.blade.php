@extends('layouts.portal')

@section('content')
    <div class="mj_pagetitle">
        <img src="/images/background-city.jpg" alt="">
        <div class="mj_mainheading_overlay"></div>
        <div class="mj_pagetitle_inner">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mj_mainheading mj_toppadder80 mj_bottompadder80">
                            <h1><span>{{ $job->name }}</span></h1>
                            <p style="font-size:20px;">{{ $company->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="mj_tabcontent mj_toppadder80 mj_bottompadder80">
                <div class="mj_contact_info mj_bottompadder80 mj_toppadder60">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0">
                        <div class="mj_mainheading mj_toppadder80 mj_bottompadder50">
                            <h1>A<span>plicar al empleo</span></h1>
                            @can('apply', $job)
                                <p>Escriba el mensaje que lo presentará a esta oferta de empelo y que recibirá la empresa con su
                                    <a href="/my-resume">Hoja de Vida</a>
                                </p>
                                <div class="mj_toppadder50 col-md-12">
                                    {!! Form::open(['route' => ['companies.jobs.store-apply', $company, $job], 'method' => 'POST']) !!}
                                        {!! Field::textarea('intro', ['tpl' => 'themes.bootstrap.fields.inline']) !!}
                                        <div class="mj_showmore"><button type="submit" class="mj_showmorebtn mj_bluebtn">Aplicar ahora</button></div>
                                    {!! Form::close() !!}
                                </div>
                            @else
                                @if(auth()->user() && auth()->user()->isJobseeker())
                                    <p>Solo puede <strong>aplicar una vez</strong> a una oferta de empleo. Verifique sus
                                        <a href="/my-applications">solicitudes de empleo</a>
                                        y si ya diligenció completamente su <a href="/my-resume">hoja de vida</a></p>
                                @else
                                    <p>Para poder aplicar a esta oferta de empleo debe estar registrado como trabajador</p>
                                @endif
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection