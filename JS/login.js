$('#formLogin').submit(function(e)
{
    e.preventDefault();
    var usuario = $.trim($("#usuario").val());
    var password = $.trim($("#password").val());
    
    if(usuario.length == "" || password == "")
    {
        Swal.fire({
            type:'warning',
            title: 'Ingrese un Usuario y/o Password',
        });
        return false;
    }else
    {
        $.ajax({
            url: "BD/login.php",
            type: "POST",
            datatype: "json",
            data: {usuario:usuario, password:password},
            success: function(data)
            {
                if(data == "null")
                {
                    Swal.fire({
                        type:'error',
                        title: 'Usuario y/o Password incorrecta',                        
                    });
                }else
                {
                    Swal.fire({
                        type: 'success',
                        title: '¡Conexión Exitosa!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ingresar'
                    }).then((result) => {
                        if(result.value)
                        {
                            window.location.href = "home.php";
                        }
                    })
                }
            }
        });
    }
});