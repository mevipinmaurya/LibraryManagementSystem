<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "library";

$conn = mysqli_connect($servername, $username, $password, $database);

$name = $_POST['name'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$phone = $_POST['phone'];
$addr = $_POST['addr'];
if($conn){
   $sql = "INSERT INTO `users` (`Name`, `Email`, `Password`, `Phone`, `Address`) VALUES ('$name', '$email', '$passwd', '$phone', '$addr')";
   $result = mysqli_query($conn, $sql);
}
else{
    // die("Failed to connect because ".mysqli_connect_error());
    echo "Some error occured!!!";
}

?>

<script type="text/javascript">
    window.location.href = "index.php";
    alert("Registraion has been successful !!! ");
</script>
