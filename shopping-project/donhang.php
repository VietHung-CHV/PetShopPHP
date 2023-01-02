<?php
include 'config.php';
session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user') {

    include 'header.php'; ?>
    <div class="product-cart-container">
        <div class="container">
            <div class="content">
                <form action="succes_cart.php" method="post" >
                    <div class="row">
                        <div class="col-md-5">
                            <div class="thongTinGiaoHang">
                            <h2>THÔNG TIN GIAO HÀNG</h2><br><br>           
                            <div class="inforGiaoHang">
                
                            <table class="table table-striped">
                                
                                <tr>
                                    <td width="150px" >
                                        <label>Họ Tên</label>
                                    </td>
                                    <td >
                                        <input class="form-control" border="0" type="text" name="name" id="name" placeholder="HỌ TÊN" value="" required>
                                    </td>
                                </tr>
                                
                                <tr>
                                    
                                    <td>
                                        <label>Địa chỉ</label></td><td>
                                        <input class="form-control" type="text" name="DiaChi" id="DiaChi" placeholder="ĐỊA CHỈ" value="" required></td>
                                </tr>
                                          
                                <tr>
                                    
                                    <td>
                                        <label>Điện thoại</label></td><td>
                                        <input class="form-control" type="text" name="phoneNum" id="phoneNum" placeholder="SỐ ĐIỆN THOẠI" value="" required></td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <label>Ghi chú</label></td><td>
                                        <input class="form-control" type="text" name="ghiChu" id="ghiChu" placeholder="GHI CHÚ" required></td>
                                </tr> 
                                      
                                <tr >
                                    <td colspan="2" align="left" style="padding-left:20px;height: 30px;font-size: 15px;"><b>HÌNH THỨC VẬN CHUYỂN:</b><b> COD (giao hàng thanh toán)</b></td>
                                </tr>    
                            </table> 
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-6">
                            <div class="cart-item">
                                <h2>ĐƠN HÀNG</h2><br><br>
                                <?php
                                    $uid = $_SESSION['user_id'];
                                    $sql =  "SELECT products.product_id, products.featured_image, products.product_title, product_cart.qty, products.product_price FROM product_cart INNER JOIN products ON product_cart.p_id = products.product_id WHERE product_cart.user_id = '{$uid}' ";

                                    $r = mysqli_query($conn1, $sql);
                                    $res = mysqli_fetch_all($r, MYSQLI_ASSOC);
                                    //echo '<pre>'; print_r($r); echo '</pre>';
                                    //echo '<pre>'; print_r($res); echo '</pre>';
                                    $ttcc = 0; 
                                    $pid = array();
                                    $sl = array();
                                    ?> 

                                    <?php
                                    if(count($res) > 0){ 
                                    ?>
                                <table class="table table-striped">
                                    <tr>
                                        <th style="width: 20%; text-align: center;" >ẢNH SẢN PHẨM</th>
                                        <th style="width: 30%; text-align: center;">TÊN SẢN PHẨM</th>
                                        <th style="width: 15%; text-align: center;">SỐ LƯỢNG</th>
                                        <th style="width: 15%; text-align: center;">GIÁ</th>
                                        <th style="width: 20%; text-align: center;">THÀNH TIỀN</th>
                                    </tr> 
                                      
                                    <?php foreach($res as $row){  
                                            //echo '<pre>'; print_r($row); echo '</pre>';
                                            $ttcc = $ttcc + $row['product_price']*$row['qty'];
                                            array_push($pid, $row['product_id']);
                                            array_push($sl, $row['qty']);

                                    ?>
                                    <tr>
                                        <td style="padding: 0px; align-items: center;"><div class="cart-image"><a href="single_product.php?pid=<?=$row['product_id']?>"><img src="product-images/<?=$row['featured_image']?>" alt="" width="70px"></div></a></td>
                                        <td class="item-name">
                                          <center> <?php echo $row['product_title'];?></center>
                                        </td>
                                        <td class="item-quantity">

                                            <center><?php echo $row['qty'];?></center>
                                            
                                        </td>
                                        
                                        <td class="item-price">
                                            <center><?php echo $row['product_price'].' đ';?></td></center>
                                        
                                        <td class="item-total">
                                            <center><?php echo $row['product_price']*$row['qty']; echo ' đ';?></center>
                                        </td>
                                        
                                    </tr>
                                    <?php } 
                                ?>
                                </table>
                                
                                <?php    } 
                                        
                                     else { ?>
                                <div class="empty-result">
                                    Không có đơn hàng nào.
                                </div>

                                <?php  }
                                    //echo '<pre>'; print_r($sl); echo '</pre>';
                                    $pid1 = implode(",", $pid);
                                    $sl1 = implode(",", $sl);
                                ?>
                                <hr style="margin-top: 30px;">
                                <div class="user-total-price">
                                    <div class="total-pricew" style="margin-top: 10px;" >
                                        <strong style="font-size: 20px;">TỔNG CỘNG: <span class="ttcc" style="color: red;"><?php echo $ttcc.' đ';?></span></strong>
                                    </div>               
                                </div>
                                
                                    
                                    
                     
                                    
                                <input type="hidden" id="tongTien1" name="tongTien1" value="<?=$ttcc?>">
                                <input type="hidden" id="uid1" name="uid1" value="<?=$uid?>">
                                <input type="hidden" id="pidd" name="pidd" value="<?=$pid1?>" >
                                <input type="hidden" id="sll1" name="sll1" value="<?=$sl1?>" >
                                <input type="hidden" name="">

                                <div class="thanhToan">
                                    <br><br><button onclick="" style="font-size:20px;" class="btn btn-primary" type="submit" >THANH TOÁN</button>
                                </div>
                            </div>
                                <input type="hidden" name="" value="">
                        </div>
                    </div>
                </form>
                    
            </div>
        </div>
    </div>
<script type="text/javascript">
    function check(){
        var name = document.getElementById('name').value;
        var dc = document.getElementById('DiaChi').value;
        var dt = document.getElementById('phoneNum').value;
        var note = document.getElementById('ghiChu').value;
    }
</script>
<?php include 'footer.php';

}else{
    header("Location: " . $hostname);
}
?>