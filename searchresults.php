<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: account_creation.php");
}
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
        <div style="text-align: -webkit-center;">

        <header>
            <div id="logo">Writely</div>
            <nav>
                <ul class="nav__links">
                    <li><a href="Project.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="writing.php">Upload</a></li>
                    <li><a> Welcome, <?php echo $login_session; ?></a></li>
                    <li><a href= "logout.php"> Logout</a></li>
                </ul>
            </nav>

            <form action="searchresults.php" method="post">
                <input type="text" name="search" placeholder="Search posts">
                <input type="submit" value="Go"> 
            </form>

        </header>
        

        <div style="text-align: center; width: 50%;">
            <div style="font-size: 30px; border-bottom: solid black 1.5px;">
                <br>Search Results<br>
            </div>
        </div>
        
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

                $term = mysqli_query($conn,"SELECT id, content, title, tags, publicity FROM post WHERE title LIKE '%$searchterm%' OR content LIKE '%$searchterm%' OR tags LIKE '%$searchterm%'") or die("Couldn't find stuff");

                $count = mysqli_num_rows($term);

                if($count == 0){
                    $out = "There were no search results";
                }
                else{
                    while($row = mysqli_fetch_array($term)){
                        if($row["publicity"] != 0){
                            echo "<div class='post' style='width:40%'><img img src='Generic-Profile.png' alt='profile' height= 20px; width=20px;><b> John Doe:</b><br><br><i>". $row["title"]. ":</i> <br>". $row["content"]. "</div>" ;
                        }
                    }
                }
            
            }

            $conn->close();
        ?>
            
            
        <script type="text/javascript" src="mobile.js"></script>            
    
        <br>
        <br>
        <div class="end_footer" >
            Contact us!<br>
            Send us an <a href= "mailto:writely@gmail.com">e-mail!</a><br>
            <small><i>Copyright &copy; 2020 Writely</i></small><br> 
        </div>
        
    </div>
    </div>  
    </body>
</html>