-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-01-2018 a las 17:02:53
-- Versión del servidor: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `serrp_dev`
--
CREATE DATABASE IF NOT EXISTS `serrp_dev` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `serrp_dev`;

DELIMITER $$
--
-- Funciones
--
DROP FUNCTION IF EXISTS `addusuario`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `addusuario` (`pqr` VARCHAR(255), `pnombre` VARCHAR(255), `ppaterno` VARCHAR(255), `pmaterno` VARCHAR(255), `pcorreo` VARCHAR(255), `ptelefonoc` VARCHAR(255), `ptelefonoh` VARCHAR(255), `pestado` INT, `pespecialidad` INT, `psexo` CHAR(1), `tiṕo` INT, `limite` INT) RETURNS INT(11) BEGIN
DECLARE recurso VARCHAR(233);
DECLARE CG_id INT;
SELECT id_cg FROM cgeneracion WHERE cgeneracion.Iestado_cg = 1 LIMIT 1 INTO CG_id;
IF CG_id IS NULL THEN
	return 10;
END IF;
IF (SELECT usuario.VidentiQR_usuario FROM usuario WHERE usuario.VidentiQR_usuario = pqr) IS NULL THEN
INSERT INTO `usuario`(`VidentiQR_usuario`,`Vnombre_usuario`,`Vpaterno_usuario`,`Vmaterno_usuario`,`Vcorreo_usuario`,`VtelefonoC_usuario`,`VtelefonoH_usuario`,`Iestado_usuario`,`Itipo_usuario`,`id_especialidad`, `Csexo_usuario`) VALUES (pqr, pnombre, ppaterno, pmaterno, pcorreo, ptelefonoc, ptelefonoh, pestado,tipo, pespecialidad, psexo);
	IF tipo = 2 THEN
    	INSERT INTO asesor_data VALUEs (0,pqr,limite,CG_id);
        RETURN 1;     END IF;     IF tipo = 3 THEN
    	INSERT INTO alumno_data VALUES (0,pqr,CG_id);
    	RETURN 2;     END IF;     RETURN 4; ELSE
	return 3; END IF; END$$

DROP FUNCTION IF EXISTS `getusuario`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `getusuario` (`Fqr` VARCHAR(120)) RETURNS INT(11) BEGIN
	DECLARE tipo INT;
    SELECT Itipo_usuario FROM usuario WHERE VidentiQR_usuario = Fqr INTO tipo;
    IF tipo is null THEN
		return -1;
    ELSE
    	return tipo;
    end if;
end$$

DROP FUNCTION IF EXISTS `getusuarioestado`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `getusuarioestado` (`qr` VARCHAR(260)) RETURNS INT(11) BEGIN
	declare estado int;
    select Iestado_usuario from usuario where VidentiQR_usuario = qr into estado;
    return estado;
end$$

DROP FUNCTION IF EXISTS `get_periodo_actual`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `get_periodo_actual` () RETURNS VARCHAR(255) CHARSET utf8mb4 BEGIN
	DECLARE sesionActualPeriodo VARCHAR(255);
    DECLARE integro INT;
    SELECT isperiodo_acc() INTO integro;
    SELECT CONCAT('Periodo actual activo de Residencias Profesionales: ',Vnombre_cg,'	Registro: Inicia(',Dfecha_inicio,')	Termina: (',Dfecha_fin,')') INTO sesionActualPeriodo FROM cgeneracion
		WHERE Iestado_cg = 1 LIMIT 1;
	RETURN sesionActualPeriodo;
END$$

DROP FUNCTION IF EXISTS `isperiodo_acc`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `isperiodo_acc` () RETURNS INT(11) BEGIN
	IF(SELECT COUNT(id_cg) FROM cgeneracion) = 0 THEN
		INSERT INTO cgeneracion VALUES(0,CONCAT(YEAR(CURDATE()),'-1'),'','',0);
        RETURN 1;
    END IF;
    RETURN 2;
END$$

