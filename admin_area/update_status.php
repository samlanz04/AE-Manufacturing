<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    // Handle status update
    if (isset($_GET['update_status']) && isset($_GET['status'])) {
        $quote_id = intval($_GET['update_status']); // Ensure it's an integer
        $status = intval($_GET['status']); // Ensure it's an integer (1 or 0)
        
        // Validate status value (optional, for extra security)
        if ($status !== 0 && $status !== 1) {
            echo "<script>alert('Invalid status value');</script>";
            exit;
        }

        // Use prepared statement to avoid SQL injection
        $update_status = "UPDATE truck_quotes SET status = ? WHERE id = ?";
        if ($stmt = mysqli_prepare($con, $update_status)) {
            // Bind the parameters
            mysqli_stmt_bind_param($stmt, 'ii', $status, $quote_id);
            
            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                // Redirect after successful status update
                header("Location: index.php?view_quotes");
                exit;
            } else {
                echo "<script>alert('Error updating status: " . mysqli_error($con) . "');</script>";
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Failed to prepare the SQL query.');</script>";
        }
    }
}
?>
