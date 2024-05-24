<!DOCTYPE html>
<html>
<head>
    <title>ตาราง 3 แถว 3 คอลัมน์ พร้อมช่องทำเครื่องหมายและปุ่มเช็ค (jQuery)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[type="checkbox"]').click(function(event) {
                var checkboxes = $(this).closest('tr').find('input[type="checkbox"]');
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
                    // var checkedCheckboxes = $('input[type="checkbox"]:checked');
                    // console.log(checkedCheckboxes)
                    
                    // $('input[type="checkbox"]:checked').each(function() {
                    //     var columnIndex = $(this).closest('td').index();
                    //     var rowIndex = $(this).closest('tr').index();
                    //     //console.log('Checkbox ที่ถูกติ้กอยู่ที่แถวที่ ' + (rowIndex + 1) + ', คอลัมน์ที่ ' + (columnIndex + 1));
                    // });

                    //console.log(checkedCheckboxes)
                    var uncheckedCheckboxes = $('input[type="checkbox"]:not(:checked)');
                    //alert('ทุกแถวได้รับการเลือกแล้ว');
                    //uncheckedCheckboxes.hide();
                    // console.log(uncheckedCheckboxes)
                    // var uncheckedValues = uncheckedCheckboxes.map(function() {
                    //     console.log($(this).val())
                    //     //return $(this).val();
                    // }).get();
                    // alert('ทุกแถวได้รับการเลือกแล้ว');
                }
            });
        });
    </script>
    <style>
        .hidden  {
            display:none;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>หัวข้อที่ 1</th>
            <th>หัวข้อที่ 2</th>
            <th>หัวข้อที่ 3</th>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="check1" value="1">
                <label for="lablecheck1" class="hidden">1</label>
            </td>
            <td>
                <input type="checkbox" name="check2" value="2">
                <label for="lablecheck2" class="hidden">2</label>
            </td>
            <td>
            <input type="checkbox" name="check3" value="3">
                <label for="lablecheck3" class="hidden"> 3</label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="check4" value="4">
                <label for="lablecheck4" class="hidden">4</label>
            </td>
            <td>
                <input type="checkbox" name="check5" value="5">
                <label for="lablecheck5" class="hidden">5</label>
            </td>
            <td>
            <input type="checkbox" name="check6" value="6">
                <label for="lablecheck6" class="hidden">6</label>
            </td>
        </tr>
        <tr>
        <td>
                <input type="checkbox" name="check7" value="7">
                <label for="lablecheck7" class="hidden">7</label>
            </td>
            <td>
                <input type="checkbox" name="check8" value="8">
                <label for="lablecheck8" class="hidden">8</label>
            </td>
            <td>
            <input type="checkbox" name="check9" value="9">
                <label for="lablecheck9" class="hidden">9</label>
            </td>
        </tr>
    </table>
    
    <button id="checkButton">เช็คสถานะ</button>
</body>
</html>
