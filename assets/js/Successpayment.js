
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


function sendEmail1(event) {
    event.preventDefault(); // Chặn hành động mặc định của liên kết


    $.ajax({
      url: event.target.href,
      type: 'GET',
      success: function(response) {
        // Ẩn popup "Vui lòng chờ"

        // Hiển thị popup "Gửi mail thành công"
        $('#staticBackdrop2').modal('show');
      },
      error: function() {
        // Ẩn popup "Vui lòng chờ"

        // Hiển thị popup lỗi
        $('#staticBackdrop1').modal('show');
      }
    });
  }

        function confirmReload() {
            var result = confirm("Bạn có muốn tải lại trang?");
            if (result) {
                window.location.reload();
            }
        }

        function confirmContact(event) {
            event.preventDefault(); // Chặn hành động mặc định của liên kết

            // Thực hiện tải vé
            window.location.href = event.target.href; // Chuyển hướng đến liên kết tải vé

            // Hiển thị thông báo sau 2 giây
            setTimeout(function() {
                $('#contact').modal('show'); // Hiển thị popup modal
            }, 2000);

            return false;
        }
