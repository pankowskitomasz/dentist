CREATE TABLE dentist_users(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(45) NOT NULL,
    password CHAR(40) NOT NULL,
    email VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);