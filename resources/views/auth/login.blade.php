@extends('layouts.portal')

@section('content')
    <div class="mj_lightgraytbg mj_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0">
                    <div class="mj_mainheading mj_toppadder80 mj_bottompadder50">
                        <h1><span>Iniciar</span> <span>Sesión</span></h1>
                        <p>Ingrese correo electrónico y su contraseña para ingresar al Portal de Empleo</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 col-sm-12 col-xs-12">
                    <div class="mj_pricingtable mj_greentable mj_login_form_wrapper">
                        {!! Form::open(['url' => '/login', 'method' => 'POST']) !!}
                            <div class="mj_login_form">
                                {!! Field::email('email', ['ph' => 'Correo electrónico', 'tpl' => 'themes.bootstrap.forms.login', 'required']) !!}
                                {!! Field::password('password', ['ph' => 'Su contraseña', 'tpl' => 'themes.bootstrap.forms.login', 'required']) !!}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mj_toppadder20">
                                        <div class="form-group  pull-left">
                                            <div class="mj_checkbox">
                                                <input type="checkbox" value="1" id="check2" name="checkbox">
                                                <label for="check2"></label>
                                            </div>
                                            <span> Recordarme</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mj_toppadder20">
                                        <div class="form-group pull-right">
                                            <span><a href="{{ url('/password/reset') }}">Olvidó su contraseña ?</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mj_pricing_footer">
                                <button type="submit">Iniciar ahora</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
