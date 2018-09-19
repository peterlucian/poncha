<?php
require_once("connection.php");

$sql="SELECT nome, avaliacao, classificacao FROM comentarios ORDER BY id DESC LIMIT 2";
$query = $pdo->prepare($sql);
$query->execute();

echo "<h3>Últimas Avaliações</h3>";
while($row = $query->fetch()) {
    echo "<p> <strong> " . $row['nome'] . " </strong></p>";
    echo "<p>  " . $row['avaliacao'] . " </p>";
    for($i=0; $i < $row['classificacao']; $i++){
            echo '<i style="color: gold;" class="fas fa-star"></i>';        
    }
    for($j=0; $j <(5-$row['classificacao']); $j++){
            echo '<i class="fas fa-star"></i>';   
    }
}
?>




