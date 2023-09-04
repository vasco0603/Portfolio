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

<body id="loginpage">
    <!--Header Banner Logo and Navigation Bar-->
    <?php
        include_once "includes/header.inc";

        require_once "settings.php";
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if (!$conn){
            echo "<p>Database Connect Failure</p>";
        }
        else{
            //echo "<p>Database connect Success </p>";
            $query = "CREATE TABLE IF NOT EXISTS users (
                user_id INT AUTO_INCREMENT PRIMARY KEY,
                fname VARCHAR(20),
                lname VARCHAR(20),
                username VARCHAR(50),
                pwd VARCHAR(20),
                part INT
                )";
            $result = mysqli_query($conn, $query);


            #insert data from register
            $sql_table = "users";
            function sanitise_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $errmsg1 = "";
            $errmsg2 = "";
            if (isset($_POST["logemail"])){
                $logemail = $_POST["logemail"];
                $logemail = sanitise_input($logemail);
                $logemailcheckquery = "select * from $sql_table where username='$logemail'";
                $logemailcheck = mysqli_query($conn, $logemailcheckquery);
                if ($logemail==""){
                    $errmsg1 = "<p class=\"errmsg\">You must enter your account Email Address</p>";
                }
                else if (!filter_var($logemail, FILTER_VALIDATE_EMAIL)){
                    $errmsg1 = "<p class=\"errmsg\">The Email Address Entered doesn't look right. Please Try Again</p>";
                }

                else if (!mysqli_fetch_assoc($logemailcheck)){
                    $errmsg1 = "<p class=\"errmsg\">Wrong Email Address Entered</p>";
                }
            }

            if (isset($_POST["logpwd"])){
                $logpwd = $_POST["logpwd"];
                $logpwd = sanitise_input($logpwd);
                $logpwdcheckquery = "select * from $sql_table where username='$logemail' and pwd='$logpwd'";
                $logpwdcheck = mysqli_query($conn, $logpwdcheckquery);
                if ($logpwd==""){
                    $errmsg2 = "<p class=\"errmsg\">You must enter your account Email Address</p>";
                }
                else if (!mysqli_fetch_assoc($logpwdcheck)){
                    $errmsg2 = "<p class=\"errmsg\">Wrong Email Address or Password Entered</p>";
                }
            }

            if (isset($logpwd) && isset($logemail) && $errmsg1=="" && $errmsg2==""){
                #session_set_cookie_params(10);
                session_start();
                $getpartquery = "select * from $sql_table where username='$logemail' and pwd='$logpwd'";
                $getparttable = mysqli_query($conn, $getpartquery);
                $getpart = mysqli_fetch_assoc($getparttable);
                $part = $getpart["part"];
                $_SESSION['user']=$logemail;
                $_SESSION['part']=$part;
                if ($part == 0){
                    header ("location: payment.php");
                }
                else if ($part == 1){
                    header ("location: manager.php");
                }
            }
            mysqli_close($conn);
        }
    ?>


    <!--login form -->
    <section id="loginbody">
        <h2 id="loginhead">Login</h2>
        <h3 id="loginsubhead">Enter your details to sign in to your account</h3>
        <hr>
        <form action="login.php" method="post" novalidate>
            <input type="text" name="logemail" id="logemail" placeholder="Enter account email"
            <?php
                if($errmsg1=="" && $errmsg2==""){
                    echo "value=''";
                }
                else if (isset($logemail)){
                    echo "value=$logemail";
                }
            ?>
            >
            <?php
             if ($errmsg1!=""){
                echo $errmsg1;
             }
            ?>
            <input type="password" name="logpwd" id="logpwd" placeholder="Enter account password"
            <?php
                if($errmsg1=="" && $errmsg2==""){
                    echo "value=''";
                }
                else if (isset($logpwd)){
                    echo "value=$logpwd";
                }
            ?>
            >
            <?php
             if ($errmsg2!=""){
                echo $errmsg2;
             }
            ?>
            <input type="submit" value="Sign in">
        </form>

        <p id="register">Don't have an account? <a href="register.php" id="registerhyperlink">Sign Up Now For Free!</a></p>

        <p id="logincopyright">Copyright &copy;2022 &#124; Privacy Policy </p>
    </section>

    <?php
        include_once "includes/footer.inc";
    ?>
</body>
</html>
