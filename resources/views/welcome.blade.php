<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrolling Navbar</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            padding-top: 60px; /* Adjust the padding-top to match your navigation bar height */
        }

        .navbar {
            background-color: #333;
            padding: 15px;
            position: fixed;
            top: 0;
            width: 100%;
            transition: top 0.3s;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 15px;
            display: inline-block;
        }

        .logo {
            display: inline-block;
            margin-left: 20px; /* Adjust the margin as needed */
        }
    </style>
</head>
<body>

    <div class="navbar" id="navbar">
        <img src="your-logo.png" alt="Logo" class="logo"> <!-- Replace "your-logo.png" with your actual logo file -->
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>

    <!-- Your content goes here -->
    <div style="height: 800px; background-color: #f2f2f2;">
        <!-- Your page content -->
    </div>

    <script>
        let prevScrollPos = window.pageYOffset;

        window.onscroll = function() {
            let currentScrollPos = window.pageYOffset;

            if (prevScrollPos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-60px"; /* Adjust the value to match your navigation bar height */
            }

            prevScrollPos = currentScrollPos;
        }
    </script>

</body>
</html>

