<!-- include header file -->
<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-default add-data" href="add-user.php">Thêm Admin</a>
        </div>
    </div> 
</div>   
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                // database configuration
                //include './php_files/config.php';
             
                $sql = "SELECT * FROM  admin ORDER BY admin_id DESC";
                $result = mysqli_query($conn1, $sql);
                if (mysqli_num_rows($result) > 0) {
                echo '<table class="table table-bordered">';
                echo '<tr><th>Admin_id</th><th>Admin_Name</th><th>Username</th><th>Admin_Role</th><th>Edit</th></tr>';
                while($row = mysqli_fetch_assoc($result)) {  
                echo "<tr>
                        <td class='id'>{$row["admin_id"]}</td>
                        <td>{$row["admin_name"]}</td>
                        <td>{$row["username"]}</td>
                        <td>";
                        if($row["admin_role"] == '1'){
                            echo "Admin";     
                        }else{
                            echo "Normal";     
                        }
                echo  "</td>
                        <td class='edit'><a href='update_admin.php?id={$row['admin_id']}'><i class='fa fa-edit'></i></a></td>
                    </tr>";               
                }
                    echo '</table>'; 
                } else {
                    echo "0 results";
                }    
                mysqli_close($conn1);
                include "footer.php"; 
            ?>    












            