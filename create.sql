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
  mid INT PRIMARY KEY,
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
  mid INT PRIMARY KEY,
  genre VARCHAR(20)
);

CREATE TABLE MovieDirector (
  mid INT,
  did INT
);

CREATE TABLE MovieActor (
  mid INT,
  aid INT,
  role VARCHAR(50)
);

CREATE TABLE MovieRating (
  mid INT PRIMARY KEY,
  imdb INT,
  rot INT
);

CREATE TABLE Review (
  name VARCHAR(20) NOT NULL,
  time TIMESTAMP,
  mid INT NOT NULL,
  rating INT NOT NULL,
  comment VARCHAR(500)
);

CREATE TABLE MaxPersonID (
  id INT PRIMARY KEY
);

CREATE TABLE MaxMovieID (
  id INT PRIMARY KEY
);
