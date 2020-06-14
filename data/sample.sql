/* 建立User, Resident, Committee信息 */
INSERT INTO User (account, username, name, sex, age, tel, type) VALUES ('312006197904164384', '张硕翔', '张硕翔', true, '41', '13127729083', 1);
INSERT INTO Committee (account, in_date, is_admin) VALUES ('312006197904164384', '20080717', false);
INSERT INTO User (account, username, name, sex, age, tel, type) VALUES ('342802194406057545', '杨一润', '杨一润', false, '76', '15027405282', 0);
INSERT INTO Resident (account, building, unit, room) VALUES ('342802194406057545', 54, 10, 903);
/* 共生成用户2个*/

/* 建立Health信息 */
INSERT INTO Health (id, account, last_date, last_time, temperature) VALUES (0, '312006197904164384', '20200216', '16:10:59', 37.4);
INSERT INTO Health (id, account, last_date, last_time, temperature) VALUES (1, '342802194406057545', '20200325', '10:14:09', 36.3);
/* 共生成病人0个 */

/* 建立News信息 */
INSERT INTO News (account, date, time, title, abstract, content, cnt, visible) VALUES('312006197904164384', '20200519', '07:48:33', 'title 0', 'abstract 0', 'content 0', 1, true);
/* 共生成新闻1个 */

/* 建立Comments信息 */
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(0, 0, 'content 0.0', '杨一润', false);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(1, 0, 'content 0.1', '杨一润', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(2, 0, 'content 0.2', '张硕翔', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(3, 0, 'content 0.3', '杨一润', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(4, 0, 'content 0.4', '张硕翔', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(5, 0, 'content 0.5', '杨一润', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(6, 0, 'content 0.6', '张硕翔', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(7, 0, 'content 0.7', '张硕翔', false);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(8, 0, 'content 0.8', '张硕翔', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(9, 0, 'content 0.9', '张硕翔', true);
/* 共生成评论10条 */

/* 建立Team信息 */
INSERT INTO Team (name, abstract, gitCnt, memCnt, days, files) VALUES ('NoCov','这里是团队介绍', 100, 5, 30, 100);

/* 建立Transaction信息 */
INSERT INTO Transactions (id, account, start_time, end_time, info, is_finished) VALUES (0, '342802194406057545', '20200212,03:06:22', '20200403,09:35:17', 'info 0', false);
/* 共生产代办事务1条 */

/* 批量生成password_hash，初值为1234 */
UPDATE User SET password_hash = '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC' WHERE account = '312006197904164384';
UPDATE User SET password_hash = '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC' WHERE account = '342802194406057545';

/* 建立PriorityType信息 */
INSERT INTO `prioritytype` (`name`, `information`) VALUES ('访问居民数据库', '允许访问居民数据库，新增、修改和删除居民信息'), ('访问职员数据库', '允许访问职员数据库，并对职员信息进行增加、删除和修改'), ('分配权限', '给职员分配权限'), ('发布公告', '查看公告，经审核后进行发布，允许删除公告'), ('编辑公告', '新增要发布的公告'), ('审核评论', '对前台在各新闻和公告中的评论进行审核，审核通过的评论才可以在前台显示'), ('追踪体温异常病例', '查看体温异常者的信息，及时与疑似病例进行联系');
