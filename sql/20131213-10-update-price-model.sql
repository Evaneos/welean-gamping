DROP PROCEDURE IF EXISTS update_price_model;

DELIMITER $$

CREATE DEFINER=CURRENT_USER PROCEDURE update_price_model ( ) 
BEGIN
	DECLARE colName TEXT;
	SELECT IFNULL(column_name, '') INTO @colName
	FROM information_schema.columns 
	WHERE table_name = 'parcel'
	AND column_name = 'price_per_child';

	IF @colName = '' THEN 
		ALTER TABLE parcel CHANGE price_per_child price_per_extra DECIMAL(10, 2);
	END IF;
END$$

DELIMITER ;

CALL update_price_model;

DROP PROCEDURE update_price_model;


