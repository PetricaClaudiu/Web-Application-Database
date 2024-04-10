<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where username = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['userid'] = $user_data['userid'];
						header("Location: add_user.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <div class="container">
        <form method="post" class="login-form">
            <h2>Login</h2>

            <div class="input-group">
                <input type="text" name="user_name" placeholder="Username" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-login">Login</button>

            <p class="signup-link">Don't have an account? <a href="signup.php">Signup</a></p>
        </form>
    </div>

</body>
</html>


	<style type="text/css">
	
	body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

.login-form h2 {
    text-align: center;
    color: #333;
}

.input-group {
    margin-bottom: 15px;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.btn-login {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #007bff;
    color: white;
    border-radius: 4px;
    cursor: pointer;
}

.btn-login:hover {
    background-color: #0056b3;
}

.signup-link {
    text-align: center;
    margin-top: 15px;
}

.signup-link a {
    color: #007bff;
    text-decoration: none;
}


	</style>
