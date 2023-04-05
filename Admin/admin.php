<?php
session_start();
require_once 'Operations.php';
$productobj = new Operations();

if(isset($_GET['deleteId']) && !empty($_GET['deleteId']))
{
    $deleteId = $_GET['deleteId'];
    $productobj->deleteRecord($deleteId);
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Indimart Admin Panel</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../images/logo_1.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/style_1.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/style.css"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    
    <body style="background-color:#E2EFF1;color:#002651;">   
    

   <?php
    
    include_once 'header.php' ;
    
   ?>
        <section class="page-section">
           
            <div class="container">
                
                
                <?php

                    if(isset($_GET['msg1'])=="insert")
                    {
                        echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-bs-dismiss='alert'>&times;</button>
                            Product added Successfully.
                           
                           </div> ";
                    }

                    if(isset($_GET['msg2'])=="update")
                    {
                        echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-bs-dismiss='alert'>&times;</button>
                            Product updated Successfully.
                            </div> ";
                    }

                    
                    if(isset($_GET['msg3'])=="delete")
                    {
                        echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-bs-dismiss='alert'>&times;</button>
                            Data deleted Successfully
                            </div>";
                    }

                ?>

                </br></br>
                <a id="add_form" href="add_form.php" class="btn" style="float:right; color:#ffffff!important; font-size:bold;">Add New Product</a>
                <input type="text" id="myInput" class="form-control me-2" style="max-width:250px" onkeyup="myFunction()" placeholder="Search for Products...">
              <br><br>
              
              
              .<h3 style="text-align:center">View Products</h3>
              
                <table class="table center" style="color:#002651"; id="myTable">
                    <thead>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        <th>Product Category</th>
                        <th>Product Status</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                            $products = $productobj->displayData();
                            foreach($products as $product){

                        ?>

                        <tr class="text-center">
                            <td><?php echo $product['pid']; ?></td>
                            <td><?php echo $product['pname']; ?></td>
                            <td><?php echo $product['pdes']; ?></td>
                            <td><?php echo '$'.$product['pprice']; ?></td>
                            <td><?php echo $product['pcate']; ?></td>
                            <td><?php echo $product['pstatus']; ?></td>
                            <td><img src="../images/<?php echo $product['pimage']; ?>" style="max-height:120px;max-width:120px;"></td>
                            <td>

                            <a href="update.php?updateId=<?php echo $product['pid'];?>" style="color:green">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                            &nbsp&nbsp&nbsp

                            <a href="admin.php?page=admin&deleteId=<?php echo $product['pid'];?>" style="color:red;">
                            <i class="fa fa-trash" aria-hidden="true"></i></td></a>
                            </td>
                        </tr>
                        <?php
                            }  ?>
                    </tbody>
                </table>
            </div>
        </section>
        <?php
        
            include_once 'footer.php';
        
        ?>
        <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="../js/custom.js"></script>
    </body>
</html>






