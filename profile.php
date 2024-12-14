<?php
require('connection.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user_type'];
if ($user_type == 'teacher'){
    header('location:teacher_portal.php');
}
elseif ($user_type == 'admin'){
    header('location:admin_portal.php');
}
elseif ($user_type == 'student') {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <?php
    if (isset($user_id)) {
        $sql = "SELECT *FROM `users` WHERE user_id = $user_id";
        $query = $conn->query($sql);
        $data = mysqli_fetch_assoc($query);

        $user_first_name1    = $data['user_first_name'];
        $user_last_name1     = $data['user_last_name'];
        $dob1                = $data['dob'];
        $father_name1        = $data['father_name'];
        $mother_name1        = $data['mother_name'];
        $gender1             = $data['gender'];
        $imagename1          = $data['imagename'];
    }

    if (isset($_POST['user_first_name'])) {
        $new_user_id            = $_POST['user_id'];
        $new_user_first_name    = $_POST['user_first_name'];
        $new_user_last_name     = $_POST['user_last_name'];
        $new_dob                = $_POST['dob'];
        $new_father_name        = $_POST['father_name'];
        $new_mother_name        = $_POST['mother_name'];
        $new_gender             = $_POST['gender'];
        $sql3 = "UPDATE users SET user_first_name='$new_user_first_name',
                                    user_last_name='$new_user_last_name',
                                    dob='$new_dob',
                                    father_name='$new_father_name',
                                    mother_name='$new_mother_name',
                                    gender='$new_gender'
                                    WHERE user_id='$new_user_id'";

        if ($conn->query($sql3) == TRUE) {
            header('location:profile.php');
        } else {
            echo "Error occur.";
        }
        $filename = $_FILES['upfile']['name'];
        $tmploc = $_FILES['upfile']['tmp_name'];
        $filetype = $_FILES['upfile']['type'];
        $uploc = "image/" . $filename;

        if ($filetype == 'image/png' || 'image/jpeg' || 'image/jpg') {
            if (file_exists($uploc)) {
                header('location:profile.php');
            } else {
                if (move_uploaded_file($tmploc, $uploc)) {
                    $sql2 = "UPDATE users SET imagename='$filename'
                                     WHERE user_id='$new_user_id'";

                    if ($conn->query($sql2) == TRUE) {
                        header('location:profile.php');
                    } else {
                        echo "Error occur.";
                    }
                } else {
                    echo "Error occur.";
                }
            }
        }
    }
    ?>

    <body>
        <div class="container light-style flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-4">
                Student Profile
            </h4>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list"
                                href="#account-general">General</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">

                            <div class="tab-pane fade active show" id="account-general">
                                <div class="card-body media align-items-center">
                                    <img src="image/<?php echo $imagename1 ?>" alt="" class="d-block ui-w-80">
                                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                                        <div class="media-body ml-4">
                                            <input type="file" name="upfile">
                                        </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control mb-1" name="user_first_name" value="<?php echo $user_first_name1;  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control mb-1" name="user_last_name" value="<?php echo $user_last_name1;  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Date of birth</label>
                                        <input type="date" class="form-control mb-1" name="dob" value="<?php echo $dob1  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Father's Name</label>
                                        <input type="text" class="form-control" name="father_name" value="<?php echo $father_name1 ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mother's Name</label>
                                        <input type="text" class="form-control mb-1" name="mother_name" value="<?php echo $mother_name1 ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Gender</label><br>
                                        <input type="radio" name="gender" value="male" <?php if ($gender1 == 'male') {
                                                                                            echo "checked";
                                                                                        }  ?>>
                                        Male<br>
                                        <input type="radio" name="gender" value="female" <?php if ($gender1 == 'female') {
                                                                                                echo "checked";
                                                                                            }  ?>>
                                        Female
                                    </div>
                                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mt-3">
                <input type="submit" class="btn btn-primary" name="submit" value="Save Changes">
                <button type="button" class="btn btn-default"><a class="text-decoration-none" href="student_portal.php">Cancel</a></button>
            </div>

        </div>
        </form>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">

        </script>
    </body>

    </html>
<?php
} else {
    header('location:login.php');
}
?>