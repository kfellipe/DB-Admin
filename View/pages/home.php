<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/Controller/dbController.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAmdmin</title>
    <link rel="shortcut icon" href="/view/images/favicon.png" type="image/x-icon">
    <!-- Importando arquivos CSS -->
    <link rel="stylesheet" href="/View/css/index.css">
    <link rel="stylesheet" href="/View/css/table.css">
    <!-- Importando fontes de texto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<body>
<header>
<h1>Console MySql</h1>
<label class="theme" for="theme-check"><div class="theme-icon"><img src="/View/images/sun-icon.png" alt=""></div></label>
<input type="checkbox" name="theme-check" id="theme-check">
</header>
<main>
    <section class="main-header">
        <form name="form_select" action="index.php" method="POST">
            <select class="db-select" name="database" id="database">
                <option value="<?= $_SESSION['database'] ?>"><?= $_SESSION['database'] ?></option>
                <?php 
    
                        $query = $conn->query("SHOW DATABASES");
                        $result = $query->fetchAll();
                        foreach($result as $item){


                            if($item[0] != $_SESSION['database']){
                                echo "<option value='".$item[0]."'>".$item[0]."</option>";
                            }
                            
                        }
    
                ?>
            </select>
        </form>
    </section>
    <section class="main-content">
        <form name="formulario" action="index.php" method="POST">
            <textarea class="terminal" name="" id="input-text"><?php
    if(isset($_POST['query'])){
        echo $_POST['query'];
    } elseif(isset($_SESSION['last-command'])) {
        echo $_SESSION['last-command'];
    } else {
        echo "Nenhum comando inserido";
    }
?></textarea>
            <input type="hidden" name="query" id="query" class="query">
        </form>
        
        <div class="terminal">
            <table>
                <?php 
                    include_once $_SERVER['DOCUMENT_ROOT']."/Controller/queryController.php";
                ?>
            </table>
        </div>
        <form class="btns" action="index.php" method="POST">
            <?php
                $query = $conn->query("SHOW TABLES");
                $result = $query->fetchAll();
                foreach($result as $table){
                    echo "<button type='submit' class='btn' name='query' value='SELECT * FROM ".$table[0]."'>".$table[0]."</button>";
                }
            ?>
        </form>
    </section>
</main>
<footer>
    <span class="footer-title">Informações do autor</span>
    <div class="footer-content">
        <nav>
            Este site foi feito com o intuito de facilitar a administração de <ins>Banco de Dados</ins> no <ins>MySql</ins>. Todos os direitos reservados á <ins>KFellipe<sup>TM</sup></ins>.
        </nav>
        <nav>
            Email: kauazeta87@gmail.com<br>
            Github: <a href="https://github.com/kfellipe">KFellipe</a>
        </nav>
    </div>
</footer>
<aside>
    <?php

    $query = $conn->query("SHOW TABLES");
    $result = $query->fetchAll();
    foreach($result as $table){
        echo "<div class='table'> <div>";
        echo "<span class='column'>".$table[0]."</span>"; 
        $query = $conn->query("SHOW COLUMNS FROM ".$table[0]);
        $result = $query->fetchAll();
        foreach($result as $col){
            echo "<span title='".$col['Type']."'>".$col['Field']."</span>";
        }
        echo "</div></div>";
    }
    ?>
</aside>
    
<script src="/View/js/tables.js"></script>
<script src="/View/js/theme.js"></script>
<script src="/View/js/query.js"></script>
<script src="/View/js/select.js"></script>
</body>
</html>