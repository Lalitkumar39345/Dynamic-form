<?php

const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DBNAME = 'demo';

try{
    $conn = mysqli_connect(HOST,USER,PASSWORD,DBNAME);
}catch(Exception $e){
    echo "Failed to connect to DB ". $e->getMessage();
}
//var_dump($connection);






?>