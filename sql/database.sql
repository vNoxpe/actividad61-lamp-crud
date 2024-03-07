CREATE TABLE pokemon (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  type VARCHAR(50) NOT NULL,
  level INT UNSIGNED NOT NULL,
  trainer VARCHAR(100) NOT NULL,
  region VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO pokemon (name, type, level, trainer, region) VALUES ('Pikachu', 'Electric', 25, 'Ash', 'Kanto');
INSERT INTO pokemon (name, type, level, trainer, region) VALUES ('Charmander', 'Fire', 20, 'Ash', 'Kanto');
INSERT INTO pokemon (name, type, level, trainer, region) VALUES ('Bulbasaur', 'Grass', 22, 'Ash', 'Kanto');
INSERT INTO pokemon (name, type, level, trainer, region) VALUES ('Squirtle', 'Water', 21, 'Ash', 'Kanto');
INSERT INTO pokemon (name, type, level, trainer, region) VALUES ('Mewtwo', 'Psychic', 50, 'Team Rocket', 'Kanto');
INSERT INTO pokemon (name, type, level, trainer, region) VALUES ('Pidgey', 'Flying', 10, 'Gary', 'Kanto');
INSERT INTO pokemon (name, type, level, trainer, region) VALUES ('Jigglypuff', 'Normal', 18, 'Nurse Joy', 'Kanto');

