CREATE DATABASE `hw_9`;


CREATE TABLE `products`
(
    `post_id` int(10) AUTO_INCREMENT,
    `name` varchar(200) NOT NULL,
    `description` varchar(200),
    primary key (`post_id`)
)

insert into products (name, description)
values ('RBG Keyboard', 'A keyboard that lights up.');
insert into products (name, description)
values ('Apple', 'A fruit.');
