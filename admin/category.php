<?php
  include('includes/header.php');
  include('../functions/myfunctions.php');
 ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-head">
          <h3>Category</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Edit/Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $category = getAll('categories');

                  if(mysqli_num_rows($category)>0){
                      foreach ($category as $item) {
                      ?>

                <tr>
                  <td><?= $item['id'];?></td>
                  <td><?= $item['name'];?></td>
                  <td>
                    <img src="../uploads/<?= $item['image']; ?>" width="100" height="100" alt="Something went wrong">
                  </td>
                  <td><?= $item['status'] == '0'?"Visible":"Hidden" ?></td>
                  <td>
                    <a href="edit-category.php?id=<?= $item['id'];?>" class="btn btn-primary">Edit</a>
                    <form action="code.php" method="POST">
                      <input type="hidden" name="category_id" value="<?= $item['id'];?>">
                        <button type="submit" class="btn btn-danger" name="delete_cate">Delete</button>
                    </form>
                  </td>
                </tr>
              <?php }
            }
            else{
              echo "No records";
            }
            ?>
              </tbody>
            </table>
        </div>
      </div>
      <div>
    </div>
</div>

<style>
body{
  background-color: #0093E9;
  background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
}
h3{
  padding: 2%;
}
</style>

  <?php include('includes/footer.php'); ?>
