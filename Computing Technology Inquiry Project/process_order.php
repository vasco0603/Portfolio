<?php
   session_start();
    if (isset($_SESSION['user'])){
        $useremail = $_SESSION['user'];
        echo $useremail;
        require_once "settings.php";
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn){
            echo "database connection failure";
        }
        else
        {

            function sanitise_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            /*declaring variables*/
            if (isset($_POST["title"])){
                $title = $_POST["title"];
            }

            if (isset($_POST["firstname"])){
                $fname = sanitise_input($_POST["firstname"]);
                $errfname = "";
                if ($fname == ""){
                    $errfname = "<p class=\"errmsg\">Required Field</p>";
                }
                else if (!preg_match("/^[a-zA-Z]*$/", $fname)){
                    $errfname = "<p class=\"errmsg\">Invalid First Name</p>";
                }
                echo $errfname;
            }
            else{
                header("location: payment.php");
            }

            if (isset($_POST["lastname"])){
                $lname = sanitise_input($_POST["lastname"]);
                $errlname = "";
                if ($lname == ""){
                    $errlname = "<p class=\"errmsg\">Required Field</p>";
                }
                else if (!preg_match("/^[a-zA-Z]*$/", $lname)){
                    $errlname = "<p class=\"errmsg\">Invalid Last Name</p>";
                }
                echo $errlname;
            }

            if (isset($_POST["street"])){
                $street = sanitise_input($_POST["street"]);
                $errstreet = "";
                if ($street == ""){
                    $errstreet = "<p class=\"errmsg\">Required Field</p>";
                }
                else if (!preg_match('/[^a-z_\-0-9]/i', $street)){
                    $errstreet = "<p class=\"errmsg\">Invalid Street</p>";
                }
                echo $errstreet;
            }

            if (isset($_POST["town"])){
                $town = sanitise_input($_POST["town"]);
                $errtown = "";
                if ($town == ""){
                    $errtown = "<p class=\"errmsg\">Required Field</p>";
                }
                else if (!preg_match("/[a-zA-Z]+$/", $town)){
                    $errtown = "<p class=\"errmsg\">Invalid Town</p>";
                }
                echo $errtown;
            }

            if (isset($_POST["state"]) && isset($_POST["postcode"])){
                $state = $_POST["state"];
                $postcode = sanitise_input($_POST["postcode"]);
                $errpcode = "";
                if ($postcode == ""){
                    $errpcode = "<p class=\"errmsg\">Required Field</p>";
                }
                else if (!preg_match("/^[0-9]{4}$/", $postcode)){
                    $errpcode = "<p class=\"errmsg\">Invalid Post Code</p>";
                }
                else if ($state == "VIC"){
                    if ($postcode >= 3000 && $postcode <= 3999 || $postcode >= 8000 && $postcode <= 8999){
                        $errpcode = "";
                    }
                    else{
                        $errpcode = "<p class=\"errmsg\">Postcode Mismatch</p>";
                    }
                }
                else if ($state == "NSW"){
                    if ($postcode >= 1000 && $postcode <= 2599 || $postcode >= 2619 && $postcode <= 2899 || $postcode >= 2921 && $postcode <= 2999){
                        $errpcode = "";
                    }
                    else{
                        $errpcode = "<p class=\"errmsg\">Postcode Mismatch</p>";
                    }
                }
                else if ($state == "QLD"){
                    if ($postcode >= 4000 && $postcode <= 4999 || $postcode >= 9000 && $postcode <= 9999){
                        $errpcode = "";
                    }
                    else{
                        $errpcode = "<p class=\"errmsg\">Postcode Mismatch</p>";
                    }
                }
                else if ($state == "NT"){
                    if ($postcode >= 0800 && $postcode <= 0999){
                        $errpcode = "";
                    }
                    else{
                        $errpcode = "<p class=\"errmsg\">Postcode Mismatch</p>";
                    }
                }

                else if ($state == "WA"){
                    if ($postcode >= 6000 && $postcode <= 6797 || $postcode >= 6800 && $postcode <= 6999){
                        $errpcode = "";
                    }
                    else{
                        $errpcode = "<p class=\"errmsg\">Postcode Mismatch</p>";
                    }
                }

                else if ($state == "SA"){
                    if ($postcode >= 5000 && $postcode <= 5999){
                        $errpcode = "";
                    }
                    else{
                        $errpcode = "<p class=\"errmsg\">Postcode Mismatch</p>";
                    }
                }

                else if ($state == "TAS"){
                    if ($postcode >= 7000 && $postcode <= 7999){
                        $errpcode = "";
                    }
                    else{
                        $errpcode = "<p class=\"errmsg\">Postcode Mismatch</p>";
                    }
                }
                else if ($state == "ACT"){
                    if ($postcode >= 0200 && $postcode <= 0299 || $postcode >= 2600 && $postcode <= 2618 || $postcode >= 2900 && $postcode <= 2920){
                        $errpcode = "";
                    }
                    else{
                        $errpcode = "<p class=\"errmsg\">Postcode Mismatch</p>";
                    }
                }
                echo $errpcode;

            }

            if (isset($_POST["email"])){
                $email = sanitise_input($_POST["email"]);
                $erremail = "";
                if ($email == ""){
                    $erremail = "<p class=\"errmsg\">Required Field</p>";
                }
                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $erremail = "<p class=\"errmsg\">Invalid Email Address</p>";
                }
                echo $erremail;
            }

            if (isset($_POST["number"])){
                $number = sanitise_input($_POST["number"]);
                $number = str_replace(' ', '', $number);
                $errnumber = "";
                if ($number == ""){
                    $errnumber = "<p class=\"errmsg\">Required Field</p>";
                }
                else if (!preg_match("/^[0-9]{10}+$/", $number)){
                    $errnumber = "<p class=\"errmsg\">Invalid Phone Number</p>";
                }
                echo $errnumber;
            }

            if (isset($_POST["preferredcontact"])){
                $prefer = $_POST["preferredcontact"];
            }

            if (isset($_POST["commentfield"])){
                $comment = sanitise_input($_POST["commentfield"]);
            }

            if (isset($_POST["cardtype"])){
                $cardtype = $_POST["cardtype"];
            }

            if (isset($_POST["cardname"])){
                $cardname = sanitise_input($_POST["cardname"]);
                $errcardname = "";
                if ($cardname == ""){
                    $errcardname = "<p class=\"errmsg\">Required Field</p>";
                }
                else if (!preg_match("/[a-zA-Z]+$/", $cardname)){
                    $errcardname = "<p class=\"errmsg\">Invalid CC Name</p>";
                }
                echo $errcardname;
            }

            if (isset($_POST["cardnumber"]) && (isset($_POST["cardtype"]))){
                $cardnumber = sanitise_input($_POST["cardnumber"]);
                $cardtype = $_POST["cardtype"];
                $cardnumber = str_replace(' ', '', $cardnumber);
                $errcardnumber = "";
                if ($cardnumber == ""){
                    $errcardnumber = "<p class=\"errmsg\">Required Field</p>";
                }#change according to if cardtype
                else if ($cardtype == "a" & !preg_match("/^4[0-9]{12}(?:[0-9]{3})?$/", $cardnumber)){
                    $errcardnumber = "<p class=\"errmsg\">Invalid Visa CC Number</p>";
                }
                else if ($cardtype == "b" & !preg_match("/^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$/", $cardnumber)){
                    $errcardnumber = "<p class=\"errmsg\">Invalid Mastercard CC Number</p>";
                }
                else if ($cardtype == "c" & !preg_match("/^3[47][0-9]{13}$/", $cardnumber)){
                    $errcardnumber = "<p class=\"errmsg\">Invalid American Express CC Number</p>";
                }
                else if (strlen($cardnumber)<15 || strlen($cardnumber) > 16){
                    $errcardnumber = "<p class=\"errmsg\">Invalid CC Number Length</p>";
                }

                if ($cardtype == "a"){
                    $cctype = "Visa";
                }
                else if ($cardtype == "b"){
                    $cctype = "Mastercard";
                }
                else if ($cardtype == "c"){
                    $cctype = "American Express";
                }
                echo $errcardnumber;
            }

            if (isset($_POST["cardexp"])){
                $cardexp = sanitise_input($_POST["cardexp"]);
                $errcardexp = "";
                if ($cardexp != ""){
                    $arrcardexp = explode('/',$cardexp);
                    $month = $arrcardexp[0];
                    $year = $arrcardexp[1];
                }
                if ($cardexp == ""){
                    $errcardexp = "<p class=\"errmsg\">Required Field</p>";
                }
                else if (!preg_match("/^(0[1-9]|1[012])\/([0-9]{2})$/", $cardexp)){
                    $errcardexp = "<p class=\"errmsg\">Invalid CC Expiry Date</p>";
                }
                else if ($month > 12 || $year < 22){
                    $errcardexp = "<p class=\"errmsg\">Invalid CC Expiry Date</p>";
                }
                echo $errcardexp;
            }

            if (isset($_POST["cardcvv"])){
                $cardcvv = sanitise_input($_POST["cardcvv"]);
                $errcardcvv = "";
                if ($cardcvv == ""){
                    $errcardcvv = "<p class=\"errmsg\">Required Field</p>";
                }
                else if (!preg_match("/^[0-9]{3}$/", $cardcvv)){
                    $errcardcvv = "<p class=\"errmsg\">Invalid CC CVV</p>";
                }
                echo $errcardcvv;
            }

            if (isset($_POST["producttypeenquire"]) && (isset($_POST["productidenquire"]))){
                $prodtype = $_POST["producttypeenquire"];
                $prodid = $_POST["productidenquire"];
                $errprod = "";
                $checktypequery = "select * from product where prodtype='$prodtype' and product_id='$prodid'";
                $checktype = mysqli_query($conn, $checktypequery);
                if (!mysqli_fetch_assoc($checktype)){
                    $errprod = "<p class=\"errmsg\">Product Type Mismatch</p>";
                }
                else{
                    $pricegetquery = "select product_id, price from product where product_id='$prodid'";
                    if ($prodid == 1){
                        $prodname = "Canon Powershot G7X Mark III Digital Camera";
                    }
                    else if ($prodid == 2){
                        $prodname = "Sony Cyber-shot DSC-RX100 VII";
                    }
                    else if ($prodid == 3){
                        $prodname = "Sony A1";
                    }
                    else if ($prodid == 4){
                        $prodname = "Sony A9 II";
                    }
                    else if ($prodid == 5){
                        $prodname = "Nikon D7500";
                    }
                    else if ($prodid == 6){
                        $prodname = "Canon EOS R10";
                    }
                    else if ($prodid == 7){
                        $prodname = "Panasonic HCx1500";
                    }
                    else if ($prodid == 8){
                        $prodname = "Panasonic HCx2000";
                    }
                    $priceget = mysqli_query($conn, $pricegetquery);
                    $priceprod = mysqli_fetch_assoc($priceget);
                    $productprice = $priceprod["price"];
                }
                echo $errprod;
            }

            if (isset($_POST["productquantity"])){
                $quantity = sanitise_input($_POST["productquantity"]);
                $errquantity = "";
                if ($quantity == ""){
                    $errquantity = "<p class=\"errmsg\">Required Field</p>";
                }
                else if (!is_numeric($quantity)){
                    $errquantity = "<p class=\"errmsg\">Invalid Quantity</p>";
                }
                else if ($quantity < 1){
                    $errquantity = "<p class=\"errmsg\">Invalid Quantity</p>";
                }
                echo $errquantity;
            }

            if (isset($_POST["feature"])){
                $feature = $_POST["feature"];
                $fpricea = 1000;
                $fpriceb = 120;
                $fpricec = 180;
                if (count($feature) == 1){
                    if ($feature[0] == "a"){
                        $featureprice = $fpricea;
                        $featurename = "Built-in Lens";
                    }
                    else if ($feature[0] == "b"){
                        $featureprice = $fpriceb;
                        $featurename = "Extra Memory Card Socket";
                    }
                    else if ($feature[0] == "c"){
                        $featureprice = $fpricec;
                        $featurename = "Extra Replacable Battery";
                    }
                }
                else if (count($feature) == 2){
                    if ($feature[0] == "a" && $feature[1] == "b"){
                        $featureprice = $fpricea + $fpriceb;
                        $featurename = "Built-in Lens, Extra Memory Card Socket";
                    }
                    else if ($feature[0] == "a" && $feature[1] == "c"){
                        $featureprice = $fpricea + $fpricec;
                        $featurename = "Built-in Lens, Extra Replacable Battery";
                    }
                    else if ($feature[0] == "b" && $feature[1] == "c"){
                        $featureprice = $fpriceb + $fpricec;
                        $featurename = "Extra Memory Card Socket, Extra Replacable Battery";
                    }
                }
                else if (count($feature) == 3){
                    $featureprice = $fpricea + $fpriceb + $fpricec;
                    $featurename = "Built-in Lens, Extra Memory Card Socket, Extra Replacable Battery";
                }
            }
            else{
                $featureprice = 0;
                $featurename = NULL;
            }

            if (isset($_POST["firstname"]) && ($errfname == "") && ($errlname == "") && ($errstreet == "") && ($errtown == "") && ($erremail == "") && ($errnumber == "") && ($errcardname == "") && ($errcardnumber == "") && ($errcardexp == "") && ($errcardcvv == "") && ($errprod == "") && ($errquantity == "") && ($errpcode == "")){
                echo "<p>no error</p>";
                $createquery = "CREATE TABLE IF NOT EXISTS orders (
                    order_id INT AUTO_INCREMENT PRIMARY KEY,
                    order_status VARCHAR(15),
                    order_acc VARCHAR(50),
                    order_cost INT,
                    order_date VARCHAR(20),
                    title VARCHAR(5),
                    fname VARCHAR(20),
                    lname VARCHAR(20),
                    email VARCHAR(40),
                    street VARCHAR(40),
                    town VARCHAR(20),
                    stateadd VARCHAR(4),
                    pcode INT,
                    phone VARCHAR(15),
                    prefer VARCHAR(10),
                    comment VARCHAR(120),
                    prodtype VARCHAR(20),
                    prodname VARCHAR(60),
                    quantity INT,
                    feature VARCHAR(80),
                    cctype VARCHAR(20),
                    ccname VARCHAR(40),
                    ccnum VARCHAR(20),
                    ccexp VARCHAR(6),
                    cccvv INT
                    )";

                $createtable = mysqli_query($conn, $createquery);
                #counting the price cost
                $totalcost = ($quantity*$productprice) + ($quantity*$featureprice);
                #orderstatus pending
                $orderstatus = "PENDING";
                #order time
                $date = date("d/m/y");
                #feature and product name
                $insertorderquery = "insert into orders values (NULL, '$orderstatus', '$useremail', '$totalcost', '$date', '$title', '$fname', '$lname', '$email', '$street', '$town', '$state', '$postcode', '$number', '$prefer', '$comment', '$prodtype', '$prodname', '$quantity', '$featurename', '$cctype', '$cardname', '$cardnumber', '$cardexp', '$cardcvv')";

                $insertorder = mysqli_query($conn, $insertorderquery);
                if (!$insertorder){
                    echo "<p class=\"wrong\">Something is wrong with ", $insertorderquery , "</p>";
                }
                else{
                    echo "<p class=\"true\">can</p>";
                    $getidquery = "SELECT * FROM `orders` ORDER BY `order_id` DESC";
                    $getidtable = mysqli_query($conn, $getidquery);
                    $getid = mysqli_fetch_assoc($getidtable);
                    $newestid = $getid["order_id"];
                    //echo $newestid;
                    header ("location: receipt.php?orderid=$newestid");
                    mysqli_free_result($getidtable);
                }
            }
            else{
                echo "<p>Error</p>";
                header("location: fix_order.php?errfname=$errfname&errlname=$errlname&errstreet=$errstreet&errtown=$errtown&erremail=$erremail&errnumber=$errnumber&errcardname=$errcardname&errcardnumber=$errcardnumber&errcardexp=$errcardexp&errcardcvv=$errcardcvv&errprod=$errprod&errquantity=$errquantity&errpcode=$errpcode&fname=$fname&lname=$lname&email=$email&street=$street&town=$town&state=$state&number=$number&prefer=$prefer&comment=$comment&prodtype=$prodtype&prodid=$prodid&quantity=$quantity&feature=$feature&postcode=$postcode");

            }
            mysqli_close($conn);
        }
    }
    else{
        header ("location: login.php");
    }
?>
