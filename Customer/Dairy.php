<?php
include 'customer_opt.php';
$customerobj = new Customer();

include('../config.php');
$per_page = 8;

$sql    = "select count(*) from product WHERE pcate='Dairy'";
$result = $conn->query($sql);
$count  = $result->fetch_row();
$pages  = ceil($count[0] / $per_page);

?>


<h2 class="text-center" style="margin:17px;font-weight:700;color:red;font-family: Raleway;">Dairy</h2>
            
      <div class="row justify-content-center">

         <?php
         $products = $customerobj->displaydairypro();
          foreach($products as $product)
         {
            if($product['pstatus'] == "In Stock")
            {
                  $customerobj->procard($product['pimage'],$product['pname'],$product['pprice'],$product['pid'],$product['pdes']);
            }
            else
            {
               $customerobj->procardos($product['pimage'],$product['pname'],$product['pprice'],$product['pid'],$product['pdes']);
            }
                 
          }
          ?>
                    
               </div>
              
               <nav aria-label="Page navigation example" style="width: 100%;">
                        
                        <ul class="pagination justify-content-center">
                        <?php
                              for ($i = 1; $i <= $pages; $i++) 
                              {
                                 echo "<a href='Home.php?page=dairy&pagenum=".$i."#products' class='is-active page-item'> <li>$i</li> </a> &nbsp;&nbsp;";
                              } 
                        ?> 
                        </ul>
                      </nav>
                  
            </div>