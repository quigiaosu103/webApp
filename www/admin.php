<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="./style/admin.css" />
  <!-- Font Awesome Cdn Link -->
  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <span class="nav-item">Admin</span>
          <a href="./index.php" class="nav-item" style="margin-left: 6px">Home</a>
        </a></li>
        <li class="appsManager"><a href="#">
          <i class="fas fa-cube"></i>
          <span class="nav-item">Quản Lý Ứng Dụng</span>
        </a></li>
        <li class="usersManager"><a href="#">
          <i class="fas fa-user"></i>
          <span class="nav-item">Quản Lý Người Dùng</span>
        </a></li>
        <li><a href="#">
          <i class="fas fa-cogs"></i>
          <span class="nav-item">Cài Đặt</span>
        </a></li>
        <li><a href="#" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Đăng Xuất</span>
        </a></li>
      </ul>
    </nav>


    <section class="main-statistical">
      <div class="apps-statistical">
        <div class="main-top">
          <h1 class='main-statistical__title'>Quản Lý Ứng Dụng</h1>
          <i class="fas fa-user-cog"></i>
        </div>
        
        <section class="attendance">
          <div class="attendance-list">
            <div style="display: flex;">
              <h1>Ứng Dụng</h1>
              <div class="fa fa-plus" style="position: absolute; right: 0; margin: 10px 40px; cursor: pointer;"></div>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>Tổng số ứng dụng</th>
                  <th>Tổng lượt tải</th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="statistical"> </tbody>
            </table>

            <table class="table">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Người tạo</th>
                  <th>Thời gian</th>
                  <th>Lượt tải</th>
                  <th>Yêu thích</th>
                  <th>Chỉnh Sửa</th>
                </tr>
              </thead>
              <tbody class="apps-list"> </tbody>
            </table>
          </div>
        </section>
      </div>
      <div class="users-statistical">
        <div class="main-top">
            <h1 class='main-statistical__title'>Quản Lý Người Dùng</h1>
            <i class="fas fa-user-cog"></i>
        </div>

        <section class="attendance">
          <div class="attendance-list">
            <div style="display: flex;">
              <h1>Người Dùng</h1>
              <div class="fa fa-plus" style="position: absolute; right: 0; margin: 10px 40px; cursor: pointer;"></div>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>Tổng số người dùng</th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="statistical"> </tbody>
            </table>

            <table class="table">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Tên đăng nhập</th>
                    <th>Ngày lập tài khoản</th>
                    <th>Số ứng dụng đã tải lên</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="users-list"> </tbody>
              </table>
          </div>
        </section>
      </div>

      </div>  
    </section>
  </div>
  <script src="/handleLogic/admin.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>
</html>
