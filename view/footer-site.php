<div class="footer">
  <footer class=" container text-center text-lg-start text-white">

    <div class="row ">

      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">

        <div
          class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto"
          style="width: 150px; height: 150px;">
          <img class="rounded-circle" src="./assets/images/logo/sri9li0oetshdwb4esa4.jpg" height="150px" alt=""
            loading="lazy" />
        </div>
        <h5 class="text-center">CÔNG TY CỔ PHẦN COOKY</h5>
        <p class="text-center">Cửa hàng cung cấp thực phẩm sạch và uy tín</p>

        <ul class="list-unstyled d-flex flex-row justify-content-center">
          <li>
            <a class="text-white px-2" href="#!">
              <i class="fab fa-facebook-square"></i>
            </a>
          </li>
          <li>
            <a class="text-white px-2" href="#!">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
          <li>
            <a class="text-white ps-2" href="#!">
              <i class="fab fa-youtube"></i>
            </a>
          </li>
        </ul>

      </div>

      <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
        <h5 class=" mb-4 fw-bold"><i class="fa-solid fa-circle-info pe-1 "></i>Về chúng tôi</h5>

        <ul class="list-unstyled">
          <li class="mb-2">
            <a href="#!" class="text-white text-decoration-none">Wiki</a>
          </li>
          <li class="mb-2">
            <a href="#!" class="text-white text-decoration-none">Giới thiệu</a>
          </li>
          <li class="mb-2">
            <a href="#!" class="text-white text-decoration-none">Liên hệ</a>
          </li>
          <li class="mb-2">
            <a href="#!" class="text-white text-decoration-none">Pets for adoption</a>
          </li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class=" mb-4 fw-bold"><i class="fa-solid fa-book pe-1"></i> Chính sách mua hàng</h5>

        <ul class="list-unstyled">
          <li class="mb-2">
            <a href="#!" class="text-white text-decoration-none">Chính sách & Bảo mật</a>
          </li>
          <li class="mb-2">
            <a href="#!" class="text-white text-decoration-none">Quy định sử dụng</a>
          </li>
          <li class="mb-2">
            <a href="#!" class="text-white text-decoration-none">Giải quyết khiếu nại</a>
          </li>
          <li class="mb-2">
            <a href="#!" class="text-white text-decoration-none">Quy chế hoạt động</a>
          </li>
          <li class="mb-2">
            <a href="#!" class="text-white text-decoration-none">Quy định đăng tin</a>
          </li>

        </ul>
      </div>
      <div class="col-lg-3 mb-4 mb-md-0">
        <h5 class=" mb-4 fw-bold">Thông tin công ty</h5>
        <ul class="list-unstyled">
          <li>
            <p><i class="fas fa-map-marker-alt pe-2"></i>Địa chỉ: Đường Hòe Thị, Xuân Phương, <br> Nam Từ Niêm, TP Hà
              Nội.</p>
          </li>
          <li>
            <p><i class="fas fa-phone pe-2"></i>02862861131</p>
          </li>
          <li>
            <p><i class="fas fa-envelope pe-2 mb-0"></i>congmd0504@gmail.com</p>
          </li>
        </ul>
      </div>
    </div>

  </footer>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2024 Copyright:
    <a class="text-white" href="https://www.cooky.vn">cooky.vn</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".swiper-container", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    }
  });
</script>
<script>
  document.getElementById('search-input').addEventListener('keyup', function (event) {
    if (event.key === 'Enter') {
      var searchValue = this.value;
      window.location.href = 'index.php?act=search&keyword=' + encodeURIComponent(searchValue);
    }
  });
</script>
</body>

</html>