<?php
session_start();
if(isset($_COOKIE['user_cart'])){
	        setcookie('cart_count','',time() - (180),'/','','',TRUE);
			setcookie('user_cart','',time() - (180),'/','','',TRUE);
	    }
include 'config.php';
$title = "Thanh toán thành công!";
    include 'header.php';  ?>
    <div class="product-section content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-head">Thanh toán thành công!</h2>
                </div>
            </div>
            
        </div>
    </div>

<?php include 'footer.php';

 ?>