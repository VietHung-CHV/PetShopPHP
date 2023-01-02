<?php include 'config.php';  //include config
// set dynamic title
$db = new Database();
$db->select('options','site_title',null,null,null,null);
//$result = $db->getResult();

$r = mysqli_query($conn1, "SELECT site_title FROM options ");
$result = mysqli_fetch_all($r, MYSQLI_ASSOC);
if(!empty($result)){ 
    $title = $result[0]['site_title']; 
}else{ 
    $title = "Shopping Project";
}
// include header 
include 'header.php'; ?>
<div id="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-content ">
                    <div class="banner-carousel owl-carousel owl-theme">
                        <!-- <div class="item">
                            <img src="images/banner-img-2.jpg" alt=""/>
                        </div> -->
                        <div class="item">
                            <img src="images/1624240440_banner1.jpg" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-section popular-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-head">Đồ ăn</h2>
                <div class="popular-carousel owl-carousel owl-theme">
                    <?php
                        
                        $r = mysqli_query($conn1, "SELECT * FROM products JOIN categories ON products.product_cat = categories.cat_id  WHERE cat_title = 'Đồ ăn' AND qty > 0 AND product_status = 1");
                        $result = mysqli_fetch_all($r, MYSQLI_ASSOC);
                        if(count($result) > 0){
                            foreach($result as $row){ ?>
                    <div class="product-grid latest item">
                        <div class="product-image popular">
                            <a class="image" href="single_product.php?pid=<?php echo $row['product_id']; ?>">
                                <img class="pic-1" src="product-images/<?php echo $row['featured_image']; ?>">
                            </a>
                            <div class="product-button-group">
                                <a href="single_product.php?pid=<?php echo $row['product_id']; ?>" ><i class="fa fa-eye"></i></a>
                                <!-- <a href="" class="add-to-cart" data-id="<?php echo $row['product_id']; ?>" data-target="#userLogin_form"><i class="fa fa-shopping-cart"></i></a> -->
                                
                            </div>
                        </div>
                        <div class="product-content">
                            <h3 class="title">
                                <a href="single_product.php?pid=<?php echo $row['product_id']; ?>"><?php echo $row['product_title']; ?></a>
                            </h3>
                            <div class="price"><?php 
                                            echo floor($row['product_price']/1000);  
                                            echo ","; 
                                            $dv = $row['product_price'] - floor($row['product_price']/1000) * 1000;
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
                                            
                                            ?> <?php echo $cur_format; ?> </div>
                        </div>
                    </div>
                    <?php    }
                    }else{
                } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-head">Phụ kiện</h2>
                <div class="latest-carousel owl-carousel owl-theme">
                    <?php
            
            $r = mysqli_query($conn1, "SELECT * FROM products JOIN categories ON products.product_cat = categories.cat_id  WHERE cat_title = 'Phụ kiện' AND qty > 0 AND product_status = 1");
            $result = mysqli_fetch_all($r, MYSQLI_ASSOC);
            if(count($result) > 0){
                foreach($result as $row){ ?>
                    <div class="product-grid latest item">
                        <div class="product-image popular">
                            <a class="image" href="single_product.php?pid=<?php echo $row['product_id']; ?>">
                                <img class="pic-1" src="product-images/<?php echo $row['featured_image']; ?>">
                            </a>
                            <div class="product-button-group">
                                <a href="single_product.php?pid=<?php echo $row['product_id']; ?>" ><i class="fa fa-eye"></i></a>
                                <!-- <a href="" class="add-to-cart" data-id="<?php echo $row['product_id']; ?>" data-target="#userLogin_form"><i class="fa fa-shopping-cart"></i></a> -->
                                
                            </div>
                        </div>
                        <div class="product-content">
                            <h3 class="title">
                                <a href="single_product.php?pid=<?php echo $row['product_id']; ?>"><?php echo $row['product_title']; ?></a>
                            </h3>
                            <div class="price"><?php 
                                            echo floor($row['product_price']/1000);  
                                            echo ","; 
                                            $dv = $row['product_price'] - floor($row['product_price']/1000) * 1000;
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
                                            
                                            ?> <?php echo $cur_format; ?> </div>
                        </div>
                    </div>
        <?php    }
            }?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>