function fnSetSidebarMenuInspection(namePages){
    var strHTML = ''
    var menuItems = [
        { page: 'branchPersonal', text: 'สาขากำลังพล', icon: 'las la-user' },
        { page: 'branchOperation', text: 'สาขายุทธการ', icon: 'las la-share-alt' },
        { page: 'branchLogistics', text: 'สาขาส่งกำลังบำรุง', icon: 'las la-box-open' },
        { page: 'branchTechnical', text: 'สาขาเทคนิค และ ปคส.', icon: 'las la-globe-americas' }
    ];
    strHTML += " <ul> "
    strHTML += " <li class='headMenuTitle'><span>หน้าหลัก</span></li> "
    if (namePages == 'dashboard') {
        strHTML += " <li><a href='dashboard.php' class='nounderline active'><span class='las la-chart-pie'></span><span>Dashboard</span></a></li> "
    } else {
        strHTML += " <li><a href='dashboard.php' class='nounderline'><span class='las la-chart-pie'></span><span>Dashboard</span></a></li> "
    }
    strHTML += " <li class='headMenuTitle'><span>การตรวจสอบราชการ 4 สาขา</span></li> "

    // loop create tab 
    for (var i = 0; i < menuItems.length; i++) {
        var menuItem = menuItems[i];
        var isActive = (namePages === menuItem.page) ? ' active' : '';
        strHTML += `<li><a href='${menuItem.page}.php' class='nounderline${isActive}'><span class='${menuItem.icon}'></span><span>${menuItem.text}</span></a></li>`;
    }
    
    strHTML += " <hr class='border-2 border-top border-primary' /> "
    strHTML += " <li class='lineEndTitle'></li> "
    strHTML += " <li><a href='#' class='nounderline'><span class='las la-sign-out-alt'></span><span>ออกจากระบบ</span></a></li> "
    strHTML += " </ul> "

    $("#dvUlSidebarMenu")[0].innerHTML = strHTML
    // return strHTML
}
