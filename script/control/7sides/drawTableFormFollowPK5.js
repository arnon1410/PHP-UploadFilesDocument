function fnSetHeader(dataHeader){
    var strHTML = ''
    strHTML += "<th class='text-center textHeadTable'>ภารกิจตามกฎหมายที่จัดตั้งหน่วยงานของรัฐหรือภารกิจตามแผนการหรือภารกิจอื่น ๆ ที่สำคัญของหน่วยงานของรัฐ/วัตถุประสงค์</th>"
    strHTML += "<th class='text-center textHeadTable'>ความเสี่ยงที่ยังมีอยู่</th>"
    strHTML += "<th class='text-center textHeadTable'>การปรับปรุงการควบคุมภายใน</th>"
    strHTML += "<th class='text-center textHeadTable'>หน่วยงานที่รับผิดชอบ</th>"
    strHTML += "<th class='text-center textHeadTable'>สถานการณ์ดำเนินการ % ความคืบหน้า</th>"
    strHTML += "<th class='text-center textHeadTable'>ปัญหาอุปสรรคและแนวทางแก้ไข</th>"
    return strHTML
}

function fnDrawTableForm(access,objData,engName) {
    if (access == 'admin') {
        // fnGetDataSelect()
    }
     // Get data selete before create table 
    var strHTML = ''
    var data = objData
    var NameUnit = 'จร.ทร.'
    var currentYear = new Date().getFullYear();
    var currentThaiYear = currentYear + 543;
    // var DateFix = 'ณ วันที่ ๓๐ เดือน กันยายน ' + fnConvertToThaiNumeralsAndPoint(currentThaiYear)
    strHTML += " <div class='text-end'>แบบติดตาม ปค.๕</div> "
    strHTML += " <div class='title'>หน่วยงาน......." + NameUnit +  ".......</div> "
    strHTML += " <div class='title'>รายงานการติดตามการประเมินการควบคุมภายใน</div> "
    strHTML += " <div class='title'>ตั้งแต่วันที่.......เดือน..............พ.ศ.............. ถึง วันที่.......เดือน..............พ.ศ..............</div> "
    strHTML += " <div class='a4-size'> "
    strHTML += "<table id='tb_" + objData[0].enControl + "'>"
    strHTML += "<thead>"
    strHTML += "<tr class='colspan-header'>"
    strHTML += fnSetHeader(data) 
    strHTML += "</tr>"
    strHTML += "</thead>"
    strHTML += "<tbody>"
    strHTML += fnDrawTableFollowPK5(data)
    strHTML += "</tbody>"
    strHTML += "</table>"

    strHTML += " <div class='dvSignature'> "
    strHTML += " <div>ชื่อผู้รายงาน...................................................................</div> "
    strHTML += " <div>ตำแหน่ง.........................................................................</div> "
    strHTML += " <div>วันที่...............................................................................</div> "
    
    strHTML += "<button id='btnEditSignature' type='button' class='btn btn-warning'; onclick='fnEditSignature()' style='display:none;margin: 5px 5px 0px 0px;'>"
    strHTML += "<i class='las la-pen mr-1' aria-hidden=;'true' style='margin-right:5px'></i><span>กรอกข้อมูลผู้รายงาน<span>"
    strHTML += "</button>"

    strHTML += " </div> "

    strHTML += " <div class='dvFooterForm'> "
    strHTML += "    <button type='button' class='btn btn-primary' id='btnSaveData' onclick='fnSaveDraftDocument()'>บันทึกฉบับร่าง</button>"
    strHTML += "    <button type='button' class='btn btn-success' id='btnExportPDF' onclick='fnExportDocument()'>Export PDF</button>"
    strHTML += " </div> "

    $("#dvFormAssessment")[0].innerHTML = strHTML
}

function fnDrawTableFollowPK5(objData) { /* ด้านการข่าว */
    var strHTML = "";
    var data = objData // ยังไม่ได้ใช้
    strHTML += "<tr>";

    strHTML += fnDrawCellTable('Misstion', data.oldMisstion, data.oldStillRisk, 'commentMisstion',30,33);
    strHTML += fnDrawCellTable('StillRisk', data.oldStillRisk, data.oldStillRisk, 'commentStillRisk',14,13);
    strHTML += fnDrawCellTable('ImproveControl', data.oldImproveControl, data.oldImproveControl, 'commentImproveControl',14,13);
    strHTML += fnDrawCellTable('ResponeAgency', data.oldResponeAgency, data.oldResponeAgency, 'commentResponeAgency',14,13);
    strHTML += fnDrawCellTable('Progress', data.oldProgress, data.oldProgress, 'commentProgress',14,13);
    strHTML += fnDrawCellTable('Problem', data.oldProblem, data.oldProblem, 'commentProblem',14,13);

    strHTML += "</tr>";
    return strHTML;
}


function fnDrawCellTable(id, condition, text, commentId, sizeTD,sizeTextarea) {
    let cellHTML = `<td id='${id}' class='text-left align-top' style='width: ${sizeTD}%;'>`;

    if (condition) {
        cellHTML += `<span class='text-left' id='displayText${id}'>${text}</span>`;
    } else {
        cellHTML += `
            <div>
                <textarea id='${commentId}' name='${commentId}' rows='4' cols='${sizeTextarea}'></textarea>
            </div>
            <div class='text-end'>
                <button class='btn btn-secondary' type='submit' id='submitButton${id}' onclick='fnSubmitText("${id}")'>ยืนยัน</button>
            </div>
            <div class='text-start'>
                <span id='displayText${id}' style='white-space: pre-wrap;'></span>
                <i class='las la-pencil-alt' id='editIcon${id}' style='display:none; cursor:pointer; margin-left: 10px;' onclick='fnEditText("${id}")'></i>
            </div>
        `;
    }

    cellHTML += "</td>";
    return cellHTML;
}

/* ฟังก์ชันสำหรับการยืนยันข้อความ */
function fnSubmitText(id) {
    var textarea = document.getElementById('comment' +id);
    var button = document.getElementById('submitButton' + id);
    var displayText = document.getElementById('displayText' + id);
    var editIcon = document.getElementById('editIcon' + id);
    var tab = '&emsp;'
    var format = ''

    if (textarea.value) {
        format = textarea.value.replace(/\n/g, '<br>');
        displayText.innerHTML = tab + format

        /* ซ่อน textarea และปุ่ม */
        textarea.style.display = 'none';
        button.style.display = 'none';
        editIcon.style.display = 'inline';
    } else {
        Swal.fire({
            title: "",
            text: "กรุณากรอกข้อมูลให้ครบถ้วน",
            icon: "warning"
        });
    }
}

/* ฟังก์ชันสำหรับการแก้ไขข้อความ */
function fnEditText(id) {
    const textarea = document.getElementById('comment' + id);
    const button = document.getElementById('submitButton' + id);
    const editIcon = document.getElementById('editIcon' + id);

    /* แสดง textarea และปุ่ม */
    textarea.style.display = 'inline';
    button.style.display = 'inline';

    /* ซ่อนไอคอนแก้ไข */
    editIcon.style.display = 'none';

    /* เติมข้อความที่จะแก้ไขใน textarea */
    textarea.value = document.getElementById('displayText' + id).innerText.trim();
}

function fnSaveDraftDocument() {
    Swal.fire({
        title: "",
        text: "คุณต้องการบันทึกฉบับร่างใช่หรือไม่?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "บันทึกข้อมูล",
        cancelButtonText: "ยกเลิก"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "",
            text: "บันทึกข้อมูลสำเร็จ",
            icon: "success"
          });
        }
      });
}

function fnExportDocument() {
    Swal.fire({
        title: "",
        text: "คุณต้องการ Export เอกสารใช่หรือไม่?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "บันทึกข้อมูล",
        cancelButtonText: "ยกเลิก"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "",
            text: "บันทึกข้อมูลสำเร็จ",
            icon: "success"
          });
        }
      });
}

