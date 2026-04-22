
$(document).ready(function(){
    verlistadocarro()
	verlistado()
	verlistadoclientes()
	transferencias_his()
	transferencias()
	verlistado_tem()

	
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO
})

function verlistadocarro(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("libs/Carro.php",{
                randomnumber:randomnumber
            }, function(data){
              $("#contenidocarro").html(data);
            });



}
function verlistado(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("libs/pnel_productos.php",{
                randomnumber:randomnumber
            }, function(data){
              $("#contenido").html(data);
            });


}
function verlistadoclientes(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("libs/listarPaises.php",{
                randomnumber:randomnumber
            }, function(data){
              $("#contenidoclientes").html(data);
            });



}
function transferencias_his(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("libs/transferencias_his.php",{
                randomnumber:randomnumber
            }, function(data){
              $("#contenido_tran_his").html(data);
            });

}
function verlistado_tem(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("libs/pendientes.php", {
                randomnumber:randomnumber
            }, function(data){
              $("#contenido_tem").html(data);
            });

}

function transferencias(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("libs/transferencias.php", {
                randomnumber:randomnumber
            }, function(data){
              $("#contenido_tran").html(data);
            });

}
