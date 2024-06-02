function fnSetHeader(dataHeader){
    var strHTML = ''
    strHTML += "<td class='text-center textHeadTable'>No.</td>"
    strHTML += "<td class='text-center textHeadTable'>หัวข้อตรวจสอบ</td>"
    strHTML += "<td class='text-center textHeadTable'>รายการ</td>"
    strHTML += "<td class='text-center textHeadTable'>สถานะ</td>"
    strHTML += "<td class='text-center textHeadTable'>Action</td>"
    return strHTML
}
function fnDrawTable(access,objData) {
    
    if (access == 'admin') {
        fnGetDataSelect()
    }
     // Get data selete before create table 
    var strHTML = ''
    var strHTML2 = ''
    var group = ['A','B'] //groups
    var team = 'A'
    var data = objData
    
    data.short = 'test' //make
    strHTML += "<table id='tb_" + group[0] + "' class='table table-hover table-nowrap' width: 100%;>"
    strHTML += "<thead class='table-light'>"
    strHTML += "<tr>"
    strHTML += fnSetHeader(data) 
    strHTML += "</tr>"
    strHTML += "</thead>"
    strHTML += "<tbody>"

    for (var i = 0; i < data.length; i++) {
    strHTML += "<tr>"
    strHTML += "<td id='No" + data[i].short + (i + 1) + "' class='text-center align-middle' style='width: 5%;'>" + (i + 1) + "<input type='hidden' id='idQuota" + data[i].short + (i + 1) + "' value='"+ data[i].tqsc_id +"'/></td>"
    strHTML += "<td id='mainControl" + data[i].short + (i + 1) + "'  class='text-center align-middle' style='width: 55%;white-space: pre-wrap;'>" + (data[i].mainControl ? (data[i].mainControl) : '-') + "</td>"
    strHTML += "<td id='listControl" + data[i].short + (i + 1) + "'  class='text-center align-middle' style='width: 55%;white-space: pre-wrap;'>" + (data[i].listControl ? (data[i].listControl) : '-') + "</td>"
    // 
    if (data[i].status == 'success') {
        strHTML += "<td id='status" + data[i].short + (i + 1) + "'  class='text-center align-middle'style='width: 10%; align-middle'>" + (data[i].id ? "<div class='colorCircle'><span class='badge bg-label-success me-1'>ตรวจเรียบร้อย</span></div>" : '-') + "</td>"
    } else if (data[i].status == 'warning') {
        strHTML += "<td id='status" + data[i].short + (i + 1) + "'  class='text-center align-middle'style='width: 10%; align-middle'>" + (data[i].id ? "<div class='colorCircle'><span class='badge bg-label-warning me-1'>ส่งใหม่อีกครั้ง</span></div>" : '-') + "</td>"
    } else {
        strHTML += "<td id='status" + data[i].short + (i + 1) + "'  class='text-center align-middle'style='width: 10%; align-middle'>" + (data[i].id ? "<div class='colorCircle'><span class='badge bg-label-notprocess me-1'>ยังไม่ดำเนินการ</span></div>" : '-') + "</td>"
    }
    // strHTML += "<td id='status" + data[i].short + (i + 1) + "'  class='text-center align-middle'style='width: 10%; align-middle'>" + (data[i].id ? "<div class='colorCircle'><span class='badge bg-label-primary me-1'>Active</span></div>" : '-') + "</td>"
    strHTML += "<td class='text-center align-middle'>"
    strHTML += "<button id='btnEdit" + data[i].short + (i + 1) + "' type='button' class='btn btn-warning'; onclick='fnEditConfig(\"" + team + "\",\"" + data[i].short + (i + 1) + "\")' style='margin-right: 10px;'>"
    strHTML += "<i class='las la-pen' aria-hidden=;'true'></i>"
    strHTML += "</button>"
    strHTML += "<button id='btnDelete" + data[i].short + (i + 1) + "' type='button' class='btn btn-danger'; onclick='fnSaveEditConfig(\"" + team + "\",\"" + data[i].short + (i + 1) + "\")' style=''>"
    strHTML += "<i class='las la-trash-alt' aria-hidden=;'true'></i>"
    strHTML += "</button>"
    strHTML += "</td>"
    strHTML += "</tr>"
}

strHTML += "</tbody>"
strHTML += "</table>"

    $("#dvContentTable")[0].innerHTML = strHTML

    //merge column
    mergeColumn()
}

