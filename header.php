<?php
echo <<<EOD
<div class="header-background">
  <div class="header">
   <!-- <img src="logo.png" alt="Poncha" class="logo"> -->
    <div class="header-left"> 
    <a href="index.php" > Home </a>
      <a  href="#home">As melhores</a>
      <a href="review.php">Avaliar</a>
      <a href="#about">Mapa</a>
    </div>
    <div class="header-right">
EOD;
  if(isset($_SESSION['login_user'])){
            echo "<a onclick='toggleUser()'  href='#updateUser'>Welcome " .$_SESSION['login_user']."</a>"; 
            }

if(isset($_SESSION['login_user']))
  echo "<a  href='logout.php'>LOGOUT</a>";
else 
  echo "<a onclick='toggle()' href='#login'>LOGIN</a>";
      

echo <<<EOD
      <a onclick="document.getElementById('id02').style.display='block';" href='#registro'>SIGN</a>
     </div> 
  </div>
</div>
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="email"><b>Email</b></label>
      <input id="email" type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input id="psw" type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="generate">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember" value="1"> Remember me
      </label>
EOD;


if(isset($_SESSION['error_message'])){
  echo <<<EOD
  <script>
    document.getElementById('id01').style.display='block';
  </script>
  <label style="color: red;">
EOD;

  echo $_SESSION['error_message'];
  unset($_SESSION['error_message']);
  echo "</label>";
}


echo <<<EOD
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<br>
EOD;

echo <<<EOD
<!-- The Modal -->
<div id="id03" class="modal">

  <!-- Modal Content -->
  <form class="modal-content animate" action="update_user.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Nome</b></label>
      <input type="text" placeholder="Enter Name" name="name" required>

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Email</b></label>
      <input id="email" type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter New Password" name="psw" required>

      <button type="submit">Update</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

EOD;


echo <<<EOD
<div id="id02" class="modal">
  
  <form class="modal-content animate" method="post" action="sign.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="email"><b>Nome</b></label>
      <input id="email" type="text" placeholder="Enter Name" name="nome" required>

      <label for="email"><b>Username</b></label>
      <input id="email" type="text" placeholder="Enter Username" name="username" required>

      <label for="email"><b>Email</b></label>
      <input id="email" type="email" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input id="psw" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" type="password" placeholder="Enter Password (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)" name="psw" required>
        
      <button type="submit" name="save">Register</button>
EOD;

if(isset($_SESSION['error_sign'])){
  echo <<<EOD
  <script>
    document.getElementById('id02').style.display='block';
  </script>
  <label style="color: red;">

EOD;

  echo $_SESSION['error_sign'];
  unset($_SESSION['error_sign']);
  echo "</label>";
}else if(isset($_SESSION['validate'])){

  echo <<<EOD
  <script>
    document.getElementById('id02').style.display='block';
  </script>
  <label style="color: red;">

EOD;

  echo $_SESSION['validate'];
  unset($_SESSION['validate']);
  echo "</label>";

}

echo <<<EOD
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>


EOD;


  
if(isset($_COOKIE['email'])) {
  echo <<<EOD
  <script>
  document.getElementById('email').value='{$_COOKIE["email"]}';
  </script>
EOD;

}

if(isset($_COOKIE['password'])) {
  echo <<<EOD
  <script>
  document.getElementById('psw').value='{$_COOKIE["password"]}';
  </script>
EOD;

}

?>

<script>
function toggle(){
  document.getElementById('id01').style.display='block';
}
function toggleUser(){
  document.getElementById('id03').style.display='block';
}

</script>