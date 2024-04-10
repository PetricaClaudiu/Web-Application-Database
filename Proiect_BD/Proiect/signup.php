<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Salvare în baza de date
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div class="container">
        <form method="post" class="signup-form">
            <h2>Signup</h2>

            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-signup">Signup</button>

            <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>

</body>
</html>

<style>

.signup-form h2 {
    text-align: center;
    color: #333;
}

.btn-signup {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #28a745;
    color: white;
    border-radius: 4px;
    cursor: pointer;
}

.btn-signup:hover {
    background-color: #218838;
}

.login-link {
    text-align: center;
    margin-top: 15px;
}

.login-link a {
    color: #007bff;
    text-decoration: none;
}
</style>