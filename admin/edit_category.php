<?php

    //attach file common.php
    include('Common.php');

    //obj created common class
    $common = new Common();

    if(isset($_GET['editId'])){
        $id = $_GET['editId'];
        $res = $common->categoryFetchSingleRecord($id);
    }

    if(isset($_POST['submit'])){
        $id = $_POST['editid'];
        $cat = $_POST['category'];
        $res = $common->categoryUpdate($id,$cat);
        $msg="";
        if ($res) {
            $msg = "Category successfully updated";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'view_category.php';
                    }, 2000);
                  </script>";
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
                            <form method="post" action="" class="form-horizontal">
                                <input type="hidden" name="editid" value="<?php echo $res['id']; ?>">
                                <div class="card-body">
                                    <h4 class="card-title">Add Category</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="category" value="<?php if(isset($res['category_name'])) echo $res['category_name']; ?>" placeholder="Category Name Here">
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
