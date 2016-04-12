<?php
error_reporting(0);
if(!isset($_SESSION)){
    session_start();
}
//setlocale(LC_ALL, 'IND');
$host 		= "localhost";
$username 	= "root";
$password 	= "";
$database 	= "project_absensi";
$connect 	= mysql_connect($host, $username, $password) or die ("Koneksi error");
mysql_select_db($database, $connect) or die ("Database Error ...");


