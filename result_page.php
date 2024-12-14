<?php
require('connection.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user_type'];
if ($user_type == 'student') {
?>
    <?php
    if (isset($_GET['class'])) {
        $class           = $_GET["class"];
        $roll            = $_GET["roll"];
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
    }
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
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="result.js"></script>
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

                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <div class="card">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Result Tables</h6>
                                    </div>
                                    <div class="card-header pt-3 d-flex flex-row align-items-center justify-content-between">
                                        <?php
                                        if (isset($_GET['class'])) {
                                            $class           = $_GET["class"];
                                            $roll            = $_GET["roll"];
                                            $sql2 = "SELECT* FROM admission WHERE class=$class AND student_roll=$roll ";
                                            $query2 = $conn->query($sql2);
                                            while ($data = mysqli_fetch_assoc($query2)) {
                                                $student_name = $data['student_name'];
                                            }
                                        ?>
                                            <h6 class="m-0 font-weight-bold text-dark">Name : <?php echo $student_name ?></h6><br>
                                        <?php } ?>
                                    </div>

                                    <div class="card-header pt-0 d-flex flex-row align-items-center justify-content-between">
                                        <?php
                                        if (isset($_GET['class'])) {
                                            $class           = $_GET["class"];
                                            $roll            = $_GET["roll"];
                                            $sql5 = "SELECT * FROM result WHERE class=$class AND  student_roll=$roll";
                                            $query5 = $conn->query($sql5);
                                            $data2 = mysqli_fetch_assoc($query5);
                                            $class_name     = $data2['class'];
                                            $student_roll   = $data2['student_roll'];
                                        ?>
                                            <h6 class="m-0 font-weight-bold text-dark">Class : <?php echo $data_list2[$class_name] ?></h6><br>
                                        <?php } ?>
                                    </div>
                                    <div class="card-header py-0 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="mb-4 font-weight-bold text-dark">Roll : <?php echo $student_roll ?></h6><br>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Subject</th>
                                                    <th>Midterm</th>
                                                    <th>Final</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['class'])) {
                                                    $class           = $_GET["class"];
                                                    $roll            = $_GET["roll"];
                                                    $sl = 0;
                                                    $sql = "SELECT * FROM result WHERE class=$class AND  student_roll=$roll";
                                                    $query = $conn->query($sql);
                                                    while ($data = mysqli_fetch_array($query)) {
                                                        $subject        = $data['subject'];
                                                        $midterm        = $data['midterm'];
                                                        $final          = $data['final'];
                                                        $total = $midterm + $final;
                                                        $sl++;
                                                ?>
                                                        <tr>
                                                            <td><?php echo $sl ?></td>
                                                            <td><?php echo $data_list1[$subject] ?></td>
                                                            <td><?php echo $midterm ?></td>
                                                            <td><?php echo $final ?></td>
                                                            <td><?php echo $total ?></td>
                                                        </tr>
                                                <?php }
                                                } 
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="d-none" id="myResultArea">
                                            <?php
                                            require('print.php');
                                            ?>
                                        </div>
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <button type="submit" class="btn btn-primary ms-3" onclick="printMyResultArea()">Print</button>
                                        </div>
                                    </div>
                                    <div class="card-footer"></div>
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