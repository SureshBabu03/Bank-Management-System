<!DOCTYPE html>
<html>
<head>
	<title>State Bank of India</title>
	<link rel="stylesheet" type="text/css" href="css/style9.css">
</head>
<body>
	<?php
		// Set up database connection
		$servername = "localhost";
		$username = "MADHAN";
		$password = "MADHAN@123";
		$dbname = "bank";

		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Retrieve all account numbers from user table
		$sql = "SELECT accountnumber FROM user";
		$result = $conn->query($sql);

		// Store all account numbers in an array
		$account_numbers = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($account_numbers, $row["accountnumber"]);
			}
		}

		// Check if form is submitted
		if (isset($_GET["submit"])) {
			// Retrieve selected account numbers
			$selected_accounts = isset($_GET["accounts"]) ? $_GET["accounts"] : array();

			// Display details for each selected account number
			foreach ($selected_accounts as $selected_account) {
				$sql = "SELECT * FROM user WHERE accountnumber='$selected_account'";
				$result = $conn->query($sql);
				// Display details and edit form
				if ($result->num_rows > 0) {
					echo "<div class='details'>";
					echo "<h3>Details for account number $selected_account:</h3>";
					while($col = $result->fetch_assoc()) {
						echo "<form method='post' action='update_details.php'>";
						echo "<input type='hidden' name='accountnumber' value='" . $col["accountnumber"] . "'>";
						echo "<label for='firstname'>First Name:</label>";
						echo "<input type='text' name='firstname' value='" . $col["firstname"] . "'>";
						echo "<label for='lastname'>Last Name:</label>";
						echo "<input type='text' name='lastname' value='" . $col["lastname"] . "'>";
						echo "<label for='dob'>Date of Birth:</label>";
						echo "<input type='date' name='dob' value='" . $col["dob"] . "'>";
						echo "<label for='phonenumber'>Phone Number:</label>";
						echo "<input type='tel' name='phonenumber' value='" . $col["phonenumber"] . "'>";
						echo "<label for='address'>Address:</label>";
						echo "<input type='text' name='address' value='" . $col["address"] . "'>";
						echo "<input type='submit' name='update' value='Update'>";
						echo "</form>";
                        // Add Close Account button
						echo "<form method='post' action='close_account.php'>";
						echo "<input type='hidden' name='accountnumber' value='" . $col["accountnumber"] . "'>";
						echo "<input type='submit' name='close' value='Close Account'>";
						echo "</form>";
					}
					echo "</div>";
				} else {
					echo "No details found for account number $selected_account.";
				}
			}
		}

		// Close database connection
		$conn->close();
	?>

	<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <label for="accounts">Select account numbers:</label>
	  <br>
	  <?php
	  foreach ($account_numbers as $account) {
	      echo "<input type='checkbox' name='accounts[]' value='$account'>$account<br>";
	  }
	  ?>
	  <br>
	  <input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
