
$sql_alfiumic = "INSERT INTO `users` (`id`, `login`, `email`, `password`, `token`, `notify`, `verified`, `img_profile`, `creation_date`) VALUES (NULL, 'Jhon Doe', 'alessandro.fiumicelli@gmail.com', '01234Ab@', '', 'Y', 'Y', '', current_timestamp());";
$sql = "INSERT INTO `category` (`id`, `name`, `creation_date`) VALUES ('1', 'Animal', CURRENT_TIMESTAMP)";
INSERT INTO `category` (`id`, `name`, `creation_date`) VALUES ('2', 'Clothes', CURRENT_TIMESTAMP);
INSERT INTO `super` (`id`, `cat_id`, `img`, `creation_date`) VALUES (NULL, '1', 'img/super/animal/gary.png', CURRENT_TIMESTAMP);
INSERT INTO `super` (`id`, `cat_id`, `img`, `creation_date`) VALUES (NULL, '2', 'img/super/clothes/hat.png', CURRENT_TIMESTAMP);
INSERT INTO `super` (`id`, `cat_id`, `img`, `creation_date`) VALUES (NULL, '2', 'img/super/emoji/heart.png', CURRENT_TIMESTAMP)
INSERT INTO `super` (`id`, `cat_id`, `img`, `creation_date`) VALUES (NULL, '3', 'img/super/stickers/moshroom-cloud.png', CURRENT_TIMESTAMP)
