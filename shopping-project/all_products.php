<?php include 'config.php'; ?>
<?php include 'header.php'; ?>

    <div class="product-section content">
        <div class="container">
            <div class="row" style="display: flex; flex-wrap: wrap">
                <div class="col-md-12">
                    <h2 class="section-head">Tất cả sản phẩm</h2>
                    <?php
                    $limit = 8;
                    $db = new Database();
                    //$db->select('products','*',null,'product_status = 1 AND qty > 0','product_id DESC',$limit);
                    $result = $db->getResult();
                    $r = mysqli_query($conn1, "SELECT * FROM products WHERE product_status = 1 AND qty > 0 ORDER BY product_id DESC"); //LIMIT $limit ");
                    $result = mysqli_fetch_all($r, MYSQLI_ASSOC);
                    if(count($result) > 0){
                        foreach($result as $row){ ?>
                            <div class="col-md-3 col-sm-6" style="height: 440px">
                                <div class="product-grid">
                                    <div class="product-image latest">
                                        <a class="image" href="single_product.php?pid=<?=$row['product_id']?>">
                                            <img height="330px" width="260px" class="pic-1" src="product-images/<?=$row['featured_image']?>">
                                        </a>
                                        <div class="product-button-group">
                                            <a href="single_product.php?pid=<?php echo $row['product_id']; ?>" ><i class="fa fa-eye"></i></a>
                                            <!-- <a href="" class="add-to-cart" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-shopping-cart"></i></a>
                                            <a href="" class="add-to-wishlist" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-heart"></i></a> -->
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title">
                                            <a href="single_product.php?pid=<?php echo $row['product_id']; ?>"><?php echo $row['product_title']; ?></a>
                                        </h3>
                                        <div class="price"> <?php echo $row['product_price']; ?><?php echo $cur_format; ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php    }
                    } ?>
                </div>
                <div class="col-md-12">
                    <!-- <div class="pagination-outer">
                    <?php echo $db->pagination('products',null,'product_status = 1 AND qty > 0',$limit); ?>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>