<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/control/dashboard.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js'></script>

    <!-- <link rel="stylesheet" href="css/test.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/charts/chart-4/assets/css/chart-4.css">    
    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstarp/css/bootstrap.min.css">
    
    <title>Dashboard</title>
</head>
<body>
<input type="checkbox" name="" id="menu-toggle">
<div class="overlay"><label for="menu-toggle">
  </label></div>
<div class="sidebar">
  <div class="sidebar-container">
    <div class="brand">
      <h3>
        <span class="lab la-staylinked"></span>
        NIGD
      </h3>
    </div>
    <div class="sidebar-avatar">
      <div>
        <img src="https://media-exp1.licdn.com/dms/image/C4D03AQF9R2lxnH4fOw/profile-displayphoto-shrink_800_800/0/1639841285929?e=1654128000&v=beta&t=QvocDiNfivbaAzHjsX9fnl9eFa1ZSo4SBHeH4jZANEk" alt="avatar">
      </div>
      <div class="avatar-info">
        <div class="avatar-text">
          <h5>กรมจเรทหารเรือ</h5>
          <small>28-04-67</small>
        </div>
        <!-- <span class="las la-angle-double-right"></span> -->
      </div>
    </div>
    <div class="sidebar-menu" id="dvUlSidebarMenu">
      <!-- Content -->
    </div>

  </div>
</div>
<div class="main-content">
  <header>
    <div class="header-wrapper">
      <label for="menu-toggle">
        <span class="las la-bars"></span>
      </label>
      <div class="header-title">
        <h1>Dashboard</h1>
        <p>ผู้ตรวจสอบ <span class="las la-chart-line"></span></p>
      </div>
    </div>
    <div class="header-action">
      <!-- <button class="btn btn-main">
        <span class="las la-video"></span>
        Upload
      </button> -->
    </div>
  </header>
  <main>
    <section>
      <h3 class="section-head">Overview</h3>
      <div class="analytics">
        <div class="analytic">
          <div class="analytic-icon">
            <span class="las la-users"></span></div>
            <div class="analytic-info">
                <h4>หน่วยทั้งหมด</h4>
                <h1>212 <small class="text-danger">หน่วย</small></h1>
            </div>
        </div>
        <div class="analytic">
          <div class="analytic-icon">
            <span class="las la-users"></span></div>
            <div class="analytic-info">
                <h4>หน่วยรับตรวจ</h4>
                <h1> 42 <small class="text-danger">หน่วย</small></h1>
            </div>
        </div>
        <div class="analytic">
          <div class="analytic-icon"><span class="las la-users"></span></div>
          <div class="analytic-info">
            <h4>หน่วยตรวจแล้ว</h4>
            <h1> 30 <small class="text-success">หน่วย</small></h1>
          </div>
        </div>
        <div class="analytic">
          <div class="analytic-icon"><span class="las la-users"></span></div>
          <div class="analytic-info">
            <h4>หน่วยยังไม่ตรวจ</h4>
            <h1> 12 <small class="text-danger">หน่วย</small></h1>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="block-grid">
        <div class="revenue-card">
          <h3 class="section-head">สถิติภาพรวมทั้งหมด</h3>
          <div class="rev-content">
    <section>
        <div class="container">
            <div class="row justify-content-center">
            <div class="">
                <div class="card widget-card border-light shadow-sm">
                <div class="card-body">
                    <div class="d-block align-items-center justify-content-between">
                    <div class="mb-3 mb-sm-0">
                        <h3 style="text-align:left" class="card-title widget-card-title">สาขากำลังพล</h3>
                    </div>
                    <div class="graph-select" style="text-align: right;">
                        <select class="form-select text-secondary border-light-subtle w-25 p-1">
                        <option value="1">2023</option>
                        <option value="2">2024</option>
                        <option value="3">2023</option>
                        </select>
                    </div>
                    </div>
                    <div id="bsb-chart-4"></div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
          </div>
        </div>

         <div class="graph-card">
          <h3 class="section-head">ข้อบกพร่องที่แก้ไขไปแล้ว</h3>
          <div class="graph-content">
            <div class="graph-head">
              <div class="icon-wrapper">
                <div class="icon"><span class="las la-eye text-main"></span></div>
                <div class="icon"><span class="las la-clock text-success"></span></div>
              </div>
              <div class="graph-select">
                <select name="" id="">
                  <option value="">Septamber</option>
                </select>
              </div>
            </div>
            <div class="graph-board">
              <canvas id="revenueChart" width="100%"></canvas>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</div>
<script src="../../script/jquery/jquery-3.7.1.js"></script>
<script src="../../script/navbar3.js"></script>
<script src="../../script/test.js"></script>
<script src="../../script/control/drawTable.js"></script>
<script src="../../script/control/sidebar.js"></script>
<script>
    $(document).ready(function() {
        fnSetSidebarMenuConTrol('dashboard')
    });
</script>   
</body>
</html>