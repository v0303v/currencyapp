CREATE TABLE currencies
(
    id        VARCHAR(10) PRIMARY KEY,
    num_code  VARCHAR(3),
    char_code VARCHAR(3),
    nominal   INT,
    name      VARCHAR(255),
    value     DECIMAL(10, 4),
    previous  DECIMAL(10, 4),
    timestamp VARCHAR(255)
);