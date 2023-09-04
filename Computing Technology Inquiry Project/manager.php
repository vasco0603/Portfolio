<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Manager" />
    <meta name="keywords" content="Manager"/>
    <meta name="author" content="Michael Haryanto, Phuthai, Narongdech, Roshaan, Hirad"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Cabin:wght@700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300;1,400&family=Pacifico&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Camera Purchase Web Application Enquiry - Manager.php</title>
</head>

<body id="managerpage">
    <?php
        include_once "includes/header.inc";
		require_once "settings.php";
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		if (isset($_SESSION['part'])){
            $part = $_SESSION['part'];
            if ($part != 1){
				header("location: payment.php");
			}
        }
        else{
            header ("location: login.php");
        }
		function sanitise_input($data){
			$data = trim($data);				//remove spaces
			$data = stripslashes($data);		//remove backslashes in front of quotes
			$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
			return $data;
		}
    ?>
	<br><br>
	<section class = "manager-sections" id = "manager-section-searchorder">
	<h2 class="align-center">Orders</h2>
		<fieldset>
			<legend><h2 class="align-center">Orders</h2></legend>
			<?php
				$sql_table = "orders";
				$tablequery = "select * from $sql_table order by order_id";
				$resulttable = mysqli_query($conn, $tablequery);
				if (!$resulttable){
					echo "<p>Something is wrong with ", $tablequery, "</p>";
				}
				else{
					if (!mysqli_fetch_assoc($resulttable)){
						echo "<h2>No Result</h2>";
					}
					else{
						mysqli_free_result($resulttable);
						$resulttable = mysqli_query($conn, $tablequery);
						echo "<table class = \"manager-table\" border=\"1\">\n";
						echo "<tr>\n"
						."<th scope=\"col\">Order ID</th>\n "
						."<th scope=\"col\">Date</th>\n "
						."<th scope=\"col\">Status</th>\n "
						."<th scope=\"col\">Cost</th>\n "
						."<th scope=\"col\">Product</th>\n "
						."<th scope=\"col\">Feature</th>\n "
						."<th scope=\"col\">Name</th>\n "
						."</tr>\n ";
						while ($rowtable = mysqli_fetch_assoc($resulttable)){
							echo "<tr>\n";
							echo "<td class = \"manager-t-colorcol\">",$rowtable["order_id"],"</td>\n";
							echo "<td>",$rowtable["order_date"],"</td>\n";
							echo "<td>",$rowtable["order_status"],"</td>\n";
							echo "<td>&#36;",$rowtable["order_cost"],"</td>\n";
							echo "<td>",$rowtable["prodname"],"</td>\n";
							echo "<td>",$rowtable["feature"],"</td>\n";
							$name = "";
							$name .= $rowtable["fname"];
							$name .= " ";
							$name .= $rowtable["lname"];
							echo "<td>",$name,"</td>\n";
							echo "</tr>\n";
						}
					echo "</table>";
					}
					mysqli_free_result($resulttable);
					mysqli_close($conn);
				}
			?>
		</fieldset>
		<fieldset>
			<legend><h2 class="align-center" id="searchbyname">Sort Orders</h2></legend>
			<form action="manager.php#searchbyname" method="post" novalidate>
			<?php
				if (isset($_POST["inputname"])){
					$sname = $_POST["inputname"];
					$sname = sanitise_input($sname);
					if ($sname == ""){
						$errsname = "<p class=\"errmsg\">Required Field</p>";
					}
					else{
						$snamequery = "select * from orders where fname like '%$sname%' or lname like '%$sname%'";
						$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
						$searchresult = mysqli_query($conn, $snamequery);
						if (!$searchresult){
							echo "<p>Something is wrong with ", $snamequery, "</p>";
						}
						else{
							if (!mysqli_fetch_assoc($searchresult)){
								echo "<h2>No Result</h2>";
							}
							else{
								mysqli_free_result($searchresult);
								$searchresult = mysqli_query($conn, $snamequery);
								echo "<table class = \"manager-table\" border=\"1\">\n";
								echo "<tr>\n"
								."<th scope=\"col\">Order ID</th>\n "
								."<th scope=\"col\">Date</th>\n "
								."<th scope=\"col\">Status</th>\n "
								."<th scope=\"col\">Cost</th>\n "
								."<th scope=\"col\">Product</th>\n "
								."<th scope=\"col\">Feature</th>\n "
								."<th scope=\"col\">Name</th>\n "
								."</tr>\n ";
								while ($rowtable = mysqli_fetch_assoc($searchresult)){
									echo "<tr>\n";
									echo "<td class = \"manager-t-colorcol\">",$rowtable["order_id"],"</td>\n";
									echo "<td>",$rowtable["order_date"],"</td>\n";
									echo "<td>",$rowtable["order_status"],"</td>\n";
									echo "<td>&#36;",$rowtable["order_cost"],"</td>\n";
									echo "<td>",$rowtable["prodname"],"</td>\n";
									echo "<td>",$rowtable["feature"],"</td>\n";
									$name = "";
									$name .= $rowtable["fname"];
									$name .= " ";
									$name .= $rowtable["lname"];
									echo "<td>",$name,"</td>\n";
									echo "</tr>\n";
								}
								echo "</table>";
							}
							mysqli_free_result($searchresult);
							mysqli_close($conn);
						}
					}
				}
			?>
			<h3 class="sortby"><label for="inputname">Search by Name</label><br>
			<input type="text" id="inputname" name="inputname" maxlength="25" required="required" pattern="^[a-zA-Z]+$" placeholder="Search by Name">
			<?php
				if (isset($errsname)){
					echo $errsname;
				}
			?></h3>

			<input class="button" type="submit" value="Search" name="Search">
			</form>

			<!--search by product-->
			<?php
				if (isset($_POST["sortbyproduct"])){
					$sprodid = $_POST["sortbyproduct"];
					if ($sprodid == 1){
                        $sprodname = "Canon Powershot G7X Mark III Digital Camera";
                    }
                    else if ($sprodid == 2){
                        $sprodname = "Sony Cyber-shot DSC-RX100 VII";
                    }
                    else if ($sprodid == 3){
                        $sprodname = "Sony A1";
                    }
                    else if ($sprodid == 4){
                        $sprodname = "Sony A9 II";
                    }
                    else if ($sprodid == 5){
                        $sprodname = "Nikon D7500";
                    }
                    else if ($sprodid == 6){
                        $sprodname = "Canon EOS R10";
                    }
                    else if ($sprodid == 7){
                        $sprodname = "Panasonic HCx1500";
                    }
                    else if ($sprodid == 8){
                        $sprodname = "Panasonic HCx2000";
                    }
					$sortprodquery = "select * from orders where prodname='$sprodname'";
					$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
					$sortproduct = mysqli_query($conn, $sortprodquery);
					if (!$sortproduct){
						echo "<p>Something is wrong with ", $sortprodquery, "</p>";
					}
					else{
						if (!mysqli_fetch_assoc($sortproduct)){
							echo "<h2>No Result</h2>";
						}
						else{
							mysqli_free_result($sortproduct);
							$sortproduct = mysqli_query($conn, $sortprodquery);
							echo "<table class = \"manager-table\" id = \"manager-t-sortproduct\" border=\"1\">\n";
							echo "<tr>\n"
							."<th scope=\"col\">Order ID</th>\n "
							."<th scope=\"col\">Date</th>\n "
							."<th scope=\"col\">Status</th>\n "
							."<th scope=\"col\">Cost</th>\n "
							."<th scope=\"col\">Product</th>\n "
							."<th scope=\"col\">Feature</th>\n "
							."<th scope=\"col\">Name</th>\n "
							."</tr>\n ";
							while ($sprodtable = mysqli_fetch_assoc($sortproduct)){
								echo "<tr>\n";
								echo "<td class = \"manager-t-colorcol\">",$sprodtable["order_id"],"</td>\n";
								echo "<td>",$sprodtable["order_date"],"</td>\n";
								echo "<td>",$sprodtable["order_status"],"</td>\n";
								echo "<td>&#36;",$sprodtable["order_cost"],"</td>\n";
								echo "<td>",$sprodtable["prodname"],"</td>\n";
								echo "<td>",$sprodtable["feature"],"</td>\n";
								$name = "";
								$name .= $sprodtable["fname"];
								$name .= " ";
								$name .= $sprodtable["lname"];
								echo "<td>",$name,"</td>\n";
								echo "</tr>\n";
							}
							echo "</table>";
						}
						mysqli_free_result($sortproduct);
					}
					mysqli_close($conn);
				}
			?>
			<form action="manager.php#manager-t-sortproduct" method="post" novalidate>
			<h3 class="sortby" id="ordersortby"><label for="sortbyproduct">Sort by Product</label><br>
			<select name="sortbyproduct" id="sortbyproduct">
				<option value="1" selected="selected">Canon Powershot G7X Mark III Digital Camera</option>
				<option value="2">Sony Cyber-shot DSC-RX100 VII</option>
				<option value="3">Sony A1</option>
				<option value="4">Sony A9 II</option>
				<option value="5">Nikon D7500</option>
				<option value="6">Canon EOS R10</option>
				<option value="7">Panasonic HCx1500</option>
				<option value="8">Panasonic HCx2000</option>
            </select>
			</h3>

			<input class="button" type="submit" value="Search" name="Search">
			</form>


			<!--sort by cost and pending -->
			<?php
				if (isset($_POST["sortbychoose"])){
					$sortid = $_POST["sortbychoose"];
					if ($sortid == 1){
						$sortquery = "select * from orders where order_status = 'PENDING'";
					}
					else if($sortid == 2){
						$sortquery = "select * from orders order by order_cost";
					}
					else if($sortid == 3){
						$sortquery = "select * from orders order by order_cost desc";
					}
					$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
					$sortby = mysqli_query($conn, $sortquery);
					if (!$sortby){
						echo "<p>Something is wrong with ", $sortquery, "</p>";
					}
					else{
						if (!mysqli_fetch_assoc($sortby)){
							echo "<h2>No Result</h2>";
						}
						else{
							mysqli_free_result($sortby);
							$sortby = mysqli_query($conn, $sortquery);
							echo "<table class = \"manager-table\" id = \"manager-t-pending\" border=\"1\">\n";
							echo "<tr>\n"
							."<th scope=\"col\">Order ID</th>\n "
							."<th scope=\"col\">Date</th>\n "
							."<th scope=\"col\">Status</th>\n "
							."<th scope=\"col\">Cost</th>\n "
							."<th scope=\"col\">Product</th>\n "
							."<th scope=\"col\">Feature</th>\n "
							."<th scope=\"col\">Name</th>\n "
							."</tr>\n ";
							while ($sorttable = mysqli_fetch_assoc($sortby)){
								echo "<tr>\n";
								echo "<td class = \"manager-t-colorcol\">",$sorttable["order_id"],"</td>\n";
								echo "<td>",$sorttable["order_date"],"</td>\n";
								echo "<td>",$sorttable["order_status"],"</td>\n";
								echo "<td>&#36;",$sorttable["order_cost"],"</td>\n";
								echo "<td>",$sorttable["prodname"],"</td>\n";
								echo "<td>",$sorttable["feature"],"</td>\n";
								$name = "";
								$name .= $sorttable["fname"];
								$name .= " ";
								$name .= $sorttable["lname"];
								echo "<td>",$name,"</td>\n";
								echo "</tr>\n";
							}
						echo "</table>";
						}
						mysqli_free_result($sortby);
					}
					mysqli_close($conn);
				}
			?>
			<form action="manager.php#manager-t-pending" method="post" novalidate>
			<h3 class="sortby"><label for="sortbychoose">Sort by</label><br>
			<select name="sortbychoose" id="sortbychoose">
				<option value="1">Pending Orders</option>
				<option value="2">Order Cost ( Ascending )</option>
				<option value="3">Order Cost ( Descending )</option>
            </select>
			</h3>

			<input class="button" type="submit" value="Search" name="Search">
			</form>

			<!-- search by query -->
			<form action="manager.php#searchquerytable" method="post" novalidate>
			<?php
				if (isset($_POST["squery"])){
					$squery = $_POST["squery"];
					$squery = sanitise_input($squery);
					if ($squery == ""){
						$errsquery = "<p class=\"errmsg\">Required Field</p>";
					}
					else{
						$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
						$searchqresult = mysqli_query($conn, $squery);
						if (!$searchqresult){
							$errsquery = "<p class=\"errmsg\">Something is wrong with $squery</p>";
						}
						else{
							if (!mysqli_fetch_assoc($searchqresult)){
								echo "<h2>No Result</h2>";
							}
							else{
								mysqli_free_result($searchqresult);
								$searchqresult = mysqli_query($conn, $squery);
								echo "<table class = \"manager-table\" id = \"manager-t-querysearch\" border=\"1\">\n";
								echo "<tr>\n"
								."<th scope=\"col\">Order ID</th>\n "
								."<th scope=\"col\">Date</th>\n "
								."<th scope=\"col\">Status</th>\n "
								."<th scope=\"col\">Cost</th>\n "
								."<th scope=\"col\">Product</th>\n "
								."<th scope=\"col\">Feature</th>\n "
								."<th scope=\"col\">Name</th>\n "
								."</tr>\n ";
								while ($squerytable = mysqli_fetch_assoc($searchqresult)){
									echo "<tr>\n";
									echo "<td class = \"manager-t-colorcol\" id=\"searchquerytable\">",$squerytable["order_id"],"</td>\n";
									echo "<td>",$squerytable["order_date"],"</td>\n";
									echo "<td>",$squerytable["order_status"],"</td>\n";
									echo "<td>&#36;",$squerytable["order_cost"],"</td>\n";
									echo "<td>",$squerytable["prodname"],"</td>\n";
									echo "<td>",$squerytable["feature"],"</td>\n";
									$name = "";
									$name .= $squerytable["fname"];
									$name .= " ";
									$name .= $squerytable["lname"];
									echo "<td>",$name,"</td>\n";
									echo "</tr>\n";
								}
								echo "</table>";
							}
							mysqli_free_result($searchqresult);
							mysqli_close($conn);
						}
					}
				}
			?>
			<h3 class="sortby"><label for="squery">Search by Query</label><br>
			<input type="text" id="squery" name="squery" required="required" pattern="^[a-zA-Z]+$" placeholder="Search by Query">
			<?php
				if (isset($errsquery)){
					echo $errsquery;
				}
			?></h3>

			<input class="button" type="submit" value="Search" name="Search">
			</form>
