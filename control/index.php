<?php require_once 'admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../assets/js/admin.js"></script>
</head>
<body>
  <?php
    if (isset($_GET['error'])) {
        $error_message = htmlspecialchars($_GET['error']);
        echo "<script>toast('$error_message', 'error');</script>";
    }
    if (isset($_GET['success'])) {
        $success_message = htmlspecialchars($_GET['success']);
        echo "<script>toast('$success_message');</script>";
    }
  ?>
  <!-- Topbar -->
  <div class="topbar">
    <div style="display: flex; align-items: center;">
      <button class="menu-toggle">
        <i class="fas fa-bars"></i>
      </button>
      <div class="logo">
        <i class="fas fa-city logo-icon"></i>
        HDSHHS Admin
      </div>
    </div>
    
    <div class="topbar-right">
      <!-- <div class="notification-bell">
        <i class="fas fa-bell"></i>
        <span class="notification-badge">3</span>
      </div> -->
      
      <div class="user-profile">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="profile-img" alt="Profile">
        <span class="username">Admin</span>
        <i class="fas fa-chevron-down" style="font-size: 12px;"></i>
      </div>
    </div>
  </div>

  <!-- Sidebar Overlay -->
  <div class="sidebar-overlay"></div>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="sidebar-menu">
      <?php
        //h=>href, i=>icon class, t=>title
        $menus = [
          'Main' => [
            ['h' => '?q=dashboard', 'i' => 'tachometer-alt', 't' => 'Dashboard']
          ],
          'Management' => [
            ['h' => '?q=routine', 'i' => 'comment-dots', 't' => 'routine'],
            ['h' => '?q=page', 'i' => 'file-alt', 't' => 'Pages'],
            ['h' => '?q=teachers', 'i' => 'chalkboard-teacher', 't' => 'Teachers'],
            ['h' => '?q=staff', 'i' => 'user-tie', 't' => 'Staff'],
            // ['h' => '?q=students', 'i' => 'user-graduate', 't' => 'Admissions'],
            ['h' => '?q=notice', 'i' => 'bell', 't' => 'Notices'],
            ['h' => '?q=images', 'i' => 'image', 't' => 'Gallery'],
            ['h' => '?q=slider', 'i' => 'sliders-h', 't' => 'Homepage Slider'],
            ['h' => '?q=meritorious_st', 'i' => 'award', 't' => 'Meritorious Students'],
            ['h' => '?q=publicholidays', 'i' => 'calendar-alt', 't' => 'Public Holidays']
          ],
          'System' => [
            ['h' => '?q=settings', 'i' => 'cog', 't' => 'Settings'],
            ['h' => 'logout.php', 'i' => 'sign-out-alt', 't' => 'Logout']
          ]
        ];

        $active = $_GET['q'] ?? 'dashboard';

        foreach ($menus as $section => $items) {
          echo "<div class='menu-title'>$section</div>";
          foreach ($items as $item) {
            $isActive = ($active === ltrim(strstr($item['h'], '='), '=')) ? 'active' : '';
            echo "<a href='{$item['h']}' class='menu-item $isActive'><i class='fas fa-{$item['i']} menu-icon'></i>{$item['t']}</a>";
          }
        }
      ?>
    </div>
  </div>




  <!-- Main Content -->
  <div class="main-content">
<!-- ======================================== -->

  <?php
    $q = $_REQUEST['q'] ?? ''; // page value
    $e = $_REQUEST['e'] ?? ''; // edit view value

    $allowed_q = [
      "dashboard", "empty_post", "h-teacher", "images", "meritorious_st", "notice", "publicholidays",
      "room", "routine", "staff",  "system_info", "teachers", "student_count", "settings",
      "page", "slider", "students"
    ];
    $allowed_e = [
      "student_count", "page", "users", "teachers", "staff", "notice", "routine",
      "images", "meritorious_st", "publicholidays", "slider", "students"
    ];

    if ($q && in_array($q, $allowed_q)) include "sec/{$q}.php";
    elseif($e && in_array($e, $allowed_e)) include "edit/{$e}.php";
    else include "sec/dashboard.php";
    
  ?>




<!-- ======================================== -->
    
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle sidebar on mobile
    document.querySelector('.menu-toggle').addEventListener('click', function() {
      document.querySelector('.sidebar').classList.toggle('active');
      document.querySelector('.sidebar-overlay').classList.toggle('active');
    });
    
    // Close sidebar when clicking on overlay
    document.querySelector('.sidebar-overlay').addEventListener('click', function() {
      document.querySelector('.sidebar').classList.remove('active');
      this.classList.remove('active');
    });
    
    // Add active class to clicked menu item and close sidebar on mobile
    const menuItems = document.querySelectorAll('.menu-item');
    menuItems.forEach(item => {
      item.addEventListener('click', function() {
        menuItems.forEach(i => i.classList.remove('active'));
        this.classList.add('active');
        
        // Close sidebar on mobile after clicking a menu item
        if (window.innerWidth < 992) {
          document.querySelector('.sidebar').classList.remove('active');
          document.querySelector('.sidebar-overlay').classList.remove('active');
        }
      });
    });
    
    // Handle window resize
    function handleResize() {
      if (window.innerWidth >= 992) {
        document.querySelector('.sidebar').classList.remove('active');
        document.querySelector('.sidebar-overlay').classList.remove('active');
      }
    }
    
    window.addEventListener('resize', handleResize);
  </script>
</body>
</html>