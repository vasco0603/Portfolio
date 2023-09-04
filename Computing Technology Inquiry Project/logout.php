<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Login Page" />
    <meta name="keywords" content="login"/>
    <meta name="author" content="Michael Haryanto, Phuthai, Narongdech, Roshaan, Hirad"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Cabin:wght@700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300;1,400&family=Pacifico&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Camera Purchase Web Application Login</title>
</head>

<body id="logoutpage">
    <?php
        include_once "includes/header.inc";
        if (isset($_SESSION['user'])){
            echo "<section id='logoutbody'>";
            echo "<a href='index.php'><img src='images/logowhite.png' alt='picflixLogo' id='logoutpicflixlogo'></a>";
            echo "<p id='logoutpar'>We're sad to see you leave, please visit us again soon</p>";
            echo "<form action='index.php' method='post'>";
            echo "<input type='submit' value='Back to Index Page'>";
            echo "</form>";
            echo "</section>";
            include_once "includes/footer.inc";
            $_SESSION = array();
            session_destroy();
        }
        else{
            header("location: login.php");

        }
    ?>
</body>
