-- PRIMARY KEY: Every movie has a unique ID
-- CHK_Movieyear: There were no movies before 1888 (most likely)
CREATE TABLE Movie (
  id INT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  year INT NOT NULL,
  rating VARCHAR(10) NOT NULL,
  company VARCHAR(50) NOT NULL,
  CONSTRAINT CHK_MovieYear CHECK (year>=1888)
)ENGINE = INNODB;

-- PRIMARY KEY: Every actor has a unique ID
-- CHK_Sex: Sex can only be Male or Female
CREATE TABLE Actor (
  id INT PRIMARY KEY,
  last VARCHAR(20) NOT NULL,
  first VARCHAR(20) NOT NULL,
  sex VARCHAR(6) NOT NULL,
  dob DATE NOT NULL,
  dod DATE,
  CONSTRAINT CHK_Sex CHECK (sex='Male' OR sex='Female' OR sex='Transgender')
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
CREATE TABLE Sales (
  mid INT NOT NULL,
  ticketsSold INT NOT NULL,
  totalIncome INT NOT NULL,
  FOREIGN KEY (mid) REFERENCES Movie(id)
)ENGINE = INNODB;

-- PRIMARY KEY: Every director has a unique ID
CREATE TABLE Director (
  id INT PRIMARY KEY,
  last VARCHAR(20) NOT NULL,
  first VARCHAR(20) NOT NULL,
  dob DATE NOT NULL,
  dod DATE
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
CREATE TABLE MovieGenre (
  mid INT NOT NULL,
  genre VARCHAR(20) NOT NULL,
  FOREIGN KEY (mid) REFERENCES Movie(id)
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
-- FOREIGN KEY (did): mid refers to primary key in Director
CREATE TABLE MovieDirector (
  mid INT NOT NULL,
  did INT NOT NULL,
  FOREIGN KEY (mid) REFERENCES Movie(id),
  FOREIGN KEY (did) REFERENCES Director(id)
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
-- FOREIGN KEY (aid): mid refers to primary key in Actor
CREATE TABLE MovieActor (
  mid INT NOT NULL,
  aid INT NOT NULL,
  role VARCHAR(50),
  FOREIGN KEY (mid) REFERENCES Movie(id),
  FOREIGN KEY (aid) REFERENCES Actor(id)
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
-- CHK_Imdb: IMDb scores can only be in the range 0 and 100
-- CHK_Rot: Rotten Tomatoes scores can only be in the range 0 and 100
CREATE TABLE MovieRating (
  mid INT NOT NULL,
  imdb INT NOT NULL,
  rot INT NOT NULL,
  FOREIGN KEY (mid) REFERENCES Movie(id),
  CONSTRAINT CHK_Imdb CHECK (imdb>=0 AND imdb<=100),
  CONSTRAINT CHK_Rot CHECK (rot>=0 AND rot<=100)
)ENGINE = INNODB;

-- FOREIGN KEY (mid): mid refers to primary key in Movie
CREATE TABLE Review (
  name VARCHAR(20) NOT NULL,
  time TIMESTAMP NOT NULL,
  mid INT NOT NULL,
  rating INT NOT NULL,
  comment VARCHAR(500) NOT NULL,
  FOREIGN KEY (mid) REFERENCES Movie(id)
)ENGINE = INNODB;

CREATE TABLE MaxPersonID (
  id INT
)ENGINE = INNODB;

CREATE TABLE MaxMovieID (
  id INT
)ENGINE = INNODB;
