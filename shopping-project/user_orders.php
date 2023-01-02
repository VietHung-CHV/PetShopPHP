<?php
include 'config.php';
session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user') {

    include 'header.php'; ?>
    <div class="product-cart-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-head">Đơn hàng</h2>
                    <?php
                        $user = $_SESSION['user_id'];
                     //    $db = new Database();
                        // $db->sql('SELECT order_products.product_id,order_products.order_id,order_products.total_amount,order_products.product_qty,order_products.delivery,order_products.product_user,order_products.order_date,products.featured_image,user.f_name,user.address,user.city,payments.payment_status,GROUP_CONCAT(DISTINCT products.product_title ORDER BY products.product_id SEPARATOR "$$") as product_titles,GROUP_CONCAT(DISTINCT products.featured_image ORDER BY products.product_id) as product_images,GROUP_CONCAT(DISTINCT products.product_price ORDER BY products.product_id) as product_prices FROM order_products LEFT JOIN products ON FIND_IN_SET(products.product_id,order_products.product_id) > 0 LEFT JOIN user ON order_products.product_user=user.user_id LEFT JOIN payments ON payments.txn_id = order_products.pay_req_id WHERE product_user = '.$user.' GROUP BY order_products.order_id ORDER BY order_products.order_id DESC');
                     //    $result = $db->getResult();
                        $sql = "SELECT * FROM order_products WHERE product_user = '{$user}'";
                        $r = mysqli_query($conn1, $sql);
                        $result = mysqli_fetch_all($r, MYSQLI_ASSOC);
                        //echo '<pre>'; print_r($result); echo '</pre>';
                        if(count($result) > 0){ ?> 
                            
                            <?php foreach($result as $row){ 
                                    $pid1 = explode(',',$row['product_id']);
                                    //echo '<pre>'; print_r($pid1); echo '</pre>';
                                    $pqty = explode(',',$row['product_qty']); 
                                    
                                    ?>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="active">
                                        <th width="400px"><h4><b>Mã đơn hàng : <?php echo 'ODR00'; ?><?=$row['order_id']?></b></h4></th>
                                        <th >Ngày đặt hàng : <?=$row['order_date']?> </th>
                                        <th width="200px"><b>Địa điểm giao hàng : <?=$row['address']?> </b></th> 
                                        <th>Trạng thái: <?php if($row['status'] == '0'){
                                                echo "Chờ xác nhận";?>
                                                <br><a class="btn btn-sm btn-primary usercancelorder" href="" data-id="<?=$row['order_id']?>">Hủy đơn</a>
                                                <?php 
                                            } elseif ($row['status'] == 1) {
                                                echo "Đang giao hàng";
                                            } elseif ($row['status'] == 2) {
                                                echo "Đã giao hàng";
                                            }else{
                                                echo "Đã hủy";
                                            }?> 
                                            
                                        </th>
                                    </tr>
                                    <?php
                                    for($i=0;$i<count($pid1);$i++){
                                        $sql2 = "SELECT * FROM products WHERE product_id = '$pid1[$i]'";
                                        $r = mysqli_query($conn1, $sql2);
                                        $res1 = mysqli_fetch_assoc($r);
                                    // $product_titles = array_filter(explode('$$',$row[$i]['product_titles']));
                                    // $product_prices = array_filter(explode(',',$row[$i]['product_prices']));
                                    // $product_qty = array_filter(explode(',',$row[$i]['product_qty']));
                                    // $product_images = array_filter(explode(',',$row[$i]['product_images']));
                                    //     for($p=0;$p<count($product_qty);$p++){
                                    ?>
                                    <tr>
                                        <td>
                                            <img class="img-thumbnail" src="product-images/<?php echo $res1['featured_image']; ?>" alt="" width="100px" />
                                        </td>
                                        <td colspan="3">
                                            <span><b>Tên sản phẩm :</b> <?=$res1['product_title']?> <?php //echo $product_titles[$p]; ?></span><br/>
                                            <span><b>Đơn giá :</b> <?=$res1['product_price']?> <?php echo $cur_format; ?></span><br/>
                                            <span><b>Số lượng :</b> <?=$pqty[$i]?></span><br/>
                                            <span><b>Ghi chú:</b> <?=$row['note']?></span>
                                        </td>
                                        <!-- <td>
                                         <?php // if($row[$i]['delivery'] == '1'){
                                        //         $status = '<label class="label label-success">Delivered</label>';
                                        //     }
                                        //     else{
                                        //         $status = '<label class="label label-primary">In - Process</label>';
                                        //     } ?>
                                            <b>Địa điểm giao hàng: </b><?php  //echo $status; ?>
                                        </td>
                                        <td>
                                            <span><b>Ghi chú:</b> <?php //echo date('d',strtotime($row[$i]['order_date']. ' +4 day')); ?>  <?php //echo date('d F, Y',strtotime($row[$i]['order_date']. ' +7 day')); ?></span>
                                        </td> -->
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td  align="right"><b>Tổng tiền thanh toán</b></td>
                                        <td colspan="3"><b><?=$row['total_amount']?> <?php echo $cur_format; ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php //} 
                                }?>
                        <?php    }else{ ?>
                                <div class="empty-result">
                        No Orders Found.
                    </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php';

}else{
    header("Location: " . $hostname);
}
?>