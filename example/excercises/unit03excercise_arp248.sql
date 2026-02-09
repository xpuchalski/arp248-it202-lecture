CREATE DATABASE exercise_arp248;

CREATE USER 'ex_user'@'localhost' IDENTIFIED BY 'IT202Exercises';

GRANT SELECT,UPDATE,INSERT,DELETE ON exercise_arp248.* TO 'ex_user'@'localhost';
USE exercise_arp248;

CREATE TABLE bowlers_arp248

  (bowlerid int primary key,

  name varchar(100),

  address varchar(200),IT202Exercises

  phone varchar(20));
  INSERT INTO bowlers_arp248 VALUES

  (100, 'Rich', '123 Main St.', '555-1234');
  INSERT INTO bowlers_arp248 VALUES

  (101, 'Barbara', '123 Main St.', '555-5678');
  INSERT INTO bowlers_arp248 VALUES

  (102, 'Bob', '124 Main St.', '555-7429');
  INSERT INTO bowlers_arp248 VALUES

  (103, 'Alex', '124 Main St.', '555-8381');
SELECT * FROM bowlers_arp248;
CREATE TABLE games_arp248

  (gameid int auto_increment primary key,

  bowlerid int,

  score int);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (100, 110);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (100, 115);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (100, 105);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (101, 110);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (101, 112);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (101, 130);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (102, 169);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (102, 167);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (102, 201);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (102, 300);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (103, 141);
  INSERT INTO games_arp248 (bowlerid, score) VALUES (103, 61);
  SELECT * FROM games_arp248;
  SELECT bowlerid, name FROM bowlers_arp248 ORDER BY name;
  SELECT COUNT(score) AS games, AVG(score) AS average FROM games_arp248 WHERE bowlerid = 102;
  #this is my dad's scores, he does average around this number.
  SELECT COUNT(score) AS games, AVG(score) AS average FROM games_arp248 WHERE bowlerid = 103;
  #this is me, I have 1 good game then 1 bad game and stop for the day.