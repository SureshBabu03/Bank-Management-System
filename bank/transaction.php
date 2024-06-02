<!DOCTYPE html>
<html>
<head>
	<title>State Bank of India</title>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px;
		}
		th {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body><center>
	<h1>Transaction History</h1>
	<th><h3><b>Deposit</b></h3></th><table>
		<tr>
			<th>Account Number</th>
			<th>Date</th>
			<th>Amount</th>
		</tr>
		<?php
			$conn = mysqli_connect('localhost', 'MADHAN', 'MADHAN@123', 'bank');
			if (!$conn) {
    			die("Connection failed: " . mysqli_connect_error());
			}
			$accountnumber = $_POST["accountnumber"];
	
	if (empty($accountnumber)) {
		echo "Please enter an account number";
		exit();
	}

	if (!is_numeric($accountnumber)) {
		echo "Account number should only contain numbers";
		exit();
	}
			$transactionhistory_query = "SELECT * FROM deposit WHERE accountnumber = '$accountnumber'";
			$result = mysqli_query($conn, $transactionhistory_query);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['accountnumber']."</td>";
					echo "<td>" . $row['date'] . "</td>";
					echo "<td>" . $row['amount'] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "No transaction history found";
			}
			mysqli_close($conn);
		?>
	</table><br><br>
	<th><h3><b>Withdraw</b></h3></th><table>
		<tr>
			<th>Account Number</th>
			<th>Date</th>
			<th>Amount</th>
		</tr>
		<?php
			$conn = mysqli_connect('localhost', 'sureshbabu', 'password', 'bank');
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$accountnumber = $_POST["accountnumber"];
	
	if (empty($accountnumber)) {
		echo "Please enter an account number";
		exit();
	}

	if (!is_numeric($accountnumber)) {
		echo "Account number should only contain numbers";
		exit();
	}
			$transactionhistory_query = "SELECT * FROM withdraw WHERE accountnumber = '$accountnumber'";
			$result = mysqli_query($conn, $transactionhistory_query);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['accountnumber']."</td>";
					echo "<td>" . $row['date'] . "</td>";
					echo "<td>" . $row['amount'] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "No transaction history found";
			}
			mysqli_close($conn);
		?>
	</table></center>
</body>
</html>
