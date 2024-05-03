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

<!DOCTYPE html>
<html>
<head>
    <title>Prosty Kalkulator</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
		background-color:pink;
    }

    .kalkulator {
        text-align: center;
        border: 2px solid black;
        border-radius: 5px;
        width: 250px;
        background-color: grey;
        padding: 10px;
    }

    input {
        width: 100%;
        height: 40px;
        font-size: 18px;
        margin-bottom: 10px;
	
    }

    button {
        width: 50px;
        height: 50px;
        font-size: 20px;
        margin: 2px;
		cursor: pointer;
    }

    .buttons {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
		
		
    }

		#logout-button {
	width: 100px;
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
	<script>
    document.addEventListener('DOMContentLoaded', function () {
        let display = document.getElementById('display');
        let buttons = document.querySelectorAll('.button');

        buttons.forEach(button => {
            button.addEventListener('click', (e) => {
                const lastChar = display.value.slice(-1);

                switch (e.target.innerText) {
                    case 'C':
                        display.value = "";
                        break;
                    case '=':
                        try {
                            display.value = eval(display.value);
                        } catch (error) {
                            display.value = 'Error';
                        }
                        break;
                    default:
                        if (isOperator(e.target.innerText)) {
                            if (isOperator(lastChar)) {
                                // Jeśli ostatni znak to operator, zastąp go nowym
                                display.value = display.value.slice(0, -1) + e.target.innerText;
                            } else {
                                display.value += e.target.innerText;
                            }
                        } else {
                            display.value += e.target.innerText;
                        }
                }
            });
        });

        function isOperator(char) {
            return char === '+' || char === '-' || char === '*' || char === '/';
        }
    });
    </script>
	
</head>
<body>
<form method="post" action="logout.php">
            <button type="submit" id="logout-button">Wyloguj</button>
</form>
    <div class="kalkulator">
        <input type="text" id="display" readonly>
        <div class="buttons">
            <button class="button">C</button>
            <button class="button">7</button>
            <button class="button">8</button>
            <button class="button">9</button>
            <button class="button">+</button>
            <button class="button">4</button>
            <button class="button">5</button>
            <button class="button">6</button>
            <button class="button">-</button>
            <button class="button">1</button>
            <button class="button">2</button>
            <button class="button">3</button>
            <button class="button">*</button>
            <button class="button">0</button>
            <button class="button">/</button>
            <button class="button">=</button>
        </div>
    </div>

    
</body>
</html>
