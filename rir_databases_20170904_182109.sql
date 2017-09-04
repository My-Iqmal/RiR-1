-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
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
AUTO_INCREMENT = 3;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "rir_expenses" -----------------------------
-- CREATE TABLE "rir_expenses" ---------------------------------
CREATE TABLE `rir_expenses` ( 
	`id` Int( 255 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`item` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`description` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`amount` Decimal( 10, 2 ) NOT NULL,
	`user_id` Int( 255 ) UNSIGNED NOT NULL,
	`transaction_date` DateTime NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- Dump data of "rir_user" ---------------------------------
INSERT INTO `rir_user`(`id`,`User_IC_Number`,`User_Fullname`,`User_Name`,`User_Password`,`User_Birthdate`,`User_Email`) VALUES ( '1', '970118-43-5323', 'Muhammad Amir Iqmal Bin Ahmad Sukri', 'MyIqmal', '5f4dcc3b5aa765d61d8327deb882cf99', '18/01/1997', 'mypainzs@gmail.com' );
INSERT INTO `rir_user`(`id`,`User_IC_Number`,`User_Fullname`,`User_Name`,`User_Password`,`User_Birthdate`,`User_Email`) VALUES ( '2', '800828-02-5351', 'Khairil Anuar', 'khairil', '76a2173be6393254e72ffa4d6df1030a', '', 'khairil@gmail.com' );
-- ---------------------------------------------------------


-- Dump data of "rir_expenses" -----------------------------
INSERT INTO `rir_expenses`(`id`,`transaction_date`,`item`,`description`,`amount`,`user_id`) VALUES ( '1', '2017-09-03 23:49:43', 'test', NULL, '120.00', '2' );
INSERT INTO `rir_expenses`(`id`,`transaction_date`,`item`,`description`,`amount`,`user_id`) VALUES ( '2', '2017-09-03 23:54:28', 'test again', 'transaction description', '14.50', '2' );
INSERT INTO `rir_expenses`(`id`,`transaction_date`,`item`,`description`,`amount`,`user_id`) VALUES ( '3', '2017-09-04 09:09:22', 'ipad3 charger', 'ipad3 charger putus terus', '85.90', '2' );
INSERT INTO `rir_expenses`(`id`,`transaction_date`,`item`,`description`,`amount`,`user_id`) VALUES ( '4', '2017-09-04 10:00:06', 'mee kuning', 'nak buat mee goreng', '4.90', '2' );
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


