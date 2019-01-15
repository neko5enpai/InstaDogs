CREATE DATABASE InstaDog;

CREATE TABLE user (
    user_id INT(100) AUTO_INCREMENT,
    user_name VARCHAR(100),
    user_password VARCHAR(255),
    latest_user_login date,
    PRIMARY KEY (user_id)
);

CREATE TABLE dog (
    dog_id INT(100) AUTO_INCREMENT,
    user_id INT(100),
    dog_age date,
    dog_name VARCHAR(100),
    dog_nickname VARCHAR(100),
    dog_gender VARCHAR(100),
    PRIMARY KEY (dog_id),
    FOREIGN KEY user_id REFERENCES user(user_id)
);

CREATE TABLE article (
    article_id INT(100) AUTO_INCREMENT,
    dog_id INT(100),
    article_date date,
    article_image VARCHAR(100),
    article_text VARCHAR(255),
    PRIMARY KEY (article_id),
    FOREIGN KEY dog_id REFERENCES dog(dog_id)
);

CREATE TABLE commentary (
    commentary_id INT(100) AUTO_INCREMENT,
    user_id INT(100),
    article_id INT(100),
    commentary_text VARCHAR(255),
    commentary_date date,
    PRIMARY KEY (commentary_id),
    FOREIGN KEY user_id REFERENCES user(user_id),
    FOREIGN KEY article_id REFERENCES article(article_id)
);

CREATE TABLE breed (
    breed_id INT(100) AUTO_INCREMENT,
    breed_type VARCHAR(100),
    PRIMARY KEY (breed_id)
);

CREATE TABLE breed_relation (
    dog_id INT(100),
    breed_id INT(100),
    FOREIGN KEY dog_id REFERENCES dog(dog_id),
    FOREIGN KEY breed_id REFERENCES breed(breed_id)
)