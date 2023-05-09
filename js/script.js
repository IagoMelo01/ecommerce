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


function addCat(){
  var refCat = $("#contCat").val();
  refCat++;
  $("#contCat").val(refCat);

  var refSubCat = $("#contSubCat").val();
  refSubCat++;
  $("#contSubCat").val(refSubCat);

  $("#addCateg").append('<br><br><div class="form-group form-inverse form-static-label">'+
                        '<input type="text" name="categ'+ refCat +'" class="form-control ">'+
                        '<span class="form-bar"></span>'+
                        '<label class="float-label">Categoria</label>'+
                      '</div><br><br>'+
                      '<div id="sub'+ refCat +'" class="container">'+
                        '<input type="hidden" name="refer'+ refSubCat +'" value ="' + refCat + '" >'+
                        '<div class="form-group form-inverse form-static-label">'+
                            '<input type="text" name="subCateg'+ refSubCat +'" class="form-control ">'+
                            '<span class="form-bar"></span>'+
                            '<label class="float-label">Subcategoria</label>'+
                        '</div>'+
                        '<br>'+
                      '</div>'+
                      '<div class="container">'+
                        '<button type="button" onclick="addSubCateg('+ refCat +')" class="btn">Adicionar subcategoria</button>'+
                      '</div>'+
                     ' <br>'+
                      '<hr style="background-color: cyan;"> ');

  /*-----------------------------------------------------------------------------------------------------------*/

  
}

function addSubCateg(refSb){
  var refSbCat = $("#contSubCat").val();
  refSbCat++;
  $("#contSubCat").val(refSbCat);

  $("#sub" + refSb).append('<input type="hidden" name="refer'+ refSbCat +'" value ="' + refSb + '" >'+
                            '<div class="form-group form-inverse form-static-label">'+
                                '<input type="text" name="subCateg'+ refSbCat +'" class="form-control ">'+
                                '<span class="form-bar"></span>'+
                                '<label class="float-label">Subcategoria</label>'+
                            '</div><br>')

  /*------------------------------------------------------------------------------------------------------------------*/

}

  
function adcqtd(ref){
  var vAtual = $("#" + ref).val();
  vAtual++;
  $("#" + ref).val(vAtual);
}

function sbtqtd(ref){
  var vAtual = $("#" + ref).val();
  if(vAtual <= 1){
    alert("quantidade inválida")
  } else {
    
  vAtual--;
  $("#" + ref).val(vAtual);
  }
}


function adicionar_subcat_existente(referencia){
  var referencia_adicionar_existente = $("#adicionar_subc_existente").val();
  referencia_adicionar_existente++;
  $("#adicionar_subc_existente").val(referencia_adicionar_existente);
  var id_categoria = $("#referencia_categoria" + referencia).val();
  var categoria_existente = "#adc_subcategoria" + referencia;
  $(categoria_existente).append('<input type="hidden" name="adcsubcatref'+ referencia_adicionar_existente +'" value ="' + id_categoria + '" >'+
                                    '<input style="margin-left:5%" placeholder="subcategoria..." type="text" name="adcsubcat'+ referencia_adicionar_existente +'" class="form-control ">'+
                                '<br>')
}




function abrirModal(){
  $("#side_menu_modal").css("display", "block");
}

function fecharModal(){
  $("#side_menu_modal").css("display", "none");
}


function modalLogin(){
    $("#Modal_Login").css("display", "block");
    $("#Modal_Cadastro").css("display", "none");
}

function modalCadastro(){
    $("#Modal_Login").css("display", "none");
    $("#Modal_Cadastro").css("display", "block");
}

function closeLoginCadastro(){
    $("#Modal_Login").css("display", "none");
    $("#Modal_Cadastro").css("display", "none");
}


function mudarCategoriasSelec_promo(){
  var ref_value = $("#todas_cat").prop("checked");
  $(".check_categorias_js").prop("checked", ref_value);
}

function mudarCategoriasSelecTodas(){
  $("#todas_cat").prop("checked", false);
}


// _____________________________ FUNÇÕES DE TAMANHO _________________________

function excluirTamanho(id){
  var dados = "funcao=excluir_tamanho&id=" + id;
  $("#dadosAjax").val(dados);
}

function editarTamanho(id){
  $("#idEdTam").val(id);
  $.ajax({
    url: "../dashboard/script",
    type: "POST",
    data: "funcao=get_quantidade&id=" + id ,
    dataType: "html"
  }).done(function(resposta){
    // alert(resposta);
    var str = resposta;
    var info = str.split("_");
    $("#quantidadeAtual").val(info[0]);
    $("#EdTamNome").val(info[1]);
    console.log(resposta);
    //location.reload();
  }).fail(function(jqXHR, textStatus ) {
    console.log("Request failed: " + textStatus);

  }).always(function() {
      console.log("completou");
  });
} 

function adcTamanhoExistente(id){
  alert(id + '  ok')
  $("#idCorAlvo").val(id)
  $("#tamanho_novo").val(" ");
  $("#quantidade_nova").val(" ");

}

function salvarTamanho(){
  var tamanhoNovo = $("#tamanho_novo").val();
  var quantidadeNova = $("#quantidade_nova").val();
  var corAlvo = $("#idCorAlvo").val();

  if(tamanhoNovo != "" && quantidadeNova != ""){
    $.ajax({
      url: "../dashboard/script",
      type: "POST",
      data: "funcao=adicionar_tamanho_existente&cor_alvo=" + corAlvo + "&tamanho_novo=" + tamanhoNovo + "&quantidade_nova=" + quantidadeNova,
      dataType: "html"
    }).done(function(resposta){
      // alert(resposta);
      console.log(resposta);
      location.reload();
    }).fail(function(jqXHR, textStatus ) {
      console.log("Request failed: " + textStatus);

    }).always(function() {
        console.log("completou");
    });
  } else {
    alert("preencha todos os campos!")
  }

  
}



