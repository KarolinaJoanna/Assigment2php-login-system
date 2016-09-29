<?php

$server='localhost';
$username='root';
$password='root';
$database='an1';

try{
    $conn=new PDO("mysql:host=$server;dbname=$database;",$username,$password);
}catch(PDOExeption $e){
    die( "Connection failed:" ) . $e->getMessage()); // PDO connection instead mysql -new standart most secured way to make database transactions in php
}
?>
