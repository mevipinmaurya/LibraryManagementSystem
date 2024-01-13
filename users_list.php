<?php
$remove = false;
if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "library";

    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "DELETE FROM `users` WHERE `sno`= $sno";
    $result = mysqli_query($conn, $sql);
    if($result){
        $remove = true;
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

    <title>Users list - Library Management System</title>
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
                            <h5><b><i class="fa fa-user-circle-o" style="color: #DA4A54;" aria-hidden="true"></i>&nbsp; </b>
                                <?php
                                session_start();
                                echo $_SESSION['name'] . "(Admin)";
                                ?>
                            </h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin_login.php">
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
    if ($remove) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>successful!</strong> User has been removed successfully !!!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
    ?>


    <div class="container my-4">
        <h2 class="text-center mb-3">User's Details</h2>
        <table class="table table-striped table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
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
                $sql = "SELECT * FROM `users`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno += 1;
                    echo "<tr>
                            <th scope='row'>" . $sno. "</th>
                            <td>" . $row['Name'] . "</td>
                            <td>" . $row['Email'] . "</td>
                            <td>" . $row['Phone'] . "</td>
                            <td>" . $row['Address'] . "</td>
                            <td><button type='button' id=d" . $row['sno'] . " class='btn delete btn-danger btn-sm'>Remove</button></td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>

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
                    window.location = `users_list.php?delete=${sno}`;
                }
            })
        });
    </script>

</body>


</html>