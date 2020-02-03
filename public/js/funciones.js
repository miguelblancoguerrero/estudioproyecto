

//Buscar un cliente
$('#nit_cliente').keyup(function(e){
    e.preventDefault();
    let cl = $(this).val();
    var routeName = $('#formConAJAX').data('route');
    $.ajax({
        type:'POST',
        url: routeName,
        async: true,
        data: {vaina:"XD"},
        success:function(response){
            console.log(response);
        },
        error:function(response){
            console.log(response);
        }
    });
});

