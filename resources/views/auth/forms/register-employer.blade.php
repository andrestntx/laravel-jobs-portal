<div class="modal fade mj_popupdesign" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> C<span>uenta</span> <span>de empleador</span></h4>
                <p>Registrese en nuestro sistema como empleador y encuentre nuevas personas
                en su equipo de trabajo</p>
            </div>
            <div class="modal-body">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                    <div class="row">
                        <div class="mj_pricingtable mj_yellowtable mj_createaccount_form_wrapper">
                            {{-- <p class="mj_toppadder40">You can also sign up with <a href="#">Facebook</a>, <a href="#">Linkedin</a>, or <a href="#">Google</a>.</p> --}}
                        
                            {!! Form::open(['url' => '/register', 'method' => 'POST']) !!}
                                <div class="mj_createaccount_form">
                                    @include('auth.inputs.user')
                                    {!! Field::text('company', ['ph' => 'Empresa', 'tpl' => 'themes.bootstrap.forms.login']) !!}
                                    @include('auth.inputs.passwords')
                                    @include('auth.inputs.rights', ['name_checkbox' => 'terms-employer'])
                                    {!! Field::hidden('role', 'employer')!!}
                                </div>
                                <div class="mj_pricing_footer">
                                    <button type="submit" name="register-employer">Iniciar ahora!</button>
                                </div>
                            {!! Form::close() !!}

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="images/close.png" alt="">
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>