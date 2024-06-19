function fnSetHeader(){
    var strHTML = ''
    strHTML += "<th class='text-center textHeadTable' style='width: 55%;'>คำถาม</th>"
    strHTML += "<th class='text-center textHeadTable' style='width: 8%;'>มี/ใช่</th>";
    strHTML += "<th class='text-center textHeadTable' style='width: 10%;'>ไม่มี/ไม่ใช่</th>";
    strHTML += "<th class='text-center textHeadTable' style='width: 29%;'>คำอธิบาย/คำตอบ</th>"

    strHTML += "<tr>";
    strHTML += "<td></td>";
    strHTML += "<td class='text-center tdUnderline' style='width: 8%;' >&#10003;</td>";
    strHTML += "<td class='text-center tdUnderline' style='width: 8%;' >&#10005; (NA)</td>";
    strHTML += "<td></td>";
    strHTML += "</tr>";

    return strHTML
}
function fnDrawTableForm(access,valSides,objData) {
    if (access == 'admin') {
        // fnGetDataSelect()
    }
     // Get data selete before create table 
    var strHTML = ''
    var data = objData
    var strSides = valSides

    var arrSides = [
        { key: 'branchpersonal', NameSides: 'ด้านกำลังพล',value: 4 },
        { key: 'branchoperation',NameSides: 'ด้านกาารยุทธการ', value: 3 },
        { key: 'branchnews',NameSides: 'ด้านการข่าว', value: 7 },
        { key: 'branchlogistics',NameSides: 'ด้านส่งกำลังบำรุง', value: 7 },
        { key: 'branchcommunication',NameSides: 'ด้านสื่อสาร', value: 5 },
        { key: 'branchtechnology',NameSides: 'ด้านระบบเทคโนโลยีในการบริหารจัดการ', value: 3 },
        { key: 'branchcivilaffairs',NameSides: 'ด้านกิจการพลเรือน', value: 4 },
        { key: 'branchbudget',NameSides: 'ด้านการงบประมาณ', value: 6 },
        { key: 'branchfinanceandacc',NameSides: 'ด้านการเงินและการบัญชี', value: 6 },
        { key: 'branchpercelsandproperty',NameSides: 'ด้านพัสดุและทรัพย์สิน', value: 8 },
    ];

    var index = arrSides.findIndex(item => item.key === strSides);

    strHTML += " <div class='title'>แบบสอบถามการควบคุม</div> "
    strHTML += " <div class='subtitle'>" + arrSides[index].NameSides + "</div> "
    strHTML += " <div class='a4-size'> "
    strHTML += "<table id='tb_" + valSides + "'>"
    strHTML += "<thead>"
    strHTML += "<tr>"
    strHTML += fnSetHeader() 
    strHTML += "</tr>"
    strHTML += "</thead>"
    strHTML += "<tbody>"
    if (valSides == 'branchOperation') { // ถ้าเป็นด้านยุทธการจะเรียก function นี้
        strHTML += fnDrawTableReportAssessmentFix(data)
    } else {
        strHTML += fnDrawTableReportAssessment(data)
    }
    strHTML += fnDrawTableReportAssessmentOther(strSides, arrSides, data)
    strHTML += "</tbody>"
    strHTML += "</table>"
    strHTML += fnDrawCommentDivEvaluation(arrSides[index].NameSides)
    strHTML += " <div class='dvSignature'> "
    strHTML += " <div>ชื่อผู้ประเมิน.........................................</div> "
    strHTML += " <div>ตำแหน่ง................................................</div> "
    strHTML += " <div>วันที่......................................................</div> "

    strHTML += "<button id='btnEditSignature' type='button' class='btn btn-warning'; onclick='fnEditSignature()' style='display:none;margin: 5px 5px 0px 0px;'>"
    strHTML += "<i class='las la-pen mr-1' aria-hidden=;'true' style='margin-right:5px'></i><span>กรอกข้อมูลผู้ประเมิน<span>"
    strHTML += "</button>"

    strHTML += " </div> "
    strHTML += " <div class='dvFooterForm'> "
    strHTML += "    <button type='button' class='btn btn-primary' id='btnSaveData' onclick='fnSaveDraftDocument("+ objData[0].mainControl+ ")'>บันทึกฉบับร่าง</button>"
    strHTML += "    <button type='button' class='btn btn-success' id='btnExportPDF' onclick='fnExportDocument()'>Export PDF</button>"
    strHTML += " </div> "
    $("#dvFormReport")[0].innerHTML = strHTML
}

