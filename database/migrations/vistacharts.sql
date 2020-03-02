


select codigo,nombre,carrera_opcion from voluntarios order by carrera_opcion 

select carreras.carrera_opcion,count(voluntarios.carrera_opcion) as cantidad from carreras,
voluntarios where carreras.id=voluntarios.id_voluntario 
group by carreras.carrera_opcion;

create view v_voluntariosPorcarrera as
select c.carrera_opcion,count(v.carrera_opcion) as cantidad from carreras as c left join voluntarios as v
on c.id=v.carrera_opcion group by c.carrera_opcion;

select * from v_voluntariosPorcarrera;