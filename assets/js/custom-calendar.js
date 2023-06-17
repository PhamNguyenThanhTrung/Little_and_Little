const customVietnameseLocale = {
  weekdays: {
    shorthand: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
    longhand: [
      "Chủ Nhật",
      "Thứ Hai",
      "Thứ Ba",
      "Thứ Tư",
      "Thứ Năm",
      "Thứ Sáu",
      "Thứ Bảy",
    ],
  },
  months: {
    shorthand: [
      "Th1",
      "Th2",
      "Th3",
      "Th4",
      "Th5",
      "Th6",
      "Th7",
      "Th8",
      "Th9",
      "Th10",
      "Th11",
      "Th12",
    ],
    longhand: [
      "Tháng 1",
      "Tháng 2",
      "Tháng 3",
      "Tháng 4",
      "Tháng 5",
      "Tháng 6",
      "Tháng 7",
      "Tháng 8",
      "Tháng 9",
      "Tháng 10",
      "Tháng 11",
      "Tháng 12",
    ],
  },
  firstDayOfWeek: 1,
};

flatpickr("#date", {
  dateFormat: "d-m-Y",
  locale: customVietnameseLocale,
  minDate: "today", // Đặt ngày tối thiểu là ngày hiện tại
});

flatpickr("#dateButton", {
  dateFormat: "d-m-Y",
  locale: customVietnameseLocale,
  minDate: "today", // Đặt ngày tối thiểu là ngày hiện tại
});

// Lấy tham chiếu đến các input
const date = document.getElementById("date");
const dateButton = document.getElementById("dateButton");

// Đăng ký sự kiện "change" cho input thứ nhất
dateButton.addEventListener("change", function () {
  // Lấy giá trị ngày tháng từ input thứ nhất
  const selectedDate = dateButton.value;

  // Cập nhật giá trị ngày tháng cho input thứ hai
  date.value = selectedDate;
});
// Đăng ký sự kiện "click" cho button
dateButton.addEventListener("click", function (event) {
  // Ngăn chặn sự gửi dữ liệu
  event.preventDefault();
});



function confirmDownload(event) {
    event.preventDefault(); // Chặn hành động mặc định của liên kết

    // Thực hiện tải vé
    window.location.href = event.target.href; // Chuyển hướng đến liên kết tải vé

    // Hiển thị thông báo sau 2 giây
    setTimeout(function() {
        $('#staticBackdrop').modal('show'); // Hiển thị popup modal
    }, 2000);

    return false;
}

function sendEmail(event) {
  event.preventDefault(); // Chặn hành động mặc định của liên kết

  // Hiển thị popup "Vui lòng chờ"
  $('#staticBackdrop1').modal('show');

  // Gửi yêu cầu AJAX đến server để gửi email
  $.ajax({
    url: event.target.href,
    type: 'GET',
    success: function(response) {
      // Ẩn popup "Vui lòng chờ"
      $('#staticBackdrop1').modal('hide');

      // Hiển thị popup "Gửi mail thành công"
      $('#successModal').modal('show');
    },
    error: function() {
      // Ẩn popup "Vui lòng chờ"
      $('#staticBackdrop1').modal('hide');

      // Hiển thị popup lỗi
      $('#errorModal').modal('show');
    }
  });
}




        function confirmReload() {
            var result = confirm("Bạn có muốn tải lại trang?");
            if (result) {
                window.location.reload();
            }
        }