/*
function createCheckboxAndTextArea(id) {
    if (id == 503) {
        return "<div style='display:flex;'>" +
        "<input type='checkbox' id='horns_" + id + "' name='horns_" + id + "' style='display:none'/>" +
        // "<textarea id='story_" + id + "' name='story_" + id + "' rows='1' cols='25' style='display:none'></textarea>" +
        "<span id='descript_" + id + "' name='descript_" + id + "' style='text-align: justify;'>- เครื่องมือ/อุปกรณ์ในการรวบรวมข้อมูลด้านการข่าวยังมีความทันสมัยและมีประสิทธิภาพไม่เพียงพอต่อการปฏิบัติงาน</span>" +
        "</div>";
    } else {
        return "<div class='text-center' style='display:flex;'>" +
        "<input type='checkbox' id='horns_" + id + "' name='horns_" + id + "' style='margin: 5px 10px 0px 10px;'/><span>(NA)</span> " +
        // "<textarea id='story_" + id + "' name='story_" + id + "' rows='1' cols='25' style='display:none'></textarea>" +
        "</div>";
    }

}
*/

function fnCreateInputRadioAndSpan(text, index, validate) {
    var strHTML = ""
    if (validate && validate == '1') {
        strHTML += "<div style='display:flex;'>"
        strHTML += "<input type='radio' id='inputRadioSumOfSide" + index + "_" + validate + "' name='inputRadioSumOfSide" + index + "' style='margin: 5px 10px 0px 0px;' value='1' onchange='fnToggleTextSum(\"" + index + "_" + validate + "\", this)'/>"
        strHTML += "<span>" + text + "</span>"
        strHTML += "</div>"
    } else { // กรณีไม่เพียงพอ 
        strHTML += "<div style='display:flex;margin-bottom: 10px;'>"
        strHTML += "<input type='radio' id='inputRadioSumOfSide" + index + "_" + validate + "' name='inputRadioSumOfSide" + index + "' style='margin: 5px 10px 0px 0px;' value='0' onchange='fnToggleTextSum(\"" + index + "_" + validate + "\", this)'/>"
        strHTML += "<span>" + text + "</span>"
        strHTML += "</div>"
        strHTML += "<div style='display:flex;'>"
        strHTML += "<textarea id='commentSum" + index + "_" + validate + "' name='commentSum" + index + "_" + validate + "' rows='2' cols='33' style='display:none'></textarea>"
        strHTML += "<button class='btn btn-secondary btn-sm' type='submit' id='submitButtonSum" + index + "_" + validate + "' onclick='fnSubmitTextSum(\"" + index + "_" + validate + "\")' style='display:none'>ยืนยัน</button>"
        strHTML += "</div>"
        strHTML += "<div style='display:flex;'> "
        strHTML += "<p class='text-left pComment' id='displayTextSum" + index + "_" + validate + "' style='white-space: pre-wrap;'></p>"
        strHTML += "<i class='las la-pencil-alt' id='editIconSum" + index + "_" + validate + "' style='display:none; cursor:pointer; margin-left: 10px;' onclick='fnEditTextSum(\"" + index + "_" + validate + "\")'></i>"
        strHTML += "</div>"
       
    }
    return strHTML
}

