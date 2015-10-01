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
      
        <form action="" method="post" class="form-horizontal">
          <div class="col-md-6">
            <label for="base">Divisor</label>
            <input type="number" min="1" class="form-control" id="base" placeholder="Divisor">
          </div>
          <div class="col-md-6">
            <label for="arquivo">Arquivo Codificar/Decodificar</label>
            <input type="file" class="form-control" id="arquivo" placeholder="Arquivo">
            <p class="help-block">Selecione o arquivo a ser codificado ou decodificado.</p>
          </div>
          <div class="col-md-6"> 
            <div class="input-group">
                Codificar
                <input type="radio" class="radio" id="codificar" name="option" placeholder="Codificar">
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group">
                Decodificar
                <input type="radio" class="radio" id="decodificar" name="option" placeholder="Codificar">
            </div>
          </div>
          <button type="submit" class="btn btn-default">Codificar/Decodificar</button>
        </form>
      </div>
    </div>

    
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>