<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="import" href="header.html">
    </head>

    <script>
    fetch('header_footer/header2.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('header').innerHTML = data;
        })

    fetch('header_footer/footer.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('footer').innerHTML = data;
    })
    </script>

    <body>
        <div id="header"></div>

        <h1>home page</h1>


        <div id="footer"></div>
    </body>
</html>