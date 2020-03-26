<?php
$content = $_POST['content'];
$title = $_POST['title'];
$publicity = $_POST['publicity'];



$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "upload";
//create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

else {
    $insert = "INSERT Into post (content, Title, Publicity) VALUES ('$content', '$title', '$publicity')";
    //Prepare statement

    $stmt = $conn -> prepare($insert);
    $stmt -> bind_param("sss", $content, $title, $publicity);
    $stmt -> execute();

    echo "New record created successfully";



}


die();

?>