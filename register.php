<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="import" href="header.html">
</head>
<body>
    <div id="header"></div>
    <div class="form">
        <?php 
        // Include database connection
        include('config.php');

        // Handle form submission
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Check if any field is empty
            if(empty($name) || empty($username) || empty($email) || empty($password)) {
                echo "<div class='message'>
                        <p>Please fill in all fields.</p>
                    </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'> Go Back </button>";
                exit;
            }

            // Verify the uniqueness of the email
            $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
            if(mysqli_num_rows($verify_query) != 0){
                echo "<div class='message'>
                        <p>This email is used, please try another one.</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='but'> Go Back </button>";
                exit;
            } else {

                if($password !== $confirm_password){
                    echo "<div class='message'>
                            <p> Password not match.</P>
                        </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='but'> Go Back </button>";
                    exit;
                }
                // Insert user into the database
                $insert = mysqli_query($con, "INSERT INTO users(Name, Username, Email, Password) VALUES('$name', '$username', '$email', '$password')");
                if($insert) {  
                    echo "<div class='message'>
                            <p>Registration successful.</p>
                        </div> <br>";
                    echo "<a href='login.php'><button class='but'> Login Now </button>";
                    exit;
                } else {
                    echo "<div class='message'>
                            <p>Registration failed. Please try again later.</p>
                        </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'> Go Back </button>";
                    // Display the MySQL error message if any
                    echo "MySQL error: " . mysqli_error($con);
                    exit;
                }
            }
        }
        ?>
        <form action="" method="post">
            <h2>Register</h2>
            <div class="UPL">
                <label>Name </label>
                <input type="text" name="name" required> 
            </div>
            <div class="UPL">
                <label>UserName </label>
                <input type="text" name="username" required>
            </div>
            <div class="UPL">
                <label>Email </label>
                <input type="email" name="email" required> 
            </div>
            <div class="UPL">
                <label>Password </label>
                <input type="password" name="password" required>
            </div>
            <div class="UPL">
                <label>Confirm Password </label>
                <input type="password" name="confirm_password" required>
            </div>
            <div class="btn">
                <input type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>
    <div id="footer"></div>
    <script>
        fetch('header_footer/header.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('header').innerHTML = data;
            });

        fetch('header_footer/footer.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('footer').innerHTML = data;
            })
    </script>
</body>
</html>
