/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : gmg_db

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-07-24 19:33:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_module` varchar(255) NOT NULL,
  `id_seccion` varchar(255) NOT NULL,
  `id_idiom` varchar(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES ('102', 'Equipo', 'Equipo2', '1', 'gracinda-gouveia.JPG', '84803', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Equipo/es_ES/gracinda-gouveia.JPG');
INSERT INTO `files` VALUES ('109', 'Inversiones', 'Inversiones1', '1', 'Portada_Negocio_Logística.jpeg', '694098', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Inversiones/es_ES/Portada_Negocio_Logística.jpeg');
INSERT INTO `files` VALUES ('103', 'Equipo', 'Equipo3', '1', 'rodolfo-valdivieso.JPG', '404341', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Equipo/es_ES/rodolfo-valdivieso.JPG');
INSERT INTO `files` VALUES ('104', 'Equipo', 'Equipo4', '1', 'fatima-gouveia.JPG', '681411', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Equipo/es_ES/fatima-gouveia.JPG');
INSERT INTO `files` VALUES ('105', 'Propiedades', 'Propiedades1', '1', '5d7e919a96144ee149050f4c095f19aa.jpg', '13815', 'image/jpeg', 'http://www.globalmoneygroup.com/GMG/assets/images/upload/Propiedades/es_ES/5d7e919a96144ee149050f4c095f19aa.jpg');
INSERT INTO `files` VALUES ('106', 'Propiedades', 'Propiedades4', '1', '2017-03-01.png', '166172', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Propiedades/es_ES/2017-03-01.png');
INSERT INTO `files` VALUES ('107', 'Inversiones', 'Inversiones2', '1', 'Portada_Marquesa.png', '818361', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Inversiones/es_ES/Portada_Marquesa.png');
INSERT INTO `files` VALUES ('108', 'Banner', 'Banner3', '1', 'IMG20170304200549loko.jpg', '132895', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Banner/es_ES/IMG20170304200549loko.jpg');
INSERT INTO `files` VALUES ('110', 'Propiedades', 'Propiedades9', '1', 'tristeza-mas-musica-igual-a-alegria1.jpg', '22816', 'image/jpeg', 'http://localhost/cpanel/assets/images/upload/Propiedades/es_ES/tristeza-mas-musica-igual-a-alegria1.jpg');
INSERT INTO `files` VALUES ('111', 'Banner', 'Banner1', '1', '5d7e919a96144ee149050f4c095f19aa.jpg', '13815', 'image/jpeg', 'http://localhost/cpanel/assets/images/upload/Banner/es_ES/5d7e919a96144ee149050f4c095f19aa.jpg');
INSERT INTO `files` VALUES ('112', 'Banner', 'Banner4', '1', '5d7e919a96144ee149050f4c095f19aa.jpg', '13815', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Banner/es_ES/5d7e919a96144ee149050f4c095f19aa.jpg');
INSERT INTO `files` VALUES ('113', 'Propiedades', 'Propiedades12', '1', 'IMG20170304200510.jpg', '114470', 'image/jpeg', 'http://localhost/cpanel/assets/images/upload/Propiedades/es_ES/IMG20170304200510.jpg');
INSERT INTO `files` VALUES ('114', 'Propiedades', 'Propiedades10', '1', 'login.jpg', '4351', 'image/jpeg', 'http://localhost/cpanel/assets/images/upload/Propiedades/es_ES/login.jpg');
INSERT INTO `files` VALUES ('115', 'Inversiones', 'Inversiones3', '1', 'Portada_Isles_at_Lago_Mar.jpg', '80935', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Inversiones/es_ES/Portada_Isles_at_Lago_Mar.jpg');
INSERT INTO `files` VALUES ('118', 'Banner', 'Banner2', '1', 'IMG20170304200549loko.jpg', '132895', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Banner/es_ES/IMG20170304200549loko.jpg');
INSERT INTO `files` VALUES ('116', 'Banner', 'Banner5', '1', 'tristeza-mas-musica-igual-a-alegria1.jpg', '22816', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Banner/es_ES/tristeza-mas-musica-igual-a-alegria1.jpg');
INSERT INTO `files` VALUES ('117', 'Propiedades', 'Propiedades2', '1', '2017-02-23.png', '61017', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Propiedades/es_ES/2017-02-23.png');
INSERT INTO `files` VALUES ('119', 'Propiedades', 'Propiedades5', '1', '2017-03-09.png', '122201', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Propiedades/es_ES/2017-03-09.png');
INSERT INTO `files` VALUES ('120', 'Propiedades', 'Propiedades3', '1', '2017-03-14.png', '88957', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Propiedades/es_ES/2017-03-14.png');
INSERT INTO `files` VALUES ('121', 'Propiedades', 'Propiedades6', '1', '2017-03-03.png', '89275', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Propiedades/es_ES/2017-03-03.png');
INSERT INTO `files` VALUES ('122', 'Propiedades', 'Propiedades7', '1', '2017-03-03 (1).png', '1077653', 'image/png', 'http://localhost/GMG/branches/GMG_SUB_2/GMG/cpanel/assets/images/upload/Propiedades/es_ES/2017-03-03 (1).png');
INSERT INTO `files` VALUES ('123', 'Propiedades', 'Propiedades8', '1', '2017-03-15.png', '90787', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Propiedades/es_ES/2017-03-15.png');
INSERT INTO `files` VALUES ('125', 'Equipo', 'Equipo3', '3', '2017-03-07.png', '126698', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Equipo/pr_PR/2017-03-07.png');
INSERT INTO `files` VALUES ('124', 'Equipo', 'Equipo2', '3', '2017-03-03 (1).png', '1077653', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Equipo/pr_PR/2017-03-03 (1).png');
INSERT INTO `files` VALUES ('126', 'Propiedades', 'Propiedades11', '1', '2017-03-09.png', '122201', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Propiedades/es_ES/2017-03-09.png');
INSERT INTO `files` VALUES ('127', 'Inversiones', 'Inversiones1', '3', '2017-03-10.png', '2062844', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Inversiones/pr_PR/2017-03-10.png');
INSERT INTO `files` VALUES ('128', 'Inversiones', 'Inversiones2', '3', '2017-03-03.png', '89275', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Inversiones/pr_PR/2017-03-03.png');
INSERT INTO `files` VALUES ('129', 'Inversiones', 'Inversiones3', '3', '5d7e919a96144ee149050f4c095f19aa.jpg', '13815', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Inversiones/pr_PR/5d7e919a96144ee149050f4c095f19aa.jpg');
INSERT INTO `files` VALUES ('130', 'Inversiones', 'Inversiones1', '2', 'IMG20170304200510.jpg', '114470', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Inversiones/en_EN/IMG20170304200510.jpg');

-- ----------------------------
-- Table structure for idiom
-- ----------------------------
DROP TABLE IF EXISTS `idiom`;
CREATE TABLE `idiom` (
  `id_idiom` int(11) NOT NULL,
  `idiom` varchar(30) NOT NULL,
  `status` tinyint(11) NOT NULL,
  PRIMARY KEY (`id_idiom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of idiom
