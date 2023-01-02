<?php
include 'config.php';
session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user') {
    include 'config.php';
    header("Location: " . $hostname."/user_profile.php");
}else{

include 'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
           
            <!-- Form -->
            <form id="register_sign_up" class="signup_form" method ="POST" autocomplete="off">
                <h2>Đăng ký</h2>
                <div class="form-group">
                    <label>Họ </label>
                    <input type="text" name="f_name" class="form-control first_name" placeholder="" requried />
                </div>
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" name="l_name" class="form-control last_name" placeholder="" requried />
                </div>
                <div class="form-group">
                    <label>Tên đăng nhập / Email</label>
                    <input type="email" name="username" class="form-control user_name" requried oninvalid="alert('Hãy điền đúng định dạng email');" />
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" class="form-control pass_word" requried />
                </div>
                <div class="form-group">
                    <label>Điện thoại</label>
                    <input type="tel" name="mobile" class="form-control mobile" placeholder="0123456789"  pattern="[0-9]{10}" oninvalid="alert('Hãy điền đúng định dạng số điện thoại');"/>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control address" requried oninvalid="setCustomValidity('Không để trống')">
                </div>
                <div class="form-group">
                    <label>Quốc gia</label>
                    <input type="text" name="city" class="form-control city" requried >
                </div>
                <input type="submit" name="signup" class="btn" value="Đăng ký"/>
            </form>
            <!-- /Form -->
        </div>
    </div>
</div>
    <?php include 'footer.php';
}
?>