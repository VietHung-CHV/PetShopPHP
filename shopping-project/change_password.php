<?php
include 'config.php';
session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user') {
include 'header.php'; ?>
<div id="user_profile-content">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <?php
                if(isset($_SESSION["user_id"])) {
                    //$db->select('user','username',null,"user_id = '{$user}'",null,null);
                    //$result = $db->getResult();
                    $user = $_SESSION["user_id"];
                    $r = mysqli_query($conn1, "SELECT username FROM user WHERE user_id = '{$user}'");
                    $result = mysqli_fetch_all($r, MYSQLI_ASSOC);
                    if (count($result) > 0) {
                        ?>

                        <div class="signup_form">
                            <h2>Thay đổi mật khẩu</h2>
                            <!-- Form -->
                            <form id="modify-password" method="POST">
                                <?php foreach($result as $row) { ?>
                                    <div class="form-group">
                                        <label>Tên đăng nhập</label>
                                        <input type="text" class="form-control" disabled
                                               value="<?php echo $row['username']; ?>" requried/>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu cũ</label>
                                        <input type="password" name="old_pass" class="form-control old_pass"
                                               placeholder="Nhập mật khẩu cũ" requried/>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu mới</label>
                                        <input type="password" name="new_pass" class="form-control new_pass"
                                               placeholder="Nhập mật khẩu mới" requried/>
                                    </div>
                                    <input type="submit" name="submit" class="btn" value="Đồng ý"/>
                                <?php } ?>
                            </form>
                            <!-- /Form -->
                        </div>
                    <?php
                    }
                //}else{
                 //   header("location: {$hostname}/user_profile.php");
                  //  ob_flush();
                //}
                }
                    ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';
}
?>