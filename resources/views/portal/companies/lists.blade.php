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
					<th>Nombre</th>	
                    <th>Ofertas</th> 
					<th>Usuario</th>
					<th>Categoría</th>	
					<th>Descripción</th>	
				</tr>
			</thead>
			@foreach($companies as $company)
	            <tr id="company_{{ $company->id }}">
                    <td style="text-align: center;">
                        <button class="btn btn-danger" title="Borrar"  onClick = "deleteService.deleteCompany({{ $company->id }});"><i class="fa fa-trash-o"></i></button>
                    </td>
	            	<td> 
                        <div class="mj_checkbox" style="float: none; margin: auto;">
                            <input type="checkbox" value="1" data-company="{{ $company->id }}" 
                            id="company-{{ $company->id }}" @if($company->active) checked @endif>
                            <label for="company-{{ $company->id }}" style="border: 1px solid gray;"></label>
                        </div>
                    </td>
	            	<td class="text-center">
	            		<a href="{{ route('companies.edit', $company) }}" title="Editar" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
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
	                <td>
	                    {{ $company->description }}
	                </td>
	            </tr>
	        @endforeach
        </table>
	</div>
@endsection

@section('extra-js')
    <script src="/js/services/deleteService.js"></script>

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

		$('.mj_checkbox input').change(function () {

            company_id = $(this).data('company');

            if (confirm('¿Está seguro?')) {
                $.ajax({
                    url: '/admin/companies/' + company_id + '/active',
                    dataType: 'json',
                    method: 'POST',
                    success: function (data) {
                        if (data['success']) {
                            console.log('activada');
                        }
                        else {
                            console.log('No se eliminó');
                        }
                    },
                    error: function () {
                        alert('fallo la conexión');
                    }
                });
            }
            console.log();
        });
	</script>
@endsection
