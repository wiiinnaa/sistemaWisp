$(document).ready(function()
{
    tablaTarifas = $("#tablaTarifas").DataTable(
    {
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
    $("#btnNuevo").click(function()
    {
        $("#formTarifas").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nueva tarifa");            
        $("#modalCRUD").modal("show");        
        idTarifa=null;
        opcion = 1; //alta
    });    
    
    var fila; //capturar la fila para editar o borrar el registro
    
    //botón EDITAR    
    $(document).on("click", ".btnEditar", function()
    {
        fila = $(this).closest("tr");

        idTarifa = parseInt(fila.find('td:eq(0)').text());
        nombreTarifa = fila.find('td:eq(1)').text();
        descargarTarifa = fila.find('td:eq(2)').text();
        subidaTarifa = fila.find('td:eq(3)').text();
        precioTarifa = fila.find('td:eq(4)').text();
        
        
        $("#nombreTarifa").val(nombreTarifa);
        $("#descargarTarifa").val(descargarTarifa);
        $("#subidaTarifa").val(subidaTarifa);
        $("#precioTarifa").val(precioTarifa);
        
        opcion = 2; //editar
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar tarifa");            
        $("#modalCRUD").modal("show");  
        
    });

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    idTarifa = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+idTarifa+"?");
    if(respuesta){
        $.ajax({
            url: "BD/consTarifa.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idTarifa:idTarifa},
            success: function(){
                tablaTarifas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
    $("#formTarifas").submit(function(e)
    {
        e.preventDefault();    
        nombreTarifa = $.trim($("#nombreTarifa").val());
        descargarTarifa = $.trim($("#descargarTarifa").val());
        subidaTarifa = $.trim($("#subidaTarifa").val());
        precioTarifa = $.trim($("#precioTarifa").val());  

        $.ajax({
            url: "BD/consTarifa.php",
            type: "POST",
            dataType: "json",
            data: {
                nombreTarifa:nombreTarifa, 
                descargarTarifa:descargarTarifa, 
                subidaTarifa:subidaTarifa,
                precioTarifa:precioTarifa,
                idTarifa:idTarifa, 
                opcion:opcion},
            success: function(data)
            {  
                console.log(data);
                idTarifa = data[0].idTarifa;            
                nombreTarifa = data[0].nombreTarifa;
                descargarTarifa = data[0].descargarTarifa;
                subidaTarifa = data[0].subidaTarifa;
                precioTarifa = data[0].precioTarifa;
                
                if(opcion == 1){tablaTarifas.row.add([idTarifa,nombreTarifa,descargarTarifa,subidaTarifa, precioTarifa]).draw();}
                else{tablaTarifas.row(fila).data([idTarifa,nombreTarifa,descargarTarifa,subidaTarifa, precioTarifa]).draw();}            
            }        
        });
        $("#modalCRUD").modal("hide");      
    });        
});