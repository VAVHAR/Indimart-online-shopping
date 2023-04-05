<?php
session_start();

if (isset($_POST['add'])){
   /// print_r($_POST['product_id']);
   if(isset($_SESSION['cart'])){

       $item_array_id = array_column($_SESSION['cart'], "product_id");

       if(in_array($_POST['product_id'], $item_array_id)){
           echo "<script>alert('Product is already added in the cart..!')</script>";
           echo "<script>window.location = 'Home.php'</script>";
       }else{

           $count = count($_SESSION['cart']);
           $item_array = array(
               'product_id' => $_POST['product_id']
           );

           $_SESSION['cart'][$count] = $item_array;
       }

   }else{

       $item_array = array(
               'product_id' => $_POST['product_id']
       );

       // Create new session variable
       $_SESSION['cart'][0] = $item_array;
    //   print_r($_SESSION['cart']);
   }
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Indimart</title>
      <link rel="icon" href="../images/logo_1.png" type="image/x-icon"/>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>

      <!-- style css -->
      <link rel="stylesheet" href="../css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="../../images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
      <!-- Font Awesome icons (free version)-->
      <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

      <style>
         

.fa-star,
.fa-star-half{
    color: yellowgreen;
    padding: 3% 0;
}

#cart_count{
    text-align: center;
    padding: 0 0.9rem 0.1rem 0.9rem;
    border-radius: 3rem;
}

.shopping-cart{
    padding: 3% 0;
}

.cart-items + .cart-items{
    padding: 2% 0;
}

