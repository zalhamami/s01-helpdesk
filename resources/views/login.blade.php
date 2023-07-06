<!DOCTYPE html>
<html lang="en">
	<link rel="shortcut icon" href="img/logomtm.png">
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/csslogin.css">
		<script src="https://kit.fontawesome.com/a81368914c.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </head>

		@if(session()->has('loginError'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{ session('loginError') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif
<body>
	<div class="container">
		<div class="img">
		<img src="img/login.png" alt="logo">
				
    </div>
		<div class="login-content">
			<form action="/login" method="POST">
				@csrf
				<img src="img/logomtm.png">
                <h1 class="tittle">PT. MEDIA TELEKOMUNIKASI MANDIRI</h1>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="username" class="input" id="username" autofocus required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input" id="password" required>
            	   </div>
            	</div>
            	<input type="submit" class="btn btn-primary" value="Login">
            </form>
        </div>
    </div>
	<script type="text/javascript" src="js/login.js"></script>
</body>
</html>
