-- -----------------------------------------------------
-- Table `employee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `employee` ;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_created` DATETIME NOT NULL DEFAULT NOW(),
  `date_modified` DATETIME NOT NULL DEFAULT NOW(),
  `status` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `task_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `task_type` ;
CREATE TABLE IF NOT EXISTS `task_type` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `date_created` DATETIME NOT NULL DEFAULT NOW(),
  `date_modified` DATETIME NOT NULL DEFAULT NOW(),
  `status` INT NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `task`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `task` ;
CREATE TABLE IF NOT EXISTS `task` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `task_type_id` INT UNSIGNED NOT NULL,
  `employee_id` INT UNSIGNED NOT NULL,
  `date_created` DATETIME NOT NULL DEFAULT NOW(),
  `date_deleted` DATETIME NOT NULL DEFAULT NOW(),
  `status` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `fk_task_employee_idx` (`employee_id` ASC),
  INDEX `fk_task_task_type1_idx` (`task_type_id` ASC),
  CONSTRAINT `fk_task_employee`
    FOREIGN KEY (`employee_id`)
    REFERENCES `mydb`.`employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_task_task_type1`
    FOREIGN KEY (`task_type_id`)
    REFERENCES `task_type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
