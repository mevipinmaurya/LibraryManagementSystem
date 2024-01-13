<?php
session_start();
$wrongLogin = false;
if (isset($_POST['login'])) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "library";


  $conn = mysqli_connect($servername, $username, $password, $database);
  $sql = "SELECT * FROM `admin`";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['Email'] == $_POST['email']) {
      if ($row['Password'] == $_POST['passwd']) {
        // echo "login successfull";
        $_SESSION['name'] = $row['Name'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['passwd'] = $row['Password'];

        header("Location:admin_dashboard.php");
      } else {
        // echo "Wrong password";
        $wrongLogin = true;
      }
    } else {
      // echo "wrong email";
      $wrongLogin = true;
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">

  <title>Admin login - Library Management System</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <h2><img src="images/book.png" alt="library"> Library</h2>
      </a>
      <div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="admin_login.php">
              <h5>Admin's Login</h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="register.php">
              <h5>Register</h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">
              <h5>Login</h5>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  if ($wrongLogin) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Incorrect!</strong> Either the Password or the Email ID is incorrect !!!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  ?>


  <div class="container my-4">
    <marquee behavior="scroll" scrollamount="10" direction="left">
      <h3>Welcome to Library Management System</h3>
    </marquee>
  </div>

  <div class="myContainer my-4">
    <h2 class="text-center mb-3">Admin Login</h2>
    <form action="" method="POST" class="row g-3">
      <div class="col-12">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail4" required>
      </div>
      <div class="col-12">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" name="passwd" class="form-control" id="inputPassword4" required>
      </div>
      <div class="col-12">
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


</html>