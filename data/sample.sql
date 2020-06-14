/* 建立User, Resident, Committee信息 */
INSERT INTO User (account, username, name, sex, age, tel, type) VALUES ('213261198904115392', '安雨帆', '安雨帆', false, '31', '18436834185', 1);
INSERT INTO Committee (account, in_date, is_admin) VALUES ('213261198904115392', '20190716', false);
INSERT INTO User (account, username, name, sex, age, tel, type) VALUES ('134957195408299657', '安家', '安家', true, '66', '19614430931', 0);
INSERT INTO Resident (account, building, unit, room) VALUES ('134957195408299657', 92, 2, 2104);
/* 共生成用户2个*/

/* 建立Health信息 */
INSERT INTO Health (account, last_date, last_time, temperature) VALUES ('213261198904115392', '20200206', '04:49:57', 36.2);
INSERT INTO Health (account, last_date, last_time, temperature) VALUES ('134957195408299657', '20200508', '19:59:20', 35.4);
/* 共生成病人0个 */

/* 建立News信息 */
INSERT INTO News (account, date, time, title, abstract, content, cnt, visible) VALUES('213261198904115392', '20200519', '01:12:27', 'title 0', 'abstract 0', 'content 0', 1, true);
/* 共生成新闻1个 */

/* 建立Comments信息 */
INSERT INTO Comments (New_id, content, author, visible) VALUES(0, 'content 0.0', '安雨帆', true);
INSERT INTO Comments (New_id, content, author, visible) VALUES(0, 'content 0.1', '安家', true);
INSERT INTO Comments (New_id, content, author, visible) VALUES(0, 'content 0.2', '安家', true);
INSERT INTO Comments (New_id, content, author, visible) VALUES(0, 'content 0.3', '安雨帆', false);
INSERT INTO Comments (New_id, content, author, visible) VALUES(0, 'content 0.4', '安雨帆', true);
INSERT INTO Comments (New_id, content, author, visible) VALUES(0, 'content 0.5', '安雨帆', false);
INSERT INTO Comments (New_id, content, author, visible) VALUES(0, 'content 0.6', '安家', true);
INSERT INTO Comments (New_id, content, author, visible) VALUES(0, 'content 0.7', '安家', false);
INSERT INTO Comments (New_id, content, author, visible) VALUES(0, 'content 0.8', '安家', true);
INSERT INTO Comments (New_id, content, author, visible) VALUES(0, 'content 0.9', '安家', true);
/* 共生成评论10条 */

/* 建立Team信息 */
INSERT INTO Team (name, abstract, gitCnt, memCnt, days, files) VALUES ('NoCov','这里是团队介绍', 100, 5, 30, 100);

/* 建立Transaction信息 */
INSERT INTO Transactions (account, start_time, end_time, info, is_finished) VALUES ('134957195408299657', '20200425,02:53:46', '20200528,02:14:12', 'info 0', false);
/* 共生产代办事务1条 */

/* 批量生成password_hash，初值为1234 */
UPDATE User SET password_hash = '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC' WHERE account = '213261198904115392';
UPDATE User SET password_hash = '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC' WHERE account = '134957195408299657';

/* 建立PriorityType信息 */
INSERT INTO `prioritytype` (`name`, `information`) VALUES ('访问居民数据库', '允许访问居民数据库，新增、修改和删除居民信息'), ('访问职员数据库', '允许访问职员数据库，并对职员信息进行增加、删除和修改'), ('分配权限', '给职员分配权限'), ('发布公告', '查看公告，经审核后进行发布，允许删除公告'), ('编辑公告', '新增要发布的公告'), ('审核评论', '对前台在各新闻和公告中的评论进行审核，审核通过的评论才可以在前台显示'), ('追踪体温异常病例', '查看体温异常者的信息，及时与疑似病例进行联系');
