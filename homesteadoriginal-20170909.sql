-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "rir_expenses" -----------------------------
-- CREATE TABLE "rir_expenses" ---------------------------------
CREATE TABLE `rir_expenses` ( 
	`id` Int( 255 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`Day` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`Category` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`Item` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`Quantity` Int( 255 ) NULL,
	`Price` Decimal( 10, 2 ) NOT NULL,
	`user_id` Int( 255 ) UNSIGNED NOT NULL,
	`Transaction_Date` DateTime NOT NULL,
	`Entry_Date` DateTime NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 36;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "rir_user" ---------------------------------
-- CREATE TABLE "rir_user" -------------------------------------
CREATE TABLE `rir_user` ( 
	`id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`User_IC_Number` VarChar( 14 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`User_Fullname` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`User_Name` VarChar( 64 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`User_Password` VarChar( 200 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`User_Birthdate` VarChar( 10 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`User_Email` VarChar( 200 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- Dump data of "rir_expenses" -----------------------------
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '22', 'Wednesday, 2017/09/06 15:41', 'Alat Tulis', 'pen', '1', '2.00', '3', '2017-09-06 15:41:41', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '23', 'Friday, 2017/09/08 15:41', 'Sedekah', 'jariah', '1', '50.00', '3', '2017-09-06 15:46:52', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '24', 'Friday, 2017/08/25 15:48', 'Petrol', 'bas', '1', '50.00', '3', '2017-09-06 15:48:56', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '25', 'Thursday, 2017/09/14 16:25', 'Petrol', 'bas', '2', '512.00', '3', '2017-09-06 16:25:32', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '26', 'Monday, 2017/06/05 15:00', 'Simkad dan Telefon', 'nokia', '1', '124.00', '3', '2017-09-06 16:27:53', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '27', 'Saturday, 2017/09/09', 'Yuran', 'sekolah', '1', '100.00', '3', '2017-09-06 16:29:24', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '28', 'Friday, 2017/09/08 00:00', 'Alat Tulis', 'pensil', '1', '12.00', '3', '2017-09-06 16:30:17', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '29', 'Thursday, 2017/09/07', 'Buku Rujukan', 'Buku geografi s', '1', '1.00', '3', '2017-09-06 16:34:23', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '31', 'Thursday, 2017/09/07', 'Buku Rujukan', 'test', '1', '12.00', '2', '2017-08-10 14:35:00', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '32', 'Wednesday, 2017/09/06', 'Makan dan Minum', 'kfc', '1', '14.00', '2', '2017-09-07 16:02:43', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '33', 'Friday', 'Petrol', 'fuel up', '1', '50.00', '2', '2017-09-08 16:10:00', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '34', 'Tuesday', 'Alat Tulis', 'pensel', '1', '2.70', '2', '2017-09-19 16:10:00', NULL );
INSERT INTO `rir_expenses`(`id`,`Day`,`Category`,`Item`,`Quantity`,`Price`,`user_id`,`Transaction_Date`,`Entry_Date`) VALUES ( '35', 'Tuesday', 'Buku Rujukan', 'JS Book', '1', '39.00', '2', '2017-08-15 16:18:00', '2017-09-08 16:18:54' );
-- ---------------------------------------------------------


-- Dump data of "rir_user" ---------------------------------
INSERT INTO `rir_user`(`id`,`User_IC_Number`,`User_Fullname`,`User_Name`,`User_Password`,`User_Birthdate`,`User_Email`) VALUES ( '1', '970118-43-5323', 'Muhammad Amir Iqmal Bin Ahmad Sukri', 'MyIqmal', '5f4dcc3b5aa765d61d8327deb882cf99', '18/01/1997', 'mypainzs@gmail.com' );
INSERT INTO `rir_user`(`id`,`User_IC_Number`,`User_Fullname`,`User_Name`,`User_Password`,`User_Birthdate`,`User_Email`) VALUES ( '2', '800828-02-5351', 'Khairil Anuar', 'khairil', '76a2173be6393254e72ffa4d6df1030a', '', 'khairil@gmail.com' );
INSERT INTO `rir_user`(`id`,`User_IC_Number`,`User_Fullname`,`User_Name`,`User_Password`,`User_Birthdate`,`User_Email`) VALUES ( '3', '12345', 'Alex Locus', 'Alexile', '5a105e8b9d40e1329780d62ea2265d8a', '2009-07-15', 'alex_locus@gmail.com' );
INSERT INTO `rir_user`(`id`,`User_IC_Number`,`User_Fullname`,`User_Name`,`User_Password`,`User_Birthdate`,`User_Email`) VALUES ( '4', '', 'Alex Locus', 'Alexile', 'd41d8cd98f00b204e9800998ecf8427e', '2009-07-15', 'alex_locus@gmail.com' );
-- ---------------------------------------------------------


-- CREATE INDEX "rir_expenses_fk1" -------------------------
-- CREATE INDEX "rir_expenses_fk1" -----------------------------
CREATE INDEX `rir_expenses_fk1` USING BTREE ON `rir_expenses`( `user_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "rir_expenses_fk1" --------------------------
-- CREATE LINK "rir_expenses_fk1" ------------------------------
ALTER TABLE `rir_expenses`
	ADD CONSTRAINT `rir_expenses_fk1` FOREIGN KEY ( `user_id` )
	REFERENCES `rir_user`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


