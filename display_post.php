<?php
include('session.php');
include('comments.php');

if (!isset($_SESSION['login_user'])) {
    header("location: account_creation.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="lorem.js"></script>
    <link rel="stylesheet" href="main.css">
    <!-- next link is for the star rating system -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                        <li><a href="upload.php">Upload</a></li>
                        <li><a> Welcome, <?php echo $login_session; ?></a></li>
                        <li><a href="logout.php"> Logout</a></li>
                    </ul>
                </nav>
                <form action="searchresults.php" method="post">
                    <input type="text" name="search" placeholder="Search posts">
                    <input type="submit" value="Go">
                </form>
            </header>
            <script type="text/javascript" src="mobile.js"></script>

            <main>

                <!-- buttons for the star rating system -->
                <div class="landing">
                    <div class="rating">
                        <input type="radio" name="star" id="star1"><label for="star1">
                        </label>
                        <input type="radio" name="star" id="star2"><label for="star2">
                        </label>
                        <input type="radio" name="star" id="star3"><label for="star3">
                        </label>
                        <input type="radio" name="star" id="star4"><label for="star4">
                        </label>
                        <input type="radio" name="star" id="star5"><label for="star5">
                        </label>
                    </div>
                </div>
                <br>
                <!-- displaying a specific post -->
                <div class="landing">
                    <div class="display_post">
                        <img img src="JerryGarcia-DEMOProfilePic.jpg" alt="profile" height=20px; width=20px;><b> Jerry Garcia:</b>
                        <div data-lorem="2-4p"></div>
                    </div>
                    <!-- COMMENT BOX! -->
                    <div class="post_comment">


                        <form action="comments.php" method="POST">

                            Enter Username:
                            <input type='text' name='username' value=''><br>
                            <textarea name='text'></textarea><br>
                            <button type='submit' name='submit'>Comment</button>
                        </form>
                    </div>



                </div>
                <!--</div>-->
                <!-- begin footer code -->
            </main>

            <div class="end_footer">
                Contact us!<br>
                Send us an <a href="mailto:writely@gmail.com">e-mail!</a><br>
                <small><i>Copyright &copy; 2020 Writely</i></small><br> </div>

        </div>
    </div>
</body>


</html>