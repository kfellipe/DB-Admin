<?php

if(isset($_POST['query'])){
    $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
    try {
        $query = $_POST['query'];
        if(explode(" ", $query)[0] == "INSERT"){
            $query = $conn->prepare($_POST['query']);
            if($query->execute()){
                echo "Valor inserido com sucesso";
                $_POST['query'] = "";
            }
        }
        $query = $conn->prepare($_POST['query']);
        $query->execute();

        $colnum = $query->columnCount();
        $rownum = $query->rowCount();
        
        if($rownum > 1){
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
                foreach($fetch as $item){
                    echo "<tr><td>".$item[0]."</td></tr>";
                }
            }
            
        }

        $_POST['query'] = "";
    } catch (PDOException $e){
        var_dump($e->getMessage());
        $_POST['query'] = "";
    }
}