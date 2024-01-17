<?php
// include database connection file
include_once("../koneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id_customer = $_POST['id_customer'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone_no = $_POST['phone_no'];
    $city = $_POST['city'];
	// update user data
	$result = mysqli_query($mysqli, "UPDATE customers SET name='$name',address='$address',phone_no='$phone_no' WHERE id_customer=$id_customer");
	
	// Redirect to homepage to display updated user in list
	header("Location: ../halaman_admin.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_customer = $_GET['id_customer'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM customers WHERE id_customer=$id_customer");
 
while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['name'];
    $address = $user_data['address'];
    $phone_no = $user_data['phone_no'];
    $city = $user_data['city'];
}
?>
<html>
<head>	
	<title>Edit Customer Data</title>
</head>
 
<body>
	<a href="halaman_admin.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit_customer.php">
		<table border="0">
        <tr> 
				<td>Name</td>
				<td><input type="text" name="name" value=<?php echo $name;?>></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="address" value=<?php echo $address;?>></td>
			</tr>
			<tr> 
				<td>Phone No</td>
				<td><input type="number" name="phone_no" value=<?php echo $phone_no;?>></td>
			</tr>
            <tr> 
				<td>City</td>
				<td><input type="text" name="city" value=<?php echo $city;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_customer" value=<?php echo $_GET['id_customer'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>