<?php
if(isset($_GET['vkey'])){
    //continue verifying
    $vkey = $_GET['vkey'];
    
    //connect to DB
    $host = "localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="accounts";
    
    //create connection
    $conn= new mysqli($host,$dbuser,$dbpass,$dbname);
    
    $resultSet = $mysqli->query("SELECT verified, vkey FROM accounts WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");
    
    //validate
    if($resultSet->num_rows == 1){
        //validate user email and update DB
        $update = $mysqli->query("UPDATE accounts SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
        
        //send message to user
        if($update){
            echo "Your Wordly account has been verified! Login to start creating with us.";
        }
        else{//error
            echo "An error occured: ";
            echo $mysqli->error;
        }
    }
    else{//cannot validate
     echo "This is super awkward but, either this account is invalid or it was already verified :/";   
    }
}
else{//something happened :(
    die("This is totally awkward but, your verification key is invalid... :/");
}

?>