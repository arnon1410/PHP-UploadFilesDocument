<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<div style="padding-left:15px; display: block;">
        <div class="form-group row">
            <label for="statusUser" class="col-xs-3 col-sm-2 col-md-1" style="margin-top: 7px;font-size: 14px;text-align: center;">Team : </label>
            <div class="col-xs-6 col-sm-3 col-md-2">
                <select id="slTEAM" class="form-control" style="width:auto;" onchange="fnSearchTeam(this.value)">
                </select>
            </div>  
            <div class="col-xs-1 col-sm-1 col-md-2">
                <button type="button" class="btn btn-success pull-left" style="margin-left: 30px;">
                    <i class="fa fa-search" aria-hidden="true"></i> Search
                </button>
            </div>   
            <div class="col-xs-1 col-sm-1 col-md-1 d-none">
                <button type="button" class="btn btn-primary pull-right" onclick="fnAddNewTeam()">
                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มทีมใหม่
                </button>
            </div>       
        </div>
        <hr style="margin-top: 5px;margin-bottom: 10px;"/>
          <div style="padding-left:15px; overflow: auto; height:90vh; "  id="dvContent">
            
         
        </div>

        <div class="modal fade" id="dvEditQouta" tabindex="-1" role="dialog"  >
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #034a88;">
                            <h4 class="modal-title text-white" id="h4EditQouta"></h4>
                        </div>
                    
                        <div class="modal-body" id="dvBodyEditQuota">
                            
                        </div>

                        <div class="modal-footer" id="dvFooterEditQuota">

                        </div>

                    </div>
                </div>
            </div>


    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    fnGetdataQuota()

})

function fnGetdataQuota() {
    var data = {timestamp : String(new Date().getTime())}
    fnDrawTeam(data)
    fnDrawOptionTeam(data)
    /*fnAPIPostProxy(apiProxy, data, false, proxyAuthorization.token, proxyAuthorization.keys.screenleadconfig.fnGetDataQuota, hostBaseUrl, function (err, res) {
        if (err) {
            console.log(err)
        } else {
            var result = res.result.data
            fnDrawTeam(result)
            fnDrawOptionTeam(result)
        }
    })*/
}

function fnDrawOptionTeam(resData) {
    var strHTML = "<option value='0' selected>All</option>"

    var arrData = Object.keys(resData)
    for (var i = 0; i < arrData.length; i++) {
        strHTML += "<option value='" + arrData[i].replace(" ", "-") +"'>"+ resData[arrData[i]][0].teamname +"</option>"
    }
    document.getElementById('slTEAM').innerHTML = strHTML
}

function fnDrawTeam(resData) {
    var strHTML = ""
    var arrData = Object.keys(resData)
    for (var i = 0; i < arrData.length; i++) {
        strHTML += "             <div class='form-group row team-data' id='dvTeam-"+ arrData[i].replace(" ", "-") +"'> "
        strHTML += "             <div class='row' >"
        strHTML += "             <div class='col-sm-6'>"
        strHTML += "             <h4 class='header'>" + resData[arrData[i]][0].teamname + "</h4>"
        strHTML += "             </div>"
        strHTML += "             <div class='col-sm-6'>"
        strHTML += "             <button type='button' class='btn btn-primary pull-right' onclick='fnAddNewConfig(\"" + arrData[i].replace(/(\s)/g,'') + "\",\"" + resData[arrData[i]][0].teamname + "\")'>"
        strHTML += "             <i class='fa fa-plus' aria-hidden='true'></i> Add "
        strHTML += "             </button> "
        strHTML += "             </div>"
        strHTML += "             </div>"
        strHTML += "             <div class='row-sm-12'> <hr class='line'> </div>"

        strHTML += "             <div class='row' id='dvTable_" + arrData[i].replace(/(\s)/g,'') + "'>"

        strHTML +=              fnDrawTable(arrData[i],resData[arrData[i]]) 
        strHTML +=              "</div>"
        strHTML += "             </div>"
    }

    document.getElementById("dvContent").innerHTML = strHTML
}

function fnSetHeader(dataHeader) {
    var strHTML = ''
    strHTML += "<td class='text-center' style='width: 5%;font-weight: bold;'>No.</td>"
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Start Date</td>"
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>End Date</td>"
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Workage Start <br>week</td>"
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Workage End <br>week</td>"
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Forcast Lead Start</td>"
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Forcast Lead End</td>"

    if (dataHeader.tqsc_quota_ivr != null && dataHeader.short == 'insurance') {
        strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota Motor</td>"
    }
    if (dataHeader.tqsc_quota_pq != null && dataHeader.short == 'insurance') {
        strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota PQ</td>"
    }
    if (dataHeader.tqsc_quota_db != null && dataHeader.short == 'credit') {
        strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota DB</td>"
    }
    if (dataHeader.tqsc_quota_rn != null && dataHeader.short == 'credit') {
        strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota RN</td>"
    }
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota Reject</td>"
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota Swap</td>"
    strHTML += "<td class='text-center' style='width: 5%;font-weight: bold;'></td>"

    return strHTML

}

