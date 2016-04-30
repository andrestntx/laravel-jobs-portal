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
                {!! Field::text('doc', ['ph' => 'Cédula', 'required']) !!}
                {!! Field::text('first_name', ['ph' => 'Nombres', 'required']) !!}
                {!! Field::text('last_name', ['ph' => 'Apellidos', 'required']) !!}
                {!! Field::select('sex', $sex, ['ph' => 'Género', 'required']) !!}
                {!! Field::file('photo', ['data-input' => 'false', 'data-buttonText' => 'Buscar Foto', 'data-iconName' => 'glyphicon glyphicon-user']) !!}
                {!! Field::file('resume_file', ['data-input' => 'false', 'data-buttonText' => 'Subir Hoja de Vida', 'data-buttonName' => 'btn-primary', 'data-iconName' => 'glyphicon glyphicon-file']) !!}
                {!! Field::text('email', ['ph' => 'Correo electrónico', 'required']) !!}
                {!! Field::text('phone', ['ph' => 'Teléfono', 'required']) !!}
                {!! Field::text('address', ['placeholder' => 'Dirección', 'size' => '90', 'required']) !!}
                @include('includes.google-maps.map')
                {!! Field::text('study_title', ['placeholder' => 'Título Profesional']) !!}
                {!! Field::textarea('profile', ['ph' => 'Introducción', 'class' => 'editor-html']) !!}
                <div class="form-group">
                    <label>Education<span>(Opcional)</span>
                        <a href="javascript:void(0)" class="btn btn-sm btn-info mj_add_education">
                            <i class="fa fa-plus"></i> Agregar
                        </a>
                    </label>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row mj_educations">
                            @if($resume->exists)
                                @foreach($resume->studies as $study)
                                    <div class="mj_education" id="study_{{ $study->id }}">
                                        {!! Field::text('studies[' . $study->id .'][institution]', $study->institution, ['ph' => 'Institución', 'tpl' => 'themes.bootstrap.fields.inline']) !!}
                                        {!! Field::text('studies[' . $study->id .'][title]', $study->title, ['ph' => 'Institución', 'tpl' => 'themes.bootstrap.fields.inline']) !!}

                                        <div class="row">
                                            <div class="col-md-6">
                                                {!! Field::text('studies[' . $study->id .'][init]', $study->init, ['ph' => 'Fecha de inicio', 'class' => 'datepicker', 'tpl' => 'themes.bootstrap.fields.text-date-inline']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                {!! Field::text('studies[' . $study->id .'][finish]', $study->finish, ['ph' => 'Fecha de finalización', 'class' => 'datepicker', 'tpl' => 'themes.bootstrap.fields.text-date-inline']) !!}
                                            </div>
                                        </div>

                                        {!! Field::textarea('studies[' . $study->id .'][notes]', $study->notes, ['ph' => 'Escriba aquí lo que considere importante', 'rows' => '5', 'tpl' => 'themes.bootstrap.fields.inline']) !!}
                                        <a href="javascript:deleteService.deleteStudy({{ $study->id }})" class="mj_removefile"><i class="fa fa-times"></i> remove</a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="skills">Habilidades</label>
                    {!! Form::select('skills[]', $skills, $resumeSkills, ['multiple', 'class' => 'select2 form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Experiencia<span>(opcional)</span>
                        <a href="javascript:void(0)" class="btn btn-sm btn-info mj_add_experience">
                            <i class="fa fa-plus"></i> Agregar
                        </a>
                    </label>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row mj_experiences">
                            @if($resume->exists)
                                @foreach($resume->experiences as $experience)
                                    <div class="mj_experience" id="experience_{{ $experience->id }}">
                                        {!! Field::text('experiences[' . $experience->id .'][company]', $experience->company, ['ph' => 'Empresa', 'tpl' => 'themes.bootstrap.fields.inline']) !!}
                                        {!! Field::text('experiences[' . $experience->id .'][name]', $experience->name, ['ph' => 'Cargo', 'tpl' => 'themes.bootstrap.fields.inline']) !!}

                                        <div class="row">
                                            <div class="col-md-6">
                                                {!! Field::text('experiences[' . $experience->id .'][init]', $experience->init, ['ph' => 'Fecha de inicio', 'class' => 'datepicker', 'tpl' => 'themes.bootstrap.fields.text-date-inline']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                {!! Field::text('experiences[' . $experience->id .'][finish]', $experience->finish, ['ph' => 'Fecha de finalización', 'class' => 'datepicker', 'tpl' => 'themes.bootstrap.fields.text-date-inline']) !!}
                                            </div>
                                        </div>

                                        {!! Field::textarea('experiences[' . $experience->id .'][notes]', $experience->notes, ['ph' => 'Notas', 'rows' => '5', 'tpl' => 'themes.bootstrap.fields.inline']) !!}
                                        <a href="javascript:deleteService.deleteExperience({{ $experience->id }})" class="mj_removefile"><i class="fa fa-times"></i> remove</a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

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
    <script>
        searchLocation.init();

        $(".select2").select2({
            placeholder: "Seleccione las Habilidades",
            tags: true
        });
    </script>
    <script src="/js/services/deleteService.js"></script>
@endsection