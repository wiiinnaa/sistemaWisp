$(document).ready(function()
{
    tablaUsuarios = $("#tablaUsuarios").DataTable(
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
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nueva Usuario");            
        $("#modalCRUD").modal("show");        
        idUsuario=null;
        opcion = 1; //alta
    });    
    
    var fila; //capturar la fila para editar o borrar el registro
    
    //botón EDITAR    
    $(document).on("click", ".btnEditar", function()
    {
        fila = $(this).closest("tr");

        idUsuario = parseInt(fila.find('td:eq(0)').text());
        nombreUsuario = fila.find('td:eq(1)').text();
        cargoUsuario = fila.find('td:eq(2)').text();
        telefonoUsuario = fila.find('td:eq(3)').text();
        usuarioUsuario = fila.find('td:eq(4)').text();
        claveUsuario = fila.find('td:eq(5)').text();
            
        
        $("#nombreUsuario").val(nombreUsuario);
        $("#cargoUsuario").val(cargoUsuario);
        $("#telefonoUsuario").val(telefonoUsuario);
        $("#usuarioUsuario").val(usuarioUsuario);
        $("#claveUsuario").val(claveUsuario);
            
        opcion = 2; //editar
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Usuario");            
        $("#modalCRUD").modal("show");  
        
    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function(){    
        fila = $(this);
        idUsuario = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: "+idUsuario+"?");
        if(respuesta){
            $.ajax({
                url: "BD/consUsuario.php",
                type: "POST",
                dataType: "json",
                data: {opcion:opcion, idUsuario:idUsuario},
                success: function(){
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();
                }
            });
        }   
    });
    
    $("#formUsuarios").submit(function(e)
    {
        e.preventDefault();    
        nombreUsuario = $.trim($("#nombreUsuario").val());
        cargoUsuario = $.trim($("#cargoUsuario").val());
        telefonoUsuario = $.trim($("#telefonoUsuario").val());
        usuarioUsuario = $.trim($("#usuarioUsuario").val());  
        claveUsuario = $.trim($("#claveUsuario").val());

        $.ajax({
            url: "BD/consUsuario.php",
            type: "POST",
            dataType: "json",
            data: {
                nombreUsuario:nombreUsuario, 
                cargoUsuario:cargoUsuario, 
                telefonoUsuario:telefonoUsuario,
                usuarioUsuario:usuarioUsuario,
                claveUsuario:claveUsuario,
                idUsuario:idUsuario, 
                opcion:opcion},
            success: function(data)
            {  
                console.log(data);
                idUsuario = data[0].idUsuario;            
                nombreUsuario = data[0].nombreUsuario;
                cargoUsuario = data[0].cargoUsuario;
                telefonoUsuario = data[0].telefonoUsuario;
                usuarioUsuario = data[0].usuarioUsuario;
                claveUsuario = data[0].claveUsuario;
                
                if(opcion == 1){tablaUsuarios.row.add([idUsuario,nombreUsuario,cargoUsuario,telefonoUsuario, usuarioUsuario, claveUsuario]).draw();}
                else{tablaUsuarios.row(fila).data([idUsuario,nombreUsuario,cargoUsuario,telefonoUsuario, usuarioUsuario, claveUsuario]).draw();}            
            }        
        });
        $("#modalCRUD").modal("hide");      
    });        
});