function fnDrawTable(teams,data) {
    var arrHeader = Object.keys(data[0])
    var team = teams.replace(/(\s)/g,'')
    var strHTML = ''

    strHTML += "<table id='tb_" + team + "' class='table table-blue table-bordered ' width: 100%;>"
    strHTML += "<thead>"
    strHTML += "<tr>"
    strHTML += fnSetHeader(data[0]) 
    strHTML += "</tr>"
    strHTML += "</thead>"
    strHTML += "<tbody>"

    for (var i = 0; i < data.length; i++) {
        strHTML += "<tr>"
        strHTML += "<td id='No" + data[i].short + (i + 1) + "' class='text-center' style='width: 5%;'>" + (i + 1) + "<input type='hidden' id='idQuota" + data[i].short + (i + 1) + "' value='"+ data[i].tqsc_id +"'/></td>"
        strHTML += "<td id='workStart" + data[i].short + (i + 1) + "' class='text-center' style='width: 10%;'>" + (data[i].tqsc_start_date != null ? fnFormatDateShow(data[i].tqsc_start_date) : '-') + "</td>"
        strHTML += "<td id='workEnd" + data[i].short + (i + 1) + "'  class='text-center' style='width: 10%;'>" + (data[i].tqsc_end_date != null ? fnFormatDateShow(data[i].tqsc_end_date) : '-') + "</td>"
        strHTML += "<td id='workWeekStart" + data[i].short + (i + 1) + "'  class='text-center' style='width: 9%;'>" + (data[i].tqsc_workage_start != null ? data[i].tqsc_workage_start : '-') + "</td>"
        strHTML += "<td id='workWeekEnd" + data[i].short + (i + 1) + "'  class='text-center' style='width: 9%;'>" + (data[i].tqsc_workage_end != null ? data[i].tqsc_workage_end : '-') + "</td>"
        strHTML += "<td id='forcastStart" + data[i].short + (i + 1) + "'  class='text-center' style='width: 9%;'>" + (data[i].tqsc_fc_lead_ok_start != null ? data[i].tqsc_fc_lead_ok_start : '-') + "</td>"
        strHTML += "<td id='forcastEnd" + data[i].short + (i + 1) + "' class='text-center' style='width: 9%;'>" + (data[i].tqsc_fc_lead_ok_end != null ? data[i].tqsc_fc_lead_ok_end : '-') + "</td>"
        
        /* quota */
        if (data[i].tqsc_quota_ivr != null && data[i].short == 'insurance') {
            strHTML += "<td id='quotaMotor" + data[i].short + (i + 1) + "'  class='text-center' style='width: 9%;'>" + (data[i].tqsc_quota_ivr != null ? data[i].tqsc_quota_ivr : '-') + "</td>"
        }
        if (data[i].tqsc_quota_pq != null && data[i].short == 'insurance') {
            strHTML += "<td id='quotaPQ" + data[i].short + (i + 1) + "'  class='text-center' style='width: 9%;'>" + (data[i].tqsc_quota_pq != null ? data[i].tqsc_quota_pq : '-') + "</td>"
        }
        if (data[i].tqsc_quota_db != null && data[i].short == 'credit') {
            strHTML += "<td id='quotaDB" + data[i].short + (i + 1) + "'  class='text-center' style='width: 9%;'>" + (data[i].tqsc_quota_db != null ? data[i].tqsc_quota_db : '-') + "</td>"
        }
        if (data[i].tqsc_quota_rn != null && data[i].short == 'credit') {
            strHTML += "<td id='quotaRN" + data[i].short + (i + 1) + "'  class='text-center' style='width: 9%;'>" + (data[i].tqsc_quota_rn != null ? data[i].tqsc_quota_rn : '-') + "</td>"
        }
        strHTML += "<td id='quotaReject" + data[i].short + (i + 1) + "'  class='text-center' style='width: 9%;'>" + (data[i].tqsc_quota_reject != null ? data[i].tqsc_quota_reject : '-') + "</td>"
        strHTML += "<td id='quotaSwap" + data[i].short + (i + 1) + "'  class='text-center' style='width: 9%;'>" + (data[i].tqsc_quota_swap != null ? data[i].tqsc_quota_swap : '-') + "</td>"

        strHTML += "<td class='text-center' style='width: 5%;'>"
        strHTML += "<button id='btnEdit" + data[i].short + (i + 1) + "' type='button' class='btn btn-warning'; onclick='fnEditConfig(\"" + team + "\",\"" + data[i].short + (i + 1) + "\")' style=''>"
        strHTML += "<i class='fa fa-pencil-square-o' aria-hidden=;'true'></i>"
        strHTML += "</button>"
        strHTML += "<button id='btnSave" + data[i].short + (i + 1) + "' type='button' class='btn btn-primary'; onclick='fnSaveEditConfig(\"" + team + "\",\"" + data[i].short + (i + 1) + "\")' style='display:none'>"
        strHTML += "<i class='fa fa-save' aria-hidden=;'true'></i>"
        strHTML += "</button>"
        strHTML += "</td>"
        strHTML += "</tr>"
        
    }

    strHTML += "</tbody>"
    strHTML += "</table>"

    return strHTML
}


