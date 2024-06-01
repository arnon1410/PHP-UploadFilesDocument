<!DOCTYPE html>
<html>
<head>
    <title>Risk Level Calculator</title>
</head>
<body>
    <label for="input1">Input 1:</label>
    <input type="number" id="input1" min="1" max="5">
    <label for="input2">Input 2:</label>
    <input type="number" id="input2" min="1" max="5">
    <button onclick="calculateRisk()">Calculate Risk Level</button>

    <p id="result"></p>

    <script>
        const riskMatrix = [
            ['ต่ำ', 'ต่ำ', 'ต่ำ', 'ปานกลาง', 'ปานกลาง'],
            ['ต่ำ', 'ต่ำ', 'ปานกลาง', 'ปานกลาง', 'สูง'],
            ['ต่ำ', 'ปานกลาง', 'ปานกลาง', 'สูง', 'สูง'],
            ['ปานกลาง', 'ปานกลาง', 'สูง', 'สูงมาก', 'สูงมาก'],
            ['ปานกลาง', 'สูง', 'สูง', 'สูงมาก', 'สูงมาก']
        ];

        function calculateRisk() {
            const input1 = parseInt(document.getElementById('input1').value);
            const input2 = parseInt(document.getElementById('input2').value);

            if (isNaN(input1) || isNaN(input2) || input1 < 1 || input1 > 5 || input2 < 1 || input2 > 5) {
                document.getElementById('result').innerText = 'กรุณาใส่ค่าที่อยู่ระหว่าง 1 ถึง 5 สำหรับ Input ทั้งสอง';
                return;
            }

            const riskLevel = riskMatrix[input2 - 1][input1 - 1];
            document.getElementById('result').innerText = `ระดับความเสี่ยงคือ: ${riskLevel}`;
        }
    </script>
</body>
</html>
