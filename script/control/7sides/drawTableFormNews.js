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
    strHTML += fnDrawTableReportAssessment()
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
    strHTML = "<div>"

    strHTML = "</div>"
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

function fnDrawTableReportAssessment() { /* ด้านการข่าว */
    var strHTML = "" ;

    /* แถวที่มี Checkbox และ TextArea */
    function createCheckboxAndTextAreaRow(id_control, text, id) {
        return "<tr>" +
            "<td style='width: 55%;text-indent: 17px;'>"+ (id_control ? fnConvertToThaiNumeralsAndPoint(id_control) + ' ' : '')  + text + "</td>" +
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

    var textAndIds = [

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
        { id: 101, id_control: '4.1', id_subcontrol: '4.1.1', head_id: 4, text: "ระยะสั้น"}, // เทเบิ้ล subcontrol
        { id: 102, id_control: '4.1', id_subcontrol: '4.1.2', head_id: 4, text: "ระยะปานกลาง" }, // เทเบิ้ล subcontrol
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
        { id: 101, id_control: '4.12', id_subcontrol: '4.12.1', head_id: 4, text: "ด้านสถานที่" },
        { id: 102, id_control: '4.12', id_subcontrol: '4.12.2', head_id: 4, text: "ด้านเอกสาร" },
        { id: 102, id_control: '4.12', id_subcontrol: '4.12.3', head_id: 4, text: "ด้านบุคคล" },
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
    
    for (var i = 0; i < textAndIds.length; i++) {
        var item = textAndIds[i];
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
            if (item.is_subcontrol == 1) { // ถ้ามีหัวข้อย่อย 
                // console.log(item.text)
                // strHTML += "<tr><td style='width: 55%;text-indent: 17px;'>"+ fnConvertToThaiNumeralsAndPoint(item.id_subcontrol) + ' ' + item.text + "</td><td></td><td></td><td></td></tr>";
            } else { // ไม่มีหัวข้อย่อย
                
                // strHTML += createCheckboxAndTextAreaRow(item.id_control, item.text, item.id);
                if(item.is_subcontrol) {
                    strHTML += createCheckboxAndTextAreaRow(item.id_control, item.text, item.id);
                } else {
                    strHTML += createCheckboxAndTextAreaRow(item.id_control, item.text, item.id);
                }
            }
        }
    }

    for (var i = 0; i < textAndIds.length; i++) {
        var item = textAndIds[i];

        var strSumDetail = ''
        // if (typeof item.text === 'string' && ["101", "102","108", "109", "110", "201", "202","208", "209", "210", "301", "302", "309", "310", "311", "401", "402","425" ,"426" ,"427", "501", "502" ,"509", "510", "511", "601", "602", "619", "620","621"].includes(item.id)) {
        // if (typeof item.text === 'string' && [101,102,103, 115, 116, 117, 201, 202, 203, 206,207, 208, 209, 301, 302, 303, 310, 311, 312, 401, 402, 403 ,426 , 427, 428, 501, 502 , 503, 510, 511, 512, 601, 602, 603,620,621,622].includes(item.id)) {
        // if (typeof item.text === 'string' && [101, 115, 116, 117, 201, 202, 203, 206,207, 208, 209, 301, 302, 303, 310, 311, 312, 401, 402, 403 ,426 , 427, 428, 501, 502 , 503, 510, 511, 512, 601, 602, 603,620,621,622].includes(item.id)) {
        // if (typeof item.text === 'string' && [101, 115, 116, 117, 201, 206,207, 208, 209, 301, 310, 311, 312, 401, 402, 403 ,426 , 427, 428, 501, 502 , 503, 510, 511, 512, 601, 602, 603,620,621,622].includes(item.id)) {   
        // if (typeof item.text === 'string' && [101,].includes(item.id)) {
        // if (typeof item.text === 'string'){
            // if (item.sum_id && item.value) { // ส่วนสรุป
            //     strSumDetail = fnMapValueToCallFunction(item)
            //     strHTML += "<tr><td style='width: 55%;'>" + strSumDetail.text + "</td><td></td><td></td><td></td></tr>"
            // } else { // ส่วนอื่น ๆ วัตถุประสงค์ 
            //     if (item.sum_id) { // ตรงส่วนสรุปแต่ละคำถาม
            //         strHTML += "<tr><td style='width: 55%;'><u>สรุป</u> : " + item.text + "</td><td></td><td></td><td></td></tr>";

            //     } else { // หัวข้ออื่น ๆ 
                    
            //         if (item.is_subcontrol == 1) { // หัวข้อหลัก
            //            console.log(item.text)
            //             strHTML += "<tr><td style='width: 55%;'>"+ fnConvertToThaiNumeralsAndPoint(item.id_control) + ' ' + item.text + "</td><td></td><td></td><td></td></tr>";
            //         } else { // หัวข้อย่อย
            //             strHTML += "<tr><td style='width: 55%;text-indent: 17px;'>"+ fnConvertToThaiNumeralsAndPoint(item.id_control) + ' ' + item.text + "</td><td></td><td></td><td></td></tr>";
            //         }
            //     }
            //     if (item.main_Obj) {
            //         strHTML += "<tr><td style='width: 55%;text-indent: 17px;'>" + item.main_Obj + "</td><td></td><td></td><td></td></tr>";
            //     }
            //     if (item.Object_name) {
            //         strHTML += "<tr><td style='width: 55%;text-indent: 17px;'>" + item.Object_name + "</td><td></td><td></td><td></td></tr>";
            //     }
            // }
        // if (filteredArray) {

        // }
        // } else  { // กรณีที่ เป็นหัวข้อย่อยของทั้งหมด
        //     strHTML += createCheckboxAndTextAreaRow(item.id_control, item.text, item.id);
        // }
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