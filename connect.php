<?php
//This file is used to connect newly registered users into the database, "accounts" under the table "users". This form is used alongside account_creation.php.

//TODO: 
//(1)create two instances of password for validation
//(2)check to make sure username doesnt already exist
//(3)check if email is already in the database. email must be unique
//(4)validate email address by sending an email to new user


//get values from account creation page
$username=$_POST['username'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$email=$_POST['email'];
$password=$_POST['password'];

//check for entry error
if(!empty($username) || !empty($firstName) || !empty($lastName) || !empty($email) || !empty($password)){
    $host = "localhost";
                    $dbuser="root";
                    $dbpass="";
                    $dbname="accounts";
    
                    //create connection
                    $conn= new mysqli($host,$dbuser,$dbpass,$dbname);
                     if(mysqli_connect_error()){
                        die('Connect Error ('.mysqli_connect_errno() .')'.mysqli_connect_error());
                    }
                    else{
                        $SELECT = "SELECT username From accounts Where username = ? Limit 1";
                        $INSERT = "INSERT Into accounts (username, password, firstName, lastName, email) VALUES ('$username','$password','$firstName','$lastName','$email')";
                        
                        $stmt = $conn->prepare($SELECT);
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $stmt->bind_result($username);
                        $stmt->store_result();
                        
                        $rnum = $stmt->num_rows;
                        if($rnum == 0){
                            $stmt->close();
                            
                            $stmt = $conn->prepare($INSERT);
                           // $stmt->bind_param("sssss", $username, $password, $firstName, $lastName, $email);
                            $stmt->execute();
                            echo "Sign up successful!";
                        }
                        else{
                            echo "This username is already in use! :(";
                        }
                        $stmt->close();
                        $conn->close();
                    }
}
else{
    echo "All entries are required!";
    die();
}


?>