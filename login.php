<html>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/login.css">
	</head>

	<body>
    <div class="login-page">
      <div class="form">
        <form class="register-form">
          <input type="text" placeholder="Name"/>
					<input type="text" placeholder="Email address"/>
          <input type="password" placeholder="Password"/>
          <p class="message"><a><button>create</button></a></p>
          <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form">
          <input type="text" id="username" placeholder="Username"/>
          <input type="password" id="password" placeholder="Password"/>
          <button><a href="home.php">login</a></button>
          <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
      </div>
    </div>


		<script src="//code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/login.js"></script>

	</body>
</html>
