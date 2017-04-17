DROP DATABASE IF EXISTS crimedb;
CREATE DATABASE IF NOT EXISTS crimedb;
USE crimedb;

CREATE TABLE
	users
(
	id INTEGER AUTO_INCREMENT,

	name VARCHAR(512),
	password VARCHAR(512),
	role VARCHAR(16),

	PRIMARY KEY (id)
);

CREATE TABLE
	people
(
	id INTEGER AUTO_INCREMENT,

	name VARCHAR(512),
	dob DATE,
	ssn VARCHAR(32),

	PRIMARY KEY (id)
);

CREATE TABLE
	police_report
(
	id INTEGER AUTO_INCREMENT,

	reporting_officer INTEGER,
	report_time DATETIME,
	offense_time DATETIME,
	title VARCHAR(128),
	description TEXT,
	reporting_person INTEGER,

	PRIMARY KEY (id),
	FOREIGN KEY (reporting_officer)
		REFERENCES users (id),
	FOREIGN KEY (reporting_person)
		REFERENCES people (id)
);

CREATE TABLE
	license_plate
(
	id INTEGER AUTO_INCREMENT,

	plate VARCHAR(16),
	brand VARCHAR(32),
	model VARCHAR(32),
	color VARCHAR(32),
	owner INTEGER,

	PRIMARY KEY (id),
	FOREIGN KEY (owner)
		REFERENCES people (id)
);

CREATE TABLE
	warrants
(
	id INTEGER AUTO_INCREMENT,

	title VARCHAR(512),
	person INTEGER,
	granted_date DATE,
	served_at DATETIME,
	served_by INTEGER,

	PRIMARY KEY (id),
	FOREIGN KEY (person)
		REFERENCES people (id),
	FOREIGN KEY (served_by)
		REFERENCES users (id)
);