function fnDrawTableReportAssessment(data) {
    var strHTML = "" ;
    var dataControl = data
    /* แถวที่มี Checkbox และ TextArea */
    function fnCreateCheckboxAndTextAreaRow(id_control, text, id, size) {
        return "<tr>" +
            "<td style='width: 55%;text-indent: " + size + "'>"+ (id_control ? fnConvertToThaiNumeralsAndPoint(id_control) + ' ' : '')  + text + "</td>" +
            "<td style='width: 8%;' class='text-center checkbox-container'> " +
            "<input type='checkbox' id='haveData_" + id + "' class='have-checkbox' name='haveData_" + id + "' onchange='fnToggleTextarea(\"btnUploadDoc" + id + "\",\"btnViewDoc" + id + "\",\"comment_" + id + "\",\"submitButton" + id + "\", this, \"1 \",\"" + id + "\")'/>" +
            "<label for='haveData_" + id + "' id='lablehaveData_" + id + "' class='hidden'>&#10003;</label> " +
            "</td>" +
            "<td style='width: 8%;' class='text-center checkbox-container'> " +
            "<input type='checkbox' id='nothaveData_" + id + "' class='nothave-checkbox' name='nothaveData_" + id + "' onchange='fnToggleTextarea(\"btnUploadDoc" + id + "\",\"btnViewDoc" + id + "\",\"comment_" + id + "\",\"submitButton" + id + "\", this, \"2 \",\"" + id + "\")'/>" +
            "<label for='nothaveData_" + id + "' id='lablenothaveData_" + id + "' class='hidden' style='width: 4%;'>&#10005;</label> " +
            "<input type='checkbox' id='notAppData_" + id + "' class='notapp-checkbox' name='notAppData_" + id + "' onchange='fnToggleTextarea(\"btnUploadDoc" + id + "\",\"btnViewDoc" + id + "\",\"comment_" + id + "\",\"submitButton" + id + "\", this, \"3 \",\"" + id + "\")'/>" +
            "<label for='notAppData_" + id + "' id='lablenotAppData_" + id + "' class='hidden' style='width: 4%;'>NA</label> " +
            "</td>" +
            "<td style='width: 29%;'>"+ fncreateTextAreaAndButton(text, id) +"</td>" +
            "</tr>";
    }

    
    for (var i = 0; i < dataControl.length; i++) {
        var item = dataControl[i];
        if (item.maincontrol_id !== undefined || item.sum_id !== undefined) {
            if (item.sum_id && item.value) { // ส่วนสรุป
                strSumDetail = fnMapValueToCallFunction(item)
                strHTML += "<tr><td style='width: 55%;'>" + strSumDetail.text + "</td><td></td><td></td><td></td></tr>"
            } else { // ส่วนอื่น ๆ วัตถุประสงค์ 
                if (item.sum_id) { // ตรงส่วนสรุปแต่ละคำถาม
                    strHTML += "<tr><td style='width: 55%;font-weight: bold;'><u>สรุป</u> : " + item.text + "</td><td></td><td></td><td></td></tr>";
                } else { // หัวข้อหลัก 1,2,3,4,5
                    strHTML += "<tr><td style='width: 55%;;font-weight: bold;'>"+ fnConvertToThaiNumeralsAndPoint(item.id_control) + ' ' + item.text + "</td><td></td><td></td><td></td></tr>";
                }
                if (item.main_Obj) { //วัตถุประสงค์ของการควบคุม ใช้ร่วมกัน
                    strHTML += "<tr><td style='width: 55%;text-indent: 17px;font-weight: bold;'>" + item.main_Obj + "</td><td></td><td></td><td></td></tr>";
                }
                if (item.Object_name) { // เพื่อ ......
                    strHTML += "<tr><td style='width: 55%;text-indent: 17px;font-style: italic;'>" + item.Object_name + "</td><td></td><td></td><td></td></tr>";
                }
            }
        } else { // หัวข้อย่อยทั้งหมด
            
            if ((item.is_subcontrol && item.is_subcontrol == 1) || (item.is_innercontrol && item.is_innercontrol == 1)) { // ถ้ามีหัวข้อย่อย 
                if (item.id_subcontrol) {
                    strHTML += "<tr><td style='width: 55%;text-indent: 12%'>"+ fnConvertToThaiNumeralsAndPoint(item.id_subcontrol) + ' ' + item.text + "</td><td></td><td></td><td></td></tr>";
                } else {
                    strHTML += "<tr><td style='width: 55%;text-indent: 17px;'>"+ fnConvertToThaiNumeralsAndPoint(item.id_control) + ' ' + item.text + "</td><td></td><td></td><td></td></tr>";
                }
            } else { // ไม่มีหัวข้อย่อย is_subcontrol == 0 หรือ item.is_innercontrol == 0
                if (item.id_innercontrol) { // 1
                    strHTML += fnCreateCheckboxAndTextAreaRow(item.id_innercontrol, item.text, item.id, '26%');
                } else if (item.id_subcontrol) {
                    strHTML += fnCreateCheckboxAndTextAreaRow(item.id_subcontrol, item.text, item.id, '12%');
                } else {
                    strHTML += fnCreateCheckboxAndTextAreaRow(item.id_control, item.text, item.id, '17px');
                }
            }
        }
    }


    return strHTML;
    // แทรกโค้ดเข้าไปใน #dvTableReportAssessment
    // $("#dvTableReportAssessment")[0].innerHTML = strHTML;
}

