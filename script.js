let docTitle = document.title;
window.addEventListener("blur", () => {
    document.title = "Volte aqui :(";
})
window.addEventListener("focus", () =>{
    document.title = docTitle;
})

window.onscroll = () =>{
    menuResponsivo.classList.remove('active');

}


let menuResponsivo = document.querySelector('.navbar-links');
document.querySelector('#menu').onclick = () => {
    menuResponsivo.classList.toggle('active');
    console.log("Teste")
};


function janela_vis(x){
    var y = confirm("Caso o arquivo selecionado seja do tipo PDF, JPG, ou PNG, uma nova página será aberta para visualizá-lo.\n\nCaso seja de qualquer outro tipo, o arquivo será baixado.\n\nDeseja continuar?");
    if(y == true){
      var path = x.id;
      window.open("../admin/arq_cadastro/"+path, "_blank");
    }
  }

function janela_vis2(x){
var y = confirm("Caso o arquivo selecionado seja do tipo PDF, JPG, ou PNG, uma nova página será aberta para visualizá-lo.\n\nCaso seja de qualquer outro tipo, o arquivo será baixado.\n\nDeseja continuar?");
if(y == true){
    var path = x.id;
    window.open(path, "_blank");
}
}

function janela_del(x){
    var y = confirm("Você tem certeza que deseja deletar este arquivo?");
    if(y == true){
        var id = x.id;
        window.location.href = "remocao.php?deletar="+id;
    }
}

function janela_del2(x){
    var y = confirm("Você tem certeza que deseja deletar a conta deste administrador?");
    if(y == true){
        var adm_id = x.id;
        window.location.href = "../cadastro/deladm.php?deletar="+adm_id;
    }
}



