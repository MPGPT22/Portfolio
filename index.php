<?php 

require 'Mechanics/auth.php';

include 'Mechanics/data_fetch.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="CSS/main_css.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<nav>
        <!-- Left side: Logo or brand name -->
        <div style="font-size: 1.5em; font-weight: bold;">
            <a href="index.php" style="text-decoration: none; color: black;">MyWebsite</a>
        </div>
    </nav>
    	<select id="category-filter">
        <option value="">All Categories</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= htmlspecialchars($category['name']); ?>"><?= htmlspecialchars($category['name']); ?></option>
        <?php endforeach; ?>
    	</select>
		<ul class="horizontal-list" id="projects-list">
		    <?php foreach ($projects as $row): ?>
		        <a href="project_page.php?id=<?= urlencode($row['id']); ?>" title="<?= htmlspecialchars($row['name']); ?>">
		             <li class="project-item" data-category="<?= htmlspecialchars($row['category']); ?>">
		                <?php if (is_null($row['file_main'])): ?>
		                    <img src="default_image.jpg" alt="" style="max-width: 150px">
		                <?php else: ?>
		                    <img src="<?= htmlspecialchars($row['file_main']); ?>" alt="">
		                <?php endif; ?>
		                <h3><?= htmlspecialchars($row['name']); ?></h3>
		                <p><?= htmlspecialchars($row['description']); ?></p>
		            </li>
		        </a>
		    <?php endforeach; ?>
		</ul>



    <script>
       $('#category-filter').on('change', function() {
            var selectedCategory = $(this).val();

            // Show or hide projects based on category selection
            if (selectedCategory === "") {
                // Show all projects
                $('.project-item').show();
            } else {
                // Filter projects by category
                $('.project-item').each(function() {
                    var projectCategory = $(this).data('category');
                    if (projectCategory == selectedCategory) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });
    </script>
</body>
</html>