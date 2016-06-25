@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('parameters') !!}
@endsection

@section('title')
	<span>Ocupaciones</span>
@endsection

@section('pre-article')
	<a href="{{ route('admin.parameters.create') }}" class="btn btn-lg mj_btnblue" data-text="Nuevo Parametro"><span>Nuevo Parametro</span></a>
@endsection

@section('article')
	<div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20">
		<table class="table table-striped">
			<thead>
			<tr>
				<th colspan="" rowspan="" headers="" scope="" class="text-center">Borrar</th>
				<th colspan="" rowspan="" headers="" scope="" class="text-center">Editar</th>
				<th colspan="1" rowspan="" headers="" scope="">Nombre</th>
				<th colspan="3" rowspan="" headers="" scope="">Valor</th>
			</tr>
			</thead>
			@foreach($parameters as $parameter)
				<tr id="parameter_{{ $parameter->id }}">
	            	<td style="text-align: center;">
	            		<button class="btn btn-danger" title="Borrar"  onClick = "deleteService.deleteParameter({{ $parameter->id }});"><i class="fa fa-trash-o"></i></button>
	            	</td>
					<td style="text-align: center;">
						<a href="{{ route('admin.parameters.edit', $parameter) }}" title="Editar" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
					</td>
					<td>
						<a href="{{ route('admin.parameters.edit', $parameter) }}" title="Editar">
							{{ $parameter->name }}
						</a>
					</td>
					<td>
						{{ $parameter->value }}
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection

@section('extra-js')
	<script src="/js/services/deleteService.js"></script>
@endsection