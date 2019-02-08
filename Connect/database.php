<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 2/8/19
 * Time: 11:00 AM
 */

$host = 'localhost';
$name = 'root';
$pass = '';
$db = 'testphp';

$conn = mysqli_connect($host,$name,$pass,$db);

if (mysqli_connect_errno()){
    echo "could not connect " . mysqli_connect_errno();
}
