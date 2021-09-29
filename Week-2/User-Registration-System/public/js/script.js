$(function(){
	
	$('.form').on('submit', function( e ){
		e.preventDefault();

		$form = $(this);

		submitForm($form);

	});


	$('#forgot-password').on('click', function( e ){
		e.preventDefault();

		$('#login').modal('hide');

	});

});


function submitForm($form){

	$footer = $form.parent('.modal-body').next('.modal-footer');
	
	$footer.html('<img src="public/images/ajax-loader.gif">');
		

	$.ajax({
		url: $form.attr('action'),
		method: $form.attr('method'), 
		data: $form.serialize(),
		success: function( response){
			response = $.parseJSON( response );
			
			if(response.success){
				

				if(!response.signout){
					setTimeout(function(){
						$footer.html( response.message );
						window.location = response.url;
					},5000);
				}

				$footer.html( response.message );

			}
			else if(response.error){
				$footer.html( response.message );
			}

			console.log(response)
		}
	});
}






