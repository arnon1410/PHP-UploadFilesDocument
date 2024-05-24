<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link href='https://fonts.googleapis.com/css2?family=Sarabun&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='../../css/control/formReport.css' />
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
            margin-top: 10px;
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
        /* th {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            background-color: #f2f2f2;
            position: sticky;
            top: 0;
            z-index: 1;
        } */
        thead th, thead tr {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            background-color: #f2f2f2;
            position: sticky;
        }
        .colspan-header th {
            top: 0;
            z-index: 3; /* Ensure the z-index is higher for the header row with colspan */
        }
        .second-header th {
            top: 36px; /* Adjust the top value to match the height of the first header row */
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
    </style>
    <title>แบบ ปม.</title>
</head>
<body>
    <div id='dvFormAssessment'>
   
       
    </div>

</body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='../../script/jquery/jquery-3.7.1.js'></script>
    <script src='../../script/bootstarp/js/bootstrap.min.js'></script>
    <script src='../../script/centerFile.js'></script>
    <script src='../../script/control/7sides/drawTablePerformanceNews.js'></script>
<script>
    $(document).ready(function() {
        fnGetDataInternalControl()
});

    function fnGetDataInternalControl() {
        const data = [ // ความเสี่ยง
            {
                id: '101' ,
                headRisk: 'เครื่องมือและอุปกรณ์ที่ใช้งานด้านการข่าว', 
                objRisk: 'เพื่อให้มีความมั่นใจว่ามีเครื่องมือ/อุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการปฏิบัติงานด้านการข่าว',
                risking:'เครื่องมือ/อุปกรณ์ในการรวบรวมข้อมูลด้านการข่าวยังมีความไม่ทันสมัยและมีประสิทธิภาพไม่เพียงพอต่อการปฏิบัติงาน',
                activityControl: ''
                improvement:'จัดหาเครื่องมือ/อุปกรณ์เพิ่มเติม เพื่อให้การดำเนินการรวบรวมข้อมูลด้านการข่าวมีประสิทธิภาพเพียงพอต่อการปกิบัติงาน'

            },
            {
                id: '102' ,
                headRisk: 'การปฏิบัติงานด้านการข่าว', 
                objRisk: 'เพื่อให้มีความมั่นใจว่าเจ้าหน้าที่ข่าวทุกนายมีความรู้ ความชำนาญและประสบการณ์ในการวิเคราะห์ข่าวสาร',
                risking:'เครื่องมือ/อุปกรณ์ในการรวบรวมข้อมูลด้านการข่าวยังมีความไม่ทันสมัยและมีประสิทธิภาพไม่เพียงพอต่อการปฏิบัติงาน',
                activityControl: ''
                improvement:'จัดหาเครื่องมือ/อุปกรณ์เพิ่มเติม เพื่อให้การดำเนินการรวบรวมข้อมูลด้านการข่าวมีประสิทธิภาพเพียงพอต่อการปกิบัติงาน'

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