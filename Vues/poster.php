<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="../Vues/css/poster.css">
</head>
<body>

<fieldset>
     
  <center>

  <div class="search-container">
    <form action="PosterTravail.php?idclasse=<?php echo $_GET['idclasse'];?>" method="post" enctype="multipart/form-data">
      <input type="file"  name="fichier" accept="<?php echo '.'.$form['FORMATDEMANDE']?>">
      <button type="submit">Importer</button>
        <input type="submit" name="importer" value="Valider"> 
    </form>
  </div>
  </center>
  </fieldset>



</body>
</html>
