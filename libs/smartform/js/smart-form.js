	$(function() {
			   
				/* @reload captcha
				------------------------------------------- */
                $.validator.methods.smartCaptcha = function(value, element, param) {
                    return value == param;
                };
			   
				$( "#smart-form" ).validate({
				
						/* @validation states + elements 
						------------------------------------------- */
						errorClass: "state-error",
						validClass: "state-success",
						errorElement: "em",
						onkeyup: false,
						onclick: false,
						
						/* @validation rules 
						------------------------------------------ */
						rules: {
								sendername: {
										required: true,
										minlength: 2
								},
								sendersubject: {
										required: true,
										minlength: 4
								},								
								sendermessage: {
										required: true,
										minlength: 10,
                                        maxlength: 100
								},
								securitycode:{
                                        required:true,
                                        smartCaptcha:16
                                }
						},
						
					
						messages:{
								sendername: {
										required: 'Ingresa tu nombre',
										minlength: 'Mínimo 2 caracteres'
								},
								sendersubject: {
										required: 'Ingresa tu país',
										minlength: 'Mínimo 2 caracteres'
								},														
								sendermessage: {
										required: 'Ingresa tu mensaje',
										minlength: 'Mínimo 10 caracteres'
								},															
								securitycode:{
										required: 'Ingresa el código',
                                        smartCaptcha: 'Ingresar el codigo correcto'
								}
						},

						/* @validation highlighting + error placement  
						---------------------------------------------------- */
						highlight: function(element, errorClass, validClass) {
								$(element).closest('.field').addClass(errorClass).removeClass(validClass);
						},
						unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.field').removeClass(errorClass).addClass(validClass);
						},
						errorPlacement: function(error, element) {
						   if (element.is(":radio") || element.is(":checkbox")) {
									element.closest('.option-group').after(error);
						   } else {
									error.insertAfter(element.parent());
						   }
						},
						
						/* @ajax form submition 
						---------------------------------------------------- */
                        submitHandler:function(form) {
                            $(form).ajaxSubmit({
                                target:'.result',
                                beforeSubmit:function(){
                                    $('.form-footer').addClass('progress');
                                },
                                error:function(){
                                    $("div.form-msg").show().delay(7000).fadeOut();
                                    $('.form-footer').removeClass('progress');
                                },
                                success:function(){
                                    $('.form-msg').show().delay(7000).fadeOut();
                                    $('.form-footer').removeClass('progress');
                                    $('.field').removeClass("state-error, state-success");
                                    $('#smart-form').resetForm();
                                }
                            });
                        }
						// end submitHandler:
				});		
		
	});				
    