function fnGetDataModal() {
    var arrData = fnGetDataInternalControl() // call function get data
    var strHTML = ''
    var strHTML2 = ''

    // draw modal
    strHTML += " <div class='mb-3'> "
    strHTML += " <label for='headCheckTopic' class='lableHead'>หัวข้อที่ตรวจสอบ</label> "
    strHTML += " <input type='text' class='form-control' id='headCheckTopic' value='"+ arrData[0].mainControl +"' readonly> "
    strHTML += " </div> "

    strHTML += " <div class='mb-3'> "
    strHTML += " <label for='nameMenuCheck' class='lableHead'>ชื่อรายการที่ตรวจสอบ</label> "
    strHTML += " <select id='slNameRates' class='form-select' style='width: 466px;white-space: nowrap;'> "
    strHTML += " <option style='width: 100%;white-space: nowrap;' value=''>เลือกรายการที่ตรวจสอบ</option> "
    for (var i = 0; i < arrData.length; i++) {
        strHTML += "<option style='width: 100%white-space: nowrap;' value='" + arrData[i].id +"'>"+ arrData[i].listControl  +"</option>"
    }
    strHTML += " </select> "
    strHTML += " </div> "

    strHTML += " <div> "
    strHTML += "     <label for='exampleInputPassword1' class='lableHead'>เอกสารที่แนบ</label> "
    strHTML += " </div> "
    strHTML += " <div class='mb-3'> "
    strHTML += "     <div class='form-check form-check-inline'> "
    strHTML += "     <input class='form-check-input' type='radio' name='flexRadioDefault' id='radioHaveFile' value='havefile' checked> "
    strHTML += "     <label class='lableInput' for='radioHaveFile'>มีเอกสารที่แนบ</label> "
    strHTML += " </div> "
    strHTML += " <div class='form-check form-check-inline'> "
    strHTML += " <input class='form-check-input' type='radio' name='flexRadioDefault' id='radioNotFile' value='notfile'> "
    strHTML += " <label class='lableInput' for='radioNotFile'>ไม่มีเอกสารที่แนบ</label> "
    strHTML += " </div> "
    strHTML += " </div> "
    strHTML += " <div id='dvuploadfile' class='mb-3'> "
    strHTML += " <label for='formFile' class='lableHead'>ไฟล์ที่แนบ</label> "
    strHTML += " <input class='form-control form-control-sm' id='formFile' type='file'> "
    strHTML += " </div> "


    strHTML2 += " <button type='button' class='btn btn-primary'>บันทึกข้อมูล</button> "
    strHTML2 += " <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>ยกเลิก</button> "            


    // document.getElementById("dvBodyModalAssessment").innerHTML = strHTML
    // document.getElementById("dvFooterModalAssessment").innerHTML = strHTML2
    $("#dvBodyModalAssessment")[0].innerHTML = strHTML
    $("#dvFooterModalAssessment")[0].innerHTML = strHTML2
    
    fnChangeSizeSelect("slNameRates") //ปรับขนาด select
    
}

