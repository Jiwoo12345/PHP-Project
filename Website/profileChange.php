<!DOCTYPE html>
<html>
<head>
    <title>Change Profile</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<nav>
    <img class="website-logo" src="images/PHP-Project_Logo.png" alt="Logo">
    <ul>
        <li><a href="chirpify.php">Homepage</a></li>
        <li><a href="tweets.php">Tweets</a></li>
        <li><a href="afbeelding.php">Post Afbeelding</a></li>
        <li><a href="show_image.php">Afbeelding</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="ingelogd.php">Ingelogd</a></li>
        <li><a href="profileChange.php">Profiel</a></li>
    </ul>
</nav>

<div class="Main-opmaak">
    <h1>Profiel bewerken</h1>
    <br>
    <form method="POST">
        <label for="naam">Naam: </label>
        <input type="text" id="naam" name="gebruikersnaampje">
        <br>
        <label for="email">Email: </label>
        <input type="text" id="emailtje" name="emailtje">
        <br>
        <label for="wachtwoord">Wachtwoord: </label>
        <input type="password" id="wachtwoordje" name="wachtwoordje">
        <br>
        <input type="submit" value="Change">
    </form>
</div>

<footer>© 2023 AJ</footer>

</body>
</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=chirpify", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
};
if (isset($_POST["gebruikersnaampje"])) {
    $bewerkt_naam = $_POST['gebruikersnaampje'];
    $bewerkt_email = $_POST["emailtje"];
    $bewerkt_wachtwoord = $_POST["wachtwoordje"];
    $profiel_bewerken = $conn->prepare("UPDATE users SET gebruikersnaam = '$bewerkt_naam',
        email = '$bewerkt_email', wachtwoord = '$bewerkt_wachtwoord'");
    $profiel_shown = $profiel_bewerken->execute();
}
?>