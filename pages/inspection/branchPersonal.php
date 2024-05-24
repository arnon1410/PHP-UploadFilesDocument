<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/inspection/navbar4.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstarp/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <!-- <link href="css/jquery/datatables.min.css" rel="stylesheet"> -->
    <title>สาขากำลังพล</title>
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
        <h1>สาขากำลังพล</h1>
        <p id='textStatusUser'></p>
      </div>
    </div>
    <div class="header-action" id="btnAddData">
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
                <div class="card-header">
                    <!-- Start Selete Content -->
                    <div class="container" id="dvHeadSelectAssessment">

                    </div>
                    <!-- Start Table Content -->
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
    <script src="../../script/jquery/jquery-3.7.1.js"></script>
    <script src="../../script/bootstarp/js/bootstrap.min.js"></script>
    <script src="../../script/centerFile.js"></script>
    <script src="../../script/inspection/drawTable.js"></script>
    <script src="../../script/inspection/sidebar.js"></script>
<script>
    $(document).ready(function() {
      fnSetSidebarMenuInspection('branchPersonal')
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
        const data = [
            {id: '1' , mainRates: 'สาขากำลังพล', headRates: 'สาขากำลังพล', listRates: 'แผนงาน'},
            {id: '2' , mainRates: 'สาขากำลังพล', headRates: 'สาขากำลังพล', listRates: 'คำสั่งแบ่งมอบงาน'},
            {id: '3' , mainRates: 'สาขากำลังพล', headRates: 'สาขากำลังพล', listRates: 'สายการบังคับบัญชา'},
            {id: '4' , mainRates: 'สาขากำลังพล', headRates: 'สาขากำลังพล', listRates: 'เอกสารอ้างอิงด้านกำลังพล'},
            {id: '5' , mainRates: 'สาขากำลังพล', headRates: 'สาขากำลังพล', listRates: 'คู่มือปฏิบัติงานประจำตัวประจำตำแหน่ง'},
            {id: '6' , mainRates: 'สาขากำลังพล', headRates: 'สาขากำลังพล', listRates: 'คำสั่งแต่งตั้งกรรมการพิจารณาบำเหน็จ'},
            {id: '7' , mainRates: 'สาขากำลังพล', headRates: 'สาขากำลังพล', listRates: 'การทดสอบสมรรถภาพร่างกายประจำปี'},
            {id: '8' , mainRates: 'สาขากำลังพล', headRates: 'สาขากำลังพล', listRates: 'การทดสอบภาษาอังกฤษของกำลังพล'},
            {id: '9' , mainRates: 'สาขากำลังพล', headRates: 'สาขากำลังพล', listRates: 'คำสั่ง 5 ส. การจัดกิจกรรม'},
            {id: '10', mainRates: 'สาขากำลังพล', headRates: 'สาขากำลังพล', listRates: 'การร้องทุกข์คำสั่งแต่งตั้งเจ้าหน้าที่ เจ้าหน้าที่ระบบ hrmiss'},
            {id: '11', mainRates: 'สาขากำลังพล', headRates: 'สาขากำลังพล', listRates: 'การจัดการความรู้ Km'},
        ]

        /* start ส่วนของสิทธิผู้ใช้งาน */
        var valAccess = fnGetAllUrlParams().authen
        var strAccess = ''
        if (valAccess) {
          if (valAccess == 'user') {
            strAccess = " หน่วยรับประเมิน<span class='las la-chart-line'></span>"
        } else {
            strAccess = " หน่วยตรวจการประเมิน<span class='las la-chart-line'></span>"
        }

        document.getElementById("textStatusUser").innerHTML = strAccess
        /* end ส่วนของสิทธิผู้ใช้งาน */
        }
       
        // call data 
            fnDrawTable(valAccess, data)
        return data
    }      
</script>
</html>