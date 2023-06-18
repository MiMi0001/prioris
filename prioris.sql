CREATE TABLE IF NOT EXISTS users (
    id int NOT NULL AUTO_INCREMENT,
    username VARCHAR(50),
    password TEXT,
    role TEXT,
    PRIMARY KEY (id)
);
