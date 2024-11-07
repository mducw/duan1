<?php 
ob_start();
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooky Market | Cooky</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon/favicon-96x96.png">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/page-container.css">
    <link rel="stylesheet" href="./assets/css/product-detail.css">
    <link rel="stylesheet" href="./assets/css/checkout.css">
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/css/invoice.css">
    <link rel="stylesheet" href="./assets/css/view-cart.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/css/comment-form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>
    <div class="app">
        <header class="header ">
            <div class="navigation-bar">
                <div class="me-3">
                    <a href="./index.php">
                        <img src="./assets/images/logo/sri9li0oetshdwb4esa34.jpg" height="40px" alt="Logo Cooky">
                    </a>
                </div>
                <div class="search-input">
                    <span class="icon-search" ><i class="fa-solid fa-magnifying-glass"></i></span>
                   
                    <input tabindex="0" type="text" id="search-input" placeholder="Tìm kiếm sản phẩm...">
                </div>
                <div class="user">
                    <div class="download-app-button">
                    <i class="fas fa-phone pe-2"></i>Liên hệ
                        <div class="phone-hover">
                            <div class="phone-hover-text">
                            <p><i class="fas fa-phone pe-2"></i>02862861131</p>
                            <p><i class="fas fa-envelope pe-2 mb-0"></i>congmd0504@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="me-3"> 
                        <select name="" id="" style="width: 120px;height: 38px;background-color: red; color: white; " class="text-center border-white form-select rounded-pill">
                            <option value="" style="color: red;" class="bg-white" selected>Hà Nội</option>
                            <option value="" style="color: red;"class="bg-white" >TP.HCM</option>
                        </select>
                        </div>
                        <button class="cart-icon action n-btn " title="Giỏ hàng">
                        <a class="d-flex text-decoration-none" href="index.php?act=view-cart"><img class="icon" src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695386172/cooky%20market%20-%20PHP/fcmcexgvocebzmhuntfm.svg" alt="Cart">
                        <span style="margin-top:-6px; margin-left: -7px; width: 20px; height:20px; color:red;" class="rounded-circle bg-white">
                            <?php 
                            if (isset($_SESSION['login'])){
                                $id_khach_hang = $_SESSION['login']['id_khach_hang'];
                                $gio_hang = dem_gio_hang($id_khach_hang);
                                $dem_gio_hang= count($gio_hang);
                                echo $dem_gio_hang;
                            } else{
                                echo 0;
                            }
                            ?>
                        </span></a>
                    </button>  
                    <?php 
                    if(isset($_SESSION['login'])){
                        extract($_SESSION['login']);
                    ?>
                    <div class="hotline action login ">
                            <a style="text-decoration: none; color:white" href="index.php?act=form_account"><i class="fa-solid fa-user icon"></i><p><?=$ten_dang_nhap?></p></a>
                        </div>
                    <?php 
                }else{ 
                ?>
                    <div class="hotline action login">
                    <i class="fa-solid fa-user icon"></i>
                        <a class="user-name" href="index.php?act=login">Đăng nhập</a>
                    </div>
                    <?php }?>
                </div>
            </div>
        </header>
        
</body>
</html>