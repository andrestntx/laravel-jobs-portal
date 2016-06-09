@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('occupations.occupation', $occupation) !!}
@endsection

@section('title')
	<span>{{ $occupation->name }}</span>
@endsection

@section('description')
	<h2>Ocupación</h2>
@endsection

@section('article')
	{!! Form::model($occupation, $formData) !!}
	<div class="mj_postdiv mj_shadow_blue mj_postpage mj_toppadder50 mj_bottompadder50">
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
			{!! Field::text('name', ['ph' => 'Nombre de la ocupación']) !!}
		</div>
	</div>
	<div class="mj_resumepreview_footer">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <div class="mj_resume_changeing mj_yellowbg">
                        <a href="{{ route('admin.occupations.index') }}"><i class="fa fa-angle-left"></i>Cancelar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <div class="mj_showmore">
				    	<button type="submit" class="mj_showmorebtn mj_bigbtn mj_bluebtn" style="border-radius: 0px 0px 15px 0px !important;">
				    		Guardar <i class="fa fa-angle-right"></i>
				    	</button>
				    </div>
                </div>
            </div>
        </div>
	{!! Form::close() !!}
@endsection