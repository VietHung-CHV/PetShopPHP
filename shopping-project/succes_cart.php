<?php 
	include_once('config.php');
	$uid = $_POST['uid1'];
	$sl = $_POST['sll1'];
	$pid = $_POST['pidd'];
	$tt = $_POST['tongTien1'];
	$name = $_POST['name'];
	$dc = $_POST['DiaChi'];
	$dt = $_POST['phoneNum'];
	$gc = $_POST['ghiChu'];
	$date = date("d/m/Y");

	

	$sql = "INSERT INTO order_products (product_id, product_qty, total_amount, product_user, order_date, address, note, phone_number, status) VALUES ('$pid', '$sl', '$tt', '$uid', '$date', '$dc', '$gc', '$dt', '0')";
	$r = mysqli_query($conn1, $sql);
	if ($r) {
		$sql1 = "DELETE FROM product_cart WHERE user_id = $uid";
		mysqli_query($conn1, $sql1);
	}
	if($_COOKIE['cart_count'] == '1'){
        setcookie('cart_count','',time() - (180),'/','','',TRUE);
        setcookie('user_cart','',time() - (180),'/','','',TRUE);
    }
	mysqli_close($conn1);
	header("Location: success.php");
?>