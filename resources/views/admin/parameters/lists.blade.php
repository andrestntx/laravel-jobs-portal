@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('parameters') !!}
@endsection

@section('title')
	<span>Parámetros</span>
@endsection

@section('article')
	<div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20">
		<table class="table table-striped">
			<thead>
			<tr>
				<th colspan="" rowspan="" headers="" scope="" class="text-center">Editar</th>
				<th colspan="1" rowspan="" headers="" scope="">Nombre</th>
				<th colspan="3" rowspan="" headers="" scope="">Valor</th>
			</tr>
			</thead>
			@foreach($parameters as $parameter)
				<tr id="parameter_{{ $parameter->id }}">
					<td style="text-align: center;">
						<a href="{{ route('admin.parameters.edit', $parameter) }}" title="Editar" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
					</td>
					<td>
						<a href="{{ route('admin.parameters.edit', $parameter) }}" title="Editar">
							{{ $parameter->name }}
						</a>
					</td>
					<td>
						@if($parameter->file)
							{{ $fileParameters->getFileUrl($parameter) }}
						@else
							{{ $parameter->value }}
						@endif
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection

@section('extra-js')
	<script src="/js/services/deleteService.js"></script>
@endsection