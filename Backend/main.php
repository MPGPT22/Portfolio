<?php require '../Mechanics/back_auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../CSS/main_Backend_css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<nav style="display: flex; justify-content: space-between; padding: 10px; background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
        <!-- Left side: Logo or brand name -->
        <div style="font-size: 1.5em; font-weight: bold;">
            <a href="../index.php" style="text-decoration: none; color: black;">MyWebsite - Backend</a>
        </div>

        <!-- Right side: Login and Register buttons -->
        <div>
                <span style="margin-right: 10px;">Welcome, <?php echo $username; ?></span>
                <a href="../Mechanics/logout.php" style="text-decoration: none; padding: 8px 12px; background-color: #dc3545; color: white; border-radius: 4px;">Logout</a>
        </div>
    </nav>

    <main>
        <div class="list">
            
        </div>
        <div class="data">
            
        </div>
    </main>


    <script>
        // Function to toggle the dropdown visibility
        function toggleDropdown() {
            var dropdownContent = document.querySelector('.dropdown-content');
            // Toggle the display of the dropdown
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        }

        // Close the dropdown if clicked outside
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown a')) {
                var dropdowns = document.getElementsByClassName('dropdown-content');
                for (var i = 0; i < dropdowns.length; i++) {
                    var dropdown = dropdowns[i];
                    if (dropdown.style.display === "block") {
                        dropdown.style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>