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
	<div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20" style="padding:30px;">
		<table class="table table-striped datatable">
			<thead>
			<tr>
				<th class="text-center">Borrar</th>
				<th class="text-center">Editar</th>
				<th>Nombre</th>	
				<th>Descripción</th>	
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
	</div>
@endsection

@section('extra-js')
	<script src="{{ asset('/js/services/deleteService.js') }}"></script>

	<script type="text/javascript">
		$('.datatable').DataTable({
			"order": [[2, "asc"]],
			"columnDefs": [
                {
                    "targets": [0,1],
                    "visible": true,
                    "searchable": false,
                    "orderable": false
                },
            ],
			"language": {
                "lengthMenu": "Ver _MENU_ por página",
                "zeroRecords": "Lo siento, no se enontraron empresas",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay empresas",
                "infoFiltered": "(Filtrado de _MAX_ asignados)",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primera",
                    "last": "Última",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
		});
	</script>
@endsection