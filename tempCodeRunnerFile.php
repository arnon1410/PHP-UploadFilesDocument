<?php
<!DOCTYPE html>
<html>
<head>
    <title>ตาราง 3 แถว 3 คอลัมน์ พร้อมช่องทำเครื่องหมายและปุ่มเช็ค (jQuery)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // ทำให้ input ในแต่ละแถวสามารถเลือกได้เฉพาะ input เดียว
            $('input[type="checkbox"]').click(function() {
                var checkboxes = $(this).closest('tr').find('input[type="checkbox"]');
                checkboxes.not(this).prop('checked', false);


            $('tr:nth-child(5) input[type="checkbox"], tr:nth-child(6) input[type="checkbox"]').change(function() {
                var checkboxes = $(this).closest('tr').find('input[type="checkbox"]:checked');
                if (checkboxes.length > 1) {
                    $(this).prop('checked', false);
                    alert('กรุณาเลือก checkbox เพียงอันเดียวในแถวที่ 4 และ 5');
                }
            });
                // ซ่อน/แสดงข้อความตามการเลือก input ในแถวที่ 4 และ 5
                if ($(this).closest('tr').is(':nth-child(5)')) {
                    $('tr:nth-child(5) td').not(':first-child').toggle(!$(this).is(':checked'));
                } else if ($(this).closest('tr').is(':nth-child(6)')) {
                    $('tr:nth-child(6) td').not(':first-child').toggle(!$(this).is(':checked'));
                }
            });

            $('#checkButton').click(function() {
                var rows = $('table tr').slice(1); // ไม่นับแถวหัวข้อ
                var uncheckedRows = [];

                // ตรวจสอบแถวที่ 1-3 ต้องมี input เลือกอย่างน้อยหนึ่ง
                rows.each(function(index) {
                    if (index < 3) { // แถวที่ 1-3
                        var checkboxes = $(this).find('input[type="checkbox"]');
                        var isChecked = false;
                        checkboxes.each(function() {
                            if ($(this).prop('checked')) {
                                isChecked = true;
                                return false; // ออกจาก loop
                            }
                        });
                        if (!isChecked) {
                            uncheckedRows.push(index + 1); // เก็บหมายเลขแถวที่ไม่ได้เช็ค
                        }
                    }
                });

                // ตรวจสอบว่าแถวที่ 4-5 ต้องมี input เลือกเพียงอันเดียวในสองแถวนี้
                var checkedInFourthAndFifthRows = $('tr:nth-child(5) input[type="checkbox"]:checked, tr:nth-child(6) input[type="checkbox"]:checked').length;
                if (checkedInFourthAndFifthRows !== 1) {
                    alert('กรุณาเลือก checkbox เพียงอันเดียวในแถวที่ 4 และ 5');
                    return;
                }

                if (uncheckedRows.length > 0) {
                    alert('กรุณาเลือก checkbox ในแถวที่: ' + uncheckedRows.join(', '));
                } else {
                    $('input[type="checkbox"]:checked').each(function() {
                        $(this).hide(); // ซ่อน input ที่ถูกกด
                        $(this).siblings('label').show(); // แสดง label ในช่องนั้น
                    });
                }
            });
        });
    </script>
    <style>
        .hidden {
            display: none;
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
                <label for="lablecheck3" class="hidden">3</label>
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
        <tr>
            <td>
                <input type="checkbox" name="check10" value="10">
            </td>
            <td>ข้อความ 1</td>
            <td>ข้อความ 2</td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="check11" value="11">
            </td>
            <td>ข้อความ 3</td>
            <td>ข้อความ 4</td>
        </tr>
    </table>
    
    <button id="checkButton">เช็คสถานะ</button>
</body>
</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Radio Buttons with Symbols</title>
<style>
    /* Hide the default radio button */
.custom-radio input[type="radio"] {
    display: none;
}

/* Create a custom radio button with a heart symbol */
.custom-radio .custom-radio-checkmark {
    position: relative;
    display: inline-block;
    font-size: 20px; /* Adjust the size of the symbol */
    color: #ccc;
    margin-right: 10px;
    vertical-align: middle;
}

/* Show the custom radio button as checked when the input is checked */
.custom-radio input[type="radio"]:checked + .custom-radio-checkmark {
    color: black; /* Change color when checked */
}

/* Optional: Add some styling for the label text */
.custom-radio {
    cursor: pointer;
    user-select: none;
}

</style>
</head>
<body>
    <form>
        <label class="custom-radio">
            <input type="radio" name="option" value="1">
            <span class="custom-radio-checkmark">&#9745;</span> <!-- Heart symbol -->
            Option 1
        </label>
        <label class="custom-radio">
            <input type="radio" name="option" value="2">
            <span class="custom-radio-checkmark">&#9745;</span> <!-- Heart symbol -->
            Option 2
        </label>
    </form>
</body>
</html> -->