<?php
include 'config.php';
if($_GET['search'] == ''){
    header("Location: " . $hostname);
}else {
    
    $r = mysqli_query($conn1, "SELECT site_title FROM options");
    $result = mysqli_fetch_all($r, MYSQLI_ASSOC);
    if(!empty($result)){ 
        $title = $result[0]['site_title']; 
    }else{ 
        $title = "Shop thú cưng";
    }
    include 'header.php';  ?>
    <div class="product-section content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-head">Kết quả tìm kiếm</h2>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-12">
                    <?php
                    
                    $data = $_GET['search'];
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    $search = mysqli_real_escape_string($conn1, $data);
                    
                    $r = mysqli_query($conn1, "SELECT * FROM products WHERE product_title LIKE '%{$search}%' ");
                    $result3 = mysqli_fetch_all($r, MYSQLI_ASSOC);
                    if (count($result3) > 0) {
                        foreach($result3 as $row3) {
                            ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a class="image" href="single_product.php?pid=<?php echo $row3['product_id']; ?>">
                                            <img width="260px" class="pic-1"
                                                 src="product-images/<?php echo $row3['featured_image']; ?>">
                                        </a>
                                        <div class="product-button-group">
                                            <a href="single_product.php?pid=<?php echo $row3['product_id']; ?>"><i
                                                    class="fa fa-eye"></i></a>
                                            <!-- <a href="" class="add-to-cart"
                                               data-id="<?php echo $row3['product_id']; ?>"><i
                                                    class="fa fa-shopping-cart"></i></a> -->
                                            <!-- <a href="" class="add-to-wishlist"
                                               data-id="<?php echo $row3['product_id']; ?>"><i
                                                    class="fa fa-heart"></i></a> -->
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title">
                                            <a href="single_product.php?pid=<?php echo $row3['product_id']; ?>"><?php echo substr($row3['product_title'],0,30).'...'; ?></a>
                                        </h3>
                                        <div class="price"> <?php 
                                            echo floor($row3['product_price']/1000);  
                                            echo ","; 
                                            $dv = $row3['product_price'] - floor($row3['product_price']/1000) * 1000;
                                            // echo $dv;
                                            if ($dv == 0){
                                                echo '000'; 
                                            } elseif ($dv<100){
                                                echo $dv; echo '0';
                                            } elseif ($dv <1000){
                                                echo $dv;
                                            } else {
                                                echo $dv; echo '00';
                                            }
                                            
                                            ?> <?php echo $cur_format; ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="empty-result">!!! Không tìm thấy kết quả phù hợp !!!</div>
                    <?php } ?>
                    <div class="pagination-outer">
                        <!-- <?php
                        echo $db->pagination('products',null,"product_title LIKE '%{$search}%'",$limit);
                        ?> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';

} ?>