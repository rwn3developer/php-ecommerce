<?php 

    //attach file common.php
    include('admin/Common.php');

    //obj created common class
    $common = new Common();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $res = $common->userRegister($name,$email,$password,$city,$phone,$address);
        $msg = "";
                if ($res) {
                    $msg = "Product successfully insert";
                    echo "<script>
                            setTimeout(function() {
                                window.location.href = 'index.php';
                            }, 2000);
                        </script>";
                } 
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            
            <div class="col-lg-8">
            
            <?php if(isset($msg)){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $msg; ?>
                </div>
            <?php } ?>

            <div class="card p-3">
                <h5 class="card-header">User Register</h5>
                    <div class="card-body">
                        
                        <form method="post" action="">
 
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" name="name" placeholder="Enter your name" class="form-control">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" placeholder="Enter your email" class="form-control">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" placeholder="Enter your name" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">City</label>
                                    <input type="text"  name="city" placeholder="Enter your city" class="form-control">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Phone</label>
                                    <input type="number"  name="phone" placeholder="Enter your phone" class="form-control">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control"  placeholder="Enter your address">

                                </div>
                            </div>

                        </div>


                            
                            
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            <a href="index.php" class="btn btn-success">Login</a>
                        </form> 
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>