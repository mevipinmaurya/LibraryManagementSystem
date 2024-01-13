<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                        <a class="nav-link active" aria-current="page" href="#">
                            <h5><b><i class="fa fa-user-circle-o" style="color: #DA4A54;" aria-hidden="true"></i>&nbsp; </b>
                                <?php
                                session_start();
                                echo $_SESSION['name'] . "(Admin)";
                                ?>
                            </h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <h5><b>
                            <i class="fa fa-envelope" style="color: #DA4A54;" aria-hidden="true"></i>&nbsp; </b><?php
                                                echo $_SESSION['email'];
                                                ?>
                            </h5>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">
                            <h5><i class="fa fa-sign-out" style="color: #DA4A54;" aria-hidden="true"></i> Logout</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container my-5">
        <div class="row">
            <div class="col mb-5">
                <div class="card admin-container text-center" style="width: 18rem; background-color:#e5e0cd ;">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #DA4A54;">All Admins</h4>
                        <hr>
                        <p class="card-text">No. of Admins :
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "library";
                            $conn = mysqli_connect($servername, $username, $password, $database);
                            $sql = "SELECT * FROM `admin`";
                            $result = mysqli_query($conn, $sql);
                            $admins = mysqli_num_rows($result);
                            echo $admins;
                            ?>
                        </p>
                        <a href="admin_list.php" class="btn btn-success">View Admins</a>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card admin-container text-center" style="width: 18rem; background-color:#e5e0cd ;">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #DA4A54;">Total Registered Users</h4>
                        <hr>
                        <p class="card-text">No. of Users :
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "library";
                            $conn = mysqli_connect($servername, $username, $password, $database);
                            $sql = "SELECT * FROM `users`";
                            $result = mysqli_query($conn, $sql);
                            $users = mysqli_num_rows($result);
                            echo $users;
                            ?>
                        </p>
                        <a href="users_list.php" class="btn btn-success">View Users</a>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card admin-container text-center" style="width: 18rem; background-color:#e5e0cd ;">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #DA4A54;">Total Books</h4>
                        <hr>
                        <p class="card-text">Books available in library :
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "library";
                            $conn = mysqli_connect($servername, $username, $password, $database);
                            $sql = "SELECT * FROM `books`";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            echo $num;
                            ?>
                        </p>
                        <a href="book_list.php" class="btn btn-success">View Books</a>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card admin-container text-center" style="width: 18rem; background-color:#e5e0cd ;">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #DA4A54;">Issued Books</h4>
                        <hr>
                        <p class="card-text">Book issued by users :
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "library";
                            $conn = mysqli_connect($servername, $username, $password, $database);
                            $sql = "SELECT * FROM `issued`";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            echo $num;
                            ?>
                        </p>
                        <a href="admin_issued_list.php" class="btn btn-success">View issued books</a>
                    </div>
                </div>
            </div>


        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


</html>