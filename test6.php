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
        
    <title>สาขาส่งกำลังบำรุง</title>
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
        <li><a href="test6.php" class="nounderline active"><span class="las la-calendar"></span><span>สาขาส่งกำลังบำรุง</span></a></li>
        <li><a href="test7.php" class="nounderline"><span class="las la-user"></span><span>สาขาเทคนิค และ ปคส.</span></a></li>
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
        <h1>สาขาส่งกำลังบำรุง</h1>
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
            {id: '61', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'แผนงานด้านส่งกำลังบำรุง'},
            {id: '62', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'รายงานซ่อมทำ/รายงานติดตามผลการซ่อมทำ'},
            {id: '63', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'คำสั่งแต่งตั้งเจ้าหน้าที่ปฏิบัติงานด้าน กบ.และส่วนอื่นๆที่เกี่ยวข้องกับงานสาย กบ.'},
            {id: '64', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'เอกสาร กระบวนการอบรมกำลังพลเพิ่มพูนความรู้'},
            {id: '65', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'แนวทางแก้ปัญหาร้องเรียน หรือรับเรื่องร้องทุกข์'},
            {id: '66', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'เอกสารอ้างอิงด้านการสรรพาวุธ'},
            {id: '67', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'รายงานการใช้ไฟฟ้า ประปา และ นมชพ.'},
            {id: '68', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'เอกสารควบคุมการเบิกพัสดุ'},
            {id: '69', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'เอกสารขึ้นทะเบียนคุมครุภัณฑ์(ที่จัดหามาเอง)'},
            {id: '70', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'เอกสารทะเบียนครุภัณฑ์ตามแบบมาตรฐานของ ทร.'},
            {id: '71', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'เอกสารอ้างอิงในสายงาน กบ.'},
            {id: '72', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'เอกสารขอเบิกรับพัสดุ'},
            {id: '73', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'คู่มือปฏิบัติงานเจ้าหน้าที่ในแผนก/กอง'},
            {id: '74', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'กระบวนจัดการองค์ความรู้'},
            {id: '75', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านส่งกำลังบำรุง', listRates: 'การใช้ระบบสารสนเทศในการบริหารจัดการ กบ.'},
            
            {id: '76', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านซ่อมบำรุง', listRates: 'แผนการซ่อมบำรุงอาคาร สถานที่'},
            {id: '77', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านซ่อมบำรุง', listRates: 'เอกสารการติดตามการซ่อมบำรุงอาคาร สถานที่'},
            {id: '78', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านซ่อมบำรุง', listRates: 'บัญชีครุภัณฑ์ หรืออุปกรณ์ในการซ่อมบำรุง'},
            {id: '79', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านซ่อมบำรุง', listRates: 'คู่มือการปฏิบัติงานเจ้าหน้าที่ในการซ่อมบำรุง'},
            
            {id: '80', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านการขนส่ง', listRates: 'แผนงานด้านการขนส่ง'},
            {id: '81', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านการขนส่ง', listRates: 'แผนซ่อมทำยานพาหนะ'},
            {id: '82', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านการขนส่ง', listRates: 'บัญชียานพาหนะ'},
            {id: '83', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านการขนส่ง', listRates: 'คู่มือการใช้ยานพาหนะ และการซ่อมบำรุง'},
            {id: '84', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านการขนส่ง', listRates: 'บันทึก สถิติการใช้ นมชพ.'},
            {id: '85', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'ด้านการขนส่ง', listRates: 'คู่มือเจ้าหน้าที่ในแผนก/กอง'},
            
            {id: '86', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'การฐานทัพ', listRates: 'เอกสารแสดงสิทธิ์การใช้ที่ดิน และที่ดินในปกครองของหน่วย'},
            {id: '87', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'การฐานทัพ', listRates: 'เอกสารการรายงานตรวจสอบที่ดินตามวงรอบที่ ทร. กำหนด (ทุกๆ ๓ เดือน)'},
            {id: '88', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'การฐานทัพ', listRates: 'คำสั่งแต่งตั้งเจ้าหน้าที่ตรวจสอบ และดูแลที่ดินในเขตรับผิดชอบของหน่วย'},
            {id: '89', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'การฐานทัพ', listRates: 'คู่มือ และเอกสารอ้างอิงสำหรับเจ้าหน้าที่ปฏิบัติงานที่เกี่ยวข้องกับงานที่ดิน'},
            {id: '90', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'การฐานทัพ', listRates: 'การใช้ระบบสารสนเทศในการเก็บรวบรวมข้อมูลที่ดิน'},
            {id: '91', MainRates: 'สาขาส่งกำลังบำรุง', headRates: 'การฐานทัพ', listRates: 'รายงานการบุกรุกที่ดิน'},
        ]
        // call data 
            fnDrawTable('A3', data)
        return data
    }   
       
    
</script>
</html>