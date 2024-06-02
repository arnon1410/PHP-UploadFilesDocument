<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main/signin.css" />
    <link rel="stylesheet" href="../../css/sweetalert2/sweetalert2.min.css" >
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css'>
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <div class="title">
            NIGD
         </div>
         <form id="formLogin">
            <div class="field">
               <input type="text" class="form-control" id="username"  name="username">
               <label  for="username" class="form-label">Username</label>
            </div>
            <div class="field">
               <input type="password" class="form-control" id="password" name="password">
               <label for="password" class="form-label">Password</label>
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" name="signin" value="Login">
            </div>
            <!-- <div class="signup-link">
               Not a member? <a href="#">Signup now</a>
            </div> -->
         </form>
    </div>
    <script src='../../script/jquery/jquery-3.7.1.js'></script>
    <script src='../../script/bootstarp/js/bootstrap.min.js'></script>
    <script src='../../script/sweetalert2/sweetalert2.all.min.js'></script>
    <script src='../../script/centerFile.js'></script>
    <script>
        $(document).ready(function() {
            $('#formLogin').on('submit', function(e) {
                e.preventDefault(); // ป้องกันการ submit ฟอร์มแบบปกติ

                // ตรวจสอบว่า username และ password ว่างหรือไม่
                var username = $('#username').val();
                var password = $('#password').val();
                console.log(username)
                console.log(password)
                
                if (!username || !password) {
                    Swal.fire({
                        title: '',
                        text: 'กรุณากรอก username และ password ให้ครบถ้วน',
                        icon: 'warning'
                    });
                    return;
                }
                console.log($(this).serialize())
                $.ajax({
                    url: 'signin_db.php',
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
                                    window.location.href = '../control/dashboard.php?authen=' + response.urole; // เปลี่ยนเส้นทางไปยังหน้าที่ต้องการ
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
                            text: 'เกิดข้อผิดพลาดลองใหม่อีกครั้งSSS.',
                            icon: 'error'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>