function AlterarTamanho(){
  var id = $("#idEdTam").val();
  var nome = $("#EdTamNome").val();
  var operacao = $("#EdTamOperacao").val();
  var valor = $("#EdTamValorOperacao").val();
  $.ajax({
    url: "../dashboard/script",
    type: "POST",
    data: "funcao=alterar_tamanho&id=" + id + "&nome=" + nome + "&operacao=" + operacao +"&valor=" + valor ,
    dataType: "html"
  }).done(function(resposta){
     alert(resposta);
    
    console.log(resposta);
    location.reload();
  }).fail(function(jqXHR, textStatus ) {
    console.log("Request failed: " + textStatus);

  }).always(function() {
      console.log("completou");
  });
} 



// ________________________________________ FUNÇÕES DE COR _____________________________________________

function excluirCor(id){
  var dados = "funcao=excluir_cor&id=" + id;
  $("#dadosAjax").val(dados);
}

function salvarCor(){
  $("#formNovaCor").submit()
}


function editarCor(id){
  $("#idEdCor").val(id);
}




// _______________________________________________ FUNÇÕES DAS INFOS DO PRODUTO ______________________________________

function editarInfo(titulo, valor){           // Funcao para abrir o modal de edição de titulo e preço
  alert(titulo + valor);
  $("#nome_novo").val(titulo);
  $("#valor_novo").val(valor);
}

function salvarInfo(){                      // função para salvar o titulo e o valor
  var nome = $("#nome_novo").val();
  var valor = $("#valor_novo").val();
  var id  = $("#id_produto").val();
  if(nome != "" && valor != ""){
    $.ajax({
      url: "../dashboard/script",
      type: "POST",
      data: "funcao=salvar_info&id=" + id + "&nome=" + nome + "&valor=" + valor ,
      dataType: "html"
    }).done(function(resposta){
       alert(resposta);
      
      console.log(resposta);
      location.reload();
    }).fail(function(jqXHR, textStatus ) {
      console.log("Request failed: " + textStatus);
  
    }).always(function() {
        console.log("completou");
    });
  }
}


function editarDim(altura, largura, comprimento, peso){         // função para abrir o modal de edição das dimensões
  $("#peso_novo").val(peso);
  $("#comprimento_novo").val(comprimento);
  $("#largura_nova").val(largura);
  $("#altura_nova").val(altura);
}

function salvarDimensoes(){                               // função para salvar as edições das dimensões
  var peso = $("#peso_novo").val();
  var comprimento = $("#comprimento_novo").val();
  var largura = $("#largura_nova").val();
  var altura = $("#altura_nova").val();
  var id = $("#id_produto").val();
  $.ajax({
    url: "../dashboard/script",
    type: "POST",
    data: "funcao=salvar_dimensoes&id=" + id + "&peso=" + peso + "&comprimento=" + comprimento +"&largura=" + largura + "&altura=" + altura ,
    dataType: "html"
  }).done(function(resposta){
     alert(resposta);
    
    console.log(resposta);
    location.reload();
  }).fail(function(jqXHR, textStatus ) {
    console.log("Request failed: " + textStatus);

  }).always(function() {
      console.log("completou");
  });
}


function editarDescricao(){                       // função para abrir o modal de edição da descrição   
  var descricao = $("#descricao").val();
  $("#descricao_nova").val(descricao);
}

function salvarDescricao(){                     // função para salvar a edição na descrição
  var descricao = $("#descricao_nova").val();
  var id = $("#id_produto").val();
  $.ajax({
    url: "../dashboard/script",
    type: "POST",
    data: "funcao=salvar_descricao&id=" + id + "&descricao=" + descricao ,
    dataType: "html"
  }).done(function(resposta){
     alert(resposta);
    
    console.log(resposta);
    location.reload();
  }).fail(function(jqXHR, textStatus ) {
    console.log("Request failed: " + textStatus);

  }).always(function() {
      console.log("completou");
  });
}


function salvarCapa(capa){
  var file = $("#capa_nova").prop('files')[0];
  var form = new FormData();
  var id = $("#id_produto").val();
  form.append('capa', file);
  form.append('id', id);
  form.append('funcao', 'salvar_capa');
  form.append('capa_apagar', capa);
  $.ajax({
    url: "script",
    type: "POST",
    data: form,
    contentType: false,
    cache: false,
    processData:false,
    success: function(data){
         $("#result").html(data);
         alert("data");
         location.reload();

    }
  }).done(function(resposta){
    alert(resposta);
  });
}


function salvarCategoria(){
  var categoriaNova = $("#categoriaNova").val();
  var subCategoriaNova = $("#subCategoriaNova").val();
  var id_produto = $("#id_produto").val();
  var dadosCategoria = "funcao=editar_categoria&id=" + id_produto + "&categoriaNova=" + categoriaNova + "&subCategoriaNova=" + subCategoriaNova;

  $("#dadosAjax").val(dadosCategoria);
  sendAjax();
}


function excluirProduto(id){
  var excluir_produto = "funcao=excluir_produto&id=" + id;

  $("#dadosAjax").val(excluir_produto);

}


// ________________________________________ Ajax para exclusões ________________________________________________

function sendAjax(){
  var dataAjax = $("#dadosAjax").val();
  $.ajax({
    url: "../dashboard/script",
    type: "POST",
    data: dataAjax,
    dataType: "html"
  }).done(function(resposta){
    // alert(resposta);
    console.log(resposta);
    location.reload();
  }).fail(function(jqXHR, textStatus ) {
    console.log("Request failed: " + textStatus);

  }).always(function() {
      console.log("completou");
  });
}



