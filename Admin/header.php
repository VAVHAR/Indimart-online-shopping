<nav class="navbar navbar-expand-md fixed-top navbar-dark " style="background-color:#34495E;max-height:70px;font-family: Raleway;box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);"> 
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../images/logo_1.png" alt="Logo" style="max-width:63px;max-height:100px;" >
            Indimart
            </a>
           <h2 class="section-heading text-uppercase text-light">Admin Panel</h2>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php

                            if(!isset($_SESSION['usernameadmin']))
                            {
                                header("Location:../Account/Login.php");
                            }
                            else
                            {
                                echo 'Welcome , '. $_SESSION['usernameadmin'];
                            }

                        ?>
                    </a> 
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="../Account/admin_logout.php">
                               Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>