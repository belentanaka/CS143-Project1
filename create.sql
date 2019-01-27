CREATE TABLE Movie (
  id INT PRIMARY KEY, --Every movie has an unique ID number
  title VARCHAR(100),
  year INT,
  rating VARCHAR(10),
  company VARCHAR(50)
)ENGINE = INNODB;

CREATE TABLE Actor (
  id INT PRIMARY KEY, --Every actor has an unique ID number
  last VARCHAR(20),
  first VARCHAR(20),
  sex VARCHAR(6),
  dob DATE,
  dod DATE
)ENGINE = INNODB;

CREATE TABLE Sales (
  mid INT FOREIGN KEY REFERENCES Movie(id), --
  ticketsSold INT,
  totalIncome INT
)ENGINE = INNODB;

CREATE TABLE Director (
  id INT PRIMARY KEY, --Every director has an unique ID number
  last VARCHAR(20),
  first VARCHAR(20),
  dob DATE,
  dod DATE
)ENGINE = INNODB;

CREATE TABLE MovieGenre (
  mid INT FOREIGN KEY,
  genre VARCHAR(20)
)ENGINE = INNODB;

CREATE TABLE MovieDirector (
  mid INT FOREIGN KEY REFERENCES Movie(id),
  did INT FOREIGN KEY REFERENCES Director(id)
)ENGINE = INNODB;

CREATE TABLE MovieActor (
  mid INT FOREIGN KEY REFERENCES Movie(id),
  aid INT FOREIGN KEY REFERENCES Actor(id),
  role VARCHAR(50)
)ENGINE = INNODB;

CREATE TABLE MovieRating (
  mid INT FOREIGN KEY REFERENCES Movie(id),
  imdb INT,
  rot INT
)ENGINE = INNODB;

CREATE TABLE Review (
  name VARCHAR(20),
  time TIMESTAMP,
  mid INT FOREIGN KEY REFERENCES Movie(id),
  rating INT,
  comment VARCHAR(500)
)ENGINE = INNODB;

CREATE TABLE MaxPersonID (
  id INT PRIMARY KEY
)ENGINE = INNODB;

CREATE TABLE MaxMovieID (
  id INT PRIMARY KEY
)ENGINE = INNODB;