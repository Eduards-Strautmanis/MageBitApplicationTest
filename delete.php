<?php

include_once "dbh.php"; // Using database connection file here

$sql = "DELETE FROM test_email_dtb.emails WHERE user_id = " . $_GET["id"] . ";"; 

$del = mysqli_query($conn, $sql);

if($conn->query($sql) === TRUE) {
    mysqli_close($conn); // Close connection
    header("location:database.php"); // redirects to all records page
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>