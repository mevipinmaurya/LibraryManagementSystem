<?php
$update = false;
$insert = false;
$delete = false;
if (isset($_POST['snoEdit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "library";

    $sno = $_POST['snoEdit'];
    $name = $_POST['nameEdit'];
    $email = $_POST['emailEdit'];

    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "UPDATE `admin` SET `Name`='$name', `Email`='$email' WHERE `sno`='$sno'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $update = true;
        // header("Location:admin_list.php");
    }
}


if(isset($_POST['addAdmin'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "library";

    $adminName = $_POST['newName'];
    $adminEmail = $_POST['newEmail'];
    $adminPass = $_POST['newPass'];

    $con = mysqli_connect($servername, $username, $password, $database);
    $sql = "INSERT INTO `admin` (`Name`, `Email`, `Password`) VALUES ('$adminName', '$adminEmail', '$adminPass')";
    $result = mysqli_query($con, $sql);
    if($result){
        $insert = true;
    }
}


if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "library";

    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "DELETE FROM `admin` WHERE `sno`= $sno";
    $result = mysqli_query($conn, $sql);
    if($result){
        $delete = true;
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

    <title>Library Management System</title>
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
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>successful!</strong> Admin detail has been updated successfully !!!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>successful!</strong> New Admin has been Added successfully !!!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>successful!</strong> Admin has been deleted successfully !!!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
    ?>


    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel" style="color: #DA4A54;">Admin Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="row g-3">
                        <input hidden name="snoEdit" id="snoEdit">
                        <div class="col-12">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" name="nameEdit" id="nameEdit" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" name="emailEdit" id="emailEdit" class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="login" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminModalLabel" style="color: #DA4A54;">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="row g-3">
                        <div class="col-12">
                            <label for="adminName" class="form-label">Name</label>
                            <input type="text" name="newName" id="newName" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="adminEmail" class="form-label">Email</label>
                            <input type="email" name="newEmail" id="newEmail" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="adminPass" class="form-label">Password</label>
                            <input type="password" name="newPass" id="newPass" class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addAdmin" class="btn btn-primary">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="myContainer my-4">
        <h2 class="text-center mb-3">Admin Details</h2>
        <table class="table table-success table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
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
                $sql = "SELECT * FROM `admin`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno += 1;
                    echo "<tr>
                            <th scope='row'>" . $sno. "</th>
                            <td>" . $row['Name'] . "</td>
                            <td>" . $row['Email'] . "</td>
                            <td><button type='button'  data-bs-toggle='modal' data-bs-target='#editModal' class='btn edit btn-primary btn-sm mx-2' id=" . $row['sno'] . ">Edit</button><button type='button' id=d" . $row['sno'] . " class='btn delete btn-danger btn-sm'>Remove</button></td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="button" data-bs-toggle='modal' data-bs-target='#adminModal' class="btn btn-primary">Add New Admin</button>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach(element => {
            element.addEventListener("click", (e) => {
                console.log("edit ", );
                tr = e.target.parentNode.parentNode;
                // console.log(tr);
                name = tr.getElementsByTagName('td')[0].innerText;
                email = tr.getElementsByTagName('td')[1].innerText;
                console.log(name, email);
                nameEdit.value = name;
                emailEdit.value = email;
                snoEdit.value = e.target.id;
            })
        });

        del = document.getElementsByClassName('delete');
        Array.from(del).forEach(element => {
            element.addEventListener('click', (e)=>{
                console.log('delete', );
                tr = e.target.parentNode.parentNode;
                // console.log(tr);
                name = tr.getElementsByTagName('td')[0].innerText;
                email = tr.getElementsByTagName('td')[1].innerText;
                sno = e.target.id.substr(1, );

                if(confirm("press any key ")){
                    // console.log("yes");
                    window.location = `admin_list.php?delete=${sno}`;
                }
                else{
                    console.log('no');
                }
            })
        });
    </script>

</body>


</html>