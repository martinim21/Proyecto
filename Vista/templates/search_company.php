<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chosse!</title>
    <script   src="http://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

          <script type="text/javascript" src="../scripts/search_company.js"></script>

      <link rel="stylesheet" type="text/css"  href="../styles/user_style.css">
  </head>
  <body>
    <header >
      <img id="logo" src="../img/logo.jpg" alt="no se pudo cargar el logo"></img>
		</header>
    <div>Busqueda</div>
    <br>
    <form>
      <div class="row">
        <div class="input-field col s2">
          <input id="company_name" type="text" class="validate">
          <label class="active" for="company_name">Nombre de la empresa</label>
        </div>
        <div class="input-field col s2">
          <input id="salario" type="text" class="validate">
          <label class="active" for="salario">Salario</label>
        </div>
        <div class="input-field col s2">
          <input id="puesto" type="text" class="validate">
          <label class="active" for="puesto">Puesto</label>
        </div>
      </div>
    </form>
    <div class="chips"></div>
<div class="chips chips-initial"></div>
<div class="chips chips-placeholder"></div>
  </body>
</html>