function fnDrawTableReportAssessmentFix (data) {  /* ด้านยุทธการ */
    var strHTML = "" ;
    var dataControl = data
    /* แถวที่มี Checkbox และ TextArea */
// checkbox-container
    var mainHeadings = [
        { id: 1, text: "การเตรียมกำลัง" },
        { id: 2, text: "การใช้กำลัง" }
    ];


    function fnAddMainHeadingIfNeeded(currentMainControlId) {
        var mainHeading = mainHeadings.find(heading => heading.id === currentMainControlId);
        if (mainHeading) {
            strHTML += `<tr><td style='width: 55%; font-weight: bold;'>${fnConvertToThaiNumeralsAndPoint(mainHeading.id)}. ${mainHeading.text}</td><td></td><td></td><td></td></tr>`;
            mainHeadings = mainHeadings.filter(heading => heading.id !== currentMainControlId);
        }
    }
    
    
    if (dataControl.length > 0) {
        var currentMainControlId = null;
        for (var i = 0; i < dataControl.length; i++) {
            var item = dataControl[i];
            if (currentMainControlId !== item.maincontrol_id) {
                currentMainControlId = item.maincontrol_id;
                fnAddMainHeadingIfNeeded(currentMainControlId);
            }

            if (item.maincontrol_id !== undefined || item.sum_id !== undefined) {
                if (item.sum_id && item.value) { // ส่วนสรุป
                    strSumDetail = fnMapValueToCallFunction(item)
                    strHTML += "<tr><td style='width: 55%;'>" + strSumDetail.text + "</td><td></td><td></td><td></td></tr>"
                } else { // ส่วนอื่น ๆ วัตถุประสงค์ 
                    if (item.sum_id) { // ตรงส่วนสรุปแต่ละคำถาม
                        strHTML += "<tr><td style='width: 55%;font-weight: bold;'><u>สรุป</u> : " + item.text + "</td><td></td><td></td><td></td></tr>";
                    } else { // หัวข้อหลัก 1,2,3,4,5
                        strHTML += "<tr><td style='width: 55%;;font-weight: bold;text-indent: 5%;'>"+ fnConvertToThaiNumeralsAndPoint(item.id_control) + ' ' + item.text + "</td><td></td><td></td><td></td></tr>";
                    }
                    if (item.main_Obj) { //วัตถุประสงค์ของการควบคุม ใช้ร่วมกัน
                        strHTML += "<tr><td style='width: 55%;font-weight: bold;text-indent: 12%;'>" + item.main_Obj + "</td><td></td><td></td><td></td></tr>";
                    }
                    if (item.Object_name) { // เพื่อ ......
                        strHTML += "<tr><td style='width: 55%;font-style: italic;text-indent: 12%;'>" + item.Object_name + "</td><td></td><td></td><td></td></tr>";
                    }
                }
            } else { // หัวข้อย่อยทั้งหมด
                
                if ((item.is_subcontrol && item.is_subcontrol == 1) || (item.is_innercontrol && item.is_innercontrol == 1)) { // ถ้ามีหัวข้อย่อย 
                    if (item.id_subcontrol) {
                        strHTML += "<tr><td style='width: 55%;text-indent: 12%'>"+ fnConvertToThaiNumeralsAndPoint(item.id_subcontrol) + ' ' + item.text + "</td><td></td><td></td><td></td></tr>";
                    } else {
                        strHTML += "<tr><td style='width: 55%;text-indent: 12%;'>"+ fnConvertToThaiNumeralsAndPoint(item.id_control) + ' ' + item.text + "</td><td></td><td></td><td></td></tr>";
                    }
                } else { // ไม่มีหัวข้อย่อย is_subcontrol == 0 หรือ item.is_innercontrol == 0
                    if (item.id_innercontrol) { // 1
                        strHTML += fnCreateCheckboxAndTextAreaRow(item.id_innercontrol, item.text, item.id, '26%');
                    } else if (item.id_subcontrol) {
                        strHTML += fnCreateCheckboxAndTextAreaRow(item.id_subcontrol, item.text, item.id, '12%');
                    } else {
                        strHTML += fnCreateCheckboxAndTextAreaRow(item.id_control, item.text, item.id, '12%');
                    }
                }
            }
        }
    }
    return strHTML;
    // แทรกโค้ดเข้าไปใน #dvTableReportAssessment
    // $("#dvTableReportAssessment")[0].innerHTML = strHTML;
}

function fnDrawTableReportAssessmentOther(strSides, data, arrObj) {
    var strHTML = "" ;
    var arrSides = data
    var arrObject = arrObj
    var index = arrSides.findIndex(item => item.key === strSides);
   
    strHTML += " <div id='dvSidesOther'>"
    strHTML += "    <tr><td class='tdSidesOther' style='width: 55%;font-weight: bold;'>"
    strHTML += "    <div> "+ fnConvertToThaiNumeralsAndPoint(arrSides[index].value) +". อื่น ๆ "
    strHTML += "    <button id='btn_SidesOther' type='button' class='btn btn-success btn-sm'; onclick='fnGetModalSidesOther(\"" + strSides + "\",\"" + arrSides[index].value + "\",\"" + arrSides[index].NameSides + "\",\"" + arrObject + "\")' style='margin-left : 5px;'  data-bs-toggle='modal' data-bs-target='#OtherRiskModal'>"
    strHTML += "    <i class='las la-plus mr-1' aria-hidden=;'true' style='margin-right:5px'></i><span>เพื่มความเสี่ยงอื่นที่พบ</span>"
    strHTML += "    </button>"
    strHTML += "  <div id='dvSidesOther'>"
    strHTML += "    <div>............................................................................................</div>"
    strHTML += "    <div>............................................................................................</div>"
    strHTML += "    </td>"
    strHTML += "    <td class='tdSidesOther'></td><td class='tdSidesOther'></td><td class='tdSidesOther'></td></tr>";
    strHTML += "  </div> "
    strHTML += " </div> "
    return strHTML;
}


