@extends('layouts.admin')

@section('breadcrumbs')
    {!! Breadcrumbs::render('company-categories') !!}
@endsection

@section('title')
	<span>Categorías de Empresa</span>
@endsection

@section('pre-article')
	<a href="{{ route('admin.company-categories.create') }}" class="btn btn-lg mj_btnblue" data-text="Nueva Categoría"><span>Nueva Categoría</span></a>
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
			@foreach($categories as $category)
	            <tr id="category_{{ $category->id }}">
	            	<td style="text-align: center;">
	            		<button class="btn btn-danger" title="Borrar"  onClick = "deleteService.deleteCompanyCategory({{ $category->id }});"><i class="fa fa-trash-o"></i></button>
	            	</td>
	            	<td style="text-align: center;">
	            		<a href="{{ route('admin.company-categories.edit', $category) }}" class="btn btn-warning" title="Editar" ><i class="fa fa-pencil"></i></a>
	            	</td>
	                <td>
	                    <a href="{{ route('admin.company-categories.edit', $category) }}" title="Editar">
							{{ $category->name }}
						</a>
	                </td>
	                <td>
	                    {{ $category->description }}
	                </td>
	            </tr>
	        @endforeach
        </table>
	</div>
@endsection

@section('extra-js')
	<script src="/js/services/deleteService.js"></script>
@endsection