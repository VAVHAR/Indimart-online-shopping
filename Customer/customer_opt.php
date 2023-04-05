<?php

class Customer
{
    private $servername = "localhost";
    private $username = "id20517519_indimart01";
    private $password = "Hv@9925678950";
    private $database = "id20517519_indimart";
    public $conn;


   public function __construct()
   {
       $this->conn = mysqli_connect($this->servername, $this->username, $this->password,$this->database);
       if(mysqli_connect_error())
       {
           trigger_error("failed to connect to MySQL: ". mysqli_connect_error());
       }
       else
       {
           return $this->conn;
       }
   }

   public function displayallpro()
   {
        $per_page = 8;

        if(isset($_GET["pagenum"]))
        {
            $page = $_GET["pagenum"];
        }
        else
        {
            $page = 1;
        }

        $start = ($page-1)*$per_page;
        $sql1   = "select * from product limit $start,$per_page";
        $rsd   = $this->conn->query($sql1);

        if($rsd->num_rows > 0)
        {
            $data = array();

            while ($row = $rsd->fetch_array()) 
            {
                $data[] = $row;
            }
            return $data;
        }
   }

   public function displaydairypro()
   {
        $per_page = 8;

        if(isset($_GET["pagenum"]))
        {
            $page = $_GET["pagenum"];
        }
        else
        {
            $page = 1;
        }

       $start = ($page-1)*$per_page;
       $sql1 = "SELECT * FROM `product` WHERE pcate='Dairy' limit $start,$per_page";
       $rsd = $this->conn->query($sql1);
       if($rsd->num_rows > 0)
       {
           $data = array();
           while($row = $rsd->fetch_array()){
               $data[] = $row;
           } 
           return $data;
       }
       else 
       {
           echo "No found records";
       }
   }

   public function displaygrocerypro()
   {
        $per_page = 8;

        if(isset($_GET["pagenum"]))
        {
            $page = $_GET["pagenum"];
        }
        else
        {
            $page = 1;
        }

       $start = ($page-1)*$per_page;
       $sql1 = "SELECT * FROM `product` WHERE pcate='Grocery' limit $start,$per_page";
       $rsd = $this->conn->query($sql1);
       if($rsd->num_rows > 0)
       {
           $data = array();
           while($row = $rsd->fetch_array()){
               $data[] = $row;
           } 
           return $data;
       }
       else 
       {
           echo "No found records";
       }
   }

   public function searchpro($get)
   {
        $search = mysqli_real_escape_string($this->conn,$_GET['search_query']);

        $query = "SELECT * FROM product WHERE pname LIKE '%$search%' ";

        $result = mysqli_query($this->conn,$query);

        $result = $this->conn->query($query);

        if($result)
        {
            if($result->num_rows > 0)
            {
                $data = array();
                while($row = mysqli_fetch_assoc($result))
                {
                    $data[] = $row;
                } 
                return $data; 
            }

            else

            {
                echo "There are no result matching your search!!!";
            }
        }
        else
        {
            echo "Error in ".$query."<br>".$conn->error;
        }
    }
    public function getData(){
        $sql = "SELECT * FROM product";

        $result = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

    public function cartElement($productimg, $productname, $productprice, $productid){
        $element = "
        
        <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                        <div class=\"border rounded bg-white\" style=\"padding:15px\">
                            <div class=\"row\">
                                <div class=\"col-md-3 pl-0\">
                                    <img src=\"../images/$productimg\" alt=\"Image1\" class=\"img-fluid\">
                                </div>
                                <div class=\"col-md-6\">
                                    <h5 class=\"pt-2\">$productname</h5>
                                    <small class=\"text-secondary\">Seller: Indimart</small>
                                    <h5 class=\"pt-2\">$$productprice</h5>
                                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                </div>
                                <div class=\"col-md-3 py-5\">
                                    <div>
                                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                        <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div></br>
                    </form>
        
        ";
        echo  $element;
    }
     public function procard($productimg, $productname, $productprice, $productid, $productdes)
    {
        $element = "
        <div class=\"col-lg-3 col-md-6 col-sm-6\">
                  <form action=\"Home.php\" method=\"post\">
                     <div id=\"ho_bo\" class=\"our_products shadow-sm\">
                        <div class=\"product\">
                           <figure><img src=\"../images/$productimg\" alt=\"#\" style=\"padding:5px;max-height:250px;max-width:250px\" /></figure>
                        </div>
                        <h3>$productname</h3>
                        <div class=\"d-flex justify-content-between align-items-center mt-3\"> 
                           <div>
                              <span>Price: $$productprice</span>
                           </div>
                           <div>
                              <button class=\"btn btn-danger\" type=\"submit\" name=\"add\">Add to cart<i class=\"fa-solid fa-cart-plus\"></i></button>
                              <input type=\"hidden\" name=\"product_id\" value= $productid>
                           </div>
                       </div>     
                        <p> $productdes</p>
                     </div>
                     </form>
                  </div>
        ";

        echo $element;
    }

    public function procardos($productimg, $productname, $productprice, $productid, $productdes)
    {
        $element = "
        <div class=\"col-lg-3 col-md-6 col-sm-6\">
                  <form action=\"Home.php\" method=\"post\">
                     <div id=\"ho_bo\" class=\"our_products shadow-sm\" style=\" filter:blur(0.8px);\">
                        <div class=\"product\">
                           <figure><del><img src=\"../images/$productimg \" alt=\"#\"/></figure>
                        </div>
                        <h3>$productname</h3>
                        <div class=\"d-flex justify-content-between align-items-center mt-3\"> 
                           <div>
                              <span><del>Price: $$productprice</del></span>
                           </div>
                           <div>
                              <button class=\"btn btn-danger\" type=\"submit\" name=\"add\" disabled>Out of Stock<i class=\"fa-solid fa-cart-plus\"></i></button>
                              <input type=\"hidden\" name=\"product_id\" value= $productid>
                           </div>
                       </div>     
                        <p>$productdes</p>
                     </div>
                     </form>
                  </div>
        ";

        echo $element;
    }
}

?>