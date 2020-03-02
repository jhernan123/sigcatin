v_volunt_institucionselect * from instituciones;

create view v_volunt_institucion as
select i.id_institucion,i.nombre, count(v.id_institucion) as cantidad_voluntarios from 
instituciones as i 
left join 
voluntarios as v
on i.id_institucion=v.id_institucion
group by i.nombre ;

select * from v_volunt_institucion;