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
        
    <title>สาขายุทธการ</title>
    <style>
select {
  width: 200px; /* ปรับความกว้างของ select */
  padding: 5px; /* เพิ่มพื้นที่ขอบของ options */
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
        <span class="lab la-staylinked"></span>
        NIGD
      </h3>
    </div>
    <div class="sidebar-avatar">
      <div>
        <img src="https://media-exp1.licdn.com/dms/image/C4D03AQF9R2lxnH4fOw/profile-displayphoto-shrink_800_800/0/1639841285929?e=1654128000&v=beta&t=QvocDiNfivbaAzHjsX9fnl9eFa1ZSo4SBHeH4jZANEk" alt="avatar">
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
        <li><a href="test5.php" class="nounderline active"><span class="las la-chart-bar"></span><span>สาขายุทธการ</span></a></li>
        <li><a href="test6.php" class="nounderline"><span class="las la-calendar"></span><span>สาขาส่งกำลังบำรุง</span></a></li>
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
        <h1>สาขายุทธการ</h1>
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
    // เลือก element ของเรา

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
            {id: '12', MainRates: 'สาขายุทธการ', headRates: 'สาขายุทธการและการฝึกหัดศึกษา', listRates: 'แผนการปฏิบัติงานประจำปีของหน่วย (ในภาพรวมหรือยุทธการ)'},
            {id: '13', MainRates: 'สาขายุทธการ', headRates: 'สาขายุทธการและการฝึกหัดศึกษา', listRates: 'การรายงานตามวงรอบ/ประจำปี ของการปฏิบัติงาน ได้แก่ วงรอบ ๑ เดือน ๓ เดือน ๖ เดือน  หรือ ๑ ปี (งานหลักของหน่วย)'},
            {id: '14', MainRates: 'สาขายุทธการ', headRates: 'สาขายุทธการและการฝึกหัดศึกษา', listRates: 'การดำเนินการของหน่วย เช่น การรายงาน การประเมินผล ปัญหาอุปสรรค ข้อขัดข้อง และแนวทางการแก้ไขปัญหาของหน่วย'},
            {id: '15', MainRates: 'สาขายุทธการ', headRates: 'สาขายุทธการและการฝึกหัดศึกษา', listRates: 'กระบวนการ ขั้นตอน ในการปฏิบัติงานของหน่วย งานหลักของหน่วยที่สำคัญ เลือกมา 1 กระบวนการ)'},
            {id: '16', MainRates: 'สาขายุทธการ', headRates: 'สาขายุทธการและการฝึกหัดศึกษา', listRates: 'การพัฒนาองค์ความรู้ในการปฏิบัติงานและการ ฝึกหัด ศึกษา  ได้แก่ หลักสูตรการฝึกอบรมหรือหลักสูตร'},
            {id: '17', MainRates: 'สาขายุทธการ', headRates: 'สาขายุทธการและการฝึกหัดศึกษา', listRates: 'ขั้นตอนการปฏิบัติต่างๆในการฝึกอบรมหรือฝึกหัดศึกษา ตั้งแต่การ วางแผน การขออนุมัติ  ลงคำสั่ง รายงานผล  การประเมินผล ปัญหาอุปสรรคข้อขัดข้องการแก้ปัญหา ของหน่วย เป็นต้น'},
            {id: '18', MainRates: 'สาขายุทธการ', headRates: 'สาขายุทธการและการฝึกหัดศึกษา', listRates: 'คู่มือในการปฏิบัติงานประจำตัวของเจ้าหน้าที่ ด้านยุทธการ ที่ใช้อ้างอิง หรือ เป็นประโยชน์กับการปฏิบัติงาน และเอกสารในการพัฒนาองค์ความรู้ต่าง ๆ'},
            {id: '19', MainRates: 'สาขายุทธการ', headRates: 'สาขายุทธการและการฝึกหัดศึกษา', listRates: 'เอกสารรับตรวจเกี่ยวกับงานด้านยุทธการ เช่น แผน คำสั่ง ระเบียบ ข้อบังคับ ของหน่วยที่จัดทำขึ้น'},
            {id: '20', MainRates: 'สาขายุทธการ', headRates: 'สาขายุทธการและการฝึกหัดศึกษา', listRates: 'การนำระบบสารสนเทศมาใช้ในการปฏิบัติงาน/การฝึก อบรมหรือ ฝึกหัดศึกษา'},
            {id: '21', MainRates: 'สาขายุทธการ', headRates: 'สาขายุทธการและการฝึกหัดศึกษา', listRates: 'แบบสำรวจ/ประเมินความพึงพอใจในการปฏิบัติงาน ของหน่วย เช่น ความพึงพอใจในการซ่อมทำเรือ'},
            
            {id: '22', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'แผนการปฏิบัติงานด้านการข่าว'},
            {id: '23', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'คำสั่งแต่งตั้ง จนท. ปฏิบัติงานด้านการข่าว'},
            {id: '24', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'การรายผลการปฏิบัติด้านการข่าว ตามวงรอบ'},
            {id: '25', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'การพัฒนาองค์ความรู้ด้านการข่าว (การศึกษา อบรม คู่มือ)'},
            {id: '26', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'เอกสารอ้างอิง คู่มือ ที่หน่วยใช้อ้างอิงด้านการข่าว และ เอกสารรับตรวจด้านการข่าว'},
            {id: '27', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'ระเบียบการ รปภ.หน่วย (บุคคคล ข้อมูลข่าวสารลับ และ สถานที่)'},
            {id: '28', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'คำสั่งแต่งตั้ง จนท. รปภ. ของหน่วย และนายทะเบียน /ผู้ช่วยนายทะเบียนข้อมูลข่าวสารลับ'},
            {id: '29', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'การตรวจสอบประวัติและพฤติการณ์บุคคล และการ รับรอง ความไว้วางใจเพื่อให้เข้าถึงสิ่งที่เป็นความลับของ ทางราชการ ตามหลักเกณฑ์ในระเบียบสำนักนายกรัฐมนตรี ว่าด้วย การรักษาความปลอดภัยแห่งชาติ ปี ๕๒ (แบบเอกสาร แบบ รปภ.1 - 6)'},
            {id: '30', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'คำสั่งแต่งตั้งผู้ปฏิบัติหน้าที่เวรยามสมุดรับส่งหน้าที่ฯ'},
            {id: '31', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'ระเบียบ/คำสั่ง/แผนการรักษาความปลอดภัยของหน่วย (แผนผัง  มาตรการ การจัดเวร ยาม)'},
            {id: '32', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'สมุดบันทึกการผ่านเข้า-ออกของบุคคลและยานพาหนะ (บุคคลภายนอก หรือบุคคลที่เข้ามาติดต่อราชการ)'},
            {id: '33', MainRates: 'สาขายุทธการ', headRates: 'สาขาการข่าวและ รปภ.', listRates: 'เบอร์โทรศัพท์ติดต่อกับหน่วยต่าง ๆ กรณีเกิดเหตุการณ์ฉุกเฉิน'},
            
            {id: '34', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'คำสั่งแต่งตั้งนายทหารกิจการพลเรือนของหน่วย'},
            {id: '35', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'แผนการปฏิบัติงานด้านกิจการพลเรือน'},
            {id: '36', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'การรายงานผลการปฏิบัติด้านกิจการพลเรือน'},
            {id: '37', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'การพัฒนาองค์ความรู้ในการปฏิบัติด้าน กิจการพลเรือน (การศึกษา, อบรม, คู่มือ)'},
            {id: '38', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'ช่องทางต่าง ๆ ของหน่วยที่ใช้ในการประชาสัมพันธ์ เช่น เว็บไซต์ เฟชบุ๊ค'},
            {id: '39', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'มาตรการส่งเสริมให้มีทัศนะคติที่ดีในการปฏิบัติ ด้านกิจการพลเรือน'},
            {id: '40', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'การจัดกิจกรรมเทิดพระเกียรติ /การดำเนินการ สนับสนุน งานตามโครงการอันเนื่องมาจาก พระราชดำริ/จิตอาสา'},
            {id: '41', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'ความสัมพันธ์อื่น ๆ ที่มีกับประชาชนในพื้นที่ (การจัดกิจกรรมร่วมกับองค์กรภาครัฐ เอกชน และประชาชน ในพื้นที่)'},
            {id: '42', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'การบรรเทาสาธารณภัยและการช่วยเหลือประชาชน'},
            {id: '43', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'คู่มือในการปฏิบัติงานของหน่วย ในการบรรเทา สาธารณภัยและการช่วยเหลือ ประชาชน'},
            {id: '44', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'แบบสำรวจ/ ประเมินความพึงพอใจในการปฏิบัติงาน ด้านกิจการพลเรือนของหน่วย'},
            {id: '57', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'บัญชีประจำหน่วย (สพ.3)'},
            {id: '58', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'บัญชี รับ - จ่ายเบิกยืม ภายในหน่วย'},
            {id: '59', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'คำสั่งแต่งตั้งเจ้าหน้าที่ด้านการสรรพาวุธ'},
            {id: '60', MainRates: 'สาขายุทธการ', headRates: 'สาขากิจการพลเรือน', listRates: 'เอกสารอ้างอิงด้านการสรรพาวุธ'},

            {id: '45', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'แผนการปฏิบัติงานด้านการสื่อสาร'},
            {id: '46', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'คำสั่งแต่งตั้ง จนท.รับผิดชอบ/ปฏิบัติงาน ด้านการสื่อสาร'},
            {id: '47', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'มาตรการในการ รปภ. ทางการสื่อสาร (บุคคล ข้อมูลข่าวสารลับ สถานที่)'},
            {id: '48', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'มาตรการป้องกันการละเมิด รปภ.ทางการสื่อสาร'},
            {id: '49', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'บัญชีคุมเครื่องมือสื่อสาร'},
            {id: '50', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'บัญชีควบคุมการรับ-จ่าย เครื่องมือสื่อสาร'},
            {id: '51', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'สถานภาพความพร้อมเครื่องมือสื่อสาร(แผนผัง การรายงานซ่อมทำ รุจำหน่าย การติดตามเรื่อง)'},
            {id: '52', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'การรายงานสถานภาพของเครื่องมือสื่อสารให้กับ สสท.ทร. ทราบ ตามวงรอบ'},
            {id: '53', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'บรรณสารด้านการสื่อสารในความควบคุม'},
            {id: '54', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'สมุดรายการประวัติและการใช้เครื่องมือสื่อสาร/ ทดลองเครื่อง'},
            {id: '55', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'การพัฒนาองค์ความรู้ด้านการสื่อสาร (การศึกษา อบรม คู่มือ)'},
            {id: '56', MainRates: 'สาขายุทธการ', headRates: 'สาขาสื่อสารและอิเล็กทรอนิกส์', listRates: 'การรายงานผลการฝึก ฯ หรือฝึกหัดศึกษา'},
        ]
        // call data 
            fnDrawTable('A2', data)
        return data
    }
    
</script>
</html>