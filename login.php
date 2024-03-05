<!DOCTYPE html>
<html lang="en">
    <head>
        <title>login</title>
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
        .then(responce => responce.text())
        .then(data => {
            document.getElementById('footer').innerHTML = data;
        })
    </script>

    <body>
        <div id ="header"></div>
        <div class="form">
        <form method="post">
            <h2>Login</h2>
            <div class="UPL">
                <label >UserName </label>
                <input type="text" id="username" required > 
            </div>
            <div class="UPL">
                <label >Password </label>
                <input type="password" id="password" required >
            </div>
            <div class="btn">
                <input type="submit"  value="Login">
            </div>
            <div>
                <p>If You Don't have Account <a href="register1.php">Sing Up</a></p>
            </div>
        </form>
        </div>
        <div id="footer"></div>

    </body>

</html>
