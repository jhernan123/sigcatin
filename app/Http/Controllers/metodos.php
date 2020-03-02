<?php

function veralerta($codigo = null)
{



  //codigos de mensajes
    switch ($codigo) {
         case '1':
            $msj['visible'] = 1;
            $msj['tipo']    = 1;
            $msj['mensaje'] = 'Datos guardados exitosamente!!';
            break;
         case '0':
            $msj['visible'] = 1;
            $msj['tipo']    = 3;
            $msj['mensaje'] = 'Los datos no pudieron ser guardados!!';
                break;
          default:
            $msj['visible'] = 0;
            $msj['tipo']    = 0;  
            $msj['mensaje'] = null;   
    }

    $visible = $msj['visible'];
    $tipo    = $msj['tipo'];
    $mensaje = $msj['mensaje'];

    /* if (!$mensaje) {
    $mensaje = 'No hay mensaje definido';
    }*/

    switch ($visible) {
        case 0:
            $ver = "display:none";
            break;
        case 1:
            $ver = "display";
            break;
        default:
            $ver = "display:none";
            break;
    }

    switch ($tipo) {
        /* Opciones
        0 : alert-success
        1 : alert-info
        2 : alert-warning
        3 : alert-danger
         */
        case 0:
            $t = 'alert-success';
            break;
        case 1:
            $t = 'alert-info';
            break;
        case 2:
            $t = 'alert-warning';
            break;
        case 3:
            $t = 'alert-danger';
            break;

        default:
            $t = 'alert-success';
            break;
    }

    $datos = array('alerta' => $mensaje, 'tipo_alerta' => $t, 'alertvisible' => $ver);
    return $datos;

}

function datosnull($fotodefault=null)
{
    //default datos
    $datos = array(
        'id_voluntario'    => null,
        'estado'           => null,
        'codigo'           => null,
    //    'categoria'        => null,
        'concepto'         => null,
        'id_orientador'    => null,
        'condicion'        => null,
        'fecha_inicio'     => null,
        'fecha_fin'        => null,
        'nombre'           => null,
        'direccion'        => null,
        'edad'             => 18,
        'correo'           => null,
        'telefono_f'       => null,
        'celular'          => null,
        'dui'              => null,
    //    'nit'              => null,
        'cuenta_bancaria'  => null,
        'id_institucion'   => null,
        'carnet'           => null,
        'carrera_opcion'   => null,
        'horario'          => null,
        'horas_requeridas' => null,
        'horas_realizar'   => null,
        'contacto'         => null,
        'parentesco'       => null,
        'tel_contacto'     => null,
        'padecimiento'     => null,
        'descripcion'      => null,
        'f_nacimiento'     => null,
        'sexo'             => null,
        'foto'             => $fotodefault
    );
    return $datos;
}
