CREATE table `users`(
    Id INT(10) not null AUTO_INCREMENT PRIMARY KEY,
    Name varchar(50) not null,
    Family varchar(50) not null,
    Email varchar(50) not null,
    PhoneNumber varchar(50) not null,
    Age int(3),
    CreatedAt timestamp not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_persian_ci;
