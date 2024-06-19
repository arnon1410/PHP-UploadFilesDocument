function fnSetHeader(dataHeader){
    var strHTML = ''
    strHTML += "<th class='text-center textHeadTable' style='width: 55%;'>คำถาม</th>"
    // strHTML += "<th class='text-center textHeadTable'>มี/ใช่</th>"
    // strHTML += "<th class='text-center textHeadTable'>ไม่มี/ไม่ใช่</th>"
    strHTML += "<th class='text-center textHeadTable' style='width: 8%;'>มี/ใช่</th>";
    strHTML += "<th class='text-center textHeadTable' style='width: 8%;'>ไม่มี/ไม่ใช่</th>";
    strHTML += "<th class='text-center textHeadTable' style='width: 29%;'>คำอธิบาย/คำตอบ</th>"

    strHTML += "<tr>";
    strHTML += "<td></td>";
    strHTML += "<td class='text-center tdUnderline'>&#10003;</td>";
    strHTML += "<td class='text-center tdUnderline'>&#10005; (NA)</td>";
    strHTML += "<td></td>";
    strHTML += "</tr>";

    return strHTML
}

function fnDrawTableForm(access,objData,engName) {
    if (access == 'admin') {
        // fnGetDataSelect()
    }
     // Get data selete before create table 
    var strHTML = ''
    var data = objData
    
    strHTML += " <div class='title'>แบบสอบถามการควบคุม</div> "
    strHTML += " <div class='subtitle'>" + objData[0].mainControl + "</div> "
    strHTML += " <div class='a4-size'> "
    strHTML += "<table id='tb_" + engName + "'>"
    strHTML += "<thead>"
    strHTML += "<tr>"
    strHTML += fnSetHeader(data) 
    strHTML += "</tr>"
    strHTML += "</thead>"
    strHTML += "<tbody>"
    // if (objData[0].mainControl == 'ด้านการยุทธการ') {
    //     strHTML += fnDrawTableReportAssessmentFix()
    // } else {
    //     strHTML += fnDrawTableReportAssessment()
    // }
    strHTML += fnDrawTableReportAssessmentOther(objData[0].mainControl)
    strHTML += "</tbody>"
    strHTML += "</table>"
    strHTML += fnDrawCommentDivEvaluation(objData[0].mainControl)
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

/*function createCheckboxAndTextArea(id) {
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

}*/

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
        strHTML += "<p class='text-left pComment' id='displayTextSum" + index + "_" + validate + "'></p>"
        strHTML += "<i class='las la-pencil-alt' id='editIconSum" + index + "_" + validate + "' style='display:none; cursor:pointer; margin-left: 10px;' onclick='fnEditTextSum(\"" + index + "_" + validate + "\")'></i>"
        strHTML += "</div>"
       
    }
    return strHTML
}

