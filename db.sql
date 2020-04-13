CREATE TABLE `school`.`device` (
    devID INT(11) NOT NULL AUTO_INCREMENT ,
    devName VARCHAR(50) NOT NULL ,
    model VARCHAR(50) NOT NULL ,
    price INT(8) NOT NULL ,
    purchaseDate DATE NOT NULL ,
    specification TEXT NOT NULL ,
    depart VARCHAR(30) NOT NULL ,
    manager VARCHAR(30) NOT NULL ,
    PRIMARY KEY (`devID`)) ENGINE = InnoDB;
