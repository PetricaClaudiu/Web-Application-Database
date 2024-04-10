<?php
session_start();
include('connection.php');
include('functions.php');

  if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$marca = $_POST['Marca'];
    $model = $_POST['Model'];
		$an = $_POST['AnFabricatie'];	
    $pret = $_POST['Pret'];
		$kilometraj = $_POST['Kilometraj'];	
    

    $marca = mysqli_real_escape_string($con, $marca);
    $model = mysqli_real_escape_string($con, $model);
    $an = mysqli_real_escape_string($con, $an);
    $pret = mysqli_real_escape_string($con, $pret);
    $kilometraj = mysqli_real_escape_string($con, $kilometraj);

  

		if(!empty($marca) && !empty($model) && !empty($an) && !empty($pret) && !empty($kilometraj))
		{

      
      $query3 = "INSERT into masini(MasinaID,Marca,Model,An,Pret,Kilometraj) values (NULL,'$marca','$model','$an','$pret','$kilometraj')";
      $result3 = mysqli_query($con, $query3);

    
      if ($result3 === TRUE) {
        echo "New car created successfully";
      } else {
        echo "Error: <br>" . mysqli_error($con);
      }

			die();
		}
    else
		{
		}
	}

// New section to handle adding an employee
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['employeeName']))
{
    // Gather employee data from POST request
    $employeeName = mysqli_real_escape_string($con, $_POST['employeeName']);
    $employeePosition = mysqli_real_escape_string($con, $_POST['employeePosition']);
    $employeeSalary = mysqli_real_escape_string($con, $_POST['employeeSalary']);
    
    // Additional validations can be added here

    if(!empty($employeeName) && !empty($employeePosition) && !empty($employeeSalary))
    {
        // SQL query to insert new employee data
        $query4 = "INSERT INTO angajati (nume, functie, salariu) VALUES ('$employeeName', '$employeePosition', '$employeeSalary')";
        $result4 = mysqli_query($con, $query4);

        if ($result4 === TRUE) {
            echo "New employee added successfully";
        } else {
            echo "Error: <br>" . mysqli_error($con);
        }
    }
    else
    {
        echo "Please fill all employee fields";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Car</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="topnav">
    <a class="active" href="add_user.php">Adaugare Masina si Angajat</a>
    <a href="updateb.php">Updateaza Masina si Client</a>
    <a href="delete.php">Eliminare Masina si Client</a>
    <a href="simple.php">Interogari</a>
</div>

<div class="container">
    <h2>Introduceti datele pentru a adauga o masina</h2>
    <form method="post" class="car-form">
        <div class="input-group">
            <label>Marca:</label>
            <input type="text" name="Marca" required>
        </div>
        <div class="input-group">
            <label>Model:</label>
            <input type="text" name="Model" required>
        </div>
        <div class="input-group">
            <label>An Fabricatie:</label>
            <input type="number" name="AnFabricatie" required>
        </div>
        <div class="input-group">
            <label>Kilometraj:</label>
            <input type="text" name="Kilometraj" required>
        </div>
        <div class="input-group">
            <label>Pret:</label>
            <input type="text" name="Pret" required>
        </div>
        <button type="submit" class="btn-submit">Inscriere</button>
    </form>
</div>


<div class="container">
    <h2>Adauga un nou angajat</h2>
    <form method="post" class="employee-form">
        <div class="input-group">
            <label>Nume angajat:</label>
            <input type="text" name="employeeName" required>
        </div>
        <div class="input-group">
            <label>Functie:</label>
            <input type="text" name="employeePosition" required>
        </div>
        <div class="input-group">
            <label>Salariu:</label>
            <input type="number" name="employeeSalary" required>
        </div>
        <button type="submit" class="btn-submit">Adauga Angajat</button>
    </form>
</div>




<a href="login.php" class="previous">&laquo; Logout</a>

</body>
</html>


<style>

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.topnav {
    background-color: #ffffff;
    overflow: hidden;
    width: 100%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.topnav a {
    float: left;
    color: #1f0eb3;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover {
    background-color: #1f0eb3;
    color: white;
}

.topnav a.active {
    background-color: #1f0eb3;
    color: white;
}

.container {
    background-color: white;
    margin: 20px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

.container h2 {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

.form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.input-group {
    display: flex;
    flex-direction: column;
}

.input-group label {
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

.form input,
.form button {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
}

.form button {
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form button:hover {
    background-color: #0056b3;
}

.previous {
    margin-top: 20px;
    color: #1f0eb3;
    text-decoration: none;
    transition: color 0.3s;
}

.previous:hover {
    color: #0056b3;
}


</style>
