function fnSetHeader(dataHeader){
    var strHTML = ''
    strHTML += "<th rowspan='2' class='text-center textHeadTable'>ภารกิจตามกฎหมายที่จัดตั้งหน่วยงานภาครัฐหรือภารกิจตามแผนการดำเนินการหรือภารกิจอื่น ๆ ที่สำคัญของหน่วยงานภาครัฐ</th>"
    strHTML += "<th rowspan='2' class='text-center textHeadTable'>วัตถุประสงค์</th>"
    strHTML += "<th rowspan='2' class='text-center textHeadTable'>ความเสี่ยงที่อาจเกิดขึ้น</th>"
    strHTML += "<th rowspan='2' class='text-center textHeadTable'>กิจกรรมควบคุมภายในที่มีอยู่</th>"
    strHTML += "<th colspan='3' class='text-center textHeadTable'>ความเสี่ยงที่เหลืออยู่</th>"
    strHTML += "<th rowspan='2' class='text-center textHeadTable'>การปรับปรุงการควบคุมภายใน</th>"
    return strHTML
}

function fnSetHeaderSub(dataHeader){
    var strHTML = ''
    strHTML += "<th class='text-center textHeadTable'>โอกาส</th>"
    strHTML += "<th class='text-center textHeadTable'>ผลกระทบ</th>"
    strHTML += "<th class='text-center textHeadTable'>ระดับ</th>"
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
    var DateFix = 'ณ วันที่ ๓๐ เดือน กันยายน ' + convertToThaiNumerals(currentThaiYear)
    strHTML += " <div class='title'>หน่วยงาน......." + NameUnit +  ".......</div> "
    strHTML += " <div class='title'>รายงานการประเมินผลการควบคุมภายใน</div> "
    strHTML += " <div class='title'>สำหรับระยะเวลาดำเนินงานสิ้นสุด" + DateFix + " </div> "
    strHTML += " <div class='a4-size'> "
    strHTML += "<table id='tb_" + objData[0].enControl + "'>"
    strHTML += "<thead>"
    strHTML += "<tr class='colspan-header'>"
    strHTML += fnSetHeader(data) 
    strHTML += "</tr>"
    strHTML += "<tr class='second-header'>"
    strHTML += fnSetHeaderSub(data) 
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
    strHTML += "    <button type='button' class='btn btn-primary' id='btnSaveData'>บันทึกฉบับร่าง</button>"
    strHTML += "    <button type='button' class='btn btn-success' id='btnExportPDF'>Export PDF</button>"
    strHTML += " </div> "

    $("#dvFormAssessment")[0].innerHTML = strHTML
}

function fnDrawTablePerformance(objData) { /* ด้านการข่าว */
    var strHTML = "";
    var team = "test"
    var data = objData
    for (var i = 0; i < data.length; i++) {
        strHTML += "<tr>"
        strHTML += "<td id='headRisk" + (i + 1) + "'  class='text-left align-middle' style='width: 25%;white-space: pre-wrap;'>" + (data[i].headRisk ? (data[i].headRisk) : '-') + "</td>"
        strHTML += "<td id='objRisk" + (i + 1) + "'  class='text-left align-middle' style='width: 20%;white-space: pre-wrap;'>" + (data[i].objRisk ? (data[i].objRisk) : '-') + "</td>"
        strHTML += "<td id='risking" + (i + 1) + "'  class='text-left align-middle' style='width: 20%;white-space: pre-wrap;'>" + (data[i].risking ? (data[i].risking) : '-') + "</td>"
        if (data[i].activityControl) {

        } else {
            strHTML += "<td id='activityControl" + (i + 1) + "'  class='text-center align-middle' style='width: 10%;white-space: pre-wrap;'> - </td>"
        }
        if (data[i].chanceRisk) {
            strHTML += "<td class='text-center align-middle'> "
            strHTML += "<div id='dvrisk" + (i + 1) + "'>"
            strHTML += "<span style='display:none'>" + (data[i].chanceRisk ? convertToThaiNumerals(data[i].chanceRisk) : '-') + "</span>"
            // strHTML += "<button id='btnEditRisk" + (i + 1) + "' type='button' class='btn btn-warning'; data-bs-toggle='modal' data-bs-target='#chanceRiskModalLabel' onclick='fnDrawChanceRiskModal(\"" + team + "\",\"" + (i + 1) + "\")' style=''>"
            strHTML += "<button id='btnChanceRisk" + (i + 1) + "' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#chanceRiskModal'>"
            strHTML += "<i class='las la-pen' aria-hidden=;'true'></i>"
            strHTML += "</button>"
            strHTML += "</div>"
            strHTML += "</td>"
        } else { // ถ้าไม่มี
            strHTML += "<td class='text-center align-middle'> "
            strHTML += "<span>" + (data[i].chanceRisk ? convertToThaiNumerals(data[i].chanceRisk) : '-') + "</span>"
            strHTML += "</td>"
            
        }
        if (data[i].effectRisk) {
            strHTML += "<td class='text-center align-middle'> "
            strHTML += "<div id='dvrisk" + (i + 1) + "'>"
            strHTML += "<span style='display:none'>" + (data[i].effectRisk ? convertToThaiNumerals(data[i].effectRisk) : '-') + "</span>"
            //strHTML += "<button id='btnEditRisk" + (i + 1) + "' type='button' class='btn btn-warning'; onclick='fnEditConfig(\"" + team + "\",\"" + (i + 1) + "\")' style=''>"
            strHTML += "<button id='btnEffectRisk" + (i + 1) + "' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#effectRiskModal'>"
            strHTML += "<i class='las la-pen' aria-hidden=;'true'></i>"
            strHTML += "</button>"
            strHTML += "</div>"
            strHTML += "</td>"
        } else { // ถ้าไม่มี
            strHTML += "<td class='text-center align-middle'> "
            strHTML += "<span>" + (data[i].effectRisk ? convertToThaiNumerals(data[i].effectRisk) : '-') + "</span>"
            strHTML += "</td>"
            
        }
        if (data[i].rankRisk) {
            strHTML += "<td class='text-center align-middle'> "
            strHTML += "<div id='dvrisk" + (i + 1) + "'>"
            strHTML += "<span style='display:none'>" + (data[i].rankRisk ? convertToThaiNumerals(data[i].rankRisk) : '-') + "</span>"
            // strHTML += "<button id='btnEditRisk" + (i + 1) + "' type='button' class='btn btn-warning'; onclick='fnEditConfig(\"" + team + "\",\"" + (i + 1) + "\")' style=''>"
            strHTML += "<button id='btnMatrixRank" + (i + 1) + "' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#MatrixRankModal'>"
            strHTML += "<i class='las la-pen' aria-hidden=;'true'></i>"
            strHTML += "</button>"
            strHTML += "</div>"
            strHTML += "</td>"
        } else { // ถ้าไม่มี
            strHTML += "<td class='text-center align-middle'> "
            strHTML += "<span>" + (data[i].rankRisk ? convertToThaiNumerals(data[i].rankRisk) : '-') + "</span>"
            strHTML += "</td>"
            
        }
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

