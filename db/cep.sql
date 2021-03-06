/*
SQLyog Enterprise v12.13 (64 bit)
MySQL - 5.7.28 : Database - cad_cep
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cad_cep` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cad_cep`;

/*Table structure for table `cep` */

DROP TABLE IF EXISTS `cep`;

CREATE TABLE `cep` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cep` varchar(10) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `localidade` varchar(120) DEFAULT NULL,
  `bairro` varchar(90) DEFAULT NULL,
  `logradouro` varchar(120) DEFAULT NULL,
  `ibge` varchar(20) DEFAULT NULL,
  `ddd` char(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_cep` (`cep`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `cep` */

insert  into `cep`(`id`,`cep`,`uf`,`localidade`,`bairro`,`logradouro`,`ibge`,`ddd`,`created_at`,`updated_at`) values (4,'89306-076','SC','Mafra','Jardim do Moinho','Avenida Presidente Nereu Ramos','4210100',NULL,'2021-03-04 22:30:16',NULL),(5,'83880-000','PR','Rio Negro','','','4122305',NULL,'2021-03-04 22:31:58',NULL),(6,'89300-450','SC','Mafra','Jardim América','Rodovia BR-116','4210100',NULL,'2021-03-04 22:37:53',NULL),(10,'89300-178','SC','Mafra','Centro I Baixada','Rua Felipe Schmidt','4210100',NULL,'2021-03-05 00:30:07',NULL),(11,'83870-000','PR','Campo do Tenente','','','4104105',NULL,'2021-03-05 00:32:44',NULL),(16,'81550-050','PR','Curitiba','Uberaba','Rua Embu','4106902',NULL,'2021-03-05 01:06:59',NULL),(17,'81550-070','PR','Curitiba','Uberaba','Rua Cajá-manga','4106902',NULL,'2021-03-05 01:07:33',NULL),(18,'83850-000','PR','Agudos do Sul','','','4100301',NULL,'2021-03-05 08:09:31',NULL),(19,'83840-000','PR','Quitandinha','','','4121208','41','2021-03-05 08:10:32',NULL),(20,'83810-000','PR','Mandirituba','Areia Branca dos Assis','','4114302','41','2021-03-05 08:11:11',NULL),(21,'89280-031','SC','São Bento do Sul','Centro','Rua Bárbara Krainsky','4215802','47','2021-03-05 08:12:54',NULL),(22,'89280-010','SC','São Bento do Sul','Centro','Avenida Argolo','4215802','47','2021-03-05 08:13:14',NULL),(23,'89280-016','SC','São Bento do Sul','Centro','Rua Jorge Rank','4215802','47','2021-03-05 08:29:08',NULL),(24,'89280-022','SC','São Bento do Sul','Centro','Rua Doutor Francisco Escobar Filho','4215802','47','2021-03-05 08:32:36',NULL),(25,'89280-076','SC','São Bento do Sul','Centro','Rua Emílio Jungton','4215802','47','2021-03-05 08:35:09',NULL),(26,'89280-061','SC','São Bento do Sul','Centro','Avenida Argolo','4215802','47','2021-03-05 08:40:01',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