</section>

	<br><br><br>
	<section class = "manager-sections" id ="manager-section-updateorder">
    <h2 class="align-center">Update order's status</h2>
	<form method="post" action="manager.php">
		<fieldset>
			<legend><h2>Update status of an order:</h2></legend>
			<div class = "manager-eachinput" id = "manager-inputleft">
            <h3><label for="orderID">Order ID:</label></h3>
                <input type="number" name="orderID" id="orderID" required="required">
            </div>
            <div class = "manager-eachinput" id = "manager-inputright">
            <h3><label for="orderStatus">Order status:</label></h3>
                <select name="orderStatus" id="orderStatus" required>
                    <option value="">Select Status...</option>
                    <option value="PENDING">PENDING</option>
                    <option value="FULFILLED">FULFILLED</option>
                    <option value="PAID">PAID</option>
                    <option value="ARCHIVED">ARCHIVED</option>
                </select>
            </div>
		</fieldset>
		<?php
		if (isset($_POST["Update"])){

			require_once('settings.php');
        	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);

        	if (!$conn){
        		echo "<h2 class='align-center'>Unable to connect to the database.</h2>";
        	}
        	else{
				$orderID = sanitise_input($_POST["orderID"]);
        		$status = $_POST["orderStatus"];

        		$query = "UPDATE orders SET order_status='$status' WHERE order_id='$orderID'";

        		$result = mysqli_query($conn, $query);
        		if (!$result){
					echo "<h2 class='align-center'>Failed to execute query: ", $query, ".</h2>";
				}
				else{
					echo "<h2 class='align-center'>Order status has been updated.</h2>";
				}
				mysqli_close($conn);
        	}
		}
	?>
		<input class="button" type="submit" value="Update" name="Update">
	</form>
