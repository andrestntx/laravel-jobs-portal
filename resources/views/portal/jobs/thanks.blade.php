@extends('layouts.portal')

@section('content')
    <div class="mj_pagetitle">
        <img src="{{ asset('/images/background-city.jpg') }}" alt="">
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
                            <h2>H<span>a aplicado satisfactoriamente</span></h2>
                            <h4>La empresa ha sido notificada</h2><br>
                            <a href="/" class="mj_mainbtn mj_btnyellow text-center" data-text="Volver a la página principal"><span>Volver a la página principal</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection