<?php
session_start();
unset($_SESSION['user']);
header('location:./?status="success"&message="Hasta la vista baby!"');

require_once 'DBConnect.php';
?>