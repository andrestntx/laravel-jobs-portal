@extends('layouts.portal')

<!-- Main Content -->
@section('content')
    <div class="mj_lightgraytbg mj_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0">
                    <div class="mj_mainheading mj_toppadder80 mj_bottompadder50">
                        <h1><span>Recuperar Contraseña</span></h1>
                        <p>Ingrese su correo electrónico y rebice en su bandeja de entrada 
                        el link para recuperar su contraseña</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 col-sm-12 col-xs-12">
                    <div class="mj_pricingtable mj_greentable mj_login_form_wrapper">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {!! Form::open(['url' => '/password/email', 'method' => 'POST']) !!}
                            <div class="mj_login_form">
                                {!! Field::email('email', ['ph' => 'Correo electrónico', 'tpl' => 'themes.bootstrap.forms.login']) !!}
                            </div>
                            <div class="mj_pricing_footer">
                                <button type="submit">Recuperar contraseña</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
