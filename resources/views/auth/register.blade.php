@extends('layouts.portal')

@section('content')
    
    <div class="mj_transprentbg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="mj_signup_section mj_yellow_bg">
                            <div class="mj_mainheading mj_toppadder80 mj_bottompadder30">
                                <h1>Q<span>uiero</span> <span>personas en mi equipo de trabajo</span></h1>
                            </div>
                            <div class="mj_blog_btn">
                                <a href="#" class="mj_mainbtn mj_btnblack" data-text="empresa" data-toggle="modal" data-target="#myModal"><span>empresa</span></a>
                            </div>
                            <div class="mj_signup_section_img">
                                <img src="{{ asset('images/signup_bg1.png') }}" class="img-responsive" alt="contratar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="mj_signup_section mj_blue_bg">
                            <div class="mj_mainheading mj_toppadder80 mj_bottompadder30">
                                <h1>E<span>stoy</span> <span>buscando un nuevo empleo</span></h1>
                            </div>
                            <div class="mj_blog_btn">
                                <a href="#" class="mj_mainbtn mj_btnblack" data-text="trabajador" data-toggle="modal" data-target="#myModal1"><span>trabajador</span></a>
                            </div>
                            <div class="mj_signup_section_img">
                                <img src="{{ asset('images/signup_bg2.png') }}" class="img-responsive" alt="job">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('auth.forms.register-employer')
    @include('auth.forms.register-jobseeker')
    <div class="modal fade mj_popupdesign" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"> l<span>ogin to my </span> A<span>ccount</span></h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                </div>
                <div class="modal-body">
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                        <div class="row">
                            <div class="mj_pricingtable mj_greentable mj_login_form_wrapper">
                                <form>
                                    <div class="mj_login_form">
                                        <div class="form-group">
                                            <input type="text" placeholder="Username or Email" id="usr_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" placeholder="Your Password" id="usr_password" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mj_toppadder20">
                                                <div class="form-group  pull-left">
                                                    <div class="mj_checkbox">
                                                        <input type="checkbox" value="1" id="check4" name="checkbox">
                                                        <label for="check4"></label>
                                                    </div>
                                                    <span> remember me</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mj_toppadder20">
                                                <div class="form-group pull-right">
                                                    <span><a href="#">forget password ?</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mj_pricing_footer">
                                        <a href="#">login Now</a>
                                    </div>
                                </form>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="{{ asset('images/close.png') }}" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Model End-->
@endsection


@section('extra-js')
    <script src="{{ asset('/js/validations/auth/employerValidation.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/validations/auth/jobseekerValidation.js') }}" type="text/javascript"></script>
    <script>
        EmployerValidation.init();
        JobseekerValidation.init();
    </script>
@endsection
