

INSERT INTO `test_inv`.`invento_question` (`id`, `id_user`, `preg_1`, `preg_2`) VALUES (NULL, '2', 'pataleto', 'patato');

SELECT count( * ) AS c FROM `invento_question` WHERE preg_1 = 'rufo' && preg_2 = 'patu';

SELECT count( * ) AS c FROM `invento_question` WHERE id_user=1 && preg_1 = 'rufo' && preg_2 = 'patu';

SELECT count( * ) AS c
FROM `invento_question`
WHERE username = 'Obed Alvarado' && preg_1 = 'patron' && preg_2 = 'marron'


Select invento_items.id, invento_items.name, invento_categories.name  from invento_categories, invento_items where invento_items.category =  invento_categories.id

Select invento_items.id, invento_items.name,( invento_categories.name) as p, invento_items.qty, invento_items.price, invento_items.descrp, invento_items.date_added  from invento_categories, invento_items where invento_items.category =  invento_categories.id


<a href="http://localhost/Sinvt_KDG/index.php" target='_blank'>