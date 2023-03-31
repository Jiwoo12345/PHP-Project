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


<form class="tweets" method="post">


    Wat:<input type="text" name="content">
    Naam:<input type="text" name="username">
    <input type="submit" value="tweet">
</form>


<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

if (isset($_POST["content"])) {

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

    $x = $conn->prepare(query: "INSERT INTO tweets (content, username)
                   VALUES('{$_POST["content"]}', '{$_POST["username"]}') ");

    $x->execute();
}
?>


</Body>
</Html>




