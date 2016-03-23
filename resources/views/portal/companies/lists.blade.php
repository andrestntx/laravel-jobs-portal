@extends('layouts.admin')

@section('breadcrumbs')
    {!! Breadcrumbs::render('companies') !!}
@endsection

@section('title')
	<span>Empresas</span>
@endsection

@section('pre-article')
	{{-- <a href="{{ route('companies.create') }}" class="btn btn-lg mj_btnblue" data-text="Nueva Empresa"><span>Nueva Empresa</span></a> --}}
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
			@foreach($companies as $company)
	            <tr>
	            	<td style="text-align: center;">
	            		<a href="{{ route('companies.edit', $company) }}" title="Editar"><i class="fa fa-pencil"></i></a>
	            	</td>
	                <td>
	                    <a href="{{ route('companies.edit', $company) }}" title="Editar">
							{{ $company->name }}
						</a>
	                </td>
	                <td>
	                    {{ $company->description }}
	                </td>
	            </tr>
	        @endforeach
        </table>
	</div>
@endsection