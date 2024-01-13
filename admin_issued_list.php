<?php
$issued = false;
$invalid = false;

if (isset($_POST['issueBook'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "library";

    $b_id = $_POST['bId'];
    $b_name = $_POST['bName'];
    $b_author = $_POST['bAuthor'];
    $b_price = $_POST['bPrice'];
    $u_name = $_POST['uName'];
    $u_email = $_POST['uEmail'];

    $con = mysqli_connect($servername, $username, $password, $database);
    $sql1 = "SELECT * FROM `users`";
    $res1 = mysqli_query($con, $sql1);

    $sql = "SELECT * FROM `books`";
    $result = mysqli_query($con, $sql);
    while ($row1 = mysqli_fetch_assoc($res1)) {
        if ($row1['Email'] == $u_email) {
            if ($row1['Name'] == $u_name) {

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['book_id'] == $b_id) {
                        if ($row['book_name'] == $b_name) {
                            if ($row['book_author'] == $b_author) {
                                if ($row['book_price'] == $b_price) {
                                    $sql2 = "INSERT INTO `issued` (`Book_Id`, `Book_Name`, `Book_Author`, `Book_Price`, `User_Name`, `User_Email`) VALUES ('$b_id', '$b_name', '$b_author', '$b_price', '$u_name', '$u_email')";

                                    if ($result) {
                                        $issued = true;
                                        if ($issued) {
                                            $sql3 = "DELETE FROM `books` WHERE `book_id`= $b_id";
                                        }
                                        else{
                                            echo "An error occured";
                                        }
                                    } else {
                                        $invalid = true;
                                    }
                                } else {
                                    $invalid = true;
                                }
                            } else {
                                $invalid = true;
                            }
                        } else {
                            $invalid = true;
                        }
                    } else {
                        $invalid = true;
                    }
                }
            } else {
                // echo "Invalid Name";
                $invalid = true;
            }
        } else {
            // echo "Invalid Email !!!";
            $invalid = true;
        }
    }

    // $sql = "INSERT INTO `issued` (`Book_Id`, `Book_Name`, `Book_Author`, `Book_Price`, `User_Name`) VALUES ('$b_id', '$b_name','$b_author', '$b_price', '$u_name')";
    // $result = mysqli_query($con, $sql);
    // if($result){
    //     $issued = true;
    // }
}


// if(isset($_GET['delete'])){
//     $sno = $_GET['delete'];
//     $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $database = "library";

//     $conn = mysqli_connect($servername, $username, $password, $database);
//     $sql = "DELETE FROM `books` WHERE `Book_Id`= $sno";
//     $result = mysqli_query($conn, $sql);
//     if($result){
//         $delete = true;
//     }
// }
?>

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

    <title>book list - Library Management System</title>
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


    <?php
    if ($issued) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>successful!</strong> Book has been issued successfully !!!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
    if ($invalid) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Invalid!</strong> Check each details you have filled and try again !!!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
    ?>


    <div class="modal fade" id="issueModal" tabindex="-1" aria-labelledby="issueModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="issueModalLabel" style="color: #DA4A54;">Issue a Book to the User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="row g-3">
                        <div class="col-12">
                            <label for="bId" class="form-label">Book_Id</label>
                            <input type="text" name="bId" id="bId" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="bName" class="form-label">Book_Name</label>
                            <input type="text" name="bName" id="bName" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="bAuthor" class="form-label">Book_Author</label>
                            <input type="text" name="bAuthor" id="bAuthor" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="bPrice" class="form-label">Book_Price</label>
                            <input type="text" name="bPrice" id="bPrice" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="uName" class="form-label">User_Name</label>
                            <input type="text" name="uName" id="uName" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="uEmail" class="form-label">User_Email</label>
                            <input type="text" name="uEmail" id="uEmail" class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="issueBook" class="btn btn-primary">Issue Book</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container my-4">
        <h2 class="text-center mb-3">Issued Book Details</h2>
        <table class="table table-striped table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Book_Id</th>
                    <th scope="col">Book_Name</th>
                    <th scope="col">User_Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "library";
                $sno = 0;
                $conn = mysqli_connect($servername, $username, $password, $database);
                $sql = "SELECT * FROM `issued`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno += 1;
                    echo "<tr>
                            <th scope='row'>" . $sno . ".</th>
                            <td>" . $row['Book_Id'] . "</td>
                            <td>" . $row['Book_Name'] . "</td>
                            <td>" . $row['User_Name'] . "</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="button" data-bs-toggle='modal' data-bs-target='#issueModal' class="btn btn-primary">Issue Book</button>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


</html>