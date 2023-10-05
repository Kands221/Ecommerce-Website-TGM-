
<?php

include('server/connection.php');

$sql = "SELECT * FROM products";
$result = $conn->query($sql);


?>

  
<div class="bg-carousel">
  <div class="circle-container">
    <div class="circle"></div>
  </div>
  <div class="slider-container">
    <div class="quick-add no-js-hidden button-container">
 
        <form
          method="POST"
          action="cart.php"
          id="quick-add-template--20635886092591__product-grid8841119891759"
        >
        <?php 
          while($row = $result->fetch_assoc()) {
        ?>
              <input type="hidden" name="product_id" id="product_id" value="0" />

              <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>"/>
              <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>"/>
              <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>"/>
              <input type="hidden" name="product_quantity" value="1">
              <?php
              }
      
          $conn->close();
          ?>
          <button
            name="add_to_cart"
            class="buy-btn"
  
          >
            <span>Add to cart </span>
            <div class="loading-overlay__spinner hidden">
              <svg
                aria-hidden="true"
                focusable="false"
                class="spinner"
                viewBox="0 0 66 66"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle class="path" fill="none" stroke-width="6" cx="33" cy="33" r="30"></circle>
              </svg>
            </div>
          </button>
     
        </form>

    </div>
    <button class="slider-button left" id="leftButton"><img src="assets/img/arrow.png"></button>
    <div class="circular-slider">
      <ul class="wrapper flex-center">
        <li class="slides" style="--img-no:1;"><img src="assets/img/FRONT_CHOC.png"></li>
        <li class="slides" style="--img-no:2;"><img class="active" src="assets/img/FRONT_PAN.png"></li>
        <li class="slides" style="--img-no:3;"><img src="assets/img/Fresh Milk Bottle.png"></li>
        <li class="slides" style="--img-no:4;"><img src="assets/img/FRONT_STRAW.png"></li>
        <li class="slides" style="--img-no:5;"><img src="assets/img/Fresh Milk Bottle.png"></li>
        <li class="slides" style="--img-no:6;"><img src="assets/img/FRONT_STRAW.png"></li>
      </ul>
    </div>
    <button class="slider-button right" id="rightButton"><img src="assets/img/arrow.png"></button>
 
  </div>
</div>

<script>
$(document).ready(function() {
    // Define an object to map image numbers to product IDs
    var imageToProductId = {
        1: 1,  // Map image number 1 to product ID 1
        2: 2,
        3: 3,
        4: 4, 
        5: 5,
        6: 6 // Map image number 2 to product ID 2, and so on
        // Add more mappings as needed
    };

    // Event listener for when a slide changes
    $('.slider-button').on('click', function() {
        // Get the active image number from the style attribute
        var activeImageNumber = parseInt($(this).attr('--img-no'));

        // Update the product_id input field with the corresponding product ID
        $('#product_id').val(imageToProductId[activeImageNumber]);
    });
});
</script>
