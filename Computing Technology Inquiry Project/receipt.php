<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Product Enquiry Page" />
    <meta name="keywords" content="enquire"/>
    <meta name="author" content="Michael Haryanto, Phuthai, Narongdech, Roshaan, Hirad"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Cabin:wght@700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300;1,400&family=Pacifico&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Camera Purchase Web Application Receipt</title>
</head>

<body>
    <?php
    $id = $_GET['orderid'];


        include_once "includes/header.inc";

            require_once "settings.php";
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);


                if (!$conn){
                    //echo "<p>Database Connect Failure</p>";
                }
                else{
                    $order_id = $_GET['orderid'];
                    $query = "select * FROM orders WHERE order_id = $order_id";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        //echo "<p>Something is wrong with ", $query, "<p>";
                    } else  {
                        $row = mysqli_fetch_assoc($result);
                    }
                }

                function mask_card($number){
                    return str_repeat("*", 12) . substr($number, -4);
                }

                $card_number = mask_card("{$row["ccnum"]}");

                if ("{$row["prodname"]}" == "Canon Powershot G7X Mark III Digital Camera")
                {
                    $camera = 905;
                }
                else if ("{$row["prodname"]}" == "Sony Cyber-shot DSC-RX100 VII"){
                    $camera = 1205;
                }
                else if ("{$row["prodname"]}" == "Sony A1"){
                    $camera = 5090;
                }
                else if ("{$row["prodname"]}" == "Sony A9 II"){
                    $camera = 6205;
                }
                else if ("{$row["prodname"]}" == "Nikon D7500"){
                    $camera = 1200;
                }
                else if ("{$row["prodname"]}" == "Canon EOS R10"){
                    $camera = 1415;
                }
                else if ("{$row["prodname"]}" == "Panasonic HCx1500"){
                    $camera = 2650;
                }
                else if ("{$row["prodname"]}" == "Panasonic HCx2000"){
                    $camera = 3455;
                }
                $product_cost = $camera * "{$row["quantity"]}";


                $feature_total = "{$row["order_cost"]}" - $product_cost;


    ?>
<section class="receiptbody">
    <img src="images/logowhite.png" alt="Logo" class="logo" id="receiptlogo">
    <h2>Thanks for shopping with us.</h2>
    <h2>Your Order</h2><hr>

    <div class="">
        <p class="right"> <?php echo "$ $product_cost"?></p>
        <p><?php echo"{$row["prodname"]}";?></p>
        <p><?php echo"Quantity:&nbsp;{$row["quantity"]}";?></p><hr>
        <p class="right"> <?php echo "$ $feature_total"?></p>
        <?php echo"<p>{$row["feature"]}</p>";?>
        <p><?php echo"Quantity:&nbsp;{$row["quantity"]}";?></p><hr>
    </div>

    <div class="re_left">
        <p >Total cost: </p>
    </div>
    <div class="re_right">
        <p>$ <?php echo"{$row["order_cost"]}";?></p>
    </div>
     <h2>&nbsp;</h2><hr>


    <div class="re_left">
    <h2>&nbsp;</h2>
    <h2>Shipping Address</h2><hr>
    <?php echo"<p>{$row["title"]} {$row["fname"]} {$row["lname"]}</p>";?>
    <?php echo"<p>Street: {$row["street"]}</p>";?>
    <?php echo"<p>Suburb/Town: {$row["town"]}</p>";?>
    <?php echo"<p>{$row["stateadd"]} {$row["pcode"]}</p>";?>
    </div>
    <div class="re_right">
    <h2>&nbsp;</h2>
    <h2>Payment Details</h2><hr>
    <?php echo"<p>Card Name: {$row["ccname"]}</p>";?>
    <?php echo"<p>Card Number: $card_number</p>";?><hr>
    <?php echo"<p>Email Address: {$row["email"]}</p>";?>
    <?php echo"<p>Phone Number: {$row["phone"]}</p>";?>
    </div>
</section>
    <section class="receiptbody" id="extension">
        <div class="re_body">
            <div class="re_item">
                <p>Your order made our day! we hope we make yours.</p>
                <p>If you have any question about your order,</p>
                <p>contact us anytime. We'd love to hear from you.</p>
            </div>
            <div class="re_item">
                <a href="index.php"><img src="images/logowhite.png" alt="Logo" class="logoreceipt" id="footer_logo"></a>
                <p id="exit">(Click Here To Exit)</p>
            </div>
        </div>
    </section>

    <?php
        mysqli_free_result($result);
                        {
                            mysqli_close($conn);
                        }
        include_once "includes/footer.inc";
    ?>
</body>
</html>
