<ul>
    <li><a href="product.php">Products</a></li>
    <li><a href="payment.php">Enquire</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="index.php">Home</a></li>
    <?php
        session_start();
        if (isset($_SESSION['user'])){
            if ($_SESSION['part']==1){
                echo '<li><a href="manager.php">Manager</a></li>';
            }
        echo '<li><a href="logout.php">Logout</a></li>';
        }
        else{
            echo '<li><a href="login.php">Login</a></li>';
            session_destroy();
        }

    ?>

</ul>
