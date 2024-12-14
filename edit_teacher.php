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
    if (isset($_GET['id'])) {
        $getid = $_GET['id'];
        $sql = "SELECT *FROM `users` WHERE user_id = $getid ";
        $query = $conn->query($sql);
        $data = mysqli_fetch_assoc($query);

        $user_id1                = $data['user_id'];
        $user_first_name1        = $data['user_first_name'];
        $user_last_name1         = $data['user_last_name'];
        $dob1                    = $data['dob'];
        $gender1                 = $data['gender'];
        $email1                 = $data['email'];
        $password1               = $data['password'];
        
    }
    if (isset($_GET['user_first_name1'])) {
        $new_user_id            = $_GET['user_id1'];
        $new_user_first_name    = $_GET['user_first_name1'];
        $new_user_last_name     = $_GET['user_last_name1'];
        $new_dob                = $_GET['dob1'];
        $new_gender             = $_GET['gender1'];
        $new_email              = $_GET['email1'];
        $new_password           = $_GET['password1'];
        $sql2 = "UPDATE users  SET   user_first_name='$new_user_first_name',
                                     user_last_name='$new_user_last_name',
                                     dob='$new_dob',
                                     gender='$new_gender',
                                     email='$new_email',
                                     password='$new_password'
                                     WHERE user_id='$new_user_id'";

        if ($conn->query($sql2) == TRUE) {
            header('location:list_of_teacher.php');
        } else {
            echo "Error occur.";
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
                                        <h6 class="m-0 font-weight-bold text-primary">Edit Student</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                                            <div class="form-group">
                                                <label for="exampleInputClass">First Name</label>
                                                <input type="text" name="user_first_name1" class="form-control" id="exampleInputClass" aria-describedby="emailHelp"
                                                    placeholder="Enter FIrst Name" value="<?php echo $user_first_name1 ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputClass">Last Name</label>
                                                <input type="text" name="user_last_name1" class="form-control" id="exampleInputClass" aria-describedby="emailHelp"
                                                    placeholder="Enter Last Name" value="<?php echo $user_last_name1 ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputClass">Date of Birth</label>
                                                <input type="date" name="dob1" class="form-control" id="exampleInputClass" aria-describedby="emailHelp"
                                                    placeholder="Enter DOB" value="<?php echo $dob1 ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputClass">Gender</label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="gender1" class="custom-control-input" value="male" <?php if($gender1=='male'){echo"Checked";} ?>>
                                                    <label class="custom-control-label" for="customRadio1">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="gender1" class="custom-control-input" value="female" <?php if($gender1=='female'){echo"Checked";} ?>>
                                                    <label class="custom-control-label" for="customRadio2">Female</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputClass">Email</label>
                                                <input type="email" name="email1" class="form-control" id="exampleInputClass" aria-describedby="emailHelp"
                                                    placeholder="Enter Email" value="<?php echo $email1 ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputClass">Password</label>
                                                <input type="text" name="password1" class="form-control" id="exampleInputClass" aria-describedby="emailHelp"
                                                    placeholder="Enter Password" value="<?php echo $password1 ?>">
                                            </div>
                                            <input type="hidden" name="user_id1" class="form-control" id="exampleInputClass" aria-describedby="emailHelp"
                                                    value="<?php echo $user_id1 ?>">
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