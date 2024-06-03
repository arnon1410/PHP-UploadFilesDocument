<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>
<body>
    
</body>
<script>
const data = [
    {
        id: '101',
        id_sides: '3',
        headRisk: 'เครื่องมือและอุปกรณ์ที่ใช้งานด้านการข่าว',
        detail: 'x1'
    },
    {
        id: '102',
        id_sides: '6',
        headRisk: 'การปฏิบัติงานด้านการข่าว',
        detail: 'x2'
    },
    {
        id: '103',
        id_sides: '8',
        headRisk: 'การประเมินความเสี่ยงด้านการข่าว',
        detail: 'x3'
    },
    {
        id: '104',
        id_sides: '8',
        headRisk: 'ความเสี่ยงด้านการข่าว2',
        detail: 'x4'
    }
];

const sides = [
    'ด้านA', 
    'ด้านB', 
    'ด้านC', 
    'ด้านD', 
    'ด้านE', 
    'ด้านF', 
    'ด้านG', 
    'ด้านH', 
    'ด้านI', 
    'ด้านJ'
];

let tableHTML = '<table border="1"><thead><tr><th>Side & HeadRisk</th><th>Detail</th></tr></thead><tbody>';

sides.forEach((side, index) => {
    const id_sides = (index + 1).toString();
    const foundRisks = data.filter(risk => risk.id_sides === id_sides);

    if (foundRisks.length > 0) {
        let headRisks = [];
        let details = [];

        foundRisks.forEach(risk => {
            headRisks.push(risk.headRisk);
            details.push(risk.detail);
        });

        let headRiskCells = headRisks.map((hr, idx) => {
            return `- ${hr}`;
        }).join('<br>');

        let detailCells = details.map((dt, idx) => {
            return `- ${dt}`;
        }).join('<br>');

        tableHTML += `<tr><td>${id_sides}<br>${headRiskCells}</td><td>${detailCells}</td></tr>`;
    } else {
        tableHTML += `<tr><td>${id_sides}: ไม่มีข้อมูลในอาร์เรย์</td><td>-</td></tr>`;
    }
});

tableHTML += '</tbody></table>';

// ใส่ tableHTML ลงใน HTML
document.body.innerHTML = tableHTML;

</script>
</html>