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
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Formularz</title>
	//	<script>
	//	function sprawdzImie() {
     //       var imie = document.getElementById("imie").value;
	//		
     //       var regex = /^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]{0,99}$/;
	//		var button=document.getElementById("button");
			
    //         //if(imie.length >= 100){
	//			//	document.getElementById("error1").textContent = "Przekroczonu //limit znaków";
	//			//	button.disabled=true;
	//		 //}
	//		  if (!regex.test(imie)) {
      //          document.getElementById("imie").style.backgroundColor = "yellow";
		//		document.getElementById("imie").style.color = "black";
    //            document.getElementById("error1").textContent = "To nie jes prawdziwe imię";
	//			button.disabled=true;
    //        } else {
    //            document.getElementById("imie").style.backgroundColor = "white";
    //            document.getElementById("error1").textContent = "";
	//			button.disabled=false;
    //       }
	//	}
	//	 function sprawdzNazwisko() {
    //        var nazwiskoInput = document.getElementById("nazwisko");
    //        var nazwisko = nazwiskoInput.value;
    //          var regex = /^[A-Z][a-z]{0,149}([-]{1}[A-Z][a-z]{0,149})?$/;
    //        var button = document.getElementById("button");

    //        if (!regex.test(nazwisko)) {	
     //           document.getElementById("error2").textContent = "To nie może być prawdziwe nazwisko";
    //            nazwiskoInput.style.backgroundColor = "yellow";
    //            nazwiskoInput.style.color = "black";
    //            button.disabled = true; // Wyłącz przycisk "Submit"
    //        } else {
    //            document.getElementById("error2").textContent = "";
    //            nazwiskoInput.style.backgroundColor = "white";
    //            nazwiskoInput.style.color = "black";
    ///            button.disabled = false; // Włącz przycisk "Submit"
    //        }
    //    }
	//	function sprawdzMiejscowosc() {
    //        var miejscowoscInput = document.getElementById("miejscowosc");
     //       var miejscowosc = miejscowoscInput.value;
     //       var regex = /^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]{0,99}$/;
     //       var button = document.getElementById("button");

       //     if (!regex.test(miejscowosc)) {
    //            document.getElementById("error3").textContent = "To nie może być prawdziwa miejscowość";
    //            miejscowoscInput.style.backgroundColor = "yellow";
    //            miejscowoscInput.style.color = "black";
    //            button.disabled = true;
    //        } else {
    //            document.getElementById("error3").textContent = "";
    //            miejscowoscInput.style.backgroundColor = "white";
    //            miejscowoscInput.style.color = "black";
	//           button.disabled = false;
    //        }
    //    }
	//	function sprawdzNrTelefonu() {
    // var telefonInput = document.getElementById("telefon");
    //   var telefon = telefonInput.value;
    //	var regex = /^\d+$/;
    //	var button = document.getElementById("button");

    //if (!regex.test(telefon)) {
    //    document.getElementById("error4").textContent = "Nr telefonu składa się z samych cyfr";
    //    telefonInput.style.backgroundColor = "yellow";
    //    telefonInput.style.color = "black";
    //    button.disabled = true;
    //} else {
    //    document.getElementById("error4").textContent = "";
    //    telefonInput.style.backgroundColor = "white";
    //    telefonInput.style.color = "black";
    //    button.disabled = false;
    //}
	//	</script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #szary-div {
            background-color: grey;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        #legend {
            font-weight: bold;
            font-size: 35px;
            text-align: center;
            padding: 5px;
            color: white;
            background-color: grey;
            border: 2px dotted pink;
            margin-bottom: 20px;
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

    <div id="szary-div">
        <div id="legend" style="border: 2px dotted pink;"><legend> Formularz użytkownika:</legend></div>
        <form id="formularz" method="post" action="7.php">
            <ol>
                <li>Imię: <input type="text" name="imie" id="imie" oninput="sprawdzImie()" maxlength="150" required>*</li>
                <p id="error1" style="color: pink"></p>
                <li>Nazwisko: <input type="text" name="nazwisko" id="nazwisko" oninput="sprawdzNazwisko()" maxlength="300" required>*</li>
                <p id="error2" style="color: pink"></p>
                <li>Hasło: <input type="password" name="haslo" placeholder="Hasło ma posiadać od 5 do 50 znaków" minlength="5" maxlength="50" required size="50">*</li>
                <li>Miejscowość: <input type="text" name="miejscowosc" id="miejscowosc" oninput="sprawdzMiejscowosc()" maxlength="300" required>*</li>
                <p id="error3" style="color: pink"></p>
                <li>Nr. domu: <input type="number" name="numer_domu" maxlength="150" required>*</li>
                <li>Nr. mieszkania: <input type="number" name="numer_mieszkania" maxlength="50"></li>
                <li>Województwo: <select name="Województwo" required>
                        <option>zachodnio-pomorskie</option>
                        <option>pomorskie</option>
                        <option>warmińsko-mazurskie</option>
                        <option>podlaskie</option>
                        <option>mazowieckie</option>
                        <option>kujawsko-pomorskie</option>
                        <option>wielkopolskie</option>
                        <option>lubuskie</option>
                        <option>dolno-śląskie</option>
                        <option>łódzkie</option>
                        <option>lubelskie</option>
                        <option>świętokrzyskie</option>
                        <option>opolskie</option>
                        <option>śląskie</option>
                        <option>małopolskie</option>
                        <option>podkarpackie</option>
                    </select>*</li>
                <li>Data urodzenia: <input type="date" name="data_urodzenia"></li>
                <li>Nr. Telefonu: <input type="tel" name="telefon" id="telefon" oninput="sprawdzNrTelefonu()" maxlength="50" required>*</li>
                <p id="error4" style="color: pink"></p>
                <li>E-mail: <input type="email" name="adres" maxlength="350" required>*</li>
                <div class="row">
                    <li>Uwagi: <textarea type="text" name="komentarz" rows="3" cols="30" maxlength="150" minlength="0"> </textarea></li>
                </div>
                <li>Prawo Jazdy: <input type="checkbox" name="Prawo_jazdy"></li>
                <li>Płeć:</li>
                <input type="radio" name="plec" value="K">Kobieta
                <input type="radio" name="plec" value="M"> Mężczyzna
                <input type="radio" name="plec" value="I"> Inne
            </ol> <br>
            <button type="submit" id="button">Prześlij</button><br><br>
            * - pole obowiązkowe
        </form>
    </div>
</body>

</html>
