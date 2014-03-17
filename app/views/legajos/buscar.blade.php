<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Buscar legajos </title>
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::script('js/jquery-1.11.0.min.js') }}
    </head>
    <body>
        <div class="container">
            <h1> Buscar legajos </h1>
            <div class="row">
                <div class="col-lg-4">
                    {{ Form::open(array('onsubmit' => 'return false', 'id' => 'formulario_busqueda')) }}
                    {{ Form::label ('legajo', 'Legajo') }}
                    {{ Form::text ('legajo', '') }}
                    {{ Form::submit('Buscar', array('class' => 'btn btn-success')) }}
                    {{ Form::close() }}
                </div>
                <div id="respuesta" class="col-lg-5">
                </div>
            </div>
        </div>
        <script type="text/javascript">
            (function() {
                $("#formulario_busqueda").submit(function() {
                    $.ajax({
                        url: '/legajos/buscar',
                        type: 'POST',
                        data: {legajo: $("#legajo").val()},
                        dataType: 'JSON',
                        beforeSend: function() {
                            $("#respuesta").html('Buscando empleado...');
                        },
                        error: function() {
                            $("#respuesta").html('<div> Ha surgido un error. </div>');
                        },
                        success: function(respuesta) {
                            if (respuesta) {
                                var html = '<div>';
                                html += '<ul>';
                                html += '<li> Legajo: ' + respuesta.legajo + ' </li>';
                                html += '<li> Nombre: ' + respuesta.nombre + ' </li>';
                                html += '<li> Apellido: ' + respuesta.apellido + ' </li>';
                                html += '<li> Area: ' + respuesta.area + ' </li>';
                                html += '</ul>';
                                html += '</div>';
                                $("#respuesta").html(html);
                            } else {
                                $("#respuesta").html('<div> No hay ningún empleado con ese legajo. </div>');
                            }
                        }
                    });
                    $("#legajo").val('');
                });
            }).call(this);
        </script>
    </body>
</html>