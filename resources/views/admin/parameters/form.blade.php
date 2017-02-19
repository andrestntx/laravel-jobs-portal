@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('parameters.parameter', $parameter) !!}
@endsection

@section('title')
	<span>{{ $parameter->alias }}</span>
@endsection

@section('description')
	<h2>Parametro</h2>
@endsection

@section('article')
	{!! Form::model($parameter, $formData) !!}
	<div class="mj_postdiv mj_shadow_blue mj_postpage mj_toppadder50 mj_bottompadder50">
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
			@if($parameter->file)
				<div class="form-group">
			        <div class="fileinput fileinput-new" data-provides="fileinput">
			          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
			            <img src="{{ asset($fileParameters->getFileUrl($parameter)) }}" alt="img">
			          </div>
			          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
			          <div>
			            <span class="btn btn-default btn-file"><span class="fileinput-new">Buscar Foto</span><span class="fileinput-exists">Cambiar</span><input type="file" name="parameterFile"></span>
			            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
			          </div>
			        </div>
			    </div>
			@elseif($parameter->textarea)
				{!! Field::textarea('value', ['ph' => 'Valor del parametro', 'class' => 'editor-html', 'required']) !!}
			@else
				{!! Field::text('value', ['ph' => 'Valor del parametro', 'label' => 'Valor', 'required']) !!}
			@endif
		</div>
	</div>
	<div class="mj_resumepreview_footer">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <div class="mj_resume_changeing mj_yellowbg">
                        <a href="{{ route('admin.parameters.index') }}"><i class="fa fa-angle-left"></i>Cancelar</a>
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