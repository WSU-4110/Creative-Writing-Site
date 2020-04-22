<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: account_creation.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <script  src="jquery-3.4.1.js"></script>
        <script src ="file.js"></script>
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="upload.css">
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
                <a href="account_creation.html">Sign-Up</a>
            </div>
        </div>
        <script type="text/javascript" src="mobile.js"></script>
    

    

        
        <!--wrapper for the upload page-->
        <div class="uploadwrapper"> 
            <main class="uploadmain">
                <h1 id='header1'>
                    <button id='headerbtn'>WRITE</button> <button id='uploadbtn'>UPLOAD FILE</button>
                </h1>


                <!--buttons for bold and fonts and font size-->
                <table class="uploadtable">
                    <tr>
                        <th><button class="button" id="boldbtn" type="submit"><b>B</b></button></th>
                        <th><button class="button" id="italicbtn" type="submit"><i>I</i></button></th>
                        <th><button class="button" id="underbtn" type="submit"><u>U</u></button></th>
                        <th>
                            <select id="fs">
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Arial">Arial</option>
                                <option value="Verdana">Verdana</option>
                                <option value="Impact">Impact</option>
                                <option value="Comic Sans MS">Comic Sans MS</option>
                            </select>
                        </th>
                        <th>
                            <select id="size">
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="12">12</option>
                                <option value="14">14</option>
                                <option value="18">18</option>
                                <option value="20">20</option>
                                <option value="70">70</option>
                            </select>
                        </th>
                    </tr> 
                </table>
                
                <!--added this area for php functionality, divs need extra input tag to transfer 
                to sql table, going to figure out how to make it not show up-->
                    <div id="editor" contenteditable="true" data-text="Enter text here..." required></div>
                    <input type="file" id="fileupload" accept=".txt">
                    <a href="reading.php" id="submitbtn">Submit</a>
                    
                
                
                

                

                
                               
        
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
        
        <div class="end_footer">
        Contact us!<br>
        Send us an <a href= "mailto:writely@gmail.com">e-mail!</a><br>
        <small><i>Copyright &copy; 2020 Writely</i></small><br> </div>
        
    </div>
    </div>  
    </body>
</html>


