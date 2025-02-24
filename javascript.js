

function toggleMenu(){

    let subMenu = document.getElementById("subMenu");

    subMenu.classList.toggle("open-menu");

    
}



var janela_x;
var original_x = 220;
var original_y= 150;

function janela(){ //Galeria responsiva
 

    var janela_x = document.body.clientWidth;
    var foto = document.getElementsByClassName('product');
    var i;

    original_x = Math.floor(janela_x / 4) - 21; 
    original_y = Math.floor(original_x * 150 / 220); 


    for(i=0; i<foto.length; i++){

        foto[i].style = 'width: '+ original_x +'px; height: '+ original_y +'px;';


    }




    // alert(janela_x + " "+valor);

}


function confirmar(valor) {
    if (confirm("tem a certeza que pretende eliminar este produto?")) {

        location.href = 'upload.php?a='+valor;


    } else {

        alert("Produto não eliminado!");
        


    }


}

