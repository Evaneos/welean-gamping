CREATE TABLE IF NOT EXISTS user (
	id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(100),
	lastname VARCHAR(100),
	city VARCHAR(100),
	country VARCHAR(100),
	description TEXT,
	language VARCHAR(3),
	email VARCHAR(100),
	phone VARCHAR(30),
	password VARCHAR(128),
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	is_banned TINYINT(1),
	picture_id INT(11) unsigned
);
