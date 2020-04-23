<?php

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "accounts";
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);


if (isset($_POST["cmtSubmit"])) {
    //echo "HOOOOOOOOOOOOWDY PARTNER";
    $text = $_POST['textt'];
    $username = $_POST['username'];

    $query = $conn->prepare("INSERT INTO comments (username, textt) VALUES (?, ?)");
    $query->bind_param("ss", $username, $text);
    $query->execute();
}
