@extends('layouts.portal-breadcrumbs')

@section('breadcrumbs')
    {!! Breadcrumbs::render('geo-locations') !!}
@endsection

@section('content')
	<div class="col-md-5">
		<div class="mj_postdiv mj_shadow_yellow mj_postpage mj_toppadder20 mj_bottompadder10">
			<table class="table table-striped">
				<thead>
				<tr>
					<th colspan="1" class="text-center" rowspan="" headers="" scope="">Desactivar</th>
					<th colspan="2" rowspan="" headers="" scope="">Dirección</th>
				</tr>
				</thead>
				@foreach($geoLocations as $location)
					<tr>
						<td colspan="1" class="text-center">
							<a class="btn btn-sm btn-warning" href="{{ route('admin.geo-locations.edit', $location) }}">
								<i class="fa fa-remove"></i>
							</a>
						</td>
						<td colspan="2">
							{{ $location->formatted_address }}
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
	<div class="col-md-7">
		<div class="mj_postdiv mj_shadow_yellow mj_postpage mj_toppadder20 mj_bottompadder10">
			<div class="col-xs-12">
				{!! Form::model($geoLocation, $formData) !!}
					<div class="col-lg-10 col-md-9 col-xs-8">
						{!! Field::text('address', ['placeholder' => 'Dirección', 'tpl' => 'themes.bootstrap.fields.inline']) !!}
					</div>
					<div class="col-lg-2 col-md-3 col-xs-4">
						<button type="submit" class="btn btn-lg mj_bluebtn">Guardar</button>
					</div>
					@include('includes.google-maps.map')
					@include('includes.google-maps.inputs')
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection


@section('extra-js')
	<script src="{{ asset('/js/services/searchLocation.js') }}"></script>
	<script> searchLocation.init(); </script>
@endsection