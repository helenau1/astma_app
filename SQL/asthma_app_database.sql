CREATE DATABASE Asthma_app; 
  
-- Creating the db user and assigning CRUD privileges on all tables 
CREATE USER 'helenau'@'localhost' IDENTIFIED BY 'password'; 
USE Asthma_app; 
GRANT DELETE,INSERT,SELECT,UPDATE ON Asthma_app.* TO 'helenau'@'localhost'; 
  
-- Table structure for table user 
CREATE TABLE user ( 
  userId int NOT NULL AUTO_INCREMENT, 
  email varchar(100) NOT NULL, 
  password varchar(255) NOT NULL,  
  PRIMARY KEY (userId) );
  
-- Table structure for table sportsEvent  
CREATE TABLE sportsEvent (
    eventId int NOT NULL AUTO_INCREMENT,
    userId int NOT NULL,
    dateof DATE NOT NULL,
    duration int NOT NULL,
    intensity varchar(10) NOT NULL,
  feeling varchar(10) NOT NULL,
  inhales int,
  comment varchar(200),
    PRIMARY KEY (eventId),
    FOREIGN KEY (userId) REFERENCES user(userId)
);

INSERT INTO `user` (`email`, `password`) VALUES 
('tester@tester.com','$2y$10$VlZMxkhSia6Srs3XjsgtmupHYIvKOFJ6ftVoUxrjOmrJTHNKlZNCS');

INSERT INTO `sportsEvent` (`userId`,`dateof`,`duration`,`intensity`,`feeling`,`inhales`,`comment`)
VALUES 
('1', '2017-05-01', '40', 'low', 'happy', '0','walking'), 
('1', '2017-05-03', '30', 'medium', 'ok', '1','jogging'), 
('1', '2017-05-05', '45', 'high', 'ok', '1','playing football'),
('1', '2017-05-07', '30', 'medium', 'ok', '1','jogging'), 
('1', '2017-05-09', '60', 'high', 'sad', '2','running'), 
('1', '2017-05-11', '75', 'low', 'happy', '0','cycling'), 
('1', '2017-05-13', '45', 'medium', 'happy', '1','jogging'), 
('1', '2017-05-15', '40', 'medium', 'ok', '1','cycling'), 
('1', '2017-05-17', '30', 'high', 'ok', '2','playing football'),
('1', '2017-05-19', '50', 'low', 'ok', '0','walking'),
('1', '2017-05-21', '65', 'low', 'happy', '0','cycling'),
('1', '2017-05-23', '35', 'high', 'sad', '2','running'),
('1', '2017-05-25', '55', 'medium', 'sad', '1','swimming'),
('1', '2017-05-27', '45', 'low', 'ok','0', 'cycling'),
('1', '2017-05-29', '20', 'high','happy','1','playing football');