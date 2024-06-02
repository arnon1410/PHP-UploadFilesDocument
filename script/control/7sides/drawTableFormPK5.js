function fnSetHeader(dataHeader){
    var strHTML = ''
    strHTML += "<th class='text-center textHeadTable'>ภารกิจตามกฎหมายที่จัดตั้งหน่วยงานของรัฐหรือภารกิจตามแผนการหรือภารกิจอื่น ๆ ที่สำคัญของหน่วยงานของรัฐ/วัตถุประสงค์</th>"
    strHTML += "<th class='text-center textHeadTable'>ความเสี่ยง</th>"
    strHTML += "<th class='text-center textHeadTable'>การควบคุมภายในที่มีอยู่</th>"
    strHTML += "<th class='text-center textHeadTable'>การประเมินผลการควบคุมภายใน</th>"
    strHTML += "<th class='text-center textHeadTable'>ความเสี่ยงที่ยังมีอยู่</th>"
    strHTML += "<th class='text-center textHeadTable'>การปรับปรุงการควบคุมภายใน</th>"
    strHTML += "<th class='text-center textHeadTable'>หน่วยงานที่รับผิดชอบ</th>"
    return strHTML
}

function fnDrawTableForm(access,objData,engName) {
    if (access == 'admin') {
        // fnGetDataSelect()
    }
     // Get data selete before create table 
    var strHTML = ''
    var data = objData
    var NameUnit = 'สตน.ทร.'
    var currentYear = new Date().getFullYear();
    var currentThaiYear = currentYear + 543;
    var DateFix = 'ณ วันที่ ๓๐ เดือน กันยายน ' + fnConvertToThaiNumerals(currentThaiYear)
    strHTML += " <div class='text-end'>แบบ ปค.๕</div> "
    strHTML += " <div class='title'>หน่วยงาน......." + NameUnit +  ".......</div> "
    strHTML += " <div class='title'>รายงานการประเมินผลการควบคุมภายใน</div> "
    strHTML += " <div class='title'>สำหรับระยะเวลาดำเนินงานสิ้นสุด " + DateFix + " </div> "
    strHTML += " <div class='a4-size'> "
    strHTML += "<table id='tb_" + objData[0].enControl + "'>"
    strHTML += "<thead>"
    strHTML += "<tr class='colspan-header'>"
    strHTML += fnSetHeader(data) 
    strHTML += "</tr>"
    strHTML += "</thead>"
    strHTML += "<tbody>"
    strHTML += fnDrawTablePerformance(data)
    strHTML += "</tbody>"
    strHTML += "</table>"

    strHTML += " <div class='dvSignature'> "
    strHTML += " <div>ชื่อผู้รายงาน...................................................................</div> "
    strHTML += " <div>ตำแหน่ง.........................................................................</div> "
    strHTML += " <div>วันที่...............................................................................</div> "
    
    strHTML += " </div> "

    strHTML += " <div class='dvFooterForm'> "
    strHTML += "    <button type='button' class='btn btn-primary' id='btnSaveData' onclick='fnSaveDraftDocument()'>บันทึกฉบับร่าง</button>"
    strHTML += "    <button type='button' class='btn btn-success' id='btnExportPDF' onclick='fnExportDocument()'>Export PDF</button>"
    strHTML += " </div> "

    $("#dvFormAssessment")[0].innerHTML = strHTML
}

