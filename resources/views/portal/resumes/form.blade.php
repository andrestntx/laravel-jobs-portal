@extends('layouts.form-portal')

@section('breadcrumbs')
    {!! Breadcrumbs::render('resumes.resume', $resume) !!}
@endsection

@section('title')
    @if($resume->exists)
        <span>{{ $resume->jobseeker->full_name }}</span>
    @endif
@endsection

@section('description')
    <h2>Hoja de Vida</h2>
@endsection

@section('article')
    {!! Form::model($jobseekerResume, $formData) !!}
        <div class="mj_postdiv mj_shadow_blue mj_postpage mj_toppadder50 mj_bottompadder50">
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                {!! Field::text('doc', ['ph' => 'Cédula']) !!}
                {!! Field::text('first_name', ['ph' => 'Nombres']) !!}
                {!! Field::text('last_name', ['ph' => 'Apellidos']) !!}
                {!! Field::file('photo', ['data-input' => 'false', 'data-buttonText' => 'Buscar Foto', 'data-iconName' => 'glyphicon glyphicon-user']) !!}
                {!! Field::file('resume_file', ['data-input' => 'false', 'data-buttonText' => 'Subir Hoja de Vida', 'data-buttonName' => 'btn-primary', 'data-iconName' => 'glyphicon glyphicon-file']) !!}
                {!! Field::text('email', ['ph' => 'Correo electrónico']) !!}
                {!! Field::text('phone', ['ph' => 'Teléfono']) !!}
                {!! Field::text('address', ['placeholder' => 'Dirección', 'size' => '90']) !!}
                @include('includes.google-maps.map')
                {!! Field::textarea('profile', ['ph' => 'Introducción', 'id' => 'editor1']) !!}
                {!! Field::number('wage_aspiration', ['ph' => 'Aspiración salarial']) !!}
                @include('includes.google-maps.inputs')

                @if($resume->exists && $resume->jobseeker->geoLocation)
                    @include('includes.google-maps.init', ['geo_location' => $resume->jobseeker->geoLocation])
                @endif

            </div>
        </div>
        <div class="mj_showmore">
            <button type="submit" id="save" class="mj_showmorebtn mj_bigbtn mj_bluebtn">
                Guardar <i class="fa fa-angle-right"></i>
            </button>
        </div>
    {!! Form::close() !!}
@endsection

@section('extra-js')
    <script src="/js/services/searchLocation.js"></script>
    <script> searchLocation.init(); </script>
@endsection