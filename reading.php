<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: account_creation.php");
}
?>


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
                    <li><a href="Profile.php">Profile</a></li>
                    <li><a href="writing.php">Upload</a></li>
                    <li><a> Welcome, <?php echo $login_session; ?></a></li>
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
        



        
        <div id="readingwrapper">
        
            
            <div id="post">
                <p1></p1> <!--this is for the output of the text variable from the other page-->
            </div>
                
            <br>
            <br>
            
            
            <br>       
                

            <form action="upload.php" method="POST">
                <p>
                    Title: <input id="titlebox" name="title">
                </p>

                <br>

                <p>
                    Post Status:
                </p>

                <input type='radio' name='publicity' value='1' required>Public
                <input type="radio" name='publicity' value='0' required>Private
                
                <br>   
                <br>

                <p>
                    Tags:<input id="titlebox" name="tags">
                </p>
                

                <input type="text" id="content" name="content" required style="visibility: hidden;" ><br>
                <input class="button" id="submitbtn" type="submit" style="float:none;"></input>
            </form>

            
        </div>

        

    
        
        
        <div class="end_footer">
            Contact us!<br>
            Send us an <a href= "mailto:writely@gmail.com">e-mail!</a><br>
            <small><i>Copyright &copy; 2020 Writely</i></small><br> </div>
            
    </div>
    </div>  
    </body>

    <script>
        function fillInput(){
            var reading = sessionStorage.getItem("writing");
        
            //setting the reading variable to the p tag
            $(document).ready(function(){
                $("p1").html(reading);
                $('#content').val(reading);
            });
        }
    </script>

</html>

