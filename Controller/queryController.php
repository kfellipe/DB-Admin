<?php

if(isset($_POST['query'])){
    try {
        $_SESSION['last-command'] = $_POST['query'];
        $query = $_POST['query'];
        if(explode(" ", $query)[0] == "INSERT"){
            if($query = $conn->query($_POST['query'])){
                $tabela = explode(" ", $_POST['query']);
                $tabela = explode("(", $tabela[2]);
                $_POST['query'] = "SELECT * FROM ".$tabela[0];
            }
        }
        if(explode(" ", $query)[0] == "DELETE"){
            $tabela = explode(" ", $_POST['query']);
            $_POST['query'] = "SELECT * FROM ".$tabela[2];
        }
        $query = $conn->query($_POST['query']);

        $colnum = $query->columnCount();
        $rownum = $query->rowCount();
        
        if($rownum >= 1){
            $fetch = $query->fetchAll();
            if($colnum > 1){
                echo "<tr>";
                for($count = 0; $count < $colnum; $count++){
                    echo "<th>".key($fetch[0])."</th>";
                    next($fetch[0]);
                    next($fetch[0]);
                }
                echo "</tr>";
                foreach($fetch as $item){
                    echo "<tr>";
                    for($count = 0;$count < $colnum;++$count){
                        echo "<td>".$item[$count]."</td>";
                    }
                    echo "</tr>";
                }
            } else {
                echo "<tr><th>".key($fetch[0])."</th></tr>";
                foreach($fetch as $item){
                    echo "<tr><td>".$item[0]."</td></tr>";
                }
            }
            
        } else {
            echo "<h1>Nenhuma linha foi retornada</h1>";
        }
    } catch (PDOException $e){
        $code = $e->getCode();
        function pop($exception){
            echo "<div class='pop'>".$exception."</div>";
        }
        if($code == "42000"){
            pop("Erro de Sintaxe");
        } elseif($code == "42S02"){
            pop("Tabela não encontrada");
        } elseif($code == "42S22"){
            pop("Coluna não encontrada");
        } else {
            echo "Codigo: ".$e->getCode()." | Mensagem: ".$e->getMessage();
        }
    }
}