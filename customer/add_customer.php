<html>
<head>
	<title>Add Users</title>
</head>
 
<body>
	<a href="halaman_admin.php">Go to Home</a>
	<br/><br/>
 
	<form action="add_customer.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="address"></td>
			</tr>
			<tr> 
				<td>Phone No</td>
				<td><input type="number" name="phone_no"></td>
			</tr>
			<tr> 
				<td>City</td>
				<td><input type="text" name="city"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phone_no = $_POST['phone_no'];
		$city = $_POST['city'];
		// include database connection file
		include_once("../koneksi.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO customers(name, address, phone_no, city) VALUES('$name','$address','$phone_no', '$city')");
		
		// Show message when user added
		echo "User added successfully. <a href='../halaman_admin.php'>View Users</a>";
	}
	?>
</body>
</html>