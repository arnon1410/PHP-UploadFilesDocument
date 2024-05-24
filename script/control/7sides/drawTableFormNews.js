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
    strHTML += " <div class='textSum'><b>สรุป : การควบคุมภายในด้านการข่าว</b></div> "
    strHTML += " <div> "
    strHTML += " <span> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ทรภ.๒ มีการควบคุมภายในด้านการข่าว ที่เพียงพอและเหม่าะสม.มีการรักษาความปลอดภัยเกี่ยวกับสถานที่และการปฏิบัติการด้านการข่าว รวมทั้งข้อมูลข่าวสารลับมีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับบุคคล มีแนวทางการบริหารจัดการเพียงพอให้การปฏิบัติงานด้านการข่าว กำลังพลมีเพียงพอที่จะปฏิบัติงานด้านการข่าว มีความรู้ความชำนาญในการวิเคราะห์ข่าวและปฏิบัติตามกฎระเบียบข้อบังคับหรือมาตรการเกี่ยวกับการรักษา ความปลอดภัยโดยเคร่งครัด ทั้งนี้ ในส่วนของเครื่องมือและอุปกรณ์ที่ใช้ในงาน ด้านการข่าว พบว่า.เครื่องมือ/อุปกรณ์ในการรวบรวมข้อมูลด้านการข่าวยังมีความไม่ทันสมัยและมีประสิทธิภาพไม่เพียงพอต่อการปฏิบัติงาน. จำเป็นต้องปรับปรุงการควบคุมภายในให้ดีขึ้น โดยการจัดหาเครื่องมือ/อุปกรณ์เพิ่มเติม เพื่อให้การดำเนินการรวบรวมข้อมูลด้านการข่าวมีประสิทธิภาพเพียงพอต่อการปฏิบัติงาน</div></span> "
    strHTML += " <div class='dvSignature'> "
    strHTML += " <div>ชื่อผู้ประเมิน.........................................</div> "
    strHTML += " <div>ตำแหน่ง................................................</div> "
    strHTML += " <div>วันที่......................................................</div> "
    
    strHTML += " </div> "

    strHTML += "<button id='checkButton'>เช็คสถานะ</button>"

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

function createCheckboxAndSpan(text, id) {
    return "<div style='display:flex;'>" +
        "<input type='checkbox' id='horns_" + id + "' name='horns_" + id + "' style='margin: 5px 10px 0px 0px;'/>" +
        "<span>" + text + "</span>" +
        "</div>";
}

