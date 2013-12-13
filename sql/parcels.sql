CREATE TABLE IF NOT EXISTS parcel (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	address_id INT, 
	capacity INT,
        country_id INT, 
	created_at DATE,
        currency_iso3 VARCHAR(3), 
	description TEXT,
        hosts_camping_cars TINYINT(1), 
	hosts_caranvans TINYINT(1),
        hosts_tents TINYINT(1), 
	latitude VARCHAR(32), 
	longitude VARCHAR(32),
        online TINYINT(1), 
	place_id INT, 
	price_per_adult DECIMAL(10, 2),
        price_per_child DECIMAL(10, 2), 
	region_id INT,
        rules TEXT, 
	title VARCHAR(512), 
	updated_at DATE, 
	user_id INT
);

