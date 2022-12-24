<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php')
 ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <form action="code.php" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="col-md-12">
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" value="">
            </div>
            <div class="col-md-12">
              <label for="">Slug</label>
              <input type="text" class="form-control" name="slug" value="">
            </div>
            <div class="col-md-12">
              <label for="">Description</label>
              <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="col-md-12">
              <label for="">Status</label>
                <input type="checkbox" name="status" value="">
            </div>
            <div class="col-md-12">
              <label for="">Image</label>
                <input type="file" class="form-control" name="image" value="">
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" name="add_product">Add</button>
            </div>
          </div>
          </div>
      </form>
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