function fnAddNewConfig(teams,teamName) {
    var strHTMLDefault = ''
    var strHTMLDefault2 = ''

    /* set defalut value of ตัวที่จะเพิ่ม */
    var team = teams.replace(/(\s)/g,'')
    var idTBname = 'tb_' + team
    var table = document.getElementById(idTBname);
    var numRow = table.getElementsByTagName('tbody')[0].querySelectorAll("tr").length
    var strEnddateNotNull = false
    var strInputEnddate = ''
    for (var i = 1 ; i <= numRow; i ++) { /* หา enddate is null */
        strInputEnddate = document.getElementById('workEnd' + (team ===  'insurance' ? 'insurance' : 'credit') + i).innerText
        if (strInputEnddate && strInputEnddate === '-') {
            strEnddateNotNull = false
            break;
        } else {
            strEnddateNotNull = true
        }
    }
    var valueFirstEnddate = document.getElementById('workEnd' + (team ===  'insurance' ? 'insurance' : 'credit') + '1').innerText
    var valueLastEnddate = document.getElementById('workEnd' + (team ===  'insurance' ? 'insurance' : 'credit') + numRow).innerText

    if (strEnddateNotNull) { /* check Enddate */
        document.getElementById("h4EditQouta").innerText = 'Add Quota: ' + teamName 
        strHTMLDefault += " <div class='row'> "
        strHTMLDefault += " <div class='col-md-3'> "
        strHTMLDefault += " <b>เงื่อนไขอายุงาน </b></div>" 

        strHTMLDefault += "<div class='col-md-6'>"
        strHTMLDefault += "<div class='col-md-6'>"
        strHTMLDefault += "<input type='radio' id='rdCheckAgeWork"+ team +"' value='1' name='ageWork"+ team +"' onclick='fnChangeInputRadio(this,"+ "\"" + ( team ) + "\"" +","+ "\"ageWork\"" +")'/>"
        strHTMLDefault +=  "<label for='rdCheckAgeWork"+ team +"' style='margin-left: 10px;'>เช็ค</label><br>"
        strHTMLDefault += "</div>"
        strHTMLDefault += "<div class='col-md-6'>"
        strHTMLDefault += "<input type='radio' id='rdUnCheckAgeWork"+ team +"' value='0' name='ageWork"+ team +"' onclick='fnChangeInputRadio(this,"+ "\"" + ( team ) + "\"" +","+ "\"ageWork\"" +")' checked/>"
        strHTMLDefault +=  "<label for='rdUnCheckAgeWork"+ team +"' style='margin-left: 10px;'>ไม่เช็ค</label><br>"
        strHTMLDefault += "</div>"
        strHTMLDefault += "</div>"
        strHTMLDefault += "</div>"

        strHTMLDefault += " <div class='row'> "
        strHTMLDefault += " <div class='col-md-3'> "
        strHTMLDefault += " <b>เงื่อนไข Forcast Lead </b></div>" 
        strHTMLDefault += "<div class='col-md-6'>"
        strHTMLDefault += "<div class='col-md-6'>"
        strHTMLDefault += "<input type='radio' id='rdCheckForcast"+ team +"' class='select-mode'  value='1' name='forcast"+ team +"' onclick='fnChangeInputRadio(this,"+ "\"" + ( team ) + "\"" +","+ "\"forcast\"" +")'/>"
        strHTMLDefault +=  "<label for='rdCheckForcast"+ team +"'  style='margin-left: 10px;'>เช็ค</label><br>"
        strHTMLDefault += "</div>"
        strHTMLDefault += "<div class='col-md-6'>"
        strHTMLDefault += "<input type='radio' id='rdUnCheckForcast"+ team +"' class='select-mode'  value='0' name='forcast"+ team +"' onclick='fnChangeInputRadio(this,"+ "\"" + ( team ) + "\"" +","+ "\"forcast\"" +")' checked/>"
        strHTMLDefault +=  "<label for='rdUnCheckForcast"+ team +"' style='margin-left: 10px;'>ไม่เช็ค</label><br>"
        strHTMLDefault += "</div>"
        strHTMLDefault += "</div>"
        strHTMLDefault += "</div>"

        strHTMLDefault += " <div class='row'> "
        strHTMLDefault += " <div class='col-md-2' style='margin-top: 8px;'><b>วันที่เริ่มใช้งาน</b><span style='color: Red;'> *</span></div>" 
        strHTMLDefault += "<div class='col-md-4'>"
        strHTMLDefault += "<input type='text' class='form-control text-center date'  id='inputStartDatePicker" + team + "' placeholder='dd/mm/yyyy' value='' size='10' style='width: 50%;margin-left: 10px;'>"
        strHTMLDefault += "</div>"
        strHTMLDefault += " <div class='col-md-2' style='margin-top: 8px;'><b>วันที่สิ้นสุด</b></div>" 
        strHTMLDefault += "<div class='col-md-4'>"
        strHTMLDefault += "<input type='text' class='form-control text-center date'  id='inputEndDatePicker" + team + "' placeholder='dd/mm/yyyy' value='' size='10' style='width: 50%;margin-left: 10px;'>"
        strHTMLDefault += "</div>"
        strHTMLDefault += "</div>"

        strHTMLDefault += " <div class='row'> "
        strHTMLDefault += fnCreateTablueNew(team)

        strHTMLDefault += "</div>"

        strHTMLDefault2  += "<button type='button' class='btn btn-success btn-sm' id='save' onclick='fnAddQuotaEachTeam(\"" + team + "\")'> บันทึก </button>"
        strHTMLDefault2  += "<button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'> ยกเลิก</button>"

        document.getElementById("dvBodyEditQuota").innerHTML = strHTMLDefault
        document.getElementById("dvFooterEditQuota").innerHTML = strHTMLDefault2

        $('#dvEditQouta').modal("show");

    } else {
        swal({
            title: "เกิดข้อผิดพลาด",
            text: "ยังไม่มีการระบุ Enddate ไม่สามารถเพิ่มรายการใหม่ได้",
            type: "warning",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ตกลง",
            closeOnConfirm: false
        })
        
    }
    var arrdateEnddate = valueLastEnddate.split("/")
    var dateAddStart = new Date(`${arrdateEnddate[1]}/${arrdateEnddate[0]} /${arrdateEnddate[2]}`)
    dateAddStart.setDate(dateAddStart.getDate() + 1);
    $('#inputStartDatePicker' + team).datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        startDate: dateAddStart
    });

    $('#inputStartDatePicker' + team).change(function () {
        var arrdate = $(this).val().split("/")
       $('#inputEndDatePicker' + team).datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true,
            startDate: new Date(`${arrdate[1]}/${arrdate[0]}/${arrdate[2]}`)
        });
    });
    
}

function fnChangeInputRadio(src, team, diffName) {
    var checkRadio = (src.id.includes('UnCheck') ? true : false)
    if (diffName == 'ageWork') {
        if (checkRadio) {
            document.getElementById("rdCheckAgeWork"+team).checked = false;
            document.getElementById("rdUnCheckAgeWork"+team).checked = true;
        } else {
            document.getElementById("rdCheckAgeWork"+team).checked = true;
            document.getElementById("rdUnCheckAgeWork"+team).checked = false;
        }
    } else {
        if (checkRadio) {
            document.getElementById("rdCheckForcast"+team).checked = false;
            document.getElementById("rdUnCheckForcast"+team).checked = true;
        } else {
            document.getElementById("rdCheckForcast"+team).checked = true;
            document.getElementById("rdUnCheckForcast"+team).checked = false;
        } 
    }

    var idTBname = 'tableNew' + team
    var table = document.getElementById(idTBname);
    var numRow = table.getElementsByTagName('tbody')[0].querySelectorAll("tr").length
    if (diffName == 'ageWork') {
        for (var i = 1 ; i <= numRow; i ++) {
            if (checkRadio){
                document.getElementById("inputAddWorkstart"+ i).readOnly = true;
                document.getElementById("inputAddWorkend"+ i).readOnly = true;
            } else {
                document.getElementById("inputAddWorkstart"+ i).readOnly = false;
                document.getElementById("inputAddWorkend"+ i).readOnly = false;
            }
        }
    } else {
        for (var i = 1 ; i <= numRow; i ++) {
            if (checkRadio){
                document.getElementById("inputAddForcaststart"+ i).readOnly = true;
                document.getElementById("inputAddForcastend"+ i).readOnly = true;
            } else {
                document.getElementById("inputAddForcaststart"+ i).readOnly = false;
                document.getElementById("inputAddForcastend"+ i).readOnly = false;
            }
        }
    }
    var radioCheckAgeWork = document.getElementById("rdCheckAgeWork"+team).checked
    var radioUnCheckAgeWork = document.getElementById("rdUnCheckAgeWork"+team).checked
    var radioCheckForcast = document.getElementById("rdCheckForcast"+team).checked
    var radioUnCheckForcast = document.getElementById("rdUnCheckForcast"+team).checked

    if (!radioCheckAgeWork && radioUnCheckAgeWork && !radioCheckForcast && radioUnCheckForcast) {
        document.getElementById("addTable"+team).style.display = "none";
    } else if (radioCheckAgeWork && !radioUnCheckAgeWork && !radioCheckForcast && radioUnCheckForcast) {
        document.getElementById("addTable"+team).style.display = "";
    } else if (!radioCheckAgeWork && radioUnCheckAgeWork && radioCheckForcast && !radioUnCheckForcast) {
        document.getElementById("addTable"+team).style.display = "";
    } else if (radioCheckAgeWork && !radioUnCheckAgeWork && radioCheckForcast && !radioUnCheckForcast) {
        document.getElementById("addTable"+team).style.display = "";
    }
}

