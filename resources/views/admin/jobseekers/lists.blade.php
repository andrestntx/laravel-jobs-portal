@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('assists') !!}
@endsection

@section('title')
	<span>Asistencias</span>
@endsection

@section('article')
	<div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20" style="padding: 25px 20px 0 20px">
		<table class="table table-striped" id="assists-datatable">
			<thead>
			<tr>
				<th>Documento</th>
				<th>Nombre</th>
				<th class="text-center">Asistencias</th>
			</tr>
			</thead>
			@foreach($jobseekers as $jobseeker)
				<tr>
					<td>
						{{ $jobseeker->type_doc }} {{ $jobseeker->doc }}
					</td>
					<td>
						{{ $jobseeker->full_name }}
					</td>
					<td class="text-center">
						<a href="{{ route('admin.assists.show', $jobseeker) }}" class="btn btn-info" style="font-weight: bold; font-size: 15px;">
							{{ $jobseeker->activities->count() }}	
						</a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection

@section('extra-js')
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#assists-datatable').DataTable( {
		    	"order": [[ 2, "desc" ]],
			    	"language": {
	                "lengthMenu": "Ver _MENU_ por página",
	                "zeroRecords": "Lo siento, no se enontraron asistencias",
	                "info": "Página _PAGE_ de _PAGES_",
	                "infoEmpty": "No hay asistencias",
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
		});
	</script>
@endsection