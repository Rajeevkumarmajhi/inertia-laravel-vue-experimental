SELECT blood_group,date_of_birth, 
	CASE 
		WHEN date_of_birth < 10  THEN 'old'
		WHEN date_of_birth > 20  THEN 'child'
	ELSE 'Not Available'
	END AS date_of_birth_category
FROM `appliedusers`;



DELIMITER //

CREATE FUNCTION classify_number(num INT) RETURNS VARCHAR(20)
BEGIN
    DECLARE classification VARCHAR(20);
    
    IF num > 0 THEN
        SET classification = 'Positive';
    ELSEIF num < 0 THEN
        SET classification = 'Negative';
    ELSE
        SET classification = 'Zero';
    END IF;
    
    RETURN classification;
END //

DELIMITER ;



DELIMITER //

-- Drop the existing function if it already exists
DROP FUNCTION IF EXISTS custom_add //

CREATE FUNCTION custom_add(a INT, b INT) RETURNS INT
BEGIN
    DECLARE result INT;
    SET result = a + b;
    RETURN result;
END //

DELIMITER ;

SELECT quantity_in_kg
FROM wastages_stock
WHERE id > custom_add(5, 7);