function fnGetDataSelect() {
    // var arrData = fnGetDataRates() // call function get data
    var strHTML = ''
    var strHTML2 = ''

    // draw modal
    strHTML += "<div class='container' > "
    strHTML += " <div class='row mt-2 mb-3'> "
    strHTML += " <div class='col-sm-3'> "
    strHTML += " <select class='form-select text-center' aria-label='Default select example'> "
    strHTML += " <option selected>หน่วยรับตรวจ</option> "
    strHTML += " </select> "
    strHTML += " </div> "
    strHTML += " <div class='col-sm-3'> "
    strHTML += " <select class='form-select text-center' aria-label='Default select example'> "
    strHTML += " <option selected>สาขาที่ประเมิน</option> "
    strHTML += " </select> "
    strHTML += " </div> "
    strHTML += " <div class='col-sm-3'> "
    strHTML += " <select class='form-select text-center' aria-label='Default select example'> "
    strHTML += " <option selected>ปี 2567</option> "
    strHTML += " </select> "
    strHTML += " </div> "
    strHTML += " <div class='col-sm-3'> "
    strHTML += " <select class='form-select text-center' aria-label='Default select example'> "
    strHTML += " <option selected>สถานะ</option> "
    strHTML += " </select> "
    strHTML += " </div> "
    strHTML += " </div> "
    strHTML += "</div> "  

    // document.getElementById("dvHeadSelectAssessment").innerHTML = strHTML
    $("#dvHeadSelectAssessment")[0].innerHTML = strHTML
    
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

function mergeColumn(){
    var cellsInSecondColumn = $('table tr td:nth-child(2):not(:first-child)');

    // สร้างออบเจ็กต์เพื่อเก็บข้อมูลที่มีอยู่แล้วในคอลัมน์ที่สอง
    var dataSeenInSecondColumn = {};

    // วนลูปผ่านเซลล์ในคอลัมน์ที่สอง
    cellsInSecondColumn.each(function() {
        var cellText = $(this).text();
        // ตรวจสอบว่าข้อมูลในเซลล์มีอยู่ในออบเจ็กต์เราแล้วหรือไม่
        if (dataSeenInSecondColumn.hasOwnProperty(cellText)) {
            // หากมีอยู่แล้ว เพิ่มเนื้อหาของเซลล์นี้ไปยังเซลล์ที่มีข้อมูลเหมือนกัน
            dataSeenInSecondColumn[cellText].rowspan++;
            $(this).hide(); // ซ่อนเซลล์ที่รวมเข้าไป
        } else {
            // หากไม่มีอยู่ในออบเจ็กต์เรา สร้างใหม่และกำหนด rowspan เป็น 1
            dataSeenInSecondColumn[cellText] = {
                element: $(this),
                rowspan: 1
            };
        }
    });

    // อัปเดตค่า rowspan สำหรับเซลล์ที่รวมไว้
    $.each(dataSeenInSecondColumn, function(key, value) {
        value.element.attr('rowspan', value.rowspan);
        value.element.css('vertical-align', 'middle');
    });

    // วนลูปผ่านเซลล์ในคอลัมน์ที่สองโดยไม่รวมเซลล์แรก
    $('table tr td:nth-child(2)').each(function(index, element) {
        if (index !== 0) {
            $(element).css('border', '1px solid black');
        }
    });

    // // ซ่อนทั้งหมดก่อน
    //     $('table tr').hide();

    //     // แสดงแค่ 10 รายการแรก
    //     $('table tr:lt(10)').show();

    //     // เพิ่มปุ่มเพื่อเปลี่ยนหน้า
    //     var currentPage = 1;
    //     var rowsPerPage = 10;
    //     var totalPages = Math.ceil($('table tr').length / rowsPerPage);

    //     // สร้างปุ่ม Previous
    //     $('.card-footer').append('<button id="prevPage">Previous</button>');
    //     $('#prevPage').click(function() {
    //         if (currentPage > 1) {
    //             $('table tr').hide();
    //             $('table tr').slice((currentPage - 2) * rowsPerPage, (currentPage - 1) * rowsPerPage).show();
    //             currentPage--;
    //         }
    //     });

    //     // สร้างปุ่ม Next
    //     $('.card-footer').append('<button id="nextPage">Next</button>');
    //     $('#nextPage').click(function() {
    //         if (currentPage < totalPages) {
    //             $('table tr').hide();
    //             $('table tr').slice(currentPage * rowsPerPage, (currentPage + 1) * rowsPerPage).show();
    //             currentPage++;
    //         }
    //     });
}


