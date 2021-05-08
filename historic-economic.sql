DROP DATABASE IF historicEconomic;

CREATE DATABASE historicEsconomic;
USE historicEsconomic;

CREATE TABLE Country (
	ISO_Code CHAR(3) NOT NULL,
	name CHAR VARYING(50) NOT NULL,
	year INTEGER NOT NULL,
	GDPPC INTEGER,
	population int,
	PRIMARY KEY (ISO_Code, year)
);

BULK INSERT INTO Country FROM 'mpd2020.csv'
   WITH (
	FIELDTERMINATOR = ',',
	FIRSTROW=1,
	ROWTERMINATOR = '\n',
   VALUES(ISO_Code, name, year, GDPPC, population);



-- Alternate way based off template
-- INSERT INTO author (given_name, surname) VALUES
-- ('Mark', 'Gillenson'),
-- ('Jeffrey', 'Ullman'),
-- ('Jennifer', 'Widom'),
-- ('Hector', 'Garcia-Molina'),
-- ('Abraham', 'Silberschatz'),
-- ('Henry', 'Korth'),
-- ('S.', 'Sudarshan'),
-- ('Carlos', 'Coronel'),
-- ('Steven', 'Morris');