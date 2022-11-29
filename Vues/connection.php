  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>seek coding</title>
    <link rel="stylesheet" href="../Vues/css/login.css">     
</head>
<body>
    <div class="full-page">
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                <a href="connectionUtilisateur.php">   <button type='button'onclick='login()'  class='toggle-btn'> Connecter  </button></a>
                    <a href="inscriptionUtilisateur.php">  <button type='button'onclick='register()'class='toggle-btn' >Inscrire</button></a>
                </div>
           
                <form id='login' class='input-group-login'  method="post" action="connectionUtilisateur.php">
                <?php if (isset($erreur))  echo '<h3>'.$erreur.'</h3><br>'; ?>
            
           <input type='text'class='input-field'placeholder='Email ' name="email" required ><br><br>

            <input type='password'class='input-field'placeholder='Entre le mot de passe' name="mdp" required><br><br>

            <a href="" style="text-decoration: none; color: white;" >mot de passe oublié </a> <br><br> 
            <a href="ClassesEtudiant.php"><button type='submit'class='submit-btn' >Connexion</button></a>
       
         </form >

     <!-- inscription -->
    
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
         login();
      </script>  
</body>
</html> 
<header>
