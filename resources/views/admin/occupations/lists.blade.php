@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('occupations') !!}
@endsection

@section('title')
	<span>Ocupaciones</span>
@endsection

@section('pre-article')
	<a href="{{ route('admin.occupations.create') }}" class="btn btn-lg mj_btnblue" data-text="Nueva Ocupación"><span>Nueva Ocupación</span></a>
@endsection

@section('article')
	<div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20">
		<table class="table table-striped">
			<thead>
			<tr>
				<th colspan="" rowspan="" headers="" scope="" class="text-center">Borrar</th>
				<th colspan="" rowspan="" headers="" scope="" class="text-center">Editar</th>
				<th colspan="1" rowspan="" headers="" scope="">Nombre</th>
				<th colspan="3" rowspan="" headers="" scope="">Descripción</th>
			</tr>
			</thead>
			@foreach($occupations as $occupation)
				<tr id="occupation_{{ $occupation->id }}">
	            	<td style="text-align: center;">
	            		<button class="btn btn-danger" title="Borrar"  onClick = "deleteService.deleteOccupation({{ $occupation->id }});"><i class="fa fa-trash-o"></i></button>
	            	</td>
					<td style="text-align: center;">
						<a href="{{ route('admin.occupations.edit', $occupation) }}" title="Editar" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
					</td>
					<td>
						<a href="{{ route('admin.occupations.edit', $occupation) }}" title="Editar">
							{{ $occupation->name }}
						</a>
					</td>
					<td>
						{{ $occupation->description }}
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection

@section('extra-js')
	<script src="/js/services/deleteService.js"></script>
@endsection