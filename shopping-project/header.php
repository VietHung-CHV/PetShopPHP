<?php 
    $db = new Database();
    //$db->select('options','site_name,site_logo,currency_format');
    //$header = $db->getResult();

    $r =mysqli_query($conn1, "SELECT * FROM options");
    $header = mysqli_fetch_all($r, MYSQLI_ASSOC);

    $cur_format = '$';
    if(!empty($header[0]['currency_format'])){
        $cur_format = $header[0]['currency_format'];
    }
    //session_start();
    if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
    } else {
        $uid = -1;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php if(isset($title)){ ?>
        <title><?php echo $title; ?></title>
    <?php }else{ ?>
        <title>Shop thú cưng</title>
    <?php } ?>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900|Montserrat:400,500,700,900" rel="stylesheet">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="css/owl.theme.default.min.css"/>
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-2">
                <?php
                    if(!empty($header[0]['site_logo'])){ ?>
                        <a href="<?php echo $hostname; ?>" class="logo-img"><img src="images/<?php echo $header[0]['site_logo']; ?>" alt=""></a>
                    <?php }else{ ?>
                        <a href="<?php echo $hostname; ?>" class="logo"><?php echo $header[0]['site_name']; ?></a>
                    <?php } ?>
            </div>
            <!-- /LOGO -->
            <div class="col-md-7">
                <form action="search.php" method="GET">
                <div class="input-group search">
                    <input type="text" class="form-control" name="search" placeholder="Tìm kiếm...">
                    <span class="input-group-btn">
                        <input class="btn btn-default"  type="submit" value="Tìm kiếm" />
                    </span>
                </div>
                </form>
            </div>
            <div class="col-md-3">
                <ul class="header-info">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <?php
                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                            }
                            if(isset($_SESSION["user_role"])){ ?>
                                 <?php echo $_SESSION["username"]; ?><i class="caret"></i>
                            <?php  }else{ ?>
                                <i class="fa fa-user"></i>
                            <?php  } ?>

                        </a>
                        <ul class="dropdown-menu">
                            <!-- Trigger the modal with a button -->
                            <?php
                                if(isset($_SESSION["user_role"])){ ?>
                                    <li><a href="user_profile.php" class="" >Cá nhân</a></li>
                                    <li><a href="user_orders.php" class="" >Đơn hàng</a></li>
                                    <li><a href="javascript:void()" class="user_logout" >Đăng xuất</a></li>
                            <?php  }else{ ?>
                                    <li><a data-toggle="modal" data-target="#userLogin_form" href="#">Đăng nhập</a></li>
                                    <li><a href="register.php">Đăng ký</a></li>
                              <?php  } ?>

                        </ul>
                    </li>
                    <li>
                        <!-- <a href="wishlist.php"><i class="fa fa-heart"></i>
                            <?php if(isset($_COOKIE['wishlist_count'])){
                                    echo '<span>'.$_COOKIE["wishlist_count"].'</span>';
                                } ?>
                        </a> -->
                    </li>
                    <li>
                        <a class="header_cart" href="cart.php"><i class="fa fa-shopping-cart"></i>
                            <?php //if(isset($_COOKIE['cart_count'])){
                                    //echo '<span>'.$_COOKIE["cart_count"].'</span>';
                                //} 
                                $sqll = "SELECT COUNT(user_id) AS num_cart FROM product_cart WHERE user_id = $uid";
                                $r = mysqli_query($conn1, $sqll);
                                $res = mysqli_fetch_assoc($r);
                                echo '<span>'.$res['num_cart'].'</span>';
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="userLogin_form" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <!-- Form -->
                            <form  id="loginUser" method ="POST">
                                <div class="customer_login"> 
                                    <h2>Đăng nhập</h2>
                                    <div class="form-group">
                                        <label>Tên đăng nhập</label>
                                        <input type="email" class="form-control username" placeholder="Tên đăng nhập" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" class="form-control password" placeholder="Mật khẩu" autocomplete="off" required>
                                    </div>
                                    <input type="submit" name="login" class="btn" value="Đăng nhập"/>
                                    <span>Không có tài khoản? <a href="register.php">Đăng ký</a></span>
                                </div>
                            </form>
                            <!-- /Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modal -->
        </div>
    </div>
</div>
<div id="header-menu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="menu-list">
                    <li><a href="index.php">Trang chủ</a></li>
                    <!-- <?php
                    // $db = new Database();
                    // $db->select('sub_categories','*',null,'cat_products > 0 AND show_in_header = "1"',null,null);
                    // $result = $db->getResult();
                    // $r = mysqli_query($conn1, 'SELECT * FROM categories');
                    $r = mysqli_query($conn1, 'SELECT * FROM sub_categories WHERE show_in_header = "1"');
                    $result = mysqli_fetch_all($r, MYSQLI_ASSOC);
                    if(count($result) > 0){
                        foreach($result as $res){ ?>
                            <li><a href="category.php?cat=<?php echo $res['sub_cat_id']; ?>"><?php echo $res['sub_cat_title']; ?></a></li>
                        <?php    }
                    } ?> -->
                    <?php 
                        // $cat_qry = $conn->query("SELECT * FROM categories where status = 1 ");
                        
                        $cat_qry = mysqli_query($conn1, 'SELECT * FROM categories');
                        while($crow = mysqli_fetch_assoc($cat_qry)):
                          // $sub_qry = $conn->query("SELECT * FROM sub_categories where status = 1 and parent_id = '{$crow['id']}' ");
                            $sub_qry = mysqli_query($conn1, "SELECT * FROM sub_categories WHERE cat_parent = '{$crow['cat_id']}' and show_in_header = 1");
                          if($sub_qry->num_rows <= 0):
                        ?>
                        <!-- <li class="nav-item"><a class="nav-link" aria-current="page" href="./?p=products&c=<?php echo $crow['cat_id'] ?>"><?php echo $crow['cat_title'] ?></a></li> -->
                        
                        <?php else: ?>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" id="navbarDropdown<?php echo $crow['cat_id'] ?>" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><?php echo $crow['cat_title'] ?></a></a>
                            <ul style="background-color: #df3500; " class="dropdown-menu  p-0" aria-labelledby="navbarDropdown<?php echo $crow['cat_id'] ?>">
                              <?php while($srow = mysqli_fetch_assoc($sub_qry)): ?>
                                <li style="background-color: #df3500;"><a class="dropdown-item      border-bottom" href="category.php?cat=<?php echo $srow['sub_cat_id']; ?>"><?php echo $srow['sub_cat_title'] ?></a></li>
                            <?php endwhile; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>