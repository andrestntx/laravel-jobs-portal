@extends('layouts.admin')

@section('breadcrumbs')
    {!! Breadcrumbs::render('contract-types') !!}
@endsection

@section('title')
	<span>Tipos de Contrato</span>
@endsection

@section('pre-article')
	<a href="{{ route('admin.contract-types.create') }}" class="btn btn-lg mj_btnblue" data-text="Nuevo Tipo de Contrato"><span>Nuevo Tipo de Contrato</span></a>
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
			@foreach($types as $type)
	            <tr>
	            	<td style="text-align: center;">
	            		<a href="{{ route('admin.contract-types.edit', $type) }}" title="Editar"><i class="fa fa-pencil"></i></a>
	            	</td>
	                <td>
	                    <a href="{{ route('admin.contract-types.edit', $type) }}" title="Editar">
							{{ $type->name }}
						</a>
	                </td>
	                <td>
	                    {{ $type->description }}
	                </td>
	            </tr>
	        @endforeach
        </table>
	</div>
@endsection