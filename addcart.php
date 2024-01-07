<script>  alert('Item  has been added to cart.');</script>

<?php
/*// Start the session
session_start();

// Include database connection file
include 'connect.php';

// Function to add an item to the cart
function addToCart($ratingId) {
    // Check if the item is already in the cart
    if (isset($_SESSION['cart'][$ratingId])) {
        // Increment the quantity if the item is already in the cart
        $_SESSION['cart'][$ratingId]['quantity']++;
    } else {
        // Add the item to the cart with quantity 1
        $_SESSION['cart'][$ratingId] = [
            'quantity' => 1,
            'ratingId' => $ratingId,
        ];
    }
}*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your head content here -->
    <title>Add to Cart</title>
</head>

<body>

    <?php
    // Include database connection file
    include 'connect.php';

    // Check if rating ID is set in the URL
    if (isset($_GET['rating_id'])) {
        $ratingId = $_GET['rating_id'];

        // Increment the cart column in the ratings table
        $updateCartQuery = "UPDATE ratings SET cart = cart + 1 WHERE rating_id = $ratingId";
        $updateCartResult = pg_query($pg_conn, $updateCartQuery);

        if (!$updateCartResult) {
            // Handle the error, e.g., display an error message or log the error.
            echo "Error updating cart.";
        }

        // Retrieve item details
        $itemQuery = "SELECT items.*,ratings.rating_id, ratings.site_name, ratings.rating_value, ratings.price 
        FROM items
                      LEFT JOIN ratings ON items.item_id = ratings.item_id
                      WHERE ratings.rating_id = $ratingId";
        $itemResult = pg_query($pg_conn, $itemQuery);

        if (!$itemResult) {
            // Handle the error, e.g., display an error message or log the error.
            echo "Error retrieving item details.";
        } else {
            $itemDetails = pg_fetch_object($itemResult);
        }
    }
    ?>

    <?php if (isset($itemDetails)) : ?>
      
        <!-- Display item details -->
        <h2>Item Details</h2>
        <p>Item Name: <?php echo $itemDetails->item_name; ?></p>
        <p>Site Name: <?php echo $itemDetails->site_name; ?></p>
        <p>Price: <?php echo $itemDetails->price; ?></p>

        <!-- Add to Cart button -->
        <button onclick="deleteItem(<?php echo $ratingId; ?>)">Delete from Cart</button>
        <button onclick="buyItem(<?php echo $ratingId; ?>)">Buy</button>
    
    <?php endif; ?>

    <?php
    // Close the database connection
    if ($pg_conn != NULL) {
        pg_close($pg_conn);
    }
    ?>

    <!-- Add your body content here -->

    <script>
    function deleteItem(ratingId) {
        console.log("Deleting item with rating ID:", ratingId);
        alert('Item ' + ratingId + ' has been deleted.');
        // Redirect to delete.php with the rating ID
        window.location.href = `delete.php?rating_id=${ratingId}`;
    }

    function buyItem(ratingId) {
        console.log("Buying item with rating ID:", ratingId);
        alert('Item ' + ratingId + ' has been bought.');

        // Check user's choice
       
        // Redirect to buy.php with the rating ID
        window.location.href = `buy.php?rating_id=${ratingId}`;
    }

    // Check if there are any messages in the URL (for debugging)
    const urlParams = new URLSearchParams(window.location.search);
        const alertMessage = urlParams.get('alert');
        if (alertMessage) {
            // Display an alert message as a pop-up
            alert(alertMessage);
        }
</script>
  
</body>

</html>