DROP FUNCTION IF EXISTS `istiposession`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `istiposession` (`Fqr` VARCHAR(120), `Fdescripcion` VARCHAR(120)) RETURNS INT(11) BEGIN
	DECLARE tipo INT;
    SELECT Itipo_usuario FROM usuario WHERE VidentiQR_usuario = qr INTO tipo;
    IF tipo is null THEN
		INSERT INTO usuario_ignore(qr, descripcion) VALUES (Fqr, Fdescripcion);
        return -1;
    ELSE
    	return tipo;
    end if;
end$$

DROP FUNCTION IF EXISTS `mod_usuario`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `mod_usuario` (`Fnombre` VARCHAR(255), `Fpaterno` VARCHAR(255), `Fmaterno` VARCHAR(255), `Fcorreo` VARCHAR(255), `FtelefonoC` VARCHAR(255), `FtelefonoH` VARCHAR(255), `Fid_especialidad` INT, `FCsexo` CHAR(1), `FVidenti` VARCHAR(255)) RETURNS INT(11) BEGIN
IF (SELECT VidentiQR_usuario FROM usuario WHERE VidentiQR_usuario = FVidenti) IS NULL THEN
	RETURN 1;
ELSE
UPDATE usuario
SET
Vnombre_usuario = Fnombre,
Vpaterno_usuario = Fpaterno,
Vmaterno_usuario = Fmaterno,
Vcorreo_usuario = Fcorreo,
VtelefonoC_usuario = FtelefonoC,
VtelefonoH_usuario = FtelefonoH,
id_especialidad = Fid_especialidad,
Csexo_usuario = FCsexo
WHERE usuario.VidentiQR_usuario = FVidenti;
	RETURN 0;
END IF;
END$$

DROP FUNCTION IF EXISTS `setespecialidad`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `setespecialidad` (`nombre` VARCHAR(120)) RETURNS INT(11) begin
	INSERT INTO especialidad values(0,nombre);
    return 0;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_data`
--

DROP TABLE IF EXISTS `alumno_data`;
CREATE TABLE `alumno_data` (
  `id_alumno` int(11) NOT NULL,
  `id_usuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_cg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumno_data`
--

INSERT INTO `alumno_data` (`id_alumno`, `id_usuario`, `id_cg`) VALUES
(1, '201414015', 2),
(2, '2583', 2),
(3, '51261351', 2),
(4, '2512', 3),
(5, '12312', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_alumno`
--

