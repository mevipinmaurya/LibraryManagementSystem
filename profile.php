<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>User Profile - Library Management System</title>
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
                        <a class="nav-link active" aria-current="page" href="adminLogin.php">
                            <h5>Admin's Login</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="register.php">
                            <h5>Registraion</h5>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            My Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="profile.php">
                                    <h5><i style="color: #DA4A54;" class="fa fa-user" aria-hidden="true"></i>
                                        <?php
                                        session_start();
                                        echo $_SESSION['name'];
                                        ?></h5>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">
                                    <h5>Logout</h5>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="card" style="width: 28rem; margin: auto;">
            <div class="card-header">
                <h1 class="text-center"><i style="color: #DA4A54;" class="fa fa-user" aria-hidden="true"></i>
                    <?php
                    echo $_SESSION['name'];
                    ?>
                </h1>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h4><span style="color: #DA4A54;">Name :</span>
                        <?php
                        echo $_SESSION['name'];
                        ?></h4>
                </li>
                <li class="list-group-item">
                    <h4><span style="color: #DA4A54;">Email :</span>
                        <?php
                        echo $_SESSION['email'];
                        ?></h4>
                </li>
                <li class="list-group-item">
                    <h4><span style="color: #DA4A54;">Password :</span>
                        <?php
                        echo $_SESSION['passwd'];
                        ?></h4>
                </li>
                <li class="list-group-item">
                    <h4><span style="color: #DA4A54;">Phone :</span>
                        <?php
                        echo $_SESSION['phone'];
                        ?></h4>
                </li>
                <li class="list-group-item">
                    <h4><span style="color: #DA4A54;">Address :</span>
                        <?php
                        echo $_SESSION['address'];
                        ?></h4>
                </li>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


</html>