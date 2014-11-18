$(function() {
		   
            /* @reload captcha
			------------------------------------------- */			   
			function reloadCaptcha(){
				$("#captcha").attr("src","libs/smartform/php/captcha.php?r=" + Math.random())
			}
			
			$('.captcode').click(function(e){
				e.preventDefault();
				reloadCaptcha();
			});
		   
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
                                    required:true
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
									$('.form-footer').removeClass('progress');
							},
							 success:function(){
									$('.form-footer').removeClass('progress');
									$('.alert-success').show().delay(10000).fadeOut();
									$('.field').removeClass("state-error, state-success");
									if( $('.alert-error').length == 0){
										$('#smart-form').resetForm();
										reloadCaptcha();
									}
							 }
					  	});
					}
					// end submitHandler:
			});		
	
});