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
    <title>Camera Purchase Web Application Register</title>
</head>

<body id="registerpage">
    <?php
    include_once "includes/header.inc";

    require_once "settings.php";
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    #insert data from register
    $sql_table = "users";
    function sanitise_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //haven't used the errormessage and validation of the inputs
    $errmsg1 = "";
    $errmsg2 = "";
    $errmsg3 = "";
    $errmsg4 = "";
    if (isset($_POST["regfname"])){
        $regfname = $_POST["regfname"];
        $regfname = sanitise_input($regfname);
        if ($regfname == ""){
            $errmsg1 = "<p class=\"errmsg\">You must enter your First Name</p>";
        }
        else if (!preg_match("/^[a-zA-Z]*$/", $regfname)){
            $errmsg1 = "<p class=\"errmsg\">Your First Name doesn't look right. Please Try Again</p>";
        }
    }

    if (isset($_POST["reglname"])){
        $reglname = $_POST["reglname"];
        $reglname = sanitise_input($reglname);
        if ($reglname == ""){
            $errmsg2 = "<p class=\"errmsg\">You must enter your Last Name</p>";
        }
        else if (!preg_match("/^[a-zA-Z]*$/", $reglname)){
            $errmsg2 = "<p class=\"errmsg\">Your Last Name doesn't look right. Please Try Again</p>";
        }
    }

    if (isset($_POST["regemail"])){
        $regemail = $_POST["regemail"];
        $regemail = sanitise_input($regemail);
        $emailcheckquery = "select * from $sql_table where username='$regemail'";
        $emailcheck = mysqli_query($conn,$emailcheckquery);
        if ($regemail == ""){
            $errmsg3 = "<p class=\"errmsg\">You must enter your Email Address</p>";
        }
        else if (!filter_var($regemail, FILTER_VALIDATE_EMAIL)){
            $errmsg3 = "<p class=\"errmsg\">Your Email Address doesn't look right. Please Try Again</p>";
        }
        else if (mysqli_fetch_assoc($emailcheck)){
            $errmsg3 = "<p class=\"errmsg\">The Email Address is Taken. Please try another Email Address</p>";
        }

    }

    if (isset($_POST["regpwd"])){
        $regpwd = $_POST["regpwd"];
        $regpwd = sanitise_input($regpwd);
        if ($regpwd == ""){
            $errmsg4 = "<p class=\"errmsg\">You must enter your Account Password</p>";
        }
    }

    if (isset($_POST["regpart"])){
        $regpart = $_POST["regpart"];
        $regpart = sanitise_input($regpart);
    }

    //remmeber to use rrmsg and below is the else if there are no err msg
    //for testing purposes we use the isset
    if (isset($_POST["regfname"]) && ($errmsg1=="") && ($errmsg2=="") && ($errmsg3=="") && ($errmsg4=="")){
        $insertquery = "insert into $sql_table (fname, lname, username, pwd, part) values ('$regfname','$reglname','$regemail','$regpwd','$regpart')";

        $result = mysqli_query($conn, $insertquery);
        //chheck if the execution was successful
        //this is still prototype not yet final
        if (!$result){
            echo "<p class=\"wrong\">Something is wrong with ", $insertquery , "</p>";
        }

        else{
            #echo "<p class=\"ok\">Successfully added a user </p>";
            header ("location: login.php");
        }
    }

    mysqli_close($conn);
    ?>

    <section id="registerbody">
        <h2 id="registerhead">Register</h2>
        <h3 id="registersubhead">Join us and shop all cameras you want!</h3>
        <hr>
        <form action="register.php" method="post" novalidate>
            <input type="hidden" value="0" id="regpart" name="regpart">
            <div id="regnamesection">
                <h2>Name</h2>
                <h3><label for="regfname">First Name</label></h3>
                <input type="text" id="regfname" name="regfname" placeholder="Enter First Name"
                <?php
                    if($errmsg1=="" && $errmsg2=="" && $errmsg3=="" && $errmsg4==""){
                        echo "value=''";
                    }
                    else if (isset($regfname) && $errmsg1==""){
                        echo "value=$regfname";
                    }
                ?>
                >
                <?php
                    if ($errmsg1!=""){
                        echo $errmsg1;
                    }
                ?>

                <h3><label for="reglname">Last Name</label></h3>
                <input type="text" id="reglname" name="reglname" placeholder="Enter Last Name"
                <?php
                    if($errmsg1=="" && $errmsg2=="" && $errmsg3=="" && $errmsg4==""){
                        echo "value=''";
                    }
                    else if (isset($reglname) && $errmsg2==""){
                        echo "value=$reglname";
                    }
                ?>
                >
                <?php
                    if ($errmsg2!=""){
                        echo $errmsg2;
                    }
                ?>
            </div>

            <div id="regemailsection">
                <h2>Email</h2>
                <h3><label for="regemail">Email Address</label></h3>
                <input type="email" id="regemail" name="regemail" placeholder="Enter Email Address"
                <?php
                    if($errmsg1=="" && $errmsg2=="" && $errmsg3=="" && $errmsg4==""){
                        echo "value=''";
                    }
                    else if (isset($regemail) && $errmsg3==""){
                        echo "value=$regemail";
                    }
                ?>
                >
                <?php
                    if ($errmsg3!=""){
                        echo $errmsg3;
                    }
                ?>
            </div>

            <div id="regpwdsection">
                <h2>Password</h2>
                <input type="password" id="regpwd" name="regpwd" placeholder="Enter Desired Account Password"
                <?php
                    if($errmsg1=="" && $errmsg2=="" && $errmsg3=="" && $errmsg4==""){
                        echo "value=''";
                    }
                    else if (isset($regpwd) && $errmsg4==""){
                        echo "value=$regpwd";
                    }
                ?>
                >
                <?php
                    if ($errmsg4!=""){
                        echo $errmsg4;
                    }
                ?>
            </div>

            <input type="submit" value="Create Account">

        </form>
    </section>

    <?php
    include_once "includes/footer.inc";
    ?>

</body>
