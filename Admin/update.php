<?php

session_start();

require_once 'Operations.php';
$operationObj = new Operations();
if(isset($_GET['updateId']) && !empty($_GET['updateId']))
{
    $updateId = $_GET['updateId'];
    $course = $operationObj->displayRecordById($updateId);
}

if(isset($_POST['update']))
{
    $operationObj->updateRecord($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Update Product</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/style_1.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/style.css"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php
            include_once 'header.php';
        ?>
        <div class="card text-center" style="padding: 15px">
            <h3>Update Product</h3>
        </div><br>
        <div class="container">
        <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
             <div class="form-group row" style="margin-bottom:10px">
                <label for="productname" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $course['pname'] ?>">
                </div>
            </div>
            <div class="form-group row" style="margin-bottom:10px">
                <label for="productprice" class="col-sm-2 col-form-label">Product Price</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $course['pprice'] ?>" >
                </div>
            </div>
                <div class="form-group row" style="margin-bottom:10px">
                    <label for="productinfo" class="col-sm-2 col-form-label">Product Description</label>
                    <div class="col-md-6">
                        <textarea type="textarea" rows="4" cols="50" class="form-control" id="product_info" name="product_info"><?php echo $course['pdes'] ?></textarea>
                    </div>
                </div>

                <!-- <------Product Category------> 

                <div class="form-group row" style="margin-bottom:10px">
                    <div class="row">
                        
                            <label for="productcategory" class="col-sm-2 col-form-label">Product Category</label>
                      
                        <div class="col-md-2">
                        <select class="form-control" id="product_category" name="product_category" style="appearance: menulist;">
                            <option selected><?php echo $course['pcate'] ?></option>
                            <option >Grocery </option>
                            <option >Dairy </option>
                        </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:10px">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="productstatus" class="col-form-label">Product Status</label>
                        </div>
                        <div class="col-md-2">
                        <select class="form-control" id="product_status" name="product_status" style="appearance: menulist;">
                            <option selected><?php echo $course['pstatus'] ?> </option>
                            <option >In Stock </option>
                            <option >Out Of Stock </option>
                        </select>
                        </div>
                    </div>
                </div>
            
                <div class="form-group row" style="margin-bottom:10px">
                    
                       <div class="row">
                        
                            <label for="uploadfile" class="col-sm-2 col-form-label">Product Image</label>
                        
                        <div class="col-md-5">
                            <input class="form-control" type="file" id="uploadfile" name="uploadfile" value="<?php echo $course['pimage'] ?>" />
                            
                        </div>
                       </div>
                </div>
                <div class="form-group row" style="margin-bottom:10px">
                    
                    <label for="productprice" class="col-sm-2 col-form-label">Current Product Image</label>
                    <div class="col-md-6">
                        <img src="../images/<?php echo $course['pimage']; ?>" style="max-height:150px;max-width:150px;">
                    </div>
                         
                     
             </div>
                <input type="submit" class="btn btn-primary" name="update" value="Update" style="margin-top:5px">
            </form>
        </div>     
        <?php
            include_once 'footer.php';
        ?>    
    </body>
</html>