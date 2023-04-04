<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="chirpify.css">

<form method="POST">
    Text<input type="text" name="content">
    <br>
    Naam<input type="text" name="username">
    <input type="submit" value="Send">
    <button name="delete" class="delete-button"><i style="font-size:24px" class="fa">&#xf014;</i></button>
    <br>
    <button name="like" class="like-button"><i style="font-size:24px" class="fa">&#xf087;</i></button>
    <button name="dislike" class="dislike-button"><i style="font-size:24px" class="fa">&#xf165;</i></button>
</form>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$dsn = "localhost";
$username = "root";
$password = "root";


try {
    $conn = new PDO("mysql:host=$dsn;dbname=chirpify", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed " . $e->getMessage();
}

if(isset($_POST["content"])){
    $tweet_maken = $conn->prepare("INSERT INTO chirp (tweets, username)
                       VALUES('{$_POST["content"]}', '{$_POST["username"]}')");
    $tweet_maken->execute();
}

if(isset($_POST["like"])){
    $tweet_liken = "UPDATE chirp SET liken = liken + 1 WHERE id";
    $likes_kijken = $conn->query($tweet_liken);
}

if(isset($_POST["dislike"])){
    $tweet_disliken = "UPDATE chirp SET disliken = disliken + 1 WHERE id";
    $dislikes_Kijken = $conn->query($tweet_disliken);
}

if(isset($_POST["delete"])){
    $tweet_deleten = "DELETE FROM chirp WHERE id";
    $deletes_kijken = $conn->exec($tweet_deleten);
}
?>