<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$role = $_SESSION['role'] ?? '';
$current = basename($_SERVER['PHP_SELF']);



function sidenav_item(string $href, string $icon, string $label, string $current): void
{
    $activeClass = ($current === basename($href)) ? 'active text-white' : 'text-light';
    echo "<li class=\"nav-item\">
            <a href=\"{$href}\" class=\"nav-link {$activeClass}\">
              <i class=\"bi {$icon} me-2\"></i>{$label}
            </a>
          </li>";
}
?>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column mb-auto">
      <?php switch ($role) {
          case 'admin':

           
            

              sidenav_item('../../dashboard/admin/dashboard.php','bi-speedometer2','Dashboard',$current);
              sidenav_item('../../dashboard/admin/manage_students.php', 'bi-people',          'Manage Students',  $current);
              sidenav_item('../../dashboard/admin/add_student.php',     'bi-person-plus',     'Add Student',      $current);
              sidenav_item('../../dashboard/admin/manage_teacher.php',  'bi-person-badge',    'Manage Teachers',  $current);
              sidenav_item('../../dashboard/admin/add_teacher.php',     'bi-person-plus-fill','Add Teacher',      $current);
              sidenav_item('../../dashboard/admin/post_notice.php',     'bi-megaphone',       'Post Notices',          $current);

             sidenav_item('../../dashboard/admin/add_schedule.php',    'bi-calendar-week',   'Post Schedules',        $current);
              break;

          case 'teacher':
              sidenav_item('../../dashboard/teacher/dashboard.php',     'bi-speedometer2',    'Dashboard',        $current);
              sidenav_item('../../dashboard/teacher/view_students.php', 'bi-people',          'View Students',    $current);
              sidenav_item('../../dashboard/teacher/mark_attendance.php','bi-clipboard-check', 'Mark Attendance',  $current);
              sidenav_item('../../dashboard/teacher/assign_task.php',   'bi-journal-plus',    'Assign Task',      $current);
              sidenav_item('../../dashboard/teacher/view_notices.php',   'bi-megaphone',       'View Notice',      $current);
              sidenav_item('../../dashboard/teacher/view_schedule.php',  'bi-calendar-plus',   'View Schedule',     $current);
              sidenav_item('../../dashboard/teacher/view_tasks.php',    'bi-list-check',      'View Tasks',       $current);
              break;

          case 'student':
              sidenav_item('../../dashboard/student/dashboard.php',     'bi-speedometer2',    'Dashboard',       $current);
              sidenav_item('../../dashboard/student/view_attendance.php','bi-clipboard-check', 'Attendance',      $current);
              sidenav_item('../../dashboard/student/view_tasks.php',    'bi-list-task',       'View Tasks',           $current);
              sidenav_item('../../dashboard/student/view_notices.php',  'bi-megaphone',       'View Notices',         $current);
              sidenav_item('../../dashboard/student/view_schedule.php', 'bi-calendar-event',  'View Schedule',        $current);
              break;
      } ?>
      <!-- <hr class="text-secondary my-2">
      <li class="nav-item">
        <a href="/logout.php" class="nav-link text-light">
          <i class="bi bi-box-arrow-right me-2"></i>Logout
        </a>
      </li> -->
    </ul>
  </div>
</nav>
