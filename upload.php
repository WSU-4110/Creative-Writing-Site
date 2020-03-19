<?php
    $content = $_POST['content'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "upload";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
    else {
     $insert = "INSERT Into post (content) VALUES ('$content')";
     //Prepare statement
     
     $stmt = $conn->prepare($insert);
     $stmt->bind_param("s", $content);
     $stmt->execute();
        echo $content;
        echo "New record created successfully";
    
    
      
    }


 die();

?>