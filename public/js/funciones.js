

//Buscar un cliente
$('#nit_cliente').keyup(function(e){
    e.preventDefault();
    let cl = $(this).val();
    var routeName = $('#formConAJAX').data('route');
    $.ajax({
        url: routeName,
        async: true,
        data: {vaina:cl},
        success:function(response){
            let data = $.parseJSON(response);
            if(response != 0){
                $('#nombreCliente').val(data.nombre);
                $('#apellidoCliente').val(data.apellidos);
                $('#direccionCliente').val(data.direccion);
                $('#telefonosCliente').val(data.telefonos);
            }else{
                $('#nombreCliente').val('');
                $('#apellidoCliente').val('');
                $('#direccionCliente').val('');
                $('#telefonosCliente').val('');
            } 
        },
        error:function(error){
        }
    });
    
});

