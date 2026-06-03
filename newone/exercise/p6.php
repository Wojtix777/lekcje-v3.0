<?php
$conn = mysqli_connect("localhost", "root", "", "php_practice");
$uid = $_POST['user_id'];
$title = $_POST['title'];
$subject = $_POST['subject'];
$description = $_POST['description'];
$due_date = $_POST['due_date'];
$status = $_POST['status'];
if ($uid != 'null')
    {   
    $sql = "INSERT INTO exercises (user_id, title, description, subject, due_date, status) VALUES ($uid, '$title', '$description', '$subject', '$due_date', '$status')";
    mysqli_query($conn, $sql);
    header("Location: ../index.php#p6");}
else{
    echo "You... you... just go back.";
};