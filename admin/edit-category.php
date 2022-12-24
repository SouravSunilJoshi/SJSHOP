<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php')
 ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $category = getByID("categories" , $id);

          if(mysqli_num_rows($category) > 0 ){
            $data = mysqli_fetch_array($category);
       ?>
      <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <form action="code.php" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="col-md-12">
              <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
              <label for="">Name</label>
              <input type="text" value="<?= $data['name'] ?>" class="form-control" name="name" value="">
            </div>
            <div class="col-md-12">
              <label for="">Slug</label>
              <input type="text" value="<?= $data['slug'] ?>" class="form-control" name="slug" value="">
            </div>
            <div class="col-md-12">
              <label for="">Description</label>
              <textarea class="form-control" name="description" rows="3"><?= $data['description'];?></textarea>
            </div>
            <div class="col-md-12">
              <label for="">Status</label>
                <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status" value="">
            </div>
            <div class="col-md-12">
              <label for="">Image</label>
                <input type="file" class="form-control" name="image" value="">
                <input type="hidden" name="old_name" value="<?= $data['image'];?>">
                <img src="../uploads/<?= $data['image'];?>" height="75" width="75" alt="">
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" name="update_product">Update</button>
            </div>
            </div>
          </div>
      </form>
      <?php
          }
          else{
            echo "Category not found";
          }
        }
        else{
          echo "id is missing from url";
        }
       ?>
  </div>
</div>
</div>
<style>
body{
  background-color: #0093E9;
  background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
}
  .form-control{
    border: 1px solid #b3a1a1 !important;
    padding: 8px 10px;
  }
  .btn{
    margin: 10px 0px;
  }
</style>

  <?php include('includes/footer.php'); ?>