function fnEditConfig(name, team) {
    /* call api ก่อน check ข้อมูลก่อนจะแก้ไข */
    var strQuotaSpread = false
    var strQuotaMotor = false
    var strQuotaPQ = false
    var strQuotaDB = false
    var strQuotaRN = false
    var strQuotaSwap = false
    var textworkStart = document.getElementById("workStart" + team).innerText;

    document.getElementById("btnEdit" + team).style.display = "none";
    document.getElementById("btnSave" + team).style.display = "";
    

    var checkStartDate = fnFormatDateSet(document.getElementById("workStart" + team).innerHTML) /* วันเริ่มต้น */
    if (checkStartDate >= 1) {  
        /* startdate เลยมาแล้ว */
        var inputWorkend = document.getElementById("workEnd" + team);
        inputWorkend.innerHTML = "<input type='text' class='form-control text-center date'  id='inputWorkendText" + team + "' placeholder='dd/mm/yyyy' value='" + (inputWorkend.innerHTML != '-' ? inputWorkend.innerHTML : '') + "' size='10'>";
    } else if (checkStartDate <= -1 ) { 
        /* startdate ยังไม่ถึง */
            var inputWorkstart = document.getElementById("workStart" + team);
            var inputWorkend = document.getElementById("workEnd" + team);
            var inputWorkWeekstart = document.getElementById("workWeekStart" + team);
            var inputWorkWeekend = document.getElementById("workWeekEnd" + team);
            var inputForcaststart = document.getElementById("forcastStart" + team);
            var inputForcastend = document.getElementById("forcastEnd" + team);
            var inputQuotareject = document.getElementById("quotaReject" + team);
            var inputQuotaswap = document.getElementById("quotaSwap" + team);

            inputWorkstart.innerHTML = "<input type='text' class='form-control text-center date'  id='inputWorkstartText" + team + "' placeholder='dd/mm/yyyy' value='" + (inputWorkstart.innerHTML != '-' ? inputWorkstart.innerHTML : '') + "' size='10'>";
            inputWorkend.innerHTML = "<input type='text' class='form-control text-center date'  id='inputWorkendText" + team + "' placeholder='dd/mm/yyyy' value='" + (inputWorkend.innerHTML != '-' ? inputWorkend.innerHTML : '') + "' size='10'>";
            inputWorkWeekstart.innerHTML = "<input type='text'  class='form-control text-center' id='inputWorkWeekstartText" + team + "' value='" + inputWorkWeekstart.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
            inputWorkWeekend.innerHTML = "<input type='text'  class='form-control text-center' id='inputWorkWeekendText" + team + "' value='" + inputWorkWeekend.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
            inputForcaststart.innerHTML = "<input type='text'  class='form-control text-center' id='inputForcaststartText" + team + "' value='" + inputForcaststart.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
            inputForcastend.innerHTML = "<input type='text'  class='form-control text-center' id='inputForcastendText" + team + "' value='" + inputForcastend.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
            inputQuotareject.innerHTML = "<input type='text'  class='form-control text-center' id='inputQuotarejectText" + team + "' value='" + inputQuotareject.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
            inputQuotaswap.innerHTML = "<input type='text' class='form-control text-center' id='inputQuotaswapText" + team + "' value='" + inputQuotaswap.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
        
            if (name == 'insurance') { /* insurance */
                var inputQuotamotor = document.getElementById("quotaMotor" + team);
                var inputQuotaPQ = document.getElementById("quotaPQ" + team);
                inputQuotamotor.innerHTML = "<input type='text'  class='form-control text-center' id='inputQuotamotorText" + team + "' value='" + inputQuotamotor.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
                inputQuotaPQ.innerHTML = "<input type='text' class='form-control text-center' id='inputQuotaPQText" + team + "' value='" + inputQuotaPQ.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
                
            }
            if (name == 'screencredit') { /* credit */
                var inputQuotaDB = document.getElementById("quotaDB" + team)
                var inputQuotaRN = document.getElementById("quotaRN" + team)
                inputQuotaDB.innerHTML = "<input type='text'  class='form-control text-center' id='inputQuotaDBText" + team + "' value='" + inputQuotaDB.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
                inputQuotaRN.innerHTML = "<input type='text' class='form-control text-center'  id='inputQuotaRNText" + team + "' value='" + inputQuotaRN.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
            }
    } else {  
        /* startdate วันนี้ */

        if (!strQuotaSpread) { /* ยังแจกไม่ครบแล้ว */
            var inputWorkstart = document.getElementById("workStart" + team);
            var inputWorkend = document.getElementById("workEnd" + team);
            var inputWorkWeekstart = document.getElementById("workWeekStart" + team);
            var inputWorkWeekend = document.getElementById("workWeekEnd" + team);
            var inputForcaststart = document.getElementById("forcastStart" + team);
            var inputForcastend = document.getElementById("forcastEnd" + team);
            var inputQuotareject = document.getElementById("quotaReject" + team);
            var inputQuotaswap = document.getElementById("quotaSwap" + team);

            inputWorkstart.innerHTML = "<input type='text' class='form-control text-center date'  id='inputWorkstartText" + team + "' placeholder='dd/mm/yyyy' value='" + (inputWorkstart.innerHTML != '-' ? inputWorkstart.innerHTML : '') + "' size='10' readonly>";
            inputWorkend.innerHTML = "<input type='text' class='form-control text-center date'  id='inputWorkendText" + team + "' placeholder='dd/mm/yyyy' value='" + (inputWorkend.innerHTML != '-' ? inputWorkend.innerHTML : '') + "' size='10'>";
            inputWorkWeekstart.innerHTML = "<input type='text'  class='form-control text-center' id='inputWorkWeekstartText" + team + "' value='" + inputWorkWeekstart.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
            inputWorkWeekend.innerHTML = "<input type='text'  class='form-control text-center' id='inputWorkWeekendText" + team + "' value='" + inputWorkWeekend.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
            inputForcaststart.innerHTML = "<input type='text'  class='form-control text-center' id='inputForcaststartText" + team + "' value='" + inputForcaststart.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
            inputForcastend.innerHTML = "<input type='text'  class='form-control text-center' id='inputForcastendText" + team + "' value='" + inputForcastend.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
            inputQuotareject.innerHTML = "<input type='text'  class='form-control text-center' id='inputQuotarejectText" + team + "' value='" + inputQuotareject.innerHTML + "' size='5' onkeyup='fnCheckNumbers(this)'> ";
            inputQuotaswap.innerHTML = "<input type='text' class='form-control text-center' id='inputQuotaswapText" + team + "' value='" + inputQuotaswap.innerHTML + "' size='5' "+( strQuotaSwap ? 'readonly' : "")+" onkeyup='fnCheckNumbers(this)'> "; /* check quota swap*/
        
            if (name == 'insurance') { /* insurance */
                var inputQuotamotor = document.getElementById("quotaMotor" + team);
                var inputQuotaPQ = document.getElementById("quotaPQ" + team);
                inputQuotamotor.innerHTML = "<input type='text'  class='form-control text-center' id='inputQuotamotorText" + team + "' value='" + inputQuotamotor.innerHTML + "' size='5' "+( strQuotaMotor ? 'readonly' : "")+" onkeyup='fnCheckNumbers(this)'> "; /* check quota moter*/
                inputQuotaPQ.innerHTML = "<input type='text' class='form-control text-center' id='inputQuotaPQText" + team + "' value='" + inputQuotaPQ.innerHTML + "' size='5' "+( strQuotaPQ ? 'readonly' : "")+" onkeyup='fnCheckNumbers(this)'> "; /* check quota pq*/
            }
            if (name == 'screencredit') { /* credit */
                var inputQuotaDB = document.getElementById("quotaDB" + team)
                var inputQuotaRN = document.getElementById("quotaRN" + team)
                inputQuotaDB.innerHTML = "<input type='text'  class='form-control text-center' id='inputQuotaDBText" + team + "' value='" + inputQuotaDB.innerHTML + "' size='5' "+( strQuotaDB ? 'readonly' : "")+" onkeyup='fnCheckNumbers(this)'> "; /* check quota db*/
                inputQuotaRN.innerHTML = "<input type='text' class='form-control text-center'  id='inputQuotaRNText" + team + "' value='" + inputQuotaRN.innerHTML + "' size='5' "+( strQuotaRN ? 'readonly' : "")+" onkeyup='fnCheckNumbers(this)'> "; /* check quota rn*/
            }
        } else { /* แจกครบแล้ว */
            document.getElementById("btnEdit" + team).style.display = "";
            document.getElementById("btnSave" + team).style.display = "none";
            swal({
            title: "",
            text: "ไม่สามารถเนื่องจากแจกลิสต์ครบแล้ว",
            type: "warning",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ตกลง",
            closeOnConfirm: false
        })
        }
    }

    $(inputWorkstart).find('.date').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        startDate: new Date(),

    });
    var formattextworkStart = ''
    if (checkStartDate <= 0 ){
        formattextworkStart = textworkStart.split("/")
        formattextworkStart = new Date(`${formattextworkStart[1]}/${formattextworkStart[0]}/${formattextworkStart[2]}`)
    } else {
        formattextworkStart = new Date()
    }
    
    $(inputWorkend).find('.date').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        startDate: formattextworkStart
    });


    $('#inputWorkstartText' + team).change(function () {
        var arrdate = $(this).val().split("/")
       $('#inputWorkendText' + team).datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true,
            startDate: new Date(`${arrdate[1]}/${arrdate[0]}/${arrdate[2]}`)
        });
    });


}

