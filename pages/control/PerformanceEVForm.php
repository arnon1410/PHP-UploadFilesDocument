<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link href='https://fonts.googleapis.com/css2?family=Sarabun&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../../css/control/formReport.css' />
    <link rel="stylesheet" href="../../css/sweetalert2/sweetalert2.min.css" >
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css'>

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='../../css/bootstarp/css/bootstrap.min.css'>
    <script src='../../script/bootstarp/js/popper.min.js'></script>
    <script src='../../script/bootstarp/js/bootstrap.min.js'></script> 
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            display: grid;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .a4-size {
            width: 29.7cm; /* ปรับเป็น 29.7cm สำหรับแนวนอน */
            height: 21cm; /* ปรับเป็น 21cm สำหรับแนวนอน */
            /* border: 1px solid black; */
            padding: 20px;
            box-sizing: border-box;
        }
        .title {
            text-align: center;
            font-size: 18px;
            /* margin-bottom: 10px; */
        }
        .subtitle {
            text-align: center;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .textSum {
            font-size: 18px;
            margin-top: 20px;
        }
        .dvSignature {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            font-size: 16px;
        }
        .dvSignature > div {
            width: 350px; /* ปรับขนาดของ div เพื่อให้จุดเท่ากัน */
            
            
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border-left: 1px solid black;
            border-right: 1px solid black;
            border-top: 1px solid black; /*ลบออก */
            border-bottom: 1px solid black; /*ลบออก */
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        thead th, thead tr {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
       
            position: sticky;
        }
        .colspan-header th {
            top: 0;
            z-index: 3; /* Ensure the z-index is higher for the header row with colspan */
        }
        .second-header th {
            top: 37px; /*  Adjust the top value to match the height of the first header row */
            z-index: 2;
        }
        .hidden {
            display: none;
        }
        p {
            max-width: 1000px; /* กำหนดความกว้างสูงสุดของ <p> */
            width: 100%; /* กำหนดให้ <p> มีความกว้างเต็มพื้นที่ */
            padding: 10px; /* ระยะห่างขอบซ้ายขวาของ <p> */
            line-height: 1.6; /* ระยะห่างระหว่างบรรทัดของเนื้อหาใน <p> */
        }
        table p {
            word-wrap: break-word; /* หรือคุณสามารถใช้ word-break: break-all; */
            white-space: normal;
        }
        textarea {
            margin-right: 5px;
        }

        /* ส่วน table matrix */
        .highlight {
            border: 3px solid !important;
            box-shadow: -5px 5px 20px 20px rgba(14, 1, 1, 0.17), -15px -11px 20px 5px rgba(14, 14, 14, 0.22) !important;
            border-style: dashed !important;
        }
        .VH {
            background-color: #f90909 !important;
            font-weight: 550 !important;
            text-align: center !important;
        }
        .H {
            background-color: #f99d09 !important;
            font-weight: 550 !important;
            text-align: center !important;
        }
        .M {
            background-color: #f9d909 !important;
            height: 60px !important;
            font-weight: 550 !important; 
            text-align: center !important;
        }
        .L {
            background-color: #4c7c04 !important;
            font-weight: 550 !important;
            text-align: center !important;
        }
        #rMatrix {
            table-layout: fixed;
            width: 100%;
            vertical-align: middle !important;
            text-align: center !important;
            font-weight: 550 !important;
        }

        #rMatrix td, #rMatrix th {
            width: 20%; /* แบ่งเป็น 5 คอลัมน์ที่เท่ากัน */
            text-align: center;
        }

        .footerCell {
            text-align: center !important;
        }
        .rotate-90 {
            transform: rotate(270deg);
            /* transform-origin: left top; */
            display: inline-block;
        }
        #rHeader {
            padding: 0 !important;
            width: 1px;
            white-space: nowrap;
        }
        .dvFooterForm {
            width: 100%;
            text-align: center;
            margin-top: 5%;
        }
        textarea {
            margin-right: 0px !important;
        }
    </style>

    <title>แบบ ปม.</title>
