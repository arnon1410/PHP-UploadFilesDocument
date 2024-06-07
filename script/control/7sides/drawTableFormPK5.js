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
    var NameUnit = 'จร.ทร.'
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
    // // ด้านภารกิจหลัก
    // strHTML += "<tr>"
    // strHTML += "<td id='main1'  class='text-left align-middle' colspan='7' style='width: 30%;white-space: pre-wrap; '><span id='spanHeadRisk1' style='font-weight: bold;'>ด้านภารกิจหลัก</span></td>"
    // strHTML += "</tr>"
    // // วัตถุประสงค์
    // strHTML += "<tr>"
    // strHTML += "<td id='mainObjective1'  class='text-left align-middle' style='width: 30%;'>"
    // strHTML += "<div style='text-align: center;'>"
    // strHTML += "    <textarea id='textMainObjective1' name='textMainObjective1' rows='4' cols='30'></textarea> "
    // strHTML += "</div> "
    // strHTML += "<div class='text-end'>"
    // strHTML += "    <button class='btn btn-secondary' type='submit' id='submitButton1' onclick='fnSubmitText(\"mainObjective\")'>ยืนยัน</button>"
    // strHTML += "</div>"
    // strHTML += "<div class='text-start'>"
    // strHTML += "    <span style='white-space: pre-wrap;' id='displayText1'></span>"
    // strHTML += "</div>"
    // strHTML += " </td>"
    // strHTML += "<td></td><td></td><td></td><td></td><td></td><td></td>"
    // strHTML += "</tr>"

    // // ด้านนโยบายสำคัญ
    // strHTML += "<tr>"
    // strHTML += "<td id='policy1'  class='text-left align-middle' colspan='7' style='width: 30%;white-space: pre-wrap;'><span id='spanHeadRisk1' style='font-weight: bold;'>ด้านนโยบายสำคัญ</span></td>"
    // strHTML += "</tr>"
    // // วัตถุประสงค์
    // strHTML += "<tr>"
    // strHTML += "<td id='importantPolicy1'  class='text-left align-middle' style='width: 30%;'>"
    // strHTML += "<div style='text-align: center;'>"
    // strHTML += "    <textarea id='textImportantPolicy1' name='textMainObjective1'  rows='4' cols='30'></textarea> "
    // strHTML += "</div> "
    // strHTML += "<div class='text-end'>"
    // strHTML += "    <button class='btn btn-secondary' type='submit' id='submitButton2' onclick='fnSubmitText(\"importantPolicy\")'>ยืนยัน</button>"
    // strHTML += "</div>"
    // strHTML += "<div class='text-start'>"
    // strHTML += "    <span style='white-space: pre-wrap;' id='displayText2'></span>"
    // strHTML += "</div>"
    // strHTML += " </td>"
    // strHTML += "<td></td><td></td><td></td><td></td><td></td><td></td>"
    // strHTML += "</tr>"

    // // ด้านภารกิจสนับสนุน
    // strHTML += "<tr>"
    // strHTML += "<td id='policy1'  class='text-left align-middle middle' colspan='7' style='width: 30%;white-space: pre-wrap;'>ด้านภารกิจสนับสนุน</td>"
    // strHTML += "</tr>"

     // ด้านภารกิจหลัก
    strHTML +=  fnDrawDataInTable(data)
    for (var i = 0; i < data.length; i++) {
        // strHTML += "<tr>"
        // strHTML += "<td id='headRisk" + (i + 1) + "'  class='text-left align-top' style='width: 25%;white-space: pre-wrap;'>" + (data[i].headRisk ? (data[i].headRisk) : '-') + "</td>"
        // strHTML += "<td id='objRisk" + (i + 1) + "'  class='text-left align-top' style='width: 12%white-space: pre-wrap;'>" + (data[i].objRisk ? (data[i].objRisk) : '-') + "</td>"
        // strHTML += "<td id='headRisk" + (i + 1) + "'  class='text-left align-top' style='width:12%;white-space: pre-wrap;'>" + (data[i].headRisk ? (data[i].headRisk) : '-') + "</td>"
        // strHTML += "<td id='objRisk" + (i + 1) + "'  class='text-left align-top' style='width: 12%white-space: pre-wrap;'>" + (data[i].objRisk ? (data[i].objRisk) : '-') + "</td>"
        // strHTML += "<td id='headRisk" + (i + 1) + "'  class='text-left align-top' style='width: 12%white-space: pre-wrap;'>" + (data[i].headRisk ? (data[i].headRisk) : '-') + "</td>"
        // strHTML += "<td id='objRisk" + (i + 1) + "'  class='text-left align-top' style='width: 12%white-space: pre-wrap;'>" + (data[i].objRisk ? (data[i].objRisk) : '-') + "</td>"
        // strHTML += "<td id='improvement" + (i + 1) + "'  class='text-left align-top' style='width: 12%white-space: pre-wrap;'>" + (data[i].improvement ? (data[i].improvement) : '-') + "</td>"
        // strHTML += "</tr>"
    }

    return strHTML;
    // แทรกโค้ดเข้าไปใน #dvTableReportAssessment
    // $("#dvTableReportAssessment")[0].innerHTML = strHTML;
}

