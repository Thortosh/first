CREATE DATABASE yeti
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE yeti;



CREATE TABLE categories (
id  INT AUTO_INCREMENT PRIMARY KEY,
name CHAR(100)
);
CREATE UNIQUE INDEX name ON categories(name);


CREATE TABLE lots (
id  INT AUTO_INCREMENT PRIMARY KEY,
categories_id INT,
userdata_id INT,
bets_id INT,
title CHAR(100),
name CHAR(100),
path CHAR(225),
price INT UNSIGNED,
description text
status CHAR(100)
);
CREATE UNIQUE INDEX path ON lots(path);


CREATE TABLE userdata (
id  INT AUTO_INCREMENT PRIMARY KEY,
lots_id INT,
bets_id INT,
email CHAR(255),
name CHAR(255),
password CHAR(64),
dt_add DATETIME(0),
avat_path CHAR(255)
);
CREATE UNIQUE INDEX email ON userdata(email);


CREATE TABLE bets (
id  INT AUTO_INCREMENT PRIMARY KEY,
userdata_id INT,
lots_id INT,
name CHAR(255),
price int UNSIGNED,
time CHAR(64)
);
CREATE UNIQUE INDEX price ON bets(price);


____________________________________________

-- Переделать на mass insert

-- 1) Переделать на insert into table (fields) values (values1), (values2)
-- 2) По аналогии с предыдущщим


CREATE TABLE lotstest (
id  INT AUTO_INCREMENT PRIMARY KEY,
categories_id INT,
userdata_id INT,
bets_id INT,
name CHAR(100),
path CHAR(225),
startprice CHAR(225),
description text,
statuslot CHAR(100)
);
CREATE UNIQUE INDEX path ON lotstest(path);

INSERT INTO lotstest (categories_id, userdata_id, bets_id, name, path, startprice, description, statuslot)
VALUES
('1','1','2','2014 Rossignol District Snowboard','/img/lot-1.jpg','10999', 'Описание лота', 'open'),
('1','1','2','2014 Rossignol District Snowboard','/img/lot-2.jpg','10999', 'Описание лота', 'open'),
('1','1','3','Крепления Unlon Contact Pro 2015 года размер L/XL','/img/lot-3.jpg','159999', 'Описание лота', 'close'),
('2','2','2','Ботинки','/img/lot-4.jpg','8000', 'Описание лота', 'open'),
('3','3','1','Куртка для сноуборда','/img/lot-5.jpg','109000', 'Описание лота', 'close'),
('4','2','1','Маска Oakley','/img/lot-6.jpg','7500', 'Описание лота', 'open');




CREATE TABLE categoriestest (
id  INT AUTO_INCREMENT PRIMARY KEY,
name CHAR(100)
);
CREATE UNIQUE INDEX name ON categoriestest(name);

INSERT INTO categoriestest (name)
VALUE
('Доски и лыжи'),
('Крепления'),
('Ботинки'),
('Одежда'),
('Инструменты'),
('Разное');

