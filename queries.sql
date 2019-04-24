INSERT INTO categories
SET name = 'Доски и лыжи';

INSERT INTO categories
SET name = 'Крепления';

INSERT INTO categories
SET name = 'Ботинки';

INSERT INTO categories
SET name = 'Одежда';

INSERT INTO categories
SET name = 'Инструменты';

INSERT INTO categories
SET name = 'Разное';

-- Переделать на mass insert

-- 1) Переделать на insert into table (fields) values (values1), (values2)
-- 2) По аналогии с предыдущщим

INSERT INTO lots
SET categories_id = '1', userdata_id = '1', bets_id = '2', name = '2014 Rossignol District Snowboard', path = '/img/lot-1.jpg', startprice = '10999',
 description = 'Описание лота', statuslot = 'open' ;

INSERT INTO lots
SET categories_id = '1', userdata_id = '1', bets_id = '3', name = '2014 Rossignol District Snowboard', path = '/img/lot-2.jpg', startprice = '159999',
 description = 'Описание лота', statuslot = 'close' ;

INSERT INTO lots
SET  categories_id = '2', userdata_id = '2', bets_id = '1', name = 'Крепления Unlon Contact Pro 2015 года размер L/XL', path = '/img/lot-3.jpg', startprice = '8000',
 description = 'Описание лота', statuslot = 'open' ;

INSERT INTO lots
SET categories_id = '3', userdata_id = '3', bets_id = '1', name = 'Ботинки', path = '/img/lot-4.jpg', startprice = '109999',
 description = 'Описание лота', statuslot = 'close' ;

INSERT INTO lots
SET categories_id = '4', userdata_id = '2', bets_id = '1', name = 'Куртка для сноуборда', path = '/img/lot-5.jpg', startprice = '7500',
 description = 'Описание лота', statuslot = 'open' ;

INSERT INTO lots
SET categories_id = '6', userdata_id = '2', bets_id = '3', name = 'Маска Oakley', path = 'img/lot-6.jpg', startprice = '5400',
 description = 'Описание лота', statuslot = 'close' ;


INSERT INTO userdata
SET lots_id = '2', bets_id = '3', email = 'ignat.v@gmail.com', name = 'Игнат', password = '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', avat_path = ' ';

INSERT INTO userdata
SET lots_id = '1', bets_id = '2', email = 'kitty_93@li.ru', name = 'Леночка', password = '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', avat_path = ' ';

INSERT INTO userdata
SET lots_id = '4', bets_id = '1', email = 'warrior07@mail.ru', name = 'Руслан', password = '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', avat_path = ' ';


INSERT INTO bets
SET userdata_id = '3', lots_id = '4', name = 'Руслан', price = '11500', time = '(''-'' . rand(1, 50) . '' minute'')';

INSERT INTO bets
SET userdata_id = '1', lots_id = '1', name = 'Игнат', price = '10500', time = '(''-'' . rand(25, 50) . '' hour'')';

INSERT INTO bets
SET userdata_id = '2', lots_id = '3', name = 'Леночка', price = '10000', time = '(''last week'')';

/*
получить все категории
*/
SELECT name FROM categories; -- select id, [fields]

/*
 получить самые новые, ОТКРЫТЫЕ лоты. Каждый лот должен включать НАЗВАНИЕ, СТАРТОВУЮ ЦЕНУ, ССЫЛКУ НА ИЗОБРАЖЕНИЕ, ЦЕНУ, КОЛЛИЧЕСТВО СТАВОК, НАЗВАНИЕ КАТЕГОРИИ

*/

SELECT l.name, startprice, path, b.price, c.name  FROM lots l
JOIN categories c ON l.categories_id = c.id
JOIN bets b ON b.id = l.bets_id
WHERE l.statuslot = 'open'

/*
показать лот по его id. Получите также название категории к которой принадлежит лот
*/

SELECT c.name, categories_id, userdata_id, bets_id, l.name, path, startprice, description, statuslot FROM lots l
JOIN categories c ON l.categories_id = c.+
WHERE l.id = 4 ;

/*
Обновить название лота по его индефикатору
*/

UPDATE lots SET name = 'Обновленное название'
WHERE id = 1;

/*
Получите список самых свежих ставок для лота
*/

SELECT b.price FROM lots l
JOIN bets b ON l.id = b.lots_id
WHERE l.id = 1;


