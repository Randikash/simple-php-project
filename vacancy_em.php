<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vacancy</title>
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
            $image = $_POST['image'];
            $details = $_POST['details'];
            $date = $_POST['date'];
            

            // Check if any field is empty
            if(empty($image) || empty($details) || empty($date)) {
                echo "<div class='message'>
                        <p>Please fill in all fields.</p>
                    </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'> Go Back </button>";
                exit;
            }

            
                // Insert user into the database
                $insert = mysqli_query($con, "INSERT INTO vacancies(Image, Details, Date) VALUES('$image', '$details', '$date')");
                if($insert) {  
                    echo "<div class='message'>
                            <p>Data Entered successful.</p>
                        </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'> ADD Another Vacancy </button>";
                    exit;
                } else {
                    echo "<div class='message'>
                            <p>Failed. Please try again...</p>
                        </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'> Go Back </button>";
                    // Display the MySQL error message if any
                    echo "MySQL error: " . mysqli_error($con);
                    exit;
                }
            }
        
        ?>
        <form action="" method="post">
            <h2>Register</h2>
            <div class="UPL">
                <label>Image</label>
                <input type="text" name="name" required> 
            </div>
            <div class="UPL">
                <label>Details </label>
                <input type="text" name="details" required>
            </div>
            <div class="UPL">
                <label>DATE </label>
                <input type="date" name="date" required> 
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
