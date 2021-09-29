<?php  
session_start();

if(isset($_SESSION['logged_in'])){
	header('location: profile.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Registration System</title>
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/style.css">
</head>
<body>
	
	<div class="container">
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Brand</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      
		      
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#" data-toggle="modal" data-target="#login">Log In</a></li>
		        <li><a href="#" data-toggle="modal" data-target="#signup">Sign Up</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>


		<div class="jumbotron">
		  <h1>Hello, Visitor!!</h1>
		  <p>This is user registration system</p>
		  <p><a class="btn btn-primary btn-lg" href="#" role="button" data-toggle="modal" data-target="#signup">Test the system</a></p>
		</div>

	</div>

	
	<!-- Login box -->
	
	<div class="modal fade my-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Login to your account</h4>
	      </div>
	      <div class="modal-body">
	        <form class="form" method="post" action="auth.php">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <div class="checkbox">
			    <label>
			      <input type="checkbox"> Check me out
			    </label>
			  </div>
			  <button type="submit" class="btn btn-primary btn-lg">Log me In!</button>
			</form>
			<br>
			<p><a href="#" id="forgot-password" data-toggle="modal" data-target="#send-password-link">Forgot your password?</a></p>
	      </div>
	      <div class="modal-footer">
	        	
	        
	      </div>
	    </div>
	  </div>
	</div>

	<!-- /Login box -->


	<!-- signup box -->
	
	<div class="modal fade my-modal" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Signup for a new account</h4>
	      </div>
	      <div class="modal-body">
	        <form class="form" method="post" action="signup.php">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Full name</label>
			    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Confirm Password</label>
			    <input type="password" class="form-control" name="cpassword" id="exampleInputPassword1" placeholder="Password">
			  </div>	
			  <button type="submit" class="btn btn-primary btn-lg">Sign me Up!</button>
			</form>
	      </div>
	      <div class="modal-footer">
	        
	        
	      </div>
	    </div>
	  </div>
	</div>

	<!-- /signup box -->



	<!-- Reset Passwword box -->
	
	<div class="modal fade my-modal" id="send-password-link" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Send me reset password link</h4>
	      </div>
	      <div class="modal-body">
	        <form class="form" method="post" action="mail-password-link.php">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
			  </div>
			  <button type="submit" class="btn btn-primary btn-lg">Send Password Link!</button>
			</form>
	      </div>
	      <div class="modal-footer">
	        
	        
	      </div>
	    </div>
	  </div>
	</div>

	<!-- /Reset Passwword box -->


	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/script.js"></script>
</body>
</html>