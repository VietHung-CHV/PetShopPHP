<?php
include 'config.php';
//sads
$db = new Database();
//$brand = $db->escapeString($_GET['brand']);
$data = $_GET['brand'];
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
$brand = mysqli_real_escape_string($conn1, $data);

$db->select('brands','brand_title',null,"brand_id = '{$brand}'",null,null);
//$result = $db->getResult();
$r = mysqli_query($conn1, "SELECT brand_title FROM brands WHERE brand_id = '{$brand}'");
$result = mysqli_fetch_all($r, MYSQLI_ASSOC);

if(!empty($result)){ 
    $title = $result[0]['brand_title']; 

}else{ 
    $title = "Result Not Found";
}
$page_head = $result[0]['brand_title'];
?>
<?php include 'header.php'; ?>
    <div class="product-section content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-head"><?php echo $page_head; ?> </h2>
                </div>
            </div>
            <?php if(!empty($result)){ ?>
            <div class="row">
                <div class="col-md-3 left-sidebar">
                    
                    <h3>Related Categories</h3>
                    <ul>
                        <?php
                            //$db->select('brands','brands.brand_id,sub_categories.sub_cat_id,sub_categories.sub_cat_title','sub_categories ON sub_categories.cat_parent = brands.brand_cat',"brands.brand_id = '{$brand}'",null,null);
                            //$sub_categories = $db->getResult();
                            $r = mysqli_query($conn1, "SELECT brands.brand_id,sub_categories.sub_cat_id,sub_categories.sub_cat_title FROM brands JOIN sub_categories ON sub_categories.cat_parent = brands.brand_cat WHERE brands.brand_id = '{$brand}'");
                            $sub_categories = mysqli_fetch_all($r, MYSQLI_ASSOC);
                            if(!empty($sub_categories) && count($sub_categories) > 0){
                                foreach($sub_categories as $row2){ ?>
                                    <li><a href="category.php?cat=<?php echo $row2['sub_cat_id']; ?>"><?php echo $row2['sub_cat_title']; ?></a></li>
                            <?php }
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-md-9">
                    <?php
                    $limit = 8;
                    //$db->select('products','*',null,"product_brand = '{$brand}' AND product_status = 1 AND qty > 0",null,$limit);
                    //$result3 = $db->getResult();
                    $r = mysqli_query($conn1, "SELECT * FROM products WHERE product_brand = '{$brand}' AND product_status = 1 AND qty > 0 LIMIT $limit");
                    $result3 = mysqli_fetch_all($r, MYSQLI_ASSOC);
                    if(count($result3) > 0){
                        foreach($result3 as $row3){ ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a class="image" href="single_product.php?pid=<?php echo $row3['product_id']; ?>">
                                            <img class="pic-1" src="product-images/<?php echo $row3['featured_image']; ?>">
                                        </a>
                                        <div class="product-button-group">
                                            <a href="single_product.php?pid=<?php echo $row3['product_id']; ?>" ><i class="fa fa-eye"></i></a>
                                            <a href="" class="add-to-cart" data-id="<?php echo $row3['product_id']; ?>"><i class="fa fa-shopping-cart"></i></a>
                                            <a href="" class="add-to-wishlist" data-id="<?php echo $row3['product_id']; ?>"><i class="fa fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title">
                                            <a href="single_product.php?pid=<?php echo $row3['product_id']; ?>"><?php echo substr($row3['product_title'],0,30).'...'; ?></a>
                                        </h3>
                                        <div class="price"><?php echo $row3['product_price']; ?><?php echo $cur_format; ?> </div>
                                    </div>
                                </div>
                            </div>
                        <?php    }
                    } ?>
                    <div class="col-md-12 pagination-outer">
                        <?php
                            echo $db->pagination('products',null,"product_brand = '{$brand}' AND product_status = 1 AND qty > 0",$limit);
                        ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

<?php include 'footer.php'; ?>