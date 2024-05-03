
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>
.error-message 
{
    color: red;
    margin-top: 8px;
    font-size: 14px;
}

body
 {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #618358;
}

.login-container 
{
    width: 300px;
    padding: 20px;
    border: 3px solid black;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    background-color: white;
}

h2 
{
    margin-bottom: 20px;
}

label 
{
    display: block;
    margin-bottom: 8px;
}

input 
{
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

#button
 {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover
 {
    background-color: #45a049;
}

</style>



    
    <title>Login Page</title>
</head>
<body>
<div class="login-container">
        <form method="post" action="auth.php">
            <h2>Login</h2>
            <label for="username">Login:</label>
            <input type="text" id="username" name="username" value="Patryk" required>
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" value="Welkier" required>
            <button id="button" type="submit">Zaloguj</button>

                  </form>
    </div>
</body>
</html>

