<?php session_start();
session_destroy();
header("Location: /Student-Attendance-System/homepage.php");
?>