<?php
require $_SERVER['DOCUMENT_ROOT']."/Model/query.php";


if(isset($_POST['database'])){
    $_SESSION['database'] = $_POST['database'];
} elseif($_SESSION['database'] == ""){
    $_SESSION['database'] = "testes";
}

$conn =  new query($_SESSION['database']);