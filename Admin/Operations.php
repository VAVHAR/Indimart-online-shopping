<?php

class Operations
{

   private $servername = "localhost";
    private $username = "id20517519_indimart01";
    private $password = "Hv@9925678950";
    private $database = "id20517519_indimart";
    public $con;

  

    public function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        if(mysqli_connect_error()){
            trigger_error("failed to connect to MySQL:". mysqli_connect_error());
        }
        else{
            return $this->con;
        }
    }

    public function insertProduct($post)
    {
        $pid = uniqid('p');   
        $product_name = $_POST['product_name'];
        $product_info = $_POST['product_info'];
        $product_price = $_POST['product_price'];
        $product_category = $_POST['product_category'];
        $product_status = $_POST['product_status'];

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../images/" . $filename;

        $query = "INSERT INTO `product`(`pid`, `pname`, `pprice`, `pdes`, `pcate`, `pstatus`, `pimage`) 
                  VALUES ('$pid','$product_name','$product_price','$product_info','$product_category','$product_status','$filename')";

        $sql = $this->con->query($query);
        if($sql==true && move_uploaded_file($tempname, $folder)){
            $_SESSION['status'] = "Product Added Successfully";
            header("Location:admin.php?page=admin&msg1=insert");
        }
        else{
            echo 'Failed to insert product';
             echo "Error in ".$query."<br>".$this->con->error;
        }
    }

    public function displayData()
    {
        $query = "SELECT * FROM product";
        $result = $this->con->query($query);
        if($result->num_rows > 0)
        {
            $data = array();
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
        else 
        {
            echo "No found records";
        }
    }

    public function deleteRecord($pid)
    {
        $query = "DELETE FROM product WHERE pid = '$pid'";
        $sql = $this->con->query($query);
        if ($sql==true)
        {
            $_SESSION['status'] = "Record Deleted Successfully";
            header("Location:admin.php?page=admin&msg3=delete");
        }
        else 
        {
            echo "Failed to delete";
        }
    }
    
    public function updateRecord($post)
    {
        $product_name = $_POST['product_name'];
        $product_info = $_POST['product_info'];
        $product_price = $_POST['product_price'];
        $product_category = $_POST['product_category'];
        $product_status = $_POST['product_status'];

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../images/" . $filename;

        $id = $_GET['updateId'];
        if(!empty($id) &&!empty($post)&&$filename != "")
        {
            $query = "UPDATE product SET pname = '$product_name', pdes = '$product_info', pimage= '$filename', pprice='$product_price',pstatus='$product_status' ,pcate='$product_category'
                                            WHERE pid = '$id'";
            $sql = $this->con->query($query);
            
            if($sql==true && move_uploaded_file($tempname, $folder))
            {
                $_SESSION['status'] = "Record Updated Successfully";
                header("Location:admin.php?page=admin&msg2=update");
            }
            else 
            {
                echo "Failed to update";    
                echo "Error in ".$query."<br>".$this->con->error;
            }

        }
        else
        {
            $query = "UPDATE product SET pname = '$product_name', pdes = '$product_info', pprice='$product_price',pstatus='$product_status' ,pcate='$product_category'
            WHERE pid = '$id'";
            
                $sql = $this->con->query($query);

                if($sql==true)
                {
                $_SESSION['status'] = "Record Updated Successfully";
                header("Location:admin.php?page=admin&msg2=update");
                }
                else 
                {
                echo "Failed to update";    
                echo "Error in ".$query."<br>".$this->con->error;
                }
        }
        
    }

    public function displayRecordById($pid)
    {
        $query = "SELECT * FROM product WHERE pid = '$pid'";
        $result = $this->con->query($query);
        if($result->num_rows > 0)
        {           
            $row = $result->fetch_assoc(); 
            return $row;
        }
        else 
        {
            echo "Record not found";
        }
    }

}

?>