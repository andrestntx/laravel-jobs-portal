@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('profiles') !!}
@endsection

@section('title')
	<span>Perfiles</span>
@endsection

@section('pre-article')
	<a href="{{ route('admin.profiles.create') }}" class="btn btn-lg mj_btnblue" data-text="Nuevo Perfil"><span>Nuevo Perfil</span></a>
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
			@foreach($profiles as $profile)
				<tr id="profile_{{ $profile->id }}">
	            	<td style="text-align: center;">
	            		<button class="btn btn-danger" title="Borrar"  onClick = "deleteService.deleteProfile({{ $profile->id }});"><i class="fa fa-trash-o"></i></button>
	            	</td>
					<td style="text-align: center;">
						<a href="{{ route('admin.profiles.edit', $profile) }}" title="Editar" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
					</td>
					<td>
						<a href="{{ route('admin.profiles.edit', $profile) }}" title="Editar">
							{{ $profile->name }}
						</a>
					</td>
					<td>
						{{ $profile->description }}
					</td>
				</tr>
			@endforeach
		</table>
		{!! $profiles->render() !!}
	</div>
@endsection

@section('extra-js')
	<script src="/js/services/deleteService.js"></script>
@endsection