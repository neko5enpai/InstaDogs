CREATE USER 'adminInstaDog'@'localhost' IDENTIFIED BY 'Inst@D0g';

CREATE DATABASE InstaDog;
GRANT ALL PRIVILEGES ON InstaDog.* TO 'adminInstaDog'@'localhost';
USE InstaDog;

CREATE TABLE User (
    id INT(100) AUTO_INCREMENT,
    userName VARCHAR(100),
    userPassword VARCHAR(255),
    latestLogin date,
    PRIMARY KEY (id)
);

CREATE TABLE Dog (
    id INT(100) AUTO_INCREMENT,
    userId INT(100),
    age date,
    dogName VARCHAR(100),
    nickname VARCHAR(100),
    gender VARCHAR(100),
    CONSTRAINT fk_dog FOREIGN KEY (userId) REFERENCES User(id),
    PRIMARY KEY (id)
);

CREATE TABLE Article (
    id INT(100) AUTO_INCREMENT,
    dogId INT(100),
    articleDate date,
    articleImage VARCHAR(100),
    articleText VARCHAR(255),
    CONSTRAINT fk_article FOREIGN KEY (dogId) REFERENCES Dog(id),
    PRIMARY KEY (id)
);

CREATE TABLE Commentary (
    id INT(100) AUTO_INCREMENT,
    userId INT(100),
    articleId INT(100),
    commentaryText VARCHAR(255),
    commentaryDate date,
    PRIMARY KEY (id),
    CONSTRAINT fk_commentarticle FOREIGN KEY (articleId) REFERENCES Article(id),
    CONSTRAINT fk_commentuser FOREIGN KEY (userId) REFERENCES User(id)
);

CREATE TABLE Breed (
    breedId INT(100) AUTO_INCREMENT,
    breedType VARCHAR(100),
    PRIMARY KEY (breedId)
);

CREATE TABLE BreedRelation (
    dogId INT(100),
    breedId INT(100),
    CONSTRAINT fk_breedrelationdog FOREIGN KEY (dogId) REFERENCES Dog(id),
    CONSTRAINT fk_breedrelationbreed FOREIGN KEY (breedId) REFERENCES Breed(breedId)
);