function fnSaveEditConfig(name,team) {
    var checkStartDate = fnFormatDateSet(document.getElementById("workStart" + team).innerHTML) /* วันเริ่มต้น */
    var data = {timestamp : String(new Date().getTime())}
    data.idquota = document.getElementById('idQuota' + team).value
    data.team = (name === 'insurance' ? 'insurance' : 'screen credit')
    data.code = $.cookie('code')
    if (checkStartDate >= 1) {  
        /* startdate เลยมาแล้ว */
        var WorkageendNew = document.getElementById("inputWorkendText" + team).value
        data.typestartdate = 'before'
        data.workend = (WorkageendNew && WorkageendNew != '-' ? fnFormatDateToSent(WorkageendNew) : null);
        document.getElementById("workEnd" + team).innerHTML = (WorkageendNew ? WorkageendNew : '-');
    } else if (checkStartDate <= -1 ) {
        /* startdate ยังไม่ถึง */
        var WorkagestartNew = document.getElementById("inputWorkstartText" + team).value
        var WorkageendNew = document.getElementById("inputWorkendText" + team).value
        var WorkWeekStartNew = document.getElementById("inputWorkWeekstartText" + team).value;
        var WorkWeekEndNew = document.getElementById("inputWorkWeekendText" + team).value;
        var ForcaststartNew = document.getElementById("inputForcaststartText" + team).value;
        var ForcastendNew = document.getElementById("inputForcastendText" + team).value;
        var QuotarejectNew = document.getElementById("inputQuotarejectText" + team).value;
        var QuotaswapNew = document.getElementById("inputQuotaswapText" + team).value;
        
        data.typestartdate = 'after'
        data.workstart = (WorkagestartNew  && WorkagestartNew != '-' ? fnFormatDateToSent(WorkagestartNew) : null);
        data.workend = (WorkageendNew && WorkageendNew != '-' ? fnFormatDateToSent(WorkageendNew) : null);
        data.workagestart = (WorkWeekStartNew && WorkWeekStartNew != '-' ? WorkWeekStartNew : null);
        data.workageend = (WorkWeekEndNew && WorkWeekEndNew != '-' ? WorkWeekEndNew : null);
        data.forcaststart = (ForcaststartNew && ForcaststartNew != '-' ? ForcaststartNew : null);
        data.forcastend = (ForcastendNew && ForcastendNew != '-' ? ForcastendNew : null);
        data.quotareject = (QuotarejectNew && QuotarejectNew != '-' ? QuotarejectNew : null);
        data.quotaswap = (QuotaswapNew && QuotaswapNew != '-' ? QuotaswapNew : null);

        document.getElementById("workStart" + team).innerHTML = (WorkagestartNew ? WorkagestartNew : '-');
        document.getElementById("workEnd" + team).innerHTML = (WorkageendNew ? WorkageendNew : '-');
        document.getElementById("workWeekStart" + team).innerHTML = (WorkWeekStartNew ? WorkWeekStartNew : '-');
        document.getElementById("workWeekEnd" + team).innerHTML = (WorkWeekEndNew ? WorkWeekEndNew : '-');
        document.getElementById("forcastStart" + team).innerHTML = (ForcaststartNew ? ForcaststartNew : '-');
        document.getElementById("forcastEnd" + team).innerHTML = (ForcastendNew ? ForcastendNew : '-');
        document.getElementById("quotaReject" + team).innerHTML = (QuotarejectNew ? QuotarejectNew : '-');
        document.getElementById("quotaSwap" + team).innerHTML = (QuotaswapNew ? QuotaswapNew : '-');

        if (name == 'insurance') { /* insurance */
            var QuotamotorNew = document.getElementById("inputQuotamotorText" + team).value;
            var QuotaPQNew = document.getElementById("inputQuotaPQText" + team).value;
            data.quotamotor = (QuotamotorNew && QuotamotorNew != '-' ? QuotamotorNew : null);
            data.quotapq = (QuotaPQNew && QuotaPQNew != '-' ? QuotaPQNew : null);
            document.getElementById("quotaMotor" + team).innerHTML = (QuotamotorNew ? QuotamotorNew : '-');
            document.getElementById("quotaPQ" + team).innerHTML = (QuotaPQNew ? QuotaPQNew : '-');
        }
        if (name == 'screencredit') { /* credit */
            var QuotaDBNew = document.getElementById("inputQuotaDBText" + team).value;
            var QuotaRNNew = document.getElementById("inputQuotaRNText" + team).value;
            data.quotadb = (QuotaDBNew && QuotaDBNew != '-' ? QuotaDBNew : null);
            data.quotarn = (QuotaRNNew && QuotaRNNew != '-' ? QuotaRNNew : null);
            document.getElementById("quotaDB" + team).innerHTML = (QuotaDBNew ? QuotaDBNew : '-');
            document.getElementById("quotaRN" + team).innerHTML = (QuotaRNNew ? QuotaRNNew : '-');
        }
    } else {
        /* startdate วันนี้ */
        var WorkagestartNew = document.getElementById("inputWorkstartText" + team).value
        var WorkageendNew = document.getElementById("inputWorkendText" + team).value
        var WorkWeekStartNew = document.getElementById("inputWorkWeekstartText" + team).value;
        var WorkWeekEndNew = document.getElementById("inputWorkWeekendText" + team).value;
        var ForcaststartNew = document.getElementById("inputForcaststartText" + team).value;
        var ForcastendNew = document.getElementById("inputForcastendText" + team).value;
        var QuotarejectNew = document.getElementById("inputQuotarejectText" + team).value;
        var QuotaswapNew = document.getElementById("inputQuotaswapText" + team).value;
        
        data.typestartdate = 'today'
        data.workstart = (WorkagestartNew && WorkagestartNew != '-' ? fnFormatDateToSent(WorkagestartNew) : null);
        data.workend = (WorkageendNew && WorkageendNew != '-' ? fnFormatDateToSent(WorkageendNew) : null);
        data.workagestart = (WorkWeekStartNew && WorkWeekStartNew != '-' ? WorkWeekStartNew : null);
        data.workageend = (WorkWeekEndNew && WorkWeekEndNew != '-' ? WorkWeekEndNew : null);
        data.forcaststart = (ForcaststartNew && ForcaststartNew != '-' ? ForcaststartNew : null);
        data.forcastend = (ForcastendNew && ForcastendNew != '-' ? ForcastendNew : null);
        data.quotareject = (QuotarejectNew && QuotarejectNew != '-' ? QuotarejectNew : null);
        data.quotaswap = (QuotaswapNew && QuotaswapNew != '-' ? QuotaswapNew : null);

        document.getElementById("workStart" + team).innerHTML = (WorkagestartNew ? WorkagestartNew : '-');
        document.getElementById("workEnd" + team).innerHTML = (WorkageendNew ? WorkageendNew : '-');
        document.getElementById("workWeekStart" + team).innerHTML = (WorkWeekStartNew ? WorkWeekStartNew : '-');
        document.getElementById("workWeekEnd" + team).innerHTML = (WorkWeekEndNew ? WorkWeekEndNew : '-');
        document.getElementById("forcastStart" + team).innerHTML = (ForcaststartNew ? ForcaststartNew : '-');
        document.getElementById("forcastEnd" + team).innerHTML = (ForcastendNew ? ForcastendNew : '-');
        document.getElementById("quotaReject" + team).innerHTML = (QuotarejectNew ? QuotarejectNew : '-');
        document.getElementById("quotaSwap" + team).innerHTML = (QuotaswapNew ? QuotaswapNew : '-');
        
        if (name == 'insurance') { /* insurance */
            var QuotamotorNew = document.getElementById("inputQuotamotorText" + team).value;
            var QuotaPQNew = document.getElementById("inputQuotaPQText" + team).value;
            data.quotamotor = (QuotamotorNew ? QuotamotorNew : null);
            data.quotapq = (QuotaPQNew ? QuotaPQNew : null);
            document.getElementById("quotaMotor" + team).innerHTML = (QuotamotorNew ? QuotamotorNew : '-');
            document.getElementById("quotaPQ" + team).innerHTML = (QuotaPQNew ? QuotaPQNew : '-');
        }

        if (name == 'screencredit') { /* credit */
            var QuotaDBNew = document.getElementById("inputQuotaDBText" + team).value;
            var QuotaRNNew = document.getElementById("inputQuotaRNText" + team).value;
            data.quotadb = (QuotaDBNew ? QuotaDBNew : null);
            data.quotarn = (QuotaRNNew ? QuotaRNNew : null);
            document.getElementById("quotaDB" + team).innerHTML = (QuotaDBNew ? QuotaDBNew : '-');
            document.getElementById("quotaRN" + team).innerHTML = (QuotaRNNew ? QuotaRNNew : '-');
        }
    }
    /* start call api edit data */
    /*fnAPIPostProxy(apiProxy, data, false, proxyAuthorization.token, proxyAuthorization.keys.screenleadconfig.fnEditQuotaOld, hostBaseUrl, function (err, res) {
        if (err) {
            console.log(err)
        } else {
            swal({
                    title: "",
                    text: "บันทึกข้อมูลเรียบร้อยแล้ว",
                    type: "success",
                    confirmButtonText: "ตกลง",
                },
                function () {
                    fnGetdataQuota()
                });
        }
    })*/
    /* end call api edit data */
    document.getElementById("btnEdit" + team).style.display = "";
    document.getElementById("btnSave" + team).style.display = "none";
}

