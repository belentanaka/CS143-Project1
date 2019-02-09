-- PRIMARY KEY CONSTRAINTS
-- Movie has an ID number that is already in the database
INSERT INTO Movie VALUES (5,'Branded To Kill', 1967, NULL, 'Nikkatsu');

-- Actor ID has to be unique, Actor has an ID number already in the database
INSERT INTO Actor VALUES (1,'Wiseau','Tommy','Male', NULL, NULL);

-- Director has an ID number that is already in the database
INSERT INTO Director VALUES (3310,'Suzuki','Seijun',19230524,20170213);

-- FOREIGN KEY CONSTRAINTS
-- Sales values have to be for a movie that is in the Movie table 0 is not
INSERT INTO Sales VALUES (0,5,2);

-- Genre values have to be for a movie that is in the Movie table 0 is not
INSERT INTO MovieGenre VALUES (0,'Post-Avant Jazzcore');

-- Movie ID and Director ID have to be ones existing in the Movie and Director tables respectively
INSERT INTO MovieDirector VALUES (0,3310);
INSERT INTO MovieDirector VALUES (5,0);

-- Movie ID and Actor ID have to be ones existing in the Movie and Actor tables respectively
INSERT INTO MovieActor VALUES (0,1,'Ice Cream Man');
INSERT INTO MovieActor VALUES (5,0,'Guy #2');

-- Movie ID has to be one that exists in the Movie table
INSERT INTO MovieRating VALUES (0,70,70);

-- Movie ID in Review has to be one that exists in the Movie table
INSERT INTO Review VALUES ('Melon', '1997-08-06 04:20:11', 0, 10, 'Dark-prog');

-- CHECK CONSTRAINT
-- Movie was made before 1888
INSERT INTO Movie VALUES (1,'Redline',1887, NULL,'Madhouse');

-- Actor has to be male or female
INSERT INTO Actor VALUES (1,'Jones','Robot','Robot', NULL, NULL);

-- Movie Rating for imdb or Rotten Tomatoes scores cannot be outside the range 0-100
INSERT INTO MovieRating VALUES (5,1000,70);
INSERT INTO MovieRating VALUES (5,70,1000);
