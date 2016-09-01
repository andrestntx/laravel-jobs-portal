@extends('layouts.admin-lg')

@section('breadcrumbs')
	{!! Breadcrumbs::render('registers') !!}
@endsection

@section('title')
	<span>Trabajadores (Oferentes) </span>
@endsection

@section('article')
	<div class="mj_postdiv mj_postpage mj_shadow_blue" style="padding:30px;">
		<table class="table table-striped datatable">
			<thead>
				<tr>
                    <th class="text-center">Borrar</th>
					<th class="text-center">Activar</th>
					<th class="text-center">Editar</th>
                    <th class="text-center">Fecha_Registro</th>
                    <th>Documento</th>
					<th>Nombre</th>	
                    <th>Email</th> 
				</tr>
			</thead>
			@foreach($resumes as $resume)
	            <tr id="resume_{{ $resume->jobseeker_id }}">
                    <td style="text-align: center;">
                        <button class="btn btn-danger" title="Borrar"  onClick = "deleteService.deleteResume({{ $resume->id }});"><i class="fa fa-trash-o"></i></button>
                    </td>
	            	<td> 
                        <div class="mj_checkbox" style="float: none; margin: auto;">
                            <input type="checkbox" value="1" data-resume="{{ $resume->id }}" onchange="changeActive({{ $resume->jobseeker->user->id }}, this)"
                            id="resume-{{ $resume->id }}" @if($resume->is_active) checked @endif>
                            <label for="resume-{{ $resume->id }}" style="border: 1px solid gray;"></label>
                        </div>
                    </td>
	            	<td class="text-center">
	            		<a href="{{ route('users.edit', $resume->jobseeker->user_id) }}" title="Editar Cuenta" class="btn btn-warning"><i class="fa fa-user"></i></a>
                        <a href="{{ route('resumes.edit', $resume) }}" title="Editar Hoja de vida" class="btn btn-info"><i class="fa fa-file-text-o"></i></a>
	            	</td>
                    <td class="text-center">
                        {{ $resume->created_at->toDateString() }}
                    </td>
                    <td>
	                    {{ $resume->jobseeker->doc_type }} {{ $resume->jobseeker->doc }}
	                </td>
	                <td>
	                    <a href="{{ route('resumes.show', $resume) }}" title="Ver" target="_blank"> 
							{{ $resume->jobseeker->full_name }}
						</a>
	                </td>
                    <td>
                        {{ $resume->jobseeker->email }}
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

        var manual = false;

        function changeActive(register_id, input) {

            if(! manual) {
                swal({
                    title: '¿Está seguro?',
                    text: 'La oferente será modificado',
                    type: "warning",
                    confirmButtonText: "Confirmar",
                    confirmButtonColor: "#ec971f",
                    cancelButtonText: "Cancelar",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    html: true
                }, function(isConfirm) {
                    if (isConfirm) { 
                        $.ajax({
                            url: '{{ asset("/admin/registers") }}' + '/' + register_id + '/active',
                            dataType: 'json',
                            method: 'POST',
                            success: function (data) {
                                if (data['success']) {
                                    swal("Oferente modificado", "", "success");
                                }
                                else {
                                    swal("Hubo un error", "", "danger");
                                    manual = true;
                                    var back = ! $(input).prop('checked');

                                    if(back == true) {
                                        $(input).prop('checked', true);
                                    }
                                    else {
                                        $(input).removeAttr('checked');    
                                    }
                                    manual = false;
                                }
                            },
                            error: function () {
                                swal("Hubo un error", "", "danger");
                                manual = true;
                                var back = ! $(input).prop('checked');

                                if(back == true) {
                                    $(input).prop('checked', true);
                                }
                                else {
                                    $(input).removeAttr('checked');    
                                }
                                manual = false;
                            }
                        });
                    } 
                    else {
                        manual = true;
                        var back = ! $(input).prop('checked');

                        if(back == true) {
                            $(input).prop('checked', true);
                        }
                        else {
                            $(input).removeAttr('checked');    
                        }
                        manual = false;
                    }

                });
            }
        }
	</script>
@endsection