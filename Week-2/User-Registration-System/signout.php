<?php
require_once 'includes/init.php';

if(isset($_SESSION['logged_in'])){

	$_SESSION = []; // assignig an empty array to $_session varible

	//forcefully expiring cookie
	setcookie(session_name(), session_id(), time()-1000, "/");

	//this delete she session from from lampp/temp directory
	session_destroy();

	header('location: index.php');

}
else{
	header('location: index.php?error=Please login to your account');
}