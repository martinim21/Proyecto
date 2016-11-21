<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Choose!</title>
    <script   src="http://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

    <script type="text/javascript" src="../scripts/script.js"></script>
    <link rel="stylesheet" type="text/css"  href="../css/user_style.css"></link>
  </head>
  <body >
    <header >
      <img id="logo" src="../img/logo.jpg" alt="logotipo principal Choose"></img>
		</header>
    <div class="row">
    <section id="sumary_skills" class="col s2">
      <div class="image-upload row">
        <label for="file-input">
          <img id="user_image" src="../img/user.png" alt="fotografia de alumno" class="col s12"/>
        </label>

        <input id="file-input" type="file"/>
      </div>
      <table id="skills_table" class="row">
        <thead>
          <tr class="row">
            <th class="col s5">
              habilidad
            </th>
            <th class="col s7">
              nivel max 5
            </th>
          </tr>
        </thead>
        <tbody>
          <tr class="row">
            <td class="col s6">
            <input id="skill_name" class="form-field" type="text" />
            </td>
            <td valign="top" class="col s4">
              <input id="button_skill_qty" type="number" min="1" max="5" />
            </td>
            <td valign="top" class="col s2">
              <a id="addImage" class="waves-effect waves-circle waves-light btn-floating"><i class="tiny material-icons">+</i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
    <section id="description_skills" class="col s7">
      <div class="row info_estudiante">
        <div class="input-field col s9">
        <input id="edit_icon" type="image" name="name" src="../img/edit_icon.jpg">
          <input value="Martin Ibarra Manzano" id="user_name" type="text" class="validate" pattern="\w{5}" disabled>
          <label class="active" for="user_name">Nombre del estudiante</label>
        </div>
      </div>

        <div class="row info_estudiante">
          <div class="input-field col s9">
            <input value="Ingenieria en Computacion" id="especialidad" type="text" class="validate" disabled>
            <label class="active" for="especialidad">Especialidad</label>
          </div>
        </div>
        <div class="row info_estudiante">
          <div class="input-field col s12">
            <textarea id="text_presentacion" class="materialize-textarea " disabled >
                Presentacion general del estudiante, describir actividades escolares que las empresas pudieran considerar como soluciones para sus necesidades.
            </textarea>
            <label for="text_presentacion encabezados">Presentacion</label>
          </div>
        </div>

        <div class="row info_estudiante">
          <div class="input-field col s12">
            <textarea id="text_projects" class="materialize-textarea" disabled >
              Describir cada proyecto en los que participo que mejoraron sus habilidades tecnicas ejemplo: creacion de un compilador para python
              en español desarrollado con el lenguaje Java.
            </textarea>
            <label for="text_projects encabezados">Experiancia profesional y proyectos en los que ha participado</label>
          </div>
        </div>
    </section>
    <aside id="companies_nav" class="col s2">

      <div id="companies_table" class="row">
            <div class=" row">
                <a id="button_search" class="waves-effect waves-light btn" name="button" href="../templates/search_company.php">buscar empresas></a>
            </div>
            <div class="companias_candidatas row">
              empresas candidatas
            </div>
          <div class="companias_candidatas row">
              <img class="companies_images" src="../img/cucei.jpg" alt="imagen logotipo de compañia" />
          </div>
          <div class="companias_candidatas row">
              <img class="companies_images" src="../img/intel.png" alt="imagen logotipo de compañia" />
          </div>
          <div class="companias_candidatas row">
              <img class="companies_images" src="../img/oracle.png" alt="imagen logotipo de compañia" />
          </div>
          <div class="companias_candidatas row">
              <img class="companies_images" src="../img/tata.png" alt="imagen logotipo de compañia" />
          </div>
          <div class="companias_candidatas row">
            <img class="companies_images" src="../img/ooyala.png" alt="imagen logotipo de compañia" />
          </div>
      </div>
    </aside>

    </div>
  </body>
</html>