function fnMapValueToCallFunction(items) {
    // ตรวจสอบว่า items เป็น object หรือ array
    if (Array.isArray(items)) {
        // ฟังก์ชันในการกรองและอัปเดตข้อมูลถ้าเป็น array
        items = items.map(item => {
            if (item.sum_id !== null && item.sum_id !== undefined) {
                item.text = fnCreateInputRadioAndSpan(item.text, item.head_id, item.value);
            }
            return item;
        });
    } else if (items && typeof items === 'object') {
        // ฟังก์ชันในการอัปเดตข้อมูลถ้าเป็น object
        if (items.sum_id !== null && items.sum_id !== undefined) {
            items.text = fnCreateInputRadioAndSpan(items.text, items.head_id, items.value);
        }
        return items;
    } else {
        console.error("The provided items is neither an array nor a valid object");
    }
}


function fncreateTextAreaAndButton(text, id) {
    return `
        <div style='display:flex; align-items: center;'>
            <textarea id='comment_${id}' name='comment_${id}' rows='1' cols='15' style='display:none'></textarea>
            <button class='btn btn-secondary btn-sm' type='submit' id='submitButton${id}' onclick='fnSubmitText(${id})' style='display:none'>ยืนยัน</button>
        </div>
        <div style='display:flex; align-items: center;'>
            <p class='text-left pComment' id='displayText${id}' style='white-space: pre-wrap;'></p>
            <i class='las la-pencil-alt' id='editIcon${id}' style='display:none; cursor:pointer; margin-left: 10px;' onclick='fnEditText(${id})'></i>
        </div>
        <div id='dvUploadDoc${id}' class="text-center align-middle" style="display: flex;">
            <button id='btnUploadDoc${id}' type='button' class='btn btn-primary btn-sm btn-custom' onclick='fnUploadDocConfig("${text}", "${id}")' style='display:none;' data-bs-toggle='modal' data-bs-target='#relateDocumentModal'>
                <i class='las la-upload' aria-hidden='true'></i><span>อัปโหลด</span>
            </button>
            <button id='btnViewDoc${id}' type='button' class='btn btn-success btn-sm btn-custom2' onclick='fnViewDocConfig("${text}", "${id}")' style='display:none;'>
                <i class='las la-pen' aria-hidden='true'></i><span>กรอกข้อมูล</span>
            </button>
        </div>
    `;
}

function fnUploadDocConfig (text, id) {
    var strtext = text
    fnGetDataModal(strtext, id);
}

function fnViewDocConfig(text, id) {
    document.getElementById(`btnUploadDoc${id}`).style.display = 'none';
    document.getElementById(`btnViewDoc${id}`).style.display = 'none';
    document.getElementById(`comment_${id}`).style.display = 'block';
    document.getElementById(`submitButton${id}`).style.display = 'block';
    document.getElementById(`displayText${id}`).style.display = 'block';
}

// function fnSidesOtherConfig (side, id, nameSides) {
//     fnGetModalSidesOther(side, id, nameSides);
// }

function fnGetDataModal(strtext, id) {
    // var arrData = fnGetDataInternalControl(id) // call function get data
    var arrData = [{id:1 , mainControl: 'ด้านการข่าว'}]
    var strHTML = ''
    var strHTML2 = ''

    // draw modal
    strHTML += " <div class='mb-3'> "
    strHTML += " <label for='headCheckTopic' class='lableHead'>หัวข้อที่ตรวจสอบ</label> "
    strHTML += " <input type='text' class='form-control' id='headCheckTopic' value='"+ arrData[0].mainControl +"' readonly> "
    strHTML += " </div> "

    strHTML += " <div class='mb-3'> "
    strHTML += " <label for='nameMenuCheck' class='lableHead'>ชื่อรายการที่ตรวจสอบ</label> "
    
    strHTML += "<input type='text' class='form-control' id='nameMenuCheckTopic' value='"+ strtext +"' readonly>"
    strHTML += " </div> "

    strHTML += " <div id='dvuploadfile' class='mb-3'> "
    strHTML += " <label for='formFile' class='lableHead'>ไฟล์ที่แนบ</label> "
    strHTML += " <input class='form-control form-control-sm' id='formFile' type='file'> "
    strHTML += " </div> "


    strHTML2 += " <button type='button' class='btn btn-primary'>บันทึกข้อมูล</button> "
    strHTML2 += " <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>ยกเลิก</button> "            


    $("#dvBodyModalRelateDocumentModal")[0].innerHTML = strHTML
    $("#dvFooterModalrelateDocumentModal")[0].innerHTML = strHTML2
    
    // fnChangeSizeSelect("slNameRates") //ปรับขนาด select
    
}

