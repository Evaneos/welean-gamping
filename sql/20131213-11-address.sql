CREATE TABLE IF NOT EXISTS address (
	id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	address VARCHAR(100),
	locality VARCHAR(100),
	zip_code VARCHAR(20),
	city VARCHAR(50)
);
