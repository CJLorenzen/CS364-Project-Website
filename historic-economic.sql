CREATE DATABASE historic-economic;

CREATE TABLE Country (
	ISO_Code char(3) NOT NULL,
	name char(50) NOT NULL,
	year int NOT NULL,
	GDPPC int,
	population int,
	CONSTRAINT country_pkey PRIMARY KEY (ISO_Code, year)
);

BULK INSERT INTO Country FROM 'mpd2020.csv'
   WITH (
	FIELDTERMINATOR = ',',
	FIRSTROW=1,
	ROWTERMINATOR = '\n',
   VALUES(ISO_Code, name, year, GDPPC, population);
