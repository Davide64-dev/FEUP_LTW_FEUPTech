.mode columns
.headers on 
.nullvalue NULL
PRAGMA foreign_keys = ON;

drop table if exists users;

create table users(
    email text primary KEY,
    name text NOT NULL,
    username text NOT NULL,
    password text NOT NULL
);

drop table if exists admins;

create table admins(

    email text primary key references users(email)

);

drop table if exists clients;

create table clients(
    email text primary key references users(email)
);

drop table if exists agents;

create table agents(
    email text primary key references clients(email),
    idDepartment integer references department(idDepartment)
);

drop table if exists tickets;

create table tickets(

    idTicket integer primary key,
    title text NOT NULL,
    description text,
    status text references Status(title),
    emailAgent text references Agent(email),
    idDepartment integer references department(idDepartment)
);

drop table if exists department;

create table department(
    title text primary key,
    description text
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