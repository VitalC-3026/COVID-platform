/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2020/6/11 10:00:47                           */
/*==============================================================*/


drop table if exists Comments;

drop table if exists Committee;

drop table if exists Health;

drop table if exists HealthCard;

drop table if exists News;

drop table if exists PriorityList;

drop table if exists PriorityType;

drop table if exists Resident;

drop table if exists TrackIn;

drop table if exists User;

drop table if exists Visitor;

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
   in_date              date,
   is_admin             bool,
   primary key (account)
);

/*==============================================================*/
/* Table: Health                                                */
/*==============================================================*/
create table Health
(
   id                   varchar(10) not null,
   last_date            date,
   last_time            time,
   temperature          float,
   primary key (id)
);

/*==============================================================*/
/* Table: HealthCard                                            */
/*==============================================================*/
create table HealthCard
(
   account              char(18) not null,
   id                   varchar(10) not null,
   primary key (account, id)
);

/*==============================================================*/
/* Table: News                                                  */
/*==============================================================*/
create table News
(
   id                   int not null,
   account              char(18) not null,
   date                 date,
   time                 time,
   title                varchar(50),
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
   priority             int not null,
   primary key (account, priority)
);

/*==============================================================*/
/* Table: PriorityType                                          */
/*==============================================================*/
create table PriorityType
(
   priority             int not null,
   name                 varchar(4),
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
/* Table: TrackIn                                               */
/*==============================================================*/
create table TrackIn
(
   identity             char(18) not null,
   date                 date,
   time                 time,
   temperature          float,
   primary key (identity)
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

/*==============================================================*/
/* Table: Visitor                                               */
/*==============================================================*/
create table Visitor
(
   identity             char(18) not null,
   name                 varchar(10),
   sex                  bool,
   age                  int,
   tel                  varchar(11),
   primary key (identity)
);

alter table Comments add constraint FK_Commentary foreign key (New_id)
      references News (id) on delete restrict on update restrict;

alter table Committee add constraint FK_isA_committee foreign key (account)
      references User (account) on delete restrict on update restrict;

alter table HealthCard add constraint FK_HealthCard_id foreign key (id)
      references Health (id) on delete restrict on update restrict;

alter table HealthCard add constraint FK_HealthCard_account foreign key (account)
      references User (account) on delete restrict on update restrict;

alter table News add constraint FK_Publish_account foreign key (account)
      references Committee (account) on delete restrict on update restrict;

alter table PriorityList add constraint FK_PriorityList_priority foreign key (priority)
      references PriorityType (priority) on delete restrict on update restrict;

alter table PriorityList add constraint FK_PriorityList_account foreign key (account)
      references User (account) on delete restrict on update restrict;

alter table Resident add constraint FK_isA_resident foreign key (account)
      references User (account) on delete restrict on update restrict;

alter table TrackIn add constraint FK_TrackIn_identity foreign key (identity)
      references Visitor (identity) on delete restrict on update restrict;

