function fnGetAllUrlParams(url) {

    // get query string from url (optional) or window
    var queryString = url ? url.split('?')[1] : window.location.search.slice(1);
  
    // we'll store the parameters here
    var obj = {};
  
    // if query string exists
    if (queryString) {
  
      // stuff after # is not part of query string, so get rid of it
      queryString = queryString.split('#')[0];
  
      // split our query string into its component parts
      var arr = queryString.split('&');
  
      for (var i = 0; i < arr.length; i++) {
        // separate the keys and the values
        var a = arr[i].split('=');
  
        // set parameter name and value (use 'true' if empty)
        var paramName = a[0];
        var paramValue = typeof (a[1]) === 'undefined' ? true : a[1];
  
        // (optional) keep case consistent
        paramName = paramName.toLowerCase();
        if (typeof paramValue === 'string') paramValue = paramValue.toLowerCase();
  
        // if the paramName ends with square brackets, e.g. colors[] or colors[2]
        if (paramName.match(/\[(\d+)?\]$/)) {
  
          // create key if it doesn't exist
          var key = paramName.replace(/\[(\d+)?\]/, '');
          if (!obj[key]) obj[key] = [];
  
          // if it's an indexed array e.g. colors[2]
          if (paramName.match(/\[\d+\]$/)) {
            // get the index value and add the entry at the appropriate position
            var index = /\[(\d+)\]/.exec(paramName)[1];
            obj[key][index] = paramValue;
          } else {
            // otherwise add the value to the end of the array
            obj[key].push(paramValue);
          }
        } else {
          // we're dealing with a string
          if (!obj[paramName]) {
            // if it doesn't exist, create property
            obj[paramName] = paramValue;
          } else if (obj[paramName] && typeof obj[paramName] === 'string'){
            // if property does exist and it's a string, convert it to an array
            obj[paramName] = [obj[paramName]];
            obj[paramName].push(paramValue);
          } else {
            // otherwise add the property
            obj[paramName].push(paramValue);
          }
        }
      }
    }
  
    return obj;
}

function fnStringToInt(str) {
    return parseInt(str, 10);
}

function fnConvertToThaiNumeralsAndPoint(number) {
    const thaiNumerals = ['๐', '๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙'];

    // แปลงเป็น string ก่อนหากต้องการรองรับทั้งตัวเลขและสตริงที่มีจุดทศนิยม
    const numberString = number.toString(); // แปลงเป็น string โดยตรง

    // แยกแต่ละตัวเลขแล้วแปลงเป็นตัวอักษรเลขไทย
    const thaiNumeralsString = numberString.split('').map(digit => {
        if (digit === '.') {
            return '.'; // ถ้าเจอจุดทศนิยมให้คงค่าเดิม
        } else {
            return thaiNumerals[parseInt(digit)]; // แปลงตัวเลขเป็นตัวอักษรเลขไทย
        }
    }).join('');

    return thaiNumeralsString;
}

function fnConvertToArabicNumerals(thaiNumber) {
    const arabicNumerals = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    const thaiNumerals = ['๐', '๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙'];
    return thaiNumber.split('').map(digit => arabicNumerals[thaiNumerals.indexOf(digit)]).join('');
}

function fnGetParameterByName(name) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(window.location.href);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function fnCheckUserAuthen(authen) {
    /* start ส่วนของสิทธิผู้ใช้งาน */
    var valAccess = authen || ''
    var strAccess = ''
    var strName = ''
  
    if (valAccess)  {
        if (valAccess == 'admin') {
            strAccess = " หน่วยตรวจสอบ<span class='las la-chart-line'></span>"
            strName = "กรมจเรทหารเรือ"
        } else {
            strAccess = " หน่วยรับตรวจ<span class='las la-chart-line'></span>"
            strName = "กรมจเรทหารเรือ"
        }
        document.getElementById("textStatusUser").innerHTML = strAccess
        document.getElementById("textName").innerHTML = strName
        /* end ส่วนของสิทธิผู้ใช้งาน */
    }

}