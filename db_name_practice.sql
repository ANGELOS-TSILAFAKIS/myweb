SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `db_name_practice` ;
CREATE SCHEMA IF NOT EXISTS `db_name_practice` DEFAULT CHARACTER SET utf8 ;
USE `db_name_practice` ;

-- -----------------------------------------------------
-- Table `db_name_practice`.`student_registration`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`student_registration` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`student_registration` (
  `student_registration_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(40) NOT NULL ,
  `password` VARCHAR(40) NOT NULL ,
  `afm` VARCHAR(40) NOT NULL ,
  `name` VARCHAR(40) NOT NULL ,
  `surname` VARCHAR(40) NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  `level_A` TINYINT NOT NULL ,
  `efforts` TINYINT NOT NULL ,
  PRIMARY KEY (`student_registration_id`) ,
  UNIQUE INDEX `idstudent_registration_UNIQUE` (`student_registration_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_name_practice`.`subject_profesor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`subject_profesor` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`subject_profesor` (
  `subject_meet_practice_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `e_mail` VARCHAR(40) NOT NULL ,
  `title` VARCHAR(40) NOT NULL ,
  `text` TEXT NOT NULL ,
  `subject_practice_create_time` DATE NOT NULL ,
  `subject_practice_delete_time` DATE NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  `student_registration_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`subject_meet_practice_id`) ,
  UNIQUE INDEX `subject_practice_id_UNIQUE` (`subject_meet_practice_id` ASC) ,
  INDEX `fk_subject_profesor_student_registration1_idx` (`student_registration_id` ASC) ,
  CONSTRAINT `fk_subject_profesor_student_registration1`
    FOREIGN KEY (`student_registration_id` )
    REFERENCES `db_name_practice`.`student_registration` (`student_registration_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_name_practice`.`basic_student_registration`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`basic_student_registration` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`basic_student_registration` (
  `request_master_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `surname` VARCHAR(40) NOT NULL ,
  `name` VARCHAR(40) NOT NULL ,
  `name_father` VARCHAR(40) NOT NULL ,
  `name_mother` VARCHAR(40) NOT NULL ,
  `Registration_Number` VARCHAR(40) NOT NULL ,
  `half_year_insertion` VARCHAR(40) NOT NULL ,
  `Identity_Card` VARCHAR(40) NOT NULL ,
  `afm` VARCHAR(40) NOT NULL ,
  `TAX_OFFICE` VARCHAR(40) NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  `subject_meet_practice_id` INT UNSIGNED NOT NULL ,
  `student_registration_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`request_master_id`, `subject_meet_practice_id`) ,
  UNIQUE INDEX `request_master_id_UNIQUE` (`request_master_id` ASC) ,
  INDEX `fk_basic_student_registration_subject_profesor1_idx` (`subject_meet_practice_id` ASC) ,
  INDEX `fk_basic_student_registration_student_registration1_idx` (`student_registration_id` ASC) ,
  CONSTRAINT `fk_basic_student_registration_subject_profesor1`
    FOREIGN KEY (`subject_meet_practice_id` )
    REFERENCES `db_name_practice`.`subject_profesor` (`subject_meet_practice_id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_basic_student_registration_student_registration1`
    FOREIGN KEY (`student_registration_id` )
    REFERENCES `db_name_practice`.`student_registration` (`student_registration_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_name_practice`.`Business`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`Business` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`Business` (
  `request_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `request_master_id` INT UNSIGNED NOT NULL ,
  `Company_Name` VARCHAR(40) NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`request_id`, `request_master_id`) ,
  UNIQUE INDEX `request_id_UNIQUE` (`request_id` ASC) ,
  INDEX `fk_Business_basic_student_registration_idx` (`request_master_id` ASC) ,
  CONSTRAINT `fk_Business_basic_student_registration`
    FOREIGN KEY (`request_master_id` )
    REFERENCES `db_name_practice`.`basic_student_registration` (`request_master_id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_name_practice`.`Responsible_Business`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`Responsible_Business` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`Responsible_Business` (
  `request_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `request_master_id` INT UNSIGNED NOT NULL ,
  `Responsible_Business` VARCHAR(40) NOT NULL ,
  `phone_Responsible_Business` VARCHAR(40) NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`request_id`, `request_master_id`) ,
  UNIQUE INDEX `request_id_UNIQUE` (`request_id` ASC) ,
  INDEX `fk_Responsible_Business_basic_student_registration1_idx` (`request_master_id` ASC) ,
  CONSTRAINT `fk_Responsible_Business_basic_student_registration1`
    FOREIGN KEY (`request_master_id` )
    REFERENCES `db_name_practice`.`basic_student_registration` (`request_master_id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_name_practice`.`Responsible_monitoring`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`Responsible_monitoring` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`Responsible_monitoring` (
  `request_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `request_master_id` INT UNSIGNED NOT NULL ,
  `Responsible_monitoring` VARCHAR(40) NOT NULL ,
  `phone_Responsible_monitoring` VARCHAR(40) NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`request_id`, `request_master_id`) ,
  UNIQUE INDEX `request_id_UNIQUE` (`request_id` ASC) ,
  INDEX `fk_Responsible_monitoring_basic_student_registration1_idx` (`request_master_id` ASC) ,
  CONSTRAINT `fk_Responsible_monitoring_basic_student_registration1`
    FOREIGN KEY (`request_master_id` )
    REFERENCES `db_name_practice`.`basic_student_registration` (`request_master_id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_name_practice`.`business_address`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`business_address` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`business_address` (
  `request_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `request_master_id` INT UNSIGNED NOT NULL ,
  `street` VARCHAR(40) NOT NULL ,
  `number` VARCHAR(40) NOT NULL ,
  `postal_code` VARCHAR(40) NOT NULL ,
  `town_village` VARCHAR(40) NOT NULL ,
  `phone_business_address` VARCHAR(40) NOT NULL ,
  `fax` VARCHAR(40) NOT NULL ,
  `e_mail` VARCHAR(40) NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`request_id`, `request_master_id`) ,
  UNIQUE INDEX `request_id_UNIQUE` (`request_id` ASC) ,
  INDEX `fk_business_address_basic_student_registration1_idx` (`request_master_id` ASC) ,
  CONSTRAINT `fk_business_address_basic_student_registration1`
    FOREIGN KEY (`request_master_id` )
    REFERENCES `db_name_practice`.`basic_student_registration` (`request_master_id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_name_practice`.`object_business`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`object_business` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`object_business` (
  `request_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `request_master_id` INT UNSIGNED NOT NULL ,
  `enterprise_object` TEXT NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`request_id`, `request_master_id`) ,
  UNIQUE INDEX `request_id_UNIQUE` (`request_id` ASC) ,
  INDEX `fk_object_business_basic_student_registration1_idx` (`request_master_id` ASC) ,
  CONSTRAINT `fk_object_business_basic_student_registration1`
    FOREIGN KEY (`request_master_id` )
    REFERENCES `db_name_practice`.`basic_student_registration` (`request_master_id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_name_practice`.`adoption_practice`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`adoption_practice` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`adoption_practice` (
  `request_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `request_master_id` INT UNSIGNED NOT NULL ,
  `date_practice` VARCHAR(40) NOT NULL ,
  `employment_subject` TEXT NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`request_id`, `request_master_id`) ,
  UNIQUE INDEX `request_id_UNIQUE` (`request_id` ASC) ,
  INDEX `fk_adoption_practice_basic_student_registration1_idx` (`request_master_id` ASC) ,
  CONSTRAINT `fk_adoption_practice_basic_student_registration1`
    FOREIGN KEY (`request_master_id` )
    REFERENCES `db_name_practice`.`basic_student_registration` (`request_master_id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_name_practice`.`committee_practical_exercise`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`committee_practical_exercise` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`committee_practical_exercise` (
  `request_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `request_master_id` INT UNSIGNED NOT NULL ,
  `File_Number_practice` VARCHAR(40) NOT NULL ,
  `code_Number_practice` VARCHAR(40) NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`request_id`, `request_master_id`) ,
  UNIQUE INDEX `request_id_UNIQUE` (`request_id` ASC) ,
  INDEX `fk_committee_practical_exercise_basic_student_registration1_idx` (`request_master_id` ASC) ,
  CONSTRAINT `fk_committee_practical_exercise_basic_student_registration1`
    FOREIGN KEY (`request_master_id` )
    REFERENCES `db_name_practice`.`basic_student_registration` (`request_master_id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_name_practice`.`When_contacting_1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`When_contacting_1` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`When_contacting_1` (
  `request_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `request_master_id` INT UNSIGNED NOT NULL ,
  `street1` VARCHAR(40) NOT NULL ,
  `number1` VARCHAR(40) NOT NULL ,
  `postal_code1` VARCHAR(40) NOT NULL ,
  `town_village1` VARCHAR(40) NOT NULL ,
  `phone_business_address1` VARCHAR(40) NOT NULL ,
  `fax1` VARCHAR(40) NOT NULL ,
  `e_mail1` VARCHAR(40) NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`request_id`, `request_master_id`) ,
  UNIQUE INDEX `request_id_UNIQUE` (`request_id` ASC) ,
  INDEX `fk_When_contacting_1_basic_student_registration1_idx` (`request_master_id` ASC) ,
  CONSTRAINT `fk_When_contacting_1_basic_student_registration1`
    FOREIGN KEY (`request_master_id` )
    REFERENCES `db_name_practice`.`basic_student_registration` (`request_master_id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_name_practice`.`When_contacting_2`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_name_practice`.`When_contacting_2` ;

CREATE  TABLE IF NOT EXISTS `db_name_practice`.`When_contacting_2` (
  `request_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `request_master_id` INT UNSIGNED NOT NULL ,
  `street2` VARCHAR(40) NOT NULL ,
  `number2` VARCHAR(40) NOT NULL ,
  `postal_code2` VARCHAR(40) NOT NULL ,
  `town_village2` VARCHAR(40) NOT NULL ,
  `phone_business_address2` VARCHAR(40) NOT NULL ,
  `fax2` VARCHAR(40) NOT NULL ,
  `e_mail2` VARCHAR(40) NOT NULL ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`request_id`, `request_master_id`) ,
  UNIQUE INDEX `request_id_UNIQUE` (`request_id` ASC) ,
  INDEX `fk_When_contacting_2_basic_student_registration1_idx` (`request_master_id` ASC) ,
  CONSTRAINT `fk_When_contacting_2_basic_student_registration1`
    FOREIGN KEY (`request_master_id` )
    REFERENCES `db_name_practice`.`basic_student_registration` (`request_master_id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
