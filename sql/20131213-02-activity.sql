CREATE TABLE IF NOT EXISTS activity (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	address_id INT, 
	place_id INT,
	name VARCHAR(255),
	description TEXT	
);

