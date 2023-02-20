$('document').ready(function() {
	$('form[name=edit-pay]').submit(function(evt) {
		evt.preventDefault();
		
		var id = $(this).data('id');
		var name = $('input[name=item-name]').val();
		var monto= $('input[name=item-monto]').val();
		var fecha = $('input[name=item-fecha]').val();
		var hash = $('input[name=item-hash]').val();
		console.log(fecha+' - '+monto+' - '+id+' - '+name+' - '+hash);
		
		if(name == '') {
			alert('Por favor, introduzca un nombre');
			return false;
		}else if(monto == '') {
			alert('Por favor, inserte un precio');
			return false;
		}
		$.post('edit-pay.php', {
			'act':'1',
			'itemid':id,
			'name':name,
			'monto':monto,
			'fecha':fecha,
			'hash':hash
		},function(data) {
			if(data == '1') {
				Swal.fire('Se han realizado cambios con éxito');
				location.href = 'edit-pay.php';
			}else{
				alert('Algo salió mal. Por favor, inténtelo de nuevo');
				return false;
			}
		});
	});
	
	
	$('input[name=item-monto]').keyup(function(evt) {
		var val = $(this).val();
		var re = /^\d*\.{0,1}\d{0,2}$/;
		var t = $(this);
		
		if((re.test(val)) == false)
			t.val(val.substr(0, val.length - 1));
		return;
	});
	
});