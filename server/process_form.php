<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST["id"];
    // You can retrieve other form data in a similar way

    // Check if the cart session variable exists, if not, create it
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    // Add the product to the cart
    $_SESSION["cart"][$id] = 1; // You can set the quantity as needed

    // Send a response back to the client (for example, a success message)
    echo json_encode(array("success" => true, "message" => "Product added to cart successfully"));
} else {
    // Handle the case where the request method is not POST
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}
?>
