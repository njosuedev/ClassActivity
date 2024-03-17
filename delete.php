<?php
  include('connect.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM `add_items` WHERE item_id = $id";
    $query = mysqli_query($conn,$sql);
    if($query){
        header('location: edit.php?message=Product Removed From stock successfully!');
    }
  }
?>