<?php 
require "db.php";


$categories_db = $db->query("SELECT * FROM project_categories");
$categories = [];
if ($categories_db->num_rows > 0) {
    while ($row = $categories_db->fetch_assoc()) {
        $categories[] = $row;
    }
}
$projects_db = $db->query("SELECT * FROM projects");
$projects = [];
if ($projects_db->num_rows > 0) {
    while ($row = $projects_db->fetch_assoc()) {
        $projects[] = $row;
    }
}

 ?>