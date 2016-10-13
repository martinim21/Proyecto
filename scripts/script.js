window.onload = function(){
  initListeners();
}

var addSkill = (skillName, qtyScore) =>{
  var trSkillElement = document.createElement("tr");
  var tdNameSkillElement = document.createElement("td");
  var tdScoreSkillElement = document.createElement("td");
  var skillsTable = document.getElementById('skills_table');

  tdNameSkillElement.innerHTML = skillName;
  for(var index=0; index<qtyScore; index++){
    var imageStar = document.createElement("img");
    imageStar.src = "../img/estrella_azul_18_18.jpg";
    tdScoreSkillElement.appendChild(imageStar);
  }
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
      document.getElementById("user_name").disabled=false;
      document.getElementById("especialidad").disabled=false;

  }, false);

  document.getElementById("file-input").addEventListener("change", (event) => {
    document.getElementById('user_image').src = window.URL.createObjectURL(event.target.files[0]);
  }, false);
}
