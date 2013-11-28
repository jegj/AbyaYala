$().ready(function() {
	
	$("#AdminRegistrarForm").validate({  
		rules: {
			'data[Admin][name]': {
				required: true,
				minlength: 3,
				maxlength: 45
			},
			AdminLastName: {
				required: true,
				minlength: 3,
				maxlength: 45
			},
			AdminPassword: {
				required: true,
				minlength: 8,
				maxlength: 45
			},
			AdminPasswdConfirm: {
				required: true,
				minlength: 8,
				maxlength: 45,
				equalTo: '#AdminPassword'
			},
			AdminEmail: {
				required: true,
				maxlength: 45,
				email: true
			},
			
		},
		messages: {
			'data[Admin][name]': {
				required:'Porfavor ponga su nombre',
				minlength: jQuery.format("Enter at least {0} characters"),
			},
			AdminLastName: {
				required: "Porfavor ponga su nombre",
				minlength: "Su nombre tiene que tener por lo menos 3 caracteres."
			},
			AdminPassword: {
				required: "Porfavor ponga su clave.",
				minlength: "Su clave debe de tener al menos 8 caracteres."
			},
			AdminPasswdConfirm: {
				required: "Porfavor ingrese su clave nuevamente",
				minlength: "Su clave debe de tener al menos 8 caracteres.",
				equalTo: "Sus contraseñas no coinciden"
			},
			AdminEmail: "Ingrese una direccion valida de correo",
		}
	});
});