function fnSearchTeam(team) {
    if (team != "0") {
        $(".team-data").addClass("d-none")
        $("#dvTeam-"+team).removeClass("d-none")
    } else {
        $(".team-data").removeClass("d-none")
    }
}

function fnSetHeaderNew(team) {
    var strHTML = ''
    /*strHTML += "<td class='text-center' style='width: 5%;font-weight: bold;'>No.</td>" */
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Workage Start <br>week</td>"
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Workage End <br>week</td>"
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Forcast Lead Start</td>"
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Forcast Lead End</td>"
    if (team ===  'insurance') {
        strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota Motor</td>"
        strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota PQ</td>"
    }
    if (team ===  'screencredit') {
            strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota DB</td>"
            strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota RN</td>"
    }

    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota Reject</td>"
    strHTML += "<td class='text-center' style='width: 9%;font-weight: bold;'>Quota Swap</td>"
    strHTML += "<td class='text-center' style='width: 5%;font-weight: bold;'><div id='divAddTable'>"
    strHTML += "<button type='button' class='btn btn-primary' value='1' id='addTable"+team+"' style='padding:10px; display:none;' onclick='fnAddRowinTable(\"" + team + "\")'><i class='fa fa-plus' aria-hidden='true'></i></button>"
    strHTML += "</div></td>"

    return strHTML
}

