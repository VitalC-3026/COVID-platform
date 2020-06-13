/* 建立User, Resident, Committee信息 */
INSERT INTO User (account, username, name, sex, age, tel, type) VALUES ('352238192607110332', '秦薪', '秦薪', false, '94', '15808329854', 1);
INSERT INTO Committee (account, in_date, is_admin) VALUES ('352238192607110332', '19451113', false);
INSERT INTO User (account, username, name, sex, age, tel, type) VALUES ('650125197510088901', '於菲', '於菲', true, '45', '14906599619', 0);
INSERT INTO Resident (account, building, unit, room) VALUES ('650125197510088901', 35, 4, 1802);
/* 共生成用户2个*/

/* 建立Health信息 */
INSERT INTO Health (id, account, last_date, last_time, temperature) VALUES (0, '352238192607110332', '20200327', '09:34:56', 35);
INSERT INTO Health (id, account, last_date, last_time, temperature) VALUES (1, '650125197510088901', '20200217', '15:36:14', 35.5);
/* 共生成病人0个 */

/* 建立News信息 */
INSERT INTO News (id, account, date, time, title, abstract, content, cnt, visible) VALUES(0, '352238192607110332', '20200327', '08:15:38', 'title 0', 'abstract 0', 'content 0', 1, true);
/* 共生成新闻1个 */

/* 建立Comments信息 */
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(0, 0, 'content 0.0', '秦薪', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(1, 0, 'content 0.1', '於菲', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(2, 0, 'content 0.2', '秦薪', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(3, 0, 'content 0.3', '於菲', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(4, 0, 'content 0.4', '秦薪', false);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(5, 0, 'content 0.5', '於菲', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(6, 0, 'content 0.6', '於菲', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(7, 0, 'content 0.7', '秦薪', false);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(8, 0, 'content 0.8', '秦薪', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(9, 0, 'content 0.9', '秦薪', true);
/* 共生成评论10条 */

/* 建立Team信息 */
INSERT INTO Team (id, name, abstract, gitCnt, memCnt, days, files) VALUES (1, 'NoCov','这里是团队介绍', 100, 5, 30, 100);

/* 建立Transaction信息 */
INSERT INTO Transactions (id, account, start_time, end_time, info, is_finished) VALUES(0, '650125197510088901', '20200212,06:47:08', '20200221,07:27:56', 'info 0', false);
/* 共生产代办事务1条 */

/* 批量生成password_hash，初值为1234 */
UPDATE User SET password_hash = '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC' WHERE account = '352238192607110332';
UPDATE User SET password_hash = '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC' WHERE account = '650125197510088901';

/* 建立PriorityType信息 */
INSERT INTO `prioritytype` (`priority`, `name`, `information`) VALUES (0, '访问居民数据库', '允许访问居民数据库，新增、修改和删除居民信息'), (1, '访问职员数据库', '允许访问职员数据库，并对职员信息进行增加、删除和修改'), (2, '分配权限', '给职员分配权限'), (3, '发布公告', '查看公告，经审核后进行发布，允许删除公告'), (4, '编辑公告', '新增要发布的公告'), (5, '审核评论', '对前台在各新闻和公告中的评论进行审核，审核通过的评论才可以在前台显示'), (6, '追踪体温异常病例', '查看体温异常者的信息，及时与疑似病例进行联系');
