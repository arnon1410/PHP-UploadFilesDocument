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
.dvFormReport {
    width: 21cm;
    height: 23.7cm;
    /* border: 1px solid black; */
    padding: 20px;
    box-sizing: border-box;
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
.dvPointSumEachSides {
    /* align-items: flex-end; */
    margin-bottom: 10px
}
table {
    width: 100%;
    border-collapse: collapse;
}
th, td {
    border-left: 1px solid black;
    border-right: 1px solid black;
   /* border-top: 1px solid black; ลบออก */
    /*border-bottom: 1px solid black; ลบออก */
    /* padding: 5px; */
    padding: 0px 5px 5px 5px;
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
.tdUnderline {
    border-bottom: 1px solid black;
}
.tdSidesOther {
    border-bottom: 1px solid black;
}
.hidden {
    display: none;
}
p {
    margin-bottom: 0 !important; 
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
    margin-bottom: 5%;
}

/* Hide default checkbox */
.have-checkbox {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 17px;
    height: 17px;
    border: 1px solid #000; /* Add border for default state */
    cursor: pointer;
    position: relative;
    margin-right: 5px; /* Adjust spacing as needed */
}
/* Checked state */
.have-checkbox:checked {
    border: none; /* Remove border when checked */
}
.have-checkbox:checked::after {
    content: '✓'; /* Text symbol for checked state */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black; /* Font color */
    font-size: 18px; /* Larger font size */
    font-family: Arial, sans-serif; /* Optional: Specify font family */
}

 /* Hide default checkbox */
 .nothave-checkbox {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 17px;
    height: 17px;
    border: 1px solid #000; /* Add border for default state */
    cursor: pointer;
    position: relative;
    margin-right: 5px; /* Adjust spacing as needed */
}
/* Checked state */
.nothave-checkbox:checked {
    border: none; /* Remove border when checked */
}
.nothave-checkbox:checked::after {
    content: '✕'; /* Text symbol for checked state */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black; /* Font color */
    font-size: 18px; /* Larger font size */
    font-family: Arial, sans-serif; /* Optional: Specify font family */
}

 /* Hide default checkbox */
 .notapp-checkbox {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 17px;
    height: 17px;
    border: 1px solid #000; /* Add border for default state */
    cursor: pointer;
    position: relative;
    /* margin-right: 5px; Adjust spacing as needed */
}
/* Checked state */
.notapp-checkbox:checked {
    border: none; /* Remove border when checked */
}
.notapp-checkbox:checked::after {
    content: 'NA'; /* Text symbol for checked state */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black; /* Font color */
    font-size: 18px; /* Larger font size */
    font-family: Arial, sans-serif; /* Optional: Specify font family */
}


.label-required::after {
    content: " *";
    color: red;
}

.checkbox-container {
    width: 8%;
}
.checkbox-container input[type="checkbox"] {
    width: 16px;
    height: 16px;
}
.checkbox-container label {
    font-size: 16px;
    margin-left: 5px;
}
.checkbox-container .hidden {
    display: none;
}

</style>
    <title>แบบสอบถาม</title>
</head>
<body>
    <div id='dvFormReport'>
        <!-- Content -->
    </div>

    <!-- Start Modal สร้างฟอร์ม เพิ่มเอกสารที่เกี่ยวข้องกับกิจกรรม -->
    <div class="modal fade" id="relateDocumentModal" tabindex="-1" aria-labelledby="relateDocumentModalModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="textHeadModal">เพิ่มเอกสารที่เกี่ยวข้องกับกิจกรรม</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="dvBodyModalRelateDocumentModal">
                
            </div>
            <div class="modal-footer" id="dvFooterModalrelateDocumentModal"></div>
            </div>
        </div>
    </div>

        <!-- Start Modal สร้างฟอร์ม เพิ่มความเสี่ยงอื่นที่พบ -->
        <div class="modal fade" id="OtherRiskModal" tabindex="-1" aria-labelledby="OtherRiskModalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="textHeadModal2">เพิ่มความเสี่ยงอื่นที่พบ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="dvBodyModalOtherRiskModal">
            
        </div>
        <div class="modal-footer" id="dvFooterModalOtherRiskModal"></div>
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
    <script src='../../script/control/7sides/drawTableFormNews.js'></script>
    
    <script src='../../script/control/7sides/data_testQ.js'></script>    <!-- Data test ลบออกเมื่อสร้างเดต้าเบส -->

<script>
    $(document).ready(function() {
        fnGetDataInternalControl()

    $('input[type="checkbox"]').click(function(event) {
        var checkboxes = $(this).closest('tr').find('input[type="checkbox"]');
        //เช็คเพิ่ม กรณีของสรุป
        checkboxes.not(this).prop('checked', false); // ยกเลิก Checkbox อื่นทั้งหมดในแถวเดียวกัน
    });
    $('#checkButton').click(function() {
        var checkedColumns = [];

        var rows = $('table tr').slice(1); // ไม่นับแถวหัวข้อ
        
        var uncheckedRows = [];
        rows.each(function() {
            var checkboxes = $(this).find('input[type="checkbox"]');
            var isChecked = false;
            
            checkboxes.each(function() {
                if ($(this).prop('checked')) {
                    isChecked = true;
                    return false; // ออกจากการวน loop ของ checkboxes
                }
            });
            
            if (!isChecked) {
                uncheckedRows.push($(this).index() + 1); // เก็บหมายเลขแถวที่ไม่ได้เช็ค
            }
        });
            
        if (uncheckedRows.length > 0) {
            alert('กรุณาเลือก checkbox ในแถวที่: ' + uncheckedRows.join(', '));
        } else { // ติ้กถูกหมดแล้ว
            $('input[type="checkbox"]:checked').each(function() {
                $(this).hide(); // ซ่อน input ที่ถูกกด
                $(this).siblings('label').show(); // แสดง label ในช่องนั้น
            });
            var uncheckedCheckboxes = $('input[type="checkbox"]:not(:checked)');
            
        }
    });
});



    /* input Modal*/
    $('input[type=radio][name=flexRadioDefault]').change(function() {
        if (this.value == 'havefile') {
            $('#dvuploadfile').show()
        } else if (this.value == 'notfile') {
            $('#dvuploadfile').hide()
        }
    })

    function fnGetDataInternalControl() {
        // const data = [
        //     {id: '1' , mainControl: 'ด้านการข่าว', listControl: 'แบบสอบถาม' , enControl:'news'},
        //     {id: '2' , mainControl: 'ด้านการข่าว', listControl: 'แบบประเมินฯ', enControl:'news'},
        //     {id: '3' , mainControl: 'ด้านการข่าว', listControl: 'แบบ ปม.', enControl:'news'}
        // ]

        /* start ส่วนของสิทธิผู้ใช้งาน */
        var valAccess = fnGetAllUrlParams().authen
        var valSides = fnGetAllUrlParams().sides

        // call function ข้อมูลของแต่ล้ะด้านเพื่อส่งไปใน function 
        // var objDataQuestion = valSides // '' return to function fnDrawTableForm
        // var branchBudget = [1,2,3,4,5];
        // call api or database
        /* end ส่วนของสิทธิผู้ใช้งาน */


        // ลบออกด้วย
        // call data 
        var dataTest = fncollectDataTest(valSides)
        
        fnDrawTableForm(valAccess, valSides, dataTest) // dataTest -> objDataQuestion
        // return data
    }      
</script>
</html>