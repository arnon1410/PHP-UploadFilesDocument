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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/control/navbar4.css" />
    <link rel="stylesheet" href="../../css/sweetalert2/sweetalert2.min.css" >
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstarp/css/bootstrap.min.css">
    <script src="../../script/bootstarp/js/popper.min.js"></script>
    <script src="../../script/bootstarp/js/bootstrap.min.js"></script> 
    
    <title>รายงานผลการประเมินผล</title>
    <style>
        th {

        }
        td {
            border-top: 1px solid black; /* เพิ่มเส้นกรอบด้านบน */
            border-bottom: 1px solid black; /* เพิ่มเส้นกรอบด้านล่าง */
            padding: 8px; /* เพิ่ม padding เพื่อให้ข้อมูลในเซลล์มีพื้นที่ว่าง */
        }
        .textHeadTable {
            /* border: 1px solid white; เพิ่มเส้นกรอบให้กับ th และ td */
            /* padding: 8px; เพิ่ม padding เพื่อให้ข้อมูลในเซลล์มีพื้นที่ว่าง */
        }
        .fristTD {
          border-left: 1px solid black;
          border-right: 1px solid black;
        }
        .lastTD {
          border-right: 1px solid black;
        }
        .gradient-btn {
          background: linear-gradient(-135deg, #c850c0, #4158d0);
          color: white;
          border: none;
          padding: 10px 20px;
          border-radius: 5px;
          font-size: 1.2rem;
          cursor: pointer;
          transition: background 0.3s ease;
        }
        
        .gradient-btn:hover {
          background: linear-gradient(-135deg, #4158d0, #c850c0);
          color: white;
        }
    </style>
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
        <div class="avatar-text">
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
        <h1>รายงานผลการประเมินผล
        </h1>
        <p id='textStatusUser'></p>
      </div>
    </div>
    <div class="header-action" id="btnAddData">
      <!-- Content -->
    </div>
  </header>
  <main>
    <section>
      <div class="block-grid-test">
        <div class="revenue-card">
          <h3 class="section-head"></h3>
          <div class="rev-content-test">
    <section>
    <main class="py-6 bgColorMain">
        <div class="container-fluid">
            <div class="card shadow border-0">
                <div class="card-header">
                    <!-- Start Selete Content -->
                    <div class="container" id="dvHeadSelectAssessment">

                    </div>
                    <!-- Start Table Content -->
                    <div class="table-responsive" id="dvContentTable">
                    
                    </div>
                
            </div>
        </div>

            <!-- Start Modal สร้างฟอร์ม -->
        <div class="modal fade" id="AssessmentModal" tabindex="-1" aria-labelledby="AssessmentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="textHeadModal">เพิ่มข้อมูลการประเมิน</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="dvBodyModalAssessment">
                    
                </div>
                <div class="modal-footer" id="dvFooterModalAssessment">

                </div>
                </div>
            </div>
        </div>
  </main>
</div>
</body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../script/jquery/jquery-3.7.1.js"></script>
    <script src="../../script/bootstarp/js/bootstrap.min.js"></script> 
    <script src="../../script/bootstarp/js/bootstrap.js"></script>
    <script src='../../script/sweetalert2/sweetalert2.all.min.js'></script>
    <script src="../../script/centerFile.js"></script>
    <script src="../../script/control/drawTable.js"></script>
    <script src="../../script/control/sidebar.js"></script>
<script>
    $(document).ready(function() {
        fnSetSidebarMenuConTrol('reportAssessment')
        fnCreateBtnTabForm('reportAssessment')
        fnGetDataInternalControl()

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

    function fnGetDataInternalControl() {
        const data = [
            {id: '1' , mainControl: 'รายงานการประเมินผล', listControl: 'แบบ ปค.๔'},
            {id: '2' , mainControl: 'รายงานการประเมินผล', listControl: 'แบบ ปค.๕'},
            {id: '3' , mainControl: 'รายงานการประเมินผล', listControl: 'แบบติดตาม ปค.๕'}
        ]
        var valAccess = sessionStorage.getItem('authen') || ''; 
        // call data 
            fnDrawTable(valAccess, data)
        return data
    }      
</script>
</html>