-- MySQL Script generated by MySQL Workbench
-- 07/20/19 18:41:42
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema elearning
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema elearning
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `elearning` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `elearning` ;

-- -----------------------------------------------------
-- Table `elearning`.`ms_pengguna`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`ms_pengguna` (
  `id_pengguna` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user` VARCHAR(45) NULL COMMENT '',
  `password` VARCHAR(45) NULL COMMENT '',
  `level` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id_pengguna`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`ms_dosen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`ms_dosen` (
  `id_dosen` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nama` VARCHAR(45) NULL COMMENT '',
  `nidn` VARCHAR(45) NULL COMMENT '',
  `email` VARCHAR(45) NULL COMMENT '',
  `tgl_lhr` VARCHAR(45) NULL COMMENT '',
  `alamat` VARCHAR(45) NULL COMMENT '',
  `foto` VARCHAR(45) NULL COMMENT '',
  `id_pengguna` INT NULL COMMENT '',
  PRIMARY KEY (`id_dosen`)  COMMENT '',
  CONSTRAINT `fk_ms_dosen_ms_pengguna1`
    FOREIGN KEY (`id_pengguna`)
    REFERENCES `elearning`.`ms_pengguna` (`id_pengguna`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`ms_mahasiswa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`ms_mahasiswa` (
  `id_mahasiswa` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nim` INT NULL COMMENT '',
  `nama` VARCHAR(45) NULL COMMENT '',
  `email` VARCHAR(45) NULL COMMENT '',
  `tgl_lhr` VARCHAR(45) NULL COMMENT '',
  `alamat` VARCHAR(45) NULL COMMENT '',
  `foto` VARCHAR(45) NULL COMMENT '',
  `id_pengguna` INT NULL COMMENT '',
  PRIMARY KEY (`id_mahasiswa`)  COMMENT '',
  CONSTRAINT `fk_ms_mahasiswa_ms_pengguna`
    FOREIGN KEY (`id_pengguna`)
    REFERENCES `elearning`.`ms_pengguna` (`id_pengguna`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`ms_matkul`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`ms_matkul` (
  `id_matkul` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nm_matkul` VARCHAR(45) NULL COMMENT '',
  `judul` VARCHAR(45) NULL COMMENT '',
  `deskripsi` VARCHAR(45) NULL COMMENT '',
  `file` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id_matkul`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`dosen_teachs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`dosen_teachs` (
  `id_dosen_teachs` INT NOT NULL COMMENT '',
  `id_dosen` INT NOT NULL COMMENT '',
  `id_matkul` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id_dosen_teachs`)  COMMENT '',
  CONSTRAINT `fk_dosen_teachs_id_dosen`
    FOREIGN KEY (`id_dosen`)
    REFERENCES `elearning`.`ms_dosen` (`id_dosen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dosen_teachs_id_matkul`
    FOREIGN KEY (`id_matkul`)
    REFERENCES `elearning`.`ms_matkul` (`id_matkul`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`mahasiswa_follows`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`mahasiswa_follows` (
  `idmahasiswa_follows` INT NOT NULL COMMENT '',
  `id_mahasiswa` INT NOT NULL COMMENT '',
  `id_matkul` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idmahasiswa_follows`)  COMMENT '',
  CONSTRAINT `fk_mahasiswa_follows_id_mahasiswa`
    FOREIGN KEY (`id_mahasiswa`)
    REFERENCES `elearning`.`ms_mahasiswa` (`id_mahasiswa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mahasiswa_follows_id_matkul`
    FOREIGN KEY (`id_matkul`)
    REFERENCES `elearning`.`ms_matkul` (`id_matkul`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `elearning` ;

-- -----------------------------------------------------
-- Placeholder table for view `elearning`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`view1` (`id` INT);

-- -----------------------------------------------------
-- View `elearning`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`view1`;
USE `elearning`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
