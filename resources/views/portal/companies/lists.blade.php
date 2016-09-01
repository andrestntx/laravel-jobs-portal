@extends('layouts.admin-lg')

@section('breadcrumbs')
    {!! Breadcrumbs::render('companies') !!}
@endsection

@section('title')
	<span>Empresas</span>
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
					<th>Nombre</th>	
                    <th>Ofertas</th> 
					<th>Usuario</th>
					<th>Categoría</th>	
				</tr>
			</thead>
			@foreach($companies as $company)
	            <tr id="company_{{ $company->id }}">
                    <td style="text-align: center;">
                        <button class="btn btn-danger" title="Borrar"  onClick = "deleteService.deleteCompany({{ $company->id }});"><i class="fa fa-trash-o"></i></button>
                    </td>
	            	<td> 
                        <div class="mj_checkbox" style="float: none; margin: auto;">
                            <input type="checkbox" value="1" data-company="{{ $company->id }}" onchange="changeActive({{ $company->id }}, this)"
                            id="company-{{ $company->id }}" @if($company->is_active) checked @endif>
                            <label for="company-{{ $company->id }}" style="border: 1px solid gray;"></label>
                        </div>
                    </td>
	            	<td class="text-center" style="min-width: 100px;">
	            		<a href="{{ route('users.edit', $company->user_id) }}" title="Editar Cuenta" class="btn btn-warning"><i class="fa fa-user"></i></a>
                        <a href="{{ route('companies.edit', $company) }}" title="Editar Empresa" class="btn btn-success"><i class="fa fa-building-o"></i></a>
	            	</td>
                    <td class="text-center">
                        {{ $company->created_at->toDateString() }}
                    </td>
	                <td>
	                    <a href="{{ route('companies.show', $company) }}" title="Editar" target="_blank"> 
							{{ $company->name }}
						</a>
	                </td>
                    <td class="text-center">
                        {{ $company->jobs->count() }}
                    </td>
	                <td>
	                    {{ $company->user->name }}
	                </td>
	                <td>
	                    {{ $company->category_name }}
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

        function changeActive(company_id, input) {

            if(! manual) {
                swal({
                    title: '¿Está seguro?',
                    text: 'La empresa será modificada',
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
                            url: '{{ asset("/admin/companies") }}/' + company_id + '/active',
                            dataType: 'json',
                            method: 'POST',
                            success: function (data) {
                                if (data['success']) {
                                    swal("Empresa modificada", "", "success");
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
