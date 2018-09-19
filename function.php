<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Functions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<?php
function ellipsisText($string, $maxWords){
    $array = explode(" ", $string);
    if($maxWords!=0){
        for ($i=0; $i < $maxWords; $i++) { 
        array_pop($array);
        }
        array_push($array,"...");
        $array=implode(" ", $array);
    }
    echo  $array;
}

ellipsisText("Ola mundo interior", 1);

echo "<br>";

$info= array(
    "Nome do bar" => "Poncha da Madeira",
    "Morada" => "Ribeira Brava",
    "Coordenadas GPS" => "22.3 43.1",
    "Classificaçao" => "5 estrelas",
    "Numero de gostos" => 1000
);

function getMappingBarsDetails($info){
    foreach ($info as $key => $value) {
        echo $key." ".$value. " <br>";
    }

}

getMappingBarsDetails($info);
?>    
</body>
</html>