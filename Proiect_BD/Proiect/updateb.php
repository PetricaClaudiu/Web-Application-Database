<?php
include('connection.php');
include('functions.php');

if(isset($_POST["oldMarca"]) && isset($_POST["oldModel"]) && isset($_POST["newMarca"]) && isset($_POST["newModel"])) {
    $oldMarca = $_POST['oldMarca'];
    $oldModel = $_POST['oldModel'];
    $newMarca = $_POST['newMarca'];
    $newModel = $_POST['newModel'];

    $update1 = "UPDATE masini SET Marca='$newMarca', Model='$newModel' WHERE Marca='$oldMarca' AND Model='$oldModel'";
    $result1 = mysqli_query($con, $update1);
    if ($result1) {
        echo "Masina a fost actualizata cu succes!";
    } else {
        echo "Eroare la actualizare masina:" . mysqli_error($con);
    }
}

if(isset($_POST["Nume"]) && isset($_POST["NumarTelefon"]) && isset($_POST["newNume"]) && isset($_POST["newNumarTelefon"])) {
    $Nume = $_POST['Nume'];
    $NumarTelefon = $_POST['NumarTelefon'];
    $newNume = $_POST['newNume'];
    $newNumarTelefon = $_POST['newNumarTelefon'];

    $update2 = "UPDATE clienti SET Nume='$newNume', NumarTelefon='$newNumarTelefon' WHERE Nume='$Nume' AND NumarTelefon='$NumarTelefon'";
    $result2 = mysqli_query($con, $update2);
    if ($result2) {
        echo "Clientul a fost actualizat cu succes!";
    } else {
        echo "Eroare la actualizare client: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Car and Client</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="topnav">
    <a href="add_user.php">Adaugare Masina si Angajat</a>
    <a class="active" href="updateb.php">Updateaza Masina si Client</a>
    <a href="delete.php">Stergere Masina sau Client</a>
    <a href="simple.php">Interogari</a>
</div>

<div class="container">
    <form method="post" class="update-form">
        <h2>Actualizare Masina</h2>
        <input type="text" name="oldMarca" placeholder="Marca veche" required>
        <input type="text" name="oldModel" placeholder="Model vechi" required>
        <input type="text" name="newMarca" placeholder="Marca noua" required>
        <input type="text" name="newModel" placeholder="Model nou" required>
        <button type="submit">Actualizeaza Masina</button>
    </form>

    <form method="post" class="update-form">
        <h2>Actualizare Client</h2>
        <input type="text" name="Nume" placeholder="Nume vechi" required>
        <input type="text" name="NumarTelefon" placeholder="Numar Telefon vechi" required>
        <input type="text" name="newNume" placeholder="Nume nou" required>
        <input type="text" name="newNumarTelefon" placeholder="Numar Telefon nou" required>
        <button type="submit">Actualizeaza Client</button>
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
    height: 100vh;
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

.update-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.update-form h2 {
    text-align: center;
    color: #333;
}

.update-form input,
.update-form button {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
}

.update-form button {
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}

.update-form button:hover {
    background-color: #0056b3;
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
