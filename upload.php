<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="reading.css">
        <script  src="jquery-3.4.1.js"></script>
        <script type="text/javascript" src="mobile.js"></script>
        <title>Writely</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
    </head>


    <body onload="fillInput()">
        <div id="page-container">
        <div id="content-wrap">
        <header>
            <div id="logo">Writely</div>
            <nav>
                <ul class="nav__links">
                    <li><a href="Project.php">Home</a></li>
                    <li><a href="Profile.html">Profile</a></li>
                    <li><a href="upload.html">Upload</a></li>
                    <li><a href="account_creation.html">Sign-Up</a></li>
                </ul>
            </nav>

            <form action="searchresults.php" method="post">
                <input type="text" name="search" placeholder="Search posts">
                <input type="submit" value="Go"> 
            </form> 
            
        </header>
        
        <div id="mobile__menu" class="overlay">
            <a class="close" onclick="closeNav()">&times;</a>
            <div class="overlay__content">
                <a href="Project.html">Home</a>
                <a href="Profile.html">Profile</a>
                <a href="upload.html">Upload</a>
            </div>
        </div>


        <div style="text-align: center;">
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
                    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
                } 

                else {
                $insert = "INSERT Into post (content, Title, Publicity) VALUES ('$content', '$title', '$publicity')";
                //Prepare statement
                
                $stmt = $conn->prepare($insert);
                $stmt->bind_param("sss", $content, $title, $publicity);
                $stmt->execute();
                    
                echo "New record created successfully";
                
                
                
                }


                die();

            ?>
        </div>


        <div class="end_footer">
            Contact us!<br>
            Send us an <a href= "mailto:writely@gmail.com">e-mail!</a><br>
            <small><i>Copyright &copy; 2020 Writely</i></small><br> </div>
            
    
    
    </body>

