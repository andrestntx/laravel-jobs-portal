@extends('layouts.portal')

@section('bread')
	<div class="mj_lightgraytbg">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					@yield('breadcrumbs', Breadcrumbs::render('home') )
				</div>
			</div>
		</div>
	</div>
@endsection