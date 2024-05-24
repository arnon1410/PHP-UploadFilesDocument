<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highlight Table Cell</title>
    <link href="css/bootstarp/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .highlight {
            border: 3px solid !important;
            box-shadow: -5px 5px 20px 20px rgba(14, 1, 1, 0.17), -15px -11px 20px 5px rgba(14, 14, 14, 0.22) !important;
            border-style: dashed !important;
        }
        .VH {
            background-color: #f90909 !important;
            font-weight: 550 !important;
        }
        .H {
            background-color: #f99d09 !important;
            font-weight: 550 !important;
        }
        .M {
            background-color: #f9d909 !important;
            height: 60px !important;
            font-weight: 550 !important; 
        }
        .L {
            background-color: #4c7c04 !important;
            font-weight: 550 !important;
        }
        #rMatrix {
            vertical-align: middle !important;
            text-align: center !important;
            font-weight: 550 !important;
        }
    </style>
</head>
<body>

<div class="container">
    <table class="table table-bordered table-responsive" id="rMatrix">
        <thead>
            <tr id="headerRow">
                <th id="headerCell"></th>
                <th id="headerColspan"></th>
            </tr>
        </thead>
        <tbody>
            <tr id="row5">
                <td id="rHeader" rowspan="5" style="text-align:center">LIKELIHOOD OF EVENT HAPPENING</td>
                <!-- <td id="col5" style="min-width:50px">5</td> -->
                <td id="col4" class="M">5</td>
                <td id="col3" class="H">10</td>
                <td id="col2" class="H">15</td>
                <td id="col1" class="VH">20</td>
                <td id="col0" class="VH">25</td>
            </tr>
            <tr id="row4">
                <!-- <td id="col5_1">4</td> -->
                <td id="col4_2" class="M">4</td>
                <td id="col3_3" class="M">8</td>
                <td id="col2_4" class="H">12</td>
                <td id="col1_5" class="VH">16</td>
                <td id="col0_6" class="VH">20</td>
            </tr>
            <tr id="row3">
                <!-- <td id="col5_7">3</td> -->
                <td id="col4_8" class="L">3</td>
                <td id="col3_9" class="M">6</td>
                <td id="col2_10" class="M">9</td>
                <td id="col1_11" class="H">12</td>
                <td id="col0_12" class="H">15</td>
            </tr>
            <tr id="row2">
                <!-- <td id="col5_13">2</td> -->
                <td id="col4_14" class="L">2</td>
                <td id="col3_15" class="L">4</td>
                <td id="col2_16" class="M">6</td>
                <td id="col1_17" class="M">8</td>
                <td id="col0_18" class="H">10</td>
            </tr>
            <tr id="row1">
                <!-- <td id="col5_19">1</td> -->
                <td id="col4_20" class="L">1</td>
                <td id="col3_21" class="L">2</td>
                <td id="col2_22" class="L">3</td>
                <td id="col1_23" class="M">4</td>
                <td id="col0_24" class="M">5</td>
            </tr>
            <tr id="footerRow">
                <td id="footerCell"></td>
                <td id="footer"></td>
            </tr>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function(){
        var rowIndex = 1; // Example index, change as needed
        var columnIndex = 1; // Example index, change as needed
        try {
            if(rowIndex !== undefined && columnIndex !== undefined) {
                // var cell = $('#row' + rowIndex + ' #col' + columnIndex);
                var cell = $('#col0');
                console.log(cell)
                $(cell).addClass('highlight');
            }
        } catch(ex) {
            console.error(ex);
        }
    });
</script>

</body>
</html>
