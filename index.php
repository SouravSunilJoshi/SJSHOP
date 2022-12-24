<?php
session_start();
include("includes/header.php") ?>
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
      <h1>Welcome to Shop</h1>
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
