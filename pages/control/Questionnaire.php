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
</style>
    <title>แบบสอบถาม</title>
</head>
<body>
    <div id='dvFormReport'>
        <!-- Content -->
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

            /* input checkbox*/
    // $('input[type="checkbox"]').on('click', function() {
    //     var checkbox = $(this);
    //     var label = $('label[for="' + checkbox.attr('id') + '"]');

    //     var checkboxes = $(this).closest('tr').find('input[type="checkbox"]');

    //     checkboxes.each(function() {
    //             if ($(this).prop('checked') && this !== event.target) {
    //                 $(this).prop('checked', false);
    //             }
    //         });
    //     });
        
        // if (checkbox.is(':checked')) {
        //     checkbox.addClass('hidden');
        //     label.removeClass('hidden');
        // } else {
        //     checkbox.removeClass('hidden');
        //     label.addClass('hidden');
        // }

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