<?php
$db_host = "127.0.0.1";
$db_username = "root";
$db_pass = "password";
$db_name = "test_email_dtb";

$conn = new mysqli("$db_host", "$db_username", "$db_pass", "$db_name");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>