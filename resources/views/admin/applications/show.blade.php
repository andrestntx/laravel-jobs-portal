@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('applications.show', $job) !!}
@endsection

@section('title')
	<span style="font-size: 40px;">Solicitudes ({{ $job->applications()->where('preselected', 0)->count() }}) - {{ $job->name }}</span>
@endsection

@section('article')
	<div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20" style="padding: 25px 20px 0 20px" data-url="{{ route('admin.applications.select', $job) }}" id="url-post">
		<table class="table table-striped">
			<thead>
			<tr>
				<th class="text-center">Seleccionar</th>
				<th>Documento</th>
				<th>Nombre</th>
				<th class="text-center">Hoja de vida</th>
				<th class="text-center">Perfil</th>
			</tr>
			</thead>

			@foreach($applications as $application)
				<tr>
					<td>
						<div class="mj_checkbox" style="float: none; margin: auto;">
                            <input type="checkbox" value="1" data-application="{{ $application->id }}"
                            id="application-{{ $application->id }}" class="check-application">
                            <label for="application-{{ $application->id }}" style="border: 1px solid gray;"></label>
                        </div>
					</td>
					<td>
						{{ $application->resume->jobseeker->doc_type }} {{ $application->resume->jobseeker->doc }} 
					</td>
					<td>
						{{ $application->resume->jobseeker->full_name }}
					</td>
					<td class="text-center">
						<a href="{{ asset($application->resume->url_file) }}" target="_blank" title="Descargar" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Descargar</a>
					</td>
					<td class="text-center">
						<a href="{{ route('resumes.show', $application->resume)}}" title="Ver perfil" class="btn btn-success" target="_blank"> <i class="fa fa-user"></i> Ver perfil</a>
					</td>
				</tr>
			@endforeach

		</table>
		<div class="col-md-12" style="margin-bottom: 20px;">
			<button class="btn btn-info" disabled id="select-applications">Seleccionar</button>	
		</div>
	</div>
@endsection

@section('extra-js')
	<script type="text/javascript">
		$(".check-application").click(function() {
			if($('.check-application:checked').length > 0) {
				$("#select-applications").prop('disabled', false);
			}
			else {
				$("#select-applications").prop('disabled', true);
			}
		});	

		$("#select-applications").click(function() {
			swal({
                title: '¿Está seguro?',
                text: 'Los trabajadores quedarán preseleccionados',
                type: "warning",
                confirmButtonText: "Confirmar",
                confirmButtonColor: "#FFAC1A",
                cancelButtonText: "Cancelar",
                showCancelButton: true,
                closeOnConfirm: false,
                html: true
            },
            function() {
                var applicationIds = [];
				$('.check-application:checked').each(function() {
					applicationIds.push($(this).data('application'));
				});

				data = {applications: applicationIds};

				$.post( $("#url-post").data("url"), data, function( ) {
					location.reload();
				});
            });
		});	
		
	</script>
	
@endsection