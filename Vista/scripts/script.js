window.onload = function(){
  initListeners();
}

var addSkill = (skillName, qtyScore) =>{
  var trSkillElement = document.createElement("tr");
  var tdNameSkillElement = document.createElement("td");
  var tdScoreSkillElement = document.createElement("td");
  var skillsTable = document.getElementById('skills_table');

  tdNameSkillElement.innerHTML = skillName;
  tdNameSkillElement.className="col s6";
  if(qtyScore>5){
    qtyScore=5;
  }
  for(var index=0; index<qtyScore; index++){
    var imageStar = document.createElement("img");
    imageStar.src = "Vista/img/estrella_azul_18_18.jpg";
    imageStar.className="icon_start";
    tdScoreSkillElement.appendChild(imageStar);
  }
  tdScoreSkillElement.className="col s6";
  trSkillElement.className="row";
  trSkillElement.appendChild(tdNameSkillElement);
  trSkillElement.appendChild(tdScoreSkillElement);
  skillsTable.tBodies[0].appendChild(trSkillElement);

}


function initListeners(){
  document.getElementById("addImage").addEventListener("click", () => {
    var skillName = document.getElementById("skill_name").value;
    var qtySkill = document.getElementById("button_skill_qty").value;

    if(skillName != "" && qtySkill!="")
    addSkill(skillName, qtySkill);
    document.getElementById("button_skill_qty").value="";
    document.getElementById("skill_name").value="";
  }, false);

  document.getElementById("edit_icon").addEventListener("click", () => {
      document.getElementById("text_presentacion").disabled=false;
      document.getElementById("text_projects").disabled=false;
      document.getElementById("text_historial").disabled=false;
      document.getElementById("user_name").disabled=false;
      document.getElementById("especialidad").disabled=false;

  }, false);

  document.getElementById("save_icon").addEventListener("click", () => {
      console.log("haciendo peticion");

      var name = document.getElementById("user_name").value;
      var especialidad = document.getElementById("especialidad").value;
      var presentacion = document.getElementById("text_presentacion").value;
      var experiencia = document.getElementById("text_historial").value;
      var historial = document.getElementById("text_projects").value;
      var username = $("#tag_username").text();
      var file_data = $('#file-input').prop('files');
      var skillList =[];
      var porcentajeList =[];
      var skillName;
      var startqty;
      var mapSkill = new Map();
      $('#skills_table tbody tr').each(function(){
        skillName =$(this).find("td:first").text();
         startqty = 0;
        $(this).find("img").each(function(){
          startqty=startqty+1;
        });
        if( startqty != 0 && skillName!= ''){
          skillList.push(skillName);
          porcentajeList.push(startqty);
        }
      });

            console.log(skillList);
                  console.log(porcentajeList);
      var form_data = new FormData();
      if(file_data==null || file_data.length == 0){
        file="";
      }
      else{
        file = file_data[0];
      }
      //form_data.append("file", file)
      form_data.append("name", name);
      form_data.append("username", username);
      form_data.append("especialidad", especialidad);
      form_data.append("historial", historial);
      form_data.append("experiencia", experiencia);
      form_data.append("presentacion", presentacion);
      form_data.append("skillList", skillList);
      form_data.append("porcentajeList", porcentajeList);
      //$.post( "index.php?ctl=updateUser", { "data": form_data});
      $.ajax({
      url: "index.php?ctl=updateUser", // Url to which the request is send
      type: "POST",             // Type of request to be send, called as method
      data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cached
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data)   // A function to be called if request succeeds
      {
      $('#loading').hide();
      $("#message").html(data);
      }
      });

      showDialog("usuario actualizado correctamente");
  }, false);

  $(".correos").bind('click', $.proxy(function(event) {
    var correoId = $(event.currentTarget).attr('id');
    $.post( "index.php?ctl=saveMessage", { "correoId": correoId.split("_")[1]});
    //location.reload();
  }, this));

  document.getElementById("file-input").addEventListener("change", (event) => {
    document.getElementById('user_image').src = window.URL.createObjectURL(event.target.files[0]);
  }, false);
}


function submit_post(url, params) {
    var f = $("<form method='POST' style='display:none;'></form>").attr({
        action: url
    }).appendTo(document.body);

    for (var i in params) {
        if (params.hasOwnProperty(i)) {
            $('<input type="hidden" />').attr({
                name: i,
                value: params[i]
            }).appendTo(f);
        }
    }
    f.submit();
    f.remove();
}

function logout(){
  submit_post("index.php", {"logout":"true"});
}

function openRegister(){
  submit_post("index.php", {"register":"true"});
}



function showDialog(message){
  if(message!=""){
    Materialize.toast(message, 3000, 'rounded')
  }
}

function register(){
  showDialog();
  submit_post("index.php", {"refistracion":"ok"});
}
