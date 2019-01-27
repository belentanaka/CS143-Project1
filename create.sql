CREATE TABLE Movie (
  id INT PRIMARY KEY,
  title VARCHAR(100),
  year INT,
  rating VARCHAR(10),
  company VARCHAR(50)
);

CREATE TABLE Actor (
  id INT PRIMARY KEY,
  last VARCHAR(20),
  first VARCHAR(20),
  sex VARCHAR(6),
  dob DATE,
  dod DATE
);

CREATE TABLE Sales (
  mid INT FOREIGN KEY,
  ticketsSold INT,
  totalIncome INT
);

CREATE TABLE Director (
  id INT PRIMARY KEY,
  last VARCHAR(20),
  first VARCHAR(20),
  dob DATE,
  dod DATE
);

CREATE TABLE MovieGenre (
  mid INT FOREIGN KEY,
  genre VARCHAR(20)
);

CREATE TABLE MovieDirector (
  mid INT FOREIGN KEY,
  did INT FOREIGN KEY
);

CREATE TABLE MovieActor (
  mid INT FOREIGN KEY,
  aid INT FOREIGN KEY,
  role VARCHAR(50)
);

CREATE TABLE MovieRating (
  mid INT FOREIGN KEY,
  imdb INT,
  rot INT
);

CREATE TABLE Review (
  name VARCHAR(20),
  time TIMESTAMP,
  mid INT FOREIGN KEY,
  rating INT,
  comment VARCHAR(500)
);

CREATE TABLE MaxPersonID (
  id INT PRIMARY KEY
);

CREATE TABLE MaxMovieID (
  id INT PRIMARY KEY
);
