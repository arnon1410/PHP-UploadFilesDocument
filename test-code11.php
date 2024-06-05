<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <style>
        .form-group canvas {
            border: none;
            border-bottom: 1px solid #000;
        }
        .error {
            color: red;
            font-size: 0.9em;
            display: none;
        }
        .canvas-container {
            border: 1px solid #ccc;
            position: relative;
        }
        .clear-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #f8f8f8;
            border: 1px solid #ccc;
            padding: 5px;
            cursor: pointer;
        }
        img{
            width: 100px;
            height: 30px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">Open Form</button>
        <div id="resultContainer" class="mt-3"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="evaluator">ผู้ประเมิน (เซ็นชื่อ)</label>
                        <div class="canvas-container">
                            <canvas id="signatureCanvas" width="500" height="200"></canvas>
                            <button class="clear-button" id="clearButton">Clear</button>
                        </div>
                        <div id="evaluatorError" class="error">กรุณาเซ็นชื่อ</div>
                    </div>
                    <div class="form-group">
                        <label for="evaluatorText">ผู้ประเมิน (ข้อความ)</label>
                        <input type="text" id="evaluatorText" class="form-control" placeholder="กรอกชื่อผู้ประเมิน">
                        <div id="evaluatorTextError" class="error">กรุณาใส่ชื่อผู้ประเมิน</div>
                    </div>
                    <div class="form-group">
                        <label for="position">ตำแหน่ง</label>
                        <input type="text" id="position" class="form-control" placeholder="กรอกตำแหน่ง">
                        <div id="positionError" class="error">กรุณาใส่ตำแหน่ง</div>
                    </div>
                    <div class="form-group">
                        <label for="date">วันที่</label>
                        <input type="text" id="date" class="form-control datepicker" placeholder="กรอกวันที่">
                        <div id="dateError" class="error">กรุณาใส่วันที่</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submitButton" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js"></script>
    <script>
        // Initialize datepicker
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'dd MM yyyy',
                language: 'th',
                autoclose: true,
                todayHighlight: true
            });
        });

        // Signature Pad Script
        const canvas = document.getElementById('signatureCanvas');
        const ctx = canvas.getContext('2d');
        let drawing = false;

        canvas.addEventListener('mousedown', (e) => {
            drawing = true;
            ctx.beginPath();
            ctx.moveTo(e.offsetX, e.offsetY);
        });

        canvas.addEventListener('mousemove', (e) => {
            if (drawing) {
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.stroke();
            }
        });

        canvas.addEventListener('mouseup', () => {
            drawing = false;
        });

        canvas.addEventListener('mouseout', () => {
            drawing = false;
        });

        document.getElementById('clearButton').addEventListener('click', () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });

        document.getElementById('submitButton').addEventListener('click', function() {
            let isValid = true;

            // Validate signature
            const canvasData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            const hasSignature = canvasData.data.some(channel => channel !== 0);
            if (!hasSignature) {
                document.getElementById('evaluatorError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('evaluatorError').style.display = 'none';
            }

            // Validate evaluator text
            const evaluatorText = document.getElementById('evaluatorText').value;
            if (!evaluatorText) {
                document.getElementById('evaluatorTextError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('evaluatorTextError').style.display = 'none';
            }

            // Validate position
            const position = document.getElementById('position').value;
            if (!position) {
                document.getElementById('positionError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('positionError').style.display = 'none';
            }

            // Validate date
            const date = document.getElementById('date').value;
            if (!date) {
                document.getElementById('dateError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('dateError').style.display = 'none';
            }

            if (isValid) {
                const resultContainer = document.getElementById('resultContainer');

                const evaluatorDataURL = canvas.toDataURL();

                const positionText = position ? position : '................................................';
                const dateText = date ? fnConvertToThaiNumerals(date) : '..........';

                const strHTML = `
                    <div>ผู้ประเมิน: ${evaluatorText} <br>ลายเซ็น: <img src="${evaluatorDataURL}" alt="ลายเซ็น" /></div>
                    <div>ตำแหน่ง: ${positionText}</div>
                    <div>วันที่: ${dateText}</div>
                `;

                resultContainer.innerHTML = strHTML;
                const modal = bootstrap.Modal.getInstance(document.getElementById('formModal'));
                modal.hide();
            }
        });

        function fnConvertToThaiNumerals(number) {
        const thaiNumerals = ['๐', '๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙'];
        return number.toString().split('').map(digit => thaiNumerals[digit]).join('');
}
    </script>
</body>
</html>
