SELECT CONCAT(first, ' ', last)
FROM Actor
WHERE id = (SELECT aid
			FROM MovieActor
			WHERE mid = (SELECT id
						 FROM Movie
						 WHERE title = 'Die Another Day'))