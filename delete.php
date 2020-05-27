<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="libr"; 
    $conn= new mysqli($servername, $username, $password, $dbname);

    $tytul=$_POST['tytul'];

    $sql="DELETE FROM krzyz WHERE id_tytul='$tytul'";
    $sql2="DELETE FROM tytuly WHERE id_tytul='$tytul'";

    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);

    $conn->close();

    header('Location: http://localhost/library/index.php');

?>