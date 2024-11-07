<?php
$image = isset($_SESSION['login']['hinh_anh']) ? $imagePath . $_SESSION['login']['hinh_anh'] : "";
$ho_ten = isset($_SESSION['login']['ho_ten']) ? $_SESSION['login']['ho_ten'] : "";
$phone = isset($_SESSION['login']['phone']) ? $_SESSION['login']['phone'] : "";
$dia_chi = isset($_SESSION['login']['dia_chi']) ? $_SESSION['login']['dia_chi'] : "";
$id_khach_hang = $_SESSION['login']['id_khach_hang'];
$don_hang_all = select_don_hang_by_id($id_khach_hang);

?>
<div class="d-flex align-items-center " style="height: 55px; background-color: #f9f9f9;">
    <div class="container ">
        <a class="text-decoration-none" href="index.php"><span class="text-black">Cooky</span> </a> / <span
            class="text-danger">Xem lịch sử đơn hàng</span>
    </div>
</div>
<div class="container">
    <div class="row mt-4">
        <div class="col-3 border border-secondary-subtle rounded p-3 " style="height: 200px;">
            <div class="d-flex align-items-center ">
                <img class="rounded-circle" src="<?= $image ?>" alt="" height="40px">
                <h6 class="ms-2"><?= $_SESSION['login']['ten_dang_nhap'] ?></h6>
            </div>
            <hr class="mt-2">
            <div class="mt-2">
                <div class="d-flex">
                    <span class="fw-bold">Họ tên:</span><span><?= $ho_ten ?></span>
                </div>
                <div class="d-flex">
                    <span class="fw-bold">Email:</span><span><?= $email ?></span>
                </div>
                <div class="d-flex">
                    <span class="fw-bold">Số điện thoại:</span><span><?= $phone ?></span>
                </div>
                <div class="d-flex">
                    <span class="fw-bold">Địa chỉ:</span><span><?= $dia_chi ?></span>
                </div>
            </div>
        </div>
        <div class="col-9">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tat-ca-tab" data-bs-toggle="tab"
                        data-bs-target="#tat-ca-tab-pane" type="button" role="tab" aria-controls="tat-ca-tab-pane"
                        aria-selected="true">
                        Tất cả
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="chua-thanh-toan-tab" data-bs-toggle="tab"
                        data-bs-target="#chua-thanh-toan-tab-pane" type="button" role="tab"
                        aria-controls="chua-thanh-toan-tab-pane" aria-selected="false">
                        Chưa thanh toán
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cho-xac-nhan-tab" data-bs-toggle="tab"
                        data-bs-target="#cho-xac-nhan-tab-pane" type="button" role="tab"
                        aria-controls="cho-xac-nhan-tab-pane" aria-selected="false">
                        Chờ xác nhận
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cho-lay-hang-tab" data-bs-toggle="tab"
                        data-bs-target="#cho-lay-hang-tab-pane" type="button" role="tab"
                        aria-controls="cho-lay-hang-tab-pane" aria-selected="false">
                        Đang xử lý
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cho-giao-hang-tab" data-bs-toggle="tab"
                        data-bs-target="#cho-giao-hang-tab-pane" type="button" role="tab"
                        aria-controls="cho-giao-hang-tab-pane" aria-selected="false">
                        Đang giao hàng
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="hoan-thanh-tab" data-bs-toggle="tab"
                        data-bs-target="#hoan-thanh-tab-pane" type="button" role="tab"
                        aria-controls="hoan-thanh-tab-pane" aria-selected="false">
                        Hoàn thành
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="da-huy-tab" data-bs-toggle="tab" data-bs-target="#da-huy-tab-pane"
                        type="button" role="tab" aria-controls="da-huy-tab-pane" aria-selected="false">
                        Đã Hủy
                    </button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tat-ca-tab-pane" role="tabpanel" aria-labelledby="tat-ca-tab"
                    tabindex="0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Trạng thái đơn</th>
                                <th>Phương thức thanh toán</th>
                                <th>Ngày đặt</th>
                                <th>Ghi chú</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($don_hang_all as $don_hang):
                                extract($don_hang);
                                ?>
                                <tr>
                                    <td><span class="text-primary fw-bold"><?= $id_don_hang ?></span></td>
                                    <td><?php
                                    if ($id_trang_thai_don == 1) {
                                        echo "Chờ xác nhận";
                                    }
                                    if ($id_trang_thai_don == 2) {
                                        echo "Đã xác nhận";
                                    }
                                    if ($id_trang_thai_don == 3) {
                                        echo "Đang xử lý";
                                    }
                                    if ($id_trang_thai_don == 4) {
                                        echo "Đang vận chuyển";
                                    }
                                    if ($id_trang_thai_don == 5) {
                                        echo "Giao thành công";
                                    }
                                    if ($id_trang_thai_don == 6) {
                                        echo "Đã hủy";
                                    }
                                    if ($id_trang_thai_don == 7) {
                                        echo "Chờ thanh toán";
                                    }
                                    ?></td>
                                    <td>
                                        <?php
                                        if ($payment_method == 1) {
                                            echo "Thanh toán khi nhận hàng ";
                                        } else {
                                            echo "Thanh toán onlline";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $ngay_tao ?></td>
                                    <td><?= $note ?></td>
                                    <td><a href="index.php?act=detail-don-hang&id-don-hang=<?= $id_don_hang ?>"
                                            class="text-danger text-decoration-none">Xem chi tiết</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="chua-thanh-toan-tab-pane" role="tabpanel"
                    aria-labelledby="chua-thanh-toan-tab" tabindex="0">
                    <?php
                    $kiem_tra7 = false;
                    foreach ($don_hang_all as $don_hang) {
                        if ($don_hang['id_trang_thai_don'] == 7) {
                            $kiem_tra7 = true;
                            break;
                        }
                    }
                    ?>
                    <?php if (!$kiem_tra7): ?>
                        <div class="d-flex align-items-center" style="height: 160px; width: 100%;">
                            <span style="width: 100%;" class="text-warning text-center">Không có đơn hàng nào !</span>
                        </div>
                    <?php else: ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái đơn</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Ngày đặt</th>
                                    <th>Ghi chú</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($don_hang_all as $don_hang):
                                    extract($don_hang);
                                    if ($id_trang_thai_don != 7) {
                                        continue;
                                    }
                                    ?>
                                    <tr>
                                        <td><span class="text-primary fw-bold"><?= $id_don_hang ?></span></td>
                                        <td><?php
                                        if ($id_trang_thai_don == 1) {
                                            echo "Chờ xác nhận";
                                        }
                                        if ($id_trang_thai_don == 2) {
                                            echo "Đã xác nhận";
                                        }
                                        if ($id_trang_thai_don == 3) {
                                            echo "Đang xử lý";
                                        }
                                        if ($id_trang_thai_don == 4) {
                                            echo "Đang vận chuyển";
                                        }
                                        if ($id_trang_thai_don == 5) {
                                            echo "Giao thành công";
                                        }
                                        if ($id_trang_thai_don == 6) {
                                            echo "Đã hủy";
                                        }
                                        if ($id_trang_thai_don == 7) {
                                            echo "Chờ thanh toán";
                                        }
                                        ?></td>
                                        <td>
                                            <?php
                                            if ($payment_method == 1) {
                                                echo "Thanh toán khi nhận hàng ";
                                            } else {
                                                echo "Thanh toán onlline";
                                            }
                                            ?>
                                        </td>
                                        <td><?= $ngay_tao ?></td>
                                        <td><?= $note ?></td>
                                        <td><a href="index.php?act=detail-don-hang&id-don-hang=<?= $id_don_hang ?>"
                                                class="text-danger text-decoration-none">Xem chi tiết</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="cho-xac-nhan-tab-pane" role="tabpanel" aria-labelledby="cho-xac-nhan-tab"
                    tabindex="0">
                    <?php
                    $kiem_tra1 = false;
                    foreach ($don_hang_all as $don_hang) {
                        if ($don_hang['id_trang_thai_don'] == 1) {
                            $kiem_tra1 = true;
                            break;
                        }
                    }
                    ?>
                    <?php if (!$kiem_tra1): ?>
                        <div class="d-flex align-items-center" style="height: 160px; width: 100%;">
                            <span style="width: 100%;" class="text-warning text-center">Không có đơn hàng nào !</span>
                        </div>
                    <?php else: ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái đơn</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Ngày đặt</th>
                                    <th>Ghi chú</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($don_hang_all as $don_hang):
                                    extract($don_hang);
                                    if ($id_trang_thai_don != 1) {
                                        continue;
                                    }
                                    ?>
                                    <tr>
                                        <td><span class="text-primary fw-bold"><?= $id_don_hang ?></span></td>
                                        <td><?php
                                        if ($id_trang_thai_don == 1) {
                                            echo "Chờ xác nhận";
                                        }
                                        if ($id_trang_thai_don == 2) {
                                            echo "Đã xác nhận";
                                        }
                                        if ($id_trang_thai_don == 3) {
                                            echo "Đang xử lý";
                                        }
                                        if ($id_trang_thai_don == 4) {
                                            echo "Đang vận chuyển";
                                        }
                                        if ($id_trang_thai_don == 5) {
                                            echo "Giao thành công";
                                        }
                                        if ($id_trang_thai_don == 6) {
                                            echo "Đã hủy";
                                        }
                                        if ($id_trang_thai_don == 7) {
                                            echo "Chờ thanh toán";
                                        }
                                        ?></td>
                                        <td>
                                            <?php
                                            if ($payment_method == 1) {
                                                echo "Thanh toán khi nhận hàng ";
                                            } else {
                                                echo "Thanh toán onlline";
                                            }
                                            ?>
                                        </td>
                                        <td><?= $ngay_tao ?></td>
                                        <td><?= $note ?></td>
                                        <td><a href="index.php?act=detail-don-hang&id-don-hang=<?= $id_don_hang ?>"
                                                class="text-danger text-decoration-none">Xem chi tiết</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="cho-lay-hang-tab-pane" role="tabpanel" aria-labelledby="cho-lay-hang-tab"
                    tabindex="0">
                    <?php
                    $kiem_tra3 = false;
                    foreach ($don_hang_all as $don_hang) {
                        if ($don_hang['id_trang_thai_don'] == 3) {
                            $kiem_tra3 = true;
                            break;
                        }
                    }
                    ?>
                    <?php if (!$kiem_tra3): ?>
                        <div class="d-flex align-items-center" style="height: 160px; width: 100%;">
                            <span style="width: 100%;" class="text-warning text-center">Không có đơn hàng nào !</span>
                        </div>
                    <?php else: ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái đơn</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Ngày đặt</th>
                                    <th>Ghi chú</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($don_hang_all as $don_hang):
                                    extract($don_hang);
                                    if ($id_trang_thai_don != 3) {
                                        continue;
                                    }
                                    ?>
                                    <tr>
                                        <td><span class="text-primary fw-bold"><?= $id_don_hang ?></span></td>
                                        <td><?php
                                        if ($id_trang_thai_don == 1) {
                                            echo "Chờ xác nhận";
                                        }
                                        if ($id_trang_thai_don == 2) {
                                            echo "Đã xác nhận";
                                        }
                                        if ($id_trang_thai_don == 3) {
                                            echo "Đang xử lý";
                                        }
                                        if ($id_trang_thai_don == 4) {
                                            echo "Đang vận chuyển";
                                        }
                                        if ($id_trang_thai_don == 5) {
                                            echo "Giao thành công";
                                        }
                                        if ($id_trang_thai_don == 6) {
                                            echo "Đã hủy";
                                        }
                                        if ($id_trang_thai_don == 7) {
                                            echo "Chờ thanh toán";
                                        }
                                        ?></td>
                                        <td>
                                            <?php
                                            if ($payment_method == 1) {
                                                echo "Thanh toán khi nhận hàng ";
                                            } else {
                                                echo "Thanh toán onlline";
                                            }
                                            ?>
                                        </td>
                                        <td><?= $ngay_tao ?></td>
                                        <td><?= $note ?></td>
                                        <td><a href="index.php?act=detail-don-hang&id-don-hang=<?= $id_don_hang ?>"
                                                class="text-danger text-decoration-none">Xem chi tiết</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="cho-giao-hang-tab-pane" role="tabpanel"
                    aria-labelledby="cho-giao-hang-tab" tabindex="0">
                    <?php
                    $kiem_tra4 = false;
                    foreach ($don_hang_all as $don_hang) {
                        if ($don_hang['id_trang_thai_don'] == 4) {
                            $kiem_tra4 = true;
                            break;
                        }
                    }
                    ?>
                    <?php if (!$kiem_tra4): ?>
                        <div class="d-flex align-items-center" style="height: 160px; width: 100%;">
                            <span style="width: 100%;" class="text-warning text-center">Không có đơn hàng nào !</span>
                        </div>
                    <?php else: ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái đơn</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Ngày đặt</th>
                                    <th>Ghi chú</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($don_hang_all as $don_hang):
                                    extract($don_hang);
                                    if ($id_trang_thai_don != 4) {
                                        continue;
                                    }
                                    ?>
                                    <tr>
                                        <td><span class="text-primary fw-bold"><?= $id_don_hang ?></span></td>
                                        <td><?php
                                        if ($id_trang_thai_don == 1) {
                                            echo "Chờ xác nhận";
                                        }
                                        if ($id_trang_thai_don == 2) {
                                            echo "Đã xác nhận";
                                        }
                                        if ($id_trang_thai_don == 3) {
                                            echo "Đang xử lý";
                                        }
                                        if ($id_trang_thai_don == 4) {
                                            echo "Đang vận chuyển";
                                        }
                                        if ($id_trang_thai_don == 5) {
                                            echo "Giao thành công";
                                        }
                                        if ($id_trang_thai_don == 6) {
                                            echo "Đã hủy";
                                        }
                                        if ($id_trang_thai_don == 7) {
                                            echo "Chờ thanh toán";
                                        }
                                        ?></td>
                                        <td>
                                            <?php
                                            if ($payment_method == 1) {
                                                echo "Thanh toán khi nhận hàng ";
                                            } else {
                                                echo "Thanh toán onlline";
                                            }
                                            ?>
                                        </td>
                                        <td><?= $ngay_tao ?></td>
                                        <td><?= $note ?></td>
                                        <td><a href="index.php?act=detail-don-hang&id-don-hang=<?= $id_don_hang ?>"
                                                class="text-danger text-decoration-none">Xem chi tiết</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="hoan-thanh-tab-pane" role="tabpanel" aria-labelledby="hoan-thanh-tab"
                    tabindex="0">
                    <?php
                    $kiem_tra5 = false;
                    foreach ($don_hang_all as $don_hang) {
                        if ($don_hang['id_trang_thai_don'] == 5) {
                            $kiem_tra5 = true;
                            break;
                        }
                    }
                    ?>
                    <?php if (!$kiem_tra5): ?>
                        <div class="d-flex align-items-center" style="height: 160px; width: 100%;">
                            <span style="width: 100%;" class="text-warning text-center">Không có đơn hàng nào !</span>
                        </div>
                    <?php else: ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái đơn</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Ngày đặt</th>
                                    <th>Ghi chú</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($don_hang_all as $don_hang):
                                    extract($don_hang);
                                    if ($id_trang_thai_don != 5) {
                                        continue;
                                    }
                                    ?>
                                    <tr>
                                        <td><span class="text-primary fw-bold"><?= $id_don_hang ?></span></td>
                                        <td><?php
                                        if ($id_trang_thai_don == 1) {
                                            echo "Chờ xác nhận";
                                        }
                                        if ($id_trang_thai_don == 2) {
                                            echo "Đã xác nhận";
                                        }
                                        if ($id_trang_thai_don == 3) {
                                            echo "Đang xử lý";
                                        }
                                        if ($id_trang_thai_don == 4) {
                                            echo "Đang vận chuyển";
                                        }
                                        if ($id_trang_thai_don == 5) {
                                            echo "Giao thành công";
                                        }
                                        if ($id_trang_thai_don == 6) {
                                            echo "Đã hủy";
                                        }
                                        if ($id_trang_thai_don == 7) {
                                            echo "Chờ thanh toán";
                                        }
                                        ?></td>
                                        <td>
                                            <?php
                                            if ($payment_method == 1) {
                                                echo "Thanh toán khi nhận hàng ";
                                            } else {
                                                echo "Thanh toán onlline";
                                            }
                                            ?>
                                        </td>
                                        <td><?= $ngay_tao ?></td>
                                        <td><?= $note ?></td>
                                        <td><a href="index.php?act=detail-don-hang&id-don-hang=<?= $id_don_hang ?>"
                                                class="text-danger text-decoration-none">Xem chi tiết</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="da-huy-tab-pane" role="tabpanel" aria-labelledby="da-huy-tab"
                    tabindex="0">
                    <?php
                    $kiem_tra6 = false;
                    foreach ($don_hang_all as $don_hang) {
                        if ($don_hang['id_trang_thai_don'] == 6) {
                            $kiem_tra6 = true;
                            break;
                        }
                    }
                    ?>
                    <?php if (!$kiem_tra6): ?>
                        <div class="d-flex align-items-center" style="height: 160px; width: 100%;">
                            <span style="width: 100%;" class="text-warning text-center">Không có đơn hàng nào !</span>
                        </div>
                    <?php else: ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái đơn</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Ngày đặt</th>
                                    <th>Ghi chú</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($don_hang_all as $don_hang):
                                    extract($don_hang);
                                    if ($id_trang_thai_don != 6) {
                                        continue;
                                    }
                                    ?>
                                    <tr>
                                        <td><span class="text-primary fw-bold"><?= $id_don_hang ?></span></td>
                                        <td><?php
                                        if ($id_trang_thai_don == 1) {
                                            echo "Chờ xác nhận";
                                        }
                                        if ($id_trang_thai_don == 2) {
                                            echo "Đã xác nhận";
                                        }
                                        if ($id_trang_thai_don == 3) {
                                            echo "Đang xử lý";
                                        }
                                        if ($id_trang_thai_don == 4) {
                                            echo "Đang vận chuyển";
                                        }
                                        if ($id_trang_thai_don == 5) {
                                            echo "Giao thành công";
                                        }
                                        if ($id_trang_thai_don == 6) {
                                            echo "Đã hủy";
                                        }
                                        if ($id_trang_thai_don == 7) {
                                            echo "Chờ thanh toán";
                                        }
                                        ?></td>
                                        <td>
                                            <?php
                                            if ($payment_method == 1) {
                                                echo "Thanh toán khi nhận hàng ";
                                            } else {
                                                echo "Thanh toán onlline";
                                            }
                                            ?>
                                        </td>
                                        <td><?= $ngay_tao ?></td>
                                        <td><?= $note ?></td>
                                        <td><a href="index.php?act=detail-don-hang&id-don-hang=<?= $id_don_hang ?>"
                                                class="text-danger text-decoration-none">Xem chi tiết</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>