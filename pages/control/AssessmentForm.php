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
    width: 21cm;
    height: 23.7cm;
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
    width: 250px; /* ปรับขนาดของ div เพื่อให้จุดเท่ากัน */
    
    
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
    border-top: 1px solid black;
    border-bottom: 1px solid black;
    background-color: #f2f2f2;
    position: sticky;
    top: 0;
    z-index: 1;
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
.dvEvaluation {
    font-weight: bold;
    font-size: 18px;
    margin-top: 20px;
    margin-bottom: 10px;
}
.dvSignature {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    font-size: 16px;
}
.dvSignature > div {
    width: 250px; /* ปรับขนาดของ div เพื่อให้จุดเท่ากัน */   
}
.dvFooterForm {
    width: 100%;
    text-align: center;
    margin-top: 5%;
}
.dvFooterForm {
    width: 100%;
    text-align: center;
    margin-top: 5%;
}
#displayTextCommentEvaluation {
    white-space: pre-wrap;
}
    </style>
    <title>แบบฟอร์มประเมิน</title>
</head>
<body>
    <div id='dvFormAssessment'>
   
       
    </div>

</body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='../../script/jquery/jquery-3.7.1.js'></script>
    <script src='../../script/bootstarp/js/bootstrap.min.js'></script>
    <script src='../../script/sweetalert2/sweetalert2.all.min.js'></script>
    <script src='../../script/centerFile.js'></script>
    <script src='../../script/control/7sides/drawTableEvaluation.js'></script>
<script>
    $(document).ready(function() {
        fnGetDataInternalControl()
});

    function fnGetDataInternalControl() {
        const data = [
            {id: '1' , mainControl: 'ด้านการข่าว', listControl: 'แบบสอบถาม' , enControl:'news'},
            {id: '2' , mainControl: 'ด้านการข่าว', listControl: 'แบบประเมินฯ', enControl:'news'},
            {id: '3' , mainControl: 'ด้านการข่าว', listControl: 'แบบ ปม.', enControl:'news'}
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