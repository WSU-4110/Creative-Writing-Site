<?php


$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "accounts";

$text = $POST['text'];
$username = $POST['username'];

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
//$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    $insertComment = "INSERT INTO comments (username, text) VALUES ('$username', '$text')";

    $stmt = $conn->prepare($insertComment);
    $stmt->bind_param('ss', $username, $text);
    $stmt->execute();
    //$stmt->bind_result($text);
    //$stmt->store_result();
}










function setComments()
{
    if (isset($_POST['commentSubmit'])) {
        echo 'HI THERE';
    }
}
