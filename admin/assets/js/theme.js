/**
 * Theme: Lunoz - Admin & Dashboard Template
 * Author: Myra Studio
 * File: Main Js
 */

!(function (t) {
  "use strict";
  t("#side-menu").metisMenu(),
    t("#vertical-menu-btn").on("click", function () {
      t("body").toggleClass("enable-vertical-menu");
    }),
    t(".menu-overlay").on("click", function () {
      t("body").removeClass("enable-vertical-menu");
    }),
    t("#sidebar-menu a").each(function () {
      var a = window.location.href.split(/[?#]/)[0];
      this.href == a &&
        (t(this).addClass("active"),
        t(this).parent().addClass("mm-active"),
        t(this).parent().parent().addClass("mm-show"),
        t(this).parent().parent().prev().addClass("mm-active"),
        t(this).parent().parent().parent().addClass("mm-active"),
        t(this).parent().parent().parent().parent().addClass("mm-show"),
        t(this)
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .addClass("mm-active"));
    }),
    t(function () {
      t('[data-toggle="tooltip"]').tooltip();
    }),
    t(function () {
      t('[data-toggle="popover"]').popover();
    }),
    Waves.init();
})(jQuery);
// Toast Message
const main = document.getElementById("toast-js");
if (main) {
  const toast = document.querySelector(".toast-js");
  const delay = (3000 / 1000).toFixed(2);
  // Auto remove toast
  const autoRemoveId = setTimeout(function () {
    main.removeChild(toast);
  }, 3000 + 1000);

  // Remove toast when clicked
  toast.onclick = function (e) {
    if (e.target.closest(".toast__close-js")) {
      main.removeChild(toast);
      clearTimeout(autoRemoveId);
    }
  };
  toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
}
// check Forms
function checkForms() {
  let formsElements = document.getElementById("myForms");
  let formsData = new FormData(formsElements);
  let emtyForms = false;
  formsData.forEach(function (item, index) {
    if (item == null || item == "") {
      formsElements[index].classList.add("is-invalid");
      emtyForms = true;
    } else {
      formsElements[index].classList.add("is-valid");
      formsElements[index].classList.remove("is-invalid");
    }
  });
  return !emtyForms;
}
//
// Cập nhập trạng thái đơn hàng
var id_don_hang;
var that;
var id_status;
$(document).on("click", ".order-btn button", function () {
  that = $(this);
  id_don_hang = $(this).val();
  id_status = $(this).closest("tr").find('input[name="status_order"]').val();
  console.log(id_status);
  $.post(
    "view/don-hang/popup.php",
    {
      id_don_hang: id_don_hang,
    },
    function (data, textStatus, jqXHR) {
      $(".modal-body select").html(data);
    }
  );
});
$(".modal-footer").on("click", ".btn.btn-primary", function () {
  let trang_thai_don = $(".modal-body .form-control")
    .prop("selected", true)
    .val();
  if (id_status >= trang_thai_don) {
    alert("Không thể cập nhập trạng thái cũ của đơn hàng");
  } else if (trang_thai_don - id_status > 1) {
    alert("Bạn phải cập nhập trạng thái theo từng tiến độ  đơn hàng");
  } else {
    $.post(
      "view/don-hang/update.php",
      {
        trang_thai_don: trang_thai_don,
        id_don_hang: id_don_hang,
      },
      function (data, textStatus, jqXHR) {
        $(that).closest("tr").find(".badge.badge-pill.badge-info").html(data);
        alert("Cập nhập trạng thái thành công");
        $(".modal").modal("hide");
      }
    );
  }
});
//=======================================================================================Chat-App================================================================================
let id_chat;
let startLoad = false;

function loadMessageChatApp() {
  if (id_chat != undefined) {
    $.post(
      "view/chat/load-message.php",
      { id_chat: id_chat },
      function (data, textStatus, jqXHR) {
        $("ul.messages").html(data);
      }
    );
  }
}

function loadChat() {
  $.post(
    "view/chat/load-chat.php",
    { id_chat: id_chat },
    function (data, textStatus, jqXHR) {
      $("#chat-contact").html(data);
    }
  );
}
setInterval(loadChat, 1000);
// Click open chat message
$(document).on("click", ".media.media-single", function () {
  id_chat = $(this).data("id-chat");
  startLoad = true;
  $.post(
    "view/chat/detail-chat.php",
    { id_chat: id_chat },
    function (data, textStatus, jqXHR) {
      $(".detail-chat-message").html(data);
    }
  );
});
//=======================================================================================Gửi message================================================================================
$(document).on("click", ".bottom_wrapper  .send_message", function () {
  let content = $(".message_input_wrapper .message_input").val();
  if (content == "") {
    $(".message_input_wrapper").css("box-shadow", " 0 0 5px red");
    $(".message_input_wrapper .message_input").attr(
      "placeholder",
      "Vui lòng nhập nội dung"
    );
  } else {
    $.post(
      "view/chat/detail-chat.php",
      {
        create: true,
        content: content,
        id_chat: id_chat,
      },
      function (data, textStatus, jqXHR) {
        $(".detail-chat-message").html(data);
        loadMessageChatApp();
        $(".message_input_wrapper .message_input").val("");
      }
    );
  }
});
setInterval(loadMessageChatApp, 1000);
// Check null
$(document).on("input", ".message_input_wrapper .message_input", function () {
  if (this.value != "") {
    $(".message_input_wrapper").css("box-shadow", "none");
  }
});
