<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Avaliar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
    <?php
    session_start();
    require_once('header.php');
    require_once("connection.php");
      
    if(isset($_POST['save'])){
        $classificacao = $_POST["fb"];
        $nome = $_POST["nome"];
        $comment = $_POST["comment"];
        $data = $_POST["data"];
       
        // query
        $sql = "INSERT INTO `comentarios`(`nome`, `avaliacao`, `classificacao`, `date`)
        VALUES (?, ?, ?, ?)";
        $query = $pdo->prepare($sql);
        $query->execute(array($nome, $comment, $classificacao, $data));
        if($query->rowCount() >= 1) {
            echo "<p>Introduzido com sucesso</p>";
        } else {
            echo "<p>Erro</p>"; 
        }   
    }
    ?>

    <form method="post" action="">
  
        <div class="container">
            <label for="titulo"><b>A sua avaliação </b></label>
            <br><br>
                <div class="vote">
                <label>
                    <input type="radio" name="fb" value="1">
                    <i class="fa"></i>
                </label>
                <label>
                    <input type="radio" name="fb" value="2">
                    <i class="fa"></i>
                </label>
                <label>
                    <input type="radio" name="fb" value="3">
                    <i class="fa"></i>
                </label>
                <label>
                    <input type="radio" name="fb" value="4">
                    <i class="fa"></i>
                </label>
                <label>
                    <input type="radio" name="fb" value="5">
                    <i class="fa"></i>
                </label>
                  
                </div>

            <br><br>
            <label for="titulo"><b>Nome do bar</b></label><br>
            <input type="text" maxlength="100" placeholder="Introduza o nome do bar" name="nome" required>
            <br>
            <label for="comment"><b>A sua experiência</b></label>
            <br><br>
            <textarea placeholder="Relate um pouco da sua experiência..." rows="4" cols="50" name="comment" maxlength="500" required></textarea>
            <br><br>
            <label for="myImg"><b>Fotografias</b></label>
            <input type="file" name="myImg"> 
            <br><br>
            <label for="data"><b>Data de visita</b></label>
            <br><br>
            <input type="date" name="data">
            <button type="submit" name="save">Enviar avaliação</button>


        </div>
   
    </form>
    
    <?php
        require_once('footer.php');
    ?>

    
<script>
    $('.vote label i.fa').on('click mouseover', function () {
        // remove classe ativa de todas as estrelas
        $('.vote label i.fa').removeClass('active');
        // pegar o valor do input da estrela clicada
        var val = $(this).prev('input').val();
        //percorrer todas as estrelas
        $('.vote label i.fa').each(function () {
            /* checar de o valor clicado é menor ou igual do input atual
            * se sim, adicionar classe active
            */
            var $input = $(this).prev('input');
            if ($input.val() <= val) {
                $(this).addClass('active');
            }
        });
        var $valor = $('input[name=fb]:checked').val();
        $("#voto").val($valor);

        // somente para teste
    });
    //Ao sair da div vote
    $('.vote').mouseleave(function () {
        //pegar o valor clicado
        var val = $(this).find('input:checked').val();
        //se nenhum foi clicado remover classe de todos
        if (val == undefined) {
            $('.vote label i.fa').removeClass('active');
        } else {
            //percorrer todas as estrelas
            $('.vote label i.fa').each(function () {
                /* Testar o input atual do laço com o valor clicado
                * se maior, remover classe, senão adicionar classe
                */
                var $input = $(this).prev('input');
                if ($input.val() > val) {
                    $(this).removeClass('active');
                } else {
                    $(this).addClass('active');
                }
            });
        }
        $("#voto").html(val); // somente para teste
    });
</script>
</body>
</html>
