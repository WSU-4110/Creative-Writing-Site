<?php
include('userLogin.php');
if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="account_creation.css">
    <link rel="stylesheet" href="login.css">
    <title>Create an account: Writely</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
</head>

<body>
    <header>
        <div id="logo">Writely</div>
        <nav>
            <ul class="nav__links">
                <li><a href="Project.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="upload.php">Upload</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <form action="searchresults.php" method="post">
            <input type="text" name="search" placeholder="Search posts">
            <input type="submit" value="Go"> 
        </form> 
    </header>
    <!-- HEADER CODE FROM Project.html-->

</body>


<body>
    <div id="login_box">
        <div class="left_box">
            <h1>Start Writing Today!</h1>
            <!--buttons to input username, email, password, and verify password-->
            <form action ="connect.php" method ="POST">
            <input type="text" name="username" placeholder="username123" required />
            <input type="password" name="password" placeholder="password" required />
            <input type="password" name="password_verification" placeholder="retype password" required />
            <input type="text" name="firstName" placeholder="Jane" required/>
            <input type="text" name="lastName" placeholder="Dough" required />
            <input type="email" name="email" placeholder="email@domain.com" required />
            <!--submit button-->
            <input type="submit" name="submit" value="Sign Up" />
            <button onclick="document.getElementById('id01').style.display='block'" style="width:120px;">Login</button> 
            </form>
        </div>

        <div class="right_box">
                  <div id="id01" class="loginbackg">
                <div class="logincont animate">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    </div>

                    <div class="container">
                         <h1>Login with username!</h1>
                        <form action="userLogin.php" method="POST">
                            <input type="text" name="username" placeholder="username123" required />
                            <input type="password" name="password" placeholder="password" required />
                            <input type="submit" name="submit" value="Login" />
                        </form>
                    </div>
                </div>
            </div>
            <!--buttons for social media login-->
            <span class="Signinwith"> Sign in with social media!<br></span>
            <button class="Social facebook">Log in with Facebook</button>
            <button class="Social google">Log in with your Google Account</button>
            <button class="Social twitter">Log in with Twitter</button>
        </div>
    </div>
    <div class="end_footer">
        Contact us!<br>
        Send us an <a href="mailto:writely@gmail.com">e-mail!</a><br>
        <small><i>Copyright &copy; 2020 Writely</i></small><br> </div>


</body>

</html>