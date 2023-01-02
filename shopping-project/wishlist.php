<?php
// include header file
include 'header.php'; ?>
        <div class="admin-content-container">
            <h2 class="admin-heading">Tất cả đơn hàng</h2>
            <?php
                        
                     //    $db = new Database();
                        
                     //    $result = $db->getResult();
                        $sql = "SELECT * FROM order_products";
                        $r = mysqli_query($conn1, $sql);
                        $result = mysqli_fetch_all($r, MYSQLI_ASSOC);
                        //echo '<pre>'; print_r($result); echo '</pre>';
                        if(count($result) > 0){ ?> 
                            
                            <?php foreach($result as $row){ 
                                    $pid1 = explode(',',$row['product_id']);
                                    //echo '<pre>'; print_r($pid1); echo '</pre>';
                                    $pqty = explode(',',$row['product_qty']);
                                    //echo '<pre>'; print_r($row['product_user']); echo '</pre>';
                                    $sql3 = "SELECT * FROM user WHERE user_id = {$row['product_user']}";
                                    $r3 = mysqli_query($conn1, $sql3);
                                    $res3 = mysqli_fetch_assoc($r3);
                                    ?>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="active">
                                        <th>
                                            <span><b>Tên khách hàng :</b> <?=$res3['f_name'].' '.$res3['l_name']?> <?php //echo $product_titles[$p]; ?></span><br/>
                                            <span><b>Số điện thoại :</b> <?=$res3['mobile']?> <?php echo 'đ' ?></span><br/>
                                            <span><b>Địa chỉ :</b> <?=$res3['address']?></span><br/>
                                        </th>
                                        <th ><h4><b>Mã đơn hàng : <?php echo 'ODR00'; ?><?=$row['order_id']?></b></h4></th>
                                        <th >Ngày đặt hàng : <?=$row['order_date']?> </th>
                                        <th width="200px"><b>Địa điểm giao hàng : <?=$row['address']?> </b></th> 
                                        <th>Ghi chú: <?=$row['note']?></th>
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
                                        
                                            
                                        
                                        <td colspan="5">
                                            <span><b>Tên sản phẩm :</b> <?=$res1['product_title']?> <?php //echo $product_titles[$p]; ?></span><br/>
                                            <span><b>Đơn giá :</b> <?=$res1['product_price']?> <?php echo 'đ' ?></span><br/>
                                            <span><b>Số lượng :</b> <?=$pqty[$i]?></span><br/>
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
                                        <td  align="right" colspan="2"><b>Tổng tiền thanh toán</b></td>
                                        <td colspan="3"><b><?=$row['total_amount']?> <?php echo $currency_format; ?></b></td>
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
                <!-- <div class="pagination-outer">
                    <?php echo $db->pagination('order_products','products ON order_products.product_id=products.product_id
                    LEFT JOIN user ON order_products.product_user=user.user_id LEFT JOIN payments ON payments.txn_id = order_products.pay_req_id',null,$limit); ?>
                </div> -->
        </div>
<?php
//    include footer file
    include "footer.php";
?>
