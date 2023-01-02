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
                            
                            
                            <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <th>Đơn hàng No.</th>
                            <th width="300px">Sản phẩm</th>
                            <th>Tổng số sản phẩm</th>
                            <th width="100px">Tổng tiền</th>
                            <th>Thông tin khách hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái</th>
                            <th>Hủy đơn</th>
                            </thead>
                            <tbody>
                                <?php foreach($result as $row){ 
                                    //$pid1 = explode(',',$row['product_id']);
                                    //echo '<pre>'; print_r($pid1); echo '</pre>';
                                    //$pqty = explode(',',$row['product_qty']);
                                    //echo '<pre>'; print_r($row['product_user']); echo '</pre>';
                                    $sql3 = "SELECT * FROM user WHERE user_id = {$row['product_user']}";
                                    $r3 = mysqli_query($conn1, $sql3);
                                    $res3 = mysqli_fetch_assoc($r3);
                                    ?>
                            <?php //foreach($result as $row) { 
                                //for($i=0;$i<count($row);$i++){
                                ?>
                                
                                <tr>
                                    <td><?php echo 'ODR00';?><?=$row['order_id']?></td>
                                    <td>
                                    <?php
                                    $product_code = explode(',',$row['product_id']);
                                    $product_qty = explode(',',$row['product_qty']);
                                       for($p=0;$p<count($product_code);$p++){ 
                                        $sql = "SELECT * FROM products WHERE product_id=$product_code[$p]";
                                        $r4 = mysqli_query($conn1, $sql);
                                        $res4 = mysqli_fetch_assoc($r4);?>
                                        <b>Tên sản phẩm: </b><?php echo 'PDR00';?> <?=$res4['product_title']?>  <b>Số lượng: </b><?php echo $product_qty[$p]; ?>
                                        <br>
                                    <?php } ?>

                                    </td>
                                    <td><?php echo array_sum($product_qty); ?></td>
                                    <td><?=$row['total_amount']; ?> <?php echo $currency_format;?></td>
                                    <td>
                                        <b>Họ tên : </b><?=$res3['f_name'].' '.$res3['l_name']?><br>
                                        <b>Địa chỉ : </b><?=$res3['address']?><br>
                                        <b>Địa chỉ giao hàng: </b><?=$row['address']?><br>
                                        <b>Số điện thoại : </b><?=$res3['mobile']?><br>
                                    </td>
                                    <td><?=$row['order_date']?></td>
                                    <td>
                                        <?php
                                            if($row['status'] == '2'){ ?>
                                                <span>Đã giao</span>
                                        <?php }elseif ($row['status'] == '0'){ ?>
                                                <a class="btn btn-sm btn-primary ordercheck" href="" data-id="<?=$row['order_id']?>">Chờ xác nhận</a>
                                        <?php } elseif ($row['status'] == '1'){?>
                                            <a class="btn btn-sm btn-primary order_complete" href="" data-id="<?=$row['order_id']?>">Đang giao</a>
                                        <?php } else {?>
                                            <span class="label label-success">Đã hủy</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($row['status'] == '0'){ ?>
                                                <a class="btn btn-sm btn-danger ordercancel" href="" data-id="<?=$row['order_id']?>">Hủy</a>
                                        <?php } ?>
                                    </td>   
                                </tr>
                            <?php //} 
                            }?>
                            </tbody>
                        </table>
                            <?php //} 
                                //}?>
                        <?php    }else{ ?>
                                <div class="empty-result">
                        No Orders Found.
                    </div>
                        <?php } ?>
                
        </div>
<?php
//    include footer file
    include "footer.php";
?>
