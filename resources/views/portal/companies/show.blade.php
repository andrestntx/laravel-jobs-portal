@extends('layouts.portal-breadcrumbs')

@section('breadcrumbs')
    {!! Breadcrumbs::render('companies.company', $company) !!}
@endsection

@section('content')
    <div class="col-md-5">
        <div class="mj_postdiv mj_shadow_yellow mj_postpage mj_toppadder20 mj_bottompadder10">
            <div class="mj_mainheading mj_bottompadder20">
                <h3><span> {{ $company->name }}</span></h3>
                <div class="col-sm-offset-4 col-sm-4 col-xs-10 col-xs-offset-1">
                    <div class="mj_joblogo company-datail">
                        <img src="{{ asset($logoUrl) }}" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="col-xs-12">
                    <p> {{ $company->description }}</p>
                    <a href="#" class="mj_btn mj_greenbtn">{{ $company->category_name }}</a>
                </div>
                <div class="col-xs-12 mj_toppadder10">
                    <a href="{{ $company->website_link }}" target="_blank" class="text-warning"><i class="fa fa-2x fa-external-link-square"></i></a>
                    <a href="{{ $company->twitter_link }}" target="_blank" class="text-info"><i class="fa fa-2x fa-twitter-square"></i></a>
                    <a href="{{ $company->facebook_link }}" target="_blank" class="text-primary"><i class="fa fa-2x fa-facebook-square"></i></a>
                </div>
            </div>
            <div class="col-xs-12">
                @if($company->geoLocation)
                    @include('includes.google-maps.init', ['geo_location' => $company->geoLocation])
                @endif

                @include('includes.google-maps.map')
            </div>
        </div>
        @can('edit', $company)
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-4 mj_bottompadder40">
                <div class="mj_showmore">
                    <a href="{{ route('companies.edit', $company) }}" class="mj_showmorebtn mj_yellowbtn">Editar Empresa</a>
                </div>
            </div>
        @endcan
    </div>
    <div class="col-md-7">

        <div class="mj_jobinfo">
            <div class="col-xs-12">
                <div class="row">
                    <div class="mj_showjob">
                        <p><strong>{{ $jobs->total() }}</strong> Ofertas de empleo</p>
                    </div>
                </div>
            </div>
        </div>
        @can('createJobs', $company)
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-4">
            <div class="mj_updatecart mj_toppadder10 mj_bottompadder10" style="text-align: center; float:none;">
                <a href="{{ route('companies.jobs.create', $company) }}" class="mj_mainbtn mj_btnyellow" data-text="Nueva Oferta"><span>Nueva Oferta</span></a>
            </div>
        </div>
        @endcan
        <div class="mj_jobdetail mj_tabcontent mj_bottompadder10">
            <table class="table table-striped">
                <tr>
                    <th class="text-center"># Solicitudes</th>
                    <th class="text-center">Empleo</th>
                    <th>Dirección</th>
                    <th>Tipo de contrato</th>
                 </tr>
                @foreach($jobs as $job)
                    <tr>
                        <td class="text-center">
                            <h4><a href="{{ route('companies.jobs.applications', [$company, $job]) }}" title="Ver Solicitudes" data-toggle="tooltip">
                                {{ $job->count_applications }} 
                                </a>
                            </h4>
                        </td>
                        <td>
                            <h4><a href="{{ route('companies.jobs.show', [$company, $job]) }}" title="Ver Oferta" data-toggle="tooltip">{{ $job->name }}</a></h4>
                            <p style="width: 100%;"><a href="#">{{ $job->occupation->name }}</a></p>
                        </td>
                        <td><i class="fa fa-map-marker"> {{ $job->address }} </i>
                        </td>
                        <td><a href="#" class="mj_btn mj_btnblue">{{ $job->contractType->name }}</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="mj_paginations">
            {!! $jobs->render() !!}
        </div>
    </div>
@endsection

@section('extra-js')
    <script src="{{ asset('/js/services/searchLocation.js') }}"></script>
    <script> 
        searchLocation.initShowLocation(); 
    </script>


@endsection