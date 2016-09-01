<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" lang="es"> 
	<meta name="MobileOptimized" content="320">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@yield('extra-head')
	<title>Portal de empleo</title>
	<!--srart theme style -->
	<link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css" />
	<!-- Data Tables -->
    <link href="{{ asset('/css/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/plugins/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/plugins/dataTables/dataTables.tableTools.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/js/plugins/tags/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/plugins/select-bootstrap/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/plugins/ajax-select/ajax-bootstrap-select.min.css') }}" rel="stylesheet">
    
	<!-- end theme style -->
	<!-- favicon links -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('/images/favicon.png') }}" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

	<link href="{{ asset('/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">

	@yield('extra-css')
</head>
<body>
	<!--Loader Start -->
	<div class="mj_preloaded">
		<div class="mj_preloader">
			<div class="lines">
				<div class="line line-1"></div>
				<div class="line line-2"></div>
				<div class="line line-3"></div>
			</div>

			<div class="loading-text">Cargando...</div>
		</div>
	</div>
	<!--Loader End -->

	<!--Header Start -->

	<div class="mj_header">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="mj_logo">
						<a href="{{ asset('/') }}">
							<img src="{{ asset($portalLogo) }}" class="img-responsive" alt="logo" style="max-height: 50px; display:inline-block; vertical-align: middle;">
							<p style="color:white; display: inline-block; margin-left: 10px; font-size: 1.35em; vertical-align: middle;margin-bottom: 0;">{{ $portalFirstName }}<span class="mj_yellow_text">{{ $portalLastName }}</span></p>
						</a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mj_menu" aria-expanded="false">
							<span class="sr-only">MENU</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>

				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

					<div class="collapse navbar-collapse mj_navmenu" id="mj_menu">
						{!! Menu::make('menu.main', 'nav navbar-nav')->render('themes.bootstrap.menus.main') !!}
						
						@if(Auth::check())
							{!! Menu::make('menu.right', 'nav navbar-nav navbar-right mj_right_menu mj_login_menu')
							->render('themes.bootstrap.menus.main') !!}

							<div class="mj_profilediv" id="my_profile_div" style="width: 300px;">
								<p style="text-align: left; margin-bottom: 0; font-size: 1em; margin-left: 20px;">
									<strong>{{ auth()->user()->name }}</strong>
								</p>
								<p style="text-align: left; margin-bottom: 0; font-size: 0.9em; margin-left: 20px;">
									{{ auth()->user()->role_name }}
								</p>

								{!! Menu::make('menu.account')
									->setParams([
										'username' 	=> Auth::user()->username,
										'company' 	=> Auth::user()->getCompany(),
										'user'		=> Auth::user()
									])
									->render('themes.bootstrap.menus.main') 
								!!}
							</div>
						@else
							{!! Menu::make('menu.right', 'nav navbar-nav navbar-right mj_right_menu mj_without_login_menu')
							->render('themes.bootstrap.menus.main') !!}
						@endif

						
						<div class="mj_profilediv" id="my_profile_div_login">
							<form>
								<div class="form-group">
									<input type="text" placeholder="Username or Email" id="ur_name" class="form-control">
								</div>
								<div class="form-group">
									<input type="password" placeholder="Password" id="ur_password" class="form-control">
								</div>
								<div class="form-group">
									<div class="mj_checkbox">
										<input type="checkbox" value="1" id="check1" name="checkbox">
										<label for="check1"></label>
									</div>
									<span> remember me</span>
								</div>
								<div class="mj_showmore"> <a href="{{ asset('#') }}" class="mj_showmorebtn mj_greenbtn">login now!</a> </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Header End -->
	
	@yield('bread')

	<!--Content Start -->
	@yield('content')	
	<!--Content End -->

	<!--Footer Start -->
	<div class="mj_footer mj_toppadder80 mj_bottompadder80">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0">
					<div class="mj_weight mj_bottompadder20">
						<a href="{{ asset('/') }}"><img src="{{ asset($portalLogo) }}" class="img-responsive" alt="" style="max-height: 50px;">
						</a>
						<p>{!! $portalDescription !!}</p>
					</div> 
					<div class="mj_copyright">

						<p style="color:white; display: inline-block; margin-left: 10px; font-size: 1.15em; vertical-align: middle;margin-bottom: 10px;">{{ $portalFirstName }}<span class="mj_yellow_text">{{ $portalLastName }}</span></p>
						<p>&copy; {{ date('Y') }} <a href="{{ asset('http://gestacol.net') }}">Gestacol Software</span></a>
							<br> Licencia de uso exclusivo para <a href="{{ $companyWeb }}" target="_blank">{{ $companyName }}</a> &nbsp; / &nbsp; Todos los derechos de uso y reproducción reservados a <a href="http://gestacol.net">Gestacol Software</a>
						</p>
						<p> <a href="http://comunidad.serviciodeempleo.gov.co" target="_blank">Comunidad de servicio publico de empleo</a> </p>
						<span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
					</div>
				</div>
				<div class="totop">
					<div class="gototop">
						<a href="{{ asset('#') }}">
							<i class="fa fa-angle-up"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Footer End -->

	<!-- Script Start -->
	<script src="{{ asset('/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/modernizr.custom.js') }}" type="text/javascript"></script>
	<script type="text/javascript" src="{{ asset('/js/plugins/rsslider/jquery.themepunch.tools.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/plugins/rsslider/jquery.themepunch.revolution.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/plugins/rsslider/revolution.extension.layeranimation.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/plugins/rsslider/revolution.extension.navigation.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/plugins/rsslider/revolution.extension.parallax.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/plugins/rsslider/revolution.extension.slideanims.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/plugins/countto/jquery.countTo.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/plugins/owl/owl.carousel.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/plugins/bootstrap-slider/bootstrap-slider.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/plugins/fancybox/jquery.fancybox.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/plugins/fancybox/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/jquery.mixitup.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/plugins/jquery-ui/jquery-ui.js') }}"></script>
	<script src="{{ asset('/js/plugins/isotop/isotope.pkgd.js') }}"></script>
	<script src="{{ asset('/js/plugins/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('/js/plugins/ckeditor/adapters/jquery.js') }}"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&key=AIzaSyC6sKlTXpgXNAWqCUF5K8CV2S_vM1yhJ04"></script>
	<script src="{{ asset('/js/plugins/maps/jquery.geocomplete.js') }}"></script>
	<script src="{{ asset('/js/plugins/logger.js') }}"></script>
	<script src="{{ asset('/js/plugins/form-validation/validation.min.js') }}"></script>
	<script src="{{ asset('/js/custom.js') }}" type="text/javascript"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
	
	<!-- Data Tables -->
    <script src="{{ asset('/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('/js/plugins/dataTables/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('/js/plugins/dataTables/dataTables.tableTools.min.js') }}"></script>

    <script src="{{ asset('/js/plugins/select-bootstrap/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/ajax-select/ajax-bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('/js/plugins/tags/bootstrap-tagsinput.js') }}"></script>

    <script src="{{ asset('/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

	<script type="text/javascript">
		$( document ).ready(function() {
			$.each($('.salary'), function( index, value ) {
				$(this).text( numeral($(this).text()).format('$ 0,0[.]00') ) ;
			});

			$("select:not(.ajax-select).select-search").select2();

			$('form').on('focus', 'input[type=number]', function (e) {
			  $(this).on('mousewheel.disableScroll', function (e) {
			    e.preventDefault()
			  })
			})
			$('form').on('blur', 'input[type=number]', function (e) {
			  $(this).off('mousewheel.disableScroll')
			})
		});

		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
		
	</script>

	<!-- Script End -->
	@yield('extra-js')
</body>
</html>