</head>
<body>
    <div id='dvFormAssessment'>
       <!-- Content -->
    </div>

    <!-- Modal ChanceRisk -->
    <div class='modal fade' id='chanceRiskModal' tabindex='-1' aria-labelledby='chanceRiskModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
        <div class='modal-header'>
            <h1 class='modal-title fs-5' id='chanceRiskModalLabel'>โอกาสที่เกิดความเสี่ยง</h1>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
        <input type="hidden" id="InputChanceRiskHide" value=''>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class='text-center'>โอกาส</th>
                    <th scope="col" class='text-center'>ความถี่</th>
                    <th scope="col" class='text-center'>คะแนน</th>
            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class='text-center' contenteditable="true">สูงมาก</td>
                    <td class='text-center' contenteditable="true">มากกว่า 20 ครั้ง/ปี</td>
                    <td class='text-center'>
                        <input type="radio" id="inputValChanceRisk5" name="inputValChanceRisk" value="5"> 5
                    </td>
                </tr>
                <tr>
                    <td class='text-center' contenteditable="true">สูง</td>
                    <td class='text-center' contenteditable="true">11 - 20 ครั้ง/ปี</td>
                    <td class='text-center'>
                        <input type="radio" id="inputValChanceRisk4" name="inputValChanceRisk" value="4"> 4
                    </td>
                </tr>
                <tr>
            
                    <td class='text-center' contenteditable="true">ปานกลาง</td>
                    <td class='text-center' contenteditable="true">6 - 10 ครั้ง/ปี</td>
                    <td class='text-center'>
                        <input type="radio" id="inputValChanceRisk3" name="inputValChanceRisk" value="3"> 3
                    </td>
                </tr>
                <tr>
                    
                    <td class='text-center' contenteditable="true">น้อย</td>
                    <td class='text-center' contenteditable="true">3 - 5 ครั้ง/ปี</td>
                    <td class='text-center'>
                        <input type="radio" id="inputValChanceRisk2" name="inputValChanceRisk" value="2"> 2
                    </td>
                </tr>
                <tr>
                    <td class='text-center' contenteditable="true">น้อยมาก</td>
                    <td class='text-center' contenteditable="true">3 ครัั้ง/ปี</td>
                    <td class='text-center'>
                        <input type="radio" id="inputValChanceRisk1" name="inputValChanceRisk" value="1"> 1
                    </td>
                </tr>
            </tbody>
        </table>
            </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>ยกเลิก</button>
            <button type='button' class='btn btn-primary' onclick='fnSaveChanceRiskModal(this)'>บันทึกข้อมูล</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal effectRisk -->
    <div class='modal fade' id='effectRiskModal' tabindex='-1' aria-labelledby='effectRiskModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
        <div class='modal-header'>
            <h1 class='modal-title fs-5' id='effectRiskModalLabel'>ผลกระทบความเสี่ยง</h1>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
        <input type="hidden" id="InputEffectRiskHide">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class='text-center'>ผลกระทบ</th>
                    <th scope="col" class='text-center'>ความเสียหาย</th>
                    <th scope="col" class='text-center'>คะแนน</th>
            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class='text-center'>สูงมาก</td>
                    <td class='text-center' contenteditable="true">มากกว่า 10 ล้านบาท</td>
                    <td class='text-center'>
                        <input type="radio" id="inputValEffectRisk5" name="inputValEffectRisk" value="5"> 5
                    </td>
                </tr>
                <tr>
                    <td class='text-center'>สูง</td>
                    <td class='text-center' contenteditable="true">ระหว่าง 5 แสนบาท - 10 ล้าน</td>
                    <td class='text-center'>
                        <input type="radio" id="inputValEffectRisk4" name="inputValEffectRisk" value="4"> 4
                    </td>
                </tr>
                <tr>
            
                    <td class='text-center'>ปานกลาง</td>
                    <td class='text-center' contenteditable="true">ระหว่าง 1 แสนบาท - 5 แสนบาท</td>
                    <td class='text-center'>
                        <input type="radio" id="inputValEffectRisk3" name="inputValEffectRisk" value="3"> 3
                    </td>
                </tr>
                <tr>
                    
                    <td class='text-center'>น้อย</td>
                    <td class='text-center' contenteditable="true">ระหว่าง 1 หมื่นบาท - 1 แสนบาท</td>
                    <td class='text-center'>
                        <input type="radio" id="inputValEffectRisk2" name="inputValEffectRisk" value="2"> 2
                    </td>
                </tr>
                <tr>
                    <td class='text-center'>น้อยมาก</td>
                    <td class='text-center' contenteditable="true">น้อยกว่า 1 หมื่นบาท</td>
                    <td class='text-center'>
                        <input type="radio" id="inputValEffectRisk1" name="inputValEffectRisk" value="1"> 1
                    </td>
                </tr>
            </tbody>
        </table>
            </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>ยกเลิก</button>
            <button type='button' class='btn btn-primary' onclick='fnSaveEffectRiskModal(this)'>บันทึกข้อมูล</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal Matrix - ChanceRisk And EffectRisk-->
    <div class='modal fade' id='MatrixRankModal' tabindex='-1' aria-labelledby='MatrixRankModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
        <div class='modal-header'>
            <h1 class='modal-title fs-5' id='MatrixRankModalLabel'>ระดับความเสี่ยง</h1>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
        <!-- เก็บค่า ระดับความเสี่ยง -->
        <input type="hidden" id="InputValueChanceRisk1">
        <input type="hidden" id="InputValueEffectRisk1">
        <input type="hidden" id="InputValueChanceRisk2">
        <input type="hidden" id="InputValueEffectRisk2">
        <input type="hidden" id="InputValueChanceRisk3">
        <input type="hidden" id="InputValueEffectRisk3">

        <table class="table table-bordered table-responsive" id="rMatrix">
        <thead>
        </thead>
        <tbody>
            <tr id="row5">
                <td id="rHeader"  rowspan="6" style="text-align:center">
                    <span class='rotate-90'>ผลกระทบความเสี่ยง</span>
                </td>
                <td id="col1" class="M">5</td>
                <td id="col2" class="H">10</td>
                <td id="col3" class="H">15</td>
                <td id="col4" class="VH">20</td>
                <td id="col5" class="VH">25</td>
            </tr>
            <tr id="row4">
                <td id="col1" class="M">4</td>
                <td id="col2" class="M">8</td>
                <td id="col3" class="H">12</td>
                <td id="col4" class="VH">16</td>
                <td id="col5" class="VH">20</td>
            </tr>
            <tr id="row3">
                <td id="col1" class="L">3</td>
                <td id="col2" class="M">6</td>
                <td id="col3" class="M">9</td>
                <td id="col4" class="H">12</td>
                <td id="col5" class="H">15</td>
            </tr>
            <tr id="row2">
                <td id="col1" class="L">2</td>
                <td id="col2" class="L">4</td>
                <td id="col3" class="M">6</td>
                <td id="col4" class="M">8</td>
                <td id="col5" class="H">10</td>
            </tr>
            <tr id="row1">
                <td id="col1" class="L">1</td>
                <td id="col2" class="L">2</td>
                <td id="col3" class="L">3</td>
                <td id="col4" class="M">4</td>
                <td id="col5" class="M">5</td>
            </tr>
            <tr id="footerRow">
                <td colspan='6' id="footerCell">โอกาสที่เกิดความเสี่ยง</td>
            </tr>
        </tbody>
    </table>
            </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>ยกเลิก</button>
            <button type='button' class='btn btn-primary'>บันทึกข้อมูล</button>
        </div>
        </div>
    </div>
    </div>
