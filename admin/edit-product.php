<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php')
 ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
        if(isset($_GET['id']))
          {
              $id = $_GET['id'];
              $product = getByID("products",$id);
              if(mysqli_num_rows($product)>0){
                $data = mysqli_fetch_array($product);
                ?>
                <div class="card">
          <div class="card-header">
              <h4>Update Product</h4>
          </div>

            <div class="card-body">
              <form action="code.php" method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
                <label>Select Category</label>
                <select name="category_id" class="form-select mb-2">
                  <option selected>Select Category</option>
                      <?php
                          $categories = getAll('categories');

                          if(mysqli_num_rows($categories) > 0){
                            foreach ($categories as $item) {
                              ?>
                                <option value="<?= $item['id'];?>"<?= $data['category_id'] == $item['id']?'selected':''?>><?= $item['name']; ?></option>
                              <?php
                            }
                          }
                          else {
                            echo "Please Add Categories";
                          }
                       ?>

                  </select>
              </div>
              <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
              <div class="col-md-12">
                <label for="">Product Name</label>
                <input type="text" value="<?= $data['name']; ?>" class="form-control" name="name" >
              </div>
              <div class="col-md-12">
                <label for="">Slug</label>
                <input type="text" value="<?= $data['slug']; ?>" class="form-control" name="slug" >
              </div>
              <div class="col-md-12">
                <label for="">Small description</label>
                <textarea class="form-control" name="small_description" rows="3"><?= $data['small_description']; ?></textarea>
              </div>
              <div class="col-md-12">
                <label for="">Description</label>
                <textarea class="form-control" name="description" rows="3"><?= $data['description']; ?></textarea>
              </div>
              <div class="col-md-12">
                <label for="">Original Price</label>
                <input type="number" value="<?= $data['orignal_price']; ?>" class="form-control" name="orignal_price" >
              </div>
              <div class="col-md-12">
                <label for="">Selling Price</label>
                <input type="number" value="<?= $data['selling_price']; ?>" class="form-control" name="selling_price" >
              </div>
              <div class="col-md-12">
                <label for="">Status</label>
                  <input type="checkbox" name="status" value="">
              </div>
              <div class="col-md-12">
                <label for="">Quantity</label>
                <input type="number" value="<?= $data['qty']; ?>" class="form-control" name="qty" value="">
              </div>
              <div class="col-md-12">
                <label for="">Image</label>
                <input type="hidden" name="old_image" value=" <?= $data[' image']; ?>">
                <input type="file" class="form-control" name="image" value="">
                <input type="hidden" name="old_name" value="<?= $data['image'];?>">
                <img src="../uploads/<?= $data['image'];?>" height="75" width="75" alt="">
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" name="update_product_a">Update</button>
              </div>
              </form>
            </div>
            </div>
        <?php
              }
              else{
                "Product not found";
              }
            }
              else
                {
                  echo "Id missing from url";
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
.col-md-12{
  margin: 15px 0;
}
  .form-control{
    border: 1px solid #b3a1a1 !important;
    padding: 8px 10px;
  }
  .form-select{
    border: 1px solid #b3a1a1 !important;
    padding: 8px 10px;
  }
  .btn{
    margin: 10px 0px;
  }
</style>

  <?php include('includes/footer.php'); ?>
