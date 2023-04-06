<!Doctype Html>
<Html lang="en">
<Head>
    <Title>Login</Title>
    <link rel="stylesheet" href="main.css">
</Head>

<Body>

<nav>
    <img class="website-logo" src="images/PHP-Project_Logo.png" alt="Logo">
    <ul>
        <li><a href="index.php">Homepage</a></li>
        <li><a href="tweets.php">Tweets</a></li>
        <li><a href="afbeelding.php">Post Afbeelding</a></li>
        <li><a href="show_image.php">Afbeelding</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="ingelogd.php">Ingelogd</a></li>
        <li><a href="profile.php">Account</a></li>
    </ul>
</nav>


<form method="POST">
    <label for="user">Gebruikersnaam:</label>
    <input type="text" id="user" name="gebruikersnaam">
    <br>
    <label for="e-mail">Email:</label>
    <input type="email" id="e-mail" name="email">
    <br>
    <label for="ww">Wachtwoord:</label>
    <input type="password" id="ww" name="wachtwoord">
    <br>
    <input type="submit" value="Login">
</form>


<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if(isset($_POST["gebruikersnaam"])){
    $servername = "localhost";
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=chirpify", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Successfully logged in";
    } catch(PDOException $e) {
        echo "Failed to log in" . $e->getMessage();
    }


    $x = $conn->prepare("INSERT INTO users (gebruikersnaam, email, wachtwoord)
                    VALUES('{$_POST["gebruikersnaam"]}', '{$_POST["email"]}', '{$_POST["wachtwoord"]}')");

    $x->execute();
}
?>

</Body>
</Html>




