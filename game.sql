DROP DATABASE IF EXISTS games;
CREATE DATABASE games;
USE games;

START TRANSACTION;

CREATE TABLE game (
  game_ID int(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  game varchar(100) NOT NULL,
  price decimal(8,2) unsigned,
  description text,
  developer_ID int(11) unsigned,
  PRIMARY KEY (game_ID)
  );

  CREATE TABLE genre (
    genre_ID int(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
    genre varchar(50) NOT NULL,
    PRIMARY KEY (genre_ID)
    );

  CREATE TABLE developer (
    developer_ID int(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
    developer varchar(50) NOT NULL UNIQUE,
    PRIMARY KEY (developer_ID)
  );

CREATE TABLE game_genre (
  game_ID int(11) UNSIGNED NOT NULL,
  genre_ID int(11) UNSIGNED NOT NULL,
  CONSTRAINT DEZE_ID PRIMARY KEY (game_ID,genre_ID)
);

CREATE TABLE account (
  account_ID int(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  email varchar(255) NOT NULL UNIQUE,
  pass varchar(255) NOT NULL,
  role SET('admin', 'editor', 'medewerker') NOT NULL,
  PRIMARY KEY (account_ID)
);

INSERT INTO game(game,price,description,developer_ID) VALUES
('Final Fantasy Tactics', 59.99, 'Best game ever', 1),
('Final Fantasy XV', 59.99, 'Fuck off', 2),
('World Wide Soccer Sega International Victory Goal Edition Japan', 19.99, 'Woohoo', 3),
('AOF', 2.99, 'Pretty good graphics', 4),
('Senran Kagura Estival Versus', 29.99, 'Crazy fun time', 5),
('Tree of Savior', 'FREE', 'Buressin', 6),
('GOOIWEG', '9.99', 'GOOIWEG', 7);

INSERT INTO genre(genre) VALUES
('MMORPG'),
('RPG'),
('Ecchi'),
('SRPG'),
('Soccer'),
('GOOIWEGGENRE');

INSERT INTO developer(developer) VALUES
('Square Soft'),
('Square Enix'),
('SEGA'),
('NSE Circuit'),
('XSEED'),
('IMCGames'),
('GOOIWEGDEVELOPER');

INSERT INTO game_genre(game_ID, genre_ID) VALUES
(1, 2),
(1, 4),
(2, 2),
(3, 5),
(4, 1),
(4, 2),
(5, 3),
(6, 1),
(6, 2),
(7, 6);

INSERT INTO account(email, pass, role) VALUES
('koppers@dialogic.nl', '$2y$10$JS.7ZRdl0yVa.XGrAeSQteGlQJ2CtFUTlBqc5Lc2jNglonY7CWIHq', 'medewerker'),
('test@test.nl', '$2y$10$CRdW3bYDTDThQ33RXdDLuuOngvy5P/ruDCtYUzT1sGRnXJWlxFF6C', 'editor'),
('dunn0_0@hotmail.com', '$2y$10$YNmkFF1RM./CrBCWh8A4.eGjerwEH4Egr99BlqbsQNqaklbf8sOJ2', 'admin');

-- voer uit in de tabel die foreign key heeft.
-- Add contraint add een naam aan de relation
-- de cascade shit is zodat als 1 entry verwijderd word alles dat gelinkt is ook verwijderd word
ALTER TABLE game_genre
ADD CONSTRAINT game_genre
FOREIGN KEY (game_ID) REFERENCES game(game_ID) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE game_genre
ADD CONSTRAINT genre_game
FOREIGN KEY (genre_ID) REFERENCES genre(genre_ID) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE game
ADD CONSTRAINT developer_game
FOREIGN KEY (developer_ID) REFERENCES developer(developer_ID) ON UPDATE CASCADE ON DELETE SET NULL;



COMMIT;
