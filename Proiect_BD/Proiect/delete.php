

<?php
include('connection.php');
include('functions.php');

if(isset($_POST["Marca"])) {
    $Marca = $_POST["Marca"];
    $delete1 = "DELETE FROM `masini` WHERE Marca = '$Marca'";
    $result = mysqli_query($con, $delete1);

    if ($result) 
        echo "Succes ati sters o masina!";
    else
        echo 'Eroare!';
}

if(isset($_POST["Nume"])) {
    $NumeClient = $_POST["Nume"];
    $delete2 = "DELETE FROM `clienti` WHERE Nume = '$Nume'";
    $result = mysqli_query($con, $delete2);

    if ($result) 
        echo "Succes ati sters un client!";
    else
        echo 'Eroare!';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Records</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="topnav">
    <a href="add_user.php">Adaugare Masina si Angajat</a>
    <a href="updateb.php">Updateaza Masina si Client</a>
    <a class="active" href="delete.php">Eliminare Masina si Client</a>
    <a href="simple.php">Interogari</a>
</div>

<div class="container">
    <form method="post" class="delete-form">
        <h2>Stergere Masina</h2>
        <input type="text" name="Marca" placeholder="Marca">
        <button type="submit">Stergere Masina</button>
    </form>

    <form method="post" class="delete-form">
        <h2>Stergere Client</h2>
        <input type="text" name="Nume" placeholder="Nume">
        <button type="submit">Stergere Client</button>
    </form>
</div>

<a href="login.php" class="previous">&laquo; Logout</a>

</body>
</html>


<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.topnav {
    background-color: #FFFFFF;
    overflow: hidden;
    width: 100%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.topnav a {
    float: left;
    color: #1F0EB3;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover {
    background-color: #1F0EB3;
    color: white;
}

.topnav a.active {
    background-color: #1F0EB3;
    color: white;
}

.container {
    background-color: white;
    margin-top: 20px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

.delete-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.delete-form h2 {
    text-align: center;
    color: #333;
}

.delete-form input,
.delete-form button {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
}

.delete-form button {
    background-color: #dc3545;
    color: white;
    border: none;
    cursor: pointer;
}

.delete-form button:hover {
    background-color: #c82333;
}

.previous {
    margin-top: 20px;
    color: #1F0EB3;
    text-decoration: none;
}

.previous:hover {
    color: #0056b3;
}

</style>
