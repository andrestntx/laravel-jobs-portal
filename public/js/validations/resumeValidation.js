/*
 *  Document   : resumeValidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */

var ResumeValidation = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Form Validation */
            $('#form-resume').validate({
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
                    'name': {
                        required: true,
                        minlength: 3
                    },
                    'company_category_id': {
                        required: true,
                    },   
                    'doc': {
                        required: true
                    },
                    'doc_type': {
                        required: true
                    },
                    'first_name': {
                        required: true
                    },
                    'last_name': {
                        required: true
                    },
                    'sex': {
                        required: true
                    },
                    'email': {
                        required: true
                    },
                    'phone': {
                        required: true
                    },
                    'address': {
                        required: true
                    }                 
                },
                messages: {
                    'doc_type': {
                        required: 'El tipo de identificación es requerido'
                    },
                    'doc': {
                        required: 'La número de identificación es requerido'
                    },
                    'first_name': {
                        required: 'El nombre es requerido'
                    },
                    'last_name': {
                        required: 'El apellido es requerido'
                    },
                    'sex': {
                        required: 'El género es requerido'
                    },
                    'email': {
                        required: 'El email es requerido'
                    },
                    'phone': {
                        required: 'El télefono es requerido'
                    },
                    'address': {
                        required: 'La dirección es requerido'
                    },
                    'resume_file': 'La hoja de vida es requerida'                  
                }
            });
        }
    };
}();