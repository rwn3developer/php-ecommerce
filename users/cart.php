<?php 
    
    include('../admin/checkUser.php');

    include('../admin/Common.php');

    $common = new Common();

    

    $allcart = $common->viewCart($_SESSION['userid']);    

    if(isset($_GET['deleteid'])){
        $deleteid = $_GET['deleteid'];
        $res = $common->deleteCart($deleteid);
        $msg = "";
        if ($res) {
            $msg = "Product successfully delete from cart";
            echo "<script>
            setTimeout(function() {
            window.location.href = 'cart.php';
            }, 2000);
            </script>";
            }
    }

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
    
        include('header.php');
        
    ?>
    <div class="container mt-5">
        <h2 class="mb-4">Shopping Cart</h2>

      

        <div class="table-responsive">
            <table class="table align-middle table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Cart Item -->
                    <?php
                        $sum = 0;
                        if($allcart) {
                            foreach($allcart as $cart) 
                                $sum = $cart['price'] * $cart['qty'];
                            {  ?>
                             <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img width="100" src="../admin/<?php echo $cart['image'] ?>" class="img-fluid rounded me-3" alt="Product Image">
                                <span>Product Name</span>
                            </div>
                        </td>
                        <td>
                            <input type="number" value="<?php echo $cart['qty'] ?>"  class="form-control w-75">
                        </td>
                        <td><?php  echo $cart['price'] ?></td>

                        <td><?php echo $cart['price'] *  $cart['qty'] ?></td>

                        <td>
                            <a href="cart.php?deleteid=<?php echo $cart['id'] ?>" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                        <?php } } ?>
                    <!-- Additional Cart Items can be added similarly -->
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a href="product.php" class="btn btn-outline-primary">Continue Shopping</a>
            <div>
                <h5>Subtotal: <span><?php echo $sum; ?></span></h5>
                <button class="btn btn-success">Checkout</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