function fnGetModalSidesOther (sides, number, nameSides, arrObj) {
    var strHTML = ''
    var strHTML2 = ''
    if (sides == 'branchoperation') {

    } else { // ด้านที่เหลือ
        console.log(arrObj)
    
        // draw modal
        strHTML += " <div class='mb-3'> "
        strHTML += " <label for='headCheckTopic' class='lableHead'>ด้านของกิจกรรม</label> "
        strHTML += " <input type='text' class='form-control' id='headCheckTopic' value='" + nameSides + "' style='background: darkgray;' readonly> "
        strHTML += " </div> "
    
        strHTML += " <div class='mb-3'> "
        strHTML += " <label for='nameMenuCheckTopic' class='lableHead label-required'>หัวข้อกิจกรรม</label> "
        strHTML += "<input type='text' class='form-control' id='nameMenuCheckTopic' value=''>"
        strHTML += " </div> "

        strHTML += " <div class='mb-3'> "
        strHTML += " <label for='nameActivity' class='lableHead label-required'>วัตถุประสงค์</label> "
        strHTML += "<input type='text' class='form-control' id='nameObjective' value=''>"
        strHTML += " </div> "
    
        strHTML += " <div class='mb-3'> "
        strHTML += " <label for='nameActivity' class='lableHead label-required'>ชื่อกิจกรรม 1</label> "
        strHTML += "<input type='text' class='form-control' id='nameActivity' value=''>"
        strHTML += " </div> "

        strHTML += " <div class='mb-3'> "
        strHTML += " <label for='nameActivity2' class='lableHead'>ชื่อกิจกรรม 2</label> "
        strHTML += "<input type='text' class='form-control' id='nameActivity2' value=''>"
        strHTML += " </div> "
    
        strHTML2 += " <button type='button' class='btn btn-primary' onclick='fnAddNewRowFromModal(\"" + number + "\",\"" +  arrObj + "\")'>บันทึกข้อมูล</button> "
        strHTML2 += " <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>ยกเลิก</button> "           
    
    
        $("#dvBodyModalOtherRiskModal")[0].innerHTML = strHTML
        $("#dvFooterModalOtherRiskModal")[0].innerHTML = strHTML2

    }
    

 }

 // ฟังก์ชันเพื่อเพิ่มแถวใหม่จาก modal
function fnAddNewRowFromModal(number, arrObj) {
    var nameSides = $('#headCheckTopic').val();
    var activityTitle = $('#nameMenuCheckTopic').val();
    var objective = $('#nameObjective').val();
    var activityName1 = $('#nameActivity').val();
    var activityName2 = $('#nameActivity2').val();
    var newId = new Date().getTime();
    console.log(arrObj)
    // เพิ่มแถวใหม่เข้าไปใน arrObj
    // arrObj.push(
    //     { id: newId, id_control: '7.1', head_id: 7, maincontrol_id: 2, text: activityTitle, main_Obj: objective, Object_name: activityName1 + (activityName2 ? ", " + activityName2 : "") },
    //     { id: newId + 1, head_id: 7, sum_id: newId, value: '', text: activityTitle },
    //     { id: newId + 2, head_id: 7, sum_id: newId + 1, value: '1', text: "มีการควบคุมเพียงพอ" },
    //     { id: newId + 3, head_id: 7, sum_id: newId + 1, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้" }
    // );
     // เพิ่มแถวใหม่เข้าไปใน data
    //  arrObj.push(newRow);

    // วาดตารางใหม่
    // var updatedTableHTML = fnDrawTableReportAssessment(arrObj);
    // $('#dvTableReportAssessment').html(updatedTableHTML);

    // อัปเดต attribute data-table ด้วยข้อมูลใหม่
    // $('#dvTableReportAssessment').attr('data-table', JSON.stringify(arrObj));


    // ปิด modal
    $('#OtherRiskModal').modal('hide');
}

