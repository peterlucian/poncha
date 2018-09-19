<?php
//Numero de items por página, nas páginas de pesquisa
define("NUM_PAGE",10);

//Start connection
$host ='127.0.0.1';
$db = 'ponchaadvisor';
$user ='root';
$pass ='';
$charset ='utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = array(
  //Em caso de erro ocorre excepcao
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,   
  //Define o comportamento por defeito do fetch
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  //Ativa/desativa emular prepared statements     
	PDO::ATTR_EMULATE_PREPARES   => false,                
	);
try{
	$pdo = new PDO($dsn, $user, $pass, $opt);   
} catch(PDOException $ex){
	die("Error: connection to PDO : Details -> ".$ex->getMessage());
}

?>