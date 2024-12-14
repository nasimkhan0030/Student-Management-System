<?php
require('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            border: 1px solid black;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            color: #333;
            font-weight: 600;
            /* Semi-bold weight for better readability */
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: 600;
            /* Semi-bold for better emphasis */
            color: #555;
        }

        input[type="email"],
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }

        .password-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }

        .password-container input {
            position: relative;

        }

        .toggle-password {
            background: none;
            border: none;
            font-size: 1.2em;
            cursor: pointer;
            margin-left: 5px;
            padding: 5px;

        }

        .password-container i {
            position: absolute;
            margin-left: 20rem;
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
            background-color: #394EEA;
        }
    </style>

</head>

<body>
    <?php

    if (isset($_POST['email'])) {

        $email         = $_POST['email'];
        $password      = $_POST['password'];

        $sql = "SELECT * FROM users WHERE 
                	email='$email' AND  
                    password='$password' AND
                    user_type='student'";
        $sql1 = "SELECT * FROM users WHERE 
                	email='$email' AND  
                    password='$password' AND
                    user_type='teacher'";
        $sql2 = "SELECT * FROM users WHERE 
                	email='$email' AND  
                    password='$password' AND
                    user_type='admin'";

        $query = $conn->query($sql);
        $query1 = $conn->query($sql1);
        $query2 = $conn->query($sql2);

        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_array($query);
            $user_first_name = $data['user_first_name'];
            $user_last_name = $data['user_last_name'];
            $email = $data['email'];
            $user_id = $data['user_id'];
            $user_type = $data['user_type'];

            $_SESSION['user_first_name'] = $user_first_name;
            $_SESSION['user_last_name'] = $user_last_name;
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;

            header('location:student_portal.php');
        } elseif (mysqli_num_rows($query1) > 0) {
            $data = mysqli_fetch_array($query1);
            $user_first_name = $data['user_first_name'];
            $user_last_name = $data['user_last_name'];
            $email = $data['email'];
            $user_id = $data['user_id'];
            $user_type = $data['user_type'];

            $_SESSION['user_first_name'] = $user_first_name;
            $_SESSION['user_last_name'] = $user_last_name;
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;

            header('location:teacher_portal.php');
        } elseif (mysqli_num_rows($query2) > 0) {
            $data = mysqli_fetch_array($query2);
            $user_first_name = $data['user_first_name'];
            $user_last_name = $data['user_last_name'];
            $email = $data['email'];
            $user_id = $data['user_id'];
            $user_type = $data['user_type'];

            $_SESSION['user_first_name'] = $user_first_name;
            $_SESSION['user_last_name'] = $user_last_name;
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;

            header('location:admin_portal.php');
        }
    }

    ?>
    <div class="form-container">
        <h2>Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">
            <label for="email">User email :</label>
            <input type="email" name="email" placeholder="Enter your email" required>
            <label for="password">User Password :</label>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
                <button type="button" id="toggle-password" class="toggle-password">👁️</button>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="register-container">
            <p>Don't have an account?<a href="register.php"> SignUp</a></p>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('toggle-password');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            togglePassword.textContent = type === 'password' ? '👁️' : '🙈';
        });
    </script>

</body>

</html>