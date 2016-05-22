@extends('layouts.portal-breadcrumbs')

@section('breadcrumbs')
    {!! Breadcrumbs::render('admin') !!}
@endsection

@section('content')
    <div class="mj_lightgraytbg mj_bottompadder50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                    <div class="mj_mainheading mj_bottompadder10">
                        <h1>@yield('title', 'Admin')</h1>
                        <p>@yield('description')</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    @yield('pre-article')
                </div>
            </div>  
            <div class="row">
                <div class="col-xs-12">
                    <div class="mj_toppadder10 mj_bottompadder50">
                        @yield('article')
                    </div>
                </div>
            </div>  
        </div>
    </div>
@endsection