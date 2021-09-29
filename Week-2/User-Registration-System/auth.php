<?php
require_once 'includes/init.php';


$status = $user->login($_POST, $db);

if( $status === 'success'){
	echo json_encode([
		'success'=> 'success', 
		'message'=> '<p class="alert alert-success">Authenticated successfully!</p>',
		'url' => 'profile.php',
	]);
}
else if( $status === 'missing_fields'){
	echo json_encode([
		'error'=> 'error', 
		'message'=> '<p class="alert alert-danger">All fields mandatory!</p>',
	]);
}

else if( $status === 'error'){
	echo json_encode([
		'error'=> 'error', 
		'message'=> '<p class="alert alert-danger">Incorrect email or password!</p>'
	]);
}