<?php
require('connection.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user_type'];
if ($user_type == 'admin') {
?>

    <?php
    if (isset($_GET['subject_category'])) {
        $subject_category = $_GET["subject_category"];
        $subject_name = $_GET["subject_name"];
        $subject_code = $_GET["subject_code"];

        $sql = "INSERT INTO subject(subject_category,subject_name,subject_code) 
        VALUES('$subject_category','$subject_name','$subject_code')";

        if ($conn->query($sql) == TRUE) {
            header('location:list_of_subject.php');
        } else {
            echo 'Data not Inserted.';
        }
    }
    ?>
    <?php
    $sql2 = "SELECT * FROM admission";
    $query2 = $conn->query($sql2);
    while ($data = mysqli_fetch_assoc($query2)) {
        $admision_id    = $data['admision_id'];
        $class          = $data['class'];
        $student_roll   = $data['student_roll'];
    }
    ?>

    <?php
    $sql3 = "SELECT * FROM subject";
    $query3 = $conn->query($sql3);
    ?>

    <?php
    $sql1 = "SELECT* FROM class";
    $query1 = $conn->query($sql1);
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
    </head>

    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            <?php include('sidebar.php') ?>
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
                        <!--Insert Class-->
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Insert Class</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                                            <div class="form-group">
                                                <label for="exampleInputClass">Class Name</label>
                                                <select name="subject_category" class="form-control mb-3">
                                                    <?php
                                                    while ($data = mysqli_fetch_assoc($query1)) {
                                                        $class_id = $data['class_id'];
                                                        $class_name = $data['class_name'];
                                                    ?>
                                                        <option value="<?php echo $class_id ?>"> <?php echo $class_name ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputClass">Subject Name</label>
                                                <input type="text" name="subject_name" class="form-control" id="exampleInputClass" aria-describedby="emailHelp"
                                                    placeholder="Enter Subject Name">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputClass">Subject Code</label>
                                                <input type="number" name="subject_code" class="form-control" id="exampleInputClass" aria-describedby="emailHelp"
                                                    placeholder="Enter Subject Code">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
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