</section>
	<br><br><br>
 <!-- Enable manager to delete pending orders -->
<section class = "manager-sections" id = "manager-section-deleteorder">
	<h2 class="align-center">Delete PENDING order</h2>
	<form method="post" action="manager.php">
		<fieldset>
			<legend><h2>Delete an order</h2></legend>
            <div class = "manager-eachinput">
			    <h3><label for="orderID2">Order ID: (only PENDING orders can be deleted)</label></h3>
                <input type="number" name="orderID2" id="orderID2" required="required">
            </div>

		</fieldset>
		<?php
		//if delete form was submitted
		if (isset($_POST["Delete"])){

			require_once('settings.php');		//Acquire connection to database
        	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        	if (!$conn){
        		echo "<h2 class='align-center'>Unable to connect to the database.</h2>";
        	}
        	else{

				$orderID2 = sanitise_input($_POST["orderID2"]);

        		$query = "SELECT order_status FROM orders WHERE order_id='$orderID2'";

        		$result = mysqli_query($conn, $query);		//execute the query and store the result into result pointer

        		if (!$result){
					echo "<h2 class='align-center'>Failed to execute query: ", $query, ".</h2>";
				}
				else{
					$record = mysqli_fetch_assoc ($result);
					if ($record["order_status"] != "PENDING"){
						echo "<h2 class='align-center'>Sorry you cannot delete this order, only existed orders or PENDING orders can be deleted.</h2>";
					}
					else{
						$delete = "DELETE FROM orders WHERE order_id='$orderID2'";
						$execute = mysqli_query($conn, $delete);
						if (!$execute){
							echo "<h2 class='align-center'>Failed to execute query: ", $delete, ".</h2>";
						}
						else{
							echo "<h2 class='align-center'>The order has been deleted.</h2>";
						}
					}
				}
				mysqli_close($conn);
        	}
		}
	?>
		<input class="button" type="submit" value="Delete" name="Delete">
	</form>
</section>
	<br><br><br>

    <?php
        include_once "includes/footer.inc";
    ?>
</body>
</html>
