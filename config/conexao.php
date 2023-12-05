<?php 

require_once("config.php");

date_default_timezone_set('America/Sao_Paulo');

try{
    $pdo = new PDO("mysql:dbname=$banco; host=$servidor;charset=utf8", "$usuario", "$senha");

}catch(Exception $e){

    echo '<b>Não foi possivel conectar com o banco de dados</b><br>'.$e;
}

?>