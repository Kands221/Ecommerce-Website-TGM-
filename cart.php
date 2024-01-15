<?php
session_start();
include 'includes/conn.php';

	if(isset($_SESSION['admin'])){
		header('location: admin/home.php');
	}

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
if(isset($_POST['add_to_cart'])){
  //if user has already added a product to cart
  if(isset($_SESSION['cart'])){

    $products_array_ids = array_column($_SESSION['cart'], "product_id"); 
    //if product has already beed added to cart or not
    if(!in_array($_POST['product_id'], $products_array_ids) ){


    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $product_array = array(
      'product_id' => $product_id,
      'product_name' => $product_name,
      'product_price' => $product_price,
      'product_image' => $product_image,
      'product_quantity' => $product_quantity
    );

    $_SESSION['cart'][$product_id] = $product_array;

          //product has already been added
    }else{

      echo '<script>alert("Product was already added")</script>';

    }

    //if this is the first product
  }else{

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $product_array = array(
      'product_id' => $product_id,
      'product_name' => $product_name,
      'product_price' => $product_price,
      'product_image' => $product_image,
      'product_quantity' => $product_quantity
    );

    $_SESSION['cart'][$product_id] = $product_array;


  }

  calculateTotalCart();
//remove product from cart
}else if(isset($_POST['remove_product'])){

  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);
  calculateTotalCart(); 



}else if(isset($_POST['edit_quantity'])){
  #we get id and quantity from the
  $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    // get the product array from the session
    $product_array = $_SESSION['cart'][$product_id];
    //update product quantitty
    $product_array['product_quantity'] = $product_quantity;

    //return array back to its place
    $_SESSION['cart'][$product_id] = $product_array;
    
    
    calculateTotalCart();
  
}else{
}


function calculateTotalCart(){
  foreach($_SESSION['cart'] as $key => $value){
      $product = $_SESSION['cart'][$key];

      $price = (int) $product['product_price'];
      $quantity = (int) $product['product_quantity'];

      $total = 0;
      $total += ($price * $quantity);
  }
    $_SESSION['total'] = 0;
    $_SESSION['total'] = $total;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Good Milk</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/hero-section.css">
    <link rel="stylesheet" href="assets/css/proposition.css">
    <link rel="stylesheet" href="assets/css/about-us.css">
    <link rel="stylesheet" href="assets/css/carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>


<?php include 'section/nav.php';?>
      
      

      <!--- CART-->
      <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Cart</h2>
            <hr>
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>


            <?php foreach($_SESSION['cart'] as $key => $value){ ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/img/<?php echo $value['product_image']; ?>">
                        <div>
                            <p><?php echo $value['product_name']; ?></p>
                            <small><span>₱</span><?php echo $value['product_price']; ?></small>
                            <br>
                            <form method="POST" action="cart.php">
                              <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                              <input type="submit" name="remove_product" class="remove-btn" value="remove">
                           </form>
                        <div>
                    </div>
                </td>

                <td>
                    
                    <form method="POST" action="cart.php">
                      <input type="hidden" name="product_id" value="<?php echo $value["product_id"];?>">
                      <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>"> 
                      <input type="submit"  class="edit-btn" href="#" value="edit" name="edit_quantity">
                    </form>
                </td>

                <td>
                    <span>₱</span>
                    <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price'];?></span>
                </td>
            </tr>


            <?php } ?>
        </table>

        <div class="cart-total">
            <table>
                <!-- <tr>
                    <td>Subtotal</td>
                    <td>₱99</td>
                </tr> -->
                <tr>
                    <td>Total</td>
                    <td>₱<?php echo $_SESSION['total']; ?></td>
                </tr>

            </table>
        </div>
        
        <div class="checkout-container">
            <button class="btn checkout-btn">Checkout</button>
        </div>


      </section>


      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Products</h3>
            <hr>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_products.php'); ?>

        <?php while($row= $featured_products->fetch_assoc()) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/img/<?php echo $row['product_image']; ?>" alt="" class="img-fluid mb-3">
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price">₱<?php echo $row['product_price']; ?></h4>
                <form method="POST" action="cart.php">
              <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
              <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>"/>
              <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>"/>
              <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>"/>
              <input type="hidden" name="product_quantity" value="1">
              <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
          </form>
            </div>

        <?php } ?>
        </div>
      </section>






      
    <div class="container">
        <footer class="py-5">
          <div class="row">
            <div class="col-6 col-md-2 mb-3">
              <h5>Section</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
              </ul>
            </div>
      
            <div class="col-6 col-md-2 mb-3">
              <h5>Section</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
              </ul>
            </div>
      
            <div class="col-6 col-md-2 mb-3">
              <h5>Section</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
              </ul>
            </div>
      
            <div class="col-md-5 offset-md-1 mb-3">
              <form>
                <h5>Subscribe to our newsletter</h5>
                <p>Monthly digest of what's new and exciting from us.</p>
                <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                  <label for="newsletter1" class="visually-hidden">Email address</label>
                  <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                  <button class="btn btn-primary" type="button">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
      
          <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>© 2023 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
              <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
              <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
              <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
            </ul>
          </div>
        </footer>
      </div>

      
  <script src="assets/js/hero-section.js"></script>
  <script src="assets/js/carousel.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
