<?php

    //attach file common.php
    include('Common.php');

    //obj created common class
    $common = new Common();

    $categoryRecord = $common->categoryView();

    if(isset($_GET['editId'])){
        $id = $_GET['editId'];
        $productsingle = $common->productFetchSingleRecord($id);
    }

    if(isset($_POST['submit'])){
        $target_dir = "uploads/"; // Make sure this folder is writable
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $editid = $_POST['editid'];
        $category = $_POST['category'];
        $product = $_POST['product'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        if($_FILES["image"]["name"]){
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                   
                   
                    $file_name = "./uploads/".basename($_FILES["image"]["name"]);
                    

                    $res = $common->productUpdate($editid,$category,$product,$file_name,$price,$description);
                    $msg= "";
                    if ($res) {
                        $msg = "Product successfully insert";
                        echo "<script>
                                setTimeout(function() {
                                    window.location.href = 'view_product.php';
                                }, 2000);
                            </script>";
                    }
                }
                


        }else{
            $file_name = "";
            $res = $common->productUpdate($editid,$category,$product,$file_name,$price,$description);
            $msg= "";
            if ($res) {
                $msg = "Product successfully insert";
                echo "<script>
                        setTimeout(function() {
                            window.location.href = 'view_product.php';
                        }, 2000);
                    </script>";
            }
        }
        
    }

?>

<?php include('header.php') ?>

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Category</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row p-3">
                    <div class="col-md-6">
                        <div class="card">
                            <?php if(isset($msg)){ ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $msg; ?>
                                </div>
                            <?php } ?>
                            <form method="post"  enctype="multipart/form-data"  class="form-horizontal">

                                <input type="hidden" name="editid" value="<?php echo $productsingle['id'] ?>">

                                <div class="card-body">
                                    <h4 class="card-title">Edit Product</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select name="category" class="form-control">
                                                <option value="">---select category---</option>
                                                <?php 
                                                    foreach($categoryRecord as $row) {
                                                ?>

                                                    <?php if($row['id']==$productsingle['categoryId']) { ?>
                                                        <option selected value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option> 
                                                    <?php } else { ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option>
                                                    <?php } ?>
                                                        
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="product" class="form-control" id="fname" name="product" value="<?php echo $productsingle['product'] ?>" placeholder="Product Name Here">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control"/>
                                            <img src="<?php echo $productsingle['image'] ?>" width="100" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="price" value="<?php echo $productsingle['price'] ?>"  class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="description" value="<?php echo $productsingle['description'] ?>"  class="form-control"/>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       

                    </div>
                    
                </div>
                
            </div>
            
        </div>

<?php include('footer.php') ?>
