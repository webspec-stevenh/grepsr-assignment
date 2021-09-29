<?php

function debug($arg){
	echo '<pre>';
	print_r($arg);
	echo '</pre>';
	exit;
}

function generateCode(){
	return md5(random_bytes(32));
}

function passworRecoverEmailMessageBody($user){

	$url  = "http://localhost/php-oop-ajax-login-tutorial/recover-password.php?id=".$user->id;
	$url .= "&code=".$user->verification_code;

	$html  = '<p>';	
	$html .= 'Hello '.$user->name."!";
	$html .= '<br>We just recieved a request to send you password recovery link</p>';
	$html .= '<p>Click this link to recover your password ';
	$html .= '<a href="'. $url .'"> Recover Password </a></p>';
	$html .= '<br><hr>';
	$html .= '<p>If you think you did not make this request, just ignore this email</p>';
	
	return $html;

}