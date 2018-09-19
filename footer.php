<?php
echo <<<EOD
<footer>
  <div class="row">
    <div class="column">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper ac eros a luctus. Mauris sed lobortis lacus </p>
        <p>Email: something@gmail.com</p>
    </div>
    <div class="column">
      <h3>General Links</h3>
        <a href="#career">Career</a>
        <a href="#privacy">Privacy Policy</a>
        <a href="#conditions">Terms and Conditions</a>
        <a href="#questions">Frequently Asked Questions</a>
    </div>
    <div id="avaliacoes" class="column">
      
    </div>
    <div class="column">
      <h3>Siga-nos</h3>
      <a href="#face">Facebook <i class="fab fa-facebook-square"></i></a>
      <a href="#twitch">Twitch <i class="fab fa-twitch"></i></a>
      <a href="#insta">Instagram <i class="fab fa-instagram"></i></a>
    </div>
  </div> 
</footer>
<script>
        //funçao para actualizar o footer com as ultimas avaliações
        function showAvaliacoes() {
        
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
          
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("avaliacoes").innerHTML = this.responseText;
                }
        }
        
        xmlhttp.open("GET","footer_avaliacoes.php");
        xmlhttp.send();
        
        }
        
        showAvaliacoes();
</script>

EOD;

?>