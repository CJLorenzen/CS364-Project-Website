CREATE DATABASE historic-economic;

CREATE TABLE Country (
	ISO_Code char(3) NOT NULL,
	year int NOT NULL,
	name char(50) NOT NULL,
	population int NOT NULL,
	GDPPC int,
	GDP int,
	PRIMARY KEY (ISO_Code, year)
);

BULK INSERT INTO Countrty FROM 'mpd2020.csv'
   WITH (
      FIELDTERMINATOR = ',',
      ROWTERMINATOR = '\n',
   VALUES(ISO_Code, name, year, GDPPC, population
);
