<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">

  <a class="navbar-brand" href="index.php">SJ Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item active">
        <a class="nav-link" href="category.php">Collection</a>
      </li>

      <?php
        if(isset($_SESSION['auth'])){
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION['auth_user']['name']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>

      <?php } else{
        ?>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <?php
      }?>
    </ul>
    </div>
  </div>
</nav>

<style media="screen">
  .navbar-brand{
    font-size: 2rem;
    font-weight: bold;
  }
  .navbar{
    padding: 2% 5%;
  }
</style>
