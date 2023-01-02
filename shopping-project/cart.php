<?php include 'config.php'; ?>
<?php

session_start(); 
if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
} else {
    $uid = -1;
}
include 'header.php'; ?>

<div class="product-cart-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <h2 class="section-head">Giỏ hàng</h2>
                <?php
                    
                        // $db = new Database();
                        // $db->select('products','*',null,'product_id IN ('.$pids.')',null,null);
                        //$result = $db->getResult();

                        //$r = mysqli_query($conn1, "SELECT * FROM products WHERE product_id IN ($pids) ");
                        $r9 = mysqli_query($conn1, "SELECT * FROM product_cart WHERE user_id = $uid");
                        $res9 = mysqli_fetch_all($r9, MYSQLI_ASSOC);
                        //$result = mysqli_fetch_all($r, MYSQLI_ASSOC);
                        // echo '<pre>'; print_r($r); echo '</pre>';
                        // echo '<pre>'; print_r($result); echo '</pre>';
                        // if (isset($uid)) {
                        //     $r1 = mysqli_query($conn1, "SELECT * FROM product_cart WHERE p_id IN ($pids) AND user_id=$uid ");
                        //     $res1 = mysqli_fetch_assoc($r1);
                        // }
                        if(count($res9) > 0 ){ ?>
                                <table class="table table-bordered">
                                    <thead>
                                    <th>Hình ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th width="120px">Đơn giá</th>
                                    <th width="100px">Số lượng</th>
                                    <th width="100px">Tổng tiền</th>
                                    <th>Hành động</th>
                                    </thead>
                                    <tbody>
                                <?php foreach($res9 as $row){
                                    // echo '<pre>'; print_r($uid); echo '</pre>';
                                    // echo '<pre>'; print_r($row['product_id']); echo '</pre>';
                                    $pd = $row['p_id'];
                                    if (isset($uid)) {
                                        $r1 = mysqli_query($conn1, "SELECT * FROM products WHERE product_id = $pd");
                                        $res8 = mysqli_fetch_assoc($r1);
                                    }
                                    
                                    // echo '<pre>'; print_r($r1); echo '</pre>';
                                    // echo '<pre>'; print_r($res1); echo '</pre>';
                                    ?>
                                    <tr class="item-row">
                                        <td><img src="product-images/<?php echo $res8['featured_image']; ?>" alt="" width="70px" /></td>
                                        <td><a href="single_product.php?pid=<?php echo $res8['product_id']; ?>" ><?php echo $res8['product_title']; ?></a></td>
                                        <td> <span class="product-price"><?php echo $res8['product_price']; ?></span> <?php echo $cur_format; ?></td>
                                        <td>
                                            <?php if (isset($uid)) { ?>
                                            <input class="form-control item-qty" type="number" value="<?=$row['qty']?>" min="1" />
                                            <?php } else { ?>
                                            <input class="form-control item-qty" type="number" value="1" min="1" />
                                            <?php } ?>
                                            <input type="hidden" class="item-id" value="<?php echo $res8['product_id']; ?>"/>
                                            <input type="hidden" class="item-price" value="<?php echo $res8['product_price']; ?>"/>
                                        </td>
                                        <td><span class="sub-total">
                                            <?php 
                                            if (isset($uid)) { 
                                                echo $res8['product_price']*$row['qty']; ?> </span> <?php echo $cur_format; } else { 
                                            echo $res8['product_price']; ?> </span> <?php echo $cur_format;
                                             } ?>
                                        <td>
                                            <a class="btn btn-sm btn-primary remove-cart-item" href="" data-id="<?php echo $row['p_id']; ?>" rel="<?=$uid?>"><i class="fa fa-remove"></i></a>
                                        </td>
                                    </tr>
                        <?php    } ?>
                                    <tr>
                                        <td colspan="5" align="right"><b>TỔNG CỘNG (<?php echo $cur_format; ?>)</b></td>
                                        <td class="total-amount"></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <a class="btn btn-sm btn-primary" href="<?php echo $hostname; ?>" >Tiếp tục mua sắm</a>
                                <?php if(isset($_SESSION['user_role'])){ ?>

                                <form action="donhang.php" class="checkout-form pull-right" method="POST">
                                    <?php
                                        $product_id = '';
                                        foreach($res9 as $res7){
                                            $product_id .= $res7['p_id'].',';
                                        }
                                    ?>
                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                    <input type="hidden" name="product_total" class="total-price" value="">
                                    <input type="hidden" name="product_qty" class="total-qty" value="1">
                                    <input type="submit" class="btn btn-md btn-success" value="Thanh toán">
                                </form>
                                <?php }else{ ?>
                                    <a class="btn btn-sm btn-success pull-right" href="#" data-toggle="modal" data-target="#userLogin_form" >Thanh toán</a>
                                <?php } ?>
                <?php   }
                    { ?>
                        <!-- <div class="empty-result">
                            Gior hang trong
                        </div> -->
                    <?php }
                ?>


            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?> 
