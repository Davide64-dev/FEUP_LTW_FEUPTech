.mode columns
.headers on 
.nullvalue NULL
PRAGMA foreign_keys = ON;

drop table if exists users;

create table users(
    idUser integer primary key AUTOINCREMENT,
    email text UNIQUE,
    name text NOT NULL,
    username text UNIQUE NOT NULL,
    password text NOT NULL
);

drop table if exists admins;

create table admins(

    idAdmin text primary key references users(idUser)

);

drop table if exists clients;

create table clients(
    idClient text primary key references users(idUser)
);

drop table if exists agents;

create table agents(
    idAgent text primary key references clients(idClient)
);

drop table if exists tickets;

create table tickets(

    idTicket integer primary key AUTOINCREMENT,
    title text NOT NULL,
    description text,
    status text references Status(title),
    idAgent text references Agents(idAgent),
    idClient text references Clients(idClient),
    department text references department(title),
    priority text,
    hashtag text,
    date datetime
);

drop table if exists department;

create table department(
    title text primary key,
    description text
);

drop table if exists departmentUser;
create table departmentUser(
    idDepartment integer references department(title),
    idAgent integer references Agents(idAgent),

    CONSTRAINT dapartmentUser_key primary key (idDepartment, idAgent)
);


drop table if exists inquiries;

create table inquiries(
    idInquirie integer primary key AUTOINCREMENT,
    content text NOT NULL,
    date date,
    idUser integer references users(idUser),
    idTicket integer references Ticket(idTicket)
);


drop table if exists changes;

create table changes(

    idChange integer primary KEY AUTOINCREMENT,
    date datetime NOT NULL,
    idTicket integer references Ticket(idTicket)

);


drop table if exists HashtagChanges;

create table HashtagChanges(
    idChange integer PRIMARY KEY references changes(idChange),
    oldHashtag text
);

drop table if exists DescriptionChange;

create table DescriptionChange(

    idChange integer PRIMARY key references change(idChange),
    oldDescription text
);

drop table if exists DepartmentChange;

create table DepartmentChange(

    idChange integer primary key references change(idChange),
    idOldDepartment integer references Department(idDepartment)
    
);

drop table if exists AgentChange;

create table AgentChange(
    idChange integer primary key references change(idChange),
    idOldAgent integer references Agent(idAgent)
);


INSERT INTO department (title, description)
VALUES ('Marketing', 'Responsible for promoting the company and its products.');

INSERT INTO department (title, description)
VALUES ('Finance', 'Handles financial operations and budgeting.');

INSERT INTO department (title, description)
VALUES ('Human Resources', 'Manages employee relations and recruitment.');

INSERT INTO department (title, description)
VALUES ('Operations', 'Oversees day-to-day business activities.');

INSERT INTO department (title, description)
VALUES ('IT', 'Manages technology infrastructure and systems.');

INSERT INTO department (title, description)
VALUES ('Sales', 'Responsible for driving sales and revenue generation.');


INSERT INTO USERS (idUser, email, name, username, password)
VALUES (1, 'alanturing@hotmail.com', 'Alan, Turing', 'alan_turing', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');
-- password: password

INSERT INTO ADMINS VALUES(1);

INSERT INTO USERS (idUser, email, name, username, password)
VALUES (2, 'gracehopper@hotmail.com', 'Grace Hopper', 'grace_hopper', '7c4a8d09ca3762af61e59520943dc26494f8941b');
-- password: 123456

INSERT INTO ADMINS VALUES(2);

INSERT INTO USERS (idUser, email, name, username, password)
VALUES (3, 'adalovelace@hotmail.com', 'Ada Lovelace', 'ada_lovelace', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');
-- password: qwerty

INSERT INTO ADMINS VALUES(3);


INSERT INTO USERS (idUser, email, name, username, password)
VALUES (4, 'laramarques@hotmail.com', 'Lara Marques', 'laramarques', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');
-- password: 123

INSERT INTO CLIENTS VALUES(4);
INSERT INTO AGENTS VALUES(4);



INSERT INTO USERS (idUser, email, name, username, password)
Values (5, 'nessavanessa@hotmail.com', 'Vanessa Nessa', 'nessavanessa', 'a74b2c06d3b3845788dcb0f4900db823afa8f91a');
-- password: notapass

INSERT INTO CLIENTS VALUES(5);
INSERT INTO AGENTS VALUES(5);

INSERT INTO USERS (idUser, email, name, username, password)
VALUES (6, 'manelbarbosa@hotmail.com', 'Manel Barbosa','manelbarbosa', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');
-- password: qwerty

INSERT INTO CLIENTS VALUES(6);
INSERT INTO AGENTS VALUES(6);



INSERT INTO USERS (idUser, email, name, username, password)
VALUES 
    (7, 'john.doe@hotmail.com', 'John Doe', 'johndoe', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
    (8, 'jane.smith@hotmail.com', 'Jane Smith', 'janesmith', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
    (9, 'mike.johnson@hotmail.com', 'Mike Johnson', 'mikejohnson', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

-- password: password

INSERT INTO CLIENTS VALUES(7);
INSERT INTO CLIENTS VALUES(8);
INSERT INTO CLIENTS VALUES(9);

INSERT INTO DEPARTMENTUSER VALUES('Marketing', 4);
INSERT INTO DEPARTMENTUSER VALUES('Finance', 4);
INSERT INTO DEPARTMENTUSER VALUES('IT', 4);

INSERT INTO DEPARTMENTUSER VALUES('Human Resources', 5);
INSERT INTO DEPARTMENTUSER VALUES('Operations', 5);
INSERT INTO DEPARTMENTUSER VALUES('IT', 5);

INSERT INTO DEPARTMENTUSER VALUES('IT', 6);
INSERT INTO DEPARTMENTUSER VALUES('Sales', 6);