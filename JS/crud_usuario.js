$(document).ready(function()
{
    tablaUsuarios = $("#tablaUsuarios").DataTable
    ({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language":{
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
        $(".modal-title").text("Nuevo Usuario");            
        $("#modalCRUD").modal("show");        
        id=null;
        opcion = 1; //alta
    });    
    
    var fila; //capturar la fila para editar o borrar el registro
    
    //botón EDITAR    
    $(document).on("click", ".btnEditar", function()
    {
        fila = $(this).closest("tr");

        id = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        apellidos = fila.find('td:eq(2)').text();
        usuario = fila.find('td:eq(3)').text();
        clave = fila.find('td:eq(4)').text();
        cargo = fila.find('td:eq(5)').text();
        telefono = parseInt(fila.find('td:eq(6)').text());
        
        $("#nombre").val(nombre);
        $("#apellidos").val(apellidos);
        $("#usuario").val(usuario);
        $("#clave").val(clave);
        $("#cargo").val(cargo);
        $("#telefono").val(telefono);
        opcion = 2; //editar
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Usuario");            
        $("#modalCRUD").modal("show");  
        
    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function()
    {    
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
        if(respuesta){
            $.ajax({
                url: "BD/cons_usuario.php",
                type: "POST",
                dataType: "json",
                data: {opcion:opcion, id:id},
                success: function(){
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();
                }
            });
        }   
    });
    
    $("#formUsuarios").submit(function(e)
    {
        e.preventDefault();    
        nombre = $.trim($("#nombre").val());
        apellidos = $.trim($("#apellidos").val());
        usuario = $.trim($("#usuario").val());
        clave = $.trim($("#clave").val());
        cargo = $.trim($("#cargo").val());
        telefono = $.trim($("#telefono").val());    
        $.ajax({
            url: "BD/cons_usuario.php",
            type: "POST",
            dataType: "json",
            data: {
                nombre:nombre, 
                apellidos:apellidos, 
                usuario:usuario,
                clave:clave,
                cargo:cargo,
                telefono:telefono, 
                id:id, 
                opcion:opcion},
            success: function(data)
            {  
                console.log(data);
                id = data[0].id;            
                nombre = data[0].nombre;
                apellidos = data[0].apellidos;
                usuario = usuario[0].edad;
                clave = data[0].clave;
                cargo = data[0].cargo;
                telefono = data[0].telefono;
                if(opcion == 1){tablaUsuarios.row.add([id,nombre,apellidos,usuario,clave,cargo,telefono]).draw();}
                else{tablaUsuarios.row(fila).data([id,nombre,apellidos,usuario,clave,cargo,telefono]).draw();}            
            }        
        });
        $("#modalCRUD").modal("hide");    
        
    });    
    
});