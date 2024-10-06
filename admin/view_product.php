<?php

    //attach file common.php
    include('Common.php');

    //obj created common class
    $common = new Common();

    //fetch product   
    $productdata = $common->productView();


    //product delete;
    if(isset($_GET['deleteId'])){
        $id = $_GET['deleteId'];
        $res = $common->productDelete($id);

        if ($res) {
            $msg = "Category successfully delete";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'view_product.php';
                    }, 2000);
                  </script>"; 
        }
    }

    




?>

<?php include('header.php') ?>

<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">View Product</h5>

                                <?php if(isset($msg)){ ?>
                                    <div class="mt-3 alert alert-danger" role="alert">
                                        <?php echo $msg; ?>
                                    </div>
                                <?php } ?>
                            </div>
                            
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Srno</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                        <?php 
                                            $i=0;
                                            foreach($productdata as $row){
                                        ?>
                                            <tr>
                                                <td><?php echo ++$i ?></td>
                                                <td><?php echo $row['product'] ?></td>
                                                <td>
                                                    <img src="<?php echo $row['image'] ?>" width="100"/>
                                                </td>
                                                <td><?php echo $row['price'] ?></td>
                                                <td>
                                                    <a href="view_product.php?deleteId=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm text-white">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <a href="edit_product.php?editId=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm text-white">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php  }?>
                                  </tbody>
                            </table>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>


<?php include('footer.php') ?>
