CREATE TABLE inbox (
                       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                       theme VARCHAR(100),
                       mailer VARCHAR(50),
                       message VARCHAR (3000),
                       email VARCHAR(50)

);






CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `firstName` varchar(50) NOT NULL,
    `lastName` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `password` varchar(200) NOT NULL,
    PRIMARY KEY (`id`)
    ) DEFAULT CHARSET=utf8;