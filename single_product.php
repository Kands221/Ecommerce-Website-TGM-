<?php

include('server/connection.php');

if(isset($_GET['product_id'])){
$product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
  $stmt->bind_param("i",$product_id);

  $stmt->execute();

  $product = $stmt->get_result();

  //no product id was given
}else{
  header('location: index.php');
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-2 sticky-top">
        <div class="container-fluid">
          
          <button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand mx-auto" href="index.html">
            <img src="assets/img/the-good-milk.png" class="logo">
          </a>
          <div class="collapse navbar-collapse nav-buttons" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
            </ul> 
          </div> 
          <li class="nav-item nav-bag-search">
            <a href="cart.html"><i class="bi bi-bag"></i></a>
              <i class="bi bi-search"></i>
          </li>
             
        </div>
      </nav>
      
      

      <section class="container single-product my-5 pt-5">
        <div class="row mt-5">
          <?php while($row = $product->fetch_assoc()){ ?>
              <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/img/<?php echo $row['product_image']; ?>" id="mainImg">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/img/<?php echo $row['product_image']; ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/img/<?php echo $row['product_image2']; ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/img/<?php echo $row['product_image3']; ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/img/<?php echo $row['product_image4']; ?>" width="100%" class="small-img">
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2><?php echo $row['product_price']; ?></h2>
                <h4 class="mt-5 mb-5">Product details</h4>
                <p><?php echo $row['product_description']; ?></p>
                <p>Stored in our sterilized 250ml glass bottles, the metal lid ensures 
                  that every drop stays as fresh as the first. To enjoy its full unique flavor, 
                  it's best to drink it within 3 days of opening. And remember, 
                  to keep it tasting its best, store it cool between 0°C to 4°C.</p>
          <form method="POST" action="cart.php">
              <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
              <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>"/>
              <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>"/>
              <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>"/>
              <input type="number" name="product_quantity" value="1">
              <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
          </form>
                
            </div>
            
          </form>
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
    <script>
        var mainImg = document.getElementById("mainImg");
        var smallImg = document.getElementsByClassName("small-img");

        for (let i=0; i<4; i++){
            smallImg[i].onclick = function(){
            mainImg.src = smallImg[i].src;
        }}

    </script>
</body>
</html>