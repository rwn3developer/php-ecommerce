<?php 

    class Common{

        private $con;

        function __construct(){

            $this->con = mysqli_connect("localhost","root","","ecommerce");

            if($this->con === false){
                echo "Database not connected";die;
            }
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


    }

?>