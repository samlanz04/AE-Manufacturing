<?php
include("includes/db.php");

if ($con) {
    echo "Connected to the database successfully!";
} else {
    echo "Failed to connect to the database.";
}
?>