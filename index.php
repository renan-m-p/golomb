<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>


    <div class="container">
      
      <div class="page-header">
        <h1>Golomb</h1>
      </div>

      <div class="row">
      
        <form action="main.php" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="col-md-6">
            <div class="form-group">
              <label for="base">Divisor</label>
              <input type="number" required min="1" class="form-control" name="base" id="base" placeholder="Divisor">
            </div>
            <div class="form-group">
              <label for="arquivo">Arquivo Codificar/Decodificar</label>
              <input required type="file" class="form-control" id="arquivo" name="arquivo" placeholder="Arquivo">
              <p class="help-block">Selecione o arquivo a ser codificado ou decodificado.</p>
            </div>
            <div class="form-group"> 
              <div class="radio">
                <label>
                  <input type="radio" checked value="encoder" id="codificar" name="option" placeholder="Codificar">
                  Codificar
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" value="decoder" id="decodificar" name="option" placeholder="Codificar">
                  Decodificar
                </label>
              </div>
            </div>
            
            <button type="submit" class="btn btn-default">Codificar/Decodificar</button>
          </div>
        </form>
      </div>
    </div>

    
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>