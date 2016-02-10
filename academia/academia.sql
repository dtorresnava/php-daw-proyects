SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `academia` DEFAULT CHARACTER SET utf8 ;
USE `academia` ;

-- -----------------------------------------------------
-- Table `academia`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `academia`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `usuario` CHAR(16) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL ,
  `nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL ,
  `email` VARCHAR(128) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL ,
  `password` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL ,
  `fecha_alta` DATE NULL DEFAULT NULL ,
  `estado` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL ,
  `telefono` CHAR(9) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL ,
  `origen` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL ,
  `observ` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL ,
  `ult_fecha` DATE NOT NULL ,
  `roles` CHAR(8) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `academia`.`actividades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `academia`.`actividades` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `actividad` VARCHAR(30) NOT NULL ,
  `detalle` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `academia`.`salas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `academia`.`salas` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `academia`.`grupos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `academia`.`grupos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `actividades_id` INT(11) NOT NULL ,
  `fecha_inicio` DATE NULL ,
  `fecha_fin` DATE NULL ,
  `dias_semana` CHAR(7) NULL ,
  `horario` CHAR(10) NULL ,
  `estado` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL COMMENT 'A=Abierta inscripción\nI=Inscripción cerrada\nT=Terminado\n' ,
  `cuota` DECIMAL(5,2) NULL ,
  `profesor_id` INT(11) NOT NULL ,
  `salas_id` INT NOT NULL ,
  `plazas` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_grupos_actividades1_idx` (`actividades_id` ASC) ,
  INDEX `fk_grupos_usuarios1_idx` (`profesor_id` ASC) ,
  INDEX `fk_grupos_salas1_idx` (`salas_id` ASC) ,
  CONSTRAINT `fk_grupos_actividades1`
    FOREIGN KEY (`actividades_id` )
    REFERENCES `academia`.`actividades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupos_usuarios1`
    FOREIGN KEY (`profesor_id` )
    REFERENCES `academia`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupos_salas1`
    FOREIGN KEY (`salas_id` )
    REFERENCES `academia`.`salas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `academia`.`apuntes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `academia`.`apuntes` (
  `id` INT(11) NOT NULL ,
  `usuarios_id` INT(11) NOT NULL ,
  `importe` DECIMAL(3,0) NULL DEFAULT NULL ,
  `concepto` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL ,
  `fecha` DATE NULL DEFAULT NULL ,
  `grupos_id` INT(11) NOT NULL ,
  `mes` DATE NULL DEFAULT NULL ,
  `fecha_pago` DATE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_apuntes_usuarios1_idx` (`usuarios_id` ASC) ,
  INDEX `fk_apuntes_grupos1_idx` (`grupos_id` ASC) ,
  CONSTRAINT `fk_apuntes_usuarios1`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `academia`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apuntes_grupos1`
    FOREIGN KEY (`grupos_id` )
    REFERENCES `academia`.`grupos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `academia`.`eventos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `academia`.`eventos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` INT NOT NULL ,
  `fecha1` DATE NULL ,
  `fecha2` DATE NULL DEFAULT NULL ,
  `hora1` TIME NULL DEFAULT NULL ,
  `hora2` TIME NULL DEFAULT NULL ,
  `detalle` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL ,
  `lugar` POINT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `academia`.`asistentes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `academia`.`asistentes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `eventos_id` INT(11) NOT NULL ,
  `usuarios_id` INT(11) NOT NULL ,
  `confirmado` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL COMMENT 'S=Si\nN=No\nQ=Quizás' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_asistentes_eventos1_idx` (`eventos_id` ASC) ,
  INDEX `fk_asistentes_usuarios1_idx` (`usuarios_id` ASC) ,
  CONSTRAINT `fk_asistentes_eventos1`
    FOREIGN KEY (`eventos_id` )
    REFERENCES `academia`.`eventos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asistentes_usuarios1`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `academia`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `academia`.`academia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `academia`.`academia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL ,
  `direccion` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL ,
  `web` VARCHAR(80) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL ,
  `telefono` CHAR(9) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `academia`.`eventos_grupos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `academia`.`eventos_grupos` (
  `eventos_id` INT(11) NOT NULL ,
  `grupos_id` INT(11) NOT NULL ,
  PRIMARY KEY (`eventos_id`, `grupos_id`) ,
  INDEX `fk_eventos_has_grupos_grupos1_idx` (`grupos_id` ASC) ,
  INDEX `fk_eventos_has_grupos_eventos1_idx` (`eventos_id` ASC) ,
  CONSTRAINT `fk_eventos_has_grupos_eventos1`
    FOREIGN KEY (`eventos_id` )
    REFERENCES `academia`.`eventos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_eventos_has_grupos_grupos1`
    FOREIGN KEY (`grupos_id` )
    REFERENCES `academia`.`grupos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `academia`.`usuarios_grupos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `academia`.`usuarios_grupos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `usuarios_id` INT(11) NULL DEFAULT NULL ,
  `grupos_id` INT(11) NULL DEFAULT NULL ,
  `cuota` DECIMAL(5,0) NULL DEFAULT NULL ,
  `fecha_alta` DATE NULL DEFAULT NULL ,
  `fecha_baja` DATE NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_usuarios_has_grupos_grupos1_idx` (`grupos_id` ASC) ,
  INDEX `fk_usuarios_has_grupos_usuarios1_idx` (`usuarios_id` ASC) ,
  CONSTRAINT `fk_usuarios_has_grupos_grupos1`
    FOREIGN KEY (`grupos_id` )
    REFERENCES `academia`.`grupos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_grupos_usuarios1`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `academia`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
