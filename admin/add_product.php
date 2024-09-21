<?php

    //attach file common.php
    include('Common.php');

    //obj created common class
    $common = new Common();

    $categoryRecord = $common->categoryView();


    

    if(isset($_POST['submit'])){
        $category = $_POST['category'];

        $target_dir = "uploads/"; // Make sure this folder is writable
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size (limit set to 5MB)
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowed_types = array("jpg", "png", "jpeg", "gif", "pdf");
        if (!in_array($fileType, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            $uploadOk = 0;
        }

        // Check if everything is ok before uploading the file
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                $category = $_POST['category'];
                $product = $_POST['product'];
                $file_name = basename($_FILES["image"]["name"]);
                $price = $_POST['price'];
                $description = $_POST['description'];


                $res = $common->productInsert($category,$product,$file_name,$price,$description);
                $msg= "";
                if ($res) {
                    $msg = "Product successfully insert";
                    echo "<script>
                            setTimeout(function() {
                                window.location.href = 'view_category.php';
                            }, 2000);
                        </script>";
                }

                
            } else {
                echo "Sorry, there was an error uploading your file.";
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
                                <div class="card-body">
                                    <h4 class="card-title">Add Category</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select name="category" class="form-control">
                                                <option value="">---select category---</option>
                                                <?php 
                                                    foreach($categoryRecord as $row) {
                                                ?>
                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="product" class="form-control" id="fname" name="product" placeholder="Product Name Here">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="price" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="description" class="form-control"/>
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>

<?php include('footer.php') ?>
