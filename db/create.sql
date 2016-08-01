
CREATE TABLE `t_vote` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(32) NOT NULL,
 `desc` varchar(256) NOT NULL,
 PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE `t_vote_item` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `vote_id` int(11) NOT NULL,
 `option` varchar(32) NOT NULL,
 `op_desc` varchar(256) NOT NULL,
 `order` int(11) NOT NULL,
 `count` int(11) NOT NULL,
 PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;
