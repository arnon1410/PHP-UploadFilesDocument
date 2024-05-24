<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divided A4 Page</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            height: 100%;
        }
        .table-section {
            flex: 1;
            padding: 20px;
        }
        .card-section {
            flex: 0 0 30%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border-left: 1px solid black;
        }
        .table {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            margin-bottom: 20px; /* Add space between tables */
        }
        .header, .cell {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .header {
            font-weight: bold;
            background-color: #f2f2f2;
        }
        .card {
            width: 200px;
            height: 300px;
            border: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px; /* Add space between cards */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-section">
            <div id="horizontalTable1" class="table">
                <div class="header">First Name</div>
                <div class="header">Last Name</div>
                <div class="header">Age</div>
                <div class="header">City</div>
                <!-- Data for first table will be inserted here by JavaScript -->
            </div>
            <div id="horizontalTable2" class="table">
                <div class="header">Product</div>
                <div class="header">Category</div>
                <div class="header">Price</div>
                <div class="header">Stock</div>
                <!-- Data for second table will be inserted here by JavaScript -->
            </div>
        </div>
        <div class="card-section">
            <div class="card">Card 1</div>
            <div class="card">Card 2</div>
            <div class="card">Card 3</div>
        </div>
    </div>

    <script>
        const data1 = [
            ["John", "Doe", "30", "New York"],
            ["Jane", "Smith", "25", "Los Angeles"],
            ["Jack", "Johnson", "40", "Chicago"]
        ];

        const data2 = [
            ["Laptop", "Electronics", "$999", "50"],
            ["Chair", "Furniture", "$49", "200"],
            ["Book", "Literature", "$15", "100"]
        ];

        const tableDiv1 = document.getElementById('horizontalTable1');
        const tableDiv2 = document.getElementById('horizontalTable2');

        // Function to populate a table
        function populateTable(tableDiv, data) {
            data.forEach(row => {
                row.forEach(cell => {
                    const div = document.createElement('div');
                    div.className = 'cell';
                    div.textContent = cell;
                    tableDiv.appendChild(div);
                });
            });
        }

        // Populate the first table
        populateTable(tableDiv1, data1);

        // Populate the second table
        populateTable(tableDiv2, data2);
    </script>
</body>
</html>