function fnDrawTableReportAssessment() { /* ด้านการข่าว */
    var strHTML = "";

    /* แถวที่มี Checkbox และ TextArea */
    function createCheckboxAndTextAreaRow(text, id) {
        return "<tr>" +
            "<td style='width: 50%;'>" + text + "</td>" +
            "<td style='width: 8%;' class='text-center'> " +
            "<input type='checkbox' id='haveData_" + id + "' name='haveData_" + id + "' />" +
            "<label for='haveData_" + id + "' id='lablehaveData_" + id + "' class='hidden'>&#10003;</label> " +
            "</td>" +
            "<td style='width: 8%;' class='text-center'> " +
            "<input type='checkbox' id='nothaveData_" + id + "' name='nothaveData_" + id + "'/>" +
            "<label for='nothaveData_" + id + "' id='lablenothaveData_" + id + "' class='hidden'>&#10005;</label> " +
            "</td>" +
            "<td style='width: 34%;' class='text-center'>" + createCheckboxAndTextArea(id) + "</td>" +
            "</tr>";
    }

    var textAndIds = [
        { id: 101, text: "๑. การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 102, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม เพื่อให้มั่นใจว่ามีเครื่องมือ และอุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 103, text: "&emsp;๑.๑ การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 104, text: "&emsp;๑.๒ มีการกำหนดชั้นความลับตามระเบียบว่าด้วยการรักษาความลับของทางราชการ พ.ศ.๒๕๕๔" },
        { id: 105, text: '&emsp;๑.๓ การอนุญาตให้บุคลากรเข้าถึงชั้นความลับ โดยยืดหลัก "จำกัดให้ทราบเท่าที่จำเป็น"' },
        { id: 106, text: "&emsp;๑.๔ ผู้เข้าถึงชั้นความลับ รักษาความลับโดยปฏิบัติตามระเบียบที่กำหนดไว้โดยเคร่งครัด" },
        { id: 107, text: "&emsp;๑.๕ มีการดำเนินการเกี่ยวกับข้อมูลข่าวสารลับให้เป็นไปตามระเบียบว่าด้วยการรักษาความลับของทางราชการ พ.ศ.๒๕๔๔ ทะเบียนรับ ทะเบียนส่ง และทะเบียนควบคุมข้อมูลข่าวสารลับ" },
        { id: 108, text: "<u>สรุป</u> : การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 109, text: createCheckboxAndSpan("มีการควบคุมเพียงพอ") },
        { id: 110, text: createCheckboxAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้") },
       
        { id: 201, text: "๒. การรักษาความปลอดภัยเกี่ยวกับบุคคล" },
        { id: 202, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม เพื่อให้มั่นใจว่าข้อมูลข่าวสารลับ มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับบุคคล" },
        { id: 203, text: "&emsp;๒.๑ มีการอบรมชี้แจง ข้าราชการที่มีหน้าที่เกี่ยวข้องกับสิ่งที่เป็นความลับของทางราชการให้ทราบโดยละเอียดถึงความสำคัญและมาตรการของการรักษาความปลอดภัยเป็นครั้งคราวตามโอกาส" },
        { id: 204, text: "&emsp;๒.๒ มีการลงคำสั่งเป็นลายลักษณ์อักษรแต่งตั้งบุคคลให้ทำหน้าที่เกี่ยวกับสิ่งที่เป็นความลับของทางราชการ" },
        { id: 207, text: "&emsp;๑.๕ มีการดำเนินการเกี่ยวกับข้อมูลข่าวสารลับให้เป็นไปตามระเบียบว่าด้วยการรักษาความลับของทางราชการพ.ศ.๒๕๔๔ ทะเบียนรับ ทะเบียนส่ง และทะเบียนควบคุมข้อมูลข่าวสารลับ" },
        { id: 208, text: "<u>สรุป</u> : การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 209, text: createCheckboxAndSpan("มีการควบคุมเพียงพอ") },
        { id: 210, text: createCheckboxAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้") },
       
        { id: 301, text: "๓. การรักษาความปลอดภัยเกี่ยวกับสถานที่" },
        { id: 302, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม เพื่อให้มีความมั่นใจว่าเครื่องมือและอุปกรณ์ ที่มีประสิทธิภาพเพียงพอต่อการรักษาความปลอดภัยเกี่ยวกับสถานที่" },
        { id: 303, text: "&emsp;๓.๑ มีการกำหนดมาตรการ เพื่อรักษาความปลอดภัยแก่อาคาร สถานที่ วัสดุ อุปกรณ์ ในอาคารสถานที่ให้พ้นจากการโจรกรรม จารกรรม และการก่อวินาศกรรม" },
        { id: 304, text: "&emsp;๓.๒ ข้าราชการมีการติดป้ายแสดงตน เพื่อแสดงว่าเป็นผู้ที่ได้รับอนุญาตให้เข้าพื้นที่ได้" },
        { id: 307, text: "&emsp;๓.๕ ข้าราชการได้รับการอบรมชี้แจงเกี่ยวกับขั้นตอนการปฏิบัติเมื่อเกิดอัคคีภัย เส้นทางอพยพและขนย้ายและการใช้เครื่องมือ ดับเพลิงเบื้องต้น" },
        { id: 308, text: "&emsp;๓.๖ มีการจัดลำดับความสำคัญในการขนย้ายพัสดุ สิ่งของเอกสารภายในสำนักงาน และมีการปิดป้ายหมายเลขไว้" },
        { id: 309, text: "<u>สรุป</u> : การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 310, text: createCheckboxAndSpan("มีการควบคุมเพียงพอ") },
        { id: 311, text: createCheckboxAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้") },
        
        { id: 401, text: "๔. ความพร้อมในการดำเนินงานด้านการข่าว" },
        { id: 402, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม เพื่อให้มั่นใจว่าการดำเนินงาน ด้านการข่าว มีแนวทางการบริหารจัดการเพียงพอให้การปฏิบัติงาน ด้านการข่าวบรรลุภารกิจของหน่วย" },
        { id: 403, text: "&emsp;๔.๑ มีการจัดทำแผนการปฏิบัติงานด้านการข่าวของหน่วย" },
        { id: 404, text: "&emsp;&emsp;&emsp;๔.๑.๑ ระยะสั้น" },
        { id: 405, text: "&emsp;&emsp;&emsp;๔.๑.๒ ระยะปานกลาง" },
        { id: 406, text: "&emsp;๔.๒ มีการกำหนดผู้รับผิดชอบหลัก ผู้รับผิดชอบรอง ผู้ปฏิบัติและหน่วยสนับสนุนในการปฏิบัติงานด้านการข่าว" },
        { id: 407, text: "&emsp;๔.๓ มีการจัดทำแผนรวบรวมข่าวสาร เพื่อแบ่งมอบภารกิจ/เป้าหมายในการรวบรวมข่าวอย่างชัดเจน" },
        { id: 408, text: "&emsp;๔.๔ กำลังพลในหน่วยมีความเข้าใจหน้าที่และความรับผิดชอบในการดำเนินงานด้านการข่าวของตนเอง" },
        { id: 409, text: "&emsp;๔.๕ มีงบประมาณที่ใช้ในการปฏิบัติงานด้านการข่าวอย่างเพียงพอ" },
        { id: 410, text: "&emsp;๔.๖ มีการกำหนดวงรอบการรายงานข่าวสารอย่างเป็นระบบ" },
        { id: 411, text: "&emsp;๔.๗ มีขีดความสามารถในการฝึกอบรมให้กำลังพลมีความรู้ความสามารถในการปฏิบัติงานด้านการข่าว" },
        { id: 412, text: "&emsp;๔.๘ มีแผนการฝึกอบรมเพิ่มเติมหรือการฝึกทบทวนทั้งในระยะสั้นหรือระยะปานกลาง เพื่อพัฒนาให้กำลังพลมีความพร้อมและประสบการณ์ เพิ่มมากขึ้น" },
        { id: 413, text: "&emsp;๔.๙ มีการสนับสนุนการฝึก ศึกษา และอบรม ทั้งจากภายในและภายนอก ทร." },
        { id: 414, text: "&emsp;๔.๑๐ มีการประชุมหน่วยเกี่ยวข้องเพื่อประสานงานและแก้ไข ปัญหาที่เกิดขึ้นในการปฏิบัติงาน" },
        { id: 415, text: "&emsp;๔.๑๑ กำลังพลมีความเข้าใจแผนปฏิบัติงานด้านการข่าว หรือแผนรวบรวมข่าวสาร" },
        { id: 416, text: "&emsp;๔.๑๒ มีการจัดทำแผน และมาตรการ การรักษาความปลอดภัย" },
        { id: 417, text: "&emsp;๔.๑๒.๑ ด้านสถานที่" },
        { id: 418, text: "&emsp;๔.๑๒.๒ ด้านเอกสาร" },
        { id: 419, text: "&emsp;๔.๑๒.๓ ด้านบุคคล" },
        { id: 420, text: "&emsp;๔.๑๓ มีการจัดทำแผนต่อต้านข่าวกรอง" },
        { id: 421, text: "&emsp;๔.๑๔ มีการจัดหาแหล่งข่าว เพื่อรวบรวมข่าวสารทั้งภายในและภายนอกประเทศ" },
        { id: 422, text: "&emsp;๔.๑๕ มีการจัดหาแหล่งข่าวเพิ่มเติม เพื่อให้เพียงพอต่อการรวบรวม ข้อมูลหรือข่าวสาร ตามเป้าหมายด้านการข่าวที่เพิ่มมากขึ้น" },
        { id: 423, text: "&emsp;๔.๑๖ มีการกระจายข้อมูลข่าวสารหรือข่าวกรองไปยังหน่วยที่จำเป็นต้องใช้" },
        { id: 424, text: "&emsp;๔.๑๗ มีการจัดเก็บข้อมูลด้านการข่าว อย่างเป็นระบบสรุป : ความพร้อมในการดำเนินงานด้านการข่าว" },
        { id: 425, text: "<u>สรุป</u> : การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 426, text: createCheckboxAndSpan("มีการควบคุมเพียงพอ", 427) },
        { id: 427, text: createCheckboxAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้", 428) },
        
        { id: 501, text: "๕. เครื่องมือและอุปกรณ์ที่ใช้ในงานด้านการข่าว" },
        { id: 502, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม เพื่อให้มั่นใจว่าีเครืองมือและอุปกรณ์ที่มีประสิทธิภาพเพียงพอต่อการปฏิบัติงานด้านการข้าว" },
        { id: 503, text: "&emsp;๕.๑ มีการจัดหาเครื่องมือ อุปกรณ์ และยานพาหนะด้านการข่าว ที่มีความทันสมัยและประสิทธิภาพเพียงพอต่อการปฏิบัติงาน" },
        { id: 504, text: "&emsp;๕.๒ มีการลงทะเบียนครุภัณฑ์และจัดทำรายการแจกจ่ายเครื่องมือและอุปกรณ์ถูกต้องตามระเบียบ รวมทั้งมีการตรวจสอบประจำปี" },
        { id: 505, text: "&emsp;๕.๓ มีสถานที่เก็บเครื่องมือและอุปกรณ์ที่มีความปลอดภัย" },
        { id: 506, text: "&emsp;๕.๔ มีการจัดทำแผน เพื่อจัดหาและซ่อมบำรุงเครื่องมือและ อุปกรณ์ด้านการข่าว" },
        { id: 507, text: "&emsp;๕.๕ มีการดำเนินการจำหน่ายเครื่องมือและอุปกรณ์ด้านการข่าว ที่ชำรุดหรือหมดความจำเป็นในการใช้งาน" },
        { id: 508, text: "&emsp;๕.๖ มีการนำระบบเทคโนโลยีสารสนเทศมาใช้ในการปฏิบัติงาน" },
        { id: 509, text: "<u>สรุป</u> : การรักษาความปลอดภัยเกี่ยวกับข้อมูลข่าวสารลับ" },
        { id: 510, text: createCheckboxAndSpan("มีการควบคุมเพียงพอ", 511) },
        { id: 511, text: createCheckboxAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้", 512) },
        
        { id: 601, text: "๖. การปฏิบัติงานด้านการข่าว" },
        { id: 602, text: "&emsp;&emsp;&emsp;วัตถุประสงค์ของการควบคุม เพื่อให้มีความมั่นใจว่ากำลังพล มีเพียงพอที่จะปฏิบัติงานด้านการข่าว มีความรู้ ความชำนาญ ในการ วิเคราะห์ข่าว และปฏิบัติตามกฎ ระเบียบ ข้อบังคับหรือมาตรการเกี่ยวกับการรักษาความปลอดภัยโดยเคร่งครัดรวมทั้งมีแนวทางในการบริหารงานด้านบุคคลากรด้านการข่าว" },
        { id: 603, text: "&emsp;๖.๑ มีการกำหนดคุณสมบัติของกำลังพลที่ปฏิบัติงานด้านการข่าว" },
        { id: 604, text: "&emsp;๖.๒ ระบบการรายงานข้อมูลด้านการข่าวมีความรวดเร็ว ทันต่อเหตุการณ์ และการตัดสินใจของผู้บังคับบัญชา" },
        { id: 605, text: "&emsp;๖.๓ มีการฝึกอบรมให้เจ้าหน้าที่มีความรู้ ความชำนาญในการใช้เครื่องมือ อุปกรณ์ หรือระบบสารสนเทศด้านการข่าว" },
        { id: 606, text: "&emsp;๖.๔ มีการฝึกอบรมเพื่อให้ความรู้ ความชำนาญและประสบการณ์ในการปฏิบัติงานด้านการข่าว โดยเฉพาะในการวิเคราะห์ข่าวสาร" },
        { id: 607, text: "&emsp;๖.๕ มีการสรรหาหรือคัดเลือกกำลังพลที่มีขีดความสามารถและเหมาะสม เพื่อให้มาปฏิบัติงานด้านการข่าว" },
        { id: 608, text: "&emsp;๖.๖ มีแนวทางในการบริหารบุคลากร และมีสิ่งจูงใจในการปฏิบัติงาน ให้กำลังพลด้านการข่าว" },
        { id: 609, text: "&emsp;๖.๗ มีกำลังพลเพียงพอในการปฏิบัติงาน" },
        { id: 610, text: "&emsp;๖.๘ มีนักวิเคราะห์ข่าวในการปฏิบัติงานด้านการข่าว" },
        { id: 611, text: "&emsp;๖.๙ มีการประเมินผล/ตรวจสอบการปฏิบัติงานของกำลังพล" },
        { id: 612, text: "&emsp;๖.๑๐ มีการตรวจสอบขีดความสามารถ และความไว้วางใจ บุคคลของกำลังพลที่ปฏิบัติงานด้านการข่าวของหน่วย" },
        { id: 613, text: "&emsp;๖.๑๑ มีการปฏิบัติตามกฎ ระเบียบ ข้อบังคับ ด้านการรักษาความปลอดภัยและด้านการข่าว" },
        { id: 614, text: "&emsp;๖.๑๒ มีการกวดขันกำลังพลให้ปฏิบัติตามกฎ ระเบียบ ข้อบังคับหรือมาตรการที่เกี่ยวกับการรักษาความปลอดภัย" },
        { id: 615, text: "&emsp;๖.๑๓ มีการลงโทษผู้ละเมิดกฎ ระเบียบ ข้อบังคับหรือมาตรการรักษาความปลอดภัย หรือมีมาตรการการลงโทษผู้ละเมิด ดังกล่าว" },
        { id: 616, text: "&emsp;๖.๑๔ มีการปรับปรุงกฎ ระเบียบ ข้อบังคับหรือมาตรการรักษาความปลอดภัย เพื่อให้ทันกับการเปลี่ยนแปลงของสถานการณ์ในปัจจุบัน" },
        { id: 617, text: "&emsp;๖.๑๕ มีแนวทางการสร้างเสริมจิตสำนึกในการปฏิบัติงานด้านการข่าวให้กับกำลังพลทั่วไปของหน่วย" },
        { id: 618, text: "&emsp;๖.๑๖ มีการประเมินผลการปฏิบัติและทบทวน ปรับปรุงแก้ไขแผนรวบรวมข่าวสารให้ทันสมัย" },
        { id: 619, text: "<u>สรุป</u> : การปฏิบัติงานด้านการข่าว"},
        { id: 620, text: createCheckboxAndSpan("มีการควบคุมเพียงพอ") },
        { id: 621, text: createCheckboxAndSpan("กรณีไม่เพียงพอมีแนวทางหรือวิธีการปรับปรุงการควบคุมภายในให้ดีขึ้น ดังนี้") }
    ];
    
    for (var i = 0; i < textAndIds.length; i++) {
        var item = textAndIds[i];
        // if (typeof item.text === 'string' && ["101", "102","108", "109", "110", "201", "202","208", "209", "210", "301", "302", "309", "310", "311", "401", "402","425" ,"426" ,"427", "501", "502" ,"509", "510", "511", "601", "602", "619", "620","621"].includes(item.id)) {
        if (typeof item.text === 'string' && [101, 102,108, 109, 110, 201, 202,208, 209, 210, 301, 302, 309, 310, 311, 401, 402,425 ,426 ,427, 501, 502 ,509, 510, 511, 601, 602, 619, 620,621].includes(item.id)) {
            strHTML += "<tr><td>" + item.text + "</td><td></td><td></td><td></td></tr>";
        } else {
            strHTML += createCheckboxAndTextAreaRow(item.text, item.id);
        }
    }

    return strHTML;
    // แทรกโค้ดเข้าไปใน #dvTableReportAssessment
    // $("#dvTableReportAssessment")[0].innerHTML = strHTML;
}
