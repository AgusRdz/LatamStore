SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `store` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `store` ;

-- -----------------------------------------------------
-- Table `store`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `store`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NULL ,
  `pass` VARCHAR(45) NULL ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_pay_companies`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `store`.`store_pay_companies` (
  `IdPayCompany` INT NOT NULL AUTO_INCREMENT ,
  `Company` VARCHAR(60) NULL ,
  `WebSite` VARCHAR(100) NULL ,
  PRIMARY KEY (`IdPayCompany`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_payments_accounts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `store`.`store_payments_accounts` (
  `Account` VARCHAR(100) NOT NULL ,
  `IdPayCompany` INT NOT NULL ,
  INDEX `fk_store_payments_accounts_store_pay_companies1` (`IdPayCompany` ASC) ,
  PRIMARY KEY (`Account`) ,
  CONSTRAINT `fk_store_payments_accounts_store_pay_companies1`
    FOREIGN KEY (`IdPayCompany` )
    REFERENCES `store`.`store_pay_companies` (`IdPayCompany` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_order`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `store`.`store_order` (
  `IdOrder` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `Date` DATETIME NULL ,
  `Period` VARCHAR(45) NULL ,
  `Status` INT NULL ,
  `Account` VARCHAR(100) NOT NULL ,
  `Total` INT NULL ,
  PRIMARY KEY (`IdOrder`) ,
  INDEX `fk_store_order_user1` (`user_id` ASC) ,
  INDEX `fk_store_order_store_payments_accounts1` (`Account` ASC) ,
  CONSTRAINT `fk_store_order_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `store`.`user` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_store_order_store_payments_accounts1`
    FOREIGN KEY (`Account` )
    REFERENCES `store`.`store_payments_accounts` (`Account` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_labels`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `store`.`store_labels` (
  `IdLabel` INT NOT NULL AUTO_INCREMENT ,
  `Link` INT NULL ,
  `Label` VARCHAR(80) NULL ,
  PRIMARY KEY (`IdLabel`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `store`.`store_products` (
  `IdProduct` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NULL ,
  `Description` VARCHAR(250) NULL ,
  `UrlAdquire` TEXT NULL ,
  `Image` TEXT NULL ,
  `Public` INT NULL ,
  `Mount` INT NULL ,
  `VP` INT NULL ,
  `Index` INT NULL ,
  `Order` INT NULL ,
  `Shine` VARCHAR(45) NULL ,
  `IdLabel` INT NOT NULL ,
  PRIMARY KEY (`IdProduct`) ,
  INDEX `fk_store_products_store_labels1` (`IdLabel` ASC) ,
  CONSTRAINT `fk_store_products_store_labels1`
    FOREIGN KEY (`IdLabel` )
    REFERENCES `store`.`store_labels` (`IdLabel` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_order_detail`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `store`.`store_order_detail` (
  `Mount` INT NULL ,
  `IdProduct` INT NOT NULL ,
  `IdOrder` INT NOT NULL ,
  INDEX `fk_store_order_detail_store_products1` (`IdProduct` ASC) ,
  INDEX `fk_store_order_detail_store_order1` (`IdOrder` ASC) ,
  CONSTRAINT `fk_store_order_detail_store_products1`
    FOREIGN KEY (`IdProduct` )
    REFERENCES `store`.`store_products` (`IdProduct` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_store_order_detail_store_order1`
    FOREIGN KEY (`IdOrder` )
    REFERENCES `store`.`store_order` (`IdOrder` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_features`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `store`.`store_features` (
  `IdFeature` INT NOT NULL AUTO_INCREMENT ,
  `IdProduct` INT NOT NULL ,
  `Tittle` VARCHAR(120) NULL ,
  `Descripcion` TEXT NULL ,
  `Public` INT NULL ,
  PRIMARY KEY (`IdFeature`) ,
  INDEX `fk_store_features_store_products1` (`IdProduct` ASC) ,
  CONSTRAINT `fk_store_features_store_products1`
    FOREIGN KEY (`IdProduct` )
    REFERENCES `store`.`store_products` (`IdProduct` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_pay`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `store`.`store_pay` (
  `IdPay` INT NOT NULL AUTO_INCREMENT ,
  `IdOrder` INT NOT NULL ,
  `Mount` INT NOT NULL ,
  PRIMARY KEY (`IdPay`) ,
  INDEX `fk_store_pay_store_order1` (`IdOrder` ASC) ,
  CONSTRAINT `fk_store_pay_store_order1`
    FOREIGN KEY (`IdOrder` )
    REFERENCES `store`.`store_order` (`IdOrder` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_prodcuts_image`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `store`.`store_prodcuts_image` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `IdProduct` INT NOT NULL ,
  `Image` TEXT NULL ,
  `thumbail` INT NULL ,
  INDEX `fk_store_prodcuts_image_store_products1` (`IdProduct` ASC) ,
  PRIMARY KEY (`Id`) ,
  CONSTRAINT `fk_store_prodcuts_image_store_products1`
    FOREIGN KEY (`IdProduct` )
    REFERENCES `store`.`store_products` (`IdProduct` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
