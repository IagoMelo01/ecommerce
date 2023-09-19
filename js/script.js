// Get the modal
var Login = document.getElementById("Modal_Login");
var Cadastro = document.getElementById("Modal_Cadastro");

// Get the button that opens the modal
var btn = document.getElementById("Btn_Login");
var btn1 = document.getElementById("Btn_Login1");
var btn_cad = document.getElementById("Btn_Cadastro");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];

//variaveis gerais
var Cel_Cadastro = document.getElementById("cel_cad");



jQuery(function($) {
  $(".data").mask("00/00/0000");
  $(".cel").mask("(00) 00000-0000");
  $(".cpf").mask("000.000.000-00");
  $(".cc").mask("0000 0000 0000 0000");
  $(".cep").mask("00000-000");
  $(".pr").mask("# ##0,00" , {reverse: true});
});

// When the user clicks on the button, open the modal
btn.onclick = function() {
  Login.style.display = "block";
  Cadastro.style.display ="none";
}
btn1.onclick = function() {
  Login.style.display = "block";
  Cadastro.style.display ="none";
}
btn_cad.onclick = function() {
  Login.style.display = "none";
  Cadastro.style.display ="block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  Login.style.display = "none";
  Cadastro.style.display ="none";
}
span1.onclick = function() {
  Login.style.display = "none";
  Cadastro.style.display ="none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == Login) {
    Login.style.display = "none";
  } else if(event.target == Cadastro){
    Cadastro.style.display ="none";
  } 
}



function adcCor() {
  var controleCor = $("#corCount").val();

  var controleTam = $("#tamCount").val();
  controleTam++;
  $("#tamCount").val(controleTam);

  controleCor++;

  $("#corCount").val(controleCor);

  var add = 'cor' + controleCor;

  $("#addCor").append('<hr color="darkcyan"><div id="'+ add +'"> <div class="form-group form form-static-label"> <input type="text" name="'+ add +'" class="form-control "><span class="form-bar"></span><label class="float-label">Cor</label></div><div class="form-group form-primary"><h6>Fotos do produto:</h6><input type="file" name="arq'+ controleCor +'[]" class="arq form-control " maxlength="6" multiple></div><div class="container row"><div class="form-group col form form-static-label"><input type="text" name="tam'+controleTam+'" class="form-control color-bk"><span class="form-bar"></span><label class="float-label">Tamanho</label></div><div class="form-group col form form-static-label"><input type="text" name="qtd'+controleTam+'" class="form-control color-bk"><span class="form-bar"></span><label class="float-label">quantidade</label></div><input type="hidden" name="ref'+ controleTam +'" value="'+ controleCor +'"><div class="col"><button type="button" class="btn btn-primary form-static-label" onclick="adcTamanho('+ controleCor +')">Adicionar Tamanho</button></div></div><div id="addTam'+ controleCor +'"></div></div>');   
}

function adcTamanho(cont) {
  var controleTam = $("#tamCount").val(); 
  var caminho = "#addTam" + cont;
  controleTam++;
  id = 'tam' + controleTam;
  var pertence = $("#corCount").val();
   $("#tamCount").val(controleTam);
   $(caminho).append('<hr color="lightgrey"><div class="container row"><div class="form-group col form form-static-label"><input type="text" name="'+id+'" class="form-control color-bk"><span class="form-bar"></span><label class="float-label">Tamanho</label></div><div class="form-group col form form-static-label"><input type="text" name="qtd'+controleTam+'" class="form-control color-bk"><span class="form-bar"></span><label class="float-label">quantidade</label></div><input type="hidden" name="ref'+controleTam+'" value="'+cont+'"><div class="col"></div></div>');

}


function perfil(){
  window.location.href = "./profile/index.php";
}

function size(tam, id){
  $("#tamEsc").val(id);
  $(".btnSize").css("background", "rgb(239,239,239)");
  $(".btnSize").css("border", "1px solid transparent");
  $("#size" + tam).css("background", "rgb(141, 141, 141)");
  $("#size" + tam).css("border", "1px solid rgb(45, 42, 43)");
}



function buy(){
  var tam = $("#tamEsc").val();
  if(tam == 'false'){
    alert("Escolha um tamanho!");
  } else {
    $("#formTamanho").submit();
  }
}

function fotos(foto){
  $(".productViewMainImage").attr('src', foto);
}


function quantidade(value){
  var qtd = $("#" + value).val();
  if(qtd < 1){
    $("#" + value).val(1);
    alert("Quantidade inválida!")
  }
}


function del(id, cor, tam){
  window.location.href = "cart.php?ex=" + id + "&corex=" + cor + "&tamex=" + tam;
}


function frete(frete, valor, cep){
  $("#frete").val(frete);
  $("#vfrete").val(valor);
  $("#cepc").val(cep);
  $("#fmfrete").submit();
  $("#cep").css("display:none;");
}

