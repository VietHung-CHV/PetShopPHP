<?php 
include '../config.php';


if(isset($_POST['cancel'])){

	$db = new Database();
	$order_id1 = $db->escapeString($_POST['cancel']);
	$db->update('order_products',['status'=>'3'],"order_id='{$order_id1}'");
	$result = $db->getResult();
	if($result[0] == '1'){
		echo 'true'; exit;
	}
}
?>