function fnDrawDataInTable(data) {
    var strHTML = '';
    var tab = '&emsp;&emsp;&emsp;&emsp;';
    const sides = [
        'ด้านการกำลังพล', 'ด้านยุทธการ', 'ด้านการข่าว', 
        'ด้านการส่งกำลังบำรุง', 'ด้านการสื่อสาร', 
        'ด้านระบบเทคโนโลยีสารสนเทศในการบริหารจัดการ', 
        'ด้านกิจการพลเรือน', 'ด้านการงบประมาณ', 
        'ด้านการเงินและการบัญชี', 'ด้านพัสดุและทรัพย์สิน'
    ];

    // สร้างผลลัพธ์ตามที่ต้องการ
    sides.forEach((side, index) => {
        const id_sides = (index + 1).toString();
        const foundRisks = data.filter(risk => risk.id_sides === id_sides);

        if (foundRisks.length > 0) {
            let headRisksContent = [];
            let riskingContent = '';
            let existingControlsContent = '';
            let rateRiskContent = '';
            let existingRiskContent = '';
            let improvementControlContent = '';
            let responsibleAgencyContent = '';
            const strObjRisk = foundRisks[0].objRisk;

            foundRisks.forEach(risk => {
                if (!headRisksContent.includes(risk.headRisk)) {
                    headRisksContent.push(risk.headRisk);
                }

                if (risk.risking) {
                    riskingContent += `- ${risk.risking}<br>`;
                }
                if (risk.existingControls) {
                    existingControlsContent += `- ${risk.existingControls}<br>`;
                }
                if (risk.existingRisk) {
                    rateRiskContent += `- ${risk.existingRisk}<br>`;
                }
                if (risk.improvementControl) {
                    improvementControlContent += `- ${risk.improvementControl}<br>`;
                }
                if (risk.responsibleAgencyContent) {
                    responsibleAgencyContent += `- ${risk.responsibleAgency}<br>`;
                }
                if (risk.existingRiskContent) {
                    responsibleAgencyContent += `- ${risk.existingRisk}<br>`;
                }
            });

            const headRisks = Array.from(headRisksContent).join('<br>- ');

            strHTML += "<tr>";
            strHTML += "<td id='headRisk" + index + "' class='text-left align-top' style='width: 30%;'> ";
            strHTML += " <div> ";
            strHTML += " <span id='spanHeadRisk" + index + "' style='font-weight: bold;'>" + fnConvertToThaiNumerals(id_sides) + ". " + side + "</span> ";
            strHTML += " </div> ";
            strHTML += " <div> ";
            strHTML += " <span id='spanHeadRisk" + index + "' style='font-weight: bold;'>" + tab + "วัตถุประสงค์</span> ";
            strHTML += " </div> ";
            strHTML += " <div> ";
            strHTML += " <span id='spanHeadRisk" + index + "' class='text-left align-top'>" + tab + strObjRisk + "</span> ";
            strHTML += " </div> ";
            strHTML += " <div> ";
            strHTML += " <span id='spanHeadRisk" + index + "' style='font-weight: bold;'>" + tab + "กิจกรรม</span> ";
            strHTML += " </div> ";
            strHTML += " <div> ";
            strHTML += " <div class='tab'> ";
            strHTML += " <span id='spanHeadRisk" + index + "'>- " + headRisks + "</span> ";
            strHTML += " </div> ";
            strHTML += "</td>";

            if (riskingContent) {
                strHTML += "<td class='text-left align-top' style='width: 12%;'>"
                strHTML += " <div> "
                strHTML += " <span id='spanRisking" + index + "'>" + riskingContent + "</span> "
                strHTML += " </div> "
                strHTML += " </td>"      
            }

            if (existingControlsContent) {
                strHTML += "<td class='text-left align-top' style='width: 12%;>"
                strHTML += " <div> "
                strHTML += " <span id='spanExistingControls" + index + "'>" + existingControlsContent + "</span> "
                strHTML += " </div> "
                strHTML += " </td>"    
            } 

            if (rateRiskContent) {
                strHTML += "<td class='text-left align-top' style='width: 12%;>"
                strHTML += " <div> "
                strHTML += " <span id='spanRateRiskContent" + index + "'>" + rateRiskContent + "</span> "
                strHTML += " </div> "
                strHTML += " </td>"
            } else {
                strHTML += "<td id='rateRisk1'  class='text-left align-top' style='width: 12%;'>"
                strHTML += "<div style='text-align: center;'>"
                strHTML += "    <textarea id='textRateRisk1' name='textRateRisk1'  rows='6' cols='10'></textarea> "
                strHTML += "</div> "
                strHTML += "<div class='text-end'>"
                strHTML += "    <button class='btn btn-secondary' type='submit' id='submitButton3' onclick='fnSubmitText(\"rateRisk\")'>ยืนยัน</button>"
                strHTML += "</div>"
                strHTML += "<div class='text-start'>"
                strHTML += "    <span style='white-space: pre-wrap;' id='displayText3'></span>"
                strHTML += "</div>"
                strHTML += " </td>"
            }

            if (existingRiskContent) {
                strHTML += "<td class='text-left align-top' style='width: 12%;>"
                strHTML += " <div> "
                strHTML += " <span id='spanExistingRisk" + index + "'>" + existingRiskContent + "</span> "
                strHTML += " </div> "
                strHTML += " </td>"
            } else {
                strHTML += "<td id='rateRisk1'  class='text-left align-top' style='width: 12%;'>"
                strHTML += "<div style='text-align: center;'>"
                strHTML += "    <textarea id='textExistingRisk1' name='textExistingRisk1'  rows='6' cols='10'></textarea> "
                strHTML += "</div> "
                strHTML += "<div class='text-end'>"
                strHTML += "    <button class='btn btn-secondary' type='submit' id='submitButton4' onclick='fnSubmitText(\"existingRisk\")'>ยืนยัน</button>"
                strHTML += "</div>"
                strHTML += "<div class='text-start'>"
                strHTML += "    <span style='white-space: pre-wrap;' id='displayText4'></span>"
                strHTML += "</div>"
                strHTML += " </td>"
            }

            if (improvementControlContent) {
                strHTML += "<td class='text-left align-top' style='width: 12%;>"
                strHTML += " <div> "
                strHTML += " <span id='spanImprovementControl" + index + "'>" + improvementControlContent + "</span> "
                strHTML += " </div> "
                strHTML += " </td>"
            } 

            if (responsibleAgencyContent) {
                strHTML += "<td class='text-left align-top' style='width: 12%;>"
                strHTML += " <div> "
                strHTML += " <span id='spanResponsibleAgency" + index + "'>" + responsibleAgencyContent + "</span> "
                strHTML += " </div> "
                strHTML += " </td>"
            } else {
                strHTML += "<td id='responsibleAgency1'  class='text-left align-top' style='width: 12%;'>"
                strHTML += "<div style='text-align: center;'>"
                strHTML += "    <textarea id='textResponsibleAgency1' name='textResponsibleAgency1'  rows='6' cols='10'></textarea> "
                strHTML += "</div> "
                strHTML += "<div class='text-end'>"
                strHTML += "    <button class='btn btn-secondary' type='submit' id='submitButton5' onclick='fnSubmitText(\"responsibleAgency\")'>ยืนยัน</button>"
                strHTML += "</div>"
                strHTML += "<div class='text-start'>"
                strHTML += "    <span style='white-space: pre-wrap;' id='displayText5'></span>"
                strHTML += "</div>"
                strHTML += " </td>"
            }

            
            strHTML += "</tr>"
        }
    });
    return strHTML;
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

/* ฟังก์ชันสำหรับการยืนยันข้อความ */
function fnSubmitText(sides) {
    var textarea = ''
    var button = ''
    var displayText = ''
    if (sides == 'mainObjective') { //ด้านภารกิจหลัก
        textarea = document.getElementById('textMainObjective1');
        button = document.getElementById('submitButton1');
        displayText = document.getElementById('displayText1');
    } else if (sides == 'importantPolicy') { //ด้านนโยบายสำคัญ
        textarea = document.getElementById('textImportantPolicy1');
        button = document.getElementById('submitButton2');
        displayText = document.getElementById('displayText2');
    } else if (sides == 'rateRisk') {
        textarea = document.getElementById('textRateRisk1');
        button = document.getElementById('submitButton3');
        displayText = document.getElementById('displayText3');
    } else if (sides == 'existingRisk') {
        textarea = document.getElementById('textExistingRisk1');
        button = document.getElementById('submitButton4');
        displayText = document.getElementById('displayText4')
    } else {
        textarea = document.getElementById('textResponsibleAgency1');
        button = document.getElementById('submitButton5');
        displayText = document.getElementById('displayText5');  
    }

    var tab = '&emsp;&emsp;&emsp;&emsp;'

    if (textarea.value) {
        displayText.innerHTML = tab + textarea.value;

        /* ซ่อน textarea และปุ่ม */
        textarea.style.display = 'none';
        button.style.display = 'none';  
    } else {
        Swal.fire({
            title: "",
            text: "กรุณากรอกข้อมูลให้ครบถ้วน",
            icon: "warning"
        });
    }

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

