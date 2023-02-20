

INSERT INTO `test_inv`.`invento_question` (`id`, `id_user`, `preg_1`, `preg_2`) VALUES (NULL, '2', 'pataleto', 'patato');

SELECT count( * ) AS c FROM `invento_question` WHERE preg_1 = 'rufo' && preg_2 = 'patu';

SELECT count( * ) AS c FROM `invento_question` WHERE id_user=1 && preg_1 = 'rufo' && preg_2 = 'patu';

SELECT count( * ) AS c
FROM `invento_question`
WHERE username = 'Obed Alvarado' && preg_1 = 'patron' && preg_2 = 'marron'



<a href="http://localhost/Sinvt_KDG/index.php" target='_blank'>