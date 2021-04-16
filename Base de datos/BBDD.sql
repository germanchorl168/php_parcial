create table persona( 
    per_tipo_doc varchar(30) not null, 
    per_id varchar(20) not null, 
    per_nombres varchar(100) not null, 
    per_apellidos varchar(100) not null,
    per_edad numeric(2) not null,
    per_email varchar(30) not null,
    per_altura float not null, 
    per_peso float not null, 
    per_imc float null, 
    primary key(per_id) 
);

insert into persona values 
    ('visa',1004842,'german','rodriuez',18,'germanch@gmail.com',1.91,80,21.93);
insert into persona values 
    ('pasaporte',95945,'diana','wilhes',19,'dianaw@gmail.com',1.69,68,23.85);
insert into persona values 
    ('Cedula de Ciudadania',093862623,'ivan','jaimes',18,'ivanj@gmail.com',1.78, 80,25.8);
insert into persona values 
    ('Visa',3473848,'didier','mantia',30,' didie@gmail.com', 1.69, 80,28.57);
insert into persona values 
    ('Visa',3473848,'daniel','ordo',30,' daniel@gmail.com', 1.69, 80,28.57);
