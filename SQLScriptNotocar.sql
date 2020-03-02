SELECT * FROM db_catin.voluntarios;

Create view vista_voluntarios as
select id_voluntario,estado,codigo,concepto,(select nombre from orientador where id_orientador=v.id_orientador) as id_orientador,condicion,fecha_inicio,fecha_fin,foto,nombre
,direccion,edad,correo,telefono_f,celular,dui,nit,cuenta_bancaria,(select nombre from instituciones where id_institucion=v.id_institucion) as id_institucion,
carnet,(select carrera_opcion from carreras where id=carrera_opcion) as carrera_opcion,horario,horas_requeridas,horas_realizar,contacto,parentesco,tel_contacto,
padecimiento,descripcion,created_at,updated_at from voluntarios as v;

select * from vista_voluntarios;