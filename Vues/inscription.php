  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>seek coding</title>
    <link rel="stylesheet" href="../Vues/css/login.css">     
</head>
<?php
     // if(isset($_GET['error'])){?>
    
      <?php 
    // }
  ?>
<body>
    <div class="full-page">
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button'onclick='login()'  class='toggle-btn'>  Connecter </button>
                    <button type='button'onclick='register()'class='toggle-btn' >Inscrire</button>

                </div>
                <form id='login' class='input-group-login'>
                    <input type='text'class='input-field'placeholder='Email ' required >
            <input type='password'class='input-field'placeholder='Entre le mot de passe' required>
            <div id="ifetudiante" style="display: none;"> <input type='password' class='input-field' placeholder='Entre le mot de passe' required><input type='checkbox'class='check-box' onclick="anpassword()">Se connecter 
            <button type='submit'class='submit-btn'>changer le mot de passe</button>
            </div>
             <div id="ifetudiantee" style="display: block;">
              <!-- <input onclick="password()" type='checkbox'class='check-box' > --><a href="" style="text-decoration: none; color: white;" >mot de passe oublié </a> 
            <button type='submit'class='submit-btn' >Connexion</button>
        </div>
         </form >

     <!-- inscription -->
     <div id="error">
         <?php 
            if(isset($error))  
            echo $error;
          ?>
     </div>
         <form id='register' class='input-group-register' method="post" action="" enctype="multipart/form-data">
        <input type="radio" id="check" name="type" value="Etudiant" onclick="uetudiant()"><label> ETUDIANT</label>
             <input type="radio" id="check" name="type" value="Enseignant" onclick="uenseignant()" checked><label>ENSEIGNANT</label>
         <div id="ifetudiant" style="display: none;"><input class='input-field' name="cne" type="text" placeholder="CNE" maxlength="10" minlength="10"></div>
             <input type='text'class='input-field'placeholder='Nom' name='nom'   required  >
             <input type='text'class='input-field'placeholder='Prenom '  name='prenom'   required>
             <input type='email'class='input-field'placeholder='Email'  name='email'  required>
             <input type='password'class='input-field'placeholder='Entre le mot de passe'  name='pw1'  required>
             <input type='password'class='input-field'placeholder=' le mot de passe'  name='pw2'  required>
              <input type='date'class='input-field'placeholder='date naissance '  name='dt' maxlength="8" required>
             <label> photo :</label>
              <input type="file"  id="avatar" name="image"
                   accept="image/png, image/jpeg" >
                    <button type='submit'class='submit-btn'>inscrire</button>
             </form>
            </div>
        </div>
        <div id="msg" style="display:none;"><p>bonjour</p>
    </div>
    <?php  
   echo " <script>
        var x=document.getElementById('login');
        var y=document.getElementById('register');
        var z=document.getElementById('btn');
        var w=document.getElementById('cne');
        function register()
        {
            x.style.left='-400px';
            y.style.left='50px';
            z.style.left='110px';
        }
        function login()
        {
            x.style.left='50px';
            y.style.left='450px';
            z.style.left='0px';
        }
     
    </script>
    <script>
        
            function uenseignant() {
                document.getElementById('ifetudiant').style.display = 'none';
            }
            function uetudiant() {
                document.getElementById('ifetudiant').style.display = 'block';
            }
            function password() {
                document.getElementById('ifetudiante').style.display = 'block';
                 document.getElementById('ifetudiantee').style.display = 'none';
            }
            function anpassword() {
                document.getElementById('ifetudiante').style.display = 'none';
                 document.getElementById('ifetudiantee').style.display = 'block';
            }
            
                 
    </script>";
 ?>
    <script>
         register();
      </script> 
</body>
</html> 
<header>
 