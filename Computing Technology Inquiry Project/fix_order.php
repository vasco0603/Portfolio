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
    <title>Camera Purchase Web Application Enquiry</title>
</head>

<body>
    <?php
        include_once "includes/header.inc";
        if (isset($_SESSION['user'])){
            $userlogin = $_SESSION['user'];
            require_once "settings.php";
            #query string error messages
            if (isset($_GET['errfname'])){
                $errfname = $_GET['errfname'];
            }
            else{
                header("location: payment.php");
            }
            $errlname = $_GET['errlname'];
            $errstreet = $_GET['errstreet'];
            $errtown = $_GET['errtown'];
            $erremail = $_GET['erremail'];
            $errnumber = $_GET['errnumber'];
            $errcardnumber = $_GET['errcardnumber'];
            $errcardname = $_GET['errcardname'];
            $errcardexp = $_GET['errcardexp'];
            $errcardcvv = $_GET['errcardcvv'];
            $errprod = $_GET['errprod'];
            $errquantity = $_GET['errquantity'];
            $errpcode = $_GET['errpcode'];

            #query string input values
            $fname = $_GET['fname'];
            $lname = $_GET['lname'];
            $email = $_GET['email'];
            $street = $_GET['street'];
            $town = $_GET['town'];
            $state = $_GET['state'];
            $number = $_GET['number'];
            $prefer = $_GET['prefer'];
            $comment = $_GET['comment'];
            $prodtype = $_GET['prodtype'];
            $prodid = $_GET['prodid'];
            $quantity = $_GET['quantity'];
            $feature = $_GET['feature'];
            $postcode = $_GET['postcode'];

            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
            if (!$conn){
                echo "<p>Database Connect Failure</p>";
            }
            else{
                $query = "CREATE TABLE IF NOT EXISTS product (
                    product_id INT AUTO_INCREMENT PRIMARY KEY,
                    prodname VARCHAR(60),
                    prodtype VARCHAR(20),
                    price INT
                    )";
                $result = mysqli_query($conn, $query);

                #users sql data
                $sql_table = "users";
                $userquery = "select fname, lname, username from $sql_table where username='$userlogin'";
                $showuserdata = mysqli_query($conn, $userquery);

                if ($showuserdata){
                    $userrow = mysqli_fetch_assoc($showuserdata);
                    $fnameinput = $userrow["fname"];
                    $lnameinput = $userrow["lname"];
                    $emailinput = $userrow["username"];
                }


            }
        }
        else{
            header ("location: login.php");
        }

    ?>

    <form action="process_order.php" method="post" novalidate>
    <section id="enquirebody">
        <h2 class="enquirehead">Customer Details</h2><hr>

            <div id="Personal_Details_Section" class="leftele">
                <h2 class="enquiresubhead">Personal Details</h2>

                <!--Title field-->
                <h3><label for="title">Title</label><br>
                    <select name="title" id="title">
                        <option value="Mr" selected="selected">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                        <option value="Dr">Dr</option>
                    </select>
                    <p class = "errmsg"></p>
                </h3>

                <!--First Name field-->
                <h3><label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" maxlength="25" required="required" pattern="^[a-zA-Z]+$" placeholder="First Name"
                <?php
                    if ($errfname == ""){
                        echo "value='$fname'";
                    }
                ?>
                >

                <?php
                    if ($errfname != ""){
                        echo $errfname;
                    }
                ?></h3>

                <!--Last Name field-->
                <h3><label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" maxlength="25" required="required" pattern="^[a-zA-Z]+$" placeholder="Last Name"
                <?php
                    if ($errlname == ""){
                        echo "value='$lname'";
                    }
                ?>
                >

                <?php
                    if ($errlname != ""){
                        echo $errlname;
                    }
                ?></h3>

                <!--email field-->
                <h3><label for="email">Email Address</label>
                <input type="email" id="email" name="email" required="required" placeholder="name@domain.com"
                <?php
                    if ($erremail == ""){
                        echo "value='$email'";
                    }
                ?>
                >

                <?php
                    if ($erremail != ""){
                        echo $erremail;
                    }
                ?></h3>

                <!--Comment field-->
                <h3><label for="commentfield">Comment Field</label><br>
                <textarea name="commentfield" id="commentfield" placeholder="Type enquiry details here"
                <?php
                    echo "value=$comment";
                ?>
                ></textarea></h3>
            </div>


            <div id="Shipping_Address_Section" class="leftele">
                <h2 class="enquiresubhead">Shipping Address</h2>
                <!--Street field-->
                <h3><label for="street">Street</label><br><input type="text" maxlength="40" placeholder="Street" required="required" id="street" name="street"
                <?php
                    if ($errstreet == ""){
                        echo "value='$street'";
                    }
                ?>
                >
                <?php
                    if ($errstreet != ""){
                        echo $errstreet;
                    }
                ?></h3>

                <!--Town field-->
                <h3><label for="town">Suburb/Town</label><br>
                <input type="text" name="town" id="town" maxlength="20" required="required" placeholder="Town"
                <?php
                    if ($errtown == ""){
                        echo "value='$town'";
                    }
                ?>
                >
                <?php
                    if ($errtown != ""){
                        echo $errtown;
                    }
                ?></h3>

                <!--State & Post code field-->
                    <div class="flex_box">
                        <div class="flex_item">
                            <h3><label for="state">State</label><br>
                            <select name="state" id="state">
                                <?php
                                if ($errpcode == ""){
                                    echo '<option value="VIC" '.(($state=='VIC')?'selected="selected"':"").'>VIC</option>';

                                    echo '<option value="NSW" '.(($state=='NSW')?'selected="selected"':"").'>NSW</option>';

                                    echo '<option value="QLD" '.(($state=='QLD')?'selected="selected"':"").'>QLD</option>';

                                    echo '<option value="NT" '.(($state=='NT')?'selected="selected"':"").'>NT</option>';

                                    echo '<option value="WA" '.(($state=='WA')?'selected="selected"':"").'>WA</option>';

                                    echo '<option value="SA" '.(($state=='SA')?'selected="selected"':"").'>SA</option>';

                                    echo '<option value="TAS" '.(($state=='TAS')?'selected="selected"':"").'>TAS</option>';

                                    echo '<option value="ACT" '.(($state=='ACT')?'selected="selected"':"").'>ACT</option>';
                                }
                                else{
                                    echo "<option value='VIC' selected='selected'>VIC</option>
                                    <option value='NSW'>NSW</option>
                                    <option value='QLD'>QLD</option>
                                    <option value='NT'>NT</option>
                                    <option value='WA'>WA</option>
                                    <option value='SA'>SA</option>
                                    <option value='TAS'>TAS</option>
                                    <option value='ACT'>ACT</option>";
                                }
                                ?>
                            </select></h3>
                        </div>
                        <div class="flex_item">
                            <h3><label for="postcode">Post code</label><br>
                            <input type="text" placeholder="0000" name="postcode" id="postcode" required="required" pattern="d{4}"
                            <?php
                                if ($errpcode == ""){
                                    echo "value='$postcode'";
                                }
                            ?>
                            >
                            <?php
                                if ($errpcode != ""){
                                    echo $errpcode;
                                }
                            ?></h3>
                        </div>
                    </div>

                <!--Number field-->
                <div id="phonenumber">
                <h3><label for="number">Phone Number</label>
                <input type="text" placeholder="### ### ####" name="number" id="number" required="required" pattern="\(\d{2}\) +\d{4}-\d{4}"
                <?php
                    if ($errnumber == ""){
                        echo "value='$number'";
                    }
                ?>
                >
                <?php
                    if ($errnumber != ""){
                        echo $errnumber;
                    }
                ?></h3>
                </div>

                <!--Preferred Contact field-->
                <fieldset class="enquirefieldset">
                    <legend><h2>Preferred Contact</h2></legend>
                    <h3>Contact Methods<br>
                    <?php

                    #echo '<option value="VIC" '.(($state=='VIC')?'selected="selected"':"").'>VIC</option>';

                    echo '<label for="preferemail"><input type="radio" value="email" name="preferredcontact" id="preferemail"'.(($prefer=='email')?'checked="checked"':"").'>Email</label>';

                    echo '<label for="preferpost"><input type="radio" value="post" name="preferredcontact" id="preferpost"'.(($prefer=='post')?'checked="checked"':"").'>Post</label>';

                    echo '<label for="preferphone"><input type="radio" value="phone" name="preferredcontact" id="preferphone"'.(($prefer=='phone')?'checked="checked"':"").'>Phone</label>';

                    // <label for="preferphone"><input type="radio" value="phone" name="preferredcontact" id="preferphone">Phone</label></h3>
                    ?></h3>
                </fieldset>
            </div>


            <h2>&nbsp;</h2>
            <h2 class="enquirehead">Payment Details</h2><hr>

            <div id="Product_Section" class="leftele">

                <h2>Product Selection</h2>

                <!--Product Type field-->
                <h3><label for="producttypeenquire">Product Type</label><br>
                <select name="producttypeenquire" id="producttypeenquire">
                    <?php
                    if ($errprod == ""){
                        echo '<option value="Compact Camera" '.(($prodtype=='Compact Camera')?'selected="selected"':"").'>Compact Cameras</option>';

                        echo '<option value="Mirrorless Camera" '.(($prodtype=='Mirrorless Camera')?'selected="selected"':"").'>Mirrorless Cameras</option>';

                        echo '<option value="DSLR Camera" '.(($prodtype=='DSLR Camera')?'selected="selected"':"").'>DSLR Cameras</option>';

                        echo '<option value="Video Camera" '.(($prodtype=='Video Camera')?'selected="selected"':"").'>Video Cameras</option>';
                    }
                    else{
                        echo '<option value="Compact Camera" selected="selected">Compact Cameras</option>
                        <option value="Mirrorless Camera">Mirrorless Cameras</option>
                        <option value="DSLR Camera" >DSLR Cameras</option>
                        <option value="Video Camera">Video Cameras</option>';
                    }
                    ?>
                </select></h3>

                <!--Product Name field-->
                <h3><label for="productidenquire">Product Name</label><br>
                <select name="productidenquire" id="productidenquire">
                    <?php
                    if ($errprod == ""){
                        echo '<option value="1" '.(($prodid=='1')?'selected="selected"':"").'>Canon Powershot G7X Mark III Digital Camera ($905)</option>';

                        echo '<option value="2" '.(($prodid=='2')?'selected="selected"':"").'>Sony Cyber-shot DSC-RX100 VII ($1205)</option>';

                        echo '<option value="3" '.(($prodid=='3')?'selected="selected"':"").'>Sony A1 ($5090)</option>';

                        echo '<option value="4" '.(($prodid=='4')?'selected="selected"':"").'>Sony A9 II ($6205)</option>';

                        echo '<option value="5" '.(($prodid=='5')?'selected="selected"':"").'>Nikon D7500 ($1200)</option>';

                        echo '<option value="6" '.(($prodid=='6')?'selected="selected"':"").'>Canon EOS R10 ($1415)</option>';

                        echo '<option value="7" '.(($prodid=='7')?'selected="selected"':"").'>Panasonic HCx1500 ($2650)</option>';

                        echo '<option value="8" '.(($prodid=='8')?'selected="selected"':"").'>Panasonic HCx2000 ($3455)</option>';
                    }
                    else{
                        echo '<option value="1" selected="selected">Canon Powershot G7X Mark III Digital Camera ($905)</option>
                        <option value="2">Sony Cyber-shot DSC-RX100 VII ($1205)</option>
                        <option value="3">Sony A1 ($5090)</option>
                        <option value="4">Sony A9 II ($6205)</option>
                        <option value="5">Nikon D7500 ($1200)</option>
                        <option value="6">Canon EOS R10 ($1415)</option>
                        <option value="7">Panasonic HCx1500 ($2650)</option>
                        <option value="8">Panasonic HCx2000 ($3455)</option>';
                    }
                    ?>
                </select>
                <?php
                    if ($errprod != ""){
                        echo $errprod;}
                ?></h3>

                <!--Product Quantity field-->
                <h3><label for="productquantity">Quantity</label>
                <input type="text" name="productquantity" id="productquantity" maxlength="2" size="2" /
                <?php
                    if ($errquantity == ""){
                        echo "value='$quantity'";
                    }
                    // else{
                    //     echo "value=1";
                    // }
                ?>
                >
                <?php
                    if ($errquantity != ""){
                        echo $errquantity;
                    }
                ?></h3>

                <!--Product Features field-->
                <fieldset class="enquirefieldset" id="feature_filedset">
                    <legend><h2>Product Features</h2></legend>
                    <label for="builtinlens"><input type="checkbox" checked="checked" name="feature[]" value="a" id="builtinlens">Built-in Lens (+$1000)</label> <br>
                    <label for="extramemorycard-socket"><input type="checkbox" name="feature[]" value="b" id="extramemorycard-socket">Extra Memory Card Socket (+$120)</label> <br>
                    <label for="extrareplacable-battery"><input type="checkbox" name="feature[]" value="c" id="extrareplacable-battery">Extra Replacable Battery (+$180)</label>
                </fieldset>
            </div>

            <div id="Payment_Section" class="rightele">
                <h2>Credit Card</h2>

                <img src="images/card.png" id="card">

                <!--Card Type field-->
                <h3><label for="cardtype">Card Type</label><br>
                <select name="cardtype" id="cardtype">
                    <option value="a" selected="selected">Visa</option>
                    <option value="b">Mastercard</option>
                    <option value="c">American Express</option>
                </select></h3>

                <!--Card Name field-->
                <h3><label for="cardname">Card Name</label>
                <input type="text"  name="cardname"  id="cardname" maxlength="25" required="required" pattern="^[a-zA-Z]+$" placeholder="Card Name">
                <?php
                    if ($errcardname != ""){
                        echo $errcardname;
                    }
                ?></h3>

                <!--Card Number field-->
                <h3><label for="cardnumber">Card Number</label>
                <input type="text" name="cardnumber" id="cardnumber" required="required" pattern="\d{4}\ d{4} \d{4} \d{4}" placeholder="0000 0000 0000 0000">
                <?php
                    if ($errcardnumber != ""){
                        echo $errcardnumber;
                    }
                ?></h3>
                <!--Card EXP and CVV field-->
                <div class="flex_box">
                    <div class="flex_item">
                        <h3><label for="cardexp">Card Exp</label>
                        <input type="text" name="cardexp" id="cardexp" required="required" pattern="\d{1,2}\/\d{1,2}\"  placeholder="mm/yy">
                        <?php
                            if ($errcardexp != ""){
                                echo $errcardexp;
                            }
                        ?></h3>
                    </div>
                    <div class="flex_item">
                        <h3><label for="cardcvv">Card CVV</label>
                        <input type="text" name="cardcvv" id="cardcvv" required="required" pattern="\d{1,2}\/\d{1,2}\"  placeholder="000">
                        <?php
                            if ($errcardcvv != ""){
                                echo $errcardcvv;
                            }
                        ?></h3>
                    </div>
                </div>
            </div>


            <div id="submitsection">
                <p><input type="submit" value="Check Out"></p>
            </div>
    </section>
    </form>

    <?php
        include_once "includes/footer.inc";
    ?>
</body>
</html>
