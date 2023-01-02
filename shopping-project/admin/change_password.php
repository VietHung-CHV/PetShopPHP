<!-- include header file -->
<?php include 'header.php'; ?>
<div class="admin-content-container">
    <h2 class="admin-heading">Đặt lại mật khẩu</h2>
    <!-- Form -->
    <div class="row">
        <form id="changePassword" class="add-post-form col-md-6" method="POST">
            <div class="form-group">
                <label>Mật khẩu cũ</label>
                <input type="password" name="old_pass" class="form-control old_pass"  required/>
            </div>
            <div class="form-group">
                <label>Mật khẩu mới</label>
                <input type="password" name="new_pass" class="form-control new_pass" required/>
            </div>
            <input type="submit" name="save" class="btn add-new" value="Đồng ý">
        </form>
    </div>
    <!-- /Form -->
</div>
<?php include "footer.php";   ?>