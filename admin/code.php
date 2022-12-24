<?php

session_start();
include('../config/dbcon.php');

if(isset($_POST['add_product'])){
  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $description = $_POST['description'];
  $status = isset($_POST['status']) ? '1':'0';

  $image = $_FILES['image']['name'];

  $path="../uploads";

  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = time().'.'.$image_ext;

  $cate_query="INSERT INTO categories
  (name,slug,description,status,image) VALUES
  ('$name','$slug','$description','$status','$filename')";
  $cate_query_run = mysqli_query($con,$cate_query);

  if($cate_query_run){
    move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
    $_SESSION['message']="Product Added";
    header('Location: add-category.php');
  }
  else{
    $_SESSION['message']="Something went wrong";
    header('Location: add-category.php');
  }
}

else if(isset($_POST['update_product'])){
  $category_id = $_POST['category_id'];
  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $description = $_POST['description'];
  $status = isset($_POST['status']) ? '1':'0';

  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];

  if($new_image != ""){
    //$update_filename = $new_image;
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $update_filename = time().'.'.$image_ext;
  }
  else{
    $update_filename = $old_image;
  }
  $path="../uploads";
  $update_query = "UPDATE categories SET name='$name',slug='$slug',
  description='$description',status='$Status',image='$update_filename'
  WHERE id = '$category_id' ";

  $update_query_run = mysqli_query($con,$update_query);

  if($update_query_run){
    if($_FILES['image']['name'] != ""){
      move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
      if(file_exists("../uploads/".$old_image)){
        unlink("../uploads/".$old_image);
      }
    }
    $_SESSION['message']="Updated";
    header("Location: edit-category.php?id=$category_id");
  }

  $_SESSION['message']="Something Went wrong";
  header("Location: edit-category.php?id=$category_id");
}

else if(isset($_POST['delete_cate'])){
  $category_id = mysqli_real_escape_string($con,$_POST['category_id']);

  $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
  $delete_query_run = mysqli_query($con, $delete_query);

  if($delete_query_run){
    $_SESSION['message']="Delted";
    header('Location: category.php');
  }
  else{
    $_SESSION['message']="Delted";
    header('Location: category.php');
  }
}

else if(isset($_POST['add_product_a'])){
  $category_id = $_POST['category_id'];
  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $small_description = $_POST['small_description'];
  $description = $_POST['description'];
  $orignal_price = $_POST['orignal_price'];
  $selling_price = $_POST['selling_price'];
  $qty = $_POST['qty'];
  $status = isset($_POST['status']) ? '1':'0';

  $image = $_FILES['image']['name'];

  $path="../uploads";

  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = time().'.'.$image_ext;

  $product_query = "INSERT INTO products (category_id,name,slug,small_description,description,orignal_price,selling_price,image,qty,status)
  VALUES ('$category_id','$name','$slug','$small_description','$description','$orignal_price','$selling_price','$filename','$qty','$status')";

  $product_query_run = mysqli_query($con, $product_query);

  if($product_query_run){
    move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
    $_SESSION['message'] = "Product Added";
    header('Location: add-product.php');
  }
  else{
    $_SESSION['message'] = "Something went wrong".die(mysqli_error($con));
    header('Location: add-product.php');
  }
}

else if(isset($_POST['update_product_a'])){
  $product_id = $_POST['product_id'];
  $category_id = $_POST['category_id'];
  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $small_description = $_POST['small_description'];
  $description = $_POST['description'];
  $orignal_price = $_POST['orignal_price'];
  $selling_price = $_POST['selling_price'];
  $qty = $_POST['qty'];
  $status = isset($_POST['status']) ? '1':'0';

  $image = $_FILES['image']['name'];

  $path="../uploads";

  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];

  if($new_image != ""){
    //$update_filename = $new_image;
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $update_filename = time().'.'.$image_ext;
  }
  else{
    $update_filename = $old_image;
  }
  $update_product_query = "UPDATE products SET category_id='$category_id',name='$name',slug='$slug',small_description='$small_description',description='$description'
  orignal_price='$orignal_price',selling_price='$selling_price',qty='$qty' status='$status',image='$update_filename' WHERE id='$product_id'";
  $update_product_query_run = mysqli_query($con,$update_product_query);

  if($update_product_query_run){
    if($_FILES['image']['name'] != ""){
      move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
      if(file_exists("../uploads/".$old_image)){
        unlink("../uploads/".$old_image);
      }
    }
    $_SESSION['message']="Updated";
    header("Location: edit-product.php?id=$product_id");
  }
  else{
    $_SESSION['message']="Something went wrong";
    header("Location: edit-product.php?id=$product_id");
  }
}

else {
    header("Location: ../index.php");
}

?>
