@extends('layouts.admin')

@section('breadcrumbs')
    {!! Breadcrumbs::render('companies.company', $company) !!}
@endsection

@section('title')
	<span>{{ $company->name }}</span>
@endsection

@section('description')
	<h2>Empresas</h2>
@endsection

@section('article')
	
	{!! Form::model($company, $formData + ['id' => 'form-company']) !!}
		<div class="mj_postdiv mj_shadow_blue mj_postpage mj_toppadder50 mj_bottompadder50">
	        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
				{!! Field::text('nit', ['ph' => 'NIT de la empresa', 'required']) !!}
				{!! Field::text('name', ['ph' => 'Nombre de la empresa', 'required']) !!}
				{!! Field::text('description', ['ph' => 'Descripción de la empresa']) !!}
				{!! Field::select('company_category_id', $categories, ['required']) !!}

				<div class="form-group">
                    <label for="logo" class="control-label" style="width: 100%;">Logo</label>
					<div class="fileinput fileinput-new" data-provides="fileinput">
					  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="{{ $logos->getLogoUrl($company) }}" alt="img">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
					  <div>
					    <span class="btn btn-default btn-file"><span class="fileinput-new">Buscar logo</span><span class="fileinput-exists">Cambiar</span><input type="file" name="logo"></span>
					    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
					  </div>
					</div>
				</div>

				{!! Field::text('address', ['placeholder' => 'Dirección', 'size' => '90']) !!}
				@include('includes.google-maps.map')
				{!! Field::text('email', ['ph' => 'Correo electrónico']) !!}
				{!! Field::text('tel', ['ph' => 'Télefono', 'label' => 'Télefono']) !!}
				{!! Field::text('cel', ['ph' => 'Celular', 'label' => 'Celular']) !!}

				<div class="form-group">
	                <label for="show_data" class="control-label">
	                    Mostrar datos de la empresa
	                    <span>(opcional)</span>     
	                </label> <br>
	                <div class="col-xs-12" style="margin-bottom: 10px;">
		                <div class="mj_checkbox">
		                    <input type="checkbox" value="1" id="show_data" name="show_data" @if($company->show_data || ! $company->exists) checked @endif>
		                    <label for="show_data" style="border: 1px solid gray;"></label>
		                </div>
		                <span> Mostrar nombre, Nit y Logo de la empresa en el portal de empleo </span>
	                </div>
	            </div>

				<div class="form-group">
	                <label for="email_new_job" class="control-label">
	                    Notificaciones por correo electrónico
	                    <span>(opcional)</span>     
	                </label> <br>
	                <div class="col-xs-12" style="margin-bottom: 10px;">
		                <div class="mj_checkbox">
		                    <input type="checkbox" value="1" id="email_new_job" name="email_new_job" @if($company->email_new_job) checked @endif>
		                    <label for="email_new_job" style="border: 1px solid gray;"></label>
		                </div>
		                <span> Recibir email de notificación cuando cree un nuevo empleo </span>
	                </div>
	            </div>


				{!! Field::text('website', ['ph' => 'Página web']) !!}
				{!! Field::text('twitter', ['ph' => 'Usuario en twitter']) !!}
				{!! Field::text('facebook', ['ph' => 'Link de Facebook']) !!}
				@include('includes.google-maps.inputs')

				@if($company->exists && $company->geoLocation)
					@include('includes.google-maps.init', ['geo_location' => $company->geoLocation])
				@endif
	        </div>
	    </div>
	    @if(auth()->user()->isAdmin())
		    <div class="mj_resumepreview_footer">
	            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                <div class="row">
	                    <div class="mj_resume_changeing mj_yellowbg">
	                        <a href="{{ route('admin.companies.index') }}"><i class="fa fa-angle-left"></i>Cancelar</a>
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
	    @else
		    <div class="mj_showmore">
		    	<button type="submit" class="mj_showmorebtn mj_bigbtn mj_bluebtn">
		    		Guardar <i class="fa fa-angle-right"></i>
		    	</button>
		    </div>
		@endif
    {!! Form::close() !!}
@endsection

@section('extra-js')
	<script src="/js/services/searchLocation.js"></script>
	<script src="/js/validations/companyValidation.js" type="text/javascript"></script>
	<script> 
		searchLocation.init(); 
		CompanyValidation.init();
	</script>
@endsection