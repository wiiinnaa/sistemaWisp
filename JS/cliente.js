$(document).ready(function()
{
    tablaClientes = $("#tablaClientes").DataTable(
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
        $("#formClientes").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Cliente");            
        $("#modalCRUD").modal("show");        
        idCliente=null;
        opcion = 1; //alta
    });    
    
    var fila; //capturar la fila para editar o borrar el registro
    
    //botón EDITAR    
    $(document).on("click", ".btnEditar", function()
    {
        fila = $(this).closest("tr");

        idCliente = parseInt(fila.find('td:eq(0)').text());
        nombreCliente = fila.find('td:eq(1)').text();
        telefonoCliente = fila.find('td:eq(2)').text();
        direccionCliente = fila.find('td:eq(3)').text();
        fechInicPerioCliente = fila.find('td:eq(4)').text();
        fechFinPerioCliente = fila.find('td:eq(5)').text();
        apCliente = fila.find('td:eq(6)').text();
        
        
        $("#nombreCliente").val(nombreCliente);
        $("#telefonoCliente").val(telefonoCliente);
        $("#direccionCliente").val(direccionCliente);
        $("#fechInicPerioCliente").val(fechInicPerioCliente);
        $("#fechFinPerioCliente").val(fechFinPerioCliente);
        $("#apCliente").val(apCliente);
        
        opcion = 2; //editar
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Cliente");            
        $("#modalCRUD").modal("show");  
        
    });

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    idCliente = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+idCliente+"?");
    if(respuesta){
        $.ajax({
            url: "BD/consCliente.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idCliente:idCliente},
            success: function(){
                tablaClientes.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
    $("#formClientes").submit(function(e)
    {
        e.preventDefault();    
        nombreCliente = $.trim($("#nombreCliente").val());
        telefonoCliente = $.trim($("#telefonoCliente").val());
        direccionCliente = $.trim($("#direccionCliente").val());
        fechInicPerioCliente = $.trim($("#fechInicPerioCliente").val());  
        fechFinPerioCliente = $.trim($("#fechFinPerioCliente").val());  
        apCliente = $.trim($("#apCliente").val());  

        $.ajax({
            url: "BD/consCliente.php",
            type: "POST",
            dataType: "json",
            data: {
                nombreCliente:nombreCliente, 
                telefonoCliente:telefonoCliente, 
                direccionCliente:direccionCliente,
                fechInicPerioCliente:fechInicPerioCliente,
                fechFinPerioCliente:fechFinPerioCliente,
                apCliente:apCliente,
                idCliente:idCliente, 
                opcion:opcion},
            success: function(data)
            {  
                console.log(data);
                idCliente = data[0].idCliente;            
                nombreCliente = data[0].nombreCliente;
                telefonoCliente = data[0].telefonoCliente;
                direccionCliente = data[0].direccionCliente;
                fechInicPerioCliente = data[0].fechInicPerioCliente;
                fechFinPerioCliente = data[0].fechFinPerioCliente;
                apCliente = data[0].apCliente;
                
                if(opcion == 1){tablaClientes.row.add([idCliente,nombreCliente,telefonoCliente,direccionCliente, fechInicPerioCliente, fechFinPerioCliente, apCliente]).draw();}
                else{tablaClientes.row(fila).data([idCliente,nombreCliente,telefonoCliente,direccionCliente, fechInicPerioCliente, fechFinPerioCliente, apCliente]).draw();}            
            }        
        });
        $("#modalCRUD").modal("hide");      
    });        
});