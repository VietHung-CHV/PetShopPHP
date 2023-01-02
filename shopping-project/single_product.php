<?php include 'config.php';  //config file
session_start(); 
if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
} else {
    $uid = -1;
}
$p_id = $_GET['pid'];
$db = new Database();
$db->sql("UPDATE products SET product_views=product_views+1 WHERE product_id=".$p_id);
$res = $db->getResult();

//$db->select('products','*',null,"product_id= '{$p_id}'",null,null);
//$single_product = $db->getResult();
$r = mysqli_query($conn1, "SELECT * FROM products WHERE product_id= '{$p_id}'");
$single_product = mysqli_fetch_all($r, MYSQLI_ASSOC);
if(count($single_product) > 0){ 
    $title = $single_product[0]['product_title'];   //set dynamic header
    // include header

    include 'header.php'; ?>
<div class="single-product-container">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-6 col-md-8">
                <?php
                $db = new Database();
                //$db->select('sub_categories','*',null,"sub_cat_id='{$single_product[0]['product_sub_cat']}'",null,null);
                //$category = $db->getResult();

                $r1 = mysqli_query($conn1, "SELECT * FROM sub_categories WHERE sub_cat_id='{$single_product[0]['product_sub_cat']}'");
                $category = mysqli_fetch_all($r1, MYSQLI_ASSOC);
                ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo $hostname; ?>">Trang chủ</a></li>
                    <li><a href="category.php?cat=<?php echo $category[0]['sub_cat_id']; ?>"><?php echo $category[0]['sub_cat_title']; ?></a></li>
                    <li class="active"><?php echo substr($title,0,30).'....'; ?></li>
                </ol>
            </div> 
        </div>
        <div class="row">
        <?php foreach($single_product as $row){ ?>
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-5">
                    <div class="product-image">
                        <img  id="product-img" src="product-images/<?php echo $row['featured_image'] ?>" alt=""/>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="product-content">
                        
                        <h3 class="title" style="font-size: 40px;"><?php echo $row['product_title']; ?></h3>
                        <span style="font-size: 24px;" class="price"> <?php 
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
                                            
                                            ?> <?php echo $cur_format; ?></span><br>
                        <p class="description" style="font-size: 25px;"><?php echo html_entity_decode($row['product_desc']); ?></p>
                        <label style="font-size: 24px;">Số lượng: </label> 
                        <input id="slg1" class="slg1" name="slg1" type="number" value="1" min="1" style="width: 3em; font-size: 20px; "><br><br>
                        <input type="hidden" id="item-id" class="item-id" value="<?php echo $row['product_id']; ?>"/>
                        <input type="hidden" name="uid1" id="uid1" value="<?=$uid?>">
                        <button type="submit" style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;"><a id="btnc" style="font-size: 26px;" class="add-to-cart" data-id="<?=$row['product_id']?>" href="#" ping="" rel="<?=$uid?>" ><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a></button>
                        <!-- <a class="add-to-wishlist" data-id="<?php echo $row['product_id']; ?>" href="">Add to Wislist</a> -->
                    
                    </div>
                    <form action="add_product_cart.php" method="post" id="apc">
                        <input type="hidden" name="uid" id="uid" value="<?=$uid?>">
                        <input type="hidden" name="slg_input" id="slg_input">
                        <input type="hidden" name="pd_id" id="pd_id" value="<?=$row['product_id']?>">
                    </form>
                </div>
                <!-- <div class="col-md-2"></div> -->
    <?php   } ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; 
}else{
    echo 'Page Not Found';

}
?>
<script type="text/javascript">
    // function add(){
    //     var f = document.getElementById('apc');
    //     //document.getElementById('btnc').value = id;
    //     document.getElementById('slg_input').value = document.getElementById('slg').value;
    //     var d = document.getElementById('slg_input').value ;
        
    //     //document.getElementById('uid').value = 
        
    //     f.submit();
    // }
</script>