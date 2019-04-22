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




