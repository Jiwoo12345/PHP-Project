<!Doctype Html>
<Html lang="en">
<Head>
    <Title>Homepage</Title>
    <link rel="stylesheet" href="main.css">
</Head>

<Body>

<nav>
    <img class="website-logo" src="images/PHP-Project_Logo.png" alt="Logo">
    <ul>
        <li><a href="index.php">Homepage</a></li>
        <li><a href="tweets.php">Tweets</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="ingelogd.php">Ingelogd</a></li>
        <li><a href="profile.php">Account</a></li>
    </ul>
</nav>


<form method="POST">
    <label for="wat">Wat:</label>
    <input type="text" id="wat" name="content">
    <br>
    <label for="username">Naam:</label>
    <input type="text" id="username" name="username">
    <br>
    <input type="submit" value="Tweet">
</form>


<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if(isset($_POST["content"])){
    $servername = "localhost";
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=chirpify", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }


    $x = $conn->prepare("INSERT INTO tweets (content, username)
                    VALUES('{$_POST["content"]}', '{$_POST["username"]}')");

    $x->execute();
}
?>

</Body>
</Html>