<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="MobileOptimized" content="320">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Portal de empleo</title>
	<!--srart theme style -->
	<link href="/css/main.css" rel="stylesheet" type="text/css" />
	<!-- Data Tables -->
    <link href="/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
	<!-- end theme style -->
	<!-- favicon links -->
	<link rel="shortcut icon" type="image/png" href="/images/favicon.png" />
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
						<a href="/"><img src="/images/logo.png" class="img-responsive" alt="logo">
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

							<div class="mj_profilediv" id="my_profile_div">
								{!! Menu::make('menu.account')
									->setParam('username', Auth::user()->username)
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
								<div class="mj_showmore"> <a href="#" class="mj_showmorebtn mj_greenbtn">login now!</a> </div>
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
						<a href="index.html"><img src="/images/logo.png" class="img-responsive" alt="">
						</a>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat wisi enim ad minim veniam. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
					</div>
					<div class="mj_copyright">
						<p>&copy; 2015 <a href="#">mesh<span class="mj_yellow_text">jobs</span></a> Inc.
							<br> Designerd by <a href="#">themefire</a> &nbsp; / &nbsp; Only on <a href="#">Envato Market</a>
						</p>
						<span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
					</div>
				</div>
				<div class="totop">
					<div class="gototop">
						<a href="#">
							<i class="fa fa-angle-up"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Footer End -->

	<!-- Script Start -->
	<script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.js" type="text/javascript"></script>
	<script src="/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
	<script src="/js/modernizr.custom.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/plugins/rsslider/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="/js/plugins/rsslider/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="/js/plugins/rsslider/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="/js/plugins/rsslider/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="/js/plugins/rsslider/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="/js/plugins/rsslider/revolution.extension.slideanims.min.js"></script>
	<script src="/js/plugins/select2/select2.min.js" type="text/javascript"></script>
	<script src="/js/plugins/countto/jquery.countTo.js" type="text/javascript"></script>
	<script src="/js/plugins/owl/owl.carousel.js" type="text/javascript"></script>
	<script src="/js/plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>
	<script src="/js/plugins/fancybox/jquery.fancybox.js" type="text/javascript"></script>
	<script src="/js/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="/js/jquery.mixitup.js" type="text/javascript"></script>
	<script src="/js/plugins/jquery-ui/jquery-ui.js"></script>
	<script src="/js/plugins/isotop/isotope.pkgd.js"></script>
	<script src="/js/plugins/ckeditor/ckeditor.js"></script>
	<script src="/js/plugins/ckeditor/adapters/jquery.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&key=AIzaSyC6sKlTXpgXNAWqCUF5K8CV2S_vM1yhJ04"></script>
	<script src="/js/plugins/maps/jquery.geocomplete.js"></script>
	<script src="/js/plugins/logger.js"></script>
	<script src="/js/plugins/form-validation/validation.min.js"></script>
	<script src="/js/custom.js" type="text/javascript"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
	
	<!-- Data Tables -->
    <script src="/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

	<script type="text/javascript">
		$( document ).ready(function() {
			$.each($('.salary'), function( index, value ) {
				$(this).text( numeral($(this).text()).format('$ 0,0[.]00') ) ;
			});
		});
		
	</script>

	<!-- Script End -->
	@yield('extra-js')
</body>
</html>