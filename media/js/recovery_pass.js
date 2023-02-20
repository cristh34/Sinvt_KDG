$('document').ready(function(){
	$('form[name=recovery_pass]').submit(function(evt){
		evt.preventDefault();
		
		var username    = $('input[name=username]').val();
		var preguntaUno = $('input[name=preguntaUno]').val();
		var preguntaDos = $('input[name=preguntaDos]').val();

		if (username == '') {

			alert('Introduzca su Usuario');
			return false;

		}else if(preguntaUno == '') {
			
			alert('Introduzca su Respuesta 1');
			return false;
		}else if(preguntaDos == '') {
			alert('Por favor, introduzca Respuesta 2');
			return false;
		}

		$.post('recovery_pass.php', {
				'a':'1',
				'username':username,
				'preg_1':preguntaUno,
				'preg_2':preguntaDos
				
			}, function(data) {
				
				console.log(data);
				
				if(data == '1') {
					alert('Debe comunicarse con el Administrador del Sistema');
					return false;
				}else if(data == '2') {
					alert('segundo if');
					return false;
				}else if(data == '3') {
					alert('Validación Exitosa!');
					location.href = 'update_pass.php?name='+username;
				}else{
					alert('tercer if');
					alert(data);
				}



		});

	});	

	$('form[name=change-password]').submit(function(evt) {
		evt.preventDefault();
		
		var username = $('input[name=new-name]').val();
		var pass1 = $('input[name=new-password]').val();
		var pass2 = $('input[name=rnew-password]').val();
		
		if(pass1 == '') {
			alert('Por favor, introduzca una contraseña 01');
			return false;
		}else if(pass2 == '') {
			alert('Introduzca la confirmación de la contraseña');
			return false;
		}else if(pass1 != pass2) {
			alert('Las contraseñas no coinciden');
			return false;
		}else if(pass1.length < 6){
			alert('La contraseña debe contener 6 caracteres como mínimo');
			return false;
		}
		
		$.post('update_pass.php', {
			'act':'2',
				'name': username,
			'password1':pass1,
			'password2':pass2

		}, function(data) {

			console.log(data);

			if(data == '1') {
				alert('Contraseña cambiada correctamente');
				location.href = 'index.php';
			}else if(data == '2') {
				alert('Las contraseñas no coinciden');
				return false;
			}else{
				alert('Algo salió mal. Por favor, inténtelo de nuevo');
				return false;
				}
			});

		
	});
	
	 
});