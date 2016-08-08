@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('applications') !!}
@endsection

@section('title')
	<span>Solicitudes</span>
@endsection

@section('article')
	<div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20" style="padding: 25px 20px 0 20px">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>Empresa</th>
				<th>Empleo</th>
				<th class="text-center">Solicitudes</th>
			</tr>
			</thead>
			@foreach($jobs as $job)
				@if($job->applications->count() > 0)
					<tr>
						<td>
							{{ $job->company->name }}
						</td>
						<td>
							{{ $job->name }}
						</td>
						<td class="text-center">
							<a href="{{ route('admin.applications.show', $job) }}" class="btn btn-info" style="font-weight: bold; font-size: 15px;">
								{{ $job->applications->count() }}	
							</a>
						</td>
					</tr>
				@endif
			@endforeach
		</table>
		{{ $jobs->links() }}
	</div>
@endsection

@section('extra-js')
	
@endsection