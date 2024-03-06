<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Home</title>
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
        <div id="header"></div>




        <div id="footer"></div>
    </body>
</html>