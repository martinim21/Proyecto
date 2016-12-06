

window.onload = function(){
  initChips();
  initListeners();


}

function initChips(){
  $('.chips-placeholder').material_chip({
      placeholder: 'mas',
      secondaryPlaceholder: 'ingresa datos',
  });


}

function getDataChip(){
    var data = $('.chips-placeholder').material_chip('data');
    return data;
}
function initListeners(){
  document.getElementById("search_icon").addEventListener("click", () => {
      var tags="";
      var data = getDataChip();
      for(var index = 0; index < data.length;index++){
        tags = tags + ", \'" + data[index].tag + "\'";
      }
      if(tags!=""){
        tags = tags.substring(1);
      }
      submit_post("index.php?ctl=search", {"queryParams": tags});

  }, false);

  $(".send_correo").bind('click', $.proxy(function(event) {
     var id = $(event.currentTarget ).attr('id');
     var idModal = id.split("_")[1] + "_" + id.split("_")[2];
     var receptor_id = id.split("_")[2];
     var asunto = document.getElementById("asunto_" + idModal).value;
     var cuerpo = document.getElementById("textarea_" + idModal).value;
    $.post( "index.php?ctl=sendMessage", { "receptor_id": receptor_id, "asunto": asunto, "cuerpo":cuerpo}).done(function() {
      showDialog("mensaje enviado correctamente");
    }).fail(function() {
      showDialog( "error en el envio de mensaje" );
    });
    //location.reload();
  }, this));


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

function showDialog(message){
  if(message!=""){
    Materialize.toast(message, 3000, 'rounded')
  }
}