function fnCreateTablueNew(team) { /* table to add data */
    var strHTML = ''
    strHTML += "<table id='tableNew"+ team + "' class='table table-blue table-bordered ' width: 100%; style='margin-top: 20px;'>"
    strHTML += "<thead>"
    strHTML += "<tr>"
    strHTML += fnSetHeaderNew(team) 
    strHTML += "</tr>"
    strHTML += "</thead>"
    strHTML += "<tbody>"

        strHTML += "<tr>"
        strHTML += "<td class='text-center' style='width: 9%;'><input type='text' id='inputAddWorkstart1' class='form-control mr-1 numbers' style='text-align:center;' maxlength='10' value='0' onkeyup='fnCheckNumbers(this)' readonly></td>"
        strHTML += "<td class='text-center' style='width: 9%;'><input type='text' id='inputAddWorkend1' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='10' value='999' onkeyup='fnCheckNumbers(this)' readonly></td>"
        strHTML += "<td class='text-center' style='width: 9%;'><input type='text' id='inputAddForcaststart1' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='10' value='0' onkeyup='fnCheckNumbers(this)' readonly></td>"
        strHTML += "<td class='text-center' style='width: 9%;'><input type='text' id='inputAddForcastend1' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='10' value='9999' onkeyup='fnCheckNumbers(this)' readonly></td>"

        if (team ===  'insurance') {
            strHTML += "<td class='text-center' style='width: 9%;'><input type='text' id='inputAddQuotamotor1' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='10' value='0' onkeyup='fnCheckNumbers(this)'></td>"
            strHTML += "<td class='text-center' style='width: 9%;'><input type='tex' id='inputAddQuotaPQ1' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='10' value='0' onkeyup='fnCheckNumbers(this)'></td>"
        }
        if (team === 'screencredit') {
        
            strHTML += "<td class='text-center' style='width: 9%;'><input type='text' id='inputAddQuotaDB1' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='10' value='0' onkeyup='fnCheckNumbers(this)'></td>"
            strHTML += "<td class='text-center' style='width: 9%;'><input type='text' id='inputAddQuotaRN1' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='10' value='0' onkeyup='fnCheckNumbers(this)'></td>"
        }
        strHTML += "<td class='text-center' style='width: 9%;'><input type='text' id='inputAddQuotareject1' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='10' value='0' onkeyup='fnCheckNumbers(this)'></td>"
        strHTML += "<td class='text-center' style='width: 9%;'><input type='text' id='inputAddQuotaswap1' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='10' value='0' onkeyup='fnCheckNumbers(this)'></td>"
        strHTML += "<td class='text-center' style='width: 3%;'>" 
        strHTML += "<button type='button' class='btn btn-danger' value='1' id='inputRemove' style='padding:10px;' onclick='fnDeleteRowforAdd(this,"+ "\"" + ( team ) + "\"" +")'><i class='fa fa-remove' aria-hidden='true'></i></button>"
        strHTML += "</td></tr>"
                                        
    strHTML += "</tbody>"
    strHTML += "</table>"

    return strHTML

}

function fnAddRowinTable(team) {
    var idTBname = 'tableNew' + team
    var table = document.getElementById(idTBname);
    var numRow = table.getElementsByTagName('tbody')[0].querySelectorAll("tr").length + 1
    var row = table.insertRow()
    var inputAddWorkstart = document.getElementById("inputAddWorkstart1").readOnly
    var inputAddForcaststart = document.getElementById("inputAddForcaststart1").readOnly
    var cell
    /*
    cell = row.insertCell()
    cell.innerHTML = numRow
    cell.className = 'text-center'
    */

    cell = row.insertCell()
    cell.innerHTML = "<input type='text' id='inputAddWorkstart"+ ( numRow ) +"' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='3' value='0' onkeyup='fnCheckNumbers(this)' "+ (inputAddWorkstart ? 'readonly': '')+">"

    cell = row.insertCell()
    cell.innerHTML = "<input type='text' id='inputAddWorkend"+ ( numRow ) +"' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='3' value='999' onkeyup='fnCheckNumbers(this)' "+ (inputAddWorkstart ? 'readonly': '')+">"

    cell = row.insertCell()
    cell.innerHTML = "<input type='text' id='inputAddForcaststart"+ ( numRow ) +"' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='4' value='0' onkeyup='fnCheckNumbers(this)' "+ (inputAddForcaststart ? 'readonly': '')+">"

    cell = row.insertCell()
    cell.innerHTML = "<input type='text' id='inputAddForcastend"+ ( numRow ) +"' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='4' value='9999' onkeyup='fnCheckNumbers(this)' "+ (inputAddForcaststart ? 'readonly': '')+">"

    if (team ===  'insurance') {
        cell = row.insertCell()
        cell.innerHTML = "<input type='text' id='inputAddQuotamotor"+ ( numRow ) +"' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='3' value='0' onkeyup='fnCheckNumbers(this)'>"
        cell = row.insertCell()
        cell.innerHTML = "<input type='text' id='inputAddQuotaPQ"+ ( numRow ) +"' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='3' value='0' onkeyup='fnCheckNumbers(this)'>"
    }
    if (team ===  'screencredit') {
        cell = row.insertCell()
        cell.innerHTML = "<input type='text' id='inputAddQuotaDB"+ ( numRow ) +"' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='3' value='0' onkeyup='fnCheckNumbers(this)'>"
        cell = row.insertCell()
        cell.innerHTML = "<input type='text' id='inputAddQuotaRN"+ ( numRow ) +"' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='3' value='0' onkeyup='fnCheckNumbers(this)'>"
    }
        cell = row.insertCell()
        cell.innerHTML = "<input type='text' id='inputAddQuotareject"+ ( numRow ) +"' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='3' value='0' onkeyup='fnCheckNumbers(this)'>"
        cell = row.insertCell()
        cell.innerHTML = "<input type='text' id='inputAddQuotaswap"+ ( numRow ) +"' class='form-control mr-1 numbers'  style='text-align:center;' maxlength='3' value='0' onkeyup='fnCheckNumbers(this)'>"
    
    cell = row.insertCell()
    cell.className = 'text-center'
    cell.innerHTML += "<button type='button' class='btn btn-danger' value='1' id='inputRemove"+ ( numRow ) +"' style='padding:10px;' onclick='fnDeleteRowforAdd(this,"+ "\"" + ( team ) + "\"" +")'><i class='fa fa-remove' aria-hidden='true'></i></button>"
}

