/* Select all users with database */
SELECT * FROM crud.city;

/* Select database */
USE crud;

/*-- Select all users*/
SELECT * FROM city;

/* Select cities por letra inicial*/
SELECT * FROM city WHERE city LIKE 'B%';

/* Ciudades que contengan z */
SELECT * FROM city WHERE city LIKE '%z%';

/* Ordenar por ciudad */
SELECT * FROM city ORDER BY city DESC;
SELECT * FROM city ORDER BY city ASC;

/* Filtrar por idcity */
SELECT * FROM city WHERE idcity > 3;

/* Insertar ciudad */
INSERT INTO city(city) VALUES ('SeBilla');
INSERT INTO city(city) VALUES ('Santiago');
INSERT INTO city(city) VALUES ('Vigo');

/* Insert segunda forma */ 
INSERT INTO city SET city="Huesca";


/* Update ciudad */
UPDATE city SET city='Sevilla' WHERE city='SeBilla';
UPDATE city SET city='Sevilla' WHERE idcity=7;


/* Delete ciudad */
DELETE FROM city WHERE idcity=6;

/* Users y ciduad */ 
SELECT name, city
FROM user, city
WHERE user.city_idcity=city.idcity;


SELECT name, gender
FROM user, gender
WHERE user.gender_idgender=gender.idgender;

SELECT name, gender
FROM user
INNER JOIN gender ON gender.idgender = user.gender_idgender;

SELECT name, city
FROM user
RIGHT JOIN city ON city.idcity = user.city_idcity;

SELECT name, city
FROM user
RIGHT JOIN city ON  user.city_idcity =city.idcity ;

SELECT name, city
FROM city LEFT JOIN user ON user.city_idcity = city.idcity;


SELECT name, pet
FROM user
INNER JOIN user_has_pet ON user_has_pet.user_iduser =user.iduser
INNER JOIN pet ON pet.idpet = user_has_pet.pet_idpet;

SELECT name, group_concat(pet)
FROM user
INNER JOIN user_has_pet ON user_has_pet.user_iduser =user.iduser
INNER JOIN pet ON pet.idpet = user_has_pet.pet_idpet
GROUP BY iduser;










