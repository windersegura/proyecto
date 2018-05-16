$(document).ready(function()
{
	$.ajax({
		url: 'php/cargar_carrera.php',
		type: 'POST',
	})
	.done(function(Carrera) {
		$('#cargar_carrera').html(Carrera)
	})
	.fail(function() {
		alert('Hubo Un Error Al Cargar Carrera');
	})

	$('#cargar_carrera').on('change', function() 
	{	var id = $('#cargar_carrera').val();//AL SELECT SEMESTRE LE ENVIO EL CODIGO DE LA CARRERA
		
		$.ajax({
		url: 'php/cargar_semestre.php',
		type: 'POST',
		data: {'id': id},
		})
		.done(function(Carrera) {
			$('#cargar_semestre').html(Carrera)
		})
		.fail(function() {
			alert('Hubo Un Error Al Cargar Semestre');
		})
		.always(function() {
			console.log("complete");
		});

		$('#cargar_semestre').on('change', function() 
	{	
		var id = $('#cargar_semestre').val();//AL SELECT CURSO LE ENVIO EL NUMERO DE SEMESTRE 
		var id2 = $('#cargar_carrera').val();//AL SELECT CURSO LE ENVIO EL CODIGO DE LA CARRERA
		
		$.ajax({
		url: 'php/cargar_curso.php',
		type: 'POST',
		data: {'id': id,'id2': id2},
		})
		.done(function(Carrera) {
			$('#cargar_curso').html(Carrera)
		})
		.fail(function() {
			alert('Hubo Un Error Al Cargar Semestre');
		})
		.always(function() {
			console.log("complete");
		});
	});
	});
});