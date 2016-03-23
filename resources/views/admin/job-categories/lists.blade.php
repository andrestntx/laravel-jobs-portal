@extends('layouts.admin')

@section('breadcrumbs')
    {!! Breadcrumbs::render('job-categories') !!}
@endsection

@section('title')
	<span>Categorías de Trabajo</span>
@endsection

@section('pre-article')
	<a href="{{ route('admin.job-categories.create') }}" class="btn btn-lg mj_btnblue" data-text="Nueva Categoría"><span>Nueva Categoría</span></a>
@endsection

@section('article')
	<div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20">
		<table class="table table-striped">
			<thead>
				<tr>
					<th colspan="" rowspan="" headers="" scope=""></th>
					<th colspan="1" rowspan="" headers="" scope="">Nombre</th>	
					<th colspan="3" rowspan="" headers="" scope="">Descripción</th>	
				</tr>
			</thead>
			@foreach($categories as $category)
	            <tr>
	            	<td style="text-align: center;">
	            		<a href="{{ route('admin.job-categories.edit', $category) }}" title="Editar"><i class="fa fa-pencil"></i></a>
	            	</td>
	                <td>
	                    <a href="{{ route('admin.job-categories.edit', $category) }}" title="Editar">
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