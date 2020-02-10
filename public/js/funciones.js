

//Buscar un cliente
$('#nit_cliente').keyup(function(e){
    e.preventDefault();
    let cl = $(this).val();
    var routeName = $('#formConAJAX').data('route');
    $.ajax({
        url: routeName,
        async: true,
        data: { vaina:cl },
        success:function(response){
            let data = $.parseJSON(response);
            if(response != 0){
                //Asignar los valores
                $('#nombreCliente').val(data.nombre);
                $('#apellidoCliente').val(data.apellidos);
                $('#direccionCliente').val(data.direccion);
                $('#telefonosCliente').val(data.telefonos);

                //Anular la edición de campos
                $('#nombreCliente').attr('disabled','disabled');
                $('#apellidoCliente').attr('disabled','disabled');
                $('#direccionCliente').attr('disabled','disabled');
                $('#telefonosCliente').attr('disabled','disabled');


            }else{
                $('#nombreCliente').val('');
                $('#apellidoCliente').val('');
                $('#direccionCliente').val('');
                $('#telefonosCliente').val('');

                $('#nombreCliente').removeAttr('disabled');
                $('#apellidoCliente').removeAttr('disabled');
                $('#direccionCliente').removeAttr('disabled');
                $('#telefonosCliente').removeAttr('disabled');
            } 
        },
        error:function(error){
        }
    });
    
});

