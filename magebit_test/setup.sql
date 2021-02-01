DROP DATABASE IF EXISTS test_email_dtb;
CREATE DATABASE test_email_dtb;
USE test_email_dtb;
CREATE TABLE email_providers (
	id INT NOT NULL AUTO_INCREMENT,
    domain VARCHAR(50) NOT NULL, 
    PRIMARY KEY (id)
);
INSERT INTO email_providers VALUES (1, 'google.com');
INSERT INTO email_providers VALUES (2, 'yahoo.com');
INSERT INTO email_providers VALUES (3, 'outlook.com');
CREATE TABLE emails (
	user_id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id)
);
INSERT INTO emails (email, date) VALUES ('mikesmith@gmail.com', '2021-01-27 21:32:00');
INSERT INTO emails (email, date) VALUES ('jakejohnson@yahoo.com', '2021-01-28 17:51:50');
INSERT INTO emails (email, date) VALUES ('ambersmith@outlook.com', '2021-01-30 12:42:00');
INSERT INTO emails (email, date) VALUES ('sergiotorres@gmail.com', '2021-01-29 14:36:49');
INSERT INTO emails (email, date) VALUES ('kevinwu@outlook.com', '2021-01-31 12:58:16');