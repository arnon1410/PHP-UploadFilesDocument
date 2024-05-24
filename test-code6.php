<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sticky Table Header</title>
<style>
    .table-container {
        max-height: 400px; /* Set a max-height for the container to enable vertical scrolling */
        overflow-y: auto;
        overflow-x: auto; /* Enable horizontal scrolling */
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #000;
        padding: 8px;
        text-align: center;
    }
    thead th, thead tr {
        position: sticky;
        background: #fff;
    }
    .textHeadTable {
        background-color: #f1f1f1;
        font-weight: bold;
    }
    .colspan-header th {
        top: 0;
        z-index: 3; /* Ensure the z-index is higher for the header row with colspan */
    }
    .second-header th {
        top: 36px; /* Adjust the top value to match the height of the first header row */
        z-index: 2;
    }
</style>
</head>
<body>

<div class="table-container">
    <table>
        <thead>
            <tr class="colspan-header">
                <th rowspan='2' class='text-center textHeadTable'>ภารกิจตามกฎหมายที่จัดตั้งหน่วยงานภาครัฐหรือภารกิจตามแผนการดำเนินการหรือภารกิจอื่น ๆ ที่สำคัญของหน่วยงานภาครัฐ</th>
                <th rowspan='2' class='text-center textHeadTable'>วัตถุประสงค์</th>
                <th rowspan='2' class='text-center textHeadTable'>ความเสี่ยงที่อาจเกิดขึ้น</th>
                <th rowspan='2' class='text-center textHeadTable'>กิจกรรมควบคุมภายในที่มีอยู่</th>
                <th colspan='3' class='text-center textHeadTable'>ความเสี่ยงที่เหลืออยู่</th>
                <th rowspan='2' class='text-center textHeadTable'>การปรับปรุงการควบคุมภายใน</th>
            </tr>
            <tr class="second-header">
                <th class='text-center textHeadTable'>โอกาส</th>
                <th class='text-center textHeadTable'>ผลกระทบ</th>
                <th class='text-center textHeadTable'>ระดับ</th>
            </tr>
        </thead>
        <tbody>
            <!-- Adding multiple rows for demonstration -->
            <tr>
                <td>ภารกิจ 1</td>
                <td>วัตถุประสงค์ 1</td>
                <td>ความเสี่ยง 1</td>
                <td>กิจกรรม 1</td>
                <td>โอกาส 1</td>
                <td>ผลกระทบ 1</td>
                <td>ระดับ 1</td>
                <td>การปรับปรุง 1</td>
            </tr>
            <tr>
                <td>ภารกิจ 2</td>
                <td>วัตถุประสงค์ 2</td>
                <td>ความเสี่ยง 2</td>
                <td>กิจกรรม 2</td>
                <td>โอกาส 2</td>
                <td>ผลกระทบ 2</td>
                <td>ระดับ 2</td>
                <td>การปรับปรุง 2</td>
            </tr>
            <!-- Repeat these rows as needed to make the table long -->
            <tr>
                <td>ภารกิจ 3</td>
                <td>วัตถุประสงค์ 3</td>
                <td>ความเสี่ยง 3</td>
                <td>กิจกรรม 3</td>
                <td>โอกาส 3</td>
                <td>ผลกระทบ 3</td>
                <td>ระดับ 3</td>
                <td>การปรับปรุง 3</td>
            </tr>
            <tr>
                <td>ภารกิจ 4</td>
                <td>วัตถุประสงค์ 4</td>
                <td>ความเสี่ยง 4</td>
                <td>กิจกรรม 4</td>
                <td>โอกาส 4</td>
                <td>ผลกระทบ 4</td>
                <td>ระดับ 4</td>
                <td>การปรับปรุง 4</td>
            </tr>
            <tr>
                <td>ภารกิจ 5</td>
                <td>วัตถุประสงค์ 5</td>
                <td>ความเสี่ยง 5</td>
                <td>กิจกรรม 5</td>
                <td>โอกาส 5</td>
                <td>ผลกระทบ 5</td>
                <td>ระดับ 5</td>
                <td>การปรับปรุง 5</td>
            </tr>
            <tr>
                <td>ภารกิจ 1</td>
                <td>วัตถุประสงค์ 1</td>
                <td>ความเสี่ยง 1</td>
                <td>กิจกรรม 1</td>
                <td>โอกาส 1</td>
                <td>ผลกระทบ 1</td>
                <td>ระดับ 1</td>
                <td>การปรับปรุง 1</td>
            </tr>
            <tr>
                <td>ภารกิจ 2</td>
                <td>วัตถุประสงค์ 2</td>
                <td>ความเสี่ยง 2</td>
                <td>กิจกรรม 2</td>
                <td>โอกาส 2</td>
                <td>ผลกระทบ 2</td>
                <td>ระดับ 2</td>
                <td>การปรับปรุง 2</td>
            </tr>
            <!-- Repeat these rows as needed to make the table long -->
            <tr>
                <td>ภารกิจ 3</td>
                <td>วัตถุประสงค์ 3</td>
                <td>ความเสี่ยง 3</td>
                <td>กิจกรรม 3</td>
                <td>โอกาส 3</td>
                <td>ผลกระทบ 3</td>
                <td>ระดับ 3</td>
                <td>การปรับปรุง 3</td>
            </tr>
            <tr>
                <td>ภารกิจ 4</td>
                <td>วัตถุประสงค์ 4</td>
                <td>ความเสี่ยง 4</td>
                <td>กิจกรรม 4</td>
                <td>โอกาส 4</td>
                <td>ผลกระทบ 4</td>
                <td>ระดับ 4</td>
                <td>การปรับปรุง 4</td>
            </tr>
            <tr>
                <td>ภารกิจ 5</td>
                <td>วัตถุประสงค์ 5</td>
                <td>ความเสี่ยง 5</td>
                <td>กิจกรรม 5</td>
                <td>โอกาส 5</td>
                <td>ผลกระทบ 5</td>
                <td>ระดับ 5</td>
                <td>การปรับปรุง 5</td>
            </tr>
            <tr>
                <td>ภารกิจ 1</td>
                <td>วัตถุประสงค์ 1</td>
                <td>ความเสี่ยง 1</td>
                <td>กิจกรรม 1</td>
                <td>โอกาส 1</td>
                <td>ผลกระทบ 1</td>
                <td>ระดับ 1</td>
                <td>การปรับปรุง 1</td>
            </tr>
            <tr>
                <td>ภารกิจ 2</td>
                <td>วัตถุประสงค์ 2</td>
                <td>ความเสี่ยง 2</td>
                <td>กิจกรรม 2</td>
                <td>โอกาส 2</td>
                <td>ผลกระทบ 2</td>
                <td>ระดับ 2</td>
                <td>การปรับปรุง 2</td>
            </tr>
            <!-- Repeat these rows as needed to make the table long -->
            <tr>
                <td>ภารกิจ 3</td>
                <td>วัตถุประสงค์ 3</td>
                <td>ความเสี่ยง 3</td>
                <td>กิจกรรม 3</td>
                <td>โอกาส 3</td>
                <td>ผลกระทบ 3</td>
                <td>ระดับ 3</td>
                <td>การปรับปรุง 3</td>
            </tr>
            <tr>
                <td>ภารกิจ 4</td>
                <td>วัตถุประสงค์ 4</td>
                <td>ความเสี่ยง 4</td>
                <td>กิจกรรม 4</td>
                <td>โอกาส 4</td>
                <td>ผลกระทบ 4</td>
                <td>ระดับ 4</td>
                <td>การปรับปรุง 4</td>
            </tr>
            <tr>
                <td>ภารกิจ 5</td>
                <td>วัตถุประสงค์ 5</td>
                <td>ความเสี่ยง 5</td>
                <td>กิจกรรม 5</td>
                <td>โอกาส 5</td>
                <td>ผลกระทบ 5</td>
                <td>ระดับ 5</td>
                <td>การปรับปรุง 5</td>
            </tr>
            <!-- Add more rows as necessary to create vertical scrolling -->
        </tbody>
    </table>
</div>

</body>
</html>
