<nav class="navbar navbar-expand-lg bg-body-tertiary py-2 sticky-top">
  <div class="container-fluid">
    
    <button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mx-auto" href="index.php">
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
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about-us.php">About Us</a>
        </li>
      </ul> 
    </div> 
    <a href="cart.php"><i class="bi bi-bag"></i></a>
    <?php
            if(isset($_SESSION['user'])){
              $image = 'images/profile.jpg';
              echo '
                <li>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="img-fluid rounded-circle border border-dark border-3" alt="User Image"  style="width: 70px;">
                    <span>'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                    <!-- User image -->
                    
                    <li class="user-footer">
                    
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'>LOGIN</a></li>
                <li><a href='signup.php'>SIGNUP</a></li>
              ";
            }
          ?>
  </div>
</nav>
<?php include 'includes/scripts.php'; ?>