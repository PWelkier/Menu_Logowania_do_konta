<?php
session_start();
if (!isset($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"]) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
	<style>
		body{
			padding:50px;
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
    <div class="dashboard-container">
    <ol>
			
			<li>Linki do stron z zadania z Tabelami:</li>
			<ul>
			<li><a href="http://patrykwelkier.cba.pl/zad4.php" target="_blank">strona z 1 zadaniem</a></li>
			<li><a href="http://patrykwelkier.cba.pl/zad5.php" target="_blank">strona z 2 zadaniem</a></li>
			<li><a href="http://patrykwelkier.cba.pl/zad6.php" target="_blank">strona z 3 zadaniem</a></li>
			</ul>
			<li>Link do Formularza:</li>
			<ul>
			<li><a href="http://patrykwelkier.cba.pl/zad7.php" target="_blank">strona z Formularzem</a></li>
			</ul>
			<li> Link do Kalkultora:</li>
			<ul>
			<li><a href="http://patrykwelkier.cba.pl/zad8.php" target="_blank">strona z Prostym Kalkulatorem</a></li>
			</ul>
			<li> Link do zadania z baza danych</li>
			<ul> 
				<li><a href="http://patrykwelkier.cba.pl/8.php" target="_blank">strona z baza danych</a></li>
			</ul>
			
			
			</ol>
        <p>Zalogowano pomyślnie!</p>
        <form method="post" action="logout.php">
            <button type="submit" id="logout-button">Wyloguj</button>
        </form>
    </div>
</body>
</html>
