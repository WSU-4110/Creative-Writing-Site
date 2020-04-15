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
        <script src ="file.js"></script>
        <link rel="stylesheet" href="upload.css">
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
        <script type="text/javascript" src="mobile.js"></script>
	   <!--<h1>Jerry Garcia</h1>-->
		 <div class="side_bar">
             <p><Strong><?php echo $login_session; ?></Strong></p>
                 <main class="uploadmain">
                
                    <button id='headerbtn'>Add bio</button> 
            
                    
                     
                     
        <div id="editor" contenteditable="true" data-text="Enter text here..." required></div>
                <!--scripts to handle the text formatting buttons-->
                <script>
                    $(document).ready(function(){
                        $("#editor").hide();
                        $(".uploadtable").hide();
                        $("#submitbtn").hide();
                        $("#fileupload").hide();

                        $('#headerbtn').on('click', function(){
                            $(".uploadtable").fadeToggle(100);
                            $("#editor").fadeToggle(100);                            
                            $("#submitbtn").fadeToggle(100);
                            $("#uploadbtn").fadeToggle(100);
                            $(".uploadwrapper, .uploadwrapper2").toggleClass("uploadwrapper uploadwrapper2");
                        })
                        

                        $("#uploadbtn").on('click', function(){
                            $("#fileupload").fadeToggle(300);
                            $("#headerbtn").fadeToggle(300);
                            $("#submitbtn").fadeToggle(300);
                        })


                        //buttons for text editor
                        $('#boldbtn').on('click', function(){
                            $('#editor').focus();
                            document.execCommand('bold');
                            $(this).toggleClass("gray");
                        });

                        $('#italicbtn').on('click', function(){
                            $('#editor').focus();
                            document.execCommand('italic');                            
                            $(this).toggleClass("gray");
                        });

                        $('#underbtn').on('click', function(){
                            $('#editor').focus();
                            document.execCommand('underline');                            
                            $(this).toggleClass("gray");
                        });

                        $("#fs").change(function(){
                            $('#editor').css("font-family", $(this).val());
                            $('#editor').focus();
                        });

                        $("#size").change(function(){
                            $('#editor').css("font-size", $(this).val() + "px");
                            $('#editor').focus();
                        });

                        $("#submitbtn").click(function(){
                            var writing = $("#editor").html();
                            sessionStorage.setItem("writing", writing);

                            $(document).ready(function(){
                                $("#content").val(writing);
                            });
                            
                            if(writing == ""){
                                alert("Text box cannot be blank");
                                return false;
                            }

                        });
                    });
                    
                    
                    
                </script>






            </main>   
			 
	  	</div>
		
        
		<div class="post">
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
        	</div>
        
	  <div style="text-align: center;">
            <?php
                $id = isset($_GET['content']) ? $_GET['content'] : '';
                
                $host = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbname = "bio";
                //create connection
                $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
                
                if (mysqli_connect_error()) {
                    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
                } 

                else {
                $insert = "INSERT Into bio (content) VALUES ('$content')";
                //Prepare statement
                
                $stmt = $conn->prepare($insert);
                $stmt->bind_param("s", $content);
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
        
        </div>
        </div>  
    </body>
   

</html>