<html>
<head>
    <title>Baza</title>
    <style>
        form {
            margin-bottom: 10px;
        }
        #form {
            background-color: #c0c0c0;
            padding: 10px;
            margin-left: 20px;
            border-bottom: dotted;
        }
        #add {
            background-color: #c0c0c0;
            padding: 10px;
            cursor: pointer;
        }
        body {
            background-color: #e3e7e6;
        }
    </style>
</head>
<body>

<?php 
    $host = '127.0.0.1';
    $username = 'pwelkier';
    $password = '03Patryk#!';
    $database = 'pwelkier';
    
    $connection = mysqli_connect($host, $username, $password, $database);
    
    if (!$connection) {
        die('Connection error: ' . mysqli_connect_error());
    }

    // Obsługa dodawania nowego studenta
    if(isset($_GET["p1"])) {
        $imie = $_GET["imie"];
        $nazwisko = $_GET["nazwisko"];
        $wiek = $_GET["wiek"];
        $insertQuery = "INSERT INTO student(imie, nazwisko, wiek) VALUES ('$imie', '$nazwisko', '$wiek')";
        $resultInsert = mysqli_query($connection, $insertQuery);

        if (!$resultInsert) {
            die('Insert query error: ' . mysqli_error($connection));
        }
    }

    // Obsługa usuwania studenta
    if(isset($_GET["p2"])) {
        $id = $_GET["id"];
        $deleteQuery = "DELETE FROM student WHERE id = $id";
        $resultDelete = mysqli_query($connection, $deleteQuery);

        if (!$resultDelete) {
            die('Delete query error: ' . mysqli_error($connection));
        }
    }

    // Obsługa edycji studenta
    if(isset($_GET["p3"]) && $_GET["p3"] == "OK") {
        $editedID = $_GET["id"];
        $editedImie = $_GET["imie"];
        $editedNazwisko = $_GET["nazwisko"];
        $editedWiek = $_GET["wiek"];

        $updateQuery = "UPDATE student SET imie='$editedImie', nazwisko='$editedNazwisko', wiek='$editedWiek' WHERE id='$editedID'";
        $resultUpdate = mysqli_query($connection, $updateQuery);

        if (!$resultUpdate) {
            die('Update query error: ' . mysqli_error($connection));
        }
    }

    $selectQuery = "SELECT * FROM student";
    $result = mysqli_query($connection, $selectQuery);

    if (!$result) {
        die('Invalid query: ' . mysqli_error($connection));
    }
?>
    <div id="form">
<?php
    while($row = mysqli_fetch_assoc($result)) {
        echo "<form action='8.php' method='get'>";
        echo $row['id']." ".$row['imie']." ".$row['nazwisko']." ".$row['wiek'];
        echo " <input type='submit' name='p2' value='KASUJ'>";
        echo " <input type='submit' name='p3' value='EDYTUJ'>";
        echo " <input type='hidden' name='id' value='".$row['id']."'>";
        echo "</form>";

        // Formularz do edycji (widoczny tylko po naciśnięciu "EDYTUJ")
        if(isset($_GET["p3"]) && $_GET["p3"] == "EDYTUJ" && $_GET["id"] == $row['id']) {
            echo "<form action='8.php' method='get'>";
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
            echo "Edytuj: ";
            echo "<input type='text' name='imie' value='".$row['imie']."'>";
            echo "<input type='text' name='nazwisko' value='".$row['nazwisko']."'>";
            echo "<input type='text' name='wiek' value='".$row['wiek']."'>";
            echo "<input type='submit' name='p3' value='OK'>";
            echo "<input type='submit' name='p3' value='ANULUJ'>";
            echo "</form>";
        }
    }
?>
    </div>
    <div id="add">
<?php
    // Formularz do dodawania nowego studenta
    echo "<form action='8.php' method='get'>";
    echo "<input type='text' name='imie'>";
    echo "<input type='text' name='nazwisko'>";
    echo "<input type='text' name='wiek'>";
    echo "<input type='submit' name='p1' value='DODAJ'>";
    echo "</form>";
?>
    </div>
<?php
    mysqli_close($connection);
?>
</body>
</html>
