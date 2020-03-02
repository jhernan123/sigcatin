//aqui todo el codigo jquery de las vistas.
//<!-- Seccion de JQUERY -->
$(document).ready(function() {
    $('#edad').on('change', function() {
        var valor = $(this).val();
        $('#edadsalida').val(valor);
    });
    //para llenar el select de orientadores.
    $.ajax({
        type: 'GET',
        url: "{{route('orientador.index')}}",
        success: function(data) {
            $('select#selorientador').html(data);
        }
    });
    //llena el select de carreras o opcion de bachillerato.
    $.ajax({
        type: 'GET',
        url: "{{route('carrera.index')}}",
        success: function(data) {
            $('select#carrera').html(data);
        }
    });
    /*  $('#linkaddcarrera').click(function(){
          $('msj-hecho').fadeOut();
      });*/
    // grabar el dato y actualiza el select
    $('#guardacarrera').click(function() {
        var dato = $('#modalcarrera').val();
        var route = "{{route('carrera.store')}}";
        var token = $('#token1').val();
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            datatype: 'json',
            data: {
                modalcarrera: dato
            },
            success: function(resultado) {
                $('select#carrera').html(resultado);
                $('#modalcarrera').val('');
                $('#msj-hecho').fadeIn();
            }
        });
    });
}); //final de la funcion principal