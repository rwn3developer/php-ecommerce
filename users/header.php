<?php session_start(); ?>
<header class="bg-dark p-2">
        <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">Woodcraft</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="product.php">Product</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="cart.php">Cart</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="contact.php">Contact</a>
                    </li> 
                    <li class="nav-item">
                        <?php
                            if(isset($_SESSION['userid'])){ ?>
                                <a href="../admin/logout.php" class="nav-link btn btn-danger active text-white" aria-current="page" href="index.php">Logout</a>
                            <?php } else { ?>
                                <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Login
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="../index.php">Login</a></li>
                                    <li><a class="dropdown-item" href="../register.php">Register</a></li>
                                    
                                </ul>
                                </div>
                            <?php } ?>
                        ?>
                    </li> 
                </ul>
                </div>
            </div>
        </nav>
        </div>
    </header>