      <!-- ========== Left Sidebar Start ========== -->
      <div class="vertical-menu">
          <div data-simplebar class="h-100">
              <div class="navbar-brand-box">
                  <a href="index.php" class="logo">
                      <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695381181/cooky%20market%20-%20PHP/cva2ntghjzrlryixcojp.svg" style="height: 50px;" alt="">
                  </a>
              </div>

              <!--- Sidemenu -->
              <div id="sidebar-menu">
                  <!-- Left Menu Start -->
                  <ul class="metismenu list-unstyled" id="side-menu">
                      <li class="menu-title">Quản lý</li>

                      <li>
                          <a href="index.php" class="waves-effect"><i class="bx bx-home-smile"></i><span>Trang
                                  chủ</span></a>
                      </li>
                      <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-grid-alt"></i><span>Quản lý danh mục</span></a>
                          <ul class="sub-menu" aria-expanded="false">
                              <li><a href="?act=adddm">Thêm danh mục</a></li>
                              <li><a href="?act=listdm">Danh sách danh mục</a></li>
                          </ul>
                      </li>
                      <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-box"></i><span>Quản lý sản phẩm</span></a>
                          <ul class="sub-menu" aria-expanded="false">
                              <li><a href="?act=addsp">Thêm sản phẩm</a></li>
                              <li><a href="?act=add-detail-sp">Thêm chi tiết sản phẩm</a></li>
                              <li><a href="?act=listsp">Danh sách sản phẩm</a></li>
                          </ul>
                      </li>
                      <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-notepad"></i><span>Quản lý đơn hàng</span></a>
                          <ul class="sub-menu" aria-expanded="false">
                              <li><a href="?act=order-confirm">Đơn hàng cần xác nhận</a></li>
                              <li><a href="?act=list-order">Danh sách đơn hàng</a></li>
                          </ul>
                      </li>
                      <?php 
                      if (isset($_SESSION['login']['id_roles']) && $_SESSION['login']['id_roles'] == 3) :
                       ?>
                          <li>
                              <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-user-pin"></i><span>Quản lý khách hàng</span></a>
                              <ul class="sub-menu" aria-expanded="false">
                                  <li><a href="?act=addkh">Thêm khách hàng</a></li>
                                  <li><a href="?act=listkh">Danh sách khách hàng</a></li>
                                  <li><a href="?act=history-mh">Lịch sử mua sắm khách hàng</a></li>
                              </ul>
                          </li>
                      <?php
                       endif
                       ?>
                      <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-comment-dots"></i><span>Quản lý bình luận</span></a>
                          <ul class="sub-menu" aria-expanded="false">
                              <li><a href="?act=list-comment">Danh sách bình luận</a></li>
                              <li><a href="?act=list-reply">Danh sách bình luận đã trả lời</a></li>
                          </ul>
                      </li>
                      <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-star"></i><span>Quản lý đánh giá</span></a>
                          <ul class="sub-menu" aria-expanded="false">
                              <li><a href="?act=list-danh-gia">Danh sách đánh giá</a></li>
                          </ul>
                      </li>
                      <?php 
                      if (isset($_SESSION['login']['id_roles']) && $_SESSION['login']['id_roles'] == 3) : 
                        ?>
                          <li>
                              <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-discount"></i><span>Quản lý mã giảm giá</span></a>
                              <ul class="sub-menu" aria-expanded="false">
                                  <li><a href="?act=add-gg">Tạo mã giảm giá</a></li>
                                  <li><a href="?act=list-gg">Quản lý thông tin mã giảm giá</a></li>
                              </ul>
                          </li>

                          <li>
                              <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-data"></i><span>Thống kê</span></a>
                              <ul class="sub-menu" aria-expanded="false">
                                  <li><a href="?act=thong-ke-dt">Doanh thu</a></li>
                                  <li><a href="?act=thong-ke-slspbd">Số lượng sản phẩm bán được</a></li>
                                  <li><a href="?act=thong-ke-ttdh">Tình trạng đơn hàng</a></li>
                                  <li><a href="?act=thong-ke-bxh">Bảng xếp hạng sản phẩm</a></li>
                              </ul>
                          </li>
                      <?php 
                      endif 
                      ?>
                      <li class="menu-title">Quản trị</li>
                      <li>
                          <a href="../index.php" class="waves-effect"><i class="bx bx-arrow-back"></i><span>Vào
                                  website</span></a>
                      </li>

                  </ul>
              </div>
              <!-- Sidebar -->
          </div>
      </div>
      <!-- Left Sidebar End -->