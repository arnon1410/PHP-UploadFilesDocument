function fnSetHeader(dataHeader){
    var strHTML = ''
    strHTML += "<th class='text-center textHeadTable'>คำถาม</th>"
    strHTML += "<th class='text-center textHeadTable'>มี/ใช่</th>"
    strHTML += "<th class='text-center textHeadTable'>ไม่มี/ไม่ใช่</th>"
    strHTML += "<th class='text-center textHeadTable'>คำอธิบาย/คำตอบ</th>"
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
    
    strHTML += " </div> "
    strHTML += " <div class='dvFooterForm'> "
    strHTML += "    <button type='button' class='btn btn-primary' id='btnSaveData' onclick='fnSaveDraftDocument()'>บันทึกฉบับร่าง</button>"
    strHTML += "    <button type='button' class='btn btn-success' id='btnExportPDF' onclick='fnExportDocument()'>Export PDF</button>"
    strHTML += " </div> "
    $("#dvFormReport")[0].innerHTML = strHTML
}

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

function fnCreateInputRadioAndSpan(text, groups, validate) {
    var strHTML = ""
    if (validate == 1) {
        strHTML += "<div style='display:flex;'>"
        strHTML += "<input type='radio' id='inputRadioSumOfSide" + groups + "_" + validate + "' name='inputRadioSumOfSide" + groups + "' style='margin: 5px 10px 0px 0px;' value='1' onchange='fnToggleTextSum(\"" + groups + "_" + validate + "\", this)'/>"
        strHTML += "<span>" + text + "</span>"
        strHTML += "</div>"
    } else { // กรณีไม่เพียงพอ 
        strHTML += "<div style='display:flex;'>"
        strHTML += "<input type='radio' id='inputRadioSumOfSide" + groups + "_" + validate + "' name='inputRadioSumOfSide" + groups + "' style='margin: 5px 10px 0px 0px;' value='0' onchange='fnToggleTextSum(\"" + groups + "_" + validate + "\", this)'/>"
        strHTML += "<span>" + text + "</span>"
        strHTML += "</div>"
        strHTML += "<div style='display:flex;'>"
        strHTML += "<textarea id='commentSum" + groups + "_" + validate + "' name='commentSum" + groups + "_" + validate + "' rows='2' cols='33' style='display:none'></textarea>"
        strHTML += "<button class='btn btn-secondary btn-sm' type='submit' id='submitButtonSum" + groups + "_" + validate + "' onclick='fnSubmitTextSum(\"" + groups + "_" + validate + "\")' style='display:none'>ยืนยัน</button>"
        strHTML += "</div>"
        strHTML += "<div style='display:flex;'> "
        strHTML += "<p class='text-left pComment' id='displayTextSum" + groups + "_" + validate + "'></p>"
        strHTML += "<i class='las la-pencil-alt' id='editIconSum" + groups + "_" + validate + "' style='display:none; cursor:pointer; margin-left: 10px;' onclick='fnEditTextSum(\"" + groups + "_" + validate + "\")'></i>"
        strHTML += "</div>"
       
    }
    return strHTML
}

