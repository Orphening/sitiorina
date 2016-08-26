	$( document ).ready(function() {
	
	//Validación de Formulario en Modal: Evaluación Gratis	    	
    $(".evaluacion").validate({
    	rules: {
    		nombre: {required: true},
    		correo: {required: true, email: true},
    		fono: {required: true, minlength: 7, maxlength:9}
    	},
    	
    	messages: {
            nombre: {required: "Debe introducir su nombre."},
            correo : {email: "Debe introducir un email válido.", required: "Ingrese un correo electrónico."},
            fono : {required: "Ingrese número de 9 dígitos.", minlength: "Ingrese al menos 7 números."},
        },
    	submitHandler: function(form){
    		$.ajax({
                type: "POST",
                url: "enviar_evaluacion.php", 
                data: $('form.evaluacion').serialize(),
                success: function(msg){
                    $("#Message").html(msg);
                    $("#evaluar :input").each(function(){
                    $(this).val('');
                    });
                },
                error: function(){
                    alert("failure");
                }
            });   
            return false;        
    	}
    	
    });
    
    ////Validación de Formulario en Modal: Contáctenos	
    $(".contactenos").validate({
    	rules: {
    		nombre : {required: true},
    		correo : {required: true, email: true},
    		sms : {required: true}
    	},
    	
    	messages: {
    		nombre: {required: "Ingrese su nombre."},
    		correo: {required: "Ingrese un correo electrónico.", email: "Ingrese un correo válido"},
    		sms : {required: "Por favor déjanos un mensaje."}
    	},
    	
    	submitHandler: function(form){
    		$.ajax({
                type: "POST",
                url: "enviar_correo.php", 
                data: $('form.contactenos').serialize(),
                success: function(msg){
                    $("#successMessage").html(msg);
                    $("#successMessage").fadeIn("slow");
            		$("#contactenos :input").each(function(){
					$(this).val('');
					});
                },
                error: function(){
                    alert("failure");
                }
            });
            return false;
    	}
    	
    });
    
    	
    /*	
    $("button#enviar_contacto").click(function(){
   	
            $.ajax({
                type: "POST",
                url: "enviar_correo.php", 
                data: $('form.contactenos').serialize(),
                success: function(msg){
                    $("#successMessage").html(msg);
            		$("#contactenos :input").each(function(){
					$(this).val('');
					});
                },
                error: function(){
                    alert("failure");
                }
            });
            return false;
    });
	*/
	
    $('#myModal').on('hidden.bs.modal', function (e) {
    });

    $('#evaluacionGratis').on('hidden.bs.modal', function (e) {
        $("#Message").remove();
    });

	$('#modalContacto').on('hidden.bs.modal', function (e) {
        $("#successMessage").remove();
    });
    	
	});