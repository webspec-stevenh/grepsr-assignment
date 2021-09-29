<?php


class User{


	public function login($user, $db){

		if(empty($user['email']) OR empty($user['password'])){
			return 'missing_fields';
		}

		$sql = "SELECT * FROM `users` WHERE `email`=?";
		$statement = $db->prepare($sql);

		

		if( is_object($statement) ){

			$statement->bindParam(1, $user['email'], PDO::PARAM_STR);
			$statement->execute();

			if($row = $statement->fetch(PDO::FETCH_OBJ)){
				
				if(password_verify($user['password'], $row->password)){
					
					$_SESSION['logged_in'] = [
						'id'	=> 	$row->id,
						'name'  =>  $row->name,
					]; 

					return 'success';
				}

				

			}

		}
		return 'error';

	}
	


	public function signup($user, $db){
		//email existance
		//password and confirm passwords match
		//all fields are mandatory


		if(empty($user['name']) OR empty($user['email']) OR empty($user['password'])){
			return 'missing_fields';
		}
		else if($user['password'] !== $user['cpassword']){
			return 'mismatch_password';
		}
		else if( $this->emailExists($user['email'], $db) ){
			return 'email_exists';
		}
		else{

			
			$sql = "INSERT INTO `users`(`name`, `email`, `password`, `verification_code`) VALUES(?,?,?,?)";
			$statement = $db->prepare($sql);

			if(is_object($statement)){
				
				$hash = password_hash($user['password'], PASSWORD_DEFAULT);
				$code = generateCode();

				$statement->bindParam(1, $user['name'], PDO::PARAM_STR);
				$statement->bindParam(2, $user['email'], PDO::PARAM_STR);
				$statement->bindParam(3, $hash, PDO::PARAM_STR);
				$statement->bindParam(4, $code, PDO::PARAM_STR);
				$statement->execute();


				if($statement->rowCount()){
					return 'success';
				}


			}
		}
		return 'error';



	}


	// public function changePassword($user, $db){
	// 	//make sure to grab all form data
	// 	//check if the old password is valid
	// 	//new password and confirm new passwords are matched

	// 	if(empty($user['password']) OR empty($user['cpassword']) OR empty($user['npassword'])){
	// 		return 'missing_fields';
	// 	}
	// 	else if( $user['npassword'] !== $user['cpassword'] ){
	// 		return 'mismatch_password';
	// 	}
	// 	else if( !$this->oldPasswordMatched($user['password'], $db) ){
	// 		return 'incorrect_old';
	// 	}

	// 	$sql = "UPDATE `users` SET `password`=? WHERE `id`=?";
	// 	$statement = $db->prepare($sql);

	// 	if( is_object($statement) ){

	// 		$hash = password_hash($user['npassword'], PASSWORD_DEFAULT);

	// 		$statement->bindParam(1, $hash, PDO::PARAM_STR);
	// 		$statement->bindParam(2, $_SESSION['logged_in']['id'], PDO::PARAM_STR);
	// 		$statement->execute();

	// 		if( $statement->rowCount() == 1 ){
	// 			return 'success';
	// 		}
	// 		return 'error';
	// 	}
	// }


	// private function oldPasswordMatched($password, $db){
	// 	$sql = "SELECT * FROM `users` WHERE `id`=?";
	// 	$statement = $db->prepare($sql);
		
	// 	if( is_object($statement) ){
			
	// 		$statement->bindParam(1, $_SESSION['logged_in']['id'], PDO::PARAM_INT);
	// 		$statement->execute();

	// 		if( $row = $statement->fetch( PDO::FETCH_OBJ ) ){

	// 			if( password_verify( $password, $row->password ) ){
					
		
	// 				return true;
	// 			}

	// 		}

	// 	}
	// 	return false;

	// }


	

	// public function mailRestPasswordLink($user, $db){
	// 	/*
	// 	1 - Check the email exists in database
	// 	2 - show the error if email field is missing
	// 	*/

	// 	if(empty($user['email'])){
	// 		return 'missing_fields';
	// 	}
	// 	else if( !$this->emailExists($user, $db) ){
	// 		return 'not_found';
	// 	}

	// 	$sql = "SELECT * FROM `users` WHERE `email`=?";
	// 	$statement = $db->prepare($sql);
	// 	if(is_object( $statement )){
	// 		$statement->bindParam(1, $user['email'], PDO::PARAM_STR);
	// 		$statement->execute();

	// 		if( $row = $statement->fetch(PDO::FETCH_OBJ) ){

	// 			 $status = $this->sendMail($row);

	// 			 if($status){
	// 			 	return 'success';
	// 			 }
	// 			 return 'error';
	// 		}
			
	// 	}

	// }

	private function emailExists($user, $db){
		$sql = "SELECT * FROM `users` WHERE `email`=?";
		$statement = $db->prepare($sql);
		if(is_object( $statement )){
			$statement->bindParam(1, $user['email'], PDO::PARAM_STR);
			$statement->execute();

			if( $statement->fetch(PDO::FETCH_OBJ) ){
				return true;
			}
			return false;
		}
	}
	
