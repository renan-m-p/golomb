<?php
require_once('src/Encoder.php');
require_once('src/Decoder.php');


$iBase   = $_POST['base'];
$sOption = $_POST['option'];


$sText = file_get_contents($_FILES['arquivo']['tmp_name']);

if (empty($sText)) {
  throw new Exception("Erro ao Ler o arquivo");
}

if ($sOption == 'encoder') {

  $oEncoder    = new Encoder($iBase, $sText);
  $sOutputFile = $oEncoder->process();

} else {

  $oDecoder = new Decoder($iBase, $sText);
  $sText = $oDecoder->process();
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container">
      
      <div class="page-header">
        <h1>Golomb</h1>
      </div>

      <?php if (isset($oDecoder)) {  ?>
         <div class="col-md-12">
          <div class="panel panel-default">  
            <div class="panel-heading"><h2>Texto Decodificado: </h2></div>
            <div class="panel-body">
              <p><?php echo $sText; ?></p>
            </div>
          </div>
         </div>
       <?php } ?>


      <?php if (isset($oEncoder)) {  ?>
        <div class="col-md-4">
        
          <div class="panel panel-default">  
            <div class="panel-heading"><h2>Passo a Passo: </h2></div>
            <ul class="list-group">
              <?php echo $oEncoder->getSteps(); ?>
            </ul>
          </div>
         </div>

         <div class="col-md-8">
          <div class="panel panel-default">  
            <div class="panel-heading"><h2>Input Hexadecimal: </h2></div>
            <div class="panel-body">
              <p><?php echo $oEncoder->getHexText(); ?></p>
            </div>
          </div>
         </div>

         <div class="col-md-8">
          <div class="panel panel-default">  
            <div class="panel-heading"><h2>Output Hexadecimal: </h2></div>
            <div class="panel-body">
              <p><?php echo $oEncoder->getHexCode(); ?></p>
            </div>
          </div>
         </div>

         <div class="col-md-8">
          <div class="panel panel-default">  
            <div class="panel-heading"><h2>Arquivo: </h2></div>
            <div class="panel-body">
              <a href="<?='tmp/'.$sOutputFile?>" target="_blanl"><?=$sOutputFile?></a>
            </div>
          </div>
         </div>
       <?php } ?>

      </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
