<?php
//This file is used to connect newly registered users into the database, "accounts" under the table "users". This form is used alongside account_creation.php.


//TODO: 
//(1)create two instances of password for validation
//(2)check to make sure username doesnt already exist
//(3)check if email is already in the database. email must be unique
//(4)validate email address by sending an email to new user


//get values from account creation page
$username=$POST['username'];
$firstname=$POST['firstname'];
$lastname=$POST['lastname'];
$email=$POST['email'];
$password=$POST['password'];

//check for entry error
if(!empty($username)){
    if(!empty($firstname)){
        if(!empty($lastname)){
            if(!empty($email)){
                if(!empty($password)){ //if all entries are filled,
                    $host = "localhost";
                    $dbuser="root";
                    $dbpass="";
                    $dbname="accounts";
                    
                    //create connection
                    $conn= new mysqli($host,$dbuser,$dbpass.$dbname);
                    
                    //check for successful connection
                    //connection failed
                    if(mysqli_connect_error()){
                        die('Connect Error ('.mysqli_connect_errno() .')'.mysqli_connect_error());
                    }
                    else{//connection successful
                        $sql="INSERT INTO users(username,firstname,lastname,email,password) values('$username','$firstname','$lastname','$email','$password')";
                        if($conn->query($sql)){//successfuly inserted
                            echo "Sign-up was successful!Welcome to Wordly";
                        }
                        else{//insertion error
                            echo "Error: ". $sql ."<br>". $conn->error;
                            
                        }
                        //close connection from databse
                        $conn->close();
                    }
                }
                else{//password entry error
                    echo "Password should not be left empty.";
                    die();
                    
                }
            }
            else{//email entry error
                echo "Email should not be left empty.";
                die();
            }
        }
        else{//lastname entry error
            echo "Last name should not be left empty.";
            die();    
        }
        
    }
    else{//first name entry error
        echo "First name should not be left empty.";
        die();
    }
}
else{//username entry error
    echo "username should not be left empty.";
    die();
    
}
?>