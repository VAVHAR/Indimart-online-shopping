<?php
session_start();
class User
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
    
   public function register($POST)
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $useremail = $_POST['email'];
        $pass = $_POST['password'];      
        $uid = uniqid('u');   
        
        $query = "INSERT INTO `register`(`uid`, `fname`, `lname`, `uemail`, `password`) 
        VALUES ('$uid','$fname','$lname','$useremail',MD5('".$pass."'))";

        $sql = $this->conn->query($query);                        
        if($sql === true)
        {
           header("Location:login.php");
        }
        else 
        {
           echo "Failed Insert";
        }
    }

    public function login($POST)
    {
        $username = $_POST['email'];  
        $password = $_POST['password'];  
          
            //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($this->conn, $username);  
        $password = mysqli_real_escape_string($this->conn, $password);  

        $query ="SELECT * FROM `register` WHERE uemail = '$username' and password = MD5('".$password."')";
        $result = $this->conn->query($query);
       
        if($result->num_rows > 0)
        {        
            $row = $result->fetch_assoc();
           
            if($row['uemail'] == 'Admin@Indimart.ca')
            {   
                
                $_SESSION['usernameadmin'] = $row['fname'];  
                header('location: ../Admin/admin.php');	
            }
            else
            {
                
                $_SESSION['username'] = $row['fname']; 
                
                 
                header("Location:../Customer/Home.php?login=successful");
            }
                       
        }
        else 
        {
            echo "Login failed. Invalid username or password";  
        }
          
    }


}
?>