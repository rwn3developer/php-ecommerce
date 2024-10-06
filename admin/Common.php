<?php 

    class Common{

        private $con;

        function __construct(){

            $this->con = mysqli_connect("localhost","root","","ecommerce");

            if($this->con === false){
                echo "Database not connected";die;
            }
        }

        function userLogin($email,$password){
        
            $res = mysqli_query($this->con,"SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'");
            return $res;
        }

        function userRegister($name,$email,$password,$city,$phone,$address){
            $res = mysqli_query($this->con,"INSERT INTO `users`(`name`, `email`, `password`, `city`, `phone`, `address`) VALUES ('$name','$email','$password','$city','$phone','$address')");

            return $res;
        }

        //category insert
        function categoryInsert($cat){
            $res = mysqli_query($this->con,"INSERT INTO `category` (`category_name`) VALUES ('$cat')");
            return $res;
        }

         //category fetch
        function categoryView(){
            $res = mysqli_query($this->con,"SELECT * FROM `category`");
           
            $record = array();

            while($row = mysqli_fetch_array($res)){
                $record[] = $row;
            }

            return $record;
        }

         //category delete
        function categoryDelete($id){
            $res = mysqli_query($this->con,"DELETE FROM `category` WHERE `id`='$id'");
            return $res;
        }

         //category single record fetch
        function categoryFetchSingleRecord($id){
           $res = mysqli_query($this->con,"SELECT * FROM `category` WHERE `id`='$id'");
           
           $record = mysqli_fetch_array($res);
           
           return $record;
        }

        //category update
        function categoryUpdate($id,$cat){
            $res = mysqli_query($this->con,"UPDATE `category` SET `category_name`='$cat' WHERE `id`='$id'");
            return $res;
        }

        function productInsert($category,$product,$file_name,$price,$description){
            $res = mysqli_query($this->con,"INSERT INTO `product`(`categoryId`, `product`, `image`, `price`,`description`) VALUES ('$category','$product','$file_name','$price','$description')");
            return $res;
        }

        function productView(){
            $res = mysqli_query($this->con,"SELECT * FROM `product`");
            $record = array();
            while($row = mysqli_fetch_array($res)){
                $record[] = $row;
            }
            return $record;
        }

        function productFetchSingleRecord($id){
            $res = mysqli_query($this->con,"SELECT * FROM `product` WHERE `id`='$id'");
            
            $record = mysqli_fetch_array($res);
            
            return $record;
         }

        function productDelete($id){
            $old = $this->productFetchSingleRecord($id);
            if($old){
                // Check if the file exists and delete it
            if(file_exists($old['image'])) {
                unlink($old['image']);  // Deletes the file
            }

            // Delete the product record from the database
            $res = mysqli_query($this->con,"DELETE FROM `product` WHERE `id`='$id'");
            return $res;
            }
        }

        function productUpdate($id, $category, $product, $file_name, $price, $description) {
            $old = $this->productFetchSingleRecord($id);
        
            // Check if an old record exists
            if ($old) {
                // If a new file is provided, delete the old one and update with the new file
                if ($file_name) {
                    if (file_exists($old['image'])) {
                        unlink($old['image']);  // Delete the old file
                    }
                } else {
                    // If no new file is provided, use the old file name
                    $file_name = $old['image'];
                }
        
                // Update the product details with or without new file
                $res = mysqli_query($this->con, "UPDATE `product` SET 
                    `categoryId` = '$category', 
                    `product` = '$product', 
                    `image` = '$file_name', 
                    `price` = '$price', 
                    `description` = '$description' 
                    WHERE `id` = '$id'");
        
                return $res;
            } else {
                return false; // Record doesn't exist
            }
        }
        
    }

?>