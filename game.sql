create database game;

use game;

create table background
(
    id   int auto_increment
        primary key,
    nome varchar(100) charset utf8 not null,
    acao text                      null
);

INSERT INTO game.background (id, nome, acao) VALUES (1, 'Dia', 'O dia amanheceu');
INSERT INTO game.background (id, nome, acao) VALUES (2, 'Anoitecer', 'Chegou a altura da votação*Quem será o assassino?');
INSERT INTO game.background (id, nome, acao) VALUES (3, 'Noite', 'Boa noite');

create table atual
(
    id      int auto_increment
        primary key,
    id_back int not null,
    constraint atual_ibfk_1
        foreign key (id_back) references background (id)
);

create index id_back
    on atual (id_back);

INSERT INTO game.atual (id, id_back) VALUES (1, 3);

create table role
(
    id       int auto_increment
        primary key,
    part     varchar(100) charset utf8 not null,
    objetivo text charset utf8         not null
);

INSERT INTO game.role (id, part, objetivo) VALUES (1, 'Vilão', 'Escolha quem deseja matar:');
INSERT INTO game.role (id, part, objetivo) VALUES (2, 'Detective', 'Escolha quem deseja investigar:');
INSERT INTO game.role (id, part, objetivo) VALUES (3, 'Inocente', '');

create table players
(
    id    int auto_increment
        primary key,
    nome  varchar(100) charset utf8 not null,
    role  int                       null,
    morto tinyint(1)                null,
    done  tinyint(1)                null,
    vote  int                       null,
    constraint players_nome_uindex
        unique (nome),
    constraint players_ibfk_1
        foreign key (role) references role (id)
);

create index role
    on players (role);
