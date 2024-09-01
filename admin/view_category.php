<?php 

    //attach common.php file
    include('Common.php');

     //obj created common class
     $common = new Common();

     //fetch category   
     $categorydata = $common->categoryView();
   
     
    if(isset($_GET['deleteId'])){
        $id = $_GET['deleteId'];
        $msg = "";
        $res = $common->categoryDelete($id);
        if ($res) {
            $msg = "Category successfully delete";
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">View Category</h5>

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
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                        <?php 
                                            $i=0;
                                            foreach($categorydata as $row){
                                        ?>
                                            <tr>
                                                <td><?php echo ++$i ?></td>
                                                <td><?php echo $row['category_name'] ?></td>
                                                <td>
                                                    <a href="view_category.php?deleteId=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm text-white">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <a href="edit_category.php?editId=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm text-white">
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
           
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
        </div>

<?php include('footer.php') ?>