function fnToggleTextarea(btnUpdload,btnViewDoc,textareaId,buttonsId ,checkbox, coloums, id) {
    const btnUpdloads = document.getElementById(btnUpdload);
    const btnViewDocs = document.getElementById(btnViewDoc);
    const textarea = document.getElementById(textareaId);
    const buttons = document.getElementById(buttonsId);
    const displayText = document.getElementById('displayText' + id);
    const editIcon = document.getElementById('editIcon' + id);
    if (coloums == 2) {
        if (textarea && buttons) {
            btnUpdloads.style.display = 'none';
            btnViewDocs.style.display = 'none';
            textarea.style.display = checkbox.checked ? 'block' : 'none';
            textarea.value = '';
            buttons.style.display  = checkbox.checked ? 'block' : 'none';
            displayText.style.display = checkbox.checked ? 'block' : 'none';
            displayText.innerText = '';
            editIcon.style.display = 'none';
        }
    } else if (coloums == 3) {
        if (textarea && buttons) {
            btnUpdloads.style.display = 'none';
            btnViewDocs.style.display = 'none';
            textarea.style.display = checkbox.checked ? 'block' : 'none';
            textarea.value = '';
            buttons.style.display  = checkbox.checked ? 'block' : 'none';
            displayText.style.display = checkbox.checked ? 'block' : 'none';
            displayText.innerText = '';
            editIcon.style.display = 'none';
        }

    } else { // col1
        btnUpdloads.style.display = checkbox.checked ? '' : 'none';
        btnViewDocs.style.display = checkbox.checked ? '' : 'none';
        textarea.style.display = 'none';
        textarea.value = '';
        buttons.style.display  = 'none';
        displayText.style.display  = 'none';
        displayText.innerHTML = '';
        editIcon.style.display = 'none';

    }


}
function fnToggleTextSum(val, val2) {
    var textarea = '';
    var button = '';
    var displayText = '';
    var strInput = val
    var newVal = (val2.value == 1 ? strInput.substring(0, strInput.length - 1) + '0' : val)
    var editIcon = document.getElementById('editIconSum' + newVal);

    textarea = document.getElementById('commentSum' + newVal);
    button = document.getElementById('submitButtonSum' + newVal);
    displayText = document.getElementById('displayTextSum' + newVal);

    if (val2.value == 1) {
        textarea.style.display = 'none';
        button.style.display  = 'none';
        displayText.style.display  = 'none';
        displayText.innerHTML = '';
        editIcon.style.display = 'none';
    } else {
        textarea.style.display = 'block';
        button.style.display  = 'block';
        displayText.style.display  = 'block';
        displayText.innerHTML = '';
        editIcon.style.display = 'none';
    }
}

/* ฟังก์ชันสำหรับการยืนยันข้อความ */
function fnSubmitText(id) {
    const textarea = document.getElementById('comment_' + id);
    const button = document.getElementById('submitButton' + id);
    const displayText = document.getElementById('displayText' + id);
    const editIcon = document.getElementById('editIcon' + id);
    const tab = '&emsp;';
    let format = ''

    if (textarea.value) {
        format = textarea.value.replace(/\n/g, '<br>');
        displayText.innerHTML = tab + format

        /* ซ่อน textarea และปุ่ม */
        textarea.style.display = 'none';
        button.style.display = 'none';
        editIcon.style.display = 'inline';
        /* แสดงไอคอนแก้ไข */
        
    } else {
        Swal.fire({
            title: "",
            text: "กรุณากรอกข้อมูลให้ครบถ้วน",
            icon: "warning"
        });
    }
}

