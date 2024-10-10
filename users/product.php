<?php 

    session_start();
    include('../admin/Common.php');

    $common = new Common();

    $products = $common->productView();

   
    if(isset($_GET['productId']) && isset($_GET['userId'])){
        $userid = $_GET['userId'];
        $productid = $_GET['productId'];

        $data = $common->productFetchSingleRecord($productid);

        $product = $data['product'];
        $image = $data['image'];
        $price = $data['price'];
        $qty = $data['qty'];

        $res = $common->addCart($userid,$productid,$product,$image,$price,$qty);
        $msg = "";
        if ($res) {
            $msg = "Product successfully Add Cart";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'cart.php';
                    }, 2000);
                </script>";
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Woodcreaft</title>
  </head>
  <body>
    
    <?php include('header.php') ?>

    <div class="main">

        <div class="product mt-5">
            <div class="container">
                <div class="row">
                
                <?php foreach($products as $p) { ?>
                    <div class="col-lg-3">
                        <div class="card p-3">
                            <img src="../admin/<?php echo $p['image'] ?>" style="height:200px;object-fit: contain;" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Name :- <?php echo $p['product'] ?></h5>
                                <h5 class="card-title">Price :- <?php echo $p['price'] ?></h5>

                                <p class="card-text"><?php echo $p['description'] ?></p>
                                <a href="product.php?productId=<?php echo $p['id'] ?>&userId=<?php echo $_SESSION['userid'] ?>" class="btn btn-primary">Add Cart</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                </div>
            </div>
        </div>

    </div>
</body>
</html>