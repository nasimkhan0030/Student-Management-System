<?php
require('connection.php');
session_start();
$user_first_name    = $_SESSION['user_first_name'];
$user_last_name     = $_SESSION['user_last_name'];
$user_id            = $_SESSION['user_id'];
$email              = $_SESSION['email'];
$user_type          = $_SESSION['user_type'];
if ($user_type == 'student') {
?>
  <?php
  // Subject Table
  $sql3 = "SELECT * FROM subject";
  $query3 = $conn->query($sql3);
  $data_list1 = array();
  while ($data = mysqli_fetch_assoc($query3)) {
    $subject_id    = $data['subject_id'];
    $subject_name  = $data['subject_name'];
    $data_list1[$subject_id] = $subject_name;
  }

  // Class Table
  $sql1 = "SELECT* FROM class";
  $query1 = $conn->query($sql1);
  $data_list2 = array();
  while ($data = mysqli_fetch_assoc($query1)) {
    $class_id = $data['class_id'];
    $class_name = $data['class_name'];
    $data_list2[$class_id] = $class_name;
  }

  $sql = "SELECT * FROM result ORDER BY final DESC  LIMIT 10";
  $query = $conn->query($sql);
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <div id="wrapper">
      <!-- Sidebar -->
      <?php include('student_sidebar.php') ?>
      <!-- Sidebar -->
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <!-- TopBar -->
          <?php include('topbar.php'); ?>
          <!-- Topbar -->

          <!-- Container Fluid-->
          <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </div>

            <div class="row mb-3">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Students</div>
                        <?php
                        $sql1 = "SELECT * FROM users WHERE user_type='student'";
                        $query1 = $conn->query($sql1);
                        $total_student = mysqli_num_rows($query1);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_student ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-user fa-2x text-primary"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Earnings (Annual) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Teachers</div>
                        <?php
                        $sql2 = "SELECT * FROM users WHERE user_type='teacher'";
                        $query2 = $conn->query($sql2);
                        $total_teacher = mysqli_num_rows($query2);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_teacher ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-success"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- New User Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Classes</div>
                        <?php
                        $sql3 = "SELECT * FROM class";
                        $query3 = $conn->query($sql3);
                        $total_class = mysqli_num_rows($query3);
                        ?>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total_class ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-info"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Subjects</div>
                        <?php
                        $sql4 = "SELECT * FROM subject";
                        $query4 = $conn->query($sql4);
                        $total_subject = mysqli_num_rows($query4);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_subject ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fab fa-fw fa-wpforms fa-2x text-warning"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Invoice Example -->
              <div class="col-xl-8 col-lg-7 mb-4">
                <div class="card">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Final top Scorer</h6>
                  </div>
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th>ID</th>
                          <th>Class</th>
                          <th>Roll</th>
                          <th>Subject</th>
                          <th>Midterm</th>
                          <th>Final</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sl = 0;
                        while ($data = mysqli_fetch_array($query)) {
                          $class          = $data['class'];
                          $student_roll   = $data['student_roll'];
                          $subject        = $data['subject'];
                          $midterm        = $data['midterm'];
                          $final          = $data['final'];
                          $result_id      = $data['result_id'];
                          $total = $midterm + $final;
                          $sl++;
                        ?>
                          <tr>
                            <td><?php echo $sl ?></td>
                            <td><?php echo $data_list2[$class] ?></td>
                            <td><?php echo $student_roll ?></td>
                            <td><?php echo $data_list1[$subject] ?></td>
                            <td><?php echo $midterm ?></td>
                            <td><?php echo $final ?></td>
                            <td><?php echo $total ?></td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer"></div>
                </div>
              </div>
              <!-- Message From Customer-->
              <div class="col-xl-4 col-lg-5 ">
                <div class="card">
                  <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-light">Message For Students</h6>
                  </div>
                  <div>
                    <div class="customer-message align-items-center">
                      <a class="font-weight-bold" href="#">
                        <div class="text-truncate message-title">Al-Hadith</div>
                        <div class="small text-gray-500 message-time font-weight-bold">Ibn Abbas said, When you want to mention your companion's faults, remember your own faults. - (Al-Adab Al-Mufrad 328)</div>
                      </a>
                    </div>
                    <div class="customer-message align-items-center">
                      <a href="#">
                        <div class="text-truncate message-title">Muhammad Ali</div>
                        <div class="small text-gray-500 message-time">I hated every minute of training, but I said, Don't quit. Suffer now and live the rest of your life as a champion.</div>
                      </a>
                    </div>
                    <div class="customer-message align-items-center">
                      <a class="font-weight-bold" href="#">
                        <div class="text-truncate message-title">Steve Jobs</div>
                        <div class="small text-gray-500 message-time font-weight-bold">The only way to do great work is to love what you do. If you haven’t found it yet, keep looking. Don’t settle.</div>
                      </a>
                    </div>
                    <div class="customer-message align-items-center">
                      <a class="font-weight-bold" href="#">
                        <div class="text-truncate message-title">Albert Einstein</div>
                        <div class="small text-gray-500 message-time font-weight-bold">Life is like riding a bicycle. To keep your balance, you must keep moving.</div>
                      </a>
                    </div>
                    <div class="card-footer text-center">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Row-->

            <!-- Modal Logout -->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!---Container Fluid-->
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>copyright &copy; <script>
                  document.write(new Date().getFullYear());
                </script> - developed by
                <b><a href="#" target="_blank">Friends</a></b>
              </span>
            </div>
          </div>
        </footer>
        <!-- Footer -->
      </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
  </body>

  </html>
<?php
} else {
  header('location:login.php');
}
?>