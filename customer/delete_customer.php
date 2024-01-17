<?php
// include database connection file
include_once("../koneksi.php");
 
// Get id from URL to delete that user
$id_customer = $_GET['id_customer'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM customers WHERE id_customer=$id_customer");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:../halaman_admin.php");
?>