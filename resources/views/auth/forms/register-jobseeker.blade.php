<div class="modal fade mj_popupdesign" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1"> C<span>uenta </span> <span>de trabajador</span></h4>
                <p>Registrese en nuestro sistema como un trabajador y reciba cada día nuevas ofertas de empleo</p>
            </div>
            <div class="modal-body">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                    <div class="row">
                        <div class="mj_pricingtable mj_bluetable mj_freelancer_form_wrapper">
                            {{-- <p class="mj_toppadder40">You can also sign up with <a href="#">Facebook</a>, <a href="#">Linkedin</a>, or <a href="#">Google</a>.</p> --}}
                            {!! Form::open(['id' => 'form-jobseeker', 'url' => '/register', 'method' => 'POST']) !!}
                                <div class="mj_freelancer_form">
                                    @include('auth.inputs.register', ['name_checkbox' => 'terms-jobseeker'])
                                    {!! Field::hidden('role', 'jobseeker')!!}
                                </div>
                                <div class="mj_pricing_footer">
                                    <button type="submit" name="register-jobseeker">Iniciar ahora!</button>
                                </div>
                            {!! Form::close() !!}
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="{{ asset('images/close.png') }}" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>