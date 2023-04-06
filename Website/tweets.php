<!Doctype Html>
<Html lang="en">
<Head>
    <Title>Tweets</Title>
    <link rel="stylesheet" href="main.css">
</Head>

<Body>

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

<footer>© 2023 AJ</footer>


<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=chirpify", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$x = $conn->prepare("SELECT * FROM tweets");

$x->execute();

$data = $x->fetchALL(PDO::FETCH_ASSOC);
foreach ($data as $tweet) {
    echo "<p>" . $tweet["username"] . "</p>";
    echo "<p>" . $tweet["content"] . "</p>";
}


?>

</Body>
</Html>
