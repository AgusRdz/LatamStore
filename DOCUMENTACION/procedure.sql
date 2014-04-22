DELIMITER $$

DROP PROCEDURE IF EXISTS `dianuj`.`GetTopParentGivenDepth` $$
CREATE PROCEDURE `dianuj`.`GetTopParentGivenDepth` (GivenDepth INT)
BEGIN

    DECLARE x1,x2 INT;

    SET x = 0;
    SET y = 1;
    SET @SQ = 'SELECT DISTINCT A0.id FROM prarent A0';
    WHILE y < GivenDepth DO
        SET @SQ = CONCAT(@SQ,' INNER JOIN prarent A',y,' ON A',x,'.id = A',y,'.parent_id');
        SET x = y;
        SET y = x + 1;
    END WHILE;
    SET @SQ = CONCAT(@SQ,' WHERE A0.parent_id = 0');
    SELECT @SQ;
    PREPARE stmt FROM @SQ;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

END $$

DELIMITER ;