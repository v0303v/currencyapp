CREATE TABLE currencies
(
    id        INT AUTO_INCREMENT PRIMARY KEY,
    cbr_id    VARCHAR(10),
    num_code  VARCHAR(3),
    char_code VARCHAR(3),
    nominal   INT,
    name      VARCHAR(255),
    value     DECIMAL(10, 4),
    previous  DECIMAL(10, 4),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);