</body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='../../script/jquery/jquery-3.7.1.js'></script>
    <script src='../../script/bootstarp/js/bootstrap.min.js'></script>
    <script src='../../script/sweetalert2/sweetalert2.all.min.js'></script>
    <script src='../../script/centerFile.js'></script>
    <script src='../../script/control/7sides/drawTablePerformanceNews.js'></script>
<script>
    $(document).ready(function() {
        fnGetDataInternalControl()
        fnDrawTableMatrix()
        
        $('#launchModalButton').click(function() {
            var testValue = 'test';
            // Set the value to the hidden input
            $('#hiddenValueInput').val(testValue);
            // Display the value in the modal
            $('#modalValueDisplay').text('The value is: ' + testValue);
        });
});

    function fnGetDataInternalControl() {
        const data = [ // ความเสี่ยง
            {
                id: '101' ,
                mainControl: 'ด้านการข่าว',
                enControl:'news' , 
                headRisk: 'เครื่องมือและอุปกรณ์ที่ใช้งานด้านการข่าว', 
                objRisk: 'เพื่อให้มีความมั่นใจว่ามีเครื่องมือ/อุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการปฏิบัติงานด้านการข่าว',
                risking:'เครื่องมือ/อุปกรณ์ในการรวบรวมข้อมูลด้านการข่าวยังมีความไม่ทันสมัยและมีประสิทธิภาพไม่เพียงพอต่อการปฏิบัติงาน',
                activityControl: '',
                chanceRisk: '', //3
                effectRisk: '', //3
                rankRisk: '', //9
                // improvement:'จัดหาเครื่องมือ/อุปกรณ์เพิ่มเติม เพื่อให้การดำเนินการรวบรวมข้อมูลด้านการข่าวมีประสิทธิภาพเพียงพอต่อการปฏิบัติงาน'
                improvement:''
            },
            {
                id: '102' ,
                mainControl: 'ด้านการข่าว',
                headRisk: 'การปฏิบัติงานด้านการข่าว', 
                objRisk: 'เพื่อให้มีความมั่นใจว่าเจ้าหน้าที่ข่าวทุกนายมีความรู้ ความชำนาญและประสบการณ์ในการวิเคราะห์ข่าวสาร',
                risking:'นักวิเคราะห์ข่าวของชุดปฏิบัติการข่าวยังขาดความรู้ ความชำนาญ และประสบการณ์ ในการวิเคราะห์ข่าวสาร',
                activityControl: '',
                chanceRisk: '', //5
                effectRisk: '', //4
                rankRisk: '', //20
                // improvement:'จัดการฝึกอบรมเชิงปฏิบัติการ (Workshop)ให้กับเจ้าหน้าที่ข่าวโดยเน้นให้ผู้เข้ารับการอบรมฝึกปฏิบัติเพื่อเพิ่มทักษะในการวิเคราะห์ข่าวให้มีประสิทธิภาพเกิดความชำนาญในการปฏิบัติงาน ทุก ๆ ๖ เดือนโดยใช้ งป.ของหน่วย'
                improvement: ''
            },
        ]

        /* start ส่วนของสิทธิผู้ใช้งาน */
        var valAccess = fnGetAllUrlParams().authen
        var strAccess = ''
        if (valAccess) {
          if (valAccess == 'user') {
            strAccess = " หน่วยรับตรวจ<span class='las la-chart-line'></span>"
        } else {
            strAccess = " หน่วยตรวจสอบ<span class='las la-chart-line'></span>"
        }

        document.getElementById("textStatusUser").innerHTML = strAccess
        /* end ส่วนของสิทธิผู้ใช้งาน */
        }
       
        // call data 
        fnDrawTableForm(valAccess, data)
        return data
    }
    

</script>
</html>