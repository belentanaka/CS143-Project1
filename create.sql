-- PRIMARY KEY: Every movie has a unique ID
-- CHK_Movieyear: There were no movies before 1888 (most likely)
CREATE TABLE Movie (
  id INT PRIMARY KEY,
  title VARCHAR(100),
  year INT,
  rating VARCHAR(10),
  company VARCHAR(50),
  CONSTRAINT CHK_MovieYear CHECK (year>=1888)
)ENGINE = INNODB;

-- PRIMARY KEY: Every actor has a unique ID
-- CHK_Sex: Sex can only be Male or Female
CREATE TABLE Actor (
  id INT PRIMARY KEY,
  last VARCHAR(20),
  first VARCHAR(20),
  sex VARCHAR(6),
  dob DATE,
  dod DATE,
  CONSTRAINT CHK_Sex CHECK (sex='Male' OR sex='Female')
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
CREATE TABLE Sales (
  mid INT,
  ticketsSold INT,
  totalIncome INT,
  FOREIGN KEY (mid) REFERENCES Movie(id)
)ENGINE = INNODB;

-- PRIMARY KEY: Every director has a unique ID
CREATE TABLE Director (
  id INT PRIMARY KEY,
  last VARCHAR(20),
  first VARCHAR(20),
  dob DATE,
  dod DATE
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
CREATE TABLE MovieGenre (
  mid INT,
  genre VARCHAR(20),
  FOREIGN KEY (mid) REFERENCES Movie(id)
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
-- FOREIGN KEY (did): mid refers to primary key in Director
CREATE TABLE MovieDirector (
  mid INT,
  did INT,
  FOREIGN KEY (mid) REFERENCES Movie(id),
  FOREIGN KEY (did) REFERENCES Director(id)
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
-- FOREIGN KEY (aid): mid refers to primary key in Actor
CREATE TABLE MovieActor (
  mid INT,
  aid INT,
  role VARCHAR(50),
  FOREIGN KEY (mid) REFERENCES Movie(id),
  FOREIGN KEY (aid) REFERENCES Actor(id)
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
-- CHK_Imdb: IMDb scores can only be in the range 0 and 100
-- CHK_Rot: Rotten Tomatoes scores can only be in the range 0 and 100
CREATE TABLE MovieRating (
  mid INT,
  imdb INT,
  rot INT,
  FOREIGN KEY (mid) REFERENCES Movie(id),
  CONSTRAINT CHK_Imdb CHECK (imdb>=0 AND imdb<=100),
  CONSTRAINT CHK_Rot CHECK (rot>=0 AND rot<=100)
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
CREATE TABLE Review (
  name VARCHAR(20),
  time TIMESTAMP,
  mid INT,
  rating INT,
  comment VARCHAR(500),
  FOREIGN KEY (mid) REFERENCES Movie(id)
)ENGINE = INNODB;

CREATE TABLE MaxPersonID (
  id INT
)ENGINE = INNODB;

CREATE TABLE MaxMovieID (
  id INT
)ENGINE = INNODB;
