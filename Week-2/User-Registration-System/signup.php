<?php
require_once 'includes/init.php';


$status = $user->signup($_POST, $db);

if( $status === 'success'){
	echo json_encode([
		'success'=> 'success', 
		'message'=> '<p class="alert alert-success">You are signed up successfully!</p>',
		'signout' => 1,
	]);
}
else if( $status === 'missing_fields'){
	echo json_encode([
		'error'=> 'error', 
		'message'=> '<p class="alert alert-danger">All fields mandatory!</p>',
		
	]);
}
else if( $status === 'email_exists'){
	echo json_encode([
		'error'=> 'error', 
		'message'=> '<p class="alert alert-danger">Email address already in use!</p>',
	]);
}
else if( $status === 'mismatch_password'){
	echo json_encode([
		'error'=> 'error', 
		'message'=> '<p class="alert alert-danger">Mismatch password and confirm password!</p>',
	]);
}

else if( $status === 'error'){
	echo json_encode([
		'error'=> 'error', 
		'message'=> '<p class="alert alert-danger">Failed to sign you up!</p>'
	]);
}