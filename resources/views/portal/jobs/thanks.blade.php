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
                            <h1>G<span>racias por aplicar</span></h1>
                            <p>Ha aplicado correctamente a esta oferta de empleo. Su hoja de vida ha sido enviada a la empresa y ellos
                            se pondrán en contacto con usted. <a class="btn btn-primary" href="/jobs">Volver a las Ofertas</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection