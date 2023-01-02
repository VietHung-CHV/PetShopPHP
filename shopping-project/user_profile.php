<?php
include 'config.php';
session_start();
if(!isset($_SESSION['user_id']) && $_SESSION['user_role'] != 'user') {
    header("Location: " . $hostname);
}
include 'header.php'; ?>
    <div id="user_profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <h2 class="section-head">Thông tin cá nhân</h2>
                    <?php
                        $user_id = $_SESSION["user_id"];
                        $db = new Database();
                        //$db->select('user','*',null,"user_id = '{$user_id}'",null,null);
                        //$result = $db->getResult();
                        $r = mysqli_query($conn1, "SELECT * FROM user WHERE user_id = '{$user_id}'");
                        $result = mysqli_fetch_all($r, MYSQLI_ASSOC);
                        if (count($result) > 0) {
                            $table = '<table>';
                            foreach($result as $row) { ?>
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <td><b>Họ :</b></td>
                                        <td><?php echo $row["f_name"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tên :</b></td>
                                        <td><?php echo $row["l_name"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tên đăng nhập :</b></td>
                                        <td><?php echo $row["username"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Điện thoại :</b></td>
                                        <td><?php echo $row["mobile"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Địa chỉ :</b></td>
                                        <td><?php echo $row["address"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Quốc gia :</b></td>
                                        <td><?php echo $row["city"]; ?></td>
                                    </tr>
                                </table>
                            <?php }
                        }
                        ?>
                        <a class="modify-btn btn" href="edit_user.php?user=<?php echo $_SESSION['user_id']; ?>">Thay đổi thông tin cá nhân</a>
                        <a class="modify-btn btn" href="change_password.php">Thay đổi mật khẩu</a>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php';


?>
  