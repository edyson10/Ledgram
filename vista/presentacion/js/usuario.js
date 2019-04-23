$("#formActualizar").validate({

        rules:
        {
            actualizarNombre: { required: true },
            actualizarCorreo: { required: true },
            actualizarUsuario: { required: true }
        },
        messages:
        {
            actualizarNombre: { required: '<p style="color:red;">✘</p>' },
            actualizarCorreo: { required: '<p style="color:red;">✘</p>' },
            actualizarUsuario: { required: '<p style="color:red;">✘</p>' }
        },

        submitHandler: function () {

            var datos = {
                actualizarId: $("#actualizarId").val(),
                actualizarNombre: $("#actualizarNombres").val(),
                actualizarCorreo: $("#actualizarCorreo").val(),
                actualizarUsuario: $("#actualizarUsuario").val()
            }

            $.ajax({
                url: 'vista/modulos/Ajax.php',
                method: 'post',
                data: datos,
                dataType: "json",

                beforeSend: function () {
                    respuestaInfoEspera("Espera un momento por favor.");
                },

                success: function (respuesta) {
                    if (respuesta["exito"]) {
                        ingresoExitoso("Exito!", "Se actualizarón sus datos");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error!", "Ocurrio un Error");
                    }
                },

                error: function (jqXHR, estado, error) {
                    console.log(estado);
                    console.log(error);
                    console.log(jqXHR);
                }
            });

        }

    });