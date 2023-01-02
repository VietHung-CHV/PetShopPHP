<?php 
//include 'database.php';
include 'config.php';

if(isset($_POST['complete'])){

	$db = new Database();
	$order_id = $db->escapeString($_POST['complete']);
	$db->update('order_products',['status'=>'2'],"order_id='{$order_id}'");
	$result = $db->getResult();
	
	$sql = "SELECT product_id, product_qty FROM order_products WHERE order_id='{$order_id}'";
	$r = mysqli_query($conn1, $sql);
	$res = mysqli_fetch_assoc($r);
	$product_code = explode(',',$res['product_id']);
	$product_qty = explode(',',$res['product_qty']);
	for($i=0;$i<count($product_code);$i++){ 
        $sql2 = "UPDATE products SET qty = qty - $product_qty[$i] WHERE product_id=$product_code[$i]";
        mysqli_query($conn1, $sql2);
    }
	if($result[0] == '1'){
		echo 'true'; exit;
	}
}


if(isset($_POST['check'])){

	$db = new Database();
	$order_id1 = $db->escapeString($_POST['check']);
	$db->update('order_products',['status'=>'1'],"order_id='{$order_id1}'");
	$result = $db->getResult();
	if($result[0] == '1'){
		echo 'true'; exit;
	}
}

if(isset($_POST['cancel'])){

	$db = new Database();
	$order_id2 = $db->escapeString($_POST['cancel']);
	$db->update('order_products',['status'=>'3'],"order_id='{$order_id2}'");
	$result = $db->getResult();
	if($result[0] == '1'){
		echo 'true'; exit;
	}
}
?>
