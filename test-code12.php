<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sticky Table Header and Content</title>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.container {
    max-height: 400px;
    overflow-y: auto;
}

table {
    border-collapse: collapse;
    width: 100%;
}

thead th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    background-color: #f2f2f2;
    position: sticky;
    top: 0;
    z-index: 2;
    background-clip: padding-box; /* ให้พื้นหลังเฉพาะในส่วนของ padding */
    background-origin: content-box; /* ให้พื้นหลังเริ่มต้นที่ content ของ th */
}

tbody th, tbody td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tbody th {
    position: sticky;
    top: 0;
    background-color: #f2f2f2;
    z-index: 1;
    background-clip: padding-box; /* ให้พื้นหลังเฉพาะในส่วนของ padding */
    background-origin: content-box; /* ให้พื้นหลังเริ่มต้นที่ content ของ th */
}

tbody td {
    white-space: pre-wrap;
}
</style>
</head>
<body>

<div class="container">
    <table id="myTable">
        <thead>
            <tr>
                <th rowspan="2">Header 1</th>
                <th colspan="2">Header 2</th>
            </tr>
            <tr>
                <th>Subheader 2.1</th>
                <th>Subheader 2.2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <tr>
                <td rowspan="2">Data 1.1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>Praesent sagittis ligula eget neque pellentesque.</td>
            </tr>
            <tr>
                <td>Vivamus lacinia odio vitae vestibulum vestibulum.</td>
                <td>Cras venenatis euismod malesuada.</td>
            </tr>
            <!-- เพิ่มข้อมูลเพิ่มเติมในตาราง -->
        </tbody>
    </table>
</div>

</body>
</html>