.price-details h6{
    padding: 3% 2%;
}
      </style>
      
   </head>
   <!-- body -->
   <body class="main-layout">
     
      <!-- header -->
      <header class="full_bg">
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="container">
                              <a class="navbar-brand" href="#page-top">
                                 <img src="../images/logo_1.png" alt="Logo" style="width:63px;height:53px;"/>INDIMART
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                           
                          <a class="nav-link" href="Home.php">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#about">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#products">our Products</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#contact">Contact Us</a>
                              </li>
                              <li class="nav-item dropdown">
                                 <!--  -->
                               
                                <?php
                                    if(isset($_SESSION['username']))
                                    {
                                       
                                     ?>
                                    <div class="dropdown show">
                                          <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fas fa-user mx-1"></i> Welcome, <?php echo $_SESSION['username']; ?>
                                          </a>

                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                             <a class="dropdown-item" href="../Account/logout.php">Logout</a>
                                          </div>
                                          </div>
                                   <?php }
                                    else
                                    {
                                      echo '<a class="nav-link text-white" href="../Account/login.php" id="navbarDropdown" role="button" > <i class="fas fa-user mx-1"></i>Login / Signup</a>';
                                    }
                                 ?>
                             </li>
                             <li  class="nav-item">
                             <a class="nav-link" href="cart.php">
                             <img src="../images/cart.png" style="max-width:23px;max-height:23px;" alt="shooping cart images...">Cart
                                 <?php

                                 if (isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<span id=\"cart_count\" class=\"text-danger bg-light\">$count</span>";
                                 }else{
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                                 }

                                 ?>
                                 </a>
                             </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
         <!-- end header -->
         <!-- banner -->
         <section class="banner_main">
            <div class="container">
               <div class="banner_po">
                  <div class="row">
                     <div class="col-md-7">
                        <div class="text_box">
                           <!-- <span>Now started</span> -->
                           <h3> <strong>Your One-stop-shop for </strong> <br> Indian Grocery </h3>
                           <a class="read_more" href="#about" role="button">About us</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </header>
      <!-- end banner -->
      <!-- about -->
      <div id="about" class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <div class="titlepage">
                     <h2>About Us</h2>
                     <span>
                        We aim to offer our customers a variety of Indian products such as Spices, Pulses, Snacks and much more.
                        We've come a long way, so we know exactly which direction to take when supplying you with high quality yet budget-friendly products. 
                        We offer all of this while providing excellent customer service and friendly support.
                     </span>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="about_img">
                     <figure><img src="../images/grocery_about_us.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      
      <!-- our products -->
      <div class="products" id="products">
         <div class="container">
            <div class="row">
               <div class="col-md-6 offset-md-5">
                  <div class="titlepage">
                     <h2>Our Products</h2>
                  </div>
               </div>
            </div>

           <div class="row justify-content-between" >
               <div class="col-12">                   
                 <nav class="navbar bg-body-tertiary navbar-expand-lg" style="background-color:#e9ecef;border-radius:8px;margin: 10px 0px">
                     <div class="container-fluid">
            
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item" style="padding: 0px 8px;">
                        <a class="nav-link btn btn-danger me-2" type="button" href="Home.php?#products" style="border-radius:8px;"><span><i class="fa-solid fa-list"></i></span> All Categories</a>
                        </li>
                        <li class="nav-item" style="padding: 0px 8px;">
                        <a class="nav-link" href="Home.php?page=grocery&#products" style="color:red;">Grocery</a>
                        </li>
                        <li class="nav-item" style="padding: 0px 8px;">
                        <a class="nav-link" href="Home.php?page=dairy&#products" style="color:red;">Dairy</a>
                        </li>
                        </ul>
                        <form class="d-flex" role="search" action="search_product.php?&#products" method="get">
                       <input class="form-control me-2" type="search" name="search_query" id="search_query" placeholder="Search for Products" aria-label="Search" style="border-color:red;">
                        &nbsp;&nbsp;
                        <input class="btn btn-outline-danger" type="submit" id="search" name="search"><a href="search_product.php?&#products"></a></input>   
                        </form>
                     </div>
                  </nav>
               </div>   
            </div>
            <div class="container-fluid">
      <div>
      <?php
            # inlude content here
            if(!(isset($_GET['page']))){
                include_once('All_categories.php');
            }
            else 
            {
               
                $page = $_GET['page'];
                switch ($page) {
                    case 'grocery':
                        
                        include_once('Grocery.php');
                        break;
                    case 'dairy':
                        
                        include_once('Dairy.php');
                        break;
                    case 'searchpro':
                        
                        include_once('search_product.php');
                        break;
                    default:
                        # code...
                        echo "<h4 style='text-align:center; color:red'>404: Oops page not found...</h4>";
                        break;
                }
            }
            
        ?>
      </div>
    </div>
      </div>
      <!-- end our products -->

      <!--  contact -->
      <div class="contact" id="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact Us</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6  padding_right0">
                  <div class="map_main">
                     <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2795.7068884110004!2d-73.67758488457982!3d45.515978779101545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91840f9cb4ca1%3A0xce7f12be3902472b!2sVanier%20College!5e0!3m2!1sen!2sca!4v1679079938761!5m2!1sen!2sca" width="600" height="453" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
                     </div>
                  </div>
               </div>
               <div class="col-md-6 padding_left0">
                  <form id="request" class="main_form">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Name" type="type" name="Name"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Phone" type="type" name="Phone"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="type" name="Email">                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="type" Message="Message">Message</textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
                     </div>
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">

               <div class="row">
                  <div class="col-md-4">
                     <h3>menu LINKS</h3>
                     <ul class="link_menu">
                        <li><a href="#">Home</a></li>
                        <li><a href="#about"> About</a></li>
                        <li><a href="#products">Our Products</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class=" col-md-3">
                     <h3>Indimart</h3>
                     <p class="many">
                        We aim to offer our customers a variety of Indian products such as Spices, Pulses, Snacks and much more.
                     </p>
                  </div>
                  <div class="col-lg-3 offset-mdlg-2     col-md-4 offset-md-1">
                     <h3>Contact </h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> 821 Av. Sainte-Croix, Saint-Laurent, QC H4L 3X9, Canada</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> contact@Indimart.ca</a></li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> Call : +01 1234567890</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        <p>© 2023 All Rights Reserved. Design by Hardik Vaviya & Deepali Patel</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->





      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="../js/custom.js"></script>
   </body>
</html>