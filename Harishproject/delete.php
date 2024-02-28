<?php
include("connect.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM books WHERE id=$id";
    if($row = mysqli_query($conn , $sql)){
        session_start();
        $_SESSION['delete'] = "Record Deleted Successfully";
        header("Location:index.php");
    }
    else{
        header("Location:index.php");
        die("Something Went Wrong");
    }

}
?>