function fnDrawTableReportAssessment() {
    var strHTML = "" ;

    /* แถวที่มี Checkbox และ TextArea */
    function fnCreateCheckboxAndTextAreaRow(id_control, text, id, size) {
        return "<tr>" +
            "<td style='width: 55%;text-indent: " + size + "'>"+ (id_control ? fnConvertToThaiNumeralsAndPoint(id_control) + ' ' : '')  + text + "</td>" +
            "<td style='width: 8%;' class='text-center'> " +
            "<input type='checkbox' id='haveData_" + id + "' class='have-checkbox' name='haveData_" + id + "' onchange='fnToggleTextarea(\"btnUploadDoc" + id + "\",\"btnViewDoc" + id + "\",\"comment_" + id + "\",\"submitButton" + id + "\", this, \"1 \",\"" + id + "\")'/>" +
            "<label for='haveData_" + id + "' id='lablehaveData_" + id + "' class='hidden'>&#10003;</label> " +
            "</td>" +
            "<td style='width: 8%;' class='text-center'> " +
            "<input type='checkbox' id='nothaveData_" + id + "' class='nothave-checkbox' name='nothaveData_" + id + "' onchange='fnToggleTextarea(\"btnUploadDoc" + id + "\",\"btnViewDoc" + id + "\",\"comment_" + id + "\",\"submitButton" + id + "\", this, \"2 \",\"" + id + "\")' style='margin-right: 6px;'/>" +
            "<label for='nothaveData_" + id + "' id='lablenothaveData_" + id + "' class='hidden'>&#10005;</label> " +
            "<input type='checkbox' id='notAppData_" + id + "' class='notapp-checkbox' name='notAppData_" + id + "' onchange='fnToggleTextarea(\"btnUploadDoc" + id + "\",\"btnViewDoc" + id + "\",\"comment_" + id + "\",\"submitButton" + id + "\", this, \"3 \",\"" + id + "\")'/>" +
            "<label for='notAppData_" + id + "' id='lablenotAppData_" + id + "' class='hidden'>NA</label> " +
            "</td>" +
            "<td style='width: 29%;'>"+ fncreateTextAreaAndButton(text, id) +"</td>" +
            "</tr>";
    }

    var dataControl = [

        // -------------------------- 1 -------------------------- //
        // หัวข้อคือเทเบิ้ลหลัก 
        { id: 101, id_control: '1.',  maincontrol_id: 1 , head_id: 1, text: "การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มั่นใจว่ามีเครื่องมือ และอุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ"},
        { id: 102, id_control: '1.1', head_id: 1, text: "มีการแต่งตั้งนายทะเบียน ผู้ช่วย เจ้าหน้าที่ข้อมูลข่าวสารลับ" , is_subcontrol:0},
        { id: 103, id_control: '1.2', head_id: 1, text: "มีการกำหนดชั้นความลับตามระเบียบว่าด้วยการรักษาความลับของทางราชการ พ.ศ.๒๕๕๔" , is_subcontrol:0},
        { id: 104, id_control: '1.3', head_id: 1, text: 'การอนุญาตให้บุคลากรเข้าถึงชั้นความลับ โดยยืดหลัก "จำกัดให้ทราบเท่าที่จำเป็น"' , is_subcontrol:0},
        { id: 105, id_control: '1.4', head_id: 1 ,text: "ผู้เข้าถึงชั้นความลับ รักษาความลับโดยปฏิบัติตามระเบียบที่กำหนดไว้โดยเคร่งครัด" , is_subcontrol:0},
        { id: 106, id_control: '1.5', head_id: 1 ,text: "มีการดำเนินการเกี่ยวกับข้อมูลข่าวสารลับให้เป็นไปตามระเบียบว่าด้วยการรักษาความลับของทางราชการ พ.ศ.๒๕๔๔ ทะเบียนรับ ทะเบียนส่ง และทะเบียนควบคุมข้อมูลข่าวสารลับ" , is_subcontrol:0},
        { id: 107, id_control: '1.6', head_id: 1 ,text: "การดำเนินการเกี่ยวกับเอกสารลับมีใบปกปิดทับตามชั้นเอกสารลับ ชั้นลับ ลับมาก ลับที่สุด" , is_subcontrol:0},
        { id: 108, id_control: '1.7', head_id: 1 ,text: "การส่งเอกสารลับ ใช้ซองทึบแสง ๒ ชั้น โดยชั้นในแสดงความลับทั้งด้านหน้า - หลัง ส่วนชั้นนอกจะต้องไม่มีเครื่องหมายแสดงใดๆ ที่บ่งบอกว่าเป็นข้อมูลข่าวสารลับ" , is_subcontrol:0},
        { id: 109, id_control: '1.8', head_id: 1 ,text: "การเก็บรักษาข้อมูลข่าวสารลับเก็บไว้ในที่ปลอดภัย กรณีเก็บไว้ในเครื่องคอมพิวเตอร์มีการกำหนดรหัสผ่าน" , is_subcontrol:0},
        { id: 110, id_control: '1.9', head_id: 1 ,text: "การยืม มีการพิจารณาผู้ยืมเกี่ยวกับเรื่องนั้นหรือไม่ และเจ้าของเรื่องเดิมต้องอนุญาตก่อน และมีการทำบันทึกการยืมไว้" , is_subcontrol:0},
        { id: 111, id_control: '1.10',head_id: 1 ,text: "การทำลายข้อมูลข่าวสารลับ มีการดำเนินการตามขั้นตอนที่กำหนดตามระเบียบที่เกี่ยวข้อง " , is_subcontrol:0},
        { id: 112, id_control: '1.11',head_id: 1 ,text: "กรณีข้อมูลข่าวสารลับสูญหาย หรือรั่วไหล มีการแต่งตั้งกรรมการสอบสวน เพื่อหาสาเหตุ และกำหนดมาตรการป้องกันมิให้เกิดซ้ำ" , is_subcontrol:0},
        
        { id: 1001 , head_id: 1, sum_id: 101, value: '',  text: "การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 1002 , head_id: 1, sum_id: 102, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1003 , head_id: 1, sum_id: 103, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},
       
        // -------------------------- 2 -------------------------- //
        { id: 201, id_control: '2.',  head_id: 2, maincontrol_id: 2 , text: "การรักษาความปลอดภัยเกี่ยวกับบุคคล" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มั่นใจว่ามีเครื่องมือ และอุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับบุคคล"},
        { id: 202, id_control: '2.1', head_id: 2, text: "มีการอบรมชี้แจง ข้าราชการที่มีหน้าที่เกี่ยวข้องกับสิ่งที่เป็นความลับของทางราชการให้ทราบโดยละเอียดถึงความสำคัญและมาตรการของการรักษาความปลอดภัยเป็นครั้งคราวตามโอกาส" , is_subcontrol:0},
        { id: 203, id_control: '2.2', head_id: 2, text: "มีการลงคำสั่งเป็นลายลักษณ์อักษรแต่งตั้งบุคคลให้ทำหน้าที่เกี่ยวกับสิ่งที่เป็นความลับของทางราชการ" , is_subcontrol:0},
        
        { id: 1004 , head_id: 2, sum_id: 201, value:  '', text: "การรักษาความปลอดภัยเกี่ยวกับบุคคล" },
        { id: 1005 , head_id: 2, sum_id: 202, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1006 , head_id: 2, sum_id: 203, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},

        // -------------------------- 3 -------------------------- //
        { id: 301, id_control: '3.',   head_id: 3,  maincontrol_id: 3 ,text: "การรักษาความปลอดภัยเกี่ยวกับสถานที่" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่าเครื่องมือและอุปกรณ์ ที่มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับสถานที่"},
        { id: 302, id_control: '3.1',  head_id: 3, text: "มีการกำหนดมาตรการ เพื่อรักษาความปลอดภัยแก่อาคาร สถานที่ วัสดุ อุปกรณ์ ในอาคารสถานที่ให้พ้นจากการโจรกรรม จารกรรม และการก่อวินาศกรรม" , is_subcontrol:0},
        { id: 303, id_control: '3.2',  head_id: 3, text: "ข้าราชการมีการติดป้ายแสดงตน เพื่อแสดงว่าเป็นผู้ที่ได้รับอนุญาตให้เข้าพื้นที่ได้" , is_subcontrol:0},
        { id: 304, id_control: '3.3',  head_id: 3, text: "การป้องกันอัคคีภัย มีการแต่งตั้งข้าราชการเป็นเจ้าหน้าที่ดับเพลิงโดยแบ่งเป็น ๒ กลุ่ม คือ กลุ่มที่มีหน้าที่ดับเพลิง และกลุ่มที่มีหน้าที่ขนย้าย" , is_subcontrol:0},
        { id: 305, id_control: '3.4',  head_id: 3, text: "มีหมายเลขโทรศัพท์ของหน่วยดับเพลิงและที่จำเป็นเพื่อ ติดต่อขอความช่วยเหลือหรือแจ้งเหตุให้ทราบ" , is_subcontrol:0},
        { id: 306, id_control: '3.5',  head_id: 3, text: "ข้าราชการได้รับการอบรมชี้แจงเกี่ยวกับขั้นตอนการปฏิบัติเมื่อเกิดอัคคีภัย เส้นทางอพยพและขนย้ายและการใช้เครื่องมือ ดับเพลิงเบื้องต้น" , is_subcontrol:0},
        { id: 307, id_control: '3.6',  head_id: 3, text: "มีการจัดลำดับความสำคัญในการขนย้ายพัสดุ สิ่งของเอกสารภายในสำนักงาน และมีการปิดป้ายหมายเลขไว้" , is_subcontrol:0},

        { id: 1007 , head_id: 3, sum_id: 301, value:  '', text: "การรักษาความปลอดภัยเกี่ยวกับสถานที่" },
        { id: 1008 , head_id: 3, sum_id: 302, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1009 , head_id: 3, sum_id: 303, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},

        // -------------------------- 4 -------------------------- //
        { id: 401, id_control: '4.',  head_id: 4,  maincontrol_id: 4 ,text: "ความพร้อมในการดำเนินงานด้านการข่าว" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มั่นใจว่าการดำเนินงาน ด้านการข่าว มีแนวทางการบริหารจัดการเพียงพอให้การปฏิบัติงาน ด้านการข่าวบรรลุภารกิจของหน่วย"},
        { id: 402, id_control: '4.1', head_id: 4, text: "มีการจัดทำแผนการปฏิบัติงานด้านการข่าวของหน่วย" , is_subcontrol:1},
        { id: 101, id_control: '4.1', id_subcontrol: '4.1.1', head_id: 4, text: "ระยะสั้น" ,is_innercontrol: 0}, // เทเบิ้ล subcontrol
        { id: 102, id_control: '4.1', id_subcontrol: '4.1.2', head_id: 4, text: "ระยะปานกลาง" ,is_innercontrol: 0}, // เทเบิ้ล subcontrol
        { id: 403, id_control: '4.2', head_id: 4, text: "มีการกำหนดผู้รับผิดชอบหลัก ผู้รับผิดชอบรอง ผู้ปฏิบัติและหน่วยสนับสนุนในการปฏิบัติงานด้านการข่าว" , is_subcontrol:0},
        { id: 404, id_control: '4.3', head_id: 4, text: 'มีการจัดทำแผนรวบรวมข่าวสาร เพื่อแบ่งมอบภารกิจ/เป้าหมายในการรวบรวมข่าวอย่างชัดเจน' , is_subcontrol:0},
        { id: 405, id_control: '4.4', head_id: 4 ,text: "กำลังพลในหน่วยมีความเข้าใจหน้าที่และความรับผิดชอบในการดำเนินงานด้านการข่าวของตนเอง" , is_subcontrol:0},
        { id: 406, id_control: '4.5', head_id: 4 ,text: "มีงบประมาณที่ใช้ในการปฏิบัติงานด้านการข่าวอย่างเพียงพอ" , is_subcontrol:0},
        { id: 407, id_control: '4.6', head_id: 4 ,text: "มีการกำหนดวงรอบการรายงานข่าวสารอย่างเป็นระบบ" , is_subcontrol:0},
        { id: 408, id_control: '4.7', head_id: 4 ,text: "มีขีดความสามารถในการฝึกอบรมให้กำลังพลมีความรู้ความสามารถในการปฏิบัติงานด้านการข่าว" , is_subcontrol:0},
        { id: 409, id_control: '4.8', head_id: 4 ,text: "มีแผนการฝึกอบรมเพิ่มเติมหรือการฝึกทบทวนทั้งในระยะสั้นหรือระยะปานกลาง เพื่อพัฒนาให้กำลังพลมีความพร้อมและประสบการณ์ เพิ่มมากขึ้น" , is_subcontrol:0},
        { id: 410, id_control: '4.9', head_id: 4 ,text: "มีการสนับสนุนการฝึก ศึกษา และอบรม ทั้งจากภายในและภายนอก ทร." , is_subcontrol:0},
        { id: 411, id_control: '4.10',head_id: 4 ,text: "มีการประชุมหน่วยเกี่ยวข้องเพื่อประสานงานและแก้ไข ปัญหาที่เกิดขึ้นในการปฏิบัติงาน" , is_subcontrol:0},
        { id: 412, id_control: '4.11',head_id: 4 ,text: "กำลังพลมีความเข้าใจแผนปฏิบัติงานด้านการข่าว หรือแผนรวบรวมข่าวสาร" , is_subcontrol:0},
        { id: 413, id_control: '4.12',head_id: 4 ,text: "มีการจัดทำแผน และมาตรการ การรักษาความปลอดภัย" , is_subcontrol:1},
        { id: 101, id_control: '4.12', id_subcontrol: '4.12.1', head_id: 4, text: "ด้านสถานที่" ,is_innercontrol:1},

        { id: 101, id_control: '4.12', id_subcontrol: '4.12.1', id_innercontrol: '4.12.1.1', head_id: 4, text: "สถานที่ AAA"},
        { id: 102, id_control: '4.12', id_subcontrol: '4.12.1', id_innercontrol: '4.12.1.2', head_id: 4, text: "สถานที่ BBB"},

        { id: 102, id_control: '4.12', id_subcontrol: '4.12.2', head_id: 4, text: "ด้านเอกสาร" ,is_innercontrol: 0},
        { id: 102, id_control: '4.12', id_subcontrol: '4.12.3', head_id: 4, text: "ด้านบุคคล" ,is_innercontrol: 0},

        { id: 414, id_control: '4.13',head_id: 4 ,text: "มีการจัดทำแผนต่อต้านข่าวกรอง" , is_subcontrol:0},
        { id: 415, id_control: '4.14',head_id: 4 ,text: "มีการจัดหาแหล่งข่าว เพื่อรวบรวมข่าวสารทั้งภายในและภายนอกประเทศ" , is_subcontrol:0},
        { id: 416, id_control: '4.15',head_id: 4 ,text: "มีการจัดหาแหล่งข่าวเพิ่มเติม เพื่อให้เพียงพอต่อการรวบรวม ข้อมูลหรือข่าวสาร ตามเป้าหมายด้านการข่าวที่เพิ่มมากขึ้น" , is_subcontrol:0},
        { id: 417, id_control: '4.16',head_id: 4 ,text: "มีการกระจายข้อมูลข่าวสารหรือข่าวกรองไปยังหน่วยที่จำเป็นต้องใช้" , is_subcontrol:0},
        { id: 418, id_control: '4.17',head_id: 4 ,text: "มีการจัดเก็บข้อมูลด้านการข่าว อย่างเป็นระบบ" , is_subcontrol:0},
        
        { id: 1010 , head_id: 4, sum_id: 101, value: '',  text: "ความพร้อมในการดำเนินงานด้านการข่าว" },
        { id: 1011 , head_id: 4, sum_id: 102, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1012 , head_id: 4, sum_id: 103, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},
       
        // -------------------------- 5 -------------------------- //
        { id: 501, id_control: '5.',    head_id: 5, maincontrol_id: 5 , text: "เครื่องมือและอุปกรณ์ที่ใช้ในงานด้านการข่าว" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มั่นใจว่าเครืองมือและอุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการปฏิบัติงานด้านการข่าว"},
        { id: 502, id_control: '5.1',  head_id: 5, text: "มีการจัดหาเครื่องมือ อุปกรณ์ และยานพาหนะด้านการข่าว ที่มีความทันสมัยและประสิทธิภาพเพียงพอต่อการปฏิบัติงาน" , is_subcontrol:0},
        { id: 503, id_control: '5.2',  head_id: 5, text: "มีการลงทะเบียนครุภัณฑ์และจัดทำรายการแจกจ่ายเครื่องมือและอุปกรณ์ถูกต้องตามระเบียบ รวมทั้งมีการตรวจสอบประจำปี" , is_subcontrol:0},
        { id: 504, id_control: '5.3',  head_id: 5, text: "มีสถานที่เก็บเครื่องมือและอุปกรณ์ที่มีความปลอดภัย" , is_subcontrol:0},
        { id: 505, id_control: '5.4',  head_id: 5, text: "มีการจัดทำแผน เพื่อจัดหาและซ่อมบำรุงเครื่องมือและ อุปกรณ์ด้านการข่าว" , is_subcontrol:0},
        { id: 506, id_control: '5.5',  head_id: 5, text: "มีการดำเนินการจำหน่ายเครื่องมือและอุปกรณ์ด้านการข่าว ที่ชำรุดหรือหมดความจำเป็นในการใช้งาน" , is_subcontrol:0},
        { id: 507, id_control: '5.6',  head_id: 5, text: "มีการนำระบบเทคโนโลยีสารสนเทศมาใช้ในการปฏิบัติงาน" , is_subcontrol:0},

        { id: 1013 , head_id: 5, sum_id: 501, value:  '', text: "เครื่องมือและอุปกรณ์ที่ใช้ในงานด้านการข่าว" },
        { id: 1014 , head_id: 5, sum_id: 502, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1015 , head_id: 5, sum_id: 503, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},


        // -------------------------- 6 -------------------------- //
        { id: 601, id_control: '6.',   head_id: 6, maincontrol_id: 6 ,text: "การปฏิบัติงานด้านการข่าว" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่ากำลังพล มีเพียงพอที่จะปฏิบัติงานด้านการข่าว มีความรู้ ความชำนาญ ในการ วิเคราะห์ข่าว และปฏิบัติตามกฎ ระเบียบ ข้อบังคับหรือมาตรการเกี่ยวกับการรักษาความปลอดภัยโดยเคร่งครัดรวมทั้งมีแนวทางในการบริหารงานด้านบุคคลากรด้านการข่าว"},
        { id: 602, id_control: '6.1', head_id: 6, text: "มีการกำหนดคุณสมบัติของกำลังพลที่ปฏิบัติงานด้านการข่าว" , is_subcontrol:0},
        { id: 603, id_control: '6.2', head_id: 6, text: "ระบบการรายงานข้อมูลด้านการข่าวมีความรวดเร็ว ทันต่อเหตุการณ์ และการตัดสินใจของผู้บังคับบัญชา" , is_subcontrol:0},
        { id: 604, id_control: '6.3', head_id: 6, text: 'มีการฝึกอบรมให้เจ้าหน้าที่มีความรู้ ความชำนาญในการใช้เครื่องมือ อุปกรณ์ หรือระบบสารสนเทศด้านการข่าว' , is_subcontrol:0},
        { id: 605, id_control: '6.4', head_id: 6 ,text: "มีการฝึกอบรมเพื่อให้ความรู้ ความชำนาญและประสบการณ์ในการปฏิบัติงานด้านการข่าว โดยเฉพาะในการวิเคราะห์ข่าวสาร" , is_subcontrol:0},
        { id: 606, id_control: '6.5', head_id: 6 ,text: "มีการสรรหาหรือคัดเลือกกำลังพลที่มีขีดความสามารถและเหมาะสม เพื่อให้มาปฏิบัติงานด้านการข่าว" , is_subcontrol:0},
        { id: 607, id_control: '6.6', head_id: 6 ,text: "มีแนวทางในการบริหารบุคลากร และมีสิ่งจูงใจในการปฏิบัติงาน ให้กำลังพลด้านการข่าว" , is_subcontrol:0},
        { id: 608, id_control: '6.7', head_id: 6 ,text: "มีกำลังพลเพียงพอในการปฏิบัติงาน" , is_subcontrol:0},
        { id: 609, id_control: '6.8', head_id: 6 ,text: "มีนักวิเคราะห์ข่าวในการปฏิบัติงานด้านการข่าว" , is_subcontrol:0},
        { id: 610, id_control: '6.9', head_id: 6 ,text: "มีการตรวจสอบขีดความสามารถ และความไว้วางใจ บุคคลของกำลังพลที่ปฏิบัติงานด้านการข่าวของหน่วย" , is_subcontrol:0},
        { id: 611, id_control: '6.10',head_id: 6 ,text: "มีการประชุมหน่วยเกี่ยวข้องเพื่อประสานงานและแก้ไข ปัญหาที่เกิดขึ้นในการปฏิบัติงาน" , is_subcontrol:0},
        { id: 612, id_control: '6.11',head_id: 6 ,text: "มีการปฏิบัติตามกฎ ระเบียบ ข้อบังคับ ด้านการรักษาความปลอดภัยและด้านการข่าว" , is_subcontrol:0},
        { id: 613, id_control: '6.12',head_id: 6 ,text: "มีการกวดขันกำลังพลให้ปฏิบัติตามกฎ ระเบียบ ข้อบังคับหรือมาตรการที่เกี่ยวกับการรักษาความปลอดภัย" , is_subcontrol:0},
        { id: 614, id_control: '6.13',head_id: 6 ,text: "มีการลงโทษผู้ละเมิดกฎ ระเบียบ ข้อบังคับหรือมาตรการรักษาความปลอดภัย หรือมีมาตรการการลงโทษผู้ละเมิด ดังกล่าว", is_subcontrol:0 },
        { id: 615, id_control: '6.14',head_id: 6 ,text: "มีการปรับปรุงกฎ ระเบียบ ข้อบังคับหรือมาตรการรักษาความปลอดภัย เพื่อให้ทันกับการเปลี่ยนแปลงของสถานการณ์ในปัจจุบัน" , is_subcontrol:0},
        { id: 616, id_control: '6.15',head_id: 6 ,text: "มีแนวทางการสร้างเสริมจิตสำนึกในการปฏิบัติงานด้านการข่าวให้กับกำลังพลทั่วไปของหน่วย", is_subcontrol:0 },
        { id: 617, id_control: '6.16',head_id: 6 ,text: "มีการประเมินผลการปฏิบัติและทบทวน ปรับปรุงแก้ไขแผนรวบรวมข่าวสารให้ทันสมัย", is_subcontrol:0 },
        
        { id: 1016 , head_id: 6, sum_id: 601, value: '',  text: "การปฏิบัติงานด้านการข่าว" },
        { id: 1017 , head_id: 6, sum_id: 602, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1018 , head_id: 6, sum_id: 603, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},
       
    ];
    
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

function fnDrawTableReportAssessmentFix () {

}
function fnDrawTableReportAssessmentOther(data) { /* ด้านยุทธการ */
    var strHTML = "" ;
    var strSides = data
    // console.log(data)
    var dataControlTest = []

    /* แถวที่มี Checkbox และ TextArea */
    function fnCreateCheckboxAndTextAreaRow(id_control, text, id, size) {
        return "<tr>" +
            "<td style='width: 55%;text-indent: " + size + "'>"+ (id_control ? fnConvertToThaiNumeralsAndPoint(id_control) + ' ' : '')  + text + "</td>" +
            "<td style='width: 8%;' class='text-center'> " +
            "<input type='checkbox' id='haveData_" + id + "' class='have-checkbox' name='haveData_" + id + "' onchange='fnToggleTextarea(\"btnUploadDoc" + id + "\",\"btnViewDoc" + id + "\",\"comment_" + id + "\",\"submitButton" + id + "\", this, \"1 \",\"" + id + "\")'/>" +
            "<label for='haveData_" + id + "' id='lablehaveData_" + id + "' class='hidden'>&#10003;</label> " +
            "</td>" +
            "<td style='width: 8%;' class='text-center'> " +
            "<input type='checkbox' id='nothaveData_" + id + "' class='nothave-checkbox' name='nothaveData_" + id + "' onchange='fnToggleTextarea(\"btnUploadDoc" + id + "\",\"btnViewDoc" + id + "\",\"comment_" + id + "\",\"submitButton" + id + "\", this, \"2 \",\"" + id + "\")' style='margin-right: 6px;'/>" +
            "<label for='nothaveData_" + id + "' id='lablenothaveData_" + id + "' class='hidden'>&#10005;</label> " +
            "<input type='checkbox' id='notAppData_" + id + "' class='notapp-checkbox' name='notAppData_" + id + "' onchange='fnToggleTextarea(\"btnUploadDoc" + id + "\",\"btnViewDoc" + id + "\",\"comment_" + id + "\",\"submitButton" + id + "\", this, \"3 \",\"" + id + "\")'/>" +
            "<label for='notAppData_" + id + "' id='lablenotAppData_" + id + "' class='hidden'>NA</label> " +
            "</td>" +
            "<td style='width: 29%;'>"+ fncreateTextAreaAndButton(text, id) +"</td>" +
            "</tr>";
    }

    
    var dataControl = [
        // -------------------------- 1.1 -------------------------- //
        // หัวข้อคือเทเบิ้ลหลัก 
        { id: 101, id_control: '1.1',   head_id: 1.1, maincontrol_id: 1, text: "การจัดทำยุทธศาสตร์และนโยบายวัตถุประสงค์ของการควบคุม" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่ายุทธศาสตร์ และนโยบายมีความเหมาะสมกับสภาวการณ์และได้รับการนำไปใช้อย่างถูกต้อง"},
        { id: 102, id_control: '1.1.1', head_id: 1.1, text: "มีระเบียบวิธีในการจัดทำยุทธศาสตร์และนโยบายที่เหมาะสมและมีความน่าเชื่อถือ" , is_subcontrol:0},
        { id: 103, id_control: '1.1.2', head_id: 1.1, text: "มีระบบรวบรวมข้อมูลและประเมินปัจจัยต่าง ๆ (สถานการณ์ สภาพแวดล้อม ข่าวกรอง ขีดความสามารถกำลังรบ ฯลฯ) ที่เกี่ยวข้องกับการวางแผนที่ถูกต้องและรวดเร็ว" , is_subcontrol:0},
        { id: 104, id_control: '1.1.3', head_id: 1.1, text: 'มีการดำเนินการเพื่อถ่ายทอดยุทธศาสตร์และนโยบายของ ทร.ให้หน่วยต่าง ๆ รับทราบและนำไปเป็นแนวทางการปฏิบัติงานได้ อย่างถูกต้อง"' , is_subcontrol:0},
        { id: 105, id_control: '1.1.4', head_id: 1.1,text: "มีการประเมินผลการปฏิบัติตามยุทธศาสตร์และนโยบายของ ทร.และระเบียบวิธีในการจัดทำฯ" , is_subcontrol:0},
        
        { id: 1001 , head_id: 1.1, sum_id: 101, value: '',  text: "การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 1002 , head_id: 1.1, sum_id: 102, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1003 , head_id: 1.1, sum_id: 103, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},
       
        // -------------------------- 1.2 -------------------------- //
        { id: 201, id_control: '1.2',   head_id: 1.2, maincontrol_id: 2 , text: "การจัดทำ/ทบทวนแผนป้องกันประเทศและแผนป้องกันชายแดนวัตถุประสงค์ของการควบคุม" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มั่นใจว่าแผนป้องกันประเทศและแผนป้องกันชายแดน มีคาวมเหมาะสมกับสภาวการณ์ มีการทบทวนแผนตามขั้นตอนและห้วงเวลาที่เหมาะสม และหน่วยรองมีความเข้าใจและสามารถนำไปจัดทำแผนรองรับได้อย่างถูกต้อง"},
        { id: 202, id_control: '1.2.1', head_id: 1.2, text: "มีกระบวนการในการจัดทำแผนฯ ที่เหมาะสม ถูกต้องและมีความน่าเชื่อถือ" , is_subcontrol:0},
        { id: 203, id_control: '1.2.2', head_id: 1.2, text: "มีกระบวนการ/ขั้นตอนการรวบรวมข้อมูลและประเมินสภาวะแวดล้อมรวมทั้งปัจจัยต่างๆ ที่เกี่ยวข้องกับการวางแผนในขั้นตอนต่าง ๆ ที่ถูกต้องและรวดเร็ว" , is_subcontrol:0},
        { id: 204, id_control: '1.2.3', head_id: 1.2, text: "มีกระบวนการถ่ายทอดแนวทางการใช้กำลังทางเรือตามแผนป้องกันประเทศระดับ ทร. ไปสู่หน่วยเหนือและหน่วยรอง หรือ นขต.ทร.เพื่อเป็นกรอบในการวางแผนได้ถูกต้องตามระดับของแผนฯ" , is_subcontrol:0},
        { id: 205, id_control: '1.2.4', head_id: 1.2 ,text: "มีการประเมินผลการปฏิบัติและการทบทวนปรับปรุง/แก้ไข ตามแผนป้องกันประเทศและแผนป้องกันชายแดน ตามห้วงเวลาที่เหมาะสม" , is_subcontrol:0},

        { id: 1004 , head_id: 1.2, sum_id: 201, value:  '', text: "การจัดทำ/ทบทวนแผนป้องกันประเทศและแผนป้องกันชายแดนวัตถุประสงค์ของการควบคุม" },
        { id: 1005 , head_id: 1.2, sum_id: 202, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1006 , head_id: 1.2, sum_id: 203, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},
        
        // -------------------------- 1.3 -------------------------- //
        { id: 301, id_control: '1.3' ,  head_id: 1.3, maincontrol_id: 3 , text: "ระดับความพร้อมรบของ ทร." , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่าระดับความพร้อมรบของ ทร.มีความเหมาะสม กับสภาวการณ์ตลอดจนความเป็นไปได้ในด้านงบประมาณ มีการทบทวนระดับความพร้อมรบตามขั้นตอนและห้วงเวลาที่เหมาะสม ได้รับการนำไปใช้อย่างถูกต้องและหน่วยเตรียมกำลังสามารถจัดส่งกำลังให้หน่วยใช้กำลังตรงตามระดับความพร้อมรบที่กำหนด"},
        { id: 302, id_control: '1.3.1', head_id: 1.3, text: "มีกระบวนการในการจัดทำความพร้อมรบของ ทร.ที่เหมาะสม น่าเชื่อถือ โดยสอดคล้องตามยุทธศาสตร์ ทร." , is_subcontrol:0},
        { id: 303, id_control: '1.3.2', head_id: 1.3, text: "จำนวน ประเภท กำลังรบในแต่ละระดับความพร้อมรบ มีความสอดคล้องกับการประเมินสภาวะแวดล้อมและการปฏิบัติภารกิจของหน่วย" , is_subcontrol:0},
        { id: 304, id_control: '1.3.3', head_id: 1.3, text: "มีเป้าหมายให้หน่วยต่างๆในการเตรียมกำลังและระดมความพร้อมรบในขั้นต่ำสุดไว้อย่างชัดเจน" , is_subcontrol:0},
        { id: 305, id_control: '1.3.4', head_id: 1.3 ,text: "มีการประเมินผลการดำเนินการตามระดับความพร้อมรบของ ทร." , is_subcontrol:0},

        { id: 1007 , head_id: 1.3, sum_id: 301, value:  '', text: "ระดับความพร้อมรบของ ทร." },
        { id: 1008 , head_id: 1.3, sum_id: 302, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1009 , head_id: 1.3, sum_id: 303, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},    

        // -------------------------- 1.4 -------------------------- //
        { id: 401, id_control: '1.4',   head_id: 1.4, maincontrol_id: 4 , text: "แผนการเสริมสร้างกำลังกองทัพ" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่าแผนการเสริมสร้างกำลังกองทัพ มีความเหมาะสมกับสภาวการณ์สอดคล้องกับยุทธศาสตร์กองทัพเรือและ จัดลำดับความเร่งด่วนของการเสริมสร้างกำลังกองทัพได้อย่างเหมาะสมตลอดจนมีการทบทวนแผนตามขั้นตอนและห้วงเวลาที่เหมาะสม และนำไปใช้ในการจัดทำโครงการเสริมสร้างกำลังกองทัพประจำ ปีงบประมาณได้อย่างถูกต้อง สามารถชี้แจงเหตุผลความจำเป็นได้ในทุกขั้นตอนของการเสนอขอรับการจัดสรรงบประมาณ"},
        { id: 402, id_control: '1.4.1', head_id: 1.4, text: "มีกระบวนการในการจัดหาแผนการเสริมสร้างกำลังกองทัพที่เหมาะสม ถูกต้อง และสอดคล้องกับยุทธศาสตร์และนโยบายของ ทร.และหน่วยเหนือ" , is_subcontrol:0},
        { id: 403, id_control: '1.4.2', head_id: 1.4, text: "มีกระบวนการจัดทำโครงการเสริมสร้างกำลังกองทัพ รวมทั้งการลำดับความสำคัญเร่งด่วนที่เหมาะสม ถูกต้อง ตามขั้นตอน และสอดคล้องตามความต้องการทางยุทธการและยุทธศาสตร์ของ ทร." , is_subcontrol:0},
        { id: 404, id_control: '1.4.3', head_id: 1.4, text: "มีการทบทวนแผนการเสริมสร้างกำลังกองทัพ ตามห้วงเวลา ที่เหมาะสม" , is_subcontrol:0},

        { id: 1010 , head_id: 1.4, sum_id: 401, value:  '', text: "แผนการเสริมสร้างกำลังกองทัพ" },
        { id: 1011 , head_id: 1.4, sum_id: 402, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1012 , head_id: 1.4, sum_id: 403, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"}, 
        
        // -------------------------- 1.5 -------------------------- //
        { id: 501, id_control: '1.5',   head_id: 1.5, maincontrol_id: 5 , text: "การฝึกด้านยุทธการ วัตถุประสงค์ของการควบคุม" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่าการฝึกมีความสอดคล้องกับการปฏิบัติงานตามพันธกิจของ ทร.และการดำเนินการฝึก มีประสิทธิภาพ"},
        { id: 502, id_control: '1.5.1', head_id: 1.5, text: "แผนการฝึกของหน่วยตอบสนองต่อวัตถุประสงค์ของ ทร. ในบทบาทต่างๆ ตามยุทธศาสตร์และนโยบายของ ทร." , is_subcontrol:0},
        { id: 503, id_control: '1.5.2', head_id: 1.5, text: "วัตถุประสงค์และหัวข้อของการฝึกสอดคล้องกับ การฝึกของ ทร.และภารกิจของหน่วย ตลอดจนหลักนิยมของสาขา การปฏิบัติการต่างๆ ที่เกี่ยวข้อง" , is_subcontrol:0},
        { id: 504, id_control: '1.5.3', head_id: 1.5, text: "มีการกำหนดโครงสร้างและความรับผิดชอบของ กองอำนวยการฝึก และหน่วยฝึก" , is_subcontrol:0},
        { id: 505, id_control: '1.5.4', head_id: 1.5, text: "มีการควบคุม กำกับดูแล การดำเนินการฝึกให้เป็นไปตามขั้นตอนและแผนการฝึกที่กำหนดไว้" , is_subcontrol:0},
        { id: 506, id_control: '1.5.5', head_id: 1.5, text: "มีการประเมินผลการฝึกอย่างเที่ยงธรรมและเชื่อถือได้" , is_subcontrol:0},
        { id: 507, id_control: '1.5.6', head_id: 1.5, text: "มีการนำบทเรียนที่ได้รับมาปรับปรุงพัฒนาและใช้เป็นข้อมูลวางแผนการฝึกครั้งต่อไป" , is_subcontrol:0},

        { id: 1013 , head_id: 1.5, sum_id: 501, value:  '', text: "การฝึกด้านยุทธการ วัตถุประสงค์ของการควบคุม" },
        { id: 1014 , head_id: 1.5, sum_id: 502, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1015 , head_id: 1.5, sum_id: 503, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},

        // -------------------------- 1.6 -------------------------- //
        { id: 601, id_control: '1.6',   head_id: 1.6, maincontrol_id: 6 , text: "ความพร้อมรบด้านองค์ยุทธวิธี" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่าหน่วยงานใช้แนวทางตามหลักนิยม/หลัก ยุทธวิธี/เอกสาร/คู่มือ ฯลฯ ที่ ทร.ได้ให้ความเห็นชอบไว้ เป็นแนวทางในการปฏิบัติงาน และปรับปรุง/พัฒนาหลักนิยมและแนวทางการปฏิบัติทางยุทธวิธีที่หน่วยรับผิดชอบให้เหมาะสมและทันสมัย"},
        { id: 602, id_control: '1.6.1', head_id: 1.6, text: "หน่วยมีเอกสารหลักนิยมและแนวทางการปฏิบัติ ทางยุทธวิธีที่เกี่ยวข้องกับการปฏิบัติของหน่วยครบถ้วน" , is_subcontrol:0},
        { id: 603, id_control: '1.6.2', head_id: 1.6, text: "มีระเบียบวิธีในการกำหนดหรือแก้ไขปรับปรุงหลักนิยม และแนวทางการปฏิบัติทางยุทธวิธีที่หน่วยรับผิดชอบ" , is_subcontrol:0},

        { id: 1016 , head_id: 1.6, sum_id: 601, value:  '', text: "ความพร้อมรบด้านองค์ยุทธวิธี" },
        { id: 1017 , head_id: 1.6, sum_id: 602, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1018 , head_id: 1.6, sum_id: 603, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},

        // -------------------------- 1.7 -------------------------- //
        { id: 701, id_control: '1.7',   head_id: 1.7, maincontrol_id: 7 , text: "ความพร้อมรบด้านองค์วัตถุ" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่ายุทโธปกรณ์มีความพร้อมใช้งานได้อย่างเต็มประสิทธิภาพ สอดคล้องกับระดับความพร้อมรบที่กำหนด"},
        { id: 702, id_control: '1.7.1', head_id: 1.7, text: "มีการกำหนดวงรอบการตรวจสอบและรายงานความพร้อมใช้งานอย่างน้อยปีละ ๑ ครั้ง และทุกครั้งก่อนนำมาใช้งาน" , is_subcontrol:0},
        { id: 703, id_control: '1.7.2', head_id: 1.7, text: "มีระเบียบวิธีการปฏิบัติเพื่อประเมินความพอเพียงและประสิทธิภาพของ วงรอบการตรวจสอบความพร้อมใช้งาน และระบบรายงานสถานภาพความพร้อมฯ" , is_subcontrol:0},
        { id: 704, id_control: '1.7.3', head_id: 1.7, text: "มีระเบียบวิธีในการจัดทำแผนดำรงความพร้อมรบของยุทโธปกรณ์ ตามแผนยุทธศาสตร์และโครงการเสริมสร้างกำลังรบ" , is_subcontrol:0},

        { id: 1019 , head_id: 1.7, sum_id: 701, value:  '', text: "ความพร้อมรบด้านองค์วัตถุ" },
        { id: 1020 , head_id: 1.7, sum_id: 702, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1021 , head_id: 1.7, sum_id: 703, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},

        // -------------------------- 1.8 -------------------------- //
        { id: 801, id_control: '1.8',   head_id: 1.8, maincontrol_id: 8 , text: "ความพร้อมรบด้านการควบคุมบังคับบัญชาและสั่งการ" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่า ระยยการควบคุมบังคับบัญชาและสั่งการมีความพร้อมใช้งานและเชื่อถือได้"},
        { id: 802, id_control: '1.8.1', head_id: 1.8, text: "มีระเบียบปฏิบัติประจำในการควบคุมบังคับบัญชาและสั่งการอย่างเป็นระบบ" , is_subcontrol:0},
        { id: 803, id_control: '1.8.2', head_id: 1.8, text: "มีฐานข้อมูลและวิธีการติดต่อสื่อสาร กับหน่วยงาน/บุคคลที่เกี่ยวข้อง และพร้อมนำมาใช้ได้ตลอดเวลา" , is_subcontrol:0},
        { id: 804, id_control: '1.8.3', head_id: 1.8, text: "มีระเบียบปฏิบัติประจำในการทดสอบระบบควบคุมบังคับบัญชาและสั่งการตามวงรอบที่เหมาะสม" , is_subcontrol:0},
        { id: 805, id_control: '1.8.4', head_id: 1.8 ,text: "มีระบบสำรองในการควบคุมบังคับบัญชาและสั่งการ และต้องมีมีระเบียบปฏิบัติประจำในการทดสอบระบบสำรองตามวงรอบที่เหมาะสม" , is_subcontrol:0},

        { id: 1022 , head_id: 1.8, sum_id: 801, value:  '', text: "ความพร้อมรบด้านการควบคุมบังคับบัญชาและสั่งการ" },
        { id: 1023 , head_id: 1.8, sum_id: 802, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1024 , head_id: 1.8, sum_id: 803, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},    

        // -------------------------- 2.1 -------------------------- //
        { id: 901, id_control: '2.1',   head_id: 2.1, maincontrol_id: 9 , text: "การพิทักษ์รักษาและเทิดทูนสถาบันพระมหากษัตริย์" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่าการถวายความปลอดภัยฯ มีความสำคัญสูงสุดและหน่วยงานมีกิจกรรม ที่แสดงถึงการรักษาและเทิดทูนสถาบันพระมหากษัตริย์"},
        { id: 902, id_control: '2.1.1', head_id: 2.1, text: "มีแผนและแนวทางในการถวายความปลอดภัยแด่บุคคลสำคัญในสถาบันพระมหากษัตริย์" , is_subcontrol:0},
        { id: 903, id_control: '2.1.2', head_id: 2.1, text: "มีขั้นตอนการทดสอบความเข้าใจและซักซ้อมการปฏิบัติของเจ้าหน้าที่" , is_subcontrol:0},
        { id: 904, id_control: '2.1.3', head_id: 2.1, text: "ทุกระดับเกี่ยวกับระบบการทำงานของหน่วยงานภาครัฐที่มีหน้าที่เกี่ยวข้องกับการถวายความปลอดภัย" , is_subcontrol:0},
        { id: 905, id_control: '2.1.4', head_id: 2.1 ,text: "มีการจัดแสดงหรือจัดกิจกรรม เพื่อจัดถวายสักการะและเทิดพระเกียรติ แด่พระบาทสมเด็จพระเจ้าอยู่หัวฯ และสมเด็จพระนางเจ้าฯ พระบรมราชินีนาถ และพระบรมวงศานุวงศ์ชั้นสูงทุกวันครบรอบเฉลิมพระชนมพรรษา และในวโรกาสที่สำคัญ" , is_subcontrol:0},

        { id: 1025 , head_id:  2.1, sum_id: 901, value:  '', text: "การพิทักษ์รักษาและเทิดทูนสถาบันพระมหากษัตริย์" },
        { id: 1026 , head_id:  2.1, sum_id: 902, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1027 , head_id:  2.1, sum_id: 903, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},

        // -------------------------- 2.2 -------------------------- //
        { id: 1001, id_control: '2.2',   head_id: 2.2, maincontrol_id: 10 , text: "การป้องกันประเทศ" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่าหน่วยงานมีความพร้อมในการป้องกันประเทศตามแผนของหน่วยเหนือ"},
        { id: 1002, id_control: '2.2.1', head_id: 2.2, text: "มีแผนป้องกันประเทศและแผนยุทธการที่สอดคล้องกับแผนของหน่วยเหนือ รวมทั้งยุทธศาสตร์และนโยบายของ ทร." , is_subcontrol:0},
        { id: 1003, id_control: '2.2.2', head_id: 2.2, text: "มีขั้นตอน มีระเบียบปฏิบัติ ในการปรับปรุงแผนป้องกันประเทศ และแผนยุทธการ" , is_subcontrol:0},
        { id: 1004, id_control: '2.2.3', head_id: 2.2, text: "มีการกำหนดกฎการใช้กำลังให้กับหน่วยปฏิบัติ" , is_subcontrol:0},
        { id: 1005, id_control: '2.2.4', head_id: 2.2 ,text: "มีระบบทดสอบความพร้อมในการใช้กำลัง" , is_subcontrol:0},

        { id: 1028 , head_id:  2.2, sum_id: 1001, value:  '', text: "การป้องกันประเทศ" },
        { id: 1029 , head_id:  2.2, sum_id: 1002, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1030 , head_id:  2.2, sum_id: 1003, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},

        // -------------------------- 2.3 -------------------------- //
        { id: 1031, id_control: '2.3',   head_id: 2.3, maincontrol_id: 10 , text: "การรักษาความมั่นคงของรัฐ" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่าการปฏิบัติในการรักษาความม่ันคงของรัฐมีความสอดคล้องกับแผนที่กำหนดขึ้น และมีประสิทธิภาพ"},
        { id: 1032, id_control: '2.3.1', head_id: 2.3, text: "มีแผนการปฏิบัติในการรักษาความมั่นคงของรัฐ" , is_subcontrol:0},
        { id: 1033, id_control: '2.3.2', head_id: 2.3, text: "มีระเบียบวิธี และแนวทางในการปฏิบัติ เพื่อให้ความรู้แก่เจ้าหน้าที่เกี่ยวกับกฎหมายที่มอบอำนาจให้เจ้าหน้าที่ทหารเรือ และภัยคุกคามต่อความมั่นคงของชาติในรูปแบบใหม่ เช่น การค้ายาเสพติด การค้ามนุษย์ การก่อการร้าย การก่อความไม่สงบเพื่อผลทางการเมือง การปราบปรามผู้ลักลอบตัดไม้ทำลายป่า การปราบปรามผู้หลบหนีเข้าเมือง ฯลฯ" , is_subcontrol:0},
        { id: 1034, id_control: '2.3.3', head_id: 2.3, text: "มีขั้นตอนการตรวจสอบเพื่อให้การปฏิบัติมีความสอดคล้อง กับยุทธศาสตร์และนโยบาย ทร." , is_subcontrol:0},
        { id: 1035, id_control: '2.3.4', head_id: 2.3 ,text: "มีการควบคุมกำกับการดำเนินการ และการตรวจสอบการปฏิบัติ รวมทั้งการรายงานผลการปฏิบัติ" , is_subcontrol:0},
        { id: 1036, id_control: '2.3.5', head_id: 2.3 ,text: "มีการนำผลการปฏิบัติมาปรับปรุงแผนการรักษาความมั่นคงของรัฐ ที่หน่วยต้องจัดทำขึ้น" , is_subcontrol:0},

        { id: 1028 , head_id:  2.3, sum_id: 1101, value:  '', text: "การรักษาความมั่นคงของรัฐ" },
        { id: 1029 , head_id:  2.3, sum_id: 1102, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1030 , head_id:  2.3, sum_id: 1103, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"}, 

        // -------------------------- 2.4 -------------------------- //
        { id: 1037, id_control: '2.4',   head_id: 2.4, maincontrol_id: 10 , text: "การสนับสนุนรัฐบาลในการพัฒนาประเทศ" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่าหน่วยงานสามารถสนับสนุนรัฐบาลในการ พัฒนาประเทศได้ และเป็นไปตามแนวทางที่ ทร.เห็นชอบ รวมทั้งยอมรับผลกระทบจากการดำเนินการนั้นได้"},
        { id: 1038, id_control: '2.4.1', head_id: 2.4, text: "มีแนวทางการดำเนินงานตามนโยบายรัฐบาล" , is_subcontrol:0},
        { id: 1039, id_control: '2.4.2', head_id: 2.4, text: "มีขั้นตอนการตรวจสอบความสอดคล้องกับยุทธศาสตร์และนโยบาย ทร." , is_subcontrol:0},
        { id: 1040, id_control: '2.4.3', head_id: 2.4, text: "มีแนวทางในการควบคุมกำกับการดำเนินการ และการตรวจสอบการปฏิบัติ รวมทั้งการรายงานผลการปฏิบัติ" , is_subcontrol:0},
        { id: 1041, id_control: '2.4.4', head_id: 2.4 ,text: "มีขั้นตอนการประเมินความเสี่ยง เพื่อให้ความพร้อมรบที่อาจลดลงเนื่องจากการปฏิบัติภารกิจนี้ อยู่ในระดับที่ยอมรับได้" , is_subcontrol:0},

        { id: 1031 , head_id:  2.4, sum_id: 1101, value:  '', text: "การสนับสนุนรัฐบาลในการพัฒนาประเทศ" },
        { id: 1032 , head_id:  2.4, sum_id: 1102, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1033 , head_id:  2.4, sum_id: 1103, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},

        // -------------------------- 2.5 -------------------------- //
        { id: 1042, id_control: '2.5',   head_id: 2.5, maincontrol_id: 10 , text: "การเสริมสร้างความร่วมมือด้านความมั่นคงกับประเทศเพื่อนบ้านและมิตรประเทศ" , main_Obj:"วัตถุประสงค์ของการควบคุม" , Object_name: "เพื่อให้มีความมั่นใจว่าหน่วยงานได้กำหนดขั้นตอนการปฏิบัติเกี่ยวกับการเสริมสร้างความร่วมมือด้านความมั่นคงกับประเทศเพื่อนบ้านและมิตรประเทศไว้อย่างเหมาะสม ทั้งในภาวะปกติและภาวะฉุกเฉิน"},
        { id: 1043, id_control: '2.5.1', head_id: 2.5, text: "มีการกำหนดนโยบายหรือแนวทางการปฏิบัติ เกี่ยวกับข้อตกลงตามความร่วมมือฯ" , is_subcontrol:0},
        { id: 1044, id_control: '2.5.2', head_id: 2.5, text: "มีแผนหรือระเบียบปฏิบัติประจำที่เกี่ยวข้องการดำเนินการตามความร่วมมือฯ" , is_subcontrol:0},
        { id: 1045, id_control: '2.5.3', head_id: 2.5, text: "มีระบบการดำเนินการตามความร่วมมือ ที่เหมาะสม ทั้งในภาวะปกติและภาวะฉุกเฉิน" , is_subcontrol:0},
        { id: 1046, id_control: '2.5.4', head_id: 2.5 ,text: "มีระเบียบวิธี เพื่อการทบทวน ปรับปรุง แก้ไข ข้อตกลง และระเบียบปฏิบัติประจำที่เกี่ยวข้อง" , is_subcontrol:0},

        { id: 1034 , head_id:  2.5, sum_id: 1201, value:  '', text: "การเสริมสร้างความร่วมมือด้านความมั่นคงกับประเทศเพื่อนบ้านและมิตรประเทศ" },
        { id: 1035 , head_id:  2.5, sum_id: 1202, value: '1', text: "มีการควบคุมเพียงพอ"},
        { id: 1036 , head_id:  2.5, sum_id: 1203, value: '0', text: "กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้"},
        
    ]; 
    
    if (dataControl.length > 0) {
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
    } else {
        strHTML += " <div id='dvSidesOther'>"
        strHTML += "    <tr><td class='tdSidesOther' style='width: 55%;font-weight: bold;'>"
        strHTML += "    <div> "+ fnConvertToThaiNumeralsAndPoint('3') +". อื่น ๆ "
        strHTML += "    <button id='btn_SidesOther' type='button' class='btn btn-success btn-sm'; onclick='fnGetModalSidesOther(\"" + strSides + "\")' style='margin-left : 5px;'>"
        strHTML += "    <i class='las la-plus mr-1' aria-hidden=;'true' style='margin-right:5px'></i><span>เพื่มความเสี่ยงอื่นที่พบ</span>"
        strHTML += "    </button>"
        strHTML += "  <div id='dvSidesOther'>"
        strHTML += "    <div>............................................................................................</div>"
        strHTML += "    <div>............................................................................................</div>"
        strHTML += "    </td>"
        strHTML += "    <td class='tdSidesOther'></td><td class='tdSidesOther'></td><td class='tdSidesOther'></td></tr>";
        strHTML += "  </div> "
        strHTML += " </div> "

    }

    return strHTML;
    // แทรกโค้ดเข้าไปใน #dvTableReportAssessment
    // $("#dvTableReportAssessment")[0].innerHTML = strHTML;
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
            <p class='text-left pComment' id='displayText${id}'></p>
            <i class='las la-pencil-alt' id='editIcon${id}' style='display:none; cursor:pointer; margin-left: 10px;' onclick='fnEditText(${id})'></i>
        </div>
        <div id='dvUploadDoc${id}' class="text-center align-middle">
            <button id='btnUploadDoc${id}' type='button' class='btn btn-primary btn-sm'; onclick='fnUploadDocConfig("${text}", "${id}")' style='display:none;margin-right: 5px;' data-bs-toggle='modal' data-bs-target='#relateDocumentModal'>
            <i class='las la-upload mr-1' aria-hidden=;'true' style='margin-left:5px'></i><span>อัปโหลด<span>
            </button>
            <button id='btnViewDoc${id}' type='button' class='btn btn-success btn-sm'; onclick='fnViewDocConfig("${text}", "${id}")' style='display:none;'>
            <i class='las la-file-pdf mr-1' aria-hidden=;'true' style='margin-left:5px'></i><span>ดูเอกสาร<span>
            </button>
        </div>
    `;
}

function fnUploadDocConfig (text, id) {
    var strtext = text
    fnGetDataModal(strtext, id);
}

function fnViewDocConfig (text, id) {
    var strCheckedValue = 0 // id

    if (strCheckedValue == 1){
        //export file 
    } else {
        Swal.fire({
            title: "",
            html: "ไม่มีเอกสารที่แนบมาในกิจกรรมนี้",
            icon: "warning"
        });
    }
}

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

    if (textarea.value) {
        displayText.innerHTML = tab + textarea.value;

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

    if (textarea.value) {
        displayText.innerHTML = tab + textarea.value;

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


function fnDrawCommentDivEvaluation(side) {
    var strHTML = ''
    strHTML += " <div class='dvEvaluation'>สรุป : การควบคุมภายใน"+side+"</div> "
    strHTML += " <div> "
    strHTML += " <textarea id='commentEvaluation' name='commentEvaluation' rows='5' cols='83'></textarea> "
    strHTML += " </div> "
    strHTML += " <div class='text-end'> "
    strHTML += " <button class='btn btn-secondary' type='submit' id='submitButtonCommentEvaluation' onclick='fnSubmitTextCommentEvaluation()' style='width: 100px;'>ยืนยัน</button> "
    strHTML += " </div> "
    strHTML += " <div class='text-start'> "
    strHTML += " <span id='displayTextCommentEvaluation'></span> "
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

    if (textarea.value) {
        displayText.innerHTML = tab + textarea.value;

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