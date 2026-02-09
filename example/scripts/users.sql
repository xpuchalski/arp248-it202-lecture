SHOW DATABASES;
CREATE DATABASE GUITAR;
SHOW CREATE DATABASE GUITAR;
CREATE USER 'ih_user'@'localhost' IDENTIFIED BY 'inventoryhelper';
GRANT SELECT, UPDATE, INSERT, DELETE ON GUITAR.* TO 'ih_user'@'localhost';
SHOW GRANTS FOR 'ih_user'@'localhost';
USE GUITAR;
CREATE TABLE guitar_users (
user_id       INT          NOT NULL AUTO_INCREMENT,
email_address VARCHAR(255) NOT NULL UNIQUE,
password      CHAR(64)     NOT NULL,
first_name    VARCHAR(60)  NOT NULL,
last_name     VARCHAR(60)  NOT NULL,
PRIMARY KEY (user_id)
);
DESCRIBE guitar_users;
INSERT INTO guitar_users
(email_address, password, first_name, last_name)
VALUES
('taylor.swift@guitars.com', SHA2('password', 256), 'taylor', 'swift');
SELECT * FROM guitar_users;