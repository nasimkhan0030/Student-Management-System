<?php include('connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $dob = $_GET['dob'];
    $gender = $_GET['gender'];
    $address = $_GET['address'];
    $sql = "INSERT INTO partial_registration(name,email,phone,dob,gender,address)
            VALUES('$name','$email','$phone','$dob','$gender','$address')";
    if ($conn->query($sql) == TRUE) {
    } else {
        echo 'Data not Inserted.';
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="styles.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>

<body>
    <!-- Navbar Section -->
    <header class="navbar">
        <?php include('header.php'); ?>
    </header>

    <!-- Section 1: Cover Image -->
    <div class="section1">
        <img class="cover" src="image/cover.jpg" alt="Cover Image">
        <div class="welcome-text">Welcome Students</div>
    </div>

    <!-- Section 2: School Info -->
    <section class="school-info">
        <div class="info-container">
            <!-- School Image -->
            <img class="school-image" src="image/schoolbuilding.jpg" alt="School Building">
            <!-- Info Text -->
            <div class="info-text">
                <h2>Welcome To DIU</h2>
                <p>Welcome to Daffodil International University, renowned for its top-ranked programs in IT, Engineering, Business,
                    Entrepreneurship, and Health Sciences in Bangladesh.Our commitment to academic excellence and innovative research prepares
                    students for successful careers in a global market.

                </p>
                <p>
                    With state-of-the-art facilities, experienced faculty, and a vibrant campus life, DIU offers a transformative educational experience.
                    Explore our diverse degree programs, learn about our admissions process, and discover why DIU is the ideal choice for
                    your higher education journey. Join us and become a part of our thriving academic community.
                </p>
            </div>
        </div>
    </section>
    <h2 class="section-heading">Our Teachers</h2>

    <!-- Section 3: Teacher Cards Section -->
    <section class="cards-section">
        <!-- Card 1 -->
        <div class="card">
            <div class="image">
                <img src="image/teacher1.jpg" alt="Image 1">
            </div>
            <div class="title">
                <h1>Dr. Mohammed Masum Iqbal</h1>
            </div>
            <div class="des">
                <p>Dean, Department of Business Administration</p>
                <a href="https://faculty.daffodilvarsity.edu.bd/profile/bba/masum.html">
                    <button>Read More...</button>
                </a>

            </div>
        </div>

        <!-- Card 2 -->
        <div class="card">
            <div class="image">
                <img src="image/teacher 2.jpg" alt="Image 2">
            </div>
            <div class="title">
                <h1>Dr. Syed Akhter Hossain</h1>
            </div>
            <div class="des">
                <p>Dean and Professor of CSE</p>
                <a href="https://faculty.daffodilvarsity.edu.bd/profile/cse/akhter.html">
                    <button>Read More...</button>
                </a>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="card">
            <div class="image">
                <img src="image/teacher_resized_400x400.jpg" alt="Image 3">
            </div>
            <div class="title">
                <h1>Dr. M. Shamsul Alam</h1>
            </div>
            <div class="des">
                <p>Department of Civil Engineering</p>
                <a href="https://faculty.daffodilvarsity.edu.bd/profile/ce/msalam.html">
                    <button>Read More...</button>
                </a>
            </div>
        </div>
    </section>

    <h2 class="section-heading2">Our Faculties</h2>


    <!-- Section 4: Teacher Cards Section (Duplicate) -->
    <section class="cards-section">


        <!-- Card 1 -->
        <div class="card">
            <div class="image">
                <img src="image/faculty 1.jpg" alt="Image 1">
            </div>
            <div class="title">
                <h1>Faculty of Business & Entrepreneurship</h1>
            </div>
            <div class="des">

                <a href="https://daffodilvarsity.edu.bd/faculty/fbe">
                    <button>Read More...</button>
                </a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="card">
            <div class="image">
                <img src="image/faculty 2.jpg" alt="Image 2">
            </div>
            <div class="title">
                <h1>Faculty of Science and Information Technology</h1>
            </div>
            <div class="des">

                <a href="https://daffodilvarsity.edu.bd/faculty/fsit">
                    <button>Read More...</button>
                </a>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="card">
            <div class="image">
                <img src="image/faculty 3.jpg" alt="Image 3">
            </div>
            <div class="title">
                <h1>Faculty of Engineering and Technology</h1>
            </div>
            <div class="des">

                <a href="https://daffodilvarsity.edu.bd/faculty/engineering">
                    <button>Read More...</button>
                </a>
            </div>
        </div>
    </section>

    <!-- Section 5: Admission Form -->
    <section class="admission-section">
        <div class="container">
            <header>Admission Form</header>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET" class="form">
                <div class="input-box">
                    <label>Full Name</label>
                    <input name="name" type="text" placeholder="Enter full name" required />
                </div>

                <div class="input-box">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter email address" required />
                </div>

                <div class="column">
                    <div class="input-box">
                        <label>Phone Number</label>
                        <input type="number" name="phone" placeholder="Enter phone number" required />
                    </div>
                    <div class="input-box">
                        <label>Birth Date</label>
                        <input type="date" name="dob" placeholder="Enter birth date" required />
                    </div>
                </div>
                <div class="gender-box">
                    <h3>Gender</h3>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="check-male" name="gender" value="male" />
                            <label for="check-male">Male</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-female" name="gender" value="female" />
                            <label for="check-female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="input-box address">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Enter street address" required />
                    <button type="submit" onclick="myfunc()">Submit</button>
                </div>
            </form>

        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-container">
            <!-- About Section -->
            <div class="footer-about">
                <h3>About DIU</h3>
                <p>Daffodil International University is committed to academic excellence and creating a vibrant educational community. Explore our programs and opportunities.</p>
            </div>

            <!-- Quick Links Section -->
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="homepage.php">Admission</a></li>
                    <li><a href="homepage.php">Faculties</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> 102 Mirpur Road, Dhaka</p>
                <p><i class="fas fa-phone"></i> +880-123-456-789</p>
                <p><i class="fas fa-envelope"></i> info@daffodilvarsity.edu.bd</p>
            </div>

            <!-- Social Media Section -->
            <div class="footer-social">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>copyright © 2024 - developed by Friends</p>
        </div>
    </footer>

    <script>
        function myfunc() {
            alert("Successfully Updated your information.");
        }
    </script>


</body>

</html>