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
    </div>
</div>
<div class="landing">
    <div class="display_post">
        <?php


        $host = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "accounts";
        $conn = new mysqli($host, $dbuser, $dbpass, $dbname);


        $sql = "SELECT username, textt FROM comments";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "" . $row["username"] . " Says:  " . $row["textt"] . "<br><br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</div>