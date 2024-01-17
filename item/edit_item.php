<?php
// include database connection file
include_once("../koneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id_item = $_POST['id_item'];
    $nama_item = $_POST['nama_item'];
    $harga_item = $_POST['harga_item'];
	// update user data
	$result = mysqli_query($mysqli, "UPDATE item SET nama_item='$nama_item',harga_item='$harga_item' WHERE id_item=$id_item");
	
	// Redirect to homepage to display updated user in list
	header("Location: list_item.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_item = $_GET['id_item'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM item WHERE id_item=$id_item");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama_item = $user_data['nama_item'];
    $harga_item = $user_data['harga_item'];
}
?>
<html>
<head>	
	<title>Edit Item Data</title>
</head>
 
<body>
	<a href="list_item.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit_item.php">
		<table border="0">
        <tr> 
				<td>Nama Item</td>
				<td><input type="text" name="nama_item" value=<?php echo $nama_item;?>></td>
			</tr>
			<tr> 
				<td>Harga Item</td>
				<td><input type="text" name="harga_item" value=<?php echo $harga_item;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_item" value=<?php echo $_GET['id_item'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>