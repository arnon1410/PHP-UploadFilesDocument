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

    <title>แบบติดตาม ปค.๕</title>
</head>
<body>
    <div id='dvFormAssessment'>
       <!-- Content -->
    </div>

</body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='../../script/jquery/jquery-3.7.1.js'></script>
    <script src='../../script/bootstarp/js/bootstrap.min.js'></script>
    <script src='../../script/sweetalert2/sweetalert2.all.min.js'></script>
    <script src='../../script/centerFile.js'></script>
    <script src='../../script/control/7sides/drawTableFormFollowPK5.js'></script>
<script>
    $(document).ready(function() {
        fnGetDataInternalControl()
});

    function fnGetDataInternalControl() {
        const data = [ // ความเสี่ยง
            {
                id: '101' ,
                id_sides:'3',
                id_headRisk: '5',
                mainControl: 'ด้านการข่าว',
                headRisk: 'การปฏิบัติงานด้านการข่าว', 
                objRisk: 'เพื่อให้มีความมั่นใจว่ามีเครื่องมือ/อุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการปฏิบัติงานด้านการข่าว',
                risking:'กำลังพลด้านการข่าวอาจมีข่าวอาจมีขีดความสามารถที่จำกัดต่อการปฏิบัติงานด้านการข่าว',
                existingControls: 'บริหารจัดการวิธีการปฏิบัติงาน ร่วมกับการจัดกำลังพล/อุปกรณ์ให้เพียงพอต่อการรวบรวมข้อมูลด้านการข่าว',
                existingRisk: '',
                improvementControl:'จัดหาเครื่องมือ/อุปกรณ์เพิ่มเติม เพื่อให้การดำเนินการรวบรวมข้อมูลด้านการข่าวมีประสิทธิภาพเพียงพอต่อการปฏิบัติงาน',
                responsibleAgency: ''

            },
            {
                id: '102' ,
                id_sides:'3',
                id_headRisk: '6',
                mainControl: 'ด้านการข่าว',
                headRisk: 'การปฏิบัติงานด้านการข่าว', 
                objRisk: 'เพื่อให้มีความมั่นใจว่าเจ้าหน้าที่ข่าวทุกนายมีความรู้ ความชำนาญและประสบการณ์ในการวิเคราะห์ข่าวสาร',
                risking:'นักวิเคราะห์ข่าวของชุดปฏิบัติการข่าวยังขาดความรู้ ความชำนาญ และประสบการณ์ ในการวิเคราะห์ข่าวสาร',
                existingControls: 'ตาม รปจ.ขว.กปชให้เจ้าหน้าที่ข่าวทุกนายเพิ่มความรอบคอบในการวิเคราะห์ข่าวสารและศึกษาหาความรู้เพิ่มเติม โดยมอบหมายให้ หน.ปฏิบัติการข่าวฯ และ หน.การข่าวฯ กำกับดูแลอย่างใกล้ชิด ๒.หลักสูตรอบรมด้านการข่าว เช่น',
                existingRisk: '',
                improvementControl:'จัดการฝึกอบรมเชิงปฏิบัติการ (Workshop) ให้กับเจ้าหน้าที่ข่าวโดยเน้นให้ผู้เข้ารับการฝึกอบรมฝึกปฏิบัติเพื่อเพิ่มทักษะในการวิเคราะห์ข่าวให้มีประสิทธิภาพเกิคความชำนาญในการปฏิบัติงาน ทุก ๆ ๖ เดือน',
                responsibleAgency: ''
            }
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