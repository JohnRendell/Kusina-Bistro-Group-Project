<?php
//database configuration
$host = 'localhost';
$port = 3306;
$dbname = 'kusina';
//$username = 'root';
//$password = '@k0l@ng@dm1n';

$username = 'admin';
$password = 'admin';

//connection string
$dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8";

try{
    //pdo instance
    $pdo = new PDO($dsn, $username, $password);

    //set pdo to throw exception err
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "DATABASE CONNECTED";

}
catch(PDOException $pdexc){
    echo $pdexc->getMessage();
}