<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="import" href="header.html">
</head>
<script>
    fetch('header.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('header').innerHTML = data;
        })

    fetch('footer.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('footer').innerHTML = data;
    })
</script>

<body>
    <div id ="header"></div>

    <?php 
        include('config.php');

        if(isset($_POST['submit'])){

            $username = mysqli_real_escape_string($con,$_POST['username']);
            $password = mysqli_real_escape_string($con,$_POST['password']);

            $result = mysqli_query($con, "SELECT * FROM users WHERE Username='$username' AND Password='$password' ") or die("select error");
            $row = mysqli_fetch_assoc($result);

            if(is_array($row) && !empty($row)){
                $_SESSION['valid'] = $row['Username'];
                $_SESSION['name'] = $row['Name'];
                $_SESSION['email'] = $row['Email'];
                header("Location: home.php");
                exit();
                
            }else{
                echo "<div class='message'>
                        <p> Wrong Username or Password</p>
                        </div> <br>";
                echo "<a href='login.php'><button class='btn'> Go Back</button>";
            }
        }
    ?>

    <div class="form">
    <form method="post">
        <h2>Login</h2>
        <div class="UPL">
            <label>UserName </label>
            <input type="text" name="username" required> 
        </div>
        <div class="UPL">
            <label>Password </label>
            <input type="password" name="password" required >
        </div>
        <div class="btn">
            <input type="submit" name="submit" value="Login">
        </div>
        <div>
            <p>If You Don't have Account <a href="register1.php">Sing Up</a></p>
        </div>
    </form>
    </div>
    <div id="footer"></div>
</body>
</html>
