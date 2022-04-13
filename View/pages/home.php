<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Importando arquivos CSS -->
    <link rel="stylesheet" href="/View/css/index.css">
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
        <select class="db-select" name="" id="">
            <option value="">Banco de dados</option>
            <option value="">Banco 1</option>
            <option value="">Banco 2</option>
            <option value="">Banco 3</option>
        </select>
    </section>
    <section class="main-content">
        <form action="index.php" method="POST">
            <input type="text" name="query" id="" class="query">
            <input type="submit" value="SELECT * FROM users" name="query" class="btn">
        </form>
        
        <div class="terminal">
            <table>
            <?php 
                include_once $_SERVER['DOCUMENT_ROOT']."/Controller/queryController.php";
            ?>
        </table>
        </div>
        
        <section class="main-aside">
            <select name="" id="">
                <option value="">Tabelas</option>
                <option value="">Tabela 1</option>
                <option value="">Tabela 2</option>
                <option value="">Tabela 3</option>
                <option value="">Tabela 4</option>
                <option value="">Tabela 5</option>
            </select>
            <div class="table-columns">
                <span>Coluna 1</span>
                <span>Coluna 2</span>
                <span>Coluna 3</span>
                <span>Coluna 4</span>
                <span>Coluna 5</span>
                <span>Coluna 6</span>
                <span>Coluna 7</span>
                <span>Coluna 8</span>
            </div>
        </section>
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
<script src="js/theme.js"></script>
</body>
</html>