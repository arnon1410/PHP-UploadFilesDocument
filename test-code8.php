<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Example</title>
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
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>id_sides & HeadRisk</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <!-- ข้อมูลจะถูกแทรกที่นี่ -->
        </tbody>
    </table>

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
                headRisk: 'การประเมินความเสี่ยงด้านการข่าว',
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

        let tableHTML = '';

        sides.forEach((side, index) => {
            const id_sides = (index + 1).toString();
            const foundRisks = data.filter(risk => risk.id_sides === id_sides);

            if (foundRisks.length > 0) {
                let headRiskSet = new Set();
                let detailLines = '';

                foundRisks.forEach(risk => {
                    headRiskSet.add(risk.headRisk);
                    detailLines += `- ${risk.detail}<br>`;
                });

                const headRisks = Array.from(headRiskSet).join(', ');

                tableHTML += '<tr>';
                tableHTML += `<td>${side} ${id_sides}<br>- ${headRisks}</td>`;
                tableHTML += `<td>${detailLines}</td>`;
                tableHTML += '</tr>';
            }
        });

        document.querySelector('tbody').innerHTML = tableHTML;
    </script>
</body>
</html>
