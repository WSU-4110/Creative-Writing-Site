<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="lorem.js"></script>
        <link rel="stylesheet" href="main.css">
        <title>Writely</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
    </head>
    <body>
        <div id="page-container">
        <div id="content-wrap">

        <header>
            <div id="logo">Writely</div>
            <nav>
                <ul class="nav__links">
                    <li><a href="Project.html">Home</a></li>
                    <li><a href="Profile.html">Profile</a></li>
                    <li><a href="upload.html">Upload</a></li>
                    <li><a href="account_creation.html">Sign-Up</a></li>
                </ul>
            </nav>
            <input type="text" placeholder="Search..">
        </header>
        
        <div id="mobile__menu" class="overlay">
            <a class="close" onclick="closeNav()">&times;</a>
            <div class="overlay__content">
                <a href="Project.php">Home</a>
                <a href="Explore.html">Explore</a>
                <a href="Profile.html">Profile</a>
                <a href="upload.html">Upload</a>
            </div>
        </div>
            
        <div class ="side_bar">
            Check out other writers:<br>
            <img img src="Generic-Profile.png" alt="profile" height= 20px; width=20px;><b> <a href= >John Doe </a></b><br>
            <img img src="Generic-Profile.png" alt="profile" height= 20px; width=20px;><b> <a href= >John Doe </a></b><br>
            <img img src="Generic-Profile.png" alt="profile" height= 20px; width=20px;><b> <a href= >John Doe </a></b><br>
            <img img src="Generic-Profile.png" alt="profile" height= 20px; width=20px;><b> <a href= >John Doe </a></b><br>
            <img img src="Generic-Profile.png" alt="profile" height= 20px; width=20px;><b> <a href= >John Doe </a></b><br>
        </div>
            
        <script type="text/javascript" src="mobile.js"></script>
        
        
            
            
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "upload";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, content, Title, Publicity FROM post";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                
                while($row = $result->fetch_assoc()) {
                    if($row["Publicity"] != 0){
                        echo "<div class='post'><img img src='Generic-Profile.png' alt='profile' height= 20px; width=20px;><b> John Doe:</b><br><br><i>". $row["Title"]. ":</i> <br>". $row["content"]. "</div>" ;
                    }
                    
                }
            } else {
                echo "0 results";
            }

            $conn->close();
        ?>
            
        
        
        <div class="post">
            <img img src="Generic-Profile.png" alt="profile" height= 20px; width=20px;><b> Jane Doe:</b>
            <div data-lorem="2-4p"></div>
        </div>
        
         <div class="end_footer">
            Contact us!<br>
            Send us an <a href= "mailto:writely@gmail.com">e-mail!</a><br>
        <small><i>Copyright &copy; 2020 Writely</i></small><br> </div>
        
    </div>
    </div>  
    </body>
</html>