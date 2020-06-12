/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2020/6/12 18:34:31                           */
/*==============================================================*/


drop table if exists Comments;

drop table if exists Committee;

drop table if exists Health;

drop table if exists News;

drop table if exists PriorityList;

drop table if exists PriorityType;

drop table if exists Resident;

drop table if exists Team;

drop table if exists TeamMember;

drop table if exists Transactions;

drop table if exists User;

/*==============================================================*/
/* Table: Comments                                              */
/*==============================================================*/
create table Comments
(
   id                   int not null,
   New_id               int not null,
   content              text,
   author               varchar(10),
   visible              bool,
   primary key (id)
);

/*==============================================================*/
/* Table: Committee                                             */
/*==============================================================*/
create table Committee
(
   account              char(18) not null,
   id                   int not null,
   in_date              date,
   is_admin             bool,
   primary key (account, id)
);

/*==============================================================*/
/* Table: Health                                                */
/*==============================================================*/
create table Health
(
   id                   int not null,
   account              char(18) not null,
   last_date            date,
   last_time            time,
   temperature          float,
   primary key (id)
);

/*==============================================================*/
/* Table: News                                                  */
/*==============================================================*/
create table News
(
   id                   int not null,
   account              char(18) not null,
   Com_id               int not null,
   date                 date,
   time                 time,
   title                varchar(100),
   abstract             text,
   content              text,
   link                 varchar(50),
   cnt                  int,
   visible              bool,
   primary key (id)
);

/*==============================================================*/
/* Table: PriorityList                                          */
/*==============================================================*/
create table PriorityList
(
   account              char(18) not null,
   id                   int not null,
   priority             int not null,
   primary key (account, id, priority)
);

/*==============================================================*/
/* Table: PriorityType                                          */
/*==============================================================*/
create table PriorityType
(
   priority             int not null,
   name                 varchar(20),
   information          text,
   primary key (priority)
);

/*==============================================================*/
/* Table: Resident                                              */
/*==============================================================*/
create table Resident
(
   account              char(18) not null,
   building             int,
   unit                 int,
   room                 int,
   primary key (account)
);

/*==============================================================*/
/* Table: Team                                                  */
/*==============================================================*/
create table Team
(
   id                   int not null,
   name                 varchar(20),
   abstract             text,
   gitCnt               int,
   memCnt               int,
   days                 int,
   files                int,
   primary key (id)
);

/*==============================================================*/
/* Table: TeamMember                                            */
/*==============================================================*/
create table TeamMember
(
   account              char(18) not null,
   id                   char(7) not null,
   link                 varchar(100),
   info                 text,
   is_Leader            bool,
   primary key (account, id)
);

/*==============================================================*/
/* Table: Transactions                                          */
/*==============================================================*/
create table Transactions
(
   id                   int not null,
   account              char(18) not null,
   start_time           datetime,
   end_time             datetime,
   info                 text,
   is_finished          bool,
   primary key (id)
);

/*==============================================================*/
/* Table: User                                                  */
/*==============================================================*/
create table User
(
   account              char(18) not null,
   password_hash        char(60),
   username             varchar(10),
   auth_key             char(32),
   name                 varchar(10),
   sex                  bool,
   age                  int,
   tel                  varchar(11),
   type                 int,
   primary key (account)
);

alter table Comments add constraint FK_Commentary foreign key (New_id)
      references News (id) on delete restrict on update restrict;

alter table Committee add constraint FK_isA_committee foreign key (account)
      references User (account) on delete restrict on update restrict;

alter table Health add constraint FK_HealthCard foreign key (account)
      references User (account) on delete restrict on update restrict;

alter table News add constraint FK_Publish_account foreign key (account, Com_id)
      references Committee (account, id) on delete restrict on update restrict;

alter table PriorityList add constraint FK_PriorityList_account foreign key (account, id)
      references Committee (account, id) on delete restrict on update restrict;

alter table PriorityList add constraint FK_PriorityList_priority foreign key (priority)
      references PriorityType (priority) on delete restrict on update restrict;

alter table Resident add constraint FK_isA_resident foreign key (account)
      references User (account) on delete restrict on update restrict;

alter table TeamMember add constraint FK_isA foreign key (account)
      references User (account) on delete restrict on update restrict;

alter table Transactions add constraint FK_affair foreign key (account)
      references User (account) on delete restrict on update restrict;

