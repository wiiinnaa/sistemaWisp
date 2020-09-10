$(document).ready(function()
{
    tablaAntenas = $("#tablaAntenas").DataTable(
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
        $("#formAntenas").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nueva Antena");            
        $("#modalCRUD").modal("show");        
        idAntena=null;
        opcion = 1; //alta
    });    
    
    var fila; //capturar la fila para editar o borrar el registro
    
    //botón EDITAR    
    $(document).on("click", ".btnEditar", function()
    {
        fila = $(this).closest("tr");

        idAntena = parseInt(fila.find('td:eq(0)').text());
        nombreAntena = fila.find('td:eq(1)').text();
        modeloAntena = fila.find('td:eq(2)').text();
        modoAntena = fila.find('td:eq(3)').text();
        ipAntena = fila.find('td:eq(4)').text();
        usuarioAntena = fila.find('td:eq(5)').text();
        claveAntena = fila.find('td:eq(6)').text();
        macAntena = fila.find('td:eq(7)').text();
        lugarAntena = fila.find('td:eq(8)').text();
        
        
        $("#nombreAntena").val(nombreAntena);
        $("#modeloAntena").val(modeloAntena);
        $("#modoAntena").val(modoAntena);
        $("#ipAntena").val(ipAntena);
        $("#usuarioAntena").val(usuarioAntena);
        $("#claveAntena").val(claveAntena);
        $("#macAntena").val(macAntena);
        $("#lugarAntena").val(lugarAntena);
        
        opcion = 2; //editar
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Antena");            
        $("#modalCRUD").modal("show");  
        
    });

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    idAntena = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+idAntena+"?");
    if(respuesta){
        $.ajax({
            url: "BD/consAntena.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idAntena:idAntena},
            success: function(){
                tablaAntenas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
    $("#formAntenas").submit(function(e)
    {
        e.preventDefault();    
        nombreAntena = $.trim($("#nombreAntena").val());
        modeloAntena = $.trim($("#modeloAntena").val());
        modoAntena = $.trim($("#modoAntena").val());
        ipAntena = $.trim($("#ipAntena").val());  
        usuarioAntena = $.trim($("#usuarioAntena").val());  
        claveAntena = $.trim($("#claveAntena").val());  
        macAntena = $.trim($("#macAntena").val());  
        lugarAntena = $.trim($("#lugarAntena").val());  

        $.ajax({
            url: "BD/consAntena.php",
            type: "POST",
            dataType: "json",
            data: {
                nombreAntena:nombreAntena, 
                modeloAntena:modeloAntena, 
                modoAntena:modoAntena,
                ipAntena:ipAntena,
                usuarioAntena:usuarioAntena,
                claveAntena:claveAntena,
                macAntena:macAntena,
                lugarAntena:lugarAntena,
                idAntena:idAntena, 
                opcion:opcion},
            success: function(data)
            {  
                console.log(data);
                idAntena = data[0].idAntena;            
                nombreAntena = data[0].nombreAntena;
                modeloAntena = data[0].modeloAntena;
                modoAntena = data[0].modoAntena;
                ipAntena = data[0].ipAntena;
                usuarioAntena = data[0].usuarioAntena;
                claveAntena = data[0].claveAntena;
                macAntena = data[0].macAntena;
                lugarAntena = data[0].lugarAntena;
                
                if(opcion == 1){tablaAntenas.row.add([idAntena,nombreAntena,modeloAntena,modoAntena, ipAntena, usuarioAntena, claveAntena, macAntena, lugarAntena]).draw();}
                else{tablaAntenas.row(fila).data([idAntena,nombreAntena,modeloAntena,modoAntena, ipAntena, usuarioAntena, claveAntena, macAntena, lugarAntena]).draw();}            
            }        
        });
        $("#modalCRUD").modal("hide");      
    });        
});