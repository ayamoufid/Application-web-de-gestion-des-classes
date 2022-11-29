  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublie</title>
    <!-- <link rel="stylesheet" href="style.css"> -->

<style type="text/css">
    *
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;

}

#error{
    color: red;
    font-size: 1.0em;
}
.full-page
{
    height: 200%;
    width: 100%;
    background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.4)),url(images/bg-2.jpg);
    background-position: center;
    background-size: cover;
    position: absolute;
    background-color:#CB98ED ;

}
#para{
    color: red;
    text-decoration:underline;
}

.form-box
{
    width:380px;
    height:400px;
    position:relative;
    margin:2% auto;
    background:rgba(0,0,0,0.3);
    padding:10px;
    overflow: hidden;
    /*right: 40%;*/
}
.button-box
{
    width:180px;
    margin:30px auto;
    position:relative;
    box-shadow: 0 0 20px 9px #5c3566;
    border-radius: 30px;
}
.toggle-btn
{
    padding:10px 30px;
    cursor:pointer;
    background:transparent;
    border:0;
    outline: none;
    position: relative;
}
#btn
{
    top: 0;
    left:0;
    position: absolute;
    width: 180px;
    height: 100%;
    background: #8B63DA;
    border-radius: 30px;
    transition: .5s;
}
.input-group-login
{
    top: 140px;
    position:absolute;
    width:280px;
    transition:.5s;
}

.input-field
{
    width: 100%;
    padding:10px 0;
    margin:5px 0;
    border-left:0;
    border-top:0;
    border-right:0;
    border-bottom: 1px solid #999;
    outline:none;
    background: transparent;
}
.submit-btn
{
    width: 85%;
    padding: 10px 30px;
    cursor: pointer;
    display: block;
    margin: auto;
    background: #c9a1d4;
    border: 0;
    outline: none;
    border-radius: 30px;
}


#login
{
    left:50px;
}
#login input
{
    color:white;
    font-size:15;
}


</style>      
</head>

<body>
    <div class="full-page">
        <!-- <div id='login-form'class='login-page'> -->
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                 <button type='button'class='toggle-btn'> Mot de passe oublie  </button>
                   
                </div>
           
                <form id='login' class='input-group-login'  method="post" action="MdpOublie.php">
                <?php if (isset($erreur))  echo '<h3>'.$erreur.'</h3><br>'; ?>
            <input type="text" name="email" value="<?php if (isset($email))  echo $email; ?>" hidden>
           <input type='text'class='input-field'  placeholder='mot de passe1' name="pw1" required ><br><br>
           <input type='text'class='input-field'  placeholder='mot de passe2 ' name="pw2" required ><br><br>
             
            <button type='submit'class='submit-btn' >Envoyer</button>
       
         </form >

     
    
  
      
</body>
</html> 