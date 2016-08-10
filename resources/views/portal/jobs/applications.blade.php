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
                                    <h1><span>{{  $company->name }}</span></h1>
                                    <p style="font-size: 30px; color:white; margin-left: 6px;">
                                        <strong>Ofertas de Empleo</strong> y sus solicitudes
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
                            <a href="{{ route('companies.show', $company) }}" class="mj_mainbtn mj_bluebtn" data-text="Mi empresa">
                                <span>Mi empresa</span>
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
                                        <th># Solicitudes</th>
                                        <th class="text-center">Empleo</th>
                                        <th>Dirección</th>
                                        <th>Tipo de contrato</th>
                                     </tr>
                                    @foreach($jobs as $job)
                                        <tr>
                                            <td class="text-center">
                                                <h4><a href="{{ route('companies.jobs.applications', [$company, $job]) }}">
                                                    {{ $job->count_applications }} 
                                                    </a>
                                                </h4>
                                            </td>
                                            <td>
                                                <h4><a href="{{ route('companies.jobs.show', [$company, $job]) }}">{{ $job->name }}</a></h4>
                                                <p style="width: 100%;"><a href="#">{{ $job->occupation->name }}</a></p>
                                            </td>
                                            <td><i class="fa fa-map-marker"> {{ $job->address }} </i>
                                            </td>
                                            <td><a href="#" class="mj_btn mj_btnblue">{{ $job->contractType->name }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="mj_paginations">

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