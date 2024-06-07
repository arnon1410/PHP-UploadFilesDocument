<?php 

    session_start();
    require_once '../../config/db.php';
    if (!isset($_SESSION['user_login'])) {
        header('Location: ../../pages/main/signin.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../css/control/dashboard.css" /> -->
    <link rel="stylesheet" href="../../css/control/waiting.css" /> 
    <link rel="stylesheet" href="../../css/sweetalert2/sweetalert2.min.css" >
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js'></script>

    <!-- <link rel="stylesheet" href="css/test.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/charts/chart-4/assets/css/chart-4.css">    
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstarp/css/bootstrap.min.css">

    <title>Dashboard</title>
</head>
<body>
<input type="checkbox" name="" id="menu-toggle">
<div class="overlay"><label for="menu-toggle">
  </label></div>
<div class="sidebar">
  <div class="sidebar-container">
    <div class="brand">
      <h3>
        <span class="las la-anchor"></span>
        NIGD
      </h3>
    </div>
    <div class="sidebar-avatar">
      <div>
        <img src="https://media-exp1.licdn.com/dms/image/C4D03AQF9R2lxnH4fOw/profile-displayphoto-shrink_800_800/0/1639841285929?e=1654128000&v=beta&t=QvocDiNfivbaAzHjsX9fnl9eFa1ZSo4SBHeH4jZANEk" alt="avatar">
      </div>
      <div class="avatar-info">
        <div class="avatar-text" style="text-align: center;">
        <h6 id='textName'></h6>
          <small>28-04-67</small>
        </div>
        <!-- <span class="las la-angle-double-right"></span> -->
      </div>
    </div>
    <div class="sidebar-menu" id="dvUlSidebarMenu">
      <!-- Content -->
    </div>

  </div>
</div>
<div class="main-content">
  <header>
    <div class="header-wrapper">
      <label for="menu-toggle">
        <span class="las la-bars"></span>
      </label>
      <div class="header-title">
        <h1>Dashboard</h1>
        <p id='textStatusUser'></p>
      </div>
    </div>
    <div class="header-action">
      <!-- <button class="btn btn-main">
        <span class="las la-video"></span>
        Upload
      </button> -->
    </div>
  </header>
  <main>
  <section style='border-radius: 10px;'>
    <div class="dots">
      <span style="--i:1;"></span>
      <span style="--i:2;"></span>
      <span style="--i:3;"></span>
      <span style="--i:4;"></span>
      <span style="--i:5;"></span>
      <span style="--i:6;"></span>
      <span style="--i:7;"></span>
      <span style="--i:8;"></span>
      <span style="--i:9;"></span>
      <span style="--i:10;"></span>
      <span style="--i:11;"></span>
      <span style="--i:12;"></span>
      <span style="--i:13;"></span>
      <span style="--i:14;"></span>
      <span style="--i:15;"></span>
    </div>
    <span style='margin-left:70px; font-size:24px'>อยู่ระหว่างการพัฒนาระบบ</span>
  </section>
  </main>
  <!-- <main style='display:none'>
    <section>
      <h3 class="section-head">Overview</h3>
      <div class="analytics">
        <div class="analytic">
          <div class="analytic-icon">
            <span class="las la-users"></span></div>
            <div class="analytic-info">
                <h4>หน่วยทั้งหมด</h4>
                <h1>212 <small class="text-danger">หน่วย</small></h1>
            </div>
        </div>
        <div class="analytic">
          <div class="analytic-icon">
            <span class="las la-users"></span></div>
            <div class="analytic-info">
                <h4>หน่วยรับตรวจ</h4>
                <h1> 42 <small class="text-danger">หน่วย</small></h1>
            </div>
        </div>
        <div class="analytic">
          <div class="analytic-icon"><span class="las la-users"></span></div>
          <div class="analytic-info">
            <h4>หน่วยตรวจแล้ว</h4>
            <h1> 30 <small class="text-success">หน่วย</small></h1>
          </div>
        </div>
        <div class="analytic">
          <div class="analytic-icon"><span class="las la-users"></span></div>
          <div class="analytic-info">
            <h4>หน่วยยังไม่ตรวจ</h4>
            <h1> 12 <small class="text-danger">หน่วย</small></h1>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="block-grid">
        <div class="revenue-card">
          <h3 class="section-head">สถิติภาพรวมทั้งหมด</h3>
          <div class="rev-content">
    <section>
        <div class="container">
            <div class="row justify-content-center">
            <div class="">
                <div class="card widget-card border-light shadow-sm">
                <div class="card-body">
                    <div class="d-block align-items-center justify-content-between">
                    <div class="mb-3 mb-sm-0">
                        <h3 style="text-align:left" class="card-title widget-card-title">สาขากำลังพล</h3>
                    </div>
                    <div class="graph-select" style="text-align: right;">
                        <select class="form-select text-secondary border-light-subtle w-25 p-1">
                        <option value="1">2023</option>
                        <option value="2">2024</option>
                        <option value="3">2023</option>
                        </select>
                    </div>
                    </div>
                    <div id="bsb-chart-4"></div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
          </div>
        </div>

         <div class="graph-card">
          <h3 class="section-head">ข้อบกพร่องที่แก้ไขไปแล้ว</h3>
          <div class="graph-content">
            <div class="graph-head">
              <div class="icon-wrapper">
                <div class="icon"><span class="las la-eye text-main"></span></div>
                <div class="icon"><span class="las la-clock text-success"></span></div>
              </div>
              <div class="graph-select">
                <select name="" id="">
                  <option value="">Septamber</option>
                </select>
              </div>
            </div>
            <div class="graph-board">
              <canvas id="revenueChart" width="100%"></canvas>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main> -->
</div>
<script src="../../script/jquery/jquery-3.7.1.js"></script>
<script src='../../script/sweetalert2/sweetalert2.all.min.js'></script>
<!-- <script src="../../script/navbar3.js"></script> -->
<!-- <script src="../../script/test.js"></script> -->
<script src="../../script/centerFile.js"></script>
<script src="../../script/control/drawTable.js"></script>
<script src="../../script/control/sidebar.js"></script>
<script>
    $(document).ready(function() {
        fnSetSidebarMenuConTrol('dashboard')
        
        // ดึงค่าจาก URL parameters หรือจาก sessionStorage ถ้ามีการรีเฟรช
        var authen = fnGetParameterByName('authen') || sessionStorage.getItem('authen');
        
        // ถ้ามีค่า authen จาก URL parameters, เก็บค่าไว้ใน sessionStorage
        if (fnGetParameterByName('authen')) {
            sessionStorage.setItem('authen', authen);
        }

        fnCheckUserAuthen(authen)

        var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.history.pushState({ path: newUrl }, '', newUrl);

        $('#logout').on('click', function(e) {
            e.preventDefault(); // ป้องกันการเปลี่ยนเส้นทางปกติ
            
            Swal.fire({
                title: '',
                text: "คุณต้องการออกจากระบบใช่มั้ย?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยันยืน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // เปลี่ยนเส้นทางไปยัง logout.php
                    sessionStorage.clear();
                    window.location.href = '../../pages/main/logout.php';
                }
            });
        });
    });

  
</script>   
</body>
</html>