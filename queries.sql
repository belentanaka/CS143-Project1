SELECT CONCAT(first, ' ', last)
FROM Actor, MovieActor
WHERE Actor.id = MovieActor.aid AND MovieActor.mid = (SELECT id
						 FROM Movie
						 WHERE title = 'Die Another Day');

SELECT COUNT(*)
FROM (SELECT aid
      FROM MovieActor
      GROUP BY aid
      HAVING COUNT(mid) > 1) AS C;

SELECT title
FROM Movie, Sales
WHERE Movie.id = Sales.mid AND Sales.ticketsSold > 1000000;

-- Names of directors who have directed a film that sold less than 500000 tickets
SELECT DISTINCT CONCAT(first, ' ', last)
FROM Director, MovieDirector, Sales
WHERE Director.id = MovieDirector.did AND MovieDirector.mid = Sales.mid AND Sales.ticketsSold < 500000;

-- Movies with NC-17 MPAA rating
SELECT title
FROM Movie
WHERE Movie.rating='NC-17';