function fnDeleteRowforAdd(r, team) {
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("tableNew" + team).deleteRow(i);
}

function fnAddQuotaEachTeam(team) { /* ส่วนเพิ่มข้อมูล */
    var checkStartDate = document.getElementById('inputStartDatePicker' + team).value
    var idTBname = 'tableNew' + team
    var table = document.getElementById(idTBname);
    var numRow = table.getElementsByTagName('tbody')[0].querySelectorAll("tr").length
    if (numRow !== 0) {
        if (checkStartDate) {
        var arr = []
        var data = {}

        var radioCheckAgeWork = document.getElementById("rdCheckAgeWork"+team).checked
        var radioUnCheckAgeWork = document.getElementById("rdUnCheckAgeWork"+team).checked
        var radioCheckForcast = document.getElementById("rdCheckForcast"+team).checked
        var radioUnCheckForcast = document.getElementById("rdUnCheckForcast"+team).checked
        var inputStartDate = document.getElementById('inputStartDatePicker' + team).value
        var inputEndDate = document.getElementById('inputEndDatePicker' + team).value
        var strCheckWorkAge = ''
        var strCheckForcast = ''

        if (radioUnCheckAgeWork && !radioCheckAgeWork) {
            strCheckWorkAge = '0'
        } else {
            strCheckWorkAge = '1'
        }
        if (radioUnCheckForcast && !radioCheckForcast) {
            strCheckForcast = '0'
        } else {
            strCheckForcast = '1'
        }

        if (team === 'insurance') {
            for (var i = 1 ; i <= numRow; i ++) {
                data = {}
                data.team = 'insurance'
                data.code = $.cookie('code')
                data.workstart = fnFormatDateToSent(inputStartDate)
                data.workend = (inputEndDate != '' ? fnFormatDateToSent(inputEndDate) : '')
                data.workagestart = document.getElementById('inputAddWorkstart' + i).value
                data.workageend = document.getElementById('inputAddWorkend' + i).value
                data.forcaststart = document.getElementById('inputAddForcaststart' + i).value
                data.forcastend = document.getElementById('inputAddForcastend' + i).value
                data.quotamotor = document.getElementById('inputAddQuotamotor' + i).value
                data.quotapq = document.getElementById('inputAddQuotaPQ' + i).value
                data.quotareject = document.getElementById('inputAddQuotareject' + i).value
                data.quotaswap = document.getElementById('inputAddQuotaswap' + i).value
                data.checkworkage = strCheckWorkAge
                data.checkforcast = strCheckForcast
                arr.push(data)
            }
        
        } else if (team === 'screencredit') {
            for (var i = 1 ; i <= numRow; i ++) {
                data = {}
                data.team = 'screen credit'
                data.code = $.cookie('code')
                data.workstart = fnFormatDateToSent(inputStartDate)
                data.workend = (inputEndDate ? fnFormatDateToSent(inputEndDate) : '')
                data.workagestart = document.getElementById('inputAddWorkstart' + i).value
                data.workageend = document.getElementById('inputAddWorkend' + i).value
                data.forcaststart = document.getElementById('inputAddForcaststart' + i).value
                data.forcastend = document.getElementById('inputAddForcastend' + i).value
                data.quotadb = document.getElementById('inputAddQuotaDB' + i).value
                data.quotarn = document.getElementById('inputAddQuotaRN' + i).value
                data.quotareject = document.getElementById('inputAddQuotareject' + i).value
                data.quotaswap = document.getElementById('inputAddQuotaswap' + i).value
                data.checkworkage = strCheckWorkAge
                data.checkforcast = strCheckForcast
                arr.push(data)
            
            }
        
        }

        var dataArray = {
            dataArr : arr,
            timestamp : String(new Date().getTime())
        }
            /*fnAPIPostProxy(apiProxy, dataArray, false, proxyAuthorization.token, proxyAuthorization.keys.screenleadconfig.fnSetQuotaNew, hostBaseUrl, function (err, res) {
                if (err) {
                    console.log(err)
                } else {
                    swal({
                        title: "",
                        text: "บันทึกข้อมูลเรียบร้อยแล้ว",
                        type: "success",
                        confirmButtonText: "ตกลง",
                    },
                    function () {
                        fnGetdataQuota()
                        $('#dvEditQouta').modal("hide");
                    });
                }
            })*/
        } else {
            swal({
                title: "",
                text: "กรุณากรอกวันที่เริ่มใช้งาน",
                type: "warning",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "ตกลง",
                closeOnConfirm: false
            })
        }
    } else {
        swal({
                title: "เกิดข้อมูลผิดพลาด",
                text: "กรุณากรอกข้อมูลให้ครบ",
                type: "warning",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "ตกลง",
                },
                function () {
                    $('#dvEditQouta').modal("hide");
                });
    }
}
function fnCheckNumbers(ele) {
    var value = ele.value
    if (/\D/g.test(value)) {
		value = value.replace(/\D/g, '');
	}
    $("#" + ele.id).val(value)
    return value
}

</script>
</html>