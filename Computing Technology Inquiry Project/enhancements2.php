<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Product Range Page" />
    <meta name="keywords" content="product page"/>
    <meta name="author" content="Michael Haryanto, Phuthai, Narongdech, Roshaan, Hirad"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Cabin:wght@700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300;1,400&family=Pacifico&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Camera Purchase Web Product Range</title>
</head>

<body>
    <?php
        include_once "includes/header.inc";
    ?>

    <!--enhancements Page Body-->
    <section id="enhancebody">
        <section class="enhanceblock">
            <div>
                <h2 class="enhanceheader">Enhancement 1<hr></h2>
                <h2 class="enhanceheader">Login Page</h2>
                <p class="enhanceparagraph">The login page acts as a requirement of a regular purchase website, in which the user has to be logged in before being able to place an order towards the table. The Manager page can only be accessed as well if an admin account has been inputted into the login page, in which the Manager Admin will be redirected to manager.php after logging in with a manager account.</p>
                
            </div>
        </section>
        <section class="enhanceblock">
            <div id="enhancelist">
                <h2 class="enhanceheader">Enhancement 2<hr></h2>
                <h2 class="enhanceheader">Register Page</h2>
                <p class="enhanceparagraph">The register page creates a purchase account for the user if they didn't have an account for purchase, in which their First Name, Last Name, Email Address, and Account Password can be inputted into the sql table.</p>
            </div>
        </section>
    </section>
    <!--End of enhancements body page-->
    <?php
        include_once "includes/footer.inc";
    ?>
</body>
</html>