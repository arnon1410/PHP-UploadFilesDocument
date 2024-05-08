<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/navbar4.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstarp/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <!-- <link href="css/jquery/datatables.min.css" rel="stylesheet"> -->
        
    <title>สาขาเทคนิค และ ปคส.</title>
</head>
<body>
<input type="checkbox" name="" id="menu-toggle">
<div class="overlay"><label for="menu-toggle">
  </label></div>
<div class="sidebar">
  <div class="sidebar-container">
    <div class="brand">
      <h3>
        <span class="lab la-staylinked"></span>
        NIGD
      </h3>
    </div>
    <div class="sidebar-avatar">
      <div>
        <img src="https://media-exp1.licdn.com/dms/image/C4D03AQF9R2lxnH4fOw/profile-displayphoto-shrink_800_800/0/1639841285929?e=1654128000&v=beta&t=QvocDiNfivbaAzHjsX9fnl9eFMainRatesZSo4SBHeH4jZANEk" alt="avatar">
      </div>
      <div class="avatar-info">
        <div class="avatar-text">
            <h5>กรมจเรทหารเรือ</h5>
            <small>28-04-67</small>
        </div>
        <!-- <span class="las la-angle-double-right"></span> -->
      </div>
    </div>
    <div class="sidebar-menu">
      <ul>
        <li class="headMenuTitle"><span>หน้าหลัก</span></li>
        <li><a href="test3.php" class="nounderline"><span class="las la-adjust"></span><span>Dashboard</span></a></li>
        <li class="headMenuTitle"><span>การตรวจสอบราชการ 4 สาขา</span></li>
        <li><a href="test4.php" class="nounderline"><span class="las la-video"></span><span>สาขากำลังพล</span></a></li>
        <li><a href="test5.php" class="nounderline"><span class="las la-chart-bar"></span><span>สาขายุทธการ</span></a></li>
        <li><a href="test6.php" class="nounderline"><span class="las la-calendar"></span><span>สาขาส่งกำลังบำรุง</span></a></li>
        <li><a href="test7.php" class="nounderline active"><span class="las la-user"></span><span>สาขาเทคนิค และ ปคส.</span></a></li>
        <!-- <div class="bottom_content">

        </div> -->
        <hr class="border-2 border-top border-primary" />
        <li class="lineEndTitle"></li>
        <li><a href="#" class="nounderline"><span class="las la-sign-out-alt"></span><span>ออกจากระบบ</span></a></li>
      </ul>
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
        <h1>สาขาเทคนิค และ ปคส.</h1>
        <p>ผู้รับตรวจสอบ <span class="las la-chart-line"></span></p>
      </div>
    </div>
    <div class="header-action">
    <button type="button" class="btn btn-primary" onclick="fnGetDataModal()" data-bs-toggle="modal" data-bs-target="#AssessmentModal" >
        <span class="las la-plus"></span>
        นำเข้าข้อมูล
      </button>
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
                <!-- <div class="card-header">
                    <h5 class="mb-0">Applications</h5>
                </div> -->
                <div class="table-responsive" id="dvContentTable">
                
                </div>
              
            </div>
        </div>

        <!-- Start Modal นำเข้าข้อมูล -->
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
    <script src="script/jquery/jquery-3.7.1.js"></script>
    <script src="script/bootstarp/js/bootstrap.min.js"></script>
    <script src="script/drawTable.js"></script>
<script>
    $(document).ready(function() {
        fnGetDataRates()
    });

    /* input Modal*/
    $('input[type=radio][name=flexRadioDefault]').change(function() {
        if (this.value == 'havefile') {
            $('#dvuploadfile').show()
        } else if (this.value == 'notfile') {
            $('#dvuploadfile').hide()
        }
    })

    function fnGetDataRates() {
      var data = [
            {id: '92', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านป้องกันความเสียหาย', listRates: 'การแต่งตั้งนายทหารป้องกันความเสียหาย'},
            {id: '93', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านป้องกันความเสียหาย', listRates: 'ระเบียบการปฏิบัติเกี่ยวกับอัคคีภัยทั้งในและ นอกเวลาราชการ'},
            {id: '94', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านป้องกันความเสียหาย', listRates: 'มาตรการในการป้องกันอุบัติภัยของหน่วย'},
            {id: '95', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านป้องกันความเสียหาย', listRates: 'อัตราเครื่องมือ ปคส.ประจำอาคาร'},
            {id: '96', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านป้องกันความเสียหาย', listRates: 'ทะเบียนคุรุภัณฑ์เครื่องมือ ปคส.'},
            
            {id: '97', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านสื่อสารและอิเล็กทรอนิกส์', listRates: 'การแต่งตั้ง จนท.รับผิดชอบด้านสารสนเทศ'},
            {id: '98', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านสื่อสารและอิเล็กทรอนิกส์', listRates: 'คู่มือการจัดทำแผนเตรียมความพร้อมด้านสารสนเทศ'},
            {id: '99', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านสื่อสารและอิเล็กทรอนิกส์', listRates: 'แผนปฏิบัติด้านสารสนเทศของหน่วยกรณีฉุกเฉิน'},
            {id: '100', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านสื่อสารและอิเล็กทรอนิกส์', listRates: 'ทะเบียนครุภัณฑ์สาย สสท.'},
            
            {id: '101', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านการประหยัดพลังงานตามนโยบาย ทร.', listRates: 'การแต่งตั้งผู้รับผิดชอบด้านการประหยัดพลังงาน'},
            {id: '102', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านการประหยัดพลังงานตามนโยบาย ทร.', listRates: 'การจัดทำนโยบายและมาตรการประหยัดพลังงาน ของหน่วย'},
            {id: '103', MainRates: 'สาขาเทคนิค และ ปคส.', headRates: 'ด้านการประหยัดพลังงานตามนโยบาย ทร.', listRates: 'การบันทึกและวิเคราะห์สถิติการใช้พลังงาน'},
        ]
        // call data 
            fnDrawTable('A4', data)
        return data
    }   
    
</script>
</html>