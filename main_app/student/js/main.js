jQuery(document).on('submit', '#formlg', function(event) 
{
	event.preventDefault();

	jQuery.ajax({
	  url: 'main_app/login.php',
	  type: 'POST',
	  dataType: 'json',
	  data: $(this).serialize(),
	  beforeSend: function(){

	  }
    })
    .done(function(respuesta){
    	console.log(respuesta);
    	if (!respuesta.error) 
    	{
    		if (respuesta.tipo == 'Admin') 
    		{
    			location.href ='main_app/admin/';
    		}
    		else if (respuesta.tipo == 'Secretario') 
    		{
    			location.href ='main_app/secretary/';
    		}
    	}
    	else
    	{
			$('.error').slideDown('slow');
    		setTimeout(function() {
    			$('.error').slideUp('slow');
    		},3000);
    	}
    })
    .fail(function(resp){
    	console.log(resp.responseText);
    })
    .always(function(){
        console.log("complete");
	});	
});

jQuery(document).on('submit', '#formlgstudent', function(event) 
{
	event.preventDefault();

	jQuery.ajax({
	  url: 'main_app/loginstudent.php',
	  type: 'POST',
	  dataType: 'json',
	  data: $(this).serialize(),
	  beforeSend: function(){

	  }
    })
    .done(function(respuesta){
    	console.log(respuesta);
    	if (!respuesta.error) 
    	{
    		if (respuesta.tipo == 'Alumno') 
    		{
    			location.href ='main_app/student/';
    		}
    		
    	}
    	else
    	{
			$('.error').slideDown('slow');
    		setTimeout(function() {
    			$('.error').slideUp('slow');
    		},3000);
    	}
    })
    .fail(function(resp){
    	console.log(resp.responseText);
    })
    .always(function(){
        console.log("complete");
	});	
});

jQuery(document).on('submit', '#formlgteacher', function(event) 
{
	event.preventDefault();

	jQuery.ajax({
	  url: 'main_app/loginteacher.php',
	  type: 'POST',
	  dataType: 'json',
	  data: $(this).serialize(),
	  beforeSend: function(){

	  }
    })
    .done(function(respuesta){
    	console.log(respuesta);
    	if (!respuesta.error) 
    	{
    		if (respuesta.tipo == 'Maestro') 
    		{
    			location.href ='main_app/teacher/';
    		}
    		
    	}
    	else
    	{
    		$('.error').slideDown('slow');
    		setTimeout(function() {
    			$('.error').slideUp('slow');
    		},3000);
    	}
    })
    .fail(function(resp){
    	console.log(resp.responseText);
    })
    .always(function(){
        console.log("complete");
	});	
});