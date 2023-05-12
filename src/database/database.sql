.mode columns
.headers on 
.nullvalue NULL
PRAGMA foreign_keys = ON;

drop table if exists users;

create table users(
    idUser integer primary key AUTOINCREMENT,
    email text,
    name text NOT NULL,
    username text NOT NULL,
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
    priority text
);

drop table if exists department;

create table department(
    title text primary key,
    description text
);

drop table if exists departmentUser;

create table departmentUser(
    idDepartment integer references department(idDepartment),
    idAgent integer references Agents(idAgent),

    CONSTRAINT dapartmentUser_key primary key (idDepartment, idAgent)
);

drop table if exists hashtag;

create table hashtag(
    name text primary key
);

drop table if exists hashtagticket;

create table hashtagticket(
    idHashtag text references hashtag(idhashtag),
    idticket integer references ticket(idticket),

    CONSTRAINT Hashtag_key primary key (idHashtag, idticket)
);
drop table if exists status;

create table status(
    title text primary key,
    description text
);

drop table if exists questions;

create table questions(
    idQuestion interger primary KEY,
    title text NOT NULL,
    content text NOT NULL,
    date datetime,
    idTicket integer references Ticket(idTicket)

);

drop table if exists answers;

create table answers(
    idAnswer integer primary key,
    title text NOT NULL,
    content text NOT NULL,
    idQuestion integer references Question(inQuestion)
);

drop table if exists changes;

create table changes(

    idChange integer primary KEY,
    date datetime NOT NULL,
    idTicket integer references Ticket(idTicket)

);


drop table if exists HashtagChanges;

create table HashtagChanges(
    idChange integer PRIMARY KEY references changes(idChange)
);

drop table if exists Hashtag_ChangeHashtag;

create table Hashtag_ChangeHashtag(

    name text references hashtag(name),
    idChange integer references HashtagChanges(idChange),
    CONSTRAINT HASHTAG_KEY primary key(name, idChange)
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
