@extends('layouts.form-portal')

@section('breadcrumbs')
    {!! Breadcrumbs::render('companies.company.jobs.job', $company, $job) !!}
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

            @if($job->exists)
                <div class="form-group">
                    <label for="inactive" class="control-label">
                        Desactivar oferta laboral
                        <span>(opcional)</span>     
                    </label> <br>
                    <div class="mj_checkbox">
                        <input type="checkbox" value="1" id="inactive" name="inactive" @if($job->inactive) checked @endif>
                        <label for="inactive" style="border: 1px solid gray;"></label>
                    </div>
                    <span> Desactivar oferta laboral </span>
                </div>
            @endif

            {!! Field::text('name', ['ph' => 'Nombre del empleo', 'required']) !!}
            {!! Field::select('occupation_id', $occupations, ['required', 'class' => 'select2']) !!}
            {!! Field::select('contract_type_id', $contractTypes, ['required', 'class' => 'select2']) !!}
            {!! Field::text('skills', ['ph' => 'Habilidades requeridas para el empleo', 'data-role' => 'tagsinput']) !!}
            {!! Field::text('address', ['placeholder' => 'Dirección', 'size' => '90']) !!}
            @include('includes.google-maps.map')
            {!! Field::textarea('description', ['ph' => 'Descripción del empleo', 'class' => 'editor-html', 'required']) !!}
            {!! Field::textarea('who_apply', ['ph' => '¿Quien puede aplicar?', 'class' => 'editor-html']) !!}
            {!! Field::textarea('offer', ['ph' => 'Beneficios del empleo', 'class' => 'editor-html']) !!}
            {!! Field::number('experience', ['ph' => 'Años de experiencia']) !!}
            {!! Field::number('salary', ['ph' => 'Salario']) !!}
            {!! Field::text('closing_date', $job->closing_date_form, ['ph' => 'Fecha de finalización', 'class' => 'datepicker', 'tpl' => 'themes.bootstrap.fields.text-date']) !!}
            {!! Field::text('email', ['ph' => 'Correo electrónico para recibir las hojas de vida']) !!}
            
            <div class="form-group">
                <label for="email_new_application" class="control-label">
                    Notificación al correo de la oferta
                    <span>(opcional)</span>     
                </label> <br>
                <div class="mj_checkbox">
                    <input type="checkbox" value="1" id="email_new_application" name="email_new_application" @if($job->email_new_application) checked @endif>
                    <label for="email_new_application" style="border: 1px solid gray;"></label>
                </div>
                <span> Deseo recibir una notificación al correo cada vez que alguien que se postule a la oferta</span>
            </div>


            @include('includes.google-maps.inputs')

            @if($job->exists && $job->geoLocation)
                @include('includes.google-maps.init', ['geo_location' => $job->geoLocation])
            @endif

            <div class="form-group">
                <label for="google" class="control-label">
                    Motores de búsqueda como google
                    <span>(opcional)</span>     
                </label> <br>
                <div class="mj_checkbox">
                    <input type="checkbox" value="1" id="google" name="google" @if($job->google) checked @endif>
                    <label for="google" style="border: 1px solid gray;"></label>
                </div>
                <span> Permitir que se indexe en motores de búsqueda</span>
            </div>
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
    <script>
        searchLocation.init();
        $(".select2").select2({
            placeholder: "Seleccione una opción",
            tags: true
        });
    </script>
@endsection