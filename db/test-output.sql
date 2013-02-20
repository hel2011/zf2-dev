SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user2`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`user2` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`user2` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `cwid` VARCHAR(8) NULL ,
  `is_active` TINYINT(1) NULL ,
  `create_date` DATETIME NULL ,
  `modify_date` DATETIME NULL ,
  `user2col` VARCHAR(45) NULL ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
