/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : gmg_db

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-07-25 01:03:14
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
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES ('139', 'Inversiones', 'Inversiones1', '1', 'Portada_Negocio_Logística.jpeg', '694098', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Inversiones/es_ES/Portada_Negocio_Logística.jpeg');
INSERT INTO `files` VALUES ('140', 'Inversiones', 'Inversiones2', '1', 'Portada_Marquesa.png', '818361', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Inversiones/es_ES/Portada_Marquesa.png');
INSERT INTO `files` VALUES ('141', 'Inversiones', 'Inversiones3', '1', 'Portada_Isles_at_Lago_Mar.jpg', '80935', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Inversiones/es_ES/Portada_Isles_at_Lago_Mar.jpg');
INSERT INTO `files` VALUES ('142', 'Equipo', 'Equipo2', '1', 'gracinda-gouveia.JPG', '84803', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Equipo/es_ES/gracinda-gouveia.JPG');
INSERT INTO `files` VALUES ('143', 'Equipo', 'Equipo3', '1', 'rodolfo-valdivieso.JPG', '404341', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Equipo/es_ES/rodolfo-valdivieso.JPG');
INSERT INTO `files` VALUES ('144', 'Equipo', 'Equipo4', '1', 'fatima-gouveia.JPG', '681411', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Equipo/es_ES/fatima-gouveia.JPG');
INSERT INTO `files` VALUES ('134', 'Propiedades', 'Propiedades5', '1', 'Portada_Isles_at_Lago_Mar.jpg', '80935', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Propiedades/es_ES/Portada_Isles_at_Lago_Mar.jpg');
INSERT INTO `files` VALUES ('135', 'Propiedades', 'Propiedades8', '1', 'Portada_Marquesa.png', '818361', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Propiedades/es_ES/Portada_Marquesa.png');
INSERT INTO `files` VALUES ('136', 'Propiedades', 'Propiedades12', '1', 'Portada_Charleston.png', '29190', 'image/png', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Propiedades/es_ES/Portada_Charleston.png');
INSERT INTO `files` VALUES ('137', 'Propiedades', 'Propiedades1', '1', 'Aria_on_the_Bay_imagen_portada.jpg', '7915', 'image/jpeg', 'http://localhost/gmg_sitio/public_html/cpanel/assets/images/upload/Propiedades/es_ES/Aria_on_the_Bay_imagen_portada.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=481 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of text
-- ----------------------------
INSERT INTO `text` VALUES ('448', 'Propiedades', 'Propiedades5', '1', '1', 'ISLES AT LAGO MAR');
INSERT INTO `text` VALUES ('449', 'Propiedades', 'Propiedades8', '1', '1', 'THE MARQUESA');
INSERT INTO `text` VALUES ('450', 'Propiedades', 'Propiedades11', '1', '1', 'BONTERRA');
INSERT INTO `text` VALUES ('451', 'Propiedades', 'Propiedades3', '1', '1', 'MIRALAGO');
INSERT INTO `text` VALUES ('452', 'Propiedades', 'Propiedades6', '1', '1', 'LANDMARK');
INSERT INTO `text` VALUES ('453', 'Propiedades', 'Propiedades9', '1', '1', 'ARTESA');
INSERT INTO `text` VALUES ('454', 'Propiedades', 'Propiedades12', '1', '1', 'CHARLESTON');
INSERT INTO `text` VALUES ('455', 'Inversiones', 'Inversiones1', '1', '1', 'NEGOCIO DE LOGÍSTICA');
INSERT INTO `text` VALUES ('456', 'Inversiones', 'Inversiones2', '1', '1', 'THE MARQUESA - PROPIEDADES ALQUILADAS');
INSERT INTO `text` VALUES ('457', 'Inversiones', 'Inversiones3', '1', '1', 'ISLES AT LAGO MAR - PROPIEDADES ALQUILADAS');
INSERT INTO `text` VALUES ('469', 'Servicios', 'Servicios1', '1', '1', 'PROPIEDADES EN PRECONSTRUCCIÓN');
INSERT INTO `text` VALUES ('470', 'Servicios', 'Servicios1', '2', '1', 'Proyectos Residenciales,comerciales u oficinas en plano, construcción o nuevas a entregar en el Sur de Florida - USA.');
INSERT INTO `text` VALUES ('471', 'Servicios', 'Servicios2', '1', '1', 'PROPIEDADES EN RE-VENTA');
INSERT INTO `text` VALUES ('472', 'Servicios', 'Servicios2', '2', '1', '100% acceso al inventario de propiedades en venta en el Sur de Florida - USA.');
INSERT INTO `text` VALUES ('467', 'Equipo', 'Equipo1', '1', '1', 'NUESTRO EQUIPO');
INSERT INTO `text` VALUES ('468', 'Equipo', 'Equipo1', '2', '1', 'GRUPO DE PROFESIONALES CON DISTINTAS ESPECIALIDADES EN VENTAS, FINANZAS, MERCADEO');
INSERT INTO `text` VALUES ('464', 'Equipo', 'Equipo4', '1', '1', 'ING. FATIMA GOUVEIA');
INSERT INTO `text` VALUES ('465', 'Equipo', 'Equipo4', '2', '1', 'ASESOR INTERNACIONAL');
INSERT INTO `text` VALUES ('466', 'Equipo', 'Equipo4', '3', '1', 'Mi experiencia como asesor inmobiliario internacional me permite ayudar a muchas personas en mi país asesorándoles acerca de las opciones para inmigrar e invertir negocios y residencial.');
INSERT INTO `text` VALUES ('443', 'Propiedades', 'Propiedades1', '1', '1', 'ARIA ON THE BAY');
INSERT INTO `text` VALUES ('444', 'Propiedades', 'Propiedades4', '1', '1', 'DOWNTOWN DORAL');
INSERT INTO `text` VALUES ('445', 'Propiedades', 'Propiedades7', '1', '1', 'FLAT IRON');
INSERT INTO `text` VALUES ('446', 'Propiedades', 'Propiedades10', '1', '1', 'GALE');
INSERT INTO `text` VALUES ('447', 'Propiedades', 'Propiedades2', '1', '1', 'GRAN PARAISO');
INSERT INTO `text` VALUES ('473', 'Servicios', 'Servicios3', '1', '1', 'ASESORÍA EN INMIGRACIÓN A USA');
INSERT INTO `text` VALUES ('474', 'Servicios', 'Servicios3', '2', '1', 'Asesoría inmigratoria orientada a inversionistas para los Estados Unidos de América.');
INSERT INTO `text` VALUES ('475', 'Servicios', 'Servicios4', '1', '1', 'FINANCIAMIENTO RESIDENCIAL / COMERCIAL');
INSERT INTO `text` VALUES ('476', 'Servicios', 'Servicios4', '2', '1', 'Créditos hipotecarios inmobiliarios para extranjeros y nacionales en USA');
INSERT INTO `text` VALUES ('477', 'Servicios', 'Servicios5', '1', '1', 'NEGOCIOS RENTABLES EN $');
INSERT INTO `text` VALUES ('478', 'Servicios', 'Servicios5', '2', '1', 'Negocios específicos en venta en Florida - USA.');
INSERT INTO `text` VALUES ('479', 'Servicios', 'Servicios6', '1', '1', 'INVERSIONES DE CAPITAL');
INSERT INTO `text` VALUES ('480', 'Servicios', 'Servicios6', '2', '1', 'Opciones de inversiones pasivas con retorno.');
INSERT INTO `text` VALUES ('458', 'Equipo', 'Equipo2', '1', '1', 'ING. GRACINDA GOUVEIA');
INSERT INTO `text` VALUES ('459', 'Equipo', 'Equipo2', '2', '1', 'ASESOR INTERNACIONAL');
INSERT INTO `text` VALUES ('460', 'Equipo', 'Equipo2', '3', '1', 'Profesional con alta experiencia y apasionada por las ventas con mas de 10 años en mercado inmobiliario y comercial, negocios, inmigración a USA, y financiamiento.\r\n');
INSERT INTO `text` VALUES ('461', 'Equipo', 'Equipo3', '1', '1', 'ING. RODOLFO VALDIVIESO');
INSERT INTO `text` VALUES ('462', 'Equipo', 'Equipo3', '2', '1', 'ASESOR INTERNACIONAL');
INSERT INTO `text` VALUES ('463', 'Equipo', 'Equipo3', '3', '1', 'Amplia experiencia en inversiones globales, especialmente en el área inmobiliaria en el sur de florida con conocimientos en negocios, inversiones, inmigración y financiamiento. Confidencialidad, Seriedad y compromiso.');

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
