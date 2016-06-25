@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('admins') !!}
@endsection

@section('title')
	<span>Adminstradores</span>
@endsection

@section('pre-article')
	<a href="{{ route('admin.admins.create') }}" class="btn btn-lg mj_btnblue" data-text="Nuevo Adminstrador"><span>Nuevo Adminstrador</span></a>
@endsection

@section('article')
	<div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20">
		<table class="table table-striped">
			<thead>
			<tr>
				<th colspan="" rowspan="" headers="" scope="" class="text-center">Borrar</th>
				<th colspan="" rowspan="" headers="" scope="" class="text-center">Editar</th>
				<th colspan="1" rowspan="" headers="" scope="">Nombre</th>
				<th colspan="3" rowspan="" headers="" scope="">Email</th>
			</tr>
			</thead>
			@foreach($admins as $admin)
				<tr id="admin_{{ $admin->id }}">
	            	<td style="text-align: center;">
	            		@if($admin->id != auth()->user()->id)
	            			<button class="btn btn-danger" title="Borrar"  onClick = "deleteService.deleteAdmin({{ $admin->id }});"><i class="fa fa-trash-o"></i></button>
	            		@endif
	            	</td>
					<td style="text-align: center;">
						<a href="{{ route('admin.admins.edit', $admin) }}" title="Editar" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
					</td>
					<td>
						<a href="{{ route('admin.admins.edit', $admin) }}" title="Editar">
							{{ $admin->name }}
						</a>
					</td>
					<td>
						{{ $admin->email }}
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection

@section('extra-js')
	<script src="/js/services/deleteService.js"></script>
@endsection