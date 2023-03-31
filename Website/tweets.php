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
        <li><a href="index.php">Homepage</a></li>
        <li><a href="tweets.php">Tweets</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="profile.php">Account</a></li>
    </ul>
</nav>


<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

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
