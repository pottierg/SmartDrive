SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

USE `bddrive` ;

-- -----------------------------------------------------
-- Table `bddrive`.`Rayon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bddrive`.`Rayon` (
  `idRayon` INT NOT NULL AUTO_INCREMENT,
  `nomRayon` VARCHAR(45) NOT NULL,
  `imageRayon` BLOB NOT NULL,
  `couleurRayon` VARCHAR(45) NOT NULL,
  `couleurCompRayon` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRayon`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bddrive`.`Produit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bddrive`.`Produit` (
  `idProduit` INT NOT NULL AUTO_INCREMENT,
  `nomProduit` VARCHAR(45) NOT NULL,
  `imageProduit` BLOB NOT NULL,
  `descriptionProduit` VARCHAR(300) NOT NULL,
  `prixProduit` INT NOT NULL,
  `nombreProduit` INT NOT NULL,
  `Rayon_idRayon` INT NOT NULL,
  PRIMARY KEY (`idProduit`),
  INDEX `fk_Produit_Rayon_idx` (`Rayon_idRayon` ASC),
  CONSTRAINT `fk_Produit_Rayon`
    FOREIGN KEY (`Rayon_idRayon`)
    REFERENCES `bddrive`.`Rayon` (`idRayon`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bddrive`.`Adresse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bddrive`.`Adresse` (
  `idAdresse` INT NOT NULL AUTO_INCREMENT,
  `numeroAdresse` INT NOT NULL,
  `rueAdresse` VARCHAR(45) NOT NULL,
  `villeAdresse` VARCHAR(45) NOT NULL,
  `codePostalAdresse` INT NOT NULL,
  `telephoneAdresse` INT NOT NULL,
  PRIMARY KEY (`idAdresse`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bddrive`.`Drive`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bddrive`.`Drive` (
  `idDrive` INT NOT NULL AUTO_INCREMENT,
  `nomDrive` VARCHAR(45) NOT NULL,
  `Adresse_idAdresse` INT NOT NULL,
  PRIMARY KEY (`idDrive`),
  INDEX `fk_Drive_Adresse_idx` (`Adresse_idAdresse` ASC),
  CONSTRAINT `fk_Drive_Adresse`
    FOREIGN KEY (`Adresse_idAdresse`)
    REFERENCES `bddrive`.`Adresse` (`idAdresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bddrive`.`Client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bddrive`.`Client` (
  `idClient` INT NOT NULL AUTO_INCREMENT,
  `emailClient` VARCHAR(45) NOT NULL,
  `mdpClient` VARCHAR(45) NOT NULL,
  `nomClient` VARCHAR(45) NOT NULL,
  `prenomClient` VARCHAR(45) NOT NULL,
  `Adresse_idAdresse` INT NOT NULL,
  PRIMARY KEY (`idClient`),
  INDEX `fk_Utilisateur_Adresse_idx` (`Adresse_idAdresse` ASC),
  CONSTRAINT `fk_Utilisateur_Adresse`
    FOREIGN KEY (`Adresse_idAdresse`)
    REFERENCES `bddrive`.`Adresse` (`idAdresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bddrive`.`Commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bddrive`.`Commande` (
  `idCommande` INT NOT NULL AUTO_INCREMENT,
  `dateCommande` DATETIME NOT NULL,
  `Drive_idDrive` INT NOT NULL,
  `Client_idClient` INT NOT NULL,
  INDEX `fk_Commande_Drive_idx` (`Drive_idDrive` ASC),
  INDEX `fk_Commande_Client_idx` (`Client_idClient` ASC),
  PRIMARY KEY (`idCommande`),
  CONSTRAINT `fk_Commande_Drive`
    FOREIGN KEY (`Drive_idDrive`)
    REFERENCES `bddrive`.`Drive` (`idDrive`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Commande_Client`
    FOREIGN KEY (`Client_idClient`)
    REFERENCES `bddrive`.`Client` (`idClient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bddrive`.`ProduitCommande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bddrive`.`ProduitCommande` (
  `nombreProduitCommande` INT NOT NULL,
  `Produit_idProduit` INT NOT NULL,
  `Commande_idCommande` INT NOT NULL,
  PRIMARY KEY (`Produit_idProduit`, `Commande_idCommande`),
  INDEX `fk_ProduitCommande_Commande_idx` (`Commande_idCommande` ASC),
  CONSTRAINT `fk_ProduitCommande_Produit`
    FOREIGN KEY (`Commande_idCommande`)
    REFERENCES `bddrive`.`Produit` (`idProduit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProduitCommande_Commande`
    FOREIGN KEY (`Commande_idCommande`)
    REFERENCES `bddrive`.`Commande` (`idCommande`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
