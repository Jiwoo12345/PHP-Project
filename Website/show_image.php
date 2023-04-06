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
        <li><a href="chirpify.php">Chirpify</a></li>
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
ini_set('display_errors', 'On');


$servername = "localhost";
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "chirpify";

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check for errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the file path from the database
$sql = "SELECT filepath FROM tweet_image WHERE id = 2";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$filePath = $row['filepath'];

// Display the image
echo "<img src=\"$filePath\" height='200px'>";


?>

</Body>
</Html>
