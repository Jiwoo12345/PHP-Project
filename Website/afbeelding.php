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
        <li><a href="afbeelding.php">Post Afbeelding</a></li>
        <li><a href="show_image.php">Afbeelding</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="ingelogd.php">Ingelogd</a></li>
        <li><a href="profile.php">Account</a></li>
    </ul>
</nav>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Create a database connection object using object-oriented programming
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "chirpify";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for errors in the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the file information
    $fileName = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileError = $_FILES['image']['error'];
    $fileSize = $_FILES['image']['size'];

    // Check if the file is a valid image
    $validTypes = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($fileType, $validTypes)) {
        echo "Invalid file type. Please upload a JPEG, PNG, or GIF image.";
        exit();
    }

    // Check if the file was uploaded successfully
    if ($fileError !== UPLOAD_ERR_OK) {
        echo "Error uploading file.";
        exit();
    }

    // Move the file to the desired directory
    $uploadDir = "images/";
    $uploadFile = $uploadDir . basename($fileName);
    if (move_uploaded_file($fileTmpName, $uploadFile)) {
        // Insert the file information into the database using prepared statements
        $stmt = $conn->prepare("INSERT INTO tweet_image (filename, filepath) VALUES (?, ?)");
        $stmt->bind_param("ss", $fileName, $uploadFile);
        if ($stmt->execute()) {
            echo "Image uploaded successfully.";
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Error uploading file.";
    }
}

// Close the database connection
$conn->close();
?>


</Body>
</Html>
