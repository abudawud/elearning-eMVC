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
CREATE SCHEMA IF NOT EXISTS `elearning` DEFAULT CHARACTER SET utf8 ;
USE `elearning` ;

-- -----------------------------------------------------
-- Table `elearning`.`ms_pengguna`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`ms_pengguna` (
  `id_pengguna` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `level` VARCHAR(45) NULL,
  PRIMARY KEY (`id_pengguna`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`ms_dosen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`ms_dosen` (
  `id_dosen` INT NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(45) NULL,
  `nidn` VARCHAR(45) NULL,
  `emali` VARCHAR(45) NULL,
  `tgl_lhr` DATE NULL,
  `alamat` VARCHAR(45) NULL,
  `foto` VARCHAR(45) NULL,
  PRIMARY KEY (`id_dosen`),
    FOREIGN KEY (`ms_pengguna_id_pengguna`)
    REFERENCES `elearning`.`ms_pengguna` (`id_pengguna`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`ms_mahasiswa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`ms_mahasiswa` (
  `id_mahasiswa` INT NOT NULL AUTO_INCREMENT,
  `nim` INT NULL,
  `nama` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `tgl_lhr` DATE NULL,
  `alamat` VARCHAR(45) NULL,
  `foto` VARCHAR(45) NULL,
  PRIMARY KEY (`id_mahasiswa`),
    FOREIGN KEY (`ms_pengguna_id_pengguna`)
    REFERENCES `elearning`.`ms_pengguna` (`id_pengguna`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`ms_matkul`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`ms_matkul` (
  `id_matkul` INT NOT NULL AUTO_INCREMENT,
  `nm_matkul` VARCHAR(45) NULL,
  `judul` VARCHAR(45) NULL,
  `deskripsi` VARCHAR(45) NULL,
  `file` VARCHAR(45) NULL,
  PRIMARY KEY (`id_matkul`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`dosen_teachs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`dosen_teachs` (
  `id_dosen_teachs` INT NOT NULL,
  `id_dosen` INT NOT NULL,
  `id_matkul` INT NOT NULL,
  PRIMARY KEY (`id_dosen_teachs`),
    FOREIGN KEY (`id_dosen`)
    REFERENCES `elearning`.`ms_dosen` (`id_dosen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    FOREIGN KEY (`id_matkul`)
    REFERENCES `elearning`.`ms_matkul` (`id_matkul`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`mahasiswa_follows`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elearning`.`mahasiswa_follows` (
  `idmahasiswa_follows` INT NOT NULL,
  `id_mahasiswa` INT NOT NULL,
  `id_matkul` INT NOT NULL,
  PRIMARY KEY (`idmahasiswa_follows`),
    FOREIGN KEY (`id_mahasiswa`)
    REFERENCES `elearning`.`ms_mahasiswa` (`id_mahasiswa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    FOREIGN KEY (`id_matkul`)
    REFERENCES `elearning`.`ms_matkul` (`id_matkul`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
