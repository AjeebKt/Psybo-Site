SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Table `psyboysg_psybo-db`.`files`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `psyboysg_psybo-db`.`files` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(10) NOT NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `psyboysg_psybo-db`.`address`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `psyboysg_psybo-db`.`address` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NULL,
  `address` VARCHAR(70) NULL,
  `email` VARCHAR(40) NULL,
  `telephone` VARCHAR(13) NULL,
  `mobile` VARCHAR(13) NULL,
  `website` VARCHAR(45) NULL,
  `linkedin` VARCHAR(50) NULL,
  `fb` VARCHAR(50) NULL,
  `twiter` VARCHAR(50) NULL,
  `git` VARCHAR(60) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `psyboysg_psybo-db`.`employee`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `psyboysg_psybo-db`.`employee` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `designation` VARCHAR(45) NOT NULL,
  `files_id` INT NOT NULL,
  `address_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_employee_files_idx` (`files_id` ASC),
  INDEX `fk_employee_address1_idx` (`address_id` ASC),
  CONSTRAINT `fk_employee_files`
    FOREIGN KEY (`files_id`)
    REFERENCES `psyboysg_psybo-db`.`files` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_address1`
    FOREIGN KEY (`address_id`)
    REFERENCES `psyboysg_psybo-db`.`address` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `psyboysg_psybo-db`.`admin`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `psyboysg_psybo-db`.`admin` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `password` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `psyboysg_psybo-db`.`company_details`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `psyboysg_psybo-db`.`company_details` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `no_holidays` INT NULL,
  `open_time` TIME NULL,
  `close_time` VARCHAR(45) NULL,
  `address_id` INT NOT NULL,
  PRIMARY KEY (`id`, `address_id`),
  INDEX `fk_company_details_address1_idx` (`address_id` ASC),
  CONSTRAINT `fk_company_details_address1`
    FOREIGN KEY (`address_id`)
    REFERENCES `psyboysg_psybo-db`.`address` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `psyboysg_psybo-db`.`portfolio`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `psyboysg_psybo-db`.`portfolio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(75) NULL,
  `link` VARCHAR(80) NULL,
  `about` VARCHAR(250) NULL,
  `files_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_portfolio_files1_idx` (`files_id` ASC),
  CONSTRAINT `fk_portfolio_files1`
    FOREIGN KEY (`files_id`)
    REFERENCES `psyboysg_psybo-db`.`files` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `psyboysg_psybo-db`.`testimonial`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `psyboysg_psybo-db`.`testimonial` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(250) NULL,
  `link` VARCHAR(85) NULL,
  `files_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_testimonial_files1_idx` (`files_id` ASC),
  CONSTRAINT `fk_testimonial_files1`
    FOREIGN KEY (`files_id`)
    REFERENCES `psyboysg_psybo-db`.`files` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
