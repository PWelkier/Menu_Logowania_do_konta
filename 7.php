<?php
session_start();
if (!isset($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"]) {
    header("Location: index.php");
    exit();
}

function logout()
{
    $_SESSION["isLoggedIn"] = false;
    header("Location: index.php");
    exit();
}

$imie = isset($_POST['imie']) ? $_POST['imie'] : '';
$nazwisko = isset($_POST['nazwisko']) ? $_POST['nazwisko'] : '';
$haslo = isset($_POST['haslo']) ? $_POST['haslo'] : '';
$miejscowosc = isset($_POST['miejscowosc']) ? $_POST['miejscowosc'] : '';
$numer_domu = isset($_POST['numer_domu']) ? $_POST['numer_domu'] : '';
$numer_mieszkania = isset($_POST['numer_mieszkania']) ? $_POST['numer_mieszkania'] : '';
$wojewodztwo = isset($_POST['Województwo']) ? $_POST['Województwo'] : '';
$data_urodzenia = isset($_POST['data_urodzenia']) ? $_POST['data_urodzenia'] : '';
$telefon = isset($_POST['telefon']) ? $_POST['telefon'] : '';
$adres = isset($_POST['adres']) ? $_POST['adres'] : '';
$komentarz = isset($_POST['komentarz']) ? $_POST['komentarz'] : '';
$prawo_jazdy = isset($_POST['Prawo_jazdy']) ? 'Tak' : 'Nie';
$plec = isset($_POST['plec']) ? $_POST['plec'] : '';
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Podsumowanie danych</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
			background-color:#556b2f;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin-bottom: 20px;
			background-color:#19a56f;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        #logout-button {
            background-color: #ff0000;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #logout-button:hover {
            background-color: #cc0000;
        }
    </style>
</head>

<body>
    <form method="post" action="logout.php">
        <button type="submit" id="logout-button">Wyloguj</button>
    </form>

    <h2>Podsumowanie danych</h2>
    <table>
        <tr>
            <th>Jakie dane:</th>
            <th>Te dane:</th>
        </tr>
        <tr>
            <td>Imię</td>
            <td><?php echo $imie; ?></td>
        </tr>
        <tr>
            <td>Nazwisko</td>
            <td><?php echo $nazwisko; ?></td>
        </tr>
        <tr>
            <td>Hasło</td>
            <td><?php echo $haslo; ?></td>
        </tr>
        <tr>
            <td>Miejscowość</td>
            <td><?php echo $miejscowosc; ?></td>
        </tr>
        <tr>
            <td>Nr. domu</td>
            <td><?php echo $numer_domu; ?></td>
        </tr>
        <tr>
            <td>Nr. mieszkania</td>
            <td><?php echo $numer_mieszkania; ?></td>
        </tr>
        <tr>
            <td>Województwo</td>
            <td><?php echo $wojewodztwo; ?></td>
        </tr>
        <tr>
            <td>Data urodzenia</td>
            <td><?php echo $data_urodzenia; ?></td>
        </tr>
        <tr>
            <td>Nr. Telefonu</td>
            <td><?php echo $telefon; ?></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><?php echo $adres; ?></td>
        </tr>
        <tr>
            <td>Uwagi</td>
            <td><?php echo $komentarz; ?></td>
        </tr>
        <tr>
            <td>Prawo Jazdy</td>
            <td><?php echo $prawo_jazdy; ?></td>
        </tr>
        <tr>
            <td>Płeć</td>
            <td><?php echo $plec; ?></td>
        </tr>
    </table>

</body>

</html>
