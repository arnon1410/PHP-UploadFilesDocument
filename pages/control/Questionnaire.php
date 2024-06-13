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
    margin-right: 5px; /* Adjust spacing as needed */
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
</style>
    <title>แบบสอบถาม</title>
</head>
<body>
    <div id='dvFormReport'>
        <!-- Content -->
    </div>

    <!-- Start Modal สร้างฟอร์ม -->
    <div class="modal fade" id="relateDocumentModal" tabindex="-1" aria-labelledby="relateDocumentModalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="textHeadModal">เพิ่มเอกสารที่เกี่ยวข้องกับกิจกรรม</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="dvBodyModalRelateDocumentModal">
            
        </div>
        <div class="modal-footer" id="dvFooterModalrelateDocumentModal">

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
    <script src='../../script/control/7sides/drawTableFormNews.js'></script>
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
        const data = [
            {id: '1' , mainControl: 'ด้านการข่าว', listControl: 'แบบสอบถาม' , enControl:'news'},
            {id: '2' , mainControl: 'ด้านการข่าว', listControl: 'แบบประเมินฯ', enControl:'news'},
            {id: '3' , mainControl: 'ด้านการข่าว', listControl: 'แบบ ปม.', enControl:'news'}
        ]
        const textAndIds = {
                sections: [
                {
                    title: "การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ",
                    objectives: "เพื่อให้มั่นใจว่ามีเครื่องมือ และอุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ",
                    controls: [
                        { id: 1.1, description: "มีการแต่งตั้งนายทะเบียน ผู้ช่วย เจ้าหน้าที่ข้อมูลข่าวสารลับ" },
                        { id: 1.2, description: "มีการกำหนดชั้นความลับตามระเบียบว่าด้วยการรักษาความลับของทางราชการ พ.ศ.๒๕๕๔" },
                        { id: 1.3, description: 'การอนุญาตให้บุคลากรเข้าถึงชั้นความลับ โดยยืดหลัก "จำกัดให้ทราบเท่าที่จำเป็น"' },
                        { id: 1.4, description: "ผู้เข้าถึงชั้นความลับ รักษาความลับโดยปฏิบัติตามระเบียบที่กำหนดไว้โดยเคร่งครัด" },
                        { id: 1.5, description: "มีการดำเนินการเกี่ยวกับข้อมูลข่าวสารลับให้เป็นไปตามระเบียบว่าด้วยการรักษาความลับของทางราชการ พ.ศ.๒๕๔๔ ทะเบียนรับ ทะเบียนส่ง และทะเบียนควบคุมข้อมูลข่าวสารลับ" },
                        { id: 1.6, description: "การดำเนินการเกี่ยวกับเอกสารลับมีใบปกปิดทับตามชั้นเอกสารลับ ชั้นลับ ลับมาก ลับที่สุด" },
                        { id: 1.7, description: "การส่งเอกสารลับ ใช้ซองทึบแสง ๒ ชั้น โดยชั้นในแสดงความลับทั้งด้านหน้า - หลัง ส่วนชั้นนอกจะต้องไม่มีเครื่องหมายแสดงใดๆ ที่บ่งบอกว่าเป็นข้อมูลข่าวสารลับ" },
                        { id: 1.8, description: "มีการกำหนดชั้นความลับตามระเบียบว่าด้วยการรักษาความลับของทางราชการ พ.ศ.๒๕๕๔" },
                        { id: 1.9, description: "การเก็บรักษาข้อมูลข่าวสารลับเก็บไว้ในที่ปลอดภัย กรณีเก็บไว้ในเครื่องคอมพิวเตอร์มีการกำหนดรหัสผ่าน" },
                        { id: 1.10, description: "การยืม มีการพิจารณาผู้ยืมเกี่ยวกับเรื่องนั้นหรือไม่ และเจ้าของเรื่องเดิมต้องอนุญาตก่อน และมีการทำบันทึกการยืมไว้" },
                        { id: 1.11, description: "กรณีข้อมูลข่าวสารลับสูญหาย หรือรั่วไหล มีการแต่งตั้งกรรมการสอบสวน เพื่อหาสาเหตุ และกำหนดมาตรการป้องกันมิให้เกิดซ้ำ" }            ],
                    summary: "การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ",
                    controlStatus: { sufficient: false, improvementSuggestions: "" }
                },
                {
                    title: "การรักษาความปลอดภัยเกี่ยวกับบุคคล",
                    objectives: "เพื่อให้มั่นใจว่าข้อมูลข่าวสารลับ มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับบุคคล",
                    controls: [
                        { id: 2.1, description: "มีการอบรมชี้แจง ข้าราชการที่มีหน้าที่เกี่ยวข้องกับสิ่งที่เป็นความลับของทางราชการให้ทราบโดยละเอียดถึงความสำคัญและมาตรการของการรักษาความปลอดภัยเป็นครั้งคราวตามโอกาส" },
                        { id: 2.2, description: "มีการลงคำสั่งเป็นลายลักษณ์อักษรแต่งตั้งบุคคลให้ทำหน้าที่เกี่ยวกับสิ่งที่เป็นความลับของทางราชการ" }
                    ],
                    summary: "การรักษาความปลอดภัยเกี่ยวกับบุคคล",
                    controlStatus: { sufficient: false, improvementSuggestions: "" }
                },
                {
                    title: "การรักษาความปลอดภัยเกี่ยวกับสถานที่",
                    objectives: "เพื่อให้มีความมั่นใจว่าเครื่องมือและอุปกรณ์ ที่มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับสถานที่",
                    controls: [
                        { id: 3.1, description: "มีการกำหนดมาตรการ เพื่อรักษาความปลอดภัยแก่อาคาร สถานที่ วัสดุ อุปกรณ์ ในอาคารสถานที่ให้พ้นจากการโจรกรรม จารกรรม และการก่อวินาศกรรม" },
                        { id: 3.2, description: "ข้าราชการมีการติดป้ายแสดงตน เพื่อแสดงว่าเป็นผู้ที่ได้รับอนุญาตให้เข้าพื้นที่ได้" },
                        { id: 3.3, description: "การป้องกันอัคคีภัย มีการแต่งตั้งข้าราชการเป็นเจ้าหน้าที่ดับเพลิงโดยแบ่งเป็น ๒ กลุ่ม คือ กลุ่มที่มีหน้าที่ดับเพลิง และกลุ่มที่มีหน้าที่ขนย้าย" },
                        { id: 3.4, description: "มีหมายเลขโทรศัพท์ของหน่วยดับเพลิงและที่จำเป็นเพื่อ ติดต่อขอความช่วยเหลือหรือแจ้งเหตุให้ทราบ" },
                        { id: 3.5, description: "ข้าราชการได้รับการอบรมชี้แจงเกี่ยวกับขั้นตอนการปฏิบัติเมื่อเกิดอัคคีภัย เส้นทางอพยพและขนย้ายและการใช้เครื่องมือ ดับเพลิงเบื้องต้น" },
                        { id: 3.6, description: "มีการจัดลำดับความสำคัญในการขนย้ายพัสดุ สิ่งของเอกสารภายในสำนักงาน และมีการปิดป้ายหมายเลขไว้" },
                    ],
                    summary: "การรักษาความปลอดภัยเกี่ยวกับสถานที่",
                    controlStatus: { sufficient: false, improvementSuggestions: "" }
                },
                {
                    title: "ความพร้อมในการดำเนินงานด้านการข่าว",
                    objectives: "เพื่อให้มั่นใจว่าการดำเนินงาน ด้านการข่าว มีแนวทางการบริหารจัดการเพียงพอให้การปฏิบัติงาน ด้านการข่าวบรรลุภารกิจของหน่วย",
                    controls: [
                        {
                            id: 4.1,
                            description: "มีการจัดทำแผนการปฏิบัติงานด้านการข่าวของหน่วย",
                            subControls: [
                                { id: "4.1.1", description: "ระยะสั้น" },
                                { id: "4.1.2", description: "ระยะปานกลาง" }
                            ]
                        },
                        { id: 4.2, description: "มีการกำหนดผู้รับผิดชอบหลัก ผู้รับผิดชอบรอง ผู้ปฏิบัติและหน่วยสนับสนุนในการปฏิบัติงานด้านการข่าว" },
                        { id: 4.3, description: "มีการจัดทำแผนรวบรวมข่าวสาร เพื่อแบ่งมอบภารกิจ/เป้าหมายในการรวบรวมข่าวอย่างชัดเจน" },
                        { id: 4.4, description: "กำลังพลในหน่วยมีความเข้าใจหน้าที่และความรับผิดชอบในการดำเนินงานด้านการข่าวของตนเอง" },
                        { id: 4.5, description: "มีงบประมาณที่ใช้ในการปฏิบัติงานด้านการข่าวอย่างเพียงพอ" },
                        { id: 4.6, description: "มีการกำหนดวงรอบการรายงานข่าวสารอย่างเป็นระบบ" },
                        { id: 4.7, description: "มีขีดความสามารถในการฝึกอบรมให้กำลังพลมีความรู้ความสามารถในการปฏิบัติงานด้านการข่าว" },
                        { id: 4.8, description: "มีแผนการฝึกอบรมเพิ่มเติมหรือการฝึกทบทวนทั้งในระยะสั้นหรือระยะปานกลาง เพื่อพัฒนาให้กำลังพลมีความพร้อมและประสบการณ์ เพิ่มมากขึ้น" },
                        { id: 4.9, description: "มีการสนับสนุนการฝึก ศึกษา และอบรม ทั้งจากภายในและภายนอก ทร." },
                        { id: 4.10, description: "มีการประชุมหน่วยเกี่ยวข้องเพื่อประสานงานและแก้ไข ปัญหาที่เกิดขึ้นในการปฏิบัติงาน" },
                        { id: 4.11, description: "กำลังพลมีความเข้าใจแผนปฏิบัติงานด้านการข่าว หรือแผนรวบรวมข่าวสาร" },
                        {
                            id: 4.12,
                            description: "มีการจัดทำแผน และมาตรการ การรักษาความปลอดภัย",
                            subControls: [
                                { id: "4.12.1", description: "ด้านสถานที่" },
                                { id: "4.12.2", description: "ด้านเอกสาร" },
                                { id: "4.12.3", description: "ด้านบุคคล" },
                            ]
                        },
                        { id: 4.13, description: "มีการจัดทำแผนต่อต้านข่าวกรอง" },
                        { id: 4.14, description: "มีการจัดหาแหล่งข่าว เพื่อรวบรวมข่าวสารทั้งภายในและภายนอกประเทศ" },
                        { id: 4.15, description: "มีการจัดหาแหล่งข่าวเพิ่มเติม เพื่อให้เพียงพอต่อการรวบรวม ข้อมูลหรือข่าวสาร ตามเป้าหมายด้านการข่าวที่เพิ่มมากขึ้น" },
                        { id: 4.16, description: "มีการกระจายข้อมูลข่าวสารหรือข่าวกรองไปยังหน่วยที่จำเป็นต้องใช้" },
                        { id: 4.17, description: "มีการจัดเก็บข้อมูลด้านการข่าว อย่างเป็นระบบ" },
                    ],
                    summary: "ความพร้อมในการดำเนินงานด้านการข่าว",
                    controlStatus: { sufficient: false, improvementSuggestions: "" }
                },
                {
                    title: "เครื่องมือและอุปกรณ์ที่ใช้ในงานด้านการข่าว",
                    objectives: "เพื่อให้มั่นใจว่าเครืองมือและอุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการปฏิบัติงานด้านการข่าว",
                    controls: [
                        { id: 5.1, description: "มีการจัดหาเครื่องมือ อุปกรณ์ และยานพาหนะด้านการข่าว ที่มีความทันสมัยและประสิทธิภาพเพียงพอต่อการปฏิบัติงาน" },
                        { id: 5.2, description: "มีการลงทะเบียนครุภัณฑ์และจัดทำรายการแจกจ่ายเครื่องมือและอุปกรณ์ถูกต้องตามระเบียบ รวมทั้งมีการตรวจสอบประจำปี" },
                        { id: 5.3, description: "มีสถานที่เก็บเครื่องมือและอุปกรณ์ที่มีความปลอดภัย" },
                        { id: 5.4, description: "มีการจัดทำแผน เพื่อจัดหาและซ่อมบำรุงเครื่องมือและ อุปกรณ์ด้านการข่าว" },
                        { id: 5.5, description: "มีการดำเนินการจำหน่ายเครื่องมือและอุปกรณ์ด้านการข่าว ที่ชำรุดหรือหมดความจำเป็นในการใช้งาน" },
                        { id: 5.6, description: "มีการนำระบบเทคโนโลยีสารสนเทศมาใช้ในการปฏิบัติงาน" },
                    ],
                    summary: "การรักษาความปลอดภัยเกี่ยวกับสถานที่",
                    controlStatus: { sufficient: false, improvementSuggestions: "" }
                },
                {
                    title: "การปฏิบัติงานด้านการข่าว",
                    objectives: "เพื่อให้มีความมั่นใจว่ากำลังพล มีเพียงพอที่จะปฏิบัติงานด้านการข่าว มีความรู้ ความชำนาญ ในการ วิเคราะห์ข่าว และปฏิบัติตามกฎ ระเบียบ ข้อบังคับหรือมาตรการเกี่ยวกับการรักษาความปลอดภัยโดยเคร่งครัดรวมทั้งมีแนวทางในการบริหารงานด้านบุคคลากรด้านการข่าว",
                    controls: [
                        { id: 6.1, description: "มีการกำหนดคุณสมบัติของกำลังพลที่ปฏิบัติงานด้านการข่าว" },
                        { id: 6.2, description: "ระบบการรายงานข้อมูลด้านการข่าวมีความรวดเร็ว ทันต่อเหตุการณ์ และการตัดสินใจของผู้บังคับบัญชา" },
                        { id: 6.3, description: "มีการฝึกอบรมให้เจ้าหน้าที่มีความรู้ ความชำนาญในการใช้เครื่องมือ อุปกรณ์ หรือระบบสารสนเทศด้านการข่าว" },
                        { id: 6.4, description: "มีการฝึกอบรมเพื่อให้ความรู้ ความชำนาญและประสบการณ์ในการปฏิบัติงานด้านการข่าว โดยเฉพาะในการวิเคราะห์ข่าวสาร" },
                        { id: 6.5, description: "มีการสรรหาหรือคัดเลือกกำลังพลที่มีขีดความสามารถและเหมาะสม เพื่อให้มาปฏิบัติงานด้านการข่าว" },
                        { id: 6.6, description: "มีแนวทางในการบริหารบุคลากร และมีสิ่งจูงใจในการปฏิบัติงาน ให้กำลังพลด้านการข่าว" },
                        { id: 6.7, description: "มีกำลังพลเพียงพอในการปฏิบัติงาน" },
                        { id: 6.8, description: "มีนักวิเคราะห์ข่าวในการปฏิบัติงานด้านการข่าว" },
                        { id: 6.9, description: "มีการประเมินผล/ตรวจสอบการปฏิบัติงานของกำลังพล" },
                        { id: 6.10, description: "มีการตรวจสอบขีดความสามารถ และความไว้วางใจ บุคคลของกำลังพลที่ปฏิบัติงานด้านการข่าวของหน่วย" },
                        { id: 6.11, description: "มีการปฏิบัติตามกฎ ระเบียบ ข้อบังคับ ด้านการรักษาความปลอดภัยและด้านการข่าว" },
                        { id: 6.12, description: "มีการกวดขันกำลังพลให้ปฏิบัติตามกฎ ระเบียบ ข้อบังคับหรือมาตรการที่เกี่ยวกับการรักษาความปลอดภัย" },
                        { id: 6.13, description: "มีการลงโทษผู้ละเมิดกฎ ระเบียบ ข้อบังคับหรือมาตรการรักษาความปลอดภัย หรือมีมาตรการการลงโทษผู้ละเมิด ดังกล่าว" },
                        { id: 6.14, description: "มีการปรับปรุงกฎ ระเบียบ ข้อบังคับหรือมาตรการรักษาความปลอดภัย เพื่อให้ทันกับการเปลี่ยนแปลงของสถานการณ์ในปัจจุบัน" },
                        { id: 6.15, description: "มีแนวทางการสร้างเสริมจิตสำนึกในการปฏิบัติงานด้านการข่าวให้กับกำลังพลทั่วไปของหน่วย" },
                        { id: 6.16, description: "มีการประเมินผลการปฏิบัติและทบทวน ปรับปรุงแก้ไขแผนรวบรวมข่าวสารให้ทันสมัย" },
                    ],
                    summary: "การรักษาความปลอดภัยเกี่ยวกับบุคคล",
                    controlStatus: { sufficient: false, improvementSuggestions: "" }
                }
            ]
        };



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
        fnDrawTableForm(valAccess, data, data[0].enControl)
        return data
    }      
</script>
</html>