<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "upload";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if(isset($_POST['search'])){
        $searchterm = $_POST['search'];
        $searchterm = preg_replace("#[^0-9a-z]#i", "", $searchterm);

        $term = mysqli_query($conn,"SELECT id, content, title, publicity FROM post WHERE Title LIKE '%$searchterm%' OR content LIKE '%$searchterm%' ") or die("Couldn't find stuff");

        $count = mysqli_num_rows($term);

        if($count == 0){
            $out = "There were no search results";
        }
        else{
            while($row = mysqli_fetch_array($term)){
                if($row["publicity"] != 0){
                    echo "<div class='post'><img img src='Generic-Profile.png' alt='profile' height= 20px; width=20px;><b> John Doe:</b><br><br><i>". $row["title"]. ":</i> <br>". $row["content"]. "</div>" ;
                }
            }
        }
    
    }

    $conn->close();
?>

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
                <a href="Project.php">Home</a>
                <a href="Explore.html">Explore</a>
                <a href="Profile.html">Profile</a>
                <a href="upload.html">Upload</a>
            </div>
        </div>
            
            
        <script type="text/javascript" src="mobile.js"></script>            
    
        
         <div class="end_footer">
            Contact us!<br>
            Send us an <a href= "mailto:writely@gmail.com">e-mail!</a><br>
        <small><i>Copyright &copy; 2020 Writely</i></small><br> </div>
        
    </div>
    </div>  
    </body>
</html>