-- ----------------------------
INSERT INTO `idiom` VALUES ('1', 'Español', '1');
INSERT INTO `idiom` VALUES ('2', 'Ingles', '1');
INSERT INTO `idiom` VALUES ('3', 'Portugués', '1');

-- ----------------------------
-- Table structure for modulos
-- ----------------------------
DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos` (
  `id_modulos` int(3) NOT NULL,
  `nom_modulo` varchar(30) NOT NULL,
  `cod_modulo` varchar(15) NOT NULL,
  `id_rama` varchar(15) NOT NULL,
  PRIMARY KEY (`id_modulos`),
  UNIQUE KEY `cod_modulo` (`cod_modulo`),
  KEY `mod_rama` (`id_rama`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modulos
-- ----------------------------
INSERT INTO `modulos` VALUES ('1', 'Servicios', 'servicios', '1');
INSERT INTO `modulos` VALUES ('2', 'Equipo', 'equipo', '1');
INSERT INTO `modulos` VALUES ('3', 'Propiedades', 'propiedades', '1');
INSERT INTO `modulos` VALUES ('4', 'Inversiones', 'inversiones', '1');
INSERT INTO `modulos` VALUES ('5', 'Instagram', 'instagram', '2');
INSERT INTO `modulos` VALUES ('6', 'Twitter', 'twitter', '2');
INSERT INTO `modulos` VALUES ('7', 'Banner Principal', 'banner', '3');
INSERT INTO `modulos` VALUES ('9', 'Idioma', 'idioma', '4');
INSERT INTO `modulos` VALUES ('10', 'Control Panel', 'cpanel', '4');
INSERT INTO `modulos` VALUES ('11', 'Usuarios', 'usuario', '4');

-- ----------------------------
-- Table structure for rama
-- ----------------------------
DROP TABLE IF EXISTS `rama`;
CREATE TABLE `rama` (
  `id_rama` int(11) NOT NULL,
  `nom_rama` varchar(30) NOT NULL,
  `cod_rama` varchar(15) NOT NULL,
  `url` varchar(60) NOT NULL,
  PRIMARY KEY (`id_rama`),
  UNIQUE KEY `cod_rama` (`cod_rama`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rama
-- ----------------------------
INSERT INTO `rama` VALUES ('1', 'Secci&oacute;nes', 'secciones', 'views/secciones/');
INSERT INTO `rama` VALUES ('2', 'Redes Sociales', 'redes_sociales', 'views/redes_sociales/');
INSERT INTO `rama` VALUES ('3', 'Configuraci&oacute;n General', 'conf_general', 'views/conf_general/');
INSERT INTO `rama` VALUES ('4', 'Administraci&oacute;n', 'administracion', 'views/administracion/');

-- ----------------------------
-- Table structure for servicios
-- ----------------------------
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios` (
  `id_servicios` int(3) NOT NULL AUTO_INCREMENT,
  `num_columna` int(11) NOT NULL,
  `nom_servicio` varchar(80) NOT NULL,
  `contenido` varchar(300) NOT NULL,
  `posicion` int(3) NOT NULL,
  PRIMARY KEY (`id_servicios`),
  UNIQUE KEY `nom_servicio` (`nom_servicio`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of servicios
-- ----------------------------
INSERT INTO `servicios` VALUES ('1', '1', 'PROPIEDADES EN PRECONTRUCCIÓN2', 'aqui esta la prueba de servicio', '1');
INSERT INTO `servicios` VALUES ('2', '2', 'PROPIEDADES EN RE-VENTA', '100% al inventario de propiedades en venta en el Sur de Florida - USA', '2');
INSERT INTO `servicios` VALUES ('3', '3', 'Titulo de prueba', 'Cambiar contenido', '3');
INSERT INTO `servicios` VALUES ('4', '1', 'FINANCIAMIENTO RESIDENCIAL / COMERCIAL', 'Créditos hipotecario inmobilarios para extranjeros y nacionales en USA.', '4');
INSERT INTO `servicios` VALUES ('5', '2', 'NEGOCIOS RENTABLES EN $', 'Negocios especificos en venta en Florida - USA.', '5');
INSERT INTO `servicios` VALUES ('6', '3', 'INVERSIONES DE CAPITAL', 'prueba', '6');

-- ----------------------------
-- Table structure for text
-- ----------------------------
DROP TABLE IF EXISTS `text`;
CREATE TABLE `text` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_module` varchar(255) DEFAULT NULL,
  `id_seccion` varchar(255) DEFAULT NULL,
  `id_element` varchar(255) DEFAULT NULL,
  `id_idiom` varchar(11) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=420 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of text
-- ----------------------------
INSERT INTO `text` VALUES ('252', 'Equipo', 'Equipo1', '1', '1', 'NUESTRO EQUIPO');
INSERT INTO `text` VALUES ('253', 'Equipo', 'Equipo1', '2', '1', 'GRUPO DE PROFESIONALES CON DISTINTAS ESPECIALIDADES EN VENTAS, FINANZAS, MERCADEO');
INSERT INTO `text` VALUES ('254', 'Equipo', 'Equipo2', '1', '1', 'ING. GRACINDA GOUVEIA');
INSERT INTO `text` VALUES ('255', 'Equipo', 'Equipo2', '2', '1', 'ASESOR INTERNACIONAL');
INSERT INTO `text` VALUES ('256', 'Equipo', 'Equipo3', '1', '1', 'ING. RODOLFO VALDIVIESO');
INSERT INTO `text` VALUES ('257', 'Equipo', 'Equipo3', '2', '1', 'ASESOR INTERNACIONAL');
INSERT INTO `text` VALUES ('258', 'Equipo', 'Equipo4', '1', '1', 'ING. FATIMA GOUVEIA');
INSERT INTO `text` VALUES ('259', 'Equipo', 'Equipo4', '2', '1', 'ASESOR INTERNACIONAL');
INSERT INTO `text` VALUES ('260', 'Banner', '', '1', '', 'eyJpdiI6IlNDMEszMlJ6SWk3MjBoYm8yRVwvRlN3PT0iLCJ2YWx1ZSI6ImhicXNSaVJUQmpybDFqTllId3ZlTnRCR1V6V1BWQTI3eGNsK0tsY0RadGM2a2w4aXI0d25oT29VSDFFXC9nQVl5ZzRiUngydGJQN3ZOT1krYitiakFKQT09IiwibWFjIjoiYzAyYThlM2U3ZDRmMTBkMjMxYTFiM2QxZTNhYzVjMGU1MzE3NGYzYTgzZTQ2NmFjNjJhODJkMWZhZjgwYWRkYSJ9');
INSERT INTO `text` VALUES ('261', 'Banner', '', '2', '', 'gRJkMZhQoyYMH4ALcCul2wOF');
INSERT INTO `text` VALUES ('262', 'Banner', '', '3', '', '5relidfr0hued9cbu8kpa1m6n0');
INSERT INTO `text` VALUES ('263', 'Banner', '', '4', '', '');
INSERT INTO `text` VALUES ('264', 'Banner', '', '1', '', 'eyJpdiI6IlNDMEszMlJ6SWk3MjBoYm8yRVwvRlN3PT0iLCJ2YWx1ZSI6ImhicXNSaVJUQmpybDFqTllId3ZlTnRCR1V6V1BWQTI3eGNsK0tsY0RadGM2a2w4aXI0d25oT29VSDFFXC9nQVl5ZzRiUngydGJQN3ZOT1krYitiakFKQT09IiwibWFjIjoiYzAyYThlM2U3ZDRmMTBkMjMxYTFiM2QxZTNhYzVjMGU1MzE3NGYzYTgzZTQ2NmFjNjJhODJkMWZhZjgwYWRkYSJ9');
INSERT INTO `text` VALUES ('265', 'Banner', '', '2', '', 'gRJkMZhQoyYMH4ALcCul2wOF');
INSERT INTO `text` VALUES ('266', 'Banner', '', '3', '', '5relidfr0hued9cbu8kpa1m6n0');
INSERT INTO `text` VALUES ('267', 'Banner', '', '4', '', '');
INSERT INTO `text` VALUES ('268', 'Banner', '', '1', '', 'eyJpdiI6IlNDMEszMlJ6SWk3MjBoYm8yRVwvRlN3PT0iLCJ2YWx1ZSI6ImhicXNSaVJUQmpybDFqTllId3ZlTnRCR1V6V1BWQTI3eGNsK0tsY0RadGM2a2w4aXI0d25oT29VSDFFXC9nQVl5ZzRiUngydGJQN3ZOT1krYitiakFKQT09IiwibWFjIjoiYzAyYThlM2U3ZDRmMTBkMjMxYTFiM2QxZTNhYzVjMGU1MzE3NGYzYTgzZTQ2NmFjNjJhODJkMWZhZjgwYWRkYSJ9');
INSERT INTO `text` VALUES ('269', 'Banner', '', '2', '', 'gRJkMZhQoyYMH4ALcCul2wOF');
INSERT INTO `text` VALUES ('270', 'Banner', '', '3', '', '5relidfr0hued9cbu8kpa1m6n0');
INSERT INTO `text` VALUES ('271', 'Banner', '', '4', '', '');
INSERT INTO `text` VALUES ('272', 'Propiedades', '', '1', '', 'eyJpdiI6IlNDMEszMlJ6SWk3MjBoYm8yRVwvRlN3PT0iLCJ2YWx1ZSI6ImhicXNSaVJUQmpybDFqTllId3ZlTnRCR1V6V1BWQTI3eGNsK0tsY0RadGM2a2w4aXI0d25oT29VSDFFXC9nQVl5ZzRiUngydGJQN3ZOT1krYitiakFKQT09IiwibWFjIjoiYzAyYThlM2U3ZDRmMTBkMjMxYTFiM2QxZTNhYzVjMGU1MzE3NGYzYTgzZTQ2NmFjNjJhODJkMWZhZjgwYWRkYSJ9');
INSERT INTO `text` VALUES ('273', 'Propiedades', '', '2', '', 'gRJkMZhQoyYMH4ALcCul2wOF');
INSERT INTO `text` VALUES ('274', 'Propiedades', '', '3', '', '5relidfr0hued9cbu8kpa1m6n0');
INSERT INTO `text` VALUES ('275', 'Propiedades', '', '4', '', '');
INSERT INTO `text` VALUES ('276', 'Propiedades', 'Propiedades1', '1', '1', 'ARIA ON THE BAY');
INSERT INTO `text` VALUES ('277', 'Propiedades', 'Propiedades1', '2', '1', 'fn2oog85r23cpsgh3vfckdu255');
INSERT INTO `text` VALUES ('303', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('304', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('305', 'Propiedades', 'Propiedades4', '1', '1', 'DOWNTOWN DORAL');
INSERT INTO `text` VALUES ('306', 'Propiedades', 'Propiedades4', '2', '1', '9ebchqta9okh9g39s8nq0ek345');
INSERT INTO `text` VALUES ('278', 'Propiedades', 'Propiedades1', '3', '1', '5relidfr0hued9cbu8kpa1m6n0');
INSERT INTO `text` VALUES ('297', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('298', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('299', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('300', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('301', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('302', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('279', 'Propiedades', 'Propiedades1', '4', '1', 'gRJkMZhQoyYMH4ALcCul2wOF');
INSERT INTO `text` VALUES ('280', 'Propiedades', 'Propiedades1', '5', '1', '5relidfr0hued9cbu8kpa1m6n0');
INSERT INTO `text` VALUES ('281', 'Equipo', '', '1', '', 'eyJpdiI6IlNDMEszMlJ6SWk3MjBoYm8yRVwvRlN3PT0iLCJ2YWx1ZSI6ImhicXNSaVJUQmpybDFqTllId3ZlTnRCR1V6V1BWQTI3eGNsK0tsY0RadGM2a2w4aXI0d25oT29VSDFFXC9nQVl5ZzRiUngydGJQN3ZOT1krYitiakFKQT09IiwibWFjIjoiYzAyYThlM2U3ZDRmMTBkMjMxYTFiM2QxZTNhYzVjMGU1MzE3NGYzYTgzZTQ2NmFjNjJhODJkMWZhZjgwYWRkYSJ9');
INSERT INTO `text` VALUES ('282', 'Equipo', '', '2', '', 'gRJkMZhQoyYMH4ALcCul2wOF');
INSERT INTO `text` VALUES ('283', 'Equipo', '', '3', '', '5relidfr0hued9cbu8kpa1m6n0');
INSERT INTO `text` VALUES ('284', 'Equipo', '', '4', '', '');
INSERT INTO `text` VALUES ('285', 'Equipo', '', '1', '', 'eyJpdiI6IlNDMEszMlJ6SWk3MjBoYm8yRVwvRlN3PT0iLCJ2YWx1ZSI6ImhicXNSaVJUQmpybDFqTllId3ZlTnRCR1V6V1BWQTI3eGNsK0tsY0RadGM2a2w4aXI0d25oT29VSDFFXC9nQVl5ZzRiUngydGJQN3ZOT1krYitiakFKQT09IiwibWFjIjoiYzAyYThlM2U3ZDRmMTBkMjMxYTFiM2QxZTNhYzVjMGU1MzE3NGYzYTgzZTQ2NmFjNjJhODJkMWZhZjgwYWRkYSJ9');
INSERT INTO `text` VALUES ('286', 'Equipo', '', '2', '', 'gRJkMZhQoyYMH4ALcCul2wOF');
INSERT INTO `text` VALUES ('287', 'Equipo', '', '3', '', '5relidfr0hued9cbu8kpa1m6n0');
INSERT INTO `text` VALUES ('288', 'Equipo', '', '4', '', '');
INSERT INTO `text` VALUES ('289', 'Equipo', 'Equipo2', '3', '1', 'Profesional con alta experiencia y apasionada por las ventas con mas de 10 años en mercado inmobiliario y comercial, negocios, inmigración a USA, y financiamiento');
INSERT INTO `text` VALUES ('321', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('322', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('323', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('324', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('325', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('326', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('290', 'Equipo', 'Equipo2', '4', '1', 'eyJpdiI6IlNDMEszMlJ6SWk3MjBoYm8yRVwvRlN3PT0iLCJ2YWx1ZSI6ImhicXNSaVJUQmpybDFqTllId3ZlTnRCR1V6V1BWQTI3eGNsK0tsY0RadGM2a2w4aXI0d25oT29VSDFFXC9nQVl5ZzRiUngydGJQN3ZOT1krYitiakFKQT09IiwibWFjIjoiYzAyYThlM2U3ZDRmMTBkMjMxYTFiM2QxZTNhYzVjMGU1MzE3NGYzYTgzZTQ2NmFjNjJhODJkMWZhZjgwYWRkYSJ9');
INSERT INTO `text` VALUES ('291', 'Equipo', 'Equipo2', '5', '1', 'gRJkMZhQoyYMH4ALcCul2wOF');
INSERT INTO `text` VALUES ('292', 'Equipo', 'Equipo2', '6', '1', '5relidfr0hued9cbu8kpa1m6n0');
INSERT INTO `text` VALUES ('293', 'Propiedades', '', '1', '', 'eyJpdiI6IlNDMEszMlJ6SWk3MjBoYm8yRVwvRlN3PT0iLCJ2YWx1ZSI6ImhicXNSaVJUQmpybDFqTllId3ZlTnRCR1V6V1BWQTI3eGNsK0tsY0RadGM2a2w4aXI0d25oT29VSDFFXC9nQVl5ZzRiUngydGJQN3ZOT1krYitiakFKQT09IiwibWFjIjoiYzAyYThlM2U3ZDRmMTBkMjMxYTFiM2QxZTNhYzVjMGU1MzE3NGYzYTgzZTQ2NmFjNjJhODJkMWZhZjgwYWRkYSJ9');
INSERT INTO `text` VALUES ('294', 'Propiedades', '', '2', '', 'gRJkMZhQoyYMH4ALcCul2wOF');
INSERT INTO `text` VALUES ('295', 'Propiedades', '', '3', '', '5relidfr0hued9cbu8kpa1m6n0');
INSERT INTO `text` VALUES ('296', 'Propiedades', '', '4', '', '');
INSERT INTO `text` VALUES ('307', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('308', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('309', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('310', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('311', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('312', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('313', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('314', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('315', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('316', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('317', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('318', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('319', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('320', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('335', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('327', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('328', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('329', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('330', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('331', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('332', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('333', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('334', 'Equipo', 'Equipo3', '3', '1', 'Amplia experiencia en inversiones globales, especialmente en el área inmobiliaria en el sur de florida con conocimientos en negocios, inversiones, inmigración y financiamiento. Confidencialidad, Seriedad y compromiso.');
INSERT INTO `text` VALUES ('336', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('337', 'Inversiones', 'Inversiones2', '1', '1', 'THE MARQUESA - PROPIEDADES ALQUILADAS');
INSERT INTO `text` VALUES ('338', 'Inversiones', '', '', '', '');
INSERT INTO `text` VALUES ('339', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('340', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('341', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('342', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('343', 'Propiedades', '', '1', '', 'eyJpdiI6IjFveXFtRHZtWDZqRjdcL1ZHb1B2azhnPT0iLCJ2YWx1ZSI6IlNFSVRrSmtGNW9WeWZBdWZzdzRLYnI3K2lacjNqcXRUTjhUSE1JZDArbG11S2dVRXllQ3lCQ1BBVGpKa2xsYlhxb2xLbTNUaVpESXJmdXVFMTdkNjNRPT0iLCJtYWMiOiIyZTU5MWQzZGM4Yzg0MmVkODQ5NGRkNTcwMzY0NTFlNjc1NTQ3MjgwNDJiNzJjZmQwNjdkNzM1ZTI2YzM4ZGE0In0=');
INSERT INTO `text` VALUES ('344', 'Propiedades', '', '2', '', 'eyJpdiI6ImNWbWpEWjFSMkQrXC9tVUdqZVRTWmFBPT0iLCJ2YWx1ZSI6IkZUdTVDWUsrdkZPY1hnWm8yaGdlcFNTejVHTWJMeDZGaEJod0dOVFBtZUcxckZ5NmU1RWVyQkxnZG9QVlZrdk1TUXplWE9oYk5tQWpIbWF6ZitUUlRnPT0iLCJtYWMiOiIzYTUxNWJkNGI1YmE2NTEyODBjNmU1MjM2ZTU0NTMxNThkMjBlNzRmZDc2YjJlMTY2NWQxNTYyZDllMzM3ZTI5In0=');
INSERT INTO `text` VALUES ('345', 'Propiedades', '', '3', '', '');
INSERT INTO `text` VALUES ('346', 'Equipo', '', '1', '', 'eyJpdiI6IjFveXFtRHZtWDZqRjdcL1ZHb1B2azhnPT0iLCJ2YWx1ZSI6IlNFSVRrSmtGNW9WeWZBdWZzdzRLYnI3K2lacjNqcXRUTjhUSE1JZDArbG11S2dVRXllQ3lCQ1BBVGpKa2xsYlhxb2xLbTNUaVpESXJmdXVFMTdkNjNRPT0iLCJtYWMiOiIyZTU5MWQzZGM4Yzg0MmVkODQ5NGRkNTcwMzY0NTFlNjc1NTQ3MjgwNDJiNzJjZmQwNjdkNzM1ZTI2YzM4ZGE0In0=');
INSERT INTO `text` VALUES ('347', 'Equipo', '', '2', '', 'eyJpdiI6ImNWbWpEWjFSMkQrXC9tVUdqZVRTWmFBPT0iLCJ2YWx1ZSI6IkZUdTVDWUsrdkZPY1hnWm8yaGdlcFNTejVHTWJMeDZGaEJod0dOVFBtZUcxckZ5NmU1RWVyQkxnZG9QVlZrdk1TUXplWE9oYk5tQWpIbWF6ZitUUlRnPT0iLCJtYWMiOiIzYTUxNWJkNGI1YmE2NTEyODBjNmU1MjM2ZTU0NTMxNThkMjBlNzRmZDc2YjJlMTY2NWQxNTYyZDllMzM3ZTI5In0=');
INSERT INTO `text` VALUES ('348', 'Equipo', '', '3', '', '');
INSERT INTO `text` VALUES ('349', 'Equipo', '', '1', '', 'eyJpdiI6IjFveXFtRHZtWDZqRjdcL1ZHb1B2azhnPT0iLCJ2YWx1ZSI6IlNFSVRrSmtGNW9WeWZBdWZzdzRLYnI3K2lacjNqcXRUTjhUSE1JZDArbG11S2dVRXllQ3lCQ1BBVGpKa2xsYlhxb2xLbTNUaVpESXJmdXVFMTdkNjNRPT0iLCJtYWMiOiIyZTU5MWQzZGM4Yzg0MmVkODQ5NGRkNTcwMzY0NTFlNjc1NTQ3MjgwNDJiNzJjZmQwNjdkNzM1ZTI2YzM4ZGE0In0=');
INSERT INTO `text` VALUES ('350', 'Equipo', '', '2', '', 'eyJpdiI6ImNWbWpEWjFSMkQrXC9tVUdqZVRTWmFBPT0iLCJ2YWx1ZSI6IkZUdTVDWUsrdkZPY1hnWm8yaGdlcFNTejVHTWJMeDZGaEJod0dOVFBtZUcxckZ5NmU1RWVyQkxnZG9QVlZrdk1TUXplWE9oYk5tQWpIbWF6ZitUUlRnPT0iLCJtYWMiOiIzYTUxNWJkNGI1YmE2NTEyODBjNmU1MjM2ZTU0NTMxNThkMjBlNzRmZDc2YjJlMTY2NWQxNTYyZDllMzM3ZTI5In0=');
INSERT INTO `text` VALUES ('351', 'Equipo', '', '3', '', '');
INSERT INTO `text` VALUES ('352', 'Equipo', '', '1', '', 'eyJpdiI6IjFveXFtRHZtWDZqRjdcL1ZHb1B2azhnPT0iLCJ2YWx1ZSI6IlNFSVRrSmtGNW9WeWZBdWZzdzRLYnI3K2lacjNqcXRUTjhUSE1JZDArbG11S2dVRXllQ3lCQ1BBVGpKa2xsYlhxb2xLbTNUaVpESXJmdXVFMTdkNjNRPT0iLCJtYWMiOiIyZTU5MWQzZGM4Yzg0MmVkODQ5NGRkNTcwMzY0NTFlNjc1NTQ3MjgwNDJiNzJjZmQwNjdkNzM1ZTI2YzM4ZGE0In0=');
INSERT INTO `text` VALUES ('353', 'Equipo', '', '2', '', 'eyJpdiI6ImNWbWpEWjFSMkQrXC9tVUdqZVRTWmFBPT0iLCJ2YWx1ZSI6IkZUdTVDWUsrdkZPY1hnWm8yaGdlcFNTejVHTWJMeDZGaEJod0dOVFBtZUcxckZ5NmU1RWVyQkxnZG9QVlZrdk1TUXplWE9oYk5tQWpIbWF6ZitUUlRnPT0iLCJtYWMiOiIzYTUxNWJkNGI1YmE2NTEyODBjNmU1MjM2ZTU0NTMxNThkMjBlNzRmZDc2YjJlMTY2NWQxNTYyZDllMzM3ZTI5In0=');
INSERT INTO `text` VALUES ('354', 'Equipo', '', '3', '', '');
INSERT INTO `text` VALUES ('355', 'Propiedades', '', '1', '', 'eyJpdiI6IkZ0UFVYVGlVY0lkRlptTHppUnJjc0E9PSIsInZhbHVlIjoibkVGMWdONnZVNGZOd28rQ0JkSzd1U0FIc3R2bHFsMlN6ZmdpRjBLS1NkaGszS1dqYnZlenpzclwvenN2cW5ZZnpGSmpZWHZJRkZqTU9BTktjdEE2TEdBPT0iLCJtYWMiOiIwMzY3MzE0ZDYyMTA4MDBkZjkzM2JjZjcwNzlhZGFhZmNlNGM3ZWM0MmJhZTAzNmYxYjI1NzAwZGFmNDdlMjllIn0=');
INSERT INTO `text` VALUES ('356', 'Propiedades', '', '2', '', 'eyJpdiI6IlM4TEJJZjJCUWlQV09cL1RnVjROVzdnPT0iLCJ2YWx1ZSI6IlNOam5mYWtcL2dIK1BjRThtMXFIbEFjQ0gxQ2tOWkc1NEc2VEVmZzJBM0lFUWtkXC9UdmxtNzRrTjBVNG9pK1lyNU9kM3ZteWhQNlA0TTQrMmI4RE9SWGc9PSIsIm1hYyI6ImExYjJjZjVkZjdiMzhkOGIwOWM3OTMwNDU1N2I1Yzk3Njk5MTEyYzVkZjJiYmQ2NTI2ZjI2MGUzZGQ1NzBmOTgifQ==');
INSERT INTO `text` VALUES ('357', 'Propiedades', '', '3', '', '');
INSERT INTO `text` VALUES ('358', 'Banner', '', '1', '', 'eyJpdiI6IkZ0UFVYVGlVY0lkRlptTHppUnJjc0E9PSIsInZhbHVlIjoibkVGMWdONnZVNGZOd28rQ0JkSzd1U0FIc3R2bHFsMlN6ZmdpRjBLS1NkaGszS1dqYnZlenpzclwvenN2cW5ZZnpGSmpZWHZJRkZqTU9BTktjdEE2TEdBPT0iLCJtYWMiOiIwMzY3MzE0ZDYyMTA4MDBkZjkzM2JjZjcwNzlhZGFhZmNlNGM3ZWM0MmJhZTAzNmYxYjI1NzAwZGFmNDdlMjllIn0=');
INSERT INTO `text` VALUES ('359', 'Banner', '', '2', '', 'eyJpdiI6IlM4TEJJZjJCUWlQV09cL1RnVjROVzdnPT0iLCJ2YWx1ZSI6IlNOam5mYWtcL2dIK1BjRThtMXFIbEFjQ0gxQ2tOWkc1NEc2VEVmZzJBM0lFUWtkXC9UdmxtNzRrTjBVNG9pK1lyNU9kM3ZteWhQNlA0TTQrMmI4RE9SWGc9PSIsIm1hYyI6ImExYjJjZjVkZjdiMzhkOGIwOWM3OTMwNDU1N2I1Yzk3Njk5MTEyYzVkZjJiYmQ2NTI2ZjI2MGUzZGQ1NzBmOTgifQ==');
INSERT INTO `text` VALUES ('360', 'Banner', '', '3', '', '');
INSERT INTO `text` VALUES ('361', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('362', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('363', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('364', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('365', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('366', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('367', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('368', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('369', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('370', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('371', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('372', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('373', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('374', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('375', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('376', 'Propiedades', '', '1', '', '');
INSERT INTO `text` VALUES ('377', 'Inversiones', '', '1', '', '');
INSERT INTO `text` VALUES ('378', 'Banner', '', '1', '', '');
INSERT INTO `text` VALUES ('379', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('380', 'Equipo', '', '1', '', '');
INSERT INTO `text` VALUES ('381', 'Equipo', 'Equipo1', '1', '2', 'Prubea');
INSERT INTO `text` VALUES ('382', 'Equipo', 'Equipo1', '2', '2', 'Prueba2');
INSERT INTO `text` VALUES ('383', 'Inversiones', 'Inversiones1', '1', '1', 'NEGOCIO DE LOGÍSTICA');
INSERT INTO `text` VALUES ('384', 'Propiedades', 'Propiedades9', '1', '1', 'ARTESA');
INSERT INTO `text` VALUES ('402', 'Equipo', 'Equipo4', '3', '1', 'Mi experiencia como asesor inmobiliario internacional me permite ayudar a muchas personas en mi país asesorándoles acerca de las opciones para inmigrar e invertir negocios y residencial.\r\n');
INSERT INTO `text` VALUES ('385', 'Propiedades', 'Propiedades7', '1', '1', 'FLATIRON');
INSERT INTO `text` VALUES ('386', 'Servicios', 'Servicios1', '1', '1', 'PROPIEDADES EN PRECONSTRUCCIÓN');
INSERT INTO `text` VALUES ('387', 'Servicios', 'Servicios1', '2', '1', 'Proyectos Residenciales,comerciales u oficinas en plano, construcción o nuevas a entregar en el Sur de Florida - USA.');
INSERT INTO `text` VALUES ('388', 'Propiedades', 'Propiedades2', '1', '1', 'GRAN PARAISO');
INSERT INTO `text` VALUES ('389', 'Inversiones', 'Inversiones3', '1', '1', 'ISLES AT LAGO MAR - PROPIEDADES ALQUILADAS');
INSERT INTO `text` VALUES ('390', 'Servicios', 'Servicios2', '1', '1', 'PROPIEDADES EN RE-VENTA');
INSERT INTO `text` VALUES ('391', 'Servicios', 'Servicios2', '2', '1', '100% acceso al inventario de propiedades en venta en el Sur de Florida - USA.');
INSERT INTO `text` VALUES ('392', 'Propiedades', 'Propiedades5', '1', '1', 'ISLES AT LAGO MAR');
INSERT INTO `text` VALUES ('393', 'Servicios', 'Servicios3', '1', '1', 'ASESORÍA EN INMIGRACIÓN A USA');
INSERT INTO `text` VALUES ('394', 'Servicios', 'Servicios3', '2', '1', 'Asesoría inmigratoria orientada a inversionistas para los Estados Unidos de América.');
INSERT INTO `text` VALUES ('395', 'Propiedades', 'Propiedades6', '1', '1', 'LANDMARK');
INSERT INTO `text` VALUES ('396', 'Servicios', 'Servicios4', '1', '1', 'FINANCIAMIENTO RESIDENCIAL / COMERCIAL');
INSERT INTO `text` VALUES ('397', 'Servicios', 'Servicios4', '2', '1', 'Créditos hipotecarios inmobiliarios para extranjeros y nacionales en USA.');
INSERT INTO `text` VALUES ('398', 'Servicios', 'Servicios5', '1', '1', 'NEGOCIOS RENTABLES EN $');
INSERT INTO `text` VALUES ('399', 'Servicios', 'Servicios5', '2', '1', 'Negocios específicos en venta en Florida - USA.');
INSERT INTO `text` VALUES ('400', 'Servicios', 'Servicios6', '1', '1', 'INVERSIONES DE CAPITAL');
INSERT INTO `text` VALUES ('401', 'Servicios', 'Servicios6', '2', '1', 'Opciones de inversiones pasivas con retorno.');
INSERT INTO `text` VALUES ('403', 'Equipo', 'Equipo1', '1', '3', 'aass');
INSERT INTO `text` VALUES ('404', 'Equipo', 'Equipo1', '2', '3', 'cvf');
INSERT INTO `text` VALUES ('405', 'Equipo', 'Equipo2', '1', '3', 'Titu');
INSERT INTO `text` VALUES ('406', 'Equipo', 'Equipo2', '2', '3', 'Subti');
INSERT INTO `text` VALUES ('407', 'Equipo', 'Equipo2', '3', '3', 'Descrip');
INSERT INTO `text` VALUES ('408', 'Equipo', 'Equipo3', '1', '3', 'Local');
INSERT INTO `text` VALUES ('409', 'Equipo', 'Equipo3', '2', '3', 'asd');
INSERT INTO `text` VALUES ('410', 'Equipo', 'Equipo3', '3', '3', 'asda');
INSERT INTO `text` VALUES ('411', 'Propiedades', 'Propiedades11', '1', '1', 'BONTERRA');
INSERT INTO `text` VALUES ('412', 'Propiedades', 'Propiedades8', '1', '1', 'THE MARQUESA');
INSERT INTO `text` VALUES ('413', 'Inversiones', 'Inversiones1', '1', '3', 'fami');
INSERT INTO `text` VALUES ('414', 'Inversiones', 'Inversiones2', '1', '3', 'Include Portu');
INSERT INTO `text` VALUES ('415', 'Inversiones', 'Inversiones3', '1', '3', 'Buena Música');
INSERT INTO `text` VALUES ('416', 'Inversiones', 'Inversiones1', '1', '2', 'Titulo peri');
INSERT INTO `text` VALUES ('417', 'Propiedades', 'Propiedades10', '1', '1', 'GALE');
INSERT INTO `text` VALUES ('418', 'Propiedades', 'Propiedades3', '1', '1', 'MIRALAGO');
INSERT INTO `text` VALUES ('419', 'Propiedades', 'Propiedades12', '1', '1', 'CHARLESTON');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Obed', 'admin', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-12-19 15:06:00');
INSERT INTO `users` VALUES ('2', 'Jorge David', 'Medina Bencomo', 'jmedina', '$2y$10$bQGQ8G/39Jc5GD9z2cVQce3tg4HBFWiwvpr4RTOyP.98I7UhBxJBm', 'jmedina@gmail.com', '2017-06-14 19:59:15');
INSERT INTO `users` VALUES ('3', 'Carlos', 'Aponte', 'caponte', '$2y$10$n/9da/tLb.DHc76AzO8oEev0K8fcuMNCW2bb0EMMD2supguE8KC52', 'apon@gmail.com', '2017-06-14 20:05:15');
INSERT INTO `users` VALUES ('4', 'Alejandro', 'Ramos', 'aRamos', '$2y$10$MVwuH6OLfcO3K7Y7s2skA.Kd1s5uvIE70XgVJy4cWBHIPLG0JMVXG', 'aleramos@gmail.com', '2017-07-05 03:55:32');
INSERT INTO `users` VALUES ('5', 'Alejandra', 'Castro', 'aCastro', '$2y$10$2uiP3Ua.28HXuWue2pcTXequak70K3kLnGnvg.QiRx8p4XAdBwB7K', 'alcastro@gmail.com', '2017-07-18 08:52:21');
INSERT INTO `users` VALUES ('7', 'Felix Jose', 'Martinez Castro', 'fmartinez', '$2y$10$5RbpLlddGKY.wOpRkaKUVO9elTgW.jxIJZfykUOneWmFpA10uAham', 'fmart@gmail.com', '2017-07-20 21:48:30');
INSERT INTO `users` VALUES ('8', 'Jose', 'Lopez', 'jlopez', '$2y$10$KZLNQD89xiXKUQHiIojzKeRxYxHs3Rc6O02v3xjuKucS5g3aKqkXu', 'jlopez@gmail.com', '2017-07-24 16:51:58');
