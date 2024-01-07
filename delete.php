

<?php
// Include database connection file
include 'pg_connect.php';

// Check if rating ID is set in the URL
if (isset($_GET['rating_id'])) {
    $ratingId = $_GET['rating_id'];

    // Decrement the cart column in the ratings table
    $updateQuery = "UPDATE ratings SET cart = GREATEST(cart - 1, 0) WHERE rating_id = $ratingId";
    $updateResult = pg_query($pg_conn, $updateQuery);

    if (!$updateResult) {
        // Handle the error, e.g., display an error message or log the error.
        echo "Error updating cart.";
    }
}

// Close the database connection
if ($pg_conn != NULL) {
    pg_close($pg_conn);
}

// Redirect back to the main page or wherever needed
header("Location: cust_index.php");
exit();
?>
