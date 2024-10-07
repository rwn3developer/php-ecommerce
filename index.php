<?php 

    session_start();

    if(isset($_SESSION['userid'])) {
        header("Location: admin/dashboard.php");
    }

    //attach file common.php
    include('admin/Common.php');

    //obj created common class
    $common = new Common();

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $res = $common->userLogin($email,$password);

        $rowcount = mysqli_num_rows($res);

        $data = mysqli_fetch_array($res);

        if($rowcount == 1){
            $_SESSION['userid'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['city'] = $data['city'];
            $_SESSION['phone'] = $data['phone'];
            $_SESSION['address'] = $data['address'];
            $_SESSION['role'] = $data['role'];
            $msg = "Successfully Login";

            if($data['role']=="admin"){
                echo "<script>
                    setTimeout(function() {
                        window.location.href = 'admin/dashboard.php';
                    }, 2000);
                </script>";
            }else{
                echo "<script>
                setTimeout(function() {
                    window.location.href = 'users/index.php';
                }, 2000);
            </script>";
            }
            
        }else{
            $msg = "Email and Password Not Valid";
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
                <h5 class="card-header">UserLogin</h5>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control">
                                
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" placeholder="Enter your password" class="form-control">
                            </div>
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            <a href="register.php" class="btn btn-success">Register</a>
                        </form> 
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>