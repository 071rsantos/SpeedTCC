<?php

$dbhost = 'Localhost';
$dbUsername = 'root';
$dbpassword = '';
$dbname = 'speed';

$conn = new mysqli($dbhost, $dbUsername, $dbpassword, $dbname);

/*if($conn -> connect_errno){
    echo "Erro";
}
else{
    echo "Conexão feita com sucesso.";
}*/

?>