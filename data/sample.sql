/* 建立User, Resident, Committee信息 */
INSERT INTO User (account, username, name, sex, age, tel, type, auth_key) VALUES ('510824196606258009', '代炜', '代炜', true, '54', '16626844064', 0, 'yq4F50FYo90876o9w81Ln9wHESA1F987');
INSERT INTO Resident (account, building, unit, room) VALUES ('510824196606258009', 93, 9, 406);
INSERT INTO User (account, username, name, sex, age, tel, type, auth_key) VALUES ('510330193912149440', '吉馨有', '吉馨有', false, '81', '18879722088', 1, 'VFFHqt9coYN80elqo2Oit7jU8HL7XY57');
INSERT INTO Committee (account, in_date, is_admin) VALUES ('510330193912149440', '19611027', false);
/* 共生成用户2个*/

/* 建立Health信息 */
INSERT INTO Health (id, account, last_date, last_time, temperature) VALUES (1, '510824196606258009', '20200510', '07:52:53', 35.8);
INSERT INTO Health (id, account, last_date, last_time, temperature) VALUES (2, '510330193912149440', '20200221', '05:20:01', 35.4);
/* 共生成病人0个 */

/* 建立News信息 */
INSERT INTO News (account, date, time, title, abstract, content, cnt, visible) VALUES('510330193912149440', '20200417', '02:12:14', 'title 0', 'abstract 0', 'content 0', 1, true);
/* 共生成新闻1个 */

/* 建立Comments信息 */
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(1, 1, 'content 0.1', '吉馨有', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(2, 1, 'content 0.2', '吉馨有', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(3, 1, 'content 0.3', '吉馨有', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(4, 1, 'content 0.4', '代炜', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(5, 1, 'content 0.5', '代炜', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(6, 1, 'content 0.6', '吉馨有', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(7, 1, 'content 0.7', '代炜', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(8, 1, 'content 0.8', '代炜', false);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(9, 1, 'content 0.9', '代炜', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(10, 1, 'content 0.10', '吉馨有', true);
/* 共生成评论10条 */

/* 建立Team信息 */
INSERT INTO Team (name, abstract, gitCnt, memCnt, days, files) VALUES ('NoCov','两个扒数据能手，一个制造惊喜的DBA，一个全能高手，一个查缺补漏的多面手。五个人，运用过硬的信息检索能力，熟练的ctrl+c，ctrl+v能力，深入了解没有生态的yii框架，在这个信息碎片化的世界，努力为平安社区的居民们抚平疫情带来的伤痛与不安，为平安社区的职员们的高效工作提供便捷服务，让居民们第一时间掌握信息，让职员们第一时间了解社区动态。NoCov出动，使命必达！', 193, 5, 30, 6666);

/* 建立Transaction信息 */
INSERT INTO Transactions (account, start_time, end_time, info, is_finished) VALUES ('510330193912149440', '20200306,07:37:01', '20200513,11:47:43', 'info 0', false);
/* 共生产代办事务1条 */

/* 批量生成password_hash，初值为1234 */
UPDATE User SET password_hash = '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC' WHERE account = '510824196606258009';
UPDATE User SET password_hash = '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC' WHERE account = '510330193912149440';

/* 建立PriorityType信息 */
INSERT INTO `prioritytype` (`name`, `information`) VALUES ('访问居民数据库', '允许访问居民数据库，新增、修改和删除居民信息'), ('访问职员数据库', '允许访问职员数据库，并对职员信息进行增加、删除和修改'), ('分配权限', '给职员分配权限'), ('发布公告', '查看公告，经审核后进行发布，允许删除公告'), ('编辑公告', '新增要发布的公告'), ('审核评论', '对前台在各新闻和公告中的评论进行审核，审核通过的评论才可以在前台显示'), ('追踪体温异常病例', '查看体温异常者的信息，及时与疑似病例进行联系');

/* 建立TeamMember信息 */
INSERT INTO User (account, username, name, sex, type, password_hash, auth_key) VALUES ('000000000000000001', '冯杰康', '冯杰康', 1, 4, '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC', '00000000000000000000000000000001');
INSERT INTO TeamMember (account, Team_id, id, link, info, is_Leader, icon) VALUES ('000000000000000001', 1, '1813402', 'https://github.com/fengjk12138', '账号登录逻辑设计，部分框架架构，部署程序设计', false, 'https://avatars1.githubusercontent.com/u/50436440?s=460&u=8fe7623df7c62e5e2262fb68a98e7ffa5bcd23f2&v=4');
INSERT INTO User (account, username, name, sex, type, password_hash, auth_key) VALUES ('000000000000000002', '戚晓睿', '戚晓睿', 1, 4, '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC', '00000000000000000000000000000002');
INSERT INTO TeamMember (account, Team_id, id, link, info, is_Leader, icon) VALUES ('000000000000000002', 1, '1811412', 'https://github.com/NickSkyyy', 'DBA（Damaged Base Architect）', false, 'https://avatars2.githubusercontent.com/u/50016779?s=400&u=43bee48724946843fb27c6f0982c5cdcebd5dbee&v=4');
INSERT INTO User (account, username, name, sex, type, password_hash, auth_key) VALUES ('000000000000000003', '文静静', '文静静', 0, 4, '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC', '00000000000000000000000000000003');
INSERT INTO TeamMember (account, Team_id, id, link, info, is_Leader, icon) VALUES ('000000000000000003', 1, '1811507', 'https://github.com/king-wk', '前后台页面设计，体温异常人员显示页面设计', false, 'https://avatars1.githubusercontent.com/u/54944075?s=460&u=899581f4be61a8c6a2a4a95871a35a0f32368a54&v=4');
INSERT INTO User (account, username, name, sex, type, password_hash, auth_key) VALUES ('000000000000000004', '肖中遥', '肖中遥', 1, 4, '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC', '00000000000000000000000000000004');
INSERT INTO TeamMember (account, Team_id, id, link, info, is_Leader, icon) VALUES ('000000000000000004', 1, '1811444', 'https://github.com/Pixie-King', '爬取全国、世界、天津市数据并显示，实现疫情地图，后台体温分布与任务', false, 'https://avatars0.githubusercontent.com/u/54949930?s=400&u=5e28c9dd44b39bce687bba72f20a8858f0fdb98b&v=4');
INSERT INTO User (account, username, name, sex, type, password_hash, auth_key) VALUES ('000000000000000005', '麦隽韵', '麦隽韵', 0, 4, '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC', '00000000000000000000000000000005');
INSERT INTO TeamMember (account, Team_id, id, link, info, is_Leader, icon) VALUES ('000000000000000005', 1, '1811499', 'https://github.com/VitalC-3026', '社区数据库模块，新闻公告模块，个人简介', true, 'https://avatars0.githubusercontent.com/u/50989602?s=400&u=9568eeac1dee2a54e82f4882cce6b502927c79cb&v=4');
