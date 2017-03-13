CREATE DATABASE Asthma_app; 
  
-- Creating the db user and assigning CRUD privileges on all tables 
CREATE USER 'helenau'@'localhost' IDENTIFIED BY 'password'; 
USE Asthma_app; 
GRANT DELETE,INSERT,SELECT,UPDATE ON Asthma_app.* TO 'helenau'@'localhost'; 
  
-- Table structure for table user 
CREATE TABLE user ( 
  userId int NOT NULL AUTO_INCREMENT, 
  email varchar(16) NOT NULL, 
  password varchar(40) NOT NULL,  
  PRIMARY KEY (userId) );
  
-- Table structure for table sportsEvent  
CREATE TABLE sportsEvent (
    eventId int NOT NULL AUTO_INCREMENT,
    userId int,
    duration int NOT NULL,
    intensity varchar(6),
  feeling varchar(5),
  inhales int,
  comment varchar(200),
    PRIMARY KEY (eventId),
    FOREIGN KEY (userId) REFERENCES user(userId)
);
