CREATE DATABASE nypd_collisions;
USE nypd_collisions;

CREATE TABLE occurrences(
	UNIQUE_KEY INT NOT NULL,
	DATE_OF_OCCURRENCE DATE,
	TIME_OF_OCCURRENCE TIME,
	BOROUGH VARCHAR(50),
	ZIP_CODE MEDIUMINT,
	LATITUDE DOUBLE,
	LONGITUDE DOUBLE,
	LOCATION VARCHAR(50),
	ON_STREET_NAME VARCHAR(50),
	CROSS_STREET_NAME VARCHAR(50),
	OFF_STREET_NAME VARCHAR(50),
	NUMBER_OF_PERSONS_INJURED TINYINT,
	NUMBER_OF_PERSONS_KILLED TINYINT,
	NUMBER_OF_PEDESTRIANS_INJURED TINYINT,
	NUMBER_OF_PEDESTRIANS_KILLED TINYINT,
	NUMBER_OF_CYCLIST_INJURED TINYINT,
	NUMBER_OF_CYCLIST_KILLED TINYINT,
	NUMBER_OF_MOTORIST_INJURED TINYINT,
	NUMBER_OF_MOTORIST_KILLED TINYINT,
	CONTRIBUTING_FACTOR_VEHICLE_1 VARCHAR(50),
	CONTRIBUTING_FACTOR_VEHICLE_2 VARCHAR(50),
	CONTRIBUTING_FACTOR_VEHICLE_3 VARCHAR(50),
	CONTRIBUTING_FACTOR_VEHICLE_4 VARCHAR(50),
	CONTRIBUTING_FACTOR_VEHICLE_5 VARCHAR(50),
	VEHICLE_TYPE_CODE_1 VARCHAR(50),
	VEHICLE_TYPE_CODE_2 VARCHAR(50),
	VEHICLE_TYPE_CODE_3 VARCHAR(50),
	VEHICLE_TYPE_CODE_4 VARCHAR(50),
	VEHICLE_TYPE_CODE_5 VARCHAR(50),
	CONSTRAINT pk PRIMARY KEY (UNIQUE_KEY)
);