function fnDrawTableReportAssessment() { /* ด้านการข่าว */
    var strHTML = "";

    /* แถวที่มี Checkbox และ TextArea */
    function createCheckboxAndTextAreaRow(text, id) {
        return "<tr>" +
            "<td style='width: 50%;'>" + text + "</td>" +
            "<td style='width: 8%;' class='text-center'> " +
            "<input type='checkbox' id='haveData_" + id + "' name='haveData_" + id + "' onchange='fnToggleTextarea(\"comment_" + id + "\",\"submitButton" + id + "\", this, \"1 \",\"" + id + "\")'/>" +
            "<label for='haveData_" + id + "' id='lablehaveData_" + id + "' class='hidden'>&#10003;</label> " +
            "</td>" +
            "<td style='width: 8%;' class='text-center'> " +
            "<input type='checkbox' id='nothaveData_" + id + "' name='nothaveData_" + id + "' onchange='fnToggleTextarea(\"comment_" + id + "\",\"submitButton" + id + "\", this, \"2 \",\"" + id + "\")' style='margin-right: 5px;'/>" +
            "<label for='notAppData_" + id + "' id='lablenotAppData_" + id + "' class='hidden'>&#10005;</label> " +
            "<input type='checkbox' id='notAppData_" + id + "' name='notAppData_" + id + "' onchange='fnToggleTextarea(\"comment_" + id + "\",\"submitButton" + id + "\", this, \"3 \",\"" + id + "\")'/>" +
            "</td>" +
            "<td style='width: 50%;'>"+ fncreateTextAreaAndButton(id) +"</td>" +
            // "<textarea id='story_" + id + "' name='story_" + id + "' rows='1' cols='25' style='display:none'></textarea>" +
            // "<td style='width: 34%;' class='text-center'>" + createCheckboxAndTextArea(id) + "</td>" +
            "</tr>";
    }

    var textAndIds = [
        { id: 101, text: "๑. การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 102, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม" },
        { id: 103, text: "&emsp;&emsp;&emsp;เพื่อให้มั่นใจว่ามีเครื่องมือ และอุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 104, text: "&emsp;๑.๑	 มีการแต่งตั้งนายทะเบียน ผู้ช่วย เจ้าหน้าที่ข้อมูลข่าวสารลับ" },
        { id: 105, text: "&emsp;๑.๒  มีการกำหนดชั้นความลับตามระเบียบว่าด้วยการรักษาความลับของทางราชการ พ.ศ.๒๕๕๔" },
        { id: 106, text: '&emsp;๑.๓  การอนุญาตให้บุคลากรเข้าถึงชั้นความลับ โดยยืดหลัก "จำกัดให้ทราบเท่าที่จำเป็น"' },
        { id: 107, text: "&emsp;๑.๔  ผู้เข้าถึงชั้นความลับ รักษาความลับโดยปฏิบัติตามระเบียบที่กำหนดไว้โดยเคร่งครัด" },
        { id: 108, text: "&emsp;๑.๕  มีการดำเนินการเกี่ยวกับข้อมูลข่าวสารลับให้เป็นไปตามระเบียบว่าด้วยการรักษาความลับของทางราชการ พ.ศ.๒๕๔๔ ทะเบียนรับ ทะเบียนส่ง และทะเบียนควบคุมข้อมูลข่าวสารลับ" },
        { id: 109, text: "&emsp;๑.๖	 การดำเนินการเกี่ยวกับเอกสารลับมีใบปกปิดทับตามชั้นเอกสารลับ ชั้นลับ ลับมาก ลับที่สุด" },
        { id: 110, text: "&emsp;๑.๗	 การส่งเอกสารลับ ใช้ซองทึบแสง ๒ ชั้น โดยชั้นในแสดงความลับทั้งด้านหน้า - หลัง ส่วนชั้นนอกจะต้องไม่มีเครื่องหมายแสดงใดๆ ที่บ่งบอกว่าเป็นข้อมูลข่าวสารลับ" },
        { id: 111, text: "&emsp;๑.๘  การเก็บรักษาข้อมูลข่าวสารลับเก็บไว้ในที่ปลอดภัย กรณีเก็บไว้ในเครื่องคอมพิวเตอร์มีการกำหนดรหัสผ่าน" },
        { id: 112, text: "&emsp;๑.๙  การยืม มีการพิจารณาผู้ยืมเกี่ยวกับเรื่องนั้นหรือไม่ และเจ้าของเรื่องเดิมต้องอนุญาตก่อน และมีการทำบันทึกการยืมไว้" },
        { id: 113, text: "&emsp;๑.๑๐ การทำลายข้อมูลข่าวสารลับ มีการดำเนินการตามขั้นตอนที่กำหนดตามระเบียบที่เกี่ยวข้อง " },
        { id: 114, text: "&emsp;๑.๑๑ กรณีข้อมูลข่าวสารลับสูญหาย หรือรั่วไหล มีการแต่งตั้งกรรมการสอบสวน เพื่อหาสาเหตุ และกำหนดมาตรการป้องกันมิให้เกิดซ้ำ" },
        { id: 115, text: "<u>สรุป</u> : การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 116, text: fnCreateInputRadioAndSpan("มีการควบคุมเพียงพอ" ,'group1',1, this)},
        { id: 117, text: fnCreateInputRadioAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้" ,'group1',0,this)},
       
        { id: 201, text: "๒. การรักษาความปลอดภัยเกี่ยวกับบุคคล" },
        { id: 202, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม" },
        { id: 203, text: "&emsp;&emsp;&emsp;เพื่อให้มั่นใจว่าข้อมูลข่าวสารลับ มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับบุคคล" },
        { id: 204, text: "&emsp;๒.๑ มีการอบรมชี้แจง ข้าราชการที่มีหน้าที่เกี่ยวข้องกับสิ่งที่เป็นความลับของทางราชการให้ทราบโดยละเอียดถึงความสำคัญและมาตรการของการรักษาความปลอดภัยเป็นครั้งคราวตามโอกาส" },
        { id: 205, text: "&emsp;๒.๒ มีการลงคำสั่งเป็นลายลักษณ์อักษรแต่งตั้งบุคคลให้ทำหน้าที่เกี่ยวกับสิ่งที่เป็นความลับของทางราชการ" },
        { id: 206, text: "<u>สรุป</u> : การรักษาความปลอดภัยเกี่ยวกับบุคคล" },
        { id: 207, text: fnCreateInputRadioAndSpan("มีการควบคุมเพียงพอ",'group2',1) },
        { id: 208, text: fnCreateInputRadioAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้",'group2',0) },
       
        { id: 301, text: "๓. การรักษาความปลอดภัยเกี่ยวกับสถานที่" },
        { id: 302, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม" },
        { id: 303, text: "&emsp;&emsp;&emsp;เพื่อให้มีความมั่นใจว่าเครื่องมือและอุปกรณ์ ที่มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับสถานที่" },
        { id: 304, text: "&emsp;๓.๑ มีการกำหนดมาตรการ เพื่อรักษาความปลอดภัยแก่อาคาร สถานที่ วัสดุ อุปกรณ์ ในอาคารสถานที่ให้พ้นจากการโจรกรรม จารกรรม และการก่อวินาศกรรม" },
        { id: 305, text: "&emsp;๓.๒ ข้าราชการมีการติดป้ายแสดงตน เพื่อแสดงว่าเป็นผู้ที่ได้รับอนุญาตให้เข้าพื้นที่ได้" },
        { id: 306, text: "&emsp;๓.๓ การป้องกันอัคคีภัย มีการแต่งตั้งข้าราชการเป็นเจ้าหน้าที่ดับเพลิงโดยแบ่งเป็น ๒ กลุ่ม คือ กลุ่มที่มีหน้าที่ดับเพลิง และกลุ่มที่มีหน้าที่ขนย้าย" },
        { id: 307, text: "&emsp;๓.๔ มีหมายเลขโทรศัพท์ของหน่วยดับเพลิงและที่จำเป็นเพื่อ ติดต่อขอความช่วยเหลือหรือแจ้งเหตุให้ทราบ" },
        { id: 308, text: "&emsp;๓.๕ ข้าราชการได้รับการอบรมชี้แจงเกี่ยวกับขั้นตอนการปฏิบัติเมื่อเกิดอัคคีภัย เส้นทางอพยพและขนย้ายและการใช้เครื่องมือ ดับเพลิงเบื้องต้น" },
        { id: 309, text: "&emsp;๓.๖ มีการจัดลำดับความสำคัญในการขนย้ายพัสดุ สิ่งของเอกสารภายในสำนักงาน และมีการปิดป้ายหมายเลขไว้" },
        { id: 310, text: "<u>สรุป</u> : การรักษาความปลอดภัยเกี่ยวกับสถานที่" },
        { id: 311, text: fnCreateInputRadioAndSpan("มีการควบคุมเพียงพอ" ,'group3',1) },
        { id: 312, text: fnCreateInputRadioAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้",'group3',0) },
        
        { id: 401, text: "๔. ความพร้อมในการดำเนินงานด้านการข่าว" },
        { id: 402, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม" },
        { id: 403, text: "&emsp;&emsp;&emsp;เพื่อให้มั่นใจว่าการดำเนินงาน ด้านการข่าว มีแนวทางการบริหารจัดการเพียงพอให้การปฏิบัติงาน ด้านการข่าวบรรลุภารกิจของหน่วย" },
        { id: 404, text: "&emsp;๔.๑ มีการจัดทำแผนการปฏิบัติงานด้านการข่าวของหน่วย" },
        { id: 405, text: "&emsp;&emsp;&emsp;๔.๑.๑ ระยะสั้น" },
        { id: 406, text: "&emsp;&emsp;&emsp;๔.๑.๒ ระยะปานกลาง" },
        { id: 407, text: "&emsp;๔.๒ มีการกำหนดผู้รับผิดชอบหลัก ผู้รับผิดชอบรอง ผู้ปฏิบัติและหน่วยสนับสนุนในการปฏิบัติงานด้านการข่าว" },
        { id: 408, text: "&emsp;๔.๓ มีการจัดทำแผนรวบรวมข่าวสาร เพื่อแบ่งมอบภารกิจ/เป้าหมายในการรวบรวมข่าวอย่างชัดเจน" },
        { id: 409, text: "&emsp;๔.๔ กำลังพลในหน่วยมีความเข้าใจหน้าที่และความรับผิดชอบในการดำเนินงานด้านการข่าวของตนเอง" },
        { id: 410, text: "&emsp;๔.๕ มีงบประมาณที่ใช้ในการปฏิบัติงานด้านการข่าวอย่างเพียงพอ" },
        { id: 411, text: "&emsp;๔.๖ มีการกำหนดวงรอบการรายงานข่าวสารอย่างเป็นระบบ" },
        { id: 412, text: "&emsp;๔.๗ มีขีดความสามารถในการฝึกอบรมให้กำลังพลมีความรู้ความสามารถในการปฏิบัติงานด้านการข่าว" },
        { id: 413, text: "&emsp;๔.๘ มีแผนการฝึกอบรมเพิ่มเติมหรือการฝึกทบทวนทั้งในระยะสั้นหรือระยะปานกลาง เพื่อพัฒนาให้กำลังพลมีความพร้อมและประสบการณ์ เพิ่มมากขึ้น" },
        { id: 414, text: "&emsp;๔.๙ มีการสนับสนุนการฝึก ศึกษา และอบรม ทั้งจากภายในและภายนอก ทร." },
        { id: 415, text: "&emsp;๔.๑๐ มีการประชุมหน่วยเกี่ยวข้องเพื่อประสานงานและแก้ไข ปัญหาที่เกิดขึ้นในการปฏิบัติงาน" },
        { id: 416, text: "&emsp;๔.๑๑ กำลังพลมีความเข้าใจแผนปฏิบัติงานด้านการข่าว หรือแผนรวบรวมข่าวสาร" },
        { id: 417, text: "&emsp;๔.๑๒ มีการจัดทำแผน และมาตรการ การรักษาความปลอดภัย" },
        { id: 418, text: "&emsp;๔.๑๒.๑ ด้านสถานที่" },
        { id: 419, text: "&emsp;๔.๑๒.๒ ด้านเอกสาร" },
        { id: 420, text: "&emsp;๔.๑๒.๓ ด้านบุคคล" },
        { id: 421, text: "&emsp;๔.๑๓ มีการจัดทำแผนต่อต้านข่าวกรอง" },
        { id: 422, text: "&emsp;๔.๑๔ มีการจัดหาแหล่งข่าว เพื่อรวบรวมข่าวสารทั้งภายในและภายนอกประเทศ" },
        { id: 423, text: "&emsp;๔.๑๕ มีการจัดหาแหล่งข่าวเพิ่มเติม เพื่อให้เพียงพอต่อการรวบรวม ข้อมูลหรือข่าวสาร ตามเป้าหมายด้านการข่าวที่เพิ่มมากขึ้น" },
        { id: 424, text: "&emsp;๔.๑๖ มีการกระจายข้อมูลข่าวสารหรือข่าวกรองไปยังหน่วยที่จำเป็นต้องใช้" },
        { id: 425, text: "&emsp;๔.๑๗ มีการจัดเก็บข้อมูลด้านการข่าว อย่างเป็นระบบ" },
        { id: 426, text: "<u>สรุป</u> : ความพร้อมในการดำเนินงานด้านการข่าว" },
        { id: 427, text: fnCreateInputRadioAndSpan("มีการควบคุมเพียงพอ", 'group4',1) },
        { id: 428, text: fnCreateInputRadioAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้", 'group4',0) },
        
        { id: 501, text: "๕. เครื่องมือและอุปกรณ์ที่ใช้ในงานด้านการข่าว" },
        { id: 502, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม" },
        { id: 503, text: "&emsp;&emsp;&emsp;เพื่อให้มั่นใจว่าเครืองมือและอุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการปฏิบัติงานด้านการข้าว" },
        { id: 504, text: "&emsp;๕.๑ มีการจัดหาเครื่องมือ อุปกรณ์ และยานพาหนะด้านการข่าว ที่มีความทันสมัยและประสิทธิภาพเพียงพอต่อการปฏิบัติงาน" },
        { id: 505, text: "&emsp;๕.๒ มีการลงทะเบียนครุภัณฑ์และจัดทำรายการแจกจ่ายเครื่องมือและอุปกรณ์ถูกต้องตามระเบียบ รวมทั้งมีการตรวจสอบประจำปี" },
        { id: 506, text: "&emsp;๕.๓ มีสถานที่เก็บเครื่องมือและอุปกรณ์ที่มีความปลอดภัย" },
        { id: 507, text: "&emsp;๕.๔ มีการจัดทำแผน เพื่อจัดหาและซ่อมบำรุงเครื่องมือและ อุปกรณ์ด้านการข่าว" },
        { id: 508, text: "&emsp;๕.๕ มีการดำเนินการจำหน่ายเครื่องมือและอุปกรณ์ด้านการข่าว ที่ชำรุดหรือหมดความจำเป็นในการใช้งาน" },
        { id: 509, text: "&emsp;๕.๖ มีการนำระบบเทคโนโลยีสารสนเทศมาใช้ในการปฏิบัติงาน" },
        { id: 510, text: "<u>สรุป</u> : เครื่องมือและอุปกรณ์ที่ใช้ในงานด้านการข่าว" },
        { id: 511, text: fnCreateInputRadioAndSpan("มีการควบคุมเพียงพอ",'group5',1) },
        { id: 512, text: fnCreateInputRadioAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้",'group5',0) },
        
        { id: 601, text: "๖. การปฏิบัติงานด้านการข่าว" },
        { id: 602, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม" },
        { id: 603, text: "&emsp;&emsp;&emsp;เพื่อให้มีความมั่นใจว่ากำลังพล มีเพียงพอที่จะปฏิบัติงานด้านการข่าว มีความรู้ ความชำนาญ ในการ วิเคราะห์ข่าว และปฏิบัติตามกฎ ระเบียบ ข้อบังคับหรือมาตรการเกี่ยวกับการรักษาความปลอดภัยโดยเคร่งครัดรวมทั้งมีแนวทางในการบริหารงานด้านบุคคลากรด้านการข่าว" },
        { id: 604, text: "&emsp;๖.๑ มีการกำหนดคุณสมบัติของกำลังพลที่ปฏิบัติงานด้านการข่าว" },
        { id: 605, text: "&emsp;๖.๒ ระบบการรายงานข้อมูลด้านการข่าวมีความรวดเร็ว ทันต่อเหตุการณ์ และการตัดสินใจของผู้บังคับบัญชา" },
        { id: 606, text: "&emsp;๖.๓ มีการฝึกอบรมให้เจ้าหน้าที่มีความรู้ ความชำนาญในการใช้เครื่องมือ อุปกรณ์ หรือระบบสารสนเทศด้านการข่าว" },
        { id: 607, text: "&emsp;๖.๔ มีการฝึกอบรมเพื่อให้ความรู้ ความชำนาญและประสบการณ์ในการปฏิบัติงานด้านการข่าว โดยเฉพาะในการวิเคราะห์ข่าวสาร" },
        { id: 608, text: "&emsp;๖.๕ มีการสรรหาหรือคัดเลือกกำลังพลที่มีขีดความสามารถและเหมาะสม เพื่อให้มาปฏิบัติงานด้านการข่าว" },
        { id: 609, text: "&emsp;๖.๖ มีแนวทางในการบริหารบุคลากร และมีสิ่งจูงใจในการปฏิบัติงาน ให้กำลังพลด้านการข่าว" },
        { id: 610, text: "&emsp;๖.๗ มีกำลังพลเพียงพอในการปฏิบัติงาน" },
        { id: 611, text: "&emsp;๖.๘ มีนักวิเคราะห์ข่าวในการปฏิบัติงานด้านการข่าว" },
        { id: 612, text: "&emsp;๖.๙ มีการประเมินผล/ตรวจสอบการปฏิบัติงานของกำลังพล" },
        { id: 613, text: "&emsp;๖.๑๐ มีการตรวจสอบขีดความสามารถ และความไว้วางใจ บุคคลของกำลังพลที่ปฏิบัติงานด้านการข่าวของหน่วย" },
        { id: 614, text: "&emsp;๖.๑๑ มีการปฏิบัติตามกฎ ระเบียบ ข้อบังคับ ด้านการรักษาความปลอดภัยและด้านการข่าว" },
        { id: 615, text: "&emsp;๖.๑๒ มีการกวดขันกำลังพลให้ปฏิบัติตามกฎ ระเบียบ ข้อบังคับหรือมาตรการที่เกี่ยวกับการรักษาความปลอดภัย" },
        { id: 616, text: "&emsp;๖.๑๓ มีการลงโทษผู้ละเมิดกฎ ระเบียบ ข้อบังคับหรือมาตรการรักษาความปลอดภัย หรือมีมาตรการการลงโทษผู้ละเมิด ดังกล่าว" },
        { id: 617, text: "&emsp;๖.๑๔ มีการปรับปรุงกฎ ระเบียบ ข้อบังคับหรือมาตรการรักษาความปลอดภัย เพื่อให้ทันกับการเปลี่ยนแปลงของสถานการณ์ในปัจจุบัน" },
        { id: 618, text: "&emsp;๖.๑๕ มีแนวทางการสร้างเสริมจิตสำนึกในการปฏิบัติงานด้านการข่าวให้กับกำลังพลทั่วไปของหน่วย" },
        { id: 619, text: "&emsp;๖.๑๖ มีการประเมินผลการปฏิบัติและทบทวน ปรับปรุงแก้ไขแผนรวบรวมข่าวสารให้ทันสมัย" },
        { id: 620, text: "<u>สรุป</u> : การปฏิบัติงานด้านการข่าว"},
        { id: 621, text: fnCreateInputRadioAndSpan("มีการควบคุมเพียงพอ",'group6',1) },
        { id: 622, text: fnCreateInputRadioAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้",'group6',0) }
    ];
    
    for (var i = 0; i < textAndIds.length; i++) {
        var item = textAndIds[i];
        // if (typeof item.text === 'string' && ["101", "102","108", "109", "110", "201", "202","208", "209", "210", "301", "302", "309", "310", "311", "401", "402","425" ,"426" ,"427", "501", "502" ,"509", "510", "511", "601", "602", "619", "620","621"].includes(item.id)) {
        if (typeof item.text === 'string' && [101,102,103, 115, 116, 117, 201, 202, 203, 206,207, 208, 209, 301, 302, 303, 310, 311, 312, 401, 402, 403 ,426 , 427, 428, 501, 502 , 503, 510, 511, 512, 601, 602, 603,620,621,622].includes(item.id)) {
            strHTML += "<tr><td>" + item.text + "</td><td></td><td></td><td></td></tr>";
        } else {
            strHTML += createCheckboxAndTextAreaRow(item.text, item.id);
        }
    }

    return strHTML;
    // แทรกโค้ดเข้าไปใน #dvTableReportAssessment
    // $("#dvTableReportAssessment")[0].innerHTML = strHTML;
}

function fncreateTextAreaAndButton(id) {
    return `
        <div style='display:flex; align-items: center;'>
            <textarea id='comment_${id}' name='comment_${id}' rows='1' cols='19' style='display:none'></textarea>
            <button class='btn btn-secondary btn-sm' type='submit' id='submitButton${id}' onclick='fnSubmitText(${id})' style='display:none'>ยืนยัน</button>
        </div>
        <div style='display:flex; align-items: center;'>
            <p class='text-left pComment' id='displayText${id}'></p>
            <i class='las la-pencil-alt' id='editIcon${id}' style='display:none; cursor:pointer; margin-left: 10px;' onclick='fnEditText(${id})'></i>
        </div>
        </div>
    `;
}


function fnToggleTextarea(textareaId,buttonsId ,checkbox, coloums, id) {
    const textarea = document.getElementById(textareaId);
    const buttons = document.getElementById(buttonsId);
    const displayText = document.getElementById('displayText' + id);
    const editIcon = document.getElementById('editIcon' + id);
    if (coloums == 2) {
        if (textarea && buttons) {
            textarea.style.display = checkbox.checked ? 'block' : 'none';
            textarea.value = '';
            buttons.style.display  = checkbox.checked ? 'block' : 'none';
            displayText.style.display = checkbox.checked ? 'block' : 'none';
            displayText.innerText = '';
            editIcon.style.display = 'none';

            
        }
    } else if (coloums == 3) {
        textarea.style.display = checkbox.checked ? 'block' : 'none';
        textarea.value = '';
        buttons.style.display  = checkbox.checked ? 'block' : 'none';
        displayText.style.display = checkbox.checked ? 'block' : 'none';
        displayText.innerText = '';
        editIcon.style.display = 'none';
    } else { // col1
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
    // console.log(textarea)
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
    var tab = '&emsp;'
    var editIcon = document.getElementById('editIconCommentEvaluation');

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