/* ฟังก์ชันสำหรับการยืนยันข้อความ */
function fnSubmitTextSum(val) {

    const textarea = document.getElementById('commentSum' + val);
    const button = document.getElementById('submitButtonSum' + val);
    const displayText = document.getElementById('displayTextSum' + val);
    const editIcon = document.getElementById('editIconSum' + val);
    const tab = '&emsp;'
    let format = ''

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
    const textarea = document.getElementById('comment_' + id);
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

function fnEditTextSum(val) {
    const textarea = document.getElementById('commentSum' + val);
    const button = document.getElementById('submitButtonSum' + val);
    const editIcon = document.getElementById('editIconSum' + val);

    /* แสดง textarea และปุ่ม */
    textarea.style.display = 'inline';
    button.style.display = 'inline';

    /* ซ่อนไอคอนแก้ไข */
    editIcon.style.display = 'none';

    /* เติมข้อความที่จะแก้ไขใน textarea */
    textarea.value = document.getElementById('displayTextSum' + val).innerText.trim();
}


function fnDrawCommentDivEvaluation(data) {
    var strHTML = ''
    strHTML += " <div class='dvEvaluation'>สรุป : การควบคุมภายใน"+data+"</div> "
    strHTML += " <div> "
    strHTML += " <textarea id='commentEvaluation' name='commentEvaluation' rows='5' cols='83'></textarea> "
    strHTML += " </div> "
    strHTML += " <div class='text-end'> "
    strHTML += " <button class='btn btn-secondary' type='submit' id='submitButtonCommentEvaluation' onclick='fnSubmitTextCommentEvaluation()' style='width: 100px;'>ยืนยัน</button> "
    strHTML += " </div> "
    strHTML += " <div class='text-start'> "
    strHTML += " <span id='displayTextCommentEvaluation' style='white-space: pre-wrap;'></span> "
    strHTML += " <i class='las la-pencil-alt' id='editIconCommentEvaluation' style='display:none; cursor:pointer; margin-left: 10px;' onclick='fnEditTextCommentEvaluation()'></i> "
    strHTML += " </div> "
    // strHTML += " <span id='spanResultEvaluation'> ทรภ.๒ มีการควบคุมภายในด้านการข่าว ที่เพียงพอและเหม่าะสม.มีการรักษาความปลอดภัยเกี่ยวกับสถานที่และการปฏิบัติการด้านการข่าว รวมทั้งข้อมูลข่าวสารลับมีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับบุคคล มีแนวทางการบริหารจัดการเพียงพอให้การปฏิบัติงานด้านการข่าว กำลังพลมีเพียงพอที่จะปฏิบัติงานด้านการข่าว มีความรู้ความชำนาญในการวิเคราะห์ข่าวและปฏิบัติตามกฎระเบียบข้อบังคับหรือมาตรการเกี่ยวกับการรักษา ความปลอดภัยโดยเคร่งครัด ทั้งนี้ ในส่วนของเครื่องมือและอุปกรณ์ที่ใช้ในงาน ด้านการข่าว พบว่า.เครื่องมือ/อุปกรณ์ในการรวบรวมข้อมูลด้านการข่าวยังมีความไม่ทันสมัยและมีประสิทธิภาพไม่เพียงพอต่อการปฏิบัติงาน. จำเป็นต้องปรับปรุงการควบคุมภายในให้ดีขึ้น โดยการจัดหาเครื่องมือ/อุปกรณ์เพิ่มเติม เพื่อให้การดำเนินการรวบรวมข้อมูลด้านการข่าวมีประสิทธิภาพเพียงพอต่อการปฏิบัติงาน</div></span> "
    
    return strHTML
}

function fnSubmitTextCommentEvaluation() {
    var textarea = document.getElementById('commentEvaluation');
    var button = document.getElementById('submitButtonCommentEvaluation');
    var displayText = document.getElementById('displayTextCommentEvaluation');
    var editIcon = document.getElementById('editIconCommentEvaluation');
    var tab = '&emsp;'
    var format = ''

    if (textarea.value) {
        format = textarea.value.replace(/\n/g, '<br>');
        displayText.innerHTML = tab + format

        /* ซ่อน textarea และปุ่ม */
        textarea.style.display = 'none';
        button.style.display = 'none'; 
        
        /* ซ่อนไอคอนแก้ไข */
        editIcon.style.display = 'inline';
    } else {
        Swal.fire({
            title: "",
            text: "กรุณากรอกข้อมูลให้ครบถ้วน",
            icon: "warning"
        });
    }

}

function fnEditTextCommentEvaluation() {
    const textarea = document.getElementById('commentEvaluation');
    const button = document.getElementById('submitButtonCommentEvaluation');
    const editIcon = document.getElementById('editIconCommentEvaluation');

    /* แสดง textarea และปุ่ม */
    textarea.style.display = 'inline';
    button.style.display = 'inline';

    /* ซ่อนไอคอนแก้ไข */
    editIcon.style.display = 'none';

    /* เติมข้อความที่จะแก้ไขใน textarea */
    textarea.value = document.getElementById('displayTextCommentEvaluation').innerText.trim();
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

function fnChangeSizeSelect(name) {
    var selectElement = document.getElementById(name);

    // กำหนดความยาวสูงสุดของ select element ให้เท่ากับ 200px
    selectElement.style.width = "466px";

    // ปรับความยาวของ option elements ให้ไม่เกิน 200px โดยใช้ JavaScript
    var options = selectElement.getElementsByTagName("option");
    for (var i = 0; i < options.length; i++) {
        if (options[i].textContent.length > 50) {
            options[i].textContent = options[i].textContent.substr(0, 50) + "..."; // ตัดข้อความให้สั้นลง
          }
    }
}

 