@extends('layouts.form-portal')

@section('breadcrumbs')
    {!! Breadcrumbs::render('companies.company.jobs.job', $job->company, $job) !!}
@endsection

@section('title')
    @if($job->exists)
        <span>{{ $job->name }}</span>
    @endif
@endsection

@section('description')
    <h2>Oferta de empleo</h2>
@endsection

@section('article')
    {!! Form::model($job, $formData) !!}
    <div class="mj_postdiv mj_shadow_yellow mj_postpage mj_toppadder50 mj_bottompadder50">
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
            {!! Field::text('name', ['ph' => 'Nombre del empleo']) !!}
            {!! Field::textarea('description', ['ph' => 'Descripción del empleo', 'id' => 'editor1']) !!}
            {!! Field::select('contract_type_id', $contractTypes) !!}
            {!! Field::text('address', ['placeholder' => 'Dirección', 'size' => '90']) !!}
            @include('includes.google-maps.map')
            {!! Field::text('closing_date', ['ph' => 'Fecha de finalización', 'id' => 'datepicker', 'tpl' => 'themes.bootstrap.fields.text-date']) !!}
            {!! Field::text('email', ['ph' => 'Correo electrónico para recibir las hojas de vida']) !!}
            @include('includes.google-maps.inputs')
        </div>
    </div>

    <div class="mj_showmore">
        <button type="submit" id="save" class="mj_showmorebtn mj_bigbtn mj_yellowbtn">
            Guardar <i class="fa fa-angle-right"></i>
        </button>
    </div>
    {!! Form::close() !!}
@endsection

@section('extra-js')
    <script src="/js/services/searchLocation.js"></script>
    <script> searchLocation.init(); </script>
@endsection