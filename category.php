<?php
session_start();
include("includes/header.php");
include("functions/userfunction.php");
?>

<?php
  if(isset($_SESSION['message']))
  {
    ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong><?= $_SESSION['message'];  ?></strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
    unset($_SESSION['message']);
    }
 ?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>Categories of the Product</h1>
      <div class="row">


      <?php
          $categories = getAllActive("categories");
              if(mysqli_num_rows($categories) > 0)
              {
                foreach($categories as $item)
                {
                  ?>
                  <div class="col-md-4">
                    <div class="card shadow">
                      <div class="card-body">
                        <img src="uploads/<?= $item['image'];?>" alt="Category Image" class="w-100">
                        <h4> <?= $item['name']; ?></h4>
                      </div>

                    </div>

                  </div>

                  <?php
                }
              }
              else
              {
              echo "No data available";
              }
          ?>
          </div>
    </div>
  </div>

</div>

<style>
body{
  background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
min-height: 100vh;
}
</style>

<?php include("includes/footer.php") ?>
