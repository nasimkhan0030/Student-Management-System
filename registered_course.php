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
    <!DOCTYPE html>
    <html lang="en">

    <?php
    $sql = "SELECT * FROM admission WHERE  student_roll iS NOT NULL AND user_id=$user_id";
    $query = $conn->query($sql);
    while ($data = mysqli_fetch_assoc($query)) {
        $new_user_id        = $data['user_id'];
        $class          = $data['class'];
    }
    ?>
    <?php
    $sql2 = "SELECT * FROM subject WHERE subject_category= $class";
    $query2 = $conn->query($sql2);
    ?>
    <?php
    $sql1 = "SELECT * FROM class";
    $query1 = $conn->query($sql1);
    $data_list = array();
    while ($data2 = mysqli_fetch_assoc($query1)) {
        $class_id = $data2['class_id'];
        $class_name = $data2['class_name'];
        $data_list[$class_id] = $class_name;
    }
    ?>

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
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                                    </div>
                                    <div class="table-responsive p-3">
                                        <table class="table align-items-center table-flush" id="dataTable">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Subject Name</th>
                                                    <th>Subject Code</th>
                                                    <th>Class</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sl = 0;
                                                while ($data3 = mysqli_fetch_assoc($query2)) {
                                                    $subject_category   = $data3['subject_category'];
                                                    $subject_name       = $data3['subject_name'];
                                                    $subject_code       = $data3['subject_code'];
                                                    $sl++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $sl ?></td>
                                                        <td><?php echo $subject_name ?></td>
                                                        <td><?php echo $subject_code ?></td>
                                                        <td><?php echo $data_list[$subject_category] ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable(); // ID From dataTable 
                $('#dataTableHover').DataTable(); // ID From dataTable with Hover
            });
        </script>
    </body>

    </html>
<?php
} else {
    header('location:login.php');
}
?>