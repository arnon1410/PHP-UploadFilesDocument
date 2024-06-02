<!DOCTYPE html>
<html>
<head>
    <title>Submit Form with AJAX, SweetAlert, and Redirect</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <form id="myForm">
        <input type="text" name="data" placeholder="Enter some data" required>
        <button type="submit">Submit</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#myForm').on('submit', function(e) {
                e.preventDefault(); // ป้องกันการ submit ฟอร์มแบบปกติ
                $.ajax({
                    url: 'process.php',
                    type: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'success_page.php'; // เปลี่ยนเส้นทางไปยังหน้าที่ต้องการ
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error',
                            text: 'There was an error processing your request.',
                            icon: 'error'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
