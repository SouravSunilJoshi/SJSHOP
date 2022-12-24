<?php
session_start();

if(isset($_SESSION['auth'])){
  header("Location: index.php");
  exit();
}

include("includes/header.php")

?>
    <div class="container reg">
      <div class="row">
        <div class="col-md-12">
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
          <h2>Login Form</h2>
          <img  class="logoimg" src="assets/images/mainlogo.png" alt="">
          <form action="functions/authcode.php" method="POST">
              <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter Email id" required>
              </div>
              <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required>
              </div>
              <button type="submit" class="btn" name="login_btn">Login</button>
          </form>
        </div>
      </div>
    </div>
<?php include("includes/footer.php") ?>


<style>
  .logoimg{
    margin:15px 0;
    height: 125px;
    width:125px;
    border-radius: 50%;
  }
  .reg{
    padding: 2% 22.5%;
    text-align: center;
  }
  .form-group{
    text-align: left;
    margin: 20px 0;
    font-weight: bold;
  }
  body{
    background-color: #0093E9;
  background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
  min-height: 100vh;
  }
  .btn{
    height: 50px;
    width: 100px;
    background-color: #6F38C5;
    color: white;
    font-weight: bold;
    }

</style>
