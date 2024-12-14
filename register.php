<?php
require('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            border: 1px solid black;
            font-weight: bold;
            background-color: white;
        }

        h2 {
            text-align: center;
            color: #333;
            font-weight: 600;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: 600;
            color: #555;
        }

        input[type="email"],
        input[type="text"],
        input[type="date"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background: transparent;
            font-family: 'Poppins', Arial, sans-serif;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #6777EF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            font-family: 'Poppins', Arial, sans-serif;
        }

        button[type="submit"]:hover {
            background-color: #4C60DA;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['user_first_name'])) {
        $user_first_name    = $_GET["user_first_name"];
        $user_last_name     = $_GET["user_last_name"];
        $dob                = $_GET["dob"];
        $gender             = $_GET["gender"];
        $email              = $_GET["email"];
        $password           = $_GET["password"];
        $sql1 = "SELECT * FROM users WHERE email='$email'";
        $query1 = $conn->query($sql1);
        if (mysqli_num_rows($query1) > 0) {
            echo '<script type="text/JavaScript">  
                    alert("Email already exists"); 
                </script>';
        } else {
            $sql = "INSERT INTO users(user_first_name,user_last_name,dob,gender,email,password) 
                VALUES('$user_first_name','$user_last_name','$dob','$gender','$email','$password')";
            if ($conn->query($sql) == TRUE) {
                header('location:login.php');
            } else {
                echo 'Data not Inserted.';
            }
        }
    }
    ?>
    <div class="form-container">
        <h2>Register</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
            First Name :<br>
            <input type="text" name="user_first_name" required><br><br>
            Last Name :<br>
            <input type="text" name="user_last_name" required><br><br>
            Date of Birth :<br>
            <input type="date" name="dob" required><br><br>
            Gender :<br>
            <input type="radio" id="male" name="gender" value="male" required>
            Male <br>
            <input type="radio" id="female" name="gender" value="female" required>
            Female <br> <br>

            Email :<br>
            <input type="email" name="email" required><br><br>
            Password :<br>
            <input type="password" name="password" required><br><br>
            <button type="submit">Register</button>
        </form>
        <div class="register-container">
            <p>Already have an account?<a href="login.php"> Login</a></p>
        </div>
    </div>

</body>

</html>