DROP TABLE IF EXISTS `asesor_alumno`;
CREATE TABLE `asesor_alumno` (
  `id_pa` int(11) NOT NULL,
  `Iestado_pa` int(11) DEFAULT NULL,
  `Dregistro_pa` date DEFAULT NULL,
  `Dinicio_pa` date DEFAULT NULL,
  `Dfin_pa` date DEFAULT NULL,
  `Iprogreso_pa` int(11) DEFAULT NULL,
  `Irestriccion_pa` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_asesor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asesor_alumno`
--

INSERT INTO `asesor_alumno` (`id_pa`, `Iestado_pa`, `Dregistro_pa`, `Dinicio_pa`, `Dfin_pa`, `Iprogreso_pa`, `Irestriccion_pa`, `id_alumno`, `id_asesor`) VALUES
(1, 6, NULL, NULL, NULL, 100, 1, 1, 6),
(2, 6, NULL, NULL, NULL, 100, 1, 2, 6),
(3, 1, NULL, NULL, NULL, 100, 1, 3, 4),
(4, 6, NULL, '0000-00-00', NULL, 100, 1, 4, 5),
(5, 1, NULL, NULL, NULL, 100, 1, 5, 6),
(6, 0, NULL, NULL, NULL, 100, 1, 5, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_data`
--

DROP TABLE IF EXISTS `asesor_data`;
CREATE TABLE `asesor_data` (
  `id_asesor` int(11) NOT NULL,
  `id_usuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ilimite_asesor` int(11) DEFAULT NULL,
  `id_cg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asesor_data`
--

INSERT INTO `asesor_data` (`id_asesor`, `id_usuario`, `Ilimite_asesor`, `id_cg`) VALUES
(1, '152', 6, 2),
(2, '152', 4, 1),
(3, '1251', 4, 2),
(4, '135251', 10, 2),
(5, '12517', 8, 2),
(6, '20072296005', 2, 2),
(7, '201414049', 5, 2),
(8, '32135423', 10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cgeneracion`
--

DROP TABLE IF EXISTS `cgeneracion`;
CREATE TABLE `cgeneracion` (
  `id_cg` int(11) NOT NULL,
  `Vnombre_cg` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dfecha_inicio` date DEFAULT NULL,
  `Dfecha_fin` date DEFAULT NULL,
  `Iestado_cg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cgeneracion`
--

INSERT INTO `cgeneracion` (`id_cg`, `Vnombre_cg`, `Dfecha_inicio`, `Dfecha_fin`, `Iestado_cg`) VALUES
(1, '2017-1', '2017-05-01', '2017-05-01', 0),
(2, '2017-2', '2017-09-01', '2018-01-26', 1),
(3, '2016-2', '2016-07-01', '2016-08-01', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_avance`
--

DROP TABLE IF EXISTS `documento_avance`;
CREATE TABLE `documento_avance` (
  `id_da` int(11) NOT NULL,
  `Vdescripcion_da` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vlink_da` varchar(895) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VdocumentoDOC_DA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VdocumentoPDF_DA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Iestado_da` int(11) DEFAULT NULL,
  `Ivalidar_da` int(11) DEFAULT NULL,
  `Dfecha_inicio` date DEFAULT NULL,
  `Dfecha_fin` date DEFAULT NULL,
  `Vcomentar_da` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_asesor_alumno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `Vnombre_especialidad` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `Vnombre_especialidad`) VALUES
(1, 'Ingeniería en Sistemas Computacionales'),
(2, 'Mecatronica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `Vnombre_evento` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vdescripcion_evento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_tipo_evento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_docavance`
--

DROP TABLE IF EXISTS `evento_docavance`;
CREATE TABLE `evento_docavance` (
  `id_eda` int(11) NOT NULL,
  `id_da` int(11) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `Iestado_eda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getalumno`
--
DROP VIEW IF EXISTS `getalumno`;
CREATE TABLE `getalumno` (
`VidentiQR_usuario` varchar(120)
,`Vnombre_usuario` varchar(45)
,`Vpaterno_usuario` varchar(45)
,`Vmaterno_usuario` varchar(45)
,`Vcorreo_usuario` varchar(45)
,`VtelefonoC_usuario` varchar(45)
,`VtelefonoH_usuario` varchar(45)
,`Iestado_usuario` int(11)
,`Itipo_usuario` int(11)
,`id_especialidad` int(11)
,`Csexo_usuario` char(1)
,`id_alumno` int(11)
,`id_usuario` varchar(255)
,`id_cg` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getdataadmin`
--
DROP VIEW IF EXISTS `getdataadmin`;
CREATE TABLE `getdataadmin` (
`VidentiQR_usuario` varchar(120)
,`Vnombre_usuario` varchar(45)
,`Vpaterno_usuario` varchar(45)
,`Vmaterno_usuario` varchar(45)
,`Vcorreo_usuario` varchar(45)
,`VtelefonoC_usuario` varchar(45)
,`VtelefonoH_usuario` varchar(45)
,`Iestado_usuario` int(11)
,`Itipo_usuario` int(11)
,`id_especialidad` int(11)
,`Csexo_usuario` char(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getdatausuario`
--
DROP VIEW IF EXISTS `getdatausuario`;
CREATE TABLE `getdatausuario` (
`VidentiQR_usuario` varchar(120)
,`Vnombre_usuario` varchar(45)
,`Vpaterno_usuario` varchar(45)
,`Vmaterno_usuario` varchar(45)
,`Vcorreo_usuario` varchar(45)
,`VtelefonoC_usuario` varchar(45)
,`VtelefonoH_usuario` varchar(45)
,`Iestado_usuario` int(11)
,`Itipo_usuario` int(11)
,`id_especialidad` int(11)
,`Csexo_usuario` char(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getdocentes`
--
DROP VIEW IF EXISTS `getdocentes`;
CREATE TABLE `getdocentes` (
`periodos_regs` int(11)
,`VidentiQR_usuario` varchar(120)
,`Vnombre_usuario` varchar(45)
,`Vpaterno_usuario` varchar(45)
,`Vmaterno_usuario` varchar(45)
,`Vcorreo_usuario` varchar(45)
,`VtelefonoC_usuario` varchar(45)
,`VtelefonoH_usuario` varchar(45)
,`Iestado_usuario` int(11)
,`Itipo_usuario` int(11)
,`id_especialidad` int(11)
,`Csexo_usuario` char(1)
,`id_asesor` int(11)
,`id_usuario` varchar(255)
,`Ilimite_asesor` int(11)
,`id_cg` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getespecialidad`
--
DROP VIEW IF EXISTS `getespecialidad`;
CREATE TABLE `getespecialidad` (
`id_especialidad` int(11)
,`Vnombre_especialidad` varchar(120)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getperiodo`
--
DROP VIEW IF EXISTS `getperiodo`;
CREATE TABLE `getperiodo` (
`id_cg` int(11)
,`Vnombre_cg` varchar(45)
,`Dfecha_inicio` date
,`Dfecha_fin` date
,`Iestado_cg` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getperiododocenteis`
--
DROP VIEW IF EXISTS `getperiododocenteis`;
CREATE TABLE `getperiododocenteis` (
`VidentiQR_usuario` varchar(120)
,`id_asesor` int(11)
,`Vnombre_cg` varchar(45)
,`Iestado_cg` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `get_profesores_alm_finaliza`
--
DROP VIEW IF EXISTS `get_profesores_alm_finaliza`;
CREATE TABLE `get_profesores_alm_finaliza` (
`VidentiQR_usuario` varchar(120)
,`Vnombre_usuario` varchar(45)
,`Vpaterno_usuario` varchar(45)
,`Vmaterno_usuario` varchar(45)
,`Csexo_usuario` char(1)
,`numSolicitud` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `get_profesores_solicitados`
--
DROP VIEW IF EXISTS `get_profesores_solicitados`;
CREATE TABLE `get_profesores_solicitados` (
`VidentiQR_usuario` varchar(120)
,`Vnombre_usuario` varchar(45)
,`Vpaterno_usuario` varchar(45)
,`Vmaterno_usuario` varchar(45)
,`Csexo_usuario` char(1)
,`numSolicitud` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

DROP TABLE IF EXISTS `tipo_evento`;
CREATE TABLE `tipo_evento` (
  `id_te` int(11) NOT NULL,
  `Vdescripcion_tevento` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `VidentiQR_usuario` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `Vnombre_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vpaterno_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vmaterno_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vcorreo_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VtelefonoC_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VtelefonoH_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Iestado_usuario` int(11) DEFAULT NULL,
  `Itipo_usuario` int(11) DEFAULT NULL COMMENT '1 Administrador, 2 Docente, 3 Alumno',
  `id_especialidad` int(11) DEFAULT NULL,
  `Csexo_usuario` char(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`VidentiQR_usuario`, `Vnombre_usuario`, `Vpaterno_usuario`, `Vmaterno_usuario`, `Vcorreo_usuario`, `VtelefonoC_usuario`, `VtelefonoH_usuario`, `Iestado_usuario`, `Itipo_usuario`, `id_especialidad`, `Csexo_usuario`) VALUES
('12312', 'jca', 'asd', 'dac', 'asd@fsd.es', '123123', '12312', 1, 3, 1, 'M'),
('1251', 'Juan', 'Carlos', 'Meja', 'Moreno@gmail.com', '251521', '5121651', 1, 2, 1, 'M'),
('12517', 'Juan', 'Carlos', 'Mejia', 'irving@gmail.com', '25454', '215121', 1, 2, 1, 'F'),
('135251', '1234', '2', '2', '1234@gmail.com', '1234', '2', 1, 2, 2, 'M'),
('152', 'Manuel', 'Montolla', 'Minessota', 'tescha@edu.net', '5512400061', '17371124', 1, 2, 2, 'M'),
('20072296005', 'ADAN', 'LOPEZ', 'sanchez', 'ingadamls09@hotmail.com', '5561616263', '0754545', 0, 2, 1, 'M'),
('201414015', 'Juan', 'Medina', 'Mora', 'juanmedi@gmail.es', '5512400061', '55124066685', 1, 3, 1, 'M'),
('201414049', 'Irving', 'Moncada', 'Lucio', 'irving2323@gmail.com', '5512400061', '5512400061', 1, 2, 1, 'F'),
('2512', 'Eleuterio', 'Mendoza', 'Sandivar', 'sandivar@gmaiol.com', '551240006235', '2563256', 1, 3, 1, 'M'),
('2583', 'Juan', 'Medin', 'Meridillin', '55@es.es', '5512400061', '5512400061', 1, 3, 1, 'F'),
('32135423', '2131', '321', '32', '13@g.c', '51', '3', 1, 2, 1, 'F'),
('51261351', '31321', '651', '3', '51@testes.es', '351', '321315', 1, 3, 1, 'F'),
('528', 'Med', 'Moncada', 'Lucio', 'irving2323@gmail.com', '5512400061', '5512400062', 1, 1, 1, 'M'),
('6232953', 'Juan', 'Mora', 'Mora', 'junito@gmail.es', '5512400061', '5512400061', 1, 1, 1, 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ignore`
--

DROP TABLE IF EXISTS `usuario_ignore`;
CREATE TABLE `usuario_ignore` (
  `id` int(11) NOT NULL,
  `qr` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura para la vista `getalumno`
--
DROP TABLE IF EXISTS `getalumno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getalumno`  AS  select `u`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`u`.`Vnombre_usuario` AS `Vnombre_usuario`,`u`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`u`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`u`.`Vcorreo_usuario` AS `Vcorreo_usuario`,`u`.`VtelefonoC_usuario` AS `VtelefonoC_usuario`,`u`.`VtelefonoH_usuario` AS `VtelefonoH_usuario`,`u`.`Iestado_usuario` AS `Iestado_usuario`,`u`.`Itipo_usuario` AS `Itipo_usuario`,`u`.`id_especialidad` AS `id_especialidad`,`u`.`Csexo_usuario` AS `Csexo_usuario`,`ad`.`id_alumno` AS `id_alumno`,`ad`.`id_usuario` AS `id_usuario`,`ad`.`id_cg` AS `id_cg` from (`usuario` `u` join `alumno_data` `ad` on((`u`.`VidentiQR_usuario` = `ad`.`id_usuario`))) where (`u`.`Itipo_usuario` = 3) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `getdataadmin`
--
DROP TABLE IF EXISTS `getdataadmin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getdataadmin`  AS  select `usuario`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`usuario`.`Vnombre_usuario` AS `Vnombre_usuario`,`usuario`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`usuario`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`usuario`.`Vcorreo_usuario` AS `Vcorreo_usuario`,`usuario`.`VtelefonoC_usuario` AS `VtelefonoC_usuario`,`usuario`.`VtelefonoH_usuario` AS `VtelefonoH_usuario`,`usuario`.`Iestado_usuario` AS `Iestado_usuario`,`usuario`.`Itipo_usuario` AS `Itipo_usuario`,`usuario`.`id_especialidad` AS `id_especialidad`,`usuario`.`Csexo_usuario` AS `Csexo_usuario` from `usuario` where (`usuario`.`Itipo_usuario` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `getdatausuario`
--
DROP TABLE IF EXISTS `getdatausuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getdatausuario`  AS  select `usuario`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`usuario`.`Vnombre_usuario` AS `Vnombre_usuario`,`usuario`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`usuario`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`usuario`.`Vcorreo_usuario` AS `Vcorreo_usuario`,`usuario`.`VtelefonoC_usuario` AS `VtelefonoC_usuario`,`usuario`.`VtelefonoH_usuario` AS `VtelefonoH_usuario`,`usuario`.`Iestado_usuario` AS `Iestado_usuario`,`usuario`.`Itipo_usuario` AS `Itipo_usuario`,`usuario`.`id_especialidad` AS `id_especialidad`,`usuario`.`Csexo_usuario` AS `Csexo_usuario` from `usuario` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `getdocentes`
--
DROP TABLE IF EXISTS `getdocentes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getdocentes`  AS  select `ad`.`id_asesor` AS `periodos_regs`,`u`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`u`.`Vnombre_usuario` AS `Vnombre_usuario`,`u`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`u`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`u`.`Vcorreo_usuario` AS `Vcorreo_usuario`,`u`.`VtelefonoC_usuario` AS `VtelefonoC_usuario`,`u`.`VtelefonoH_usuario` AS `VtelefonoH_usuario`,`u`.`Iestado_usuario` AS `Iestado_usuario`,`u`.`Itipo_usuario` AS `Itipo_usuario`,`u`.`id_especialidad` AS `id_especialidad`,`u`.`Csexo_usuario` AS `Csexo_usuario`,`ad`.`id_asesor` AS `id_asesor`,`ad`.`id_usuario` AS `id_usuario`,`ad`.`Ilimite_asesor` AS `Ilimite_asesor`,`ad`.`id_cg` AS `id_cg` from (`usuario` `u` join `asesor_data` `ad` on((`u`.`VidentiQR_usuario` = `ad`.`id_usuario`))) where (`u`.`Itipo_usuario` = 2) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `getespecialidad`
--
DROP TABLE IF EXISTS `getespecialidad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getespecialidad`  AS  select `especialidad`.`id_especialidad` AS `id_especialidad`,`especialidad`.`Vnombre_especialidad` AS `Vnombre_especialidad` from `especialidad` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `getperiodo`
--
DROP TABLE IF EXISTS `getperiodo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getperiodo`  AS  select `cgeneracion`.`id_cg` AS `id_cg`,`cgeneracion`.`Vnombre_cg` AS `Vnombre_cg`,`cgeneracion`.`Dfecha_inicio` AS `Dfecha_inicio`,`cgeneracion`.`Dfecha_fin` AS `Dfecha_fin`,`cgeneracion`.`Iestado_cg` AS `Iestado_cg` from `cgeneracion` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `getperiododocenteis`
--
DROP TABLE IF EXISTS `getperiododocenteis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getperiododocenteis`  AS  select `u`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`ad`.`id_asesor` AS `id_asesor`,`cg`.`Vnombre_cg` AS `Vnombre_cg`,`cg`.`Iestado_cg` AS `Iestado_cg` from ((`usuario` `u` join `asesor_data` `ad` on((`u`.`VidentiQR_usuario` = `ad`.`id_usuario`))) join `cgeneracion` `cg` on((`cg`.`id_cg` = `ad`.`id_cg`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `get_profesores_alm_finaliza`
--
DROP TABLE IF EXISTS `get_profesores_alm_finaliza`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `get_profesores_alm_finaliza`  AS  select `u`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`u`.`Vnombre_usuario` AS `Vnombre_usuario`,`u`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`u`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`u`.`Csexo_usuario` AS `Csexo_usuario`,count(`aa`.`id_asesor`) AS `numSolicitud` from ((`asesor_alumno` `aa` join `asesor_data` `ada` on((`aa`.`id_asesor` = `ada`.`id_asesor`))) join `usuario` `u` on((`u`.`VidentiQR_usuario` = `ada`.`id_usuario`))) where (`aa`.`id_asesor` in (select `asesor_data`.`id_asesor` from `asesor_data` group by `asesor_data`.`id_usuario`) and (`aa`.`Iestado_pa` = 6)) group by `aa`.`id_asesor` order by count(`aa`.`id_asesor`) desc ;

-- --------------------------------------------------------

--
-- Estructura para la vista `get_profesores_solicitados`
--
DROP TABLE IF EXISTS `get_profesores_solicitados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `get_profesores_solicitados`  AS  select `u`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`u`.`Vnombre_usuario` AS `Vnombre_usuario`,`u`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`u`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`u`.`Csexo_usuario` AS `Csexo_usuario`,count(`aa`.`id_asesor`) AS `numSolicitud` from ((`asesor_alumno` `aa` join `asesor_data` `ada` on((`aa`.`id_asesor` = `ada`.`id_asesor`))) join `usuario` `u` on((`u`.`VidentiQR_usuario` = `ada`.`id_usuario`))) where `aa`.`id_asesor` in (select `asesor_data`.`id_asesor` from `asesor_data` group by `asesor_data`.`id_usuario`) group by `aa`.`id_asesor` order by count(`aa`.`id_asesor`) desc limit 12 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno_data`
--
ALTER TABLE `alumno_data`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cg` (`id_cg`);

--
-- Indices de la tabla `asesor_alumno`
--
ALTER TABLE `asesor_alumno`
  ADD PRIMARY KEY (`id_pa`),
  ADD KEY `id_asesor` (`id_asesor`),
  ADD KEY `fk_asesor_alumno_1_idx` (`id_alumno`);

--
-- Indices de la tabla `asesor_data`
--
ALTER TABLE `asesor_data`
  ADD PRIMARY KEY (`id_asesor`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cg` (`id_cg`);

--
-- Indices de la tabla `cgeneracion`
--
ALTER TABLE `cgeneracion`
  ADD PRIMARY KEY (`id_cg`);

--
-- Indices de la tabla `documento_avance`
--
ALTER TABLE `documento_avance`
  ADD PRIMARY KEY (`id_da`),
  ADD KEY `id_asesor_alumno` (`id_asesor_alumno`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_tipo_evento` (`id_tipo_evento`);

--
-- Indices de la tabla `evento_docavance`
--
ALTER TABLE `evento_docavance`
  ADD PRIMARY KEY (`id_eda`),
  ADD KEY `id_da` (`id_da`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  ADD PRIMARY KEY (`id_te`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`VidentiQR_usuario`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `usuario_ignore`
--
ALTER TABLE `usuario_ignore`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno_data`
--
ALTER TABLE `alumno_data`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `asesor_alumno`
--
ALTER TABLE `asesor_alumno`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `asesor_data`
--
ALTER TABLE `asesor_data`
  MODIFY `id_asesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `cgeneracion`
--
ALTER TABLE `cgeneracion`
  MODIFY `id_cg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `documento_avance`
--
ALTER TABLE `documento_avance`
  MODIFY `id_da` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evento_docavance`
--
ALTER TABLE `evento_docavance`
  MODIFY `id_eda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  MODIFY `id_te` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_ignore`
--
ALTER TABLE `usuario_ignore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_data`
--
ALTER TABLE `alumno_data`
  ADD CONSTRAINT `alumno_data_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`VidentiQR_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_data_ibfk_2` FOREIGN KEY (`id_cg`) REFERENCES `cgeneracion` (`id_cg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asesor_alumno`
--
ALTER TABLE `asesor_alumno`
  ADD CONSTRAINT `asesor_alumno_ibfk_2` FOREIGN KEY (`id_asesor`) REFERENCES `asesor_data` (`id_asesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asesor_alumno_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno_data` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asesor_data`
--
ALTER TABLE `asesor_data`
  ADD CONSTRAINT `asesor_data_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`VidentiQR_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asesor_data_ibfk_2` FOREIGN KEY (`id_cg`) REFERENCES `cgeneracion` (`id_cg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documento_avance`
--
ALTER TABLE `documento_avance`
  ADD CONSTRAINT `documento_avance_ibfk_1` FOREIGN KEY (`id_asesor_alumno`) REFERENCES `asesor_alumno` (`id_pa`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_tipo_evento`) REFERENCES `tipo_evento` (`id_te`);

--
-- Filtros para la tabla `evento_docavance`
--
ALTER TABLE `evento_docavance`
  ADD CONSTRAINT `evento_docavance_ibfk_1` FOREIGN KEY (`id_da`) REFERENCES `documento_avance` (`id_da`),
  ADD CONSTRAINT `evento_docavance_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
