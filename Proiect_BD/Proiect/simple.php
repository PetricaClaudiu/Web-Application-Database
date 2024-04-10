<!DOCTYPE html>
<html>
<head>
    <title>Interogari</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body style="background-color:gray">
    <div class="topnav">
        <a href="add_user.php">Adaugare Masina</a>
        <a href="updateb.php">Updateaza</a>
        <a href="delete.php">Eliminare Masina</a>
        <a class="active" href="simple.php">Interogari</a>
    </div>

    <?php
    include('connection.php');

    // Define your queries here
    $queries = [
        "SELECT Masini.Marca, Masini.Model, Vanzari.DataVanzare, Vanzari.PretVanzare
        FROM Masini
        INNER JOIN Vanzari ON Masini.MasinaID = Vanzari.MasinaID;
        ",
        "SELECT Clienti.Nume, Clienti.Prenume, Vanzari.DataVanzare, Vanzari.PretVanzare
        FROM Clienti
        LEFT JOIN Vanzari ON Clienti.ClientID = Vanzari.ClientID;
        ",
        "SELECT Masini.Marca, Masini.Model, Masini_Servicii.DataServiciu, Masini_Servicii.Detalii
        FROM Masini
        RIGHT JOIN Masini_Servicii ON Masini.MasinaID = Masini_Servicii.MasinaID;
        ",
        "SELECT Servicii.NumeServiciu, Masini.Marca, Masini.Model
        FROM Servicii
        INNER JOIN Masini_Servicii ON Servicii.ServiciuID = Masini_Servicii.ServiciuID
        INNER JOIN Masini ON Masini_Servicii.MasinaID = Masini.MasinaID;
        ",
        "SELECT Angajati.Nume, Angajati.Functie, Clienti.Nume AS NumeClient
        FROM Angajati
        LEFT JOIN Clienti ON Angajati.AngajatID = Clienti.ClientID;
        ",
        "SELECT Clienti.Nume, Clienti.Prenume, Vanzari.PretVanzare
        FROM Vanzari
        INNER JOIN Clienti ON Vanzari.ClientID = Clienti.ClientID
        WHERE Vanzari.PretVanzare > 10000;
        "
        
    ];

    foreach ($queries as $query) {
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<table border='1'><tr>";

            // Dynamically fetch table headers
            while ($fieldinfo = $result->fetch_field()) {
                echo "<th>" . $fieldinfo->name . "</th>";
            }
            echo "</tr>";

            // Fetch rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . $cell . "</td>";
                }
                echo "</tr>";
            }
            echo "</table><br>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    mysqli_close($con);
    ?>
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

table {
    border-collapse: collapse;
    margin-top: 20px;
    width: 90%;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid black;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}

    </style>