function fnDrawTablePerformance(objData) { /* ด้านการข่าว */
    var strHTML = "";
    var team = "test"
    var data = objData
    // ด้านภารกิจหลัก
    strHTML += "<tr>"
    strHTML += "<td id='main1'  class='text-left align-middle' style='width: 30%;white-space: pre-wrap;'>ด้านภารกิจหลัก</td>"
    strHTML += "<td></td><td></td><td></td><td></td><td></td><td></td>"
    strHTML += "</tr>"
    // วัตถุประสงค์
    strHTML += "<tr>"
    strHTML += "<td id='mainObjective1'  class='text-left align-middle' style='width: 30%;'>"
    strHTML += "<div style='text-align: center;'>"
    strHTML += "    <textarea id='textMainObjective1' name='textMainObjective1' rows='4' cols='30'></textarea> "
    strHTML += "</div> "
    strHTML += "<div class='text-end'>"
    strHTML += "    <button class='btn btn-secondary' type='submit' id='submitButton1' onclick='fnSubmitText()'>ยืนยัน</button>"
    strHTML += "</div>"
    strHTML += "<div class='text-start'>"
    strHTML += "    <span style='white-space: pre-wrap;' id='displayText1'></span>"
    strHTML += "</div>"
    strHTML += " </td>"
    strHTML += "<td></td><td></td><td></td><td></td><td></td><td></td>"
    strHTML += "</tr>"

    // ด้านภารกิจหลัก
    strHTML += "<tr>"
    strHTML += "<td id='policy1'  class='text-left align-middle' style='width: 30%;white-space: pre-wrap;'>ด้านนโยบายสำคัญ</td>"
    strHTML += "<td></td><td></td><td></td><td></td><td></td><td></td>"
    strHTML += "</tr>"
    // วัตถุประสงค์
    strHTML += "<tr>"
    strHTML += "<td id='importantPolicy1'  class='text-left align-middle' style='width: 30%;'>"
    strHTML += "<div style='text-align: center;'>"
    strHTML += "    <textarea id='textImportantPolicy1' name='textMainObjective1'  rows='4' cols='30'></textarea> "
    strHTML += "</div> "
    strHTML += "<div class='text-end'>"
    strHTML += "    <button class='btn btn-secondary' type='submit' id='submitButton2' onclick='fnSubmitText()'>ยืนยัน</button>"
    strHTML += "</div>"
    strHTML += "<div class='text-start'>"
    strHTML += "    <span style='white-space: pre-wrap;' id='displayText2'></span>"
    strHTML += "</div>"
    strHTML += " </td>"
    strHTML += "<td></td><td></td><td></td><td></td><td></td><td></td>"
    strHTML += "</tr>"

    // ด้านภารกิจหลัก
    strHTML += "<tr>"
    strHTML += "<td id='policy1'  class='text-left align-middle' style='width: 30%;white-space: pre-wrap;'>ด้านภารกิจสนับสนุน</td>"
    strHTML += "<td></td><td></td><td></td><td></td><td></td><td></td>"
    strHTML += "</tr>"

     // ด้านภารกิจหลัก
    for (var i = 0; i < data.length; i++) {
        strHTML += "<tr>"
        strHTML += "<td id='headRisk" + (i + 1) + "'  class='text-left align-middle' style='width: 25%;white-space: pre-wrap;'>" + (data[i].headRisk ? (data[i].headRisk) : '-') + "</td>"
        strHTML += "<td id='objRisk" + (i + 1) + "'  class='text-left align-middle' style='width: 20%;white-space: pre-wrap;'>" + (data[i].objRisk ? (data[i].objRisk) : '-') + "</td>"
        strHTML += "<td id='headRisk" + (i + 1) + "'  class='text-left align-middle' style='width: 25%;white-space: pre-wrap;'>" + (data[i].headRisk ? (data[i].headRisk) : '-') + "</td>"
        strHTML += "<td id='objRisk" + (i + 1) + "'  class='text-left align-middle' style='width: 20%;white-space: pre-wrap;'>" + (data[i].objRisk ? (data[i].objRisk) : '-') + "</td>"
        strHTML += "<td id='headRisk" + (i + 1) + "'  class='text-left align-middle' style='width: 20%;white-space: pre-wrap;'>" + (data[i].headRisk ? (data[i].headRisk) : '-') + "</td>"
        strHTML += "<td id='objRisk" + (i + 1) + "'  class='text-left align-middle' style='width: 20%;white-space: pre-wrap;'>" + (data[i].objRisk ? (data[i].objRisk) : '-') + "</td>"
        strHTML += "<td id='improvement" + (i + 1) + "'  class='text-left align-middle' style='width: 20%;white-space: pre-wrap;'>" + (data[i].improvement ? (data[i].improvement) : '-') + "</td>"
        strHTML += "</tr>"
    }

    return strHTML;
    // แทรกโค้ดเข้าไปใน #dvTableReportAssessment
    // $("#dvTableReportAssessment")[0].innerHTML = strHTML;
}

function fnDrawChanceRiskModal() {
    var strHTML = "";
    strHTML += " <div class='modal-dialog modal-lg'> "
    strHTML += "  <div class='modal-content'> "
    strHTML += " <div class='modal-header'> "
    strHTML += " <h5 class='modal-title' id='chanceRiskModalLabel'>ตารางคำนวณความเสี่ยง</h5> "
    strHTML += " <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button> "
    strHTML += " </div> "
    strHTML += " <div class='modal-body'> "
    strHTML += " <table class='table table-bordered'> "
    strHTML += " </table> "
    strHTML += " </div> "
    strHTML += " <div class='modal-footer'> "
    strHTML += " <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button> "
    strHTML += " </div> "
    strHTML += " </div> "
    strHTML += " </div> "
    strHTML += " </div> "
    strHTML += "  "
    strHTML += "  "

    return strHTML
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

