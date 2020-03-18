<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="account_creation.css">
    <title>Create an account: Writely</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
</head>

<body>
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
        <input type="top_text" placeholder="Search..">
    </header>
    <!-- HEADER CODE FROM Project.html-->

</body>


<body>
    <div id="login_box">
        <div class="left_box">
            <h1>Start Writing Today!</h1>
            <!--buttons to input username, email, password, and verify password-->
            <form action="connect.php" method="POST">
            <input type="text" name="username" placeholder="username123" />
            <input type ="text" name="firstname" placeholder="John" />
            <input type="text" name="lastname" placeholder="Doe" />
            <input type="text" name="email" placeholder="email@domain.com" />
            <input type="password" name="password" placeholder="password" />
            <input type="password" name="password_verification" placeholder="retype password" />
            <!--submit button-->
            <input type="submit" name="submit" value="Sign Up" />
            </form>
        </div>

        <div class="right_box">
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

    </div>
    </div>


</body>

</html>