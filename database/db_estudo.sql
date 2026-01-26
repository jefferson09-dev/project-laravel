-- banco de dados de estudos
-- tablea users
create table users(
    id BIGINT auto_increment,
    primary key (id),
    email varchar(80),
    senhas varchar(250),
    active boolean default false
) engine=InnoDB default charset=utf8mb4;