	// public function updateResetPassword($user, $db){
	// 	/*
	// 	1 - All form data recieved done!
	// 	2 - User id is valid done!
	// 	3 - Code is valid
	// 	4 - New password and confirm passwords are matched done!
	// 	*/

	// 	if(empty($user['id']) OR empty($user['code']) OR empty($user['cpassword']) OR empty($user['npassword'])){
	// 		return 'missing_fields';
	// 	}
	// 	else if($user['cpassword'] !== $user['npassword']){
	// 		return 'mismatch_password';
	// 	}
	// 	else if( !$this->idExists($user, $db) ){
	// 		return 'incorrect_id';
	// 	}
	// 	else if( !$this->codeExists($user, $db) ){
	// 		/*
    //         1 - regenerate code
    //         2 - get user info from database with updated code
    //         2 - use user info to send an email with updated code
	// 		*/

    //         $this->regenerateCode($user, $db);

    //         $row = $this->getUserDetails($user, $db);

    //         $this->sendMail( $row );

    //         return 'incorrect_code';
			
	// 	}


	// 	$sql = "UPDATE `users` SET `password`=?, `verification_code`=? WHERE `id`=?";
	// 	$statement = $db->prepare($sql);
	

	// 	if(is_object( $statement )){
			
	// 		$hash = password_hash($user['npassword'], PASSWORD_DEFAULT);
	// 		$code = generateCode();

	// 		$statement->bindParam(1, $hash, PDO::PARAM_STR);
	// 		$statement->bindParam(2, $code, PDO::PARAM_STR);
	// 		$statement->bindParam(3, $user['id'], PDO::PARAM_INT);
	// 		$statement->execute();

	// 		if( $statement->rowCount() ){
	// 			return 'success';
	// 		}
	// 		return 'error';
	// 	}

	// }

	// private function getUserDetails($user, $db){
	// 	$sql = "SELECT * FROM `users` WHERE `id`=?";
	// 	$statement = $db->prepare($sql);
	

	// 	if(is_object( $statement )){
	// 		$statement->bindParam(1, $user['id'], PDO::PARAM_INT);
	// 		$statement->execute();

	// 		if( $row = $statement->fetch(PDO::FETCH_OBJ) ){
	// 			return $row;
	// 		}
	// 		return false;
	// 	}
	// }


	// private function regenerateCode($user, $db){
	// 	$sql = "UPDATE `users` SET `verification_code`=? WHERE `id`=?";
	// 	$statement = $db->prepare($sql);
	

	// 	if(is_object( $statement )){

	// 		$code = generateCode();

	// 		$statement->bindParam(1, $code, PDO::PARAM_STR);
	// 		$statement->bindParam(2, $user['id'], PDO::PARAM_INT);
	// 		$statement->execute();

	// 		if( $statement->rowCount() ){
				

	// 			return true;
	// 		}
	// 		return false;
	// 	}
	// }





	// private function codeExists($user, $db){
	// 	$sql = "SELECT * FROM `users` WHERE `id`=?";
	// 	$statement = $db->prepare($sql);


	// 	if(is_object( $statement )){
	// 		$statement->bindParam(1, $user['id'], PDO::PARAM_INT);
	// 		$statement->execute();

	// 		if( $row = $statement->fetch(PDO::FETCH_OBJ) ){
				
	// 			if($user['code'] === $row->verification_code ){
					

	// 				return true;
	// 			}
	// 		}

	// 		return false;
	// 	}
	// }


	// private function idExists($user, $db){
	// 	$sql = "SELECT * FROM `users` WHERE `id`=?";
	// 	$statement = $db->prepare($sql);

	// 	if(is_object( $statement )){
	// 		$statement->bindParam(1, $user['id'], PDO::PARAM_INT);
	// 		$statement->execute();

	// 		if( $statement->fetch(PDO::FETCH_OBJ) ){
	// 			return true;
	// 		}
	// 		return false;
	// 	}
	// }



	// private function sendMail($user){

	// 	// Create the Transport
	// 	$transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
	// 	  ->setUsername('e8786d3f2c66bf')
	// 	  ->setPassword('b7c23b266a1939')
	// 	;

	// 	// Create the Mailer using your created Transport
	// 	$mailer = new Swift_Mailer($transport);

	// 	// Create a message
	// 	$message = (new Swift_Message('Password Recovery Request!'))
	// 	  ->setFrom(['noreply@oursystem.com' => 'Our Login System'])
	// 	  ->setTo([$user->email])
	// 	  ->setBody(passworRecoverEmailMessageBody($user), 'text/html')
	// 	  ;

	// 	// Send the message
	// 	$result = $mailer->send($message);

	// 	if($result){
	// 		return true;
	// 	}
	// 	return false;

	// }

}

$user = new User;