$('document').ready(function() {
	$('form[name=new-item]').submit(function(evt) {
		evt.preventDefault();
		
		var name = $('input[name=item-name]').val();
		var monto = $('input[name=item-monto]').val();
		var fecha = $('input[name=item-fecha]').val();
		var hash = $('input[name=item-hash]').val();
		
		if(name == '') {
			alert('Por favor, introduzca el nombre de la empresa');
			return false;
		}
		if(monto == '') {
			alert('Por favor, introduzca el Monto de la factura');
			return false;
		}
		if(fecha == '') {
			alert('Por favor, ingresa la fecha');
			return false;
		}
		console.log(fecha);

		$.post('new-pay.php', {
			'act':'1',
			'name':name,
			'monto':monto,
			'fecha':fecha,
			'hash':hash

		}, function(data) {
			if(data == '1') {
				alert('Producto creado correctamente');
				location.href = 'new-pay.php';
			}else{
				alert('Algo salió mal. Por favor, vuelva a intentarlo');
				return false;
			}
		});
	});
	
	
});