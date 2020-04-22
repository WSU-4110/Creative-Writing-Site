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
$password_verify=$_POST['password_verification'];

//check for entry error
if(!empty($username) || !empty($firstName) || !empty($lastName) || !empty($email) || !empty($password) || !empty($password_verify)){

    //If passwords do not match
    if($password != $password_verify){
       $error = "Your passwords do no match"; 
    }
    //Passwords match, continue to connect to DB
    else{
    
                    $host = "localhost";
                    $dbuser="root";
                    $dbpass="";
                    $dbname="accounts";
    
                    //create connection
                    $conn= new mysqli($host,$dbuser,$dbpass,$dbname);
        
                    //if any errors occured during connection    
                     if(mysqli_connect_error()){
                        die('Connect Error ('.mysqli_connect_errno() .')'.mysqli_connect_error());
                    }
                    //NO Errors!
                    else{
                        
                         //establish verification key
                         $vkey = md5(time().$username);
        
        
                        
                        
                        //Verify USERNAME uniqueness
                        $U_SELECT = "SELECT username From accounts Where username = ? Limit 1";
                        
                        //Verify EMAIL uniqueness
                        $E_SELECT = "SELECT email From accounts Where email = ? Limit 1";
                        
                        
                        //insert statement
                        $INSERT = "INSERT Into accounts (username, password, firstName, lastName, email, vkey) VALUES ('$username','$password','$firstName','$lastName','$email','$vkey')";
                        
                        //Statement for USERNAME
                        $Ustmt = $conn->prepare($U_SELECT);
                        $Ustmt->bind_param("s", $username);
                        $Ustmt->execute();
                        $Ustmt->bind_result($username);
                        $Ustmt->store_result();
                        
                        $U_rnum = $Ustmt->num_rows;
                        
                        
                        //Statement for EMAIL
                        $Estmt = $conn->prepare($E_SELECT);
                        $Estmt->bind_param("s", $email);
                        $Estmt->execute();
                        $Estmt->bind_result($email);
                        $Estmt->store_result();
                        
                        $E_rnum = $Estmt->num_rows;
                        
                        //If both USERNAME and EMAIL are Unique,
                        //SIGN-UP SUCCESSFUL!
                        if($U_rnum == 0 && $E_rnum == 0){
                            $Ustmt->close();
                            $Estmt->close();
                            
                            $stmt = $conn->prepare($INSERT);
                            
                           // $stmt->bind_param("sssss", $username, $password, $firstName, $lastName, $email);
                            $stmt->execute();
                            
                            //email verification
                            $to = $email;
                            $subject = "WORDLY Request: Email Verification";
                            $message ="<a href='http://localhost/verify.php?vkey=$vkey'>Register Your Account</a>";
                            $headers = "From: wordly.register@gmail.com";
                            $headers .= "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            
                            mail($to,$subject,$message,$headers);
                            header('location:welcome.php');
                            
                            
                            echo "Sign up successful!";
                        }
                        //USERNAME is already in use
                        if($U_rnum != 0){
                            echo "This username is already in use! :(";
                        }
                        //EMAIL is already in use
                        if($E_rnum != 0){
                            echo "There is already an account with this email! :(";
                            
                        }
                        $Ustmt->close();
                        $conn->close();
                    }
    }
}
else{
    echo "All entries are required!";
    die();
}


?>