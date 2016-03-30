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
                                    <p style="font-size: 30px; color:white; margin-left: 6px;">Solicitudes de empleo</p>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mj_social_media_section mj_candidatepage_media mj_toppadder40 mj_bottompadder40">

                </div>
                <div class="mj_postdiv mj_jobdetail mj_toppadder50 mj_bottompadder50">
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                        <div class="row">
                            <div class="mj_tabcontent mj_bottompadder80">
                                <table class="table table-striped">
                                    @foreach($jobs as $job)
                                        <tr>
                                            <td>
                                                <div class="mj_liks"><a href="#"><i class="fa fa-heart" style="color:red;"></i></a><span>Aplicada</span>
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
                                                <P>{{ $job->geoLocation->formatted_address }}</P>
                                            </td>
                                            <td><a href="#" class="mj_btn mj_greenbtn">{{ $job->contractType->name }}</a>
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
            </div>
        </div>
    </div>
</div>

@endsection