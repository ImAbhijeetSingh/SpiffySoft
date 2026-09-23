<?php

require_once 'connect.php';

// Very useful for finding errors!

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = OpenCon();

$email = $_POST['email'];

if ($email != null) {
    $q1 = "SELECT * FROM subscribers WHERE email = '$email'";
    $result = mysqli_query($conn, $q1);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
    echo "<script>
                alert('Already Subscribed!');
                window.location.replace('index.html');
            </script>";
    }else {
        $q2 = "INSERT INTO `subscribers` (`id`, `email`, `status`) VALUES (NULL, '$email', '1')";

        $query_run = mysqli_query($conn, $q2);

        echo "<script>
                alert('Subscribed successfully!');
                window.location.replace('index.html');
            </script>";
    }
} else {
    echo "<script>
                alert('Sorry! something went wrong.');
                window.location.replace('index.html');
            </script>";
}



        $conn = CloseCon();
?>