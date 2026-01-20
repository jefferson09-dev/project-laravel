create table user(
    id BIGINT auto_inclement,
    primary (id),
    email varchar(80),
    senhas varchar(250),
    active boolean dafault false
) engine=InnoDB default charset=utf8mb4;