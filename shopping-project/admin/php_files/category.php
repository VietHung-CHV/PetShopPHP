<?php
	//include 'database.php';
    include 'config.php';
    if( isset($_POST['create']) ){
    	if(!isset($_POST['cat']) || empty($_POST['cat'])){
    		echo json_encode(array('error'=>'Trường danh mục trống.'));
    	}else{
    		// $db = new Database();

    		// $category = $db->escapeString($_POST['cat']);
    		$data = $_POST['cat'];
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $category = mysqli_real_escape_string($conn1, $data);
    		// $db->select('categories','cat_title',null,"cat_title = '{$category}'",null,null);
    		// $exist = $db->getResult();
    		$r = mysqli_query($conn1, "SELECT cat_title FROM categories WHERE cat_title = '{$category}' ");
            $exist = mysqli_fetch_all($r, MYSQLI_ASSOC);
    		if(!empty($exist)){
    			echo json_encode(array('error'=>'Danh mục đã tồn tại.'));
    		}else{
				// $db->insert('categories',array('cat_title'=>$category));
				// $response = $db->getResult();
				$sql = "INSERT INTO categories (cat_title) VALUES ('$category')";
                $r = mysqli_query($conn1, $sql);
                $response = mysqli_insert_id($conn1);
				if(!empty($response)){
					echo json_encode(array('success'=>$response));
				}
    		}
    	}
    } 


    if( isset($_POST['update']) ){
    	if(!isset($_POST['cat_id']) || empty($_POST['cat_id'])){
    		echo json_encode(array('error'=>'ID is Empty.')); exit;
    	}if(!isset($_POST['cat_name']) || empty($_POST['cat_name'])){
    		echo json_encode(array('error'=>'Category Field is Empty.')); exit;
    	}else{
    		// $db = new Database();

    		// $cat_id = $db->escapeString($_POST['cat_id']);
    		// $cat_name = $db->escapeString($_POST['cat_name']);
    		$data = $_POST['cat_id'];
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $cat_id = mysqli_real_escape_string($conn1, $data);

            $data = $_POST['cat_name'];
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $cat_name = mysqli_real_escape_string($conn1, $data);

    		// $db->update('categories',array('cat_title'=>$cat_name),"cat_id = '{$cat_id}'");
    		// $response = $db->getResult();
            $sql2 = "UPDATE categories SET cat_title = '$cat_name' WHERE cat_id = $cat_id ";
            $r = mysqli_query($conn1, $sql2);
            $response = mysqli_affected_rows($conn1);
    		if(!empty($response)){
    			echo json_encode(array('success'=>$response)); exit;
    		}
    	}
    }

    if(isset($_POST['delete_id'])){

		// $db = new Database();

		// $id = $db->escapeString($_POST['delete_id']);
		$data = $_POST['delete_id'];
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $id = mysqli_real_escape_string($conn1, $data);

		// $db->delete('categories',"cat_id ='{$id}'");
		// $response = $db->getResult();
		$sql3 = "DELETE FROM categories WHERE cat_id = $id";
        $r = mysqli_query($conn1, $sql3);
        $response = mysqli_affected_rows($conn1);
		if(!empty($response)){
			echo json_encode(array('success'=>$response)); exit;
		}
	} 

?>  
