/*
 *  Document   : employerValidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */

var EmployerValidation = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Form Validation */
            $('#form-employer').validate({
                errorClass: 'help-block animation-pullUp col-xs-12', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block').remove();
                },
                rules: {
                    'username': {
                        required: true,
                        minlength: 3
                    },
                    'name': {
                        required: true,
                        minlength: 3
                    },
                    'email': {
                        required: true,
                        email: true
                    },
                    'nit': {
                        required: true,
                    },
                    'company': {
                        required: true,
                    },
                    'password': {
                        required: true,
                        minlength: 2
                    },
                    'password_confirmation': {
                        required: true,
                        //equalTo: '#password'
                    },
                    'terms-employer':{
                        'required': true,
                    }
                    
                },
                messages: {
                    'username': {
                        required: 'El nombre de usuairo es requerido',
                    },
                    'name': {
                        required: 'El nombre es requerido',
                    },
                    'email': 'Ingrese un email válido',
                    'nit': 'El nit de la empresa es requerido',
                    'company': 'El nombre de la empresa es requerido',
                    'password': {
                        required:  'La contraseña es requerida',
                        minlength: 'La contraseña es muy debil'
                    },
                    'password_confirmation': {
                        required:  'La contraseña debe ser confirmada',
                        equalTo: 'La contraseña no coincide'
                    },
                    'terms-employer': {
                        required: 'Debe aceptar los terminos y condiciones'
                    }
                    
                }
            });
        }
    };
}();