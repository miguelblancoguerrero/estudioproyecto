

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
            console.log(response);
        }
    });
    
});

