/* 建立User, Resident, Committee信息 */
INSERT INTO User (account, username, name, sex, age, tel, type, auth_key) VALUES ('613484196811251429', '钟睿毅', '钟睿毅', true, '52', '15674241369', 1, 'CRTXea82f3u37G76R70eS3S54fPBOHQv');
INSERT INTO Committee (account, in_date, is_admin) VALUES ('613484196811251429', '19871117', false);
INSERT INTO User (account, username, name, sex, age, tel, type, auth_key) VALUES ('71054819241203781X', '晁泽萱', '晁泽萱', false, '96', '14975965337', 0, 'CLdb4bQr4CK4N3tXQrp58zg0v3Oqs0R5');
INSERT INTO Resident (account, building, unit, room) VALUES ('71054819241203781X', 47, 9, 1904);
/* 共生成用户2个*/

/* 建立Health信息 */
INSERT INTO Health (id, account, last_date, last_time, temperature) VALUES (1, '613484196811251429', '20200521', '22:23:17', 36.6);
INSERT INTO Health (id, account, last_date, last_time, temperature) VALUES (2, '71054819241203781X', '20200209', '21:23:18', 37.1);
/* 共生成病人0个 */

/* 建立News信息 */
INSERT INTO News (account, date, time, title, abstract, content, cnt, visible) VALUES('613484196811251429', '20200206', '07:46:01', 'title 0', 'abstract 0', 'content 0', 1, true);
/* 共生成新闻1个 */

/* 建立Comments信息 */
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(1, 1, 'content 0.1', '晁泽萱', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(2, 1, 'content 0.2', '钟睿毅', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(3, 1, 'content 0.3', '钟睿毅', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(4, 1, 'content 0.4', '晁泽萱', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(5, 1, 'content 0.5', '晁泽萱', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(6, 1, 'content 0.6', '晁泽萱', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(7, 1, 'content 0.7', '晁泽萱', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(8, 1, 'content 0.8', '钟睿毅', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(9, 1, 'content 0.9', '钟睿毅', true);
INSERT INTO Comments (id, New_id, content, author, visible) VALUES(10, 1, 'content 0.10', '钟睿毅', false);
/* 共生成评论10条 */

/* 建立Team信息 */
INSERT INTO Team (name, abstract, gitCnt, memCnt, days, files) VALUES ('NoCov','这里是团队介绍', 100, 5, 30, 100);

/* 建立Transaction信息 */
INSERT INTO Transactions (id, account, start_time, end_time, info, is_finished) VALUES (1, '71054819241203781X', '20200420,22:04:31', '20200428,23:46:37', 'info 0', false);
/* 共生产代办事务1条 */

/* 批量生成password_hash，初值为1234 */
UPDATE User SET password_hash = '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC' WHERE account = '613484196811251429';
UPDATE User SET password_hash = '$2y$13$dg4FlrrcXjMmvWznC3XUhehaTTZ/xfKXNpEYbSt8o3Q/9b9xonHLC' WHERE account = '71054819241203781X';

/* 建立PriorityType信息 */
INSERT INTO `prioritytype` (`name`, `information`) VALUES ('访问居民数据库', '允许访问居民数据库，新增、修改和删除居民信息'), ('访问职员数据库', '允许访问职员数据库，并对职员信息进行增加、删除和修改'), ('分配权限', '给职员分配权限'), ('发布公告', '查看公告，经审核后进行发布，允许删除公告'), ('编辑公告', '新增要发布的公告'), ('审核评论', '对前台在各新闻和公告中的评论进行审核，审核通过的评论才可以在前台显示'), ('追踪体温异常病例', '查看体温异常者的信息，及时与疑似病例进行联系');
