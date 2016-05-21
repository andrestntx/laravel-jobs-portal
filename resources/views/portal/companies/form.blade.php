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
				{!! Field::text('name', ['ph' => 'Nombre de la empresa', 'required']) !!}
				{!! Field::text('description', ['ph' => 'Descripción de la empresa']) !!}
				{!! Field::select('company_category_id', $categories, ['class' => 'custom-select', 'required']) !!}
				{!! Field::file('logo', ['data-input' => 'false', 'data-buttonText' => 'Buscar Logo']) !!}
				{!! Field::text('address', ['placeholder' => 'Dirección', 'size' => '90']) !!}
				@include('includes.google-maps.map')
				{!! Field::text('email', ['ph' => 'Correo electrónico']) !!}
				{!! Field::text('website', ['ph' => 'Página web']) !!}
				{!! Field::text('twitter', ['ph' => 'Usuario en twitter']) !!}
				{!! Field::text('facebook', ['ph' => 'Link de Facebook']) !!}
				@include('includes.google-maps.inputs')

				@if($company->exists && $company->geoLocation)
					@include('includes.google-maps.init', ['geo_location' => $company->geoLocation])
				@endif
	        </div>
	    </div>
	    <div class="mj_showmore">
	    	<button type="submit" class="mj_showmorebtn mj_bigbtn mj_bluebtn">
	    		Guardar <i class="fa fa-angle-right"></i>
	    	</button>
	    </div>
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