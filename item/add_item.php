<html>
<head>
	<title>Add Item</title>
</head>
 
<body>
	<a href="../halaman_admin.php">Go to Home</a>
	<br/><br/>
 
	<form action="add_item.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Item</td>
				<td><input type="text" name="nama_item"></td>
			</tr>
			<tr> 
				<td>Harga Item</td>
				<td><input type="number" name="harga_item"></td>
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
		$nama_item = $_POST['nama_item'];
		$harga_item = $_POST['harga_item'];
		// include database connection file
		include_once("../koneksi.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO item (nama_item, harga_item) VALUES('$nama_item','$harga_item')");
		
		// Show message when user added
		echo "User added successfully. <a href='list_item.php'>View Users</a>";
	}
	?>
</body>
</html>