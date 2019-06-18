CREATE USER 'adminStartOn'@'%' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON `startondb`.* TO 'adminStartOn'@'%';

CREATE USER 'adminStartOn'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON `startondb`.* TO 'adminStartOn'@'localhost';