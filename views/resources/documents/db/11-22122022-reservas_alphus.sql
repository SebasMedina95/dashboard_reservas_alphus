-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2022 a las 03:52:09
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas_alphus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL COMMENT 'Id PK de la tabla',
  `perfil` text NOT NULL COMMENT 'Acceso que tendrá el empleado en el sistema, para controlar por las variables de session. Los permisos son:\r\n\r\nAdministrador - Acceso Total ***\r\nSuper Editor - Gestión General Reservas ***\r\nMenor Editor - Gestión General Habitaciones ***\r\nContabilidad - Nómina y Cuentas ***\r\nAtracciones - Servicio y Bodega ***\r\nRestaurante - Servicio y Bodega ***\r\nMarketing ***',
  `primer_nombre` text NOT NULL,
  `segundo_nombre` text NOT NULL,
  `primer_apellido` text NOT NULL,
  `segundo_apellido` text NOT NULL,
  `tipo_documento` text NOT NULL COMMENT 'CC  - Cédula Ciudadanía ***\r\nTE  - Tarjeta Extranjería ***\r\nCE  - Cédula Extranjería ***\r\nLM  - Libreta Militar ***\r\nPC  - Pase Conducción ***\r\nNIT - Nit Empresa ***\r\nPSP - Pasaporte ***',
  `documento` text NOT NULL COMMENT 'Número de documento',
  `email` text NOT NULL COMMENT 'Correo electrónico del empleado para procesos de comunicación ',
  `telefono_fijo` text NOT NULL COMMENT 'Teléfono Fijo del empleado con particularidad ###XXXXXXX donde # esel código llamada y lo otro el número',
  `telefono_movil` text NOT NULL COMMENT 'Teléfono celular sin importar el operador',
  `direccion` text NOT NULL COMMENT 'Dirección residencial del empleado con detalle asociado',
  `fecha_nacimiento` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de nacimiento en formato YYYY-MM-DD',
  `estado_civil` text NOT NULL COMMENT '1 - Soltero(a) *** 2 - Casado(a) *** 3 - Viudo(a) *** 4 - Divorciado(a)*** 5 - Unión Libre ***',
  `tipo_regimen` text NOT NULL COMMENT '1 - Estado ***\r\n2 - Gran Contribuyente *** \r\n3 - Común ***\r\n4 - Simple ***\r\n5 - No Responsable ***\r\n6 - Pendiente ***',
  `tipo_persona` text NOT NULL COMMENT '1 - Natural\r\n			   2 - Jurídica',
  `usuario` text NOT NULL COMMENT 'Nombre de usuario para acceder al sistema - Credencial usuario',
  `password` text NOT NULL COMMENT 'Contraseña de usuario para acceder al sistema - Credencial contraseña',
  `foto` text NOT NULL COMMENT 'Foto JPG, PNG de máximo 2 MB de tamaño y que se reajusta el tamaño a 500x5oo píxeles',
  `estado` text NOT NULL COMMENT '1 - Activo *** 2 - Inactivo ***',
  `anotaciones` text NOT NULL COMMENT 'Observaciones adicionalkes que se deban considerar al registrar al administrador, serán útiles si de pronto debemos considerar aspectos de prueba',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `perfil`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `tipo_documento`, `documento`, `email`, `telefono_fijo`, `telefono_movil`, `direccion`, `fecha_nacimiento`, `estado_civil`, `tipo_regimen`, `tipo_persona`, `usuario`, `password`, `foto`, `estado`, `anotaciones`, `fecha`) VALUES
(1, 'Administrador', 'Juan', 'Sebastian', 'Medina', 'Toro', 'CC', '12167179499', 'JSebastian19952011@hotmail.com', '6043214520', '3117115833', 'Carrera 158 # 57-147 (105)', '1995-05-02', '1', '5', '1', 'sebasadmon', '$2a$07$asxx54ahjppf45sd87a5aumLC2JivXouuYuKpKE3oDYYuCG6PA0Lu', 'views/img/admins/12167179499/12167179499.jpg', '1', 'Este es el primer administrador que he creado, será el macro admin de todo el sistema, o sea, seré yo merengues y como el merengue es rico entonces estamos bien pero bien melos.', '2022-10-17 22:55:27'),
(2, 'Super Editor', 'Amalia', '', 'Medina', 'Urrego', 'CC', '1452000365', 'amaliamed-78@gmail.com', '6044168666', '3145200012', 'Cl 26A # 16-125B', '1997-09-11', '1', '5', '1', 'amaliamed', '$2a$07$asxx54ahjppf45sd87a5auty22zIJRnMYqNDtymoojpzy2t6Q6axe', 'views/img/admins/1452000365/1452000365.jpg', '1', '', '2022-10-17 22:55:59'),
(3, 'Administrador', 'Yulieth', 'Marcela', 'Urrego', 'Restrepo', 'CC', '1563333201', 'yuliethurregppdo_4@gmail.com', '6044196325', '3145203364', 'Carrera 43A # 45-6d', '2001-11-15', '1', '5', '1', 'yulieth', '$2a$07$asxx54ahjppf45sd87a5aujtyNwLqBxIt8bNw7BB9InBpgbo9kRpK', 'views/img/admins/1563333201/1563333201.jpg', '1', '', '2022-10-17 22:56:01'),
(6, 'Contabilidad', 'Fabio', 'De Jesus', 'Medina', 'Henao', 'CC', '65230001', 'fmedina1957@gmail.com', '6044084266', '3136339456', 'Carrera 158 # 57-412A (205)', '2002-03-19', '1', '5', '1', 'fabiomedina', '$2a$07$asxx54ahjppf45sd87a5auNvkL.EiLRzwV8863ShRKg5vDI/tz1Jm', 'views/img/admins/65230001/65230001.jpg', '1', '', '2022-10-17 22:56:03'),
(15, 'Atracciones', 'Maria', 'Paulina', 'Sandoval', 'Meneses', 'CC', '1784333291', 'pauli-maria123@gmail.com', '6043219012', '3109999909', 'Carrera 16A # 27-134D', '1988-11-21', '1', '5', '1', 'mariapaulina', '$2a$07$asxx54ahjppf45sd87a5au7pKzg1k1P4zeeh.Dib6WxSaGXrFI4PW', 'views/img/admins/1784333291/488.jpg', '1', '', '2022-10-19 04:42:07'),
(19, 'Administrador', 'Luna', '', 'Restrepo', 'Restrepo', 'CC', '1563200129', 'lunapeludita_123@gmail.com', '6043126399', '3102659978', 'Carrera 26A #45C-35 int 1005', '1987-01-01', '1', '5', '1', 'lunarestrepo', '$2a$07$asxx54ahjppf45sd87a5auUrtHVoumuc.UrVG4z.xm8TzQCe61A1y', 'views/img/admins/1563200129/1563200129.jpg', '1', '', '2022-10-17 22:56:08'),
(20, 'Atracciones', 'Geraldine', '', 'Mendoza', 'Vallejuelos', 'CC', '1032666980', 'geraldinevalle_45@hotmail.com', '6045289641', '3102654103', 'Calle 27A # 125-63A', '1981-05-05', '1', '5', '1', 'geralinemendoza', '$2a$07$asxx54ahjppf45sd87a5auDDBnJWWBipCqCuZISqRT70EV0g2DjP6', 'views/img/admins/1032666980/1032666980.jpg', '0', '', '2022-10-17 22:56:11'),
(23, 'Restaurante', 'Norma', '', 'Hernadez', 'Fernandez', 'CC', '98563125', 'fernandeznorma25@yahoo.es', '6042569632', '3125697855', 'Carrera 19C # 125-63A Apto 240', '2001-03-03', '1', '5', '1', 'normahernandez', '$2a$07$asxx54ahjppf45sd87a5auWkiS2nbKveII3SxfC/sQicDaBdECNou', 'views/img/admins/98563125/98563125-176.jpg', '1', 'Imagen actualizada como prueba', '2022-10-17 22:56:14'),
(28, 'Atracciones', 'Karolain', 'Maria', 'Hinestroza', 'Upegui', 'CC', '1432891109', 'hinestrozak1@gmail.com', '6402780122', '3129032212', 'Carrera 109A # 290-34C', '2000-03-05', '1', '5', '1', 'karolainhinestroza', '$2a$07$asxx54ahjppf45sd87a5auAqIuF1ez78Z2w4S1voC7z23SbdUhxyS', 'views/img/admins/1432891109/1432891109.jpg', '1', 'Esta es la prueba de la descripción completa para Karolain con todos los detalles y nuevos campos - Hemos actualizado - Nuevamente', '2022-10-17 22:56:17'),
(29, 'Contabilidad', 'Adriana', 'Patricia', 'Restrepo', 'Parra', 'CC', '85210336', 'adrianaparra_2022@gmail.com', '6045210366', '3195202234', 'Calle 63 # 156-48 Travesías - Inventada', '1979-01-16', '1', '5', '1', 'adrianarestrepo', '$2a$07$asxx54ahjppf45sd87a5aucJMLgE4GFlf4WwGCAEVaJLXSDstCBeK', 'views/img/admins/85210336/85210336.jpg', '1', 'Registro para probar roles de contabilidad dentro de la empresa, es importante hacer las definiciones adicionales según sea el caso. Generar diferentes casos de estudio para los conceptos contables.', '2022-10-17 22:56:19'),
(30, 'Menor Editor', 'Helena', '', 'Salazar', 'Monrreal', 'CC', '98674066', 'soyhelenasalazar3@hotmail.com', '6045478965', '3125635210', 'Carrera 45A # 23C-158', '1990-08-29', '1', '5', '1', 'helenasalazar', '$2a$07$asxx54ahjppf45sd87a5au8lPSv8f3h3/0kpR7.kdhT8WH2q4Cl3m', 'views/img/admins/98674066/98674066-347.jpg', '1', 'Este usuario nos ayudará para controlar el tema de las habitaciones y las categorías asociadas a las habitaciones, usuario macro para los temas de gestión del servicio principal del hotel.', '2022-10-17 22:56:21'),
(31, 'Super Editor', 'Duriel', '', 'Monsalve', 'Velez', 'CC', '85498999', 'duri_velez78@gmail.com', '6044256310', '3162012666', 'Calle 45A # 33 -45A Apto 1502', '1985-10-05', '1', '5', '1', 'durielmonsalve', '$2a$07$asxx54ahjppf45sd87a5auX6fK7hfEusR/pbxRrBhz9YW1jqQo.Zq', 'views/img/admins/85498999/85498999.jpg', '1', 'Usuario con el que se gestionará el sistema de reservas generales del hotel', '2022-10-17 22:56:25'),
(32, 'Marketing', 'Gabriela', '', 'Upegui', 'Galenano', 'CC', '89562332', 'gabiupegui_25@gmail.com', '6045698852', '3162015633', 'Carrera 465A # 35-125', '1984-06-24', '1', '5', '1', 'gabrielaupegui', '$2a$07$asxx54ahjppf45sd87a5auc1hTNyxHG6QJ9PC65wqW4wAIeuj694q', 'views/img/admins/89562332/89562332.jpg', '1', 'Gestora y promotora de todo el tema que será relacionado con el marketing y publicidad del hotel.', '2022-10-17 22:56:27'),
(33, 'Atracciones', 'Tomas', 'Alonso', 'Monsalve', 'Barrientos', 'CC', '1000000325', 'tmonsalvebarrientos6@hotmail.com', '6042563210', '3126125896', 'Calle 17A # 33c-115', '1991-12-28', '1', '5', '1', 'tomasmonsalve', '$2a$07$asxx54ahjppf45sd87a5au3z0l15zK5tvgcX6sdiKpakmW/WL1mcm', 'views/img/admins/1000000325/1000000325.jpg', '1', 'El usuario gerenciará todas las atracciones de las que dispone el hotel para la prestación del servicio a los turistas y huéspedes del hotel.', '2022-10-17 22:56:29'),
(35, 'Marketing', 'Geraldine', '', 'Jaramillo', 'Hinestroza', 'CC', '96521369', 'gerald-jaramill9@live.com', '6045789612', '3168520014', 'Carrera 16A # 45C - 29 (4to Piso)', '1992-01-15', '1', '5', '1', 'geraldinejaramillo', '$2a$07$asxx54ahjppf45sd87a5auoFLr9oUv9X7/eUXcdzp9WET8IIZckcW', 'views/img/admins/96521369/96521369.jpg', '1', 'Campaña de marketing, se gestionará todo el proceso de control del sitio para mantener la estética y futuras mejoras que podrían acarrearse durante la aplicación de nuevos conocimientos en el sitio web.', '2022-10-17 22:56:32'),
(46, 'Super Editor', 'Maria', 'Isabel', 'Tabares', '', 'CC', '1200312458', 'mariatabares-4@gmail.com', '6044123652', '3125216332', 'Calle 132A # 33-45 Casanares Apto 950', '1994-02-16', '1', '5', '1', 'mariatabares', '$2a$07$asxx54ahjppf45sd87a5aua29Ads0mn5f07Wtc.3nytBuPMrRd8dW', 'views/img/admins/1200312458/1200312458-680.jpg', '1', 'Esta super editora nos va a ayudar con el tema de la gestión general de las reservas del hotel, tendrá el rol genérico de control', '2022-10-17 22:56:34'),
(48, 'Menor Editor', 'Charles', '', 'Díaz', 'Duarte', 'CC', '95632012', 'charles1-diaz8@hotmail.com', '6045633302', '3102563345', 'Carrera 195sur # 10-25', '1987-09-07', '1', '5', '1', 'charlesdiaz', '$2a$07$asxx54ahjppf45sd87a5auoq29YXN5tSEm0NpZES8FNickbxy9doq', 'views/img/admins/95632012/95632012-998.jpg', '1', 'Empleado de confianza a cargo de las ediciones menores del sitio en la gestión general', '2022-10-17 22:56:35'),
(49, 'Marketing', 'Andres', '', 'Vernazza', 'Valerius', 'CC', '1001564589', 'andre_vv124@gmai.com', '6044123699', '3165210023', 'Calle 71A # 126-4c', '1989-09-02', '1', '5', '1', 'andresvernazza', '$2a$07$asxx54ahjppf45sd87a5auV5/05wbnVxw6ygAuX0kyxEmIGiyxzJC', 'views/img/admins/1001564589/1001564589.jpg', '1', 'Andrés como RH especializado también nos va a ayudar con el tema de marketing y como parte del servicio de relajación', '2022-10-17 22:56:37'),
(50, 'Contabilidad', 'Alexandra', '', 'Arteaga', 'Quintero', 'CC', '1203301021', 'alexdi-quintero2@yahoo.es', '6045105633', '3102310023', 'Carrera 13A # 15-125 4to piso', '1992-02-02', '2', '5', '1', 'alexandraarteaga', '$2a$07$asxx54ahjppf45sd87a5auDMPtiue/O9TS6nBcl2a6VoAyp6tXp9i', 'views/img/admins/1203301021/1203301021.jpg', '1', 'Soporte para los temas de contabilidad', '2022-10-17 22:56:39'),
(51, 'Atracciones', 'Laura', '', 'Ciro', 'Cinfuentes', 'CC', '1216415231', 'lauracirocinfuentes3@gmail.com', '6044126321', '3105212203', 'Carrera 45C # 20-123 T Apto 650', '1994-12-12', '1', '5', '1', 'lauraciro', '$2a$07$asxx54ahjppf45sd87a5aua5TkOA7eMI3yvq1cbFY7vvHsEjqkZb2', 'views/img/admins/1216415231/1216415231.jpg', '1', 'Asistente en las atracciones del hotel y la logística general para servicios de Spa, relajación y turismo.', '2022-10-17 22:56:41'),
(52, 'Restaurante', 'Esteban', '', 'González', 'Peña', 'CC', '1356632101', 'estebanquito-poli@gmail.com', '6045201236', '3102635689', 'Carrera 26A Itagüí # 125-9 Urbanización Valinores Altos Apto 632 ', '1996-06-15', '1', '5', '1', 'estebangonzales', '$2a$07$asxx54ahjppf45sd87a5auAK.F0XuW0lsyr6enoyA1meiG30amKO2', 'views/img/admins/1356632101/1356632101.jpg', '1', 'Compañero del Poli', '2022-10-17 22:56:43'),
(54, 'Marketing', 'Liz', '', 'Gómez', 'Herrera', 'CC', '93452012', 'lizgo-herrera56@gmail.com', '6044273363', '3162056697', 'Carrera 126A # 52-63', '1993-09-17', '1', '5', '1', 'lizgomez', '$2a$07$asxx54ahjppf45sd87a5ausXTgbgT48.JX/yruu3Fz8y/QEIYL8xC', 'views/img/admins/93452012/93452012.jpg', '1', 'Compañera del Poli que pertenecía a RH de la U y era de audiovisual - La traga de Alex y Banano jajaja', '2022-10-17 22:56:44'),
(58, 'Atracciones', 'Elkin', 'Dario', 'Hernández ', 'Cañas', 'CC', '1154563102', 'elkintopiso1@hotmail.com', '6044126355', '3112012360', 'CARRERA 116a # 33-120A', '1997-07-06', '3', '5', '1', 'elkinhernandez', '$2a$07$asxx54ahjppf45sd87a5au2r8dfaDJazPPgUyBsmfdMz2YHRG1qrK', 'views/img/admins/1154563102/1154563102.jpg', '1', 'Ex compañero del Poli, se retiró de la carrera para estudiar salud ocupacional', '2022-10-17 22:56:47'),
(59, 'Atracciones', 'Leidy', '', 'Gonzalez', 'Hinestroza', 'CC', '1420102362', 'hinestrozaleidy12@hotmail.com', '6042568723', '3112520300', 'Carrera 16A Transv 5 # 23-45', '2001-03-02', '1', '5', '1', 'leidygonzalez', '$2a$07$asxx54ahjppf45sd87a5auDVQxJouw6zUe2hEzOmIJAQyCUsjJSxa', 'views/img/admins/1420102362/1420102362.jpg', '1', 'Empleado para la gestión de las atracciones, prestando el servicio principalmente en los paseos por lancha', '2022-10-17 22:56:50'),
(60, 'Administrador', 'Emmanuel', '', 'Cano', 'Cano', 'CC', '1216718520', 'emacano-12@gmail.com', '6042856312', '3124563296', 'Carrera 26C # 25-48', '1995-08-07', '2', '5', '1', 'emmanuelcano', '$2a$07$asxx54ahjppf45sd87a5auXlhCfcYmsacONd2lvvAB3/MoAz8Yu2q', 'views/img/admins/1216718520/1216718520.jpg', '1', 'Ex compañero del colegio, hace rato no veo a este guevon, lo último que supe fue que se casó', '2022-10-17 22:56:52'),
(61, 'Administrador', 'Yulieth', 'Marcela', 'Urrego', 'Restrepo', 'CC', '1002632101', 'yuliurrego991@gmail.com', '6044163215', '3156239678', 'Carrera 156A # 133-45 Travesías parte baja', '2003-11-16', '1', '5', '1', 'yuliurrego', '$2a$07$asxx54ahjppf45sd87a5aueWplnPUN1JDVQO5Qib9uwVIOYnrRFU6', 'views/img/admins/1002632101/1002632101-274.jpg', '1', 'Mi chelita hermosa - Prueba de actualización usando AsyncAwait', '2022-10-18 05:47:38'),
(62, 'Super Editor', 'Sofia', '', 'Torres', 'Torres', 'CC', '1326415969', 'sofitorres23@gmail.com', '6044085263', '3102639963', 'Calle Balmoral 32 San Cristóbal # 49-129A', '1995-12-28', '5', '5', '1', 'sofiatorres', '$2a$07$asxx54ahjppf45sd87a5autK4wL8RnIZKlb7MPREW8xIIAM0TOpHq', 'views/img/admins/1326415969/1326415969.jpg', '1', 'Para la gestión de las reservas y tener mas amplitud de la data de los empleados del hotel', '2022-10-17 22:57:13'),
(63, 'Atracciones', 'Juliana', '', 'Monsalve', 'Monsalve', 'CC', '1563203217', 'julianamonsalve-2563@gmail.com', '6044089996', '3105263300', 'Carrera 198 # 33A - 45 Cond Pedregal Alto', '2002-05-07', '2', '5', '1', 'julianamonsalve', '$2a$07$asxx54ahjppf45sd87a5auTpeO1W63HVL/K.yVFhhtXnAVJzkQHTW', 'views/img/admins/1563203217/1563203217.jpg', '1', 'La Juliana, conocida en el bajo mundo como el gnomo', '2022-10-17 22:57:16'),
(64, 'Menor Editor', 'Carlos', '', 'Moreno', 'Yepes', 'CC', '1215410231', 'caliche-moreno8@gmail.com', '6045796852', '3195203645', 'Carrera 45A # 23D - 65 Envigado Sur', '1996-06-02', '1', '5', '1', 'carlosmoreno', '$2a$07$asxx54ahjppf45sd87a5auqBmx6i8UlzmfeXYuOzUbmdLnPn5YuTC', 'views/img/admins/1215410231/1215410231.jpg', '1', 'Compañero Carlos que, luego de que nos graduáramos del Poli el se quedo batallando aún, le faltaban unos 5 semestres maso menos la última vez que hablamos. Con este usuario haremos parte de gestión de habitaciones.', '2022-10-17 22:57:18'),
(65, 'Atracciones', 'Katerin', 'Fernanda', 'Quintero', 'Barrera', 'CC', '1000023699', 'kaibarrientos23@hotmail.com', '6045234158', '3126098731', 'Carrera 49A # 80-85c Edificio Solaris Plus Apto 710', '1993-09-23', '5', '5', '1', 'katerinquintero', '$2a$07$asxx54ahjppf45sd87a5auBKVYCUNSFi72LqrxdadRJYh3MxhQUR.', 'views/img/admins/1000023699/1000023699.jpg', '1', 'Usuario de prueba para control de validaciones versión 1', '2022-10-17 22:57:21'),
(66, 'Atracciones', 'Bladimir', 'Antonio', 'Ferreira', 'Rendón', 'CC', '86520331', 'bladiferrer2375@hotmail.com', '6042569210', '3107896325', 'Carrera 43B # 10-45a', '1984-12-30', '1', '5', '1', 'bladimirferreira', '$2a$07$asxx54ahjppf45sd87a5auKq1x7JP9VCOi/wDyS9sdnPY/Mca92wO', 'views/img/admins/86520331/86520331.jpg', '1', '', '2022-10-17 22:57:23'),
(68, 'Atracciones', 'Daniela', '', 'Gamba', 'Gamba', 'CC', '1326599986', 'dani234-gamba@gmail.com', '6045639632', '3116129889', 'Carrera 123A # 126-68C Interior 401', '2000-06-07', '5', '5', '1', 'danielagamba', '$2a$07$asxx54ahjppf45sd87a5au1z5sK6gk6TolaDXGvsJxwi3961QysPG', 'views/img/admins/1326599986/1326599986.jpg', '1', 'Agregamos descripción para definiciones. Ex alumna del IE de San Cristóbal y antigua cliente de fotografía.', '2022-10-17 22:57:27'),
(69, 'Restaurante', 'Hernesto', 'Alberto', 'Barichada', 'Montoya', 'CC', '75632110', 'hernestomontoya746@hotmail.com', '6045102366', '3125697410', 'Carrera 78A # 132-45 Alcazar Apto 245', '1979-02-14', '1', '5', '1', 'hernestobarichada', '$2a$07$asxx54ahjppf45sd87a5auqb1yJ48GonlIBlBtFUZo5HGibJRuUt.', 'views/img/admins/75632110/75632110.jpg', '1', '', '2022-10-17 22:57:28'),
(70, 'Menor Editor', 'Alejandro', '', 'Otalvaro', 'Valerno', 'CC', '1002369994', 'alejootalvaro-mix1@hotmail.com', '6042865410', '3193002012', 'Carrera 126A # 33B - 45', '1995-10-18', '4', '5', '1', 'alejandrootalvaro', '$2a$07$asxx54ahjppf45sd87a5au3Lf/SdTp4wP92twfJHa4PmM8Hvd2A5K', 'views/img/admins/1002369994/1002369994.jpg', '1', 'Gestor para las habitaciones', '2022-10-17 22:57:31'),
(72, 'Contabilidad', 'Gabriel', 'Fernando', 'Arteaga', 'Monteria', 'CC', '85966697', 'gabomonteriaa-6@gmail.com', '6045228912', '3174563297', 'Carrera 158A-5 # 23C - 145', '1980-11-19', '1', '5', '1', 'gabrielarteaga', '$2a$07$asxx54ahjppf45sd87a5au.lOwtqWAt4DLZXp5UO6FeU40jt9KCPi', 'views/img/admins/85966697/85966697.jpg', '1', 'Manejo de contabilidad generalizada para cada empleado.', '2022-10-17 22:57:33'),
(73, 'Super Editor', 'Laura', 'Mercedes', 'De la Rosa', '', 'CC', '1215410226', 'lauradelarosa_7@gmail.com', '6044103222', '3165201180', 'Carrera 19D # 33-56A Envigado', '1994-06-11', '1', '5', '1', 'lauradelarosa', '$2a$07$asxx54ahjppf45sd87a5auJUIrTaXHqaZwbekgdts3525f4FJNhra', 'views/img/admins/1215410226/1215410226.jpg', '1', 'Para edición de temas de habitación', '2022-10-17 22:57:35'),
(74, 'Restaurante', 'Luis', 'Guillermo', 'Foronda', 'Restrepo', 'CC', '75632999', 'luisbig-7@hotmail.com', '6045201699', '3115201699', 'Calle 20 A # 33C-125 Sabaneta', '1979-11-17', '1', '5', '1', 'luisforonda', '$2a$07$asxx54ahjppf45sd87a5auyW.uuWsYgWksAvTAV84TfGzY0yGQERC', 'views/img/admins/75632999/75632999.jpg', '1', '', '2022-10-17 22:57:37'),
(75, 'Restaurante', 'Madelyn', '', 'Meneses', 'Quintero', 'CC', '1632000120', 'melamenquit@gmail.com', '6042156320', '3102156201', 'Carrera 46A # 23C - 8', '1984-10-23', '1', '5', '1', 'melanymeneses', '$2a$07$asxx54ahjppf45sd87a5auCKjhWIeVIO/iRiegx.q1iI/xXZ3jmEO', 'views/img/admins/1632000120/1632000120.jpg', '1', 'Usuario prueba ajustes AA', '2022-10-17 22:57:40'),
(76, 'Atracciones', 'Morrel', 'Marly', 'Restrepo', 'Yepes', 'CC', '85126332', 'morri74@live.com', '6045210023', '3156322215', 'Calle 46A # 23D - 156', '1981-07-25', '1', '5', '1', 'morrelrestrepo', '$2a$07$asxx54ahjppf45sd87a5aulBB3YgrtmmwdwZk5XkXdLZPXbWmADtu', 'views/img/admins/85126332/85126332.jpg', '1', 'Ajustes generales de control para las actualizaciones para AA', '2022-10-17 22:57:44'),
(77, 'Menor Editor', 'Johnatan', 'Alexander', 'Pereañez', 'Castañeda', 'CC', '1216845110', 'nonejohnatan23@gmail.com', '6044785200', '3154206648', 'Carrera 45A # 23C - 152', '1997-11-28', '1', '5', '1', 'johnatanpereañez', '$2a$07$asxx54ahjppf45sd87a5au3.yRKKe5mKLXKTwnR84X6CvRpavFMzO', 'views/img/admins/1216845110/1216845110.jpg', '1', '', '2022-10-17 22:57:46'),
(79, 'Atracciones', 'Carlos', 'Arturo', 'Franco', 'Franc', 'CC', '76520114', 'carlosfranco12@gmail.com', '6045523366', '3102665455', 'Carrera 145A # 33C -156 Apto 345', '1977-08-12', '1', '5', '1', 'carlosfranco', '$2a$07$asxx54ahjppf45sd87a5auGSquvzEWBDZMKz6mz2JxQMbxCmv7mpy', 'views/img/admins/76520114/76520114.jpg', '1', '', '2022-10-17 22:57:48'),
(80, 'Atracciones', 'Geraldine', '', 'Gallego', 'López', 'CC', '1326333263', 'geralgal-456@gmail.com', '6045641102', '3156120785', 'Carrera 25B # 123-456S Ed Calanoa Sur Apto 9963', '1999-05-15', '1', '5', '1', 'geraldingallego', '$2a$07$asxx54ahjppf45sd87a5auoO7ux/kCWiJJ7I4baRdcebCDwqFm61S', 'views/img/admins/1326333263/1326333263.jpg', '1', 'Usuario agregado para pruebas AA', '2022-10-17 22:57:50'),
(81, 'Contabilidad', 'Juan', 'Pablo', 'Mendoza', 'Cano', 'CC', '1326444589', 'juanpacano@gmail.com', '6045789965', '3156203345', 'Carrra 123A # 15C 199Sur', '1996-08-31', '1', '5', '1', 'juanalzate', '$2a$07$asxx54ahjppf45sd87a5auJgoCIvX6mRQCBGzuq0AqNg1TCIfTQ2K', 'views/img/admins/1452000364/1452000364.jpg', '1', 'El compa Juan PA', '2022-10-17 22:57:53'),
(82, 'Contabilidad', 'Ailyn', 'Yulissa', 'Acevedo', 'Cano', 'CC', '1563225997', 'yuliacevedo43@gmail.com', '6045458920', '3156320014', 'Carrera 26A # 35-45 int 245', '2005-06-26', '5', '5', '1', 'ailynacevedo', '$2a$07$asxx54ahjppf45sd87a5aujjEHwtqI7FOWBZ5RIN84rVt.3ta3X0a', 'views/img/admins/1563225997/1563225997.jpg', '1', 'Usuario para el manejo contable que se dispondrá para los temas de nómina.', '2022-10-17 22:57:55'),
(83, 'Marketing', 'Arley', 'Sasori', 'Mañas', 'Tapia', 'CC', '1544654220', 'elquelegustapkachu@hotmail.com', '6042789645', '3129994500', 'Calle 125A # 33 - 456 Edificio Contreras Towel Apto 456', '2004-11-14', '1', '5', '1', 'arleymañas', '$2a$07$asxx54ahjppf45sd87a5au5s4PmCNbuS92M1BZZKLUPiiIFqfZaq.', 'views/img/admins/1544654220/1544654220.jpg', '1', '', '2022-10-17 22:57:57'),
(84, 'Marketing', 'Juan', 'Fernano', 'Urrego', 'Gallego', 'CC', '1652332221', 'juanfernandotata@gmail.com', '6045219648', '3214203365', 'Carrera 19A # 45C - 4 INT 256', '1982-12-25', '1', '5', '2', 'juanurrego', '$2a$07$asxx54ahjppf45sd87a5auaUC1OBeLP.g0QdK6wCvcxvphIcXyYpa', 'views/img/admins/1652332221/1652332221-175.jpg', '1', '', '2022-10-19 05:12:35'),
(85, 'Menor Editor', 'Valentina', '', 'Botero', 'Herrera', 'CC', '99654119', 'valenherrera45@hotmail.com', '6045896512', '3159974598', 'Calle 174A # 46B - 125 Edificio Callantuw Apto 256', '1992-08-22', '1', '5', '1', 'valentinabotero', '$2a$07$asxx54ahjppf45sd87a5auj2snh33L1CaZLEhGu9RetXlSDpFurwa', 'views/img/admins/99654119/99654119.jpg', '0', 'Prueba funcional de descripciones luego de re plantear admin de contenido', '2022-10-18 05:44:54'),
(87, 'Menor Editor', 'Margarita', '', 'Muñoz', 'Parra', 'CC', '85964118', 'margaritp_4@gmail.com', '6045195561', '3164589947', 'Calle 95B # 45A - 125C Edificio Colinas - Apto 45', '1985-02-14', '1', '5', '1', 'margaritamuñoz', '$2a$07$asxx54ahjppf45sd87a5auxF2OnxxlfQlB0FVHhe7H9MSntdrgrx.', 'views/img/admins/85964118/85964118.jpg', '1', 'Empleado para editores menores', '2022-10-19 05:12:49'),
(88, 'Menor Editor', 'Juan', 'Pablo', 'de la Torre', '', 'CC', '96210002', 'juandelatorre-tutos@hotmail.com', '6044261297', '3126124700', 'Carrera 26A # 15C - 5 Transv Sup 3 Edificio Monteflorido Apto 1002', '1999-06-08', '1', '5', '2', 'juandelatorre', '$2a$07$asxx54ahjppf45sd87a5auTffI2.e.yMIj0bR9XMvASkzOc6vPMmS', 'views/img/admins/96210002/96210002.jpg', '1', 'Juan de la torre tutoriales y Udemy', '2022-10-19 05:12:58'),
(91, 'Contabilidad', 'Daniela', '', 'Bedoya', 'Bastidas', 'CC', '1466999019', 'danielabedoyabasti-119@hotmail.com', '6045218931', '3156903291', 'Carrera 61C # 132-21  INT 501', '2002-06-25', '1', '5', '1', 'danielabedoya', '$2a$07$asxx54ahjppf45sd87a5aukeLTrhkhQJHP9z.3xCek2BuTCECLAUC', 'views/img/admins/1466999019/1466999019.jpg', '1', 'Contadora para el trabajo de nómina predispuesto en el desarrollo del sistema de hotel', '2022-10-20 04:48:45'),
(92, 'Marketing', 'Sebastian', '', 'Zapata', 'Cano', 'CC', '1209321110', 'sebaszapatayukl@hotmail.com', '6042389012', '3117843309', 'Calle 124A # 33C - 128', '1994-03-12', '1', '5', '1', 'sebastianzapata', '$2a$07$asxx54ahjppf45sd87a5aujUNSqfuoFcnJ11isA480JYFjrCfEiRu', 'views/img/admins/1209321110/1209321110.jpg', '1', 'Desarrollador de Software', '2022-10-20 06:26:25'),
(93, 'Marketing', 'Jhon', 'Alexander', 'Cuero', 'Mena', 'CC', '1002121901', 'menacuero_23@gmail.com', '6043219811', '3118903487', 'Carrera 132A #43-23 Envigado A ', '1993-12-06', '1', '5', '1', 'jhoncuero', '$2a$07$asxx54ahjppf45sd87a5auK2lvGpBH5KL5nIqH.KcwkazszO4o3wa', 'views/img/admins/1002121901/1002121901.jpg', '1', 'Desarrollador de software y excompañero del Poli', '2022-10-20 06:26:29'),
(94, 'Atracciones', 'Ana', 'Melissa', 'Fernandez', 'Tapia', 'CC', '1546990121', 'anamelissat-1322@gmail.com', '6043892212', '3101328911', 'Calle 10C # 211-45 Transv 23 Norte', '2003-10-30', '5', '5', '1', 'anafernandez', '$2a$07$asxx54ahjppf45sd87a5aubAJBDfd7yP6Hyi9eYZ.KFde3rypGUw2', 'views/img/admins/1546990121/1546990121.jpg', '0', '', '2022-10-20 06:26:12'),
(95, 'Menor Editor', 'Alexander', '', 'Quintero', 'Rosso', 'CC', '1217436779', 'alexrosso46@gmail.com', '6042667812', '3116781209', 'Calle 4A # 320-43 Cr 34 Envigado Norte', '1996-09-17', '2', '5', '1', 'alecanderrosso', '$2a$07$asxx54ahjppf45sd87a5auWm3tXN4yRYloctdtVE6Bv35Nnwbzrcq', 'views/img/admins/1217436779/1217436779.jpg', '1', 'El Eleno, ex compañero de la U y desarrollador de Software', '2022-10-20 06:30:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `estado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `img`, `estado`, `fecha`) VALUES
(1, 'views/img/banner/819.jpg', '1', '2022-11-07 04:30:37'),
(2, 'views/img/banner/banner02.jpg', '1', '2022-01-12 05:58:19'),
(3, 'views/img/banner/239.jpg', '1', '2022-11-07 04:29:29'),
(4, 'views/img/banner/banner04.jpg', '1', '2022-01-12 05:58:35'),
(5, 'views/img/banner/banner05.jpg', '1', '2022-01-12 06:46:33'),
(6, 'views/img/banner/banner06.jpg', '1', '2022-01-12 06:46:33'),
(8, 'views/img/banner/banner08.jpg', '1', '2022-01-12 06:46:33'),
(11, 'views/img/banner/728.jpg', '1', '2022-11-07 04:04:56'),
(12, 'views/img/banner/499.jpg', '1', '2022-11-06 05:10:51'),
(13, 'views/img/banner/255.jpg', '1', '2022-11-07 04:27:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos_empleado`
--

CREATE TABLE `cargos_empleado` (
  `id` int(11) NOT NULL,
  `cargo` text NOT NULL,
  `alias` text NOT NULL,
  `estado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos_empleado`
--

INSERT INTO `cargos_empleado` (`id`, `cargo`, `alias`, `estado`, `fecha`) VALUES
(1, 'Aprendiz del SENA', 'AS', '1', '2022-09-15 03:36:15'),
(2, 'Mesero General', 'MG', '1', '2022-09-27 20:09:08'),
(3, 'Botones y Llaves', 'ByL', '1', '2022-09-30 03:21:58'),
(4, 'Recepcionista', 'RCP', '1', '2022-09-27 22:54:27'),
(5, 'Conductor / Transporte', 'CoT', '1', '2022-09-15 03:36:20'),
(6, 'Digitador', 'DIG', '1', '2022-09-15 03:36:20'),
(7, 'Bodeguero e Inventario', 'ByI', '1', '2022-09-15 03:36:21'),
(8, 'Limpieza Habitaciones', 'LH', '1', '2022-09-15 03:36:22'),
(9, 'Limpieza General Hotel', 'LGH', '1', '2022-09-15 03:36:23'),
(10, 'Atención al Cliente', 'AC', '1', '2022-09-15 03:36:24'),
(11, 'Tendero', 'TE', '0', '2022-09-15 05:00:20'),
(12, 'Contador', 'CON', '0', '2022-09-15 05:00:38'),
(13, 'Administrativo y RH', 'AyRH', '1', '2022-09-15 05:07:24'),
(14, 'Gerente y Junta', 'GyJ', '0', '2022-09-15 05:01:09'),
(15, 'Desarrollador Software', 'DS', '1', '2022-09-15 05:07:27'),
(16, 'Mantenimiento / Reparaciones', 'MyR', '0', '2022-09-15 05:01:37'),
(17, 'Cuidador / Cultivador', 'CyC', '1', '2022-09-15 05:07:31'),
(18, 'Guía Turístico', 'GT', '1', '2022-09-15 05:07:35'),
(19, 'Organizador Eventos', 'OE', '0', '2022-09-15 05:05:01'),
(20, 'Vigilante / Seguridad', 'VyS', '0', '2022-09-15 05:05:34'),
(21, 'Servicio Spa', 'SS', '1', '2022-09-15 05:07:38'),
(22, 'Servicios Atracción', 'SA', '1', '2022-09-15 05:07:41'),
(23, 'Servicios Médicos', 'SM', '0', '2022-09-15 05:06:05'),
(24, 'Servicios Digitales / Informáticos', 'SDyI', '0', '2022-09-15 05:06:25'),
(25, 'Servicios Restaurante', 'SR', '1', '2022-09-15 05:07:46'),
(26, 'Servicios Aventura / Exploración', 'SAyE', '1', '2022-09-15 05:07:54'),
(27, 'Proveedor Hotel', 'PE', '1', '2022-09-15 05:07:56'),
(28, 'Acondicionador Cremas', 'ACr', '0', '2022-09-15 05:08:41'),
(29, 'Veterinario', 'VE', '0', '2022-09-15 05:08:50'),
(30, 'Asistente Cuidador / Atracción - General', 'ACyAg', '0', '2022-09-15 05:09:29'),
(31, 'Parking', 'PAk', '1', '2022-09-15 15:31:30'),
(32, 'Buzo y Canotaje Sincronizado', 'ByCs', '1', '2022-09-15 15:31:34'),
(33, 'Coordinador de Floricultivos', 'CF', '1', '2022-09-15 15:31:39'),
(35, 'Servicios de Aseo Exterior', 'SAE', '0', '2022-09-15 14:47:47'),
(36, 'Animador y Recreación', 'AyR', '1', '2022-09-15 15:31:18'),
(37, 'Caja', 'CaTen', '1', '2022-09-27 20:43:04'),
(38, 'Desarrollador General Sistemas TI', 'DGsSTI', '0', '2022-09-15 14:50:32'),
(39, 'Auxiliar Enfermería / Atención Desastres', 'AEyAD', '1', '2022-09-15 15:31:21'),
(40, 'Prueba desde Workbench', 'PdW', '0', '2022-09-26 05:02:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `ruta` text NOT NULL,
  `img` text NOT NULL,
  `tipo` text NOT NULL,
  `precio` float NOT NULL,
  `estado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`id`, `nombre`, `descripcion`, `ruta`, `img`, `tipo`, `precio`, `estado`, `fecha`) VALUES
(1, 'Filetes de Pescado Marinados', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry is standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'filetes-de-pescado-marinados', 'views/img/carta/1.jpg', 'M', 16900, '1', '2022-02-07 11:02:50'),
(2, 'Tacos a la Mexicana', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English.', 'tacos-a-la-mexicana', 'views/img/carta/2.jpg', 'M', 18500, '1', '2022-02-07 11:03:09'),
(3, 'Hamburguesa Retro', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'hamburguesa-retro', 'views/img/carta/3.jpg', 'M', 17900, '1', '2022-02-07 11:03:25'),
(4, 'Torre de Waffles Frutales', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words', 'torre-de-waffles-frutales', 'views/img/carta/4.jpg', 'D', 14000, '1', '2022-01-30 22:25:10'),
(5, 'Desayuno Napolitano', 'Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, Lorem ipsum dolor sit amet.., comes from a line in section 1.10.32.', 'desayuno-napolitano', 'views/img/carta/5.jpg', 'D', 15100, '1', '2022-02-07 11:03:54'),
(6, 'Cañonada Gourmet', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which do not look even slightly believable. ', 'cañonada-gourmet', 'views/img/carta/6.jpg', 'A', 19900, '1', '2022-02-07 11:04:19'),
(7, 'Pizza Calixto', 'If you are going to use a passage of Lorem Ipsum, you need to be sure there is not anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. ', 'pizza-calixto', 'views/img/carta/7.jpg', 'M', 21600, '1', '2022-02-07 11:04:33'),
(8, 'Costillas BBQ Caseras', 'It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'costillas-bbq-caseras', 'views/img/carta/8.jpg', 'M', 26700, '1', '2022-01-30 22:26:56'),
(9, 'Churrasco de la Casa', 'Ut tincidunt imperdiet vestibulum. Nulla neque nisl, aliquet vel vehicula at, tempor ut quam. Aenean interdum nulla quis risus commodo lobortis. Fusce facilisis ante arcu, at ornare ante consectetur vitae. Vivamus gravida orci diam. Nullam suscipit nulla vitae lectus ultricies ultrices. Pellentesque ornare felis id luctus tempor. Quisque semper augue mi, non consectetur risus laoreet eu.', 'churrasco-de-la-casa', 'views/img/carta/9.jpg', 'M', 24100, '1', '2022-01-30 22:27:15'),
(10, 'Huevillos Paladinos', 'Nunc ultricies mollis condimentum. In commodo mauris lacus, non lobortis risus venenatis sit amet. Sed porttitor massa leo, sed mollis lacus faucibus vitae. Suspendisse eget arcu sit amet sem euismod commodo. Nullam pharetra purus lacinia, hendrerit leo a, rhoncus diam. Quisque consectetur diam ac dolor molestie, sed sodales metus vulputate.', 'huevillos-paladinos', 'views/img/carta/10.jpg', 'D', 15000, '1', '2022-01-30 22:27:32'),
(11, 'Pinchos Rancheros', 'Vivamus mattis fermentum lorem, eu hendrerit est molestie id. Nullam urna mi, lacinia a finibus eu, ultricies ut purus. In iaculis magna nec libero hendrerit semper. Vestibulum volutpat hendrerit blandit.', 'pinchos-rancheros', 'views/img/carta/11.jpg', 'M', 23400, '1', '2022-01-30 22:28:20'),
(12, 'Mixto de Carnes', 'Sed erat ipsum, tincidunt vel varius ac, fermentum convallis dolor. Nunc mattis, nisi id volutpat ullamcorper, sapien ex hendrerit mauris, ac finibus lorem enim et est. Sed mollis dapibus magna, in euismod libero. Mauris facilisis, dui vel pulvinar egestas, libero mi dictum leo, sed tempus mauris leo ultricies lectus.', 'mixto-de-carnes', 'views/img/carta/12.jpg', 'M', 31400, '1', '2022-01-30 22:28:35'),
(13, 'Arroz con Pollo Baly', 'Phasellus vestibulum non mi maximus pharetra. Aenean cursus justo vitae felis dictum, ac placerat dolor molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent maximus fermentum rhoncus.', 'arroz-con-pollo-baly', 'views/img/carta/13.jpg', 'A', 18500, '1', '2022-01-30 22:29:09'),
(14, 'Cerdillo Ahumado Baly', 'Fusce efficitur mi eget nunc cursus rhoncus. Vivamus gravida iaculis porta. Morbi eget fringilla turpis. Nulla luctus ut sapien molestie consequat. Sed pretium libero vitae orci elementum, id consequat ante auctor. Sed placerat pharetra sapien et auctor. ', 'cerdillo-ahumado-baly', 'views/img/carta/14.jpg', 'A', 19700, '1', '2022-01-30 22:29:27'),
(15, 'Nachos Balandy Obalados', 'Aliquam gravida ipsum sed ipsum hendrerit, sit amet egestas massa vestibulum. Integer nec aliquam mi, a euismod sapien. Donec vitae velit ac nisl gravida accumsan.', 'nachos-balandy-obalados', 'views/img/carta/15.jpg', 'M', 22100, '1', '2022-01-30 22:29:43'),
(16, 'Desayuno Baliza', 'Vivamus viverra tortor vel scelerisque faucibus. Integer porttitor turpis id ante suscipit porttitor sit amet quis dolor. Mauris elementum felis a lacus convallis, in aliquam nisl varius. Etiam aliquet rhoncus lectus placerat fringilla.', 'desayuno-baliza', 'views/img/carta/16.jpg', 'D', 13500, '1', '2022-01-30 22:30:27'),
(17, 'Plaguy de Carne Baly', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce augue arcu, finibus eget augue at, mattis faucibus nunc. Vestibulum vulputate euismod neque, sit amet placerat metus. Maecenas vulputate lorem turpis, ut consequat dolor ultricies sollicitudin. Proin vel magna pharetra', 'plaguy-de-carne-baly', 'views/img/carta/17.jpg', 'M', 25600, '1', '2022-01-30 22:30:43'),
(18, 'Milanesas de Pescado Baly', 'Vestibulum rutrum dolor risus, non posuere purus auctor a. Maecenas felis ante, fermentum vehicula imperdiet in, sollicitudin sed turpis. Phasellus turpis dui, placerat vitae consequat id, pulvinar ac metus. Phasellus sed pretium turpis, eu aliquet mauris. ', 'milanesas-de-pescado-baly', 'views/img/carta/18.jpg', 'M', 14700, '1', '2022-01-30 22:31:06'),
(19, 'Pastas de Carne Bary', 'Donec condimentum, ipsum sit amet tempus mattis, nisi dolor laoreet nisl, id sodales nulla dui et enim. Praesent commodo neque a enim vehicula, nec tempus odio convallis.', 'pastas-de-carne-bary', 'views/img/carta/19.jpg', 'A', 18000, '1', '2022-01-30 22:31:23'),
(20, 'Sandwichs Calibues', 'Aenean interdum nulla quis risus commodo lobortis. Fusce facilisis ante arcu, at ornare ante consectetur vitae. Vivamus gravida orci diam.', 'sandwichs-calibues', 'views/img/carta/20.jpg', 'M', 11700, '1', '2022-02-07 11:06:36'),
(21, 'Cazuela de Frioles Baly', 'Quisque aliquam sed arcu non vehicula. Quisque ac turpis quis urna commodo malesuada quis eu mi. Phasellus efficitur a dolor ac blandit. Phasellus quis dui ac nibh vestibulum auctor.', 'cazuela-de-frioles-baly', 'views/img/carta/21.jpg', 'A', 17900, '1', '2022-01-30 22:32:29'),
(22, 'Patacones con Hogao Baly', 'Nunc ex est, scelerisque eget maximus eu, tincidunt id massa. Integer ullamcorper rhoncus arcu a vehicula. Morbi dictum placerat dui. Etiam elit ipsum, imperdiet et nulla sed, sodales lobortis tellus. Praesent eu metus ornare, elementum velit vel, sagittis augue.', 'patacones-con-hogao-baly', 'views/img/carta/22.jpg', 'M', 21800, '1', '2022-01-30 22:32:57'),
(23, 'Sopa Pililla Alphus', 'Sed mollis dapibus magna, in euismod libero. Mauris facilisis, dui vel pulvinar egestas, libero mi dictum leo, sed tempus mauris leo ultricies lectus.', 'sopa-pililla-alphus', 'views/img/carta/23.jpg', 'A', 18500, '1', '2022-01-30 22:33:17'),
(24, 'Croquetas de Cerdo Baly', ' Vivamus consequat, risus quis consectetur aliquet, magna enim pulvinar nisl, in iaculis dui neque ac magna. Aenean maximus auctor lorem eu facilisis. Morbi faucibus vel massa et tristique. Nulla placerat lacinia porta. Ut justo felis, consequat eget dui a, tincidunt tempor nibh. Suspendisse potenti.', 'croquetas-de-cerdo-baly', 'views/img/carta/24.jpg', 'M', 22200, '1', '2022-01-30 22:33:35'),
(25, 'Pavo Ahumado Baly', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain', 'pavo-ahumado-baly', 'views/img/carta/25.jpg', 'M', 26900, '1', '2022-02-07 11:07:34'),
(26, 'Mariscos a la Naranja', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.', 'mariscos-a-la-naranja', 'views/img/carta/26.jpg', 'M', 32700, '1', '2022-02-04 07:36:53'),
(27, 'Festín de Res Baly', 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae', 'festin-de-res-baly', 'views/img/carta/27.jpg', 'A', 35800, '1', '2022-02-07 11:07:58'),
(28, 'Nachería Caliqueso', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue', 'nacheria-caliqueso', 'views/img/carta/28.jpg', 'M', 22600, '1', '2022-02-04 07:36:53'),
(29, 'Lasagna Multi Baly', 'These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted', 'lasagna -multi-baly', 'views/img/carta/29.jpg', 'M', 27800, '1', '2022-02-04 07:36:53'),
(30, 'Gran Cazuela Marina', 'But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', 'gran-cazuela-marina', 'views/img/carta/30.jpg', 'A', 32500, '1', '2022-02-04 08:33:08'),
(31, 'Dobladillos de Pollo', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', 'dobladillos-de-pollo', 'views/img/carta/31.jpg', 'A', 26700, '1', '2022-02-04 08:33:08'),
(32, 'Gran Cazuela BalyPock', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? ', 'gran-cazuela-balypock', 'views/img/carta/32.jpg', 'A', 38800, '1', '2022-02-04 08:33:08'),
(33, 'Huevillo en Queso Baly', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure', 'huevillo-en-queso-baly', 'views/img/carta/33.jpg', 'D', 16100, '1', '2022-02-04 08:33:08'),
(34, 'Pisadilla de Carnes', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 'pisadilla-de-carnes', 'views/img/carta/34.jpg', 'A', 35700, '1', '2022-02-04 08:33:08'),
(35, 'Pinchitos', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pinchitos', 'views/img/carta/35.jpg', 'M', 21100, '1', '2022-02-04 08:33:08'),
(36, 'Burguer Pez', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself.', 'burguer-pez', 'views/img/carta/36.jpg', 'A', 38700, '1', '2022-02-04 08:33:08'),
(37, 'Coquito de Chocolate', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio', 'coquito-de-chocolate', 'views/img/carta/37.jpg', 'H', 11200, '1', '2022-02-04 08:33:08'),
(38, 'Souflet Baly', 'But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', 'souflet-baly', 'views/img/carta/38.jpg', 'H', 17700, '1', '2022-02-04 08:33:08'),
(39, 'Fiesta de Galleta', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', 'fiesta-de-galleta', 'views/img/carta/39.jpg', 'H', 15100, '1', '2022-02-04 08:33:08'),
(40, 'Balanilla Frutal', 'To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?', 'balanilla-frutal', 'views/img/carta/40.jpg', 'H', 19600, '1', '2022-02-04 08:33:08'),
(41, 'Albóndigas de Chocolate', 'Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance', 'albondigas-de-chocolate', 'views/img/carta/41.jpg', 'H', 12300, '1', '2022-02-07 11:10:09'),
(42, 'El Gran MagnyTop', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which do not look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there is not anything embarrassing hidden in the middle of text.', 'el-gran-magnytop', 'views/img/carta/42.jpg', 'H', 36700, '1', '2022-02-07 11:10:25'),
(43, 'Pachalila de Helado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 'pachalila-de-helado', 'views/img/carta/43.jpg', 'H', 27000, '1', '2022-02-04 08:52:19'),
(44, 'Cleppy Pastas de Carne', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which', 'cleppy-pastas-de-carne', 'views/img/carta/44.jpg', 'A', 17800, '1', '2022-02-09 09:18:11'),
(45, 'Pasta en Pollo Baly', 'Nulla dictum libero est, at venenatis nibh varius eget. Duis nunc eros, volutpat eget tempor tempus, mollis in nisi. Donec non tortor tincidunt massa lacinia hendrerit a quis mi. Etiam a ex interdum, convallis nisl vel, varius orci. Fusce lacus ex, feugiat in malesuada a, luctus non lorem.', 'pasta-en-pollo-baly', 'views/img/carta/45.jpg', 'M', 18100, '1', '2022-02-04 09:11:29'),
(46, 'Macarrones Baly', 'Proin efficitur fermentum sagittis. Phasellus euismod, mauris quis ultrices sollicitudin, nunc metus blandit lectus, quis malesuada turpis mi eu ligula. Vivamus tincidunt pharetra felis. Aliquam feugiat porta leo vitae porttitor.', 'macarrones-baly', 'views/img/carta/46.jpg', 'M', 14600, '1', '2022-02-04 09:11:29'),
(47, 'Derretido Gourmet Baly', 'Integer tincidunt felis sapien, a molestie lacus lobortis eu. Aliquam convallis ex diam, sed bibendum odio imperdiet eget. Maecenas a ex id purus faucibus luctus. Donec tincidunt augue in semper condimentum. Donec nulla metus, feugiat a justo ac, maximus ornare nulla.', 'derretido-gourmet-baly', 'views/img/carta/47.jpg', 'M', 29700, '1', '2022-02-04 09:11:29'),
(48, 'PockTank Marino', 'Quisque ac egestas lectus, nec suscipit augue. Fusce sodales finibus mauris vel accumsan. Vestibulum fermentum ultrices turpis at fermentum. Aenean magna diam, fermentum et metus et, sollicitudin congue mauris. Fusce vestibulum sodales odio vel interdum. Morbi vulputate', 'pocktank-marino', 'views/img/carta/48.jpg', 'M', 26800, '1', '2022-02-04 09:11:29'),
(49, 'Taleth de Pisos', 'Curabitur tempor rhoncus placerat. Proin ac blandit tellus, quis hendrerit purus. Phasellus cursus laoreet nunc, at sodales metus porttitor ut. Quisque molestie nibh a urna pulvinar, nec aliquam odio auctor. Cras eu diam nunc. Nulla quis tristique nisi, cursus egestas nulla.', 'taleth-de-pisos', 'views/img/carta/49.jpg', 'M', 21400, '1', '2022-02-04 09:11:29'),
(50, 'Gran Mancini Mixto', 'Maecenas a ex id purus faucibus luctus. Donec tincidunt augue in semper condimentum. Donec nulla metus, feugiat a justo ac, maximus ornare nulla. Donec vitae condimentum turpis. Etiam vulputate tortor ac lectus congue vehicula. Fusce eleifend orci sit amet urna placerat lacinia. Cras eget vestibulum purus.', 'gran-mancini-mixto', 'views/img/carta/50.jpg', 'M', 31400, '1', '2022-02-04 09:11:29'),
(51, 'Solomitos Baly', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin lorem tellus, rutrum non velit in, facilisis luctus diam. Nullam euismod dolor laoreet lorem auctor, a egestas ipsum elementum. Quisque ut felis augue. Vivamus gravida massa justo, vitae molestie justo viverra sit amet.', 'solomitos-baly', 'views/img/carta/51.jpg', 'M', 28600, '1', '2022-02-04 09:11:29'),
(52, 'Gran Fitech de Camarones', 'Phasellus a eros quis nulla malesuada tempor. Mauris hendrerit, neque et laoreet cursus, tellus nisi ultrices lectus, eu vehicula ante orci sed dolor. Proin egestas facilisis lacus, sed laoreet quam tristique ornare. Nam bibendum massa ac facilisis vestibulum. Donec hendrerit a nisl id sollicitudin.', 'gran-fitech-de-camarones', 'views/img/carta/52.jpg', 'M', 32100, '1', '2022-02-04 09:11:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `color` text NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `img_min` text NOT NULL,
  `descripcion` text NOT NULL,
  `incluye` text NOT NULL,
  `continental_alta` float NOT NULL,
  `continental_baja` float NOT NULL,
  `americano_alta` float NOT NULL,
  `americano_baja` float NOT NULL,
  `estado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `ruta`, `color`, `tipo`, `img`, `img_min`, `descripcion`, `incluye`, `continental_alta`, `continental_baja`, `americano_alta`, `americano_baja`, `estado`, `fecha`) VALUES
(1, 'habitacion-tipo-suite', '#847059', 'Suite', 'views/img/suite/portada.png', 'views/img/suite/portada-min.png', 'Habitación Suite Lujos', '[{\"item\":\"Cama 2 x 2\",\"icono\":\"fas fa-bed\"},{\"item\":\"TV de 42 Pulg\",\"icono\":\"fas fa-tv\"},{\"item\":\"Agua Caliente\",\"icono\":\"fas fa-tint\"},{\"item\":\"Jacuzzi\",\"icono\":\"fas fa-water\"},{\"item\":\"Servicio Wifi\",\"icono\":\"fas fa-wifi\"},{\"item\":\"Cocina Privada\",\"icono\":\"fas fa-utensils\"},{\"item\":\"Bar Privado\",\"icono\":\"fas fa-cocktail\"},{\"item\":\"Piscina Privada\",\"icono\":\"fas fa-swimmer\"},{\"item\":\"Paseo en Helicoptero\",\"icono\":\"fas fa-helicopter\"},{\"item\":\"Equipo de Computo\",\"icono\":\"fas fa-laptop\"}]', 150000, 80000, 300000, 250000, '0', '2022-12-07 03:20:07'),
(2, 'habitacion-tipo-especial', '#0839F0', 'Especial', 'views/img/especial/portada.png', 'views/img/especial/portada-min.png', 'Habitación especializada', '[{\"item\":\"TV de 42 Pulg\",\"icono\":\"fas fa-tv\"},{\"item\":\"Agua Caliente\",\"icono\":\"fas fa-tint\"},{\"item\":\"Baño privado\",\"icono\":\"fas fa-toilet\"},{\"item\":\"Sofá\",\"icono\":\"fas fa-couch\"},{\"item\":\"Servicio Wifi\",\"icono\":\"fas fa-wifi\"},{\"item\":\"Cocina Privada\",\"icono\":\"fas fa-utensils\"},{\"item\":\"Bar Privado\",\"icono\":\"fas fa-cocktail\"}]', 160000, 100000, 230000, 200000, '0', '2022-12-20 16:56:01'),
(3, 'habitacion-tipo-standar', '#2F7D84', 'Standar', 'views/img/standar/589.jpg', 'views/img/standar/589-min.jpg', 'Habitación sencilla', '[{\"item\":\"TV de 42 Pulg\",\"icono\":\"fas fa-tv\"},{\"item\":\"Agua Caliente\",\"icono\":\"fas fa-tint\"},{\"item\":\"Baño privado\",\"icono\":\"fas fa-toilet\"},{\"item\":\"Sofá\",\"icono\":\"fas fa-couch\"},{\"item\":\"Servicio Wifi\",\"icono\":\"fas fa-wifi\"},{\"item\":\"Cocina Privada\",\"icono\":\"fas fa-utensils\"}]', 120000, 80000, 200000, 160000, '1', '2022-08-14 04:45:56'),
(4, 'habitacion-tipo-presidencial', '#edce53', 'Presidencial', 'views/img/presidencial/portada.png', 'views/img/presidencial/portada-min.png', 'Habitación Sute Presidencial', '[{\"item\":\"TV de 42 Pulg\",\"icono\":\"fas fa-tv\"},{\"item\":\"Agua Caliente\",\"icono\":\"fas fa-tint\"},{\"item\":\"Jacuzzi\",\"icono\":\"fas fa-water\"},{\"item\":\"Servicio Wifi\",\"icono\":\"fas fa-wifi\"},{\"item\":\"Cocina Privada\",\"icono\":\"fas fa-utensils\"},{\"item\":\"Bar Privado\",\"icono\":\"fas fa-cocktail\"},{\"item\":\"Piscina Privada\",\"icono\":\"fas fa-swimmer\"},{\"item\":\"Bañera\",\"icono\":\"fas fa-bath\"},{\"item\":\"Baño Turco\",\"icono\":\"fas fa-person-booth\"},{\"item\":\"Paseo en Barco\",\"icono\":\"fas fa-ship\"},{\"item\":\"Zona Ambiente\",\"icono\":\"fas fa-glass-cheers\"}]', 270000, 180000, 400000, 300000, '1', '2022-08-14 04:46:12'),
(5, 'habitacion-tipo-penthouse', '#fa75df', 'PentHouse', 'views/img/penthouse/portada.png', 'views/img/penthouse/portada-min.png', 'Habitación PentHouse', '[{\"item\":\"TV de 42 Pulg\",\"icono\":\"fas fa-tv\"},{\"item\":\"Agua Caliente\",\"icono\":\"fas fa-tint\"},{\"item\":\"Jacuzzi\",\"icono\":\"fas fa-water\"},{\"item\":\"Servicio Wifi\",\"icono\":\"fas fa-wifi\"},{\"item\":\"Cocina Privada\",\"icono\":\"fas fa-utensils\"},{\"item\":\"Bar Privado\",\"icono\":\"fas fa-cocktail\"},{\"item\":\"Piscina Privada\",\"icono\":\"fas fa-swimmer\"},{\"item\":\"Bañera\",\"icono\":\"fas fa-bath\"},{\"item\":\"Paseo en Barco\",\"icono\":\"fas fa-ship\"}]', 300000, 210000, 400000, 350000, '1', '2022-08-14 04:46:24'),
(6, 'habitacion-tipo-fullnoruega', '#04d416', 'Noruega', 'views/img/fullnoruega/portada.png', 'views/img/fullnoruega/portada-min.png', 'Habitación clásica de Noruega', '[{\"item\":\"TV de 42 Pulg\",\"icono\":\"fas fa-tv\"},{\"item\":\"Agua Caliente\",\"icono\":\"fas fa-tint\"},{\"item\":\"Baño privado\",\"icono\":\"fas fa-toilet\"},{\"item\":\"Sofá\",\"icono\":\"fas fa-couch\"},{\"item\":\"Servicio Wifi\",\"icono\":\"fas fa-wifi\"},{\"item\":\"Cocina Privada\",\"icono\":\"fas fa-utensils\"},{\"item\":\"Bar Privado\",\"icono\":\"fas fa-cocktail\"}]', 400000, 300000, 460000, 400000, '1', '2022-08-14 04:46:35'),
(8, 'habitacion-tipo-romance', '#f06e6e', 'Romance', 'views/img/romance/portada.jpg', 'vistas/img/romance/portada-min.jpg', 'Habitación Romántica', '[{\"item\":\"Cama 2 x 2\",\"icono\":\"fas fa-bed\"},{\"item\":\"TV de 42 Pulg\",\"icono\":\"fas fa-tv\"},{\"item\":\"Agua Caliente\",\"icono\":\"fas fa-tint\"},{\"item\":\"Jacuzzi\",\"icono\":\"fas fa-water\"},{\"item\":\"Baño privado\",\"icono\":\"fas fa-toilet\"},{\"item\":\"Sofá\",\"icono\":\"fas fa-couch\"},{\"item\":\"Servicio Wifi\",\"icono\":\"fas fa-wifi\"},{\"item\":\"Cocina Privada\",\"icono\":\"fas fa-utensils\"},{\"item\":\"Entretenimiento Digital\",\"icono\":\"fas fa-gamepad\"},{\"item\":\"Zona Ambiente\",\"icono\":\"fas fa-glass-cheers\"},{\"item\":\"Equipo de Computo\",\"icono\":\"fas fa-laptop\"},{\"item\":\"Tour Especial\",\"icono\":\"fas fa-tree\"},{\"item\":\"Chimenea\",\"icono\":\"fab fa-free-code-camp\"},{\"item\":\"Bañera\",\"icono\":\"fas fa-bath\"}]', 420000, 365000, 510000, 460000, '1', '2022-08-14 04:46:47'),
(11, 'habitacion-tipo-vintage', '#7E45E9', 'Vintage', 'views/img/vintage/portada.jpg', '', 'Estilo Vintage y Cremas', '', 85900, 120000, 178000, 132000, '1', '2022-12-07 03:11:26'),
(12, 'habitacion-tipo-tropical', '#CACD9B', 'Tropical', 'views/img/tropical/portada.jpg', '', 'Habitación de Style Playera', '', 375000, 220000, 650000, 365000, '1', '2022-12-11 06:08:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comodidades`
--

CREATE TABLE `comodidades` (
  `id` int(11) NOT NULL,
  `comodidad` text NOT NULL,
  `icono` text NOT NULL,
  `imagen` text NOT NULL,
  `estado` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comodidades`
--

INSERT INTO `comodidades` (`id`, `comodidad`, `icono`, `imagen`, `estado`, `fecha`) VALUES
(1, 'Gimnasio Privado', 'fa-solid fa-dumbbell', '', '1', '2022-11-24 21:46:20'),
(2, 'Cama 2x2', 'fa-solid fa-bed', '', '1', '2022-11-24 21:46:20'),
(3, 'Televisor 42 Pulg', 'fa-solid fa-tv', '', '1', '2022-11-24 21:46:20'),
(4, 'Agua Caliente', 'fa-solid fa-droplet', '', '1', '2022-11-24 21:46:20'),
(5, 'Jacuzzy', 'fa-solid fa-hot-tub-person', '', '1', '2022-11-24 21:46:20'),
(6, 'Balcón Mirador', 'fa-solid fa-image', '', '1', '2022-11-24 21:46:20'),
(7, 'Baño Privado', 'fa-solid fa-toilet', '', '1', '2022-11-24 21:46:20'),
(8, 'Sofá', 'fa-solid fa-couch', '', '1', '2022-11-24 21:46:20'),
(9, 'Conexión WiFi', 'fa-solid fa-wifi', '', '1', '2022-11-24 21:46:20'),
(10, 'Bar Privado', 'fa-solid fa-champagne-glasses', '', '1', '2022-11-24 21:46:20'),
(11, 'Piscina Privada', 'fa-solid fa-water-ladder', '', '1', '2022-11-24 21:46:20'),
(12, 'Baño Turco', 'fa-solid fa-person-booth', '', '1', '2022-11-24 21:46:20'),
(13, 'Zona Disco', 'fa-solid fa-music', '', '1', '2022-11-24 21:46:20'),
(14, 'Zona Asados', 'fa-solid fa-fire-burner', '', '1', '2022-11-24 21:46:20'),
(15, 'Zona Vídeo Juegos', 'fa-solid fa-gamepad', '', '1', '2022-11-24 21:46:20'),
(16, 'Cocina Privada', 'fa-solid fa-kitchen-set', '', '1', '2022-11-24 21:46:20'),
(17, 'Bañera', 'fa-solid fa-bath', '', '1', '2022-11-24 21:46:20'),
(18, 'Zona Cinema', 'fa-solid fa-film', '', '1', '2022-11-24 21:46:20'),
(19, 'Calefacción', 'fa-solid fa-temperature-arrow-down', '', '1', '2022-11-24 21:46:20'),
(20, 'Playa Privada', 'fa-solid fa-umbrella-beach', '', '1', '2022-11-24 21:46:20'),
(21, 'Club Casino', 'fa-solid fa-dice', '', '1', '2022-11-27 03:53:06'),
(22, 'Jardín', 'fa-solid fa-fan', '', '1', '2022-11-27 03:53:06'),
(23, 'Spa Privado', 'fa-solid fa-spa', '', '1', '2022-12-04 04:35:09'),
(24, 'Sala Comedor', 'fa-solid fa-chair', '', '1', '2022-12-04 04:35:09'),
(25, 'Juguetes Adulto', 'fa-solid fa-heart', '', '1', '2022-12-04 04:35:09'),
(26, 'Garaje Privado', 'fa-solid fa-warehouse', '', '1', '2022-12-04 04:35:09'),
(27, 'Disco Luces', 'fa-solid fa-globe', '', '1', '2022-12-04 04:35:09'),
(28, 'Zona Camping', 'fa-solid fa-campground', '', '1', '2022-12-04 04:35:09'),
(29, 'Campestre Aledaño', 'fa-solid fa-tree', '', '1', '2022-12-04 04:35:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id` int(11) NOT NULL COMMENT 'Id del concepto de nómina',
  `capitulo` text NOT NULL COMMENT '1 - Salario *** 2 - Deducciones *** 3 - Prestaciones *** 4 - Otros *** 5 - Compensación Flexible *** 6 - Apoyo Económico *** 7 - Provisiones',
  `concepto` text NOT NULL COMMENT 'Nombre del concepto',
  `porcentaje` float NOT NULL COMMENT 'Porcentaje (número entero que luego se convierte) de aplicación',
  `descripcion` text NOT NULL COMMENT 'descripción detallada del concepto',
  `estado` text NOT NULL COMMENT 'Estado del concepto',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de Registro/Actualización del concepto en el sistema'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id`, `capitulo`, `concepto`, `porcentaje`, `descripcion`, `estado`, `fecha`) VALUES
(1, '2', 'ABONO PRESTAMO EMPRESARIAL', 0, 'ABONO PRESTAMO EMPRESARIAL', '1', '2022-09-26 01:56:53'),
(2, '2', 'PRÉSTAMO EMPRESARIAL EMPLEADOS', 0, 'PRÉSTAMO EMPRESARIAL EMPLEADOS', '1', '2022-09-26 01:56:53'),
(3, '3', 'VACACIONES COMPENSADAS', 100, 'VACACIONES COMPENSADAS', '1', '2022-09-26 01:56:53'),
(4, '3', 'VACACIONES ANTICIPADAS', 100, 'VACACIONES ANTICIPADAS', '1', '2022-09-26 01:56:53'),
(5, '3', 'VACACIONES LIQUIDADAS', 100, 'VACACIONES LIQUIDADAS', '1', '2022-09-26 01:56:53'),
(6, '3', 'INTERESES A LAS CESANTIAS', 100, 'INTERESES A LAS CESANTIAS', '1', '2022-09-26 01:56:53'),
(7, '3', 'CESANTIAS DEL PERIODO', 100, 'CESANTIAS DEL PERIODO', '1', '2022-09-26 01:56:53'),
(8, '4', 'PAGOS NO CONSTITUTIVO DE SALARIOS', 100, 'PAGOS NO CONSTITUTIVO DE SALARIOS', '1', '2022-09-26 01:56:53'),
(9, '1', 'COMISIONES NO REEMBOLSABLES', 100, 'COMISIONES NO REEMBOLSABLES', '1', '2022-09-26 01:56:53'),
(10, '3', 'VACACIONES DISFRUTADAS', 100, 'VACACIONES DISFRUTADAS', '1', '2022-09-26 01:56:53'),
(11, '1', 'LICENCIA REMUNERADA', 100, 'LICENCIA REMUNERADA', '1', '2022-09-26 02:04:04'),
(12, '3', 'PRIMA', 100, 'PRIMA', '1', '2022-09-26 02:04:04'),
(13, '1', 'INCAPACIDAD GENERAL', 1, 'INCAPACIDAD GENERAL', '1', '2022-09-26 02:04:04'),
(14, '1', 'AUXILIO DE TRANSPORTE', 0, 'AUXILIO DE TRANSPORTE', '1', '2022-09-26 02:04:04'),
(15, '2', 'ABONO A CAJA DE COMPENSACION', 0, 'ABONO A CAJA DE COMPENSACION', '1', '2022-09-26 02:04:04'),
(16, '2', 'RETENCION EN LA FUENTE NOMINA', 0, 'RETENCION EN LA FUENTE NOMINA', '1', '2022-09-26 02:04:04'),
(17, '2', 'APORTE FONDE DE SOLIDARIDAD', 0, 'APORTE FONDE DE SOLIDARIDAD', '1', '2022-09-26 02:04:04'),
(18, '2', 'APORTE PENSION', 4, 'APORTE PENSION', '1', '2022-09-26 02:04:04'),
(19, '2', 'APORTE SALUD', 4, 'APORTE SALUD', '1', '2022-09-26 02:04:04'),
(20, '7', 'PROVISION APORTES ARL', 0.5, 'PROVISION APORTES ARL', '1', '2022-09-26 02:04:04'),
(21, '7', 'PROVISION APORTES CAJA DE COMPENSACION', 4, 'PROVISION APORTES CAJA DE COMPENSACION', '1', '2022-09-26 02:04:04'),
(22, '7', 'PROVISION APORTES FONDOS DE PENSION', 12, 'PROVISION APORTES FONDOS DE PENSION', '1', '2022-09-26 02:04:04'),
(23, '7', 'PROVISION BONIFICACIONES E INDEMNIZACIONES', 8.33, 'PROVISION BONIFICACIONES E INDEMNIZACIONES', '1', '2022-09-26 02:04:04'),
(24, '7', 'PROVISION CESANTIAS', 8.33, 'PROVISION CESANTIAS', '1', '2022-09-26 02:04:04'),
(25, '7', 'PROVISION DOTACION Y SUMINISTROS A TRABAJADORES', 1, 'PROVISION DOTACION Y SUMINISTROS A TRABAJADORES', '1', '2022-09-26 02:04:04'),
(26, '7', 'PROVISION INTERESES A LAS CESANTIAS', 1, 'PROVISION INTERESES A LAS CESANTIAS', '1', '2022-09-26 02:04:04'),
(27, '7', 'PROVISION PRIMA', 8.33, 'PROVISION PRIMA', '1', '2022-09-26 02:04:04'),
(28, '7', 'PROVISION VACACIONES', 4.17, 'PROVISION VACACIONES', '1', '2022-09-26 02:04:04'),
(29, '1', 'TIEMPO ORDINARIO', 100, 'TIEMPO ORDINARIO', '1', '2022-09-26 02:04:04'),
(30, '3', 'CONCEPTO ACTUALIZADO V2', 50, 'DESCRIPCIÓN ACTUALIZADA PARA CONCEPTO V2', '1', '2022-11-01 04:58:10'),
(31, '5', 'otro concepto de prueba', 0, 'descripcion del otro concepto de prueba', '0', '2022-10-31 21:31:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` int(11) NOT NULL COMMENT 'Id del contrato',
  `id_admin` int(11) NOT NULL COMMENT 'Administrador/empleado a quien pertenece el contrato',
  `codigo_contrato` text NOT NULL COMMENT 'Código autogenerado del contrato',
  `salario_basico` float NOT NULL COMMENT 'Salario básico que corresponde a lo pactado con el empleado',
  `cuenta_ahorros` text NOT NULL COMMENT 'Cuenta de ahorros a la que se consignará la nómina mas adelante - Por ahora tomaremos la estructura solo de Bancolombia',
  `porcentaje_riesgo` float NOT NULL COMMENT 'Porcentaje de riesgo que plantea la empresa respecto al cargo que desempeñará la persona',
  `periodo_pago` text NOT NULL COMMENT 'Periodo de pago: 1 - Mensual *** 2 - Quincenal *** ',
  `tipo_contrato` int(11) NOT NULL COMMENT 'Tipo de contrato que se pacta con el empleado: *** 1 -Termino Fijo *** 2 - Termino Indefinido *** 3 - Obra o Labor *** 4 - Aprendizaje *** Productivo *** 5 - Ocasional Trabajo *** 6 - Aprendizaje Lectivo ***',
  `fecha_inicio` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha en que entra en vigencia el contrato',
  `fecha_fin` date NOT NULL DEFAULT current_timestamp() COMMENT 'fecha finalización del contrato',
  `id_cargo` int(11) NOT NULL,
  `estado` text NOT NULL COMMENT 'Estado del contrato: 1 - Activo *** 2 - Inactivo ***',
  `anotaciones_contrato` text NOT NULL COMMENT 'Anotaciones adicionales quie se pueden colocar para el contrato',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de registro del elemento - Fecha de registro del contrato'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id`, `id_admin`, `codigo_contrato`, `salario_basico`, `cuenta_ahorros`, `porcentaje_riesgo`, `periodo_pago`, `tipo_contrato`, `fecha_inicio`, `fecha_fin`, `id_cargo`, `estado`, `anotaciones_contrato`, `fecha`) VALUES
(13, 29, 'CON-85210336_3920223891', 2750000, '41123620156', 0.355, '1', 2, '2022-10-04', '2022-10-04', 13, '1', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2022-10-04 04:16:08'),
(14, 70, 'CON-1002369994_3920228625', 3250000, '52236510975', 0.355, '1', 1, '2022-10-04', '2022-10-04', 13, '1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2022-10-04 04:18:13'),
(15, 2, 'CON-1452000365_3920229902', 4250000, '68894699501', 0.355, '1', 2, '2022-10-04', '2022-10-04', 39, '1', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '2022-10-04 04:19:24'),
(16, 68, 'CON-1326599986_3920221045', 2700000, '54412369520', 0.355, '1', 2, '2022-10-04', '2022-10-04', 18, '1', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', '2022-10-04 04:20:41'),
(17, 61, 'CON-1002632101_3920220556', 5250000, '35610256895', 0.275, '1', 2, '2022-10-04', '2022-10-04', 15, '1', 'Yuli. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '2022-10-27 21:06:21'),
(18, 50, 'CON-1203301021_3920220740', 2700000, '52201236897', 0.355, '1', 2, '2022-10-04', '2022-10-04', 22, '1', 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '2022-10-04 04:53:38'),
(19, 72, 'CON-85966697_3920221345', 3950000, '45202998633', 0.355, '1', 2, '2022-10-04', '2022-10-04', 33, '1', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', '2022-10-04 04:57:23'),
(20, 35, 'CON-96521369_3920223530', 4750000, '39958974698', 0.655, '1', 2, '2022-10-04', '2022-10-04', 13, '1', 'It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', '2022-10-04 04:58:46'),
(21, 48, 'CON-95632012_3920223420', 2950000, '36695202268', 0.655, '1', 3, '2022-10-04', '2023-10-04', 17, '1', 'Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC.', '2022-10-04 05:28:57'),
(22, 58, 'CON-1154563102_4920223006', 3100000, '35266231025', 0.355, '1', 2, '2022-10-04', '2022-10-04', 17, '1', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', '2022-10-04 19:56:05'),
(23, 30, 'CON-98674066_4920227483', 3400000, '41036202841', 0.455, '1', 2, '2022-10-04', '2022-10-04', 33, '1', 'It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', '2022-10-04 20:01:08'),
(24, 6, 'CON-65230001_4920226930', 4256000, '61123020012', 0.655, '1', 2, '2022-10-04', '2022-10-04', 13, '1', 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2022-10-04 20:03:10'),
(25, 1, 'CON-12167179499_4920227473', 9250000, '61100000574', 0.355, '1', 2, '2022-10-04', '2022-10-04', 13, '1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.', '2022-10-04 20:05:52'),
(26, 32, 'CON-89562332_4920223537', 3850000, '52000312221', 0.655, '1', 2, '2022-10-04', '2022-10-04', 39, '1', ' If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '2022-10-04 20:06:45'),
(27, 64, 'CON-1215410231_4920221878', 2850000, '45202315989', 0.655, '1', 3, '2022-10-04', '2024-08-14', 13, '1', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', '2022-10-04 20:07:53'),
(28, 59, 'CON-1420102362_4920224939', 2900000, '26302036458', 0.355, '1', 2, '2022-10-04', '2022-10-04', 13, '1', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', '2022-10-04 20:09:13'),
(29, 66, 'CON-86520331_4920228476', 4100000, '32059785411', 0.655, '1', 2, '2022-10-04', '2022-10-04', 9, '1', 'Nulla libero magna, mollis ac maximus sed, dictum quis urna. Donec vel turpis dapibus, pretium dui ut, luctus orci. Sed vel elit suscipit, laoreet orci quis, consectetur ligula. Vestibulum sit amet luctus elit, non congue tellus.', '2022-10-04 20:10:28'),
(30, 69, 'CON-75632110_4920222873', 2650000, '64102315488', 0.655, '1', 2, '2022-10-04', '2022-10-04', 2, '1', 'Etiam imperdiet erat sed lacinia finibus. Proin ac libero iaculis, convallis augue id, pharetra velit. Sed ultricies justo at dolor maximus, non hendrerit ipsum egestas.', '2022-10-04 20:11:43'),
(31, 51, 'CON-1216415231_4920220532', 3256000, '75412000064', 0.355, '1', 2, '2022-10-04', '2022-10-04', 21, '1', 'Vestibulum dignissim lobortis orci, quis imperdiet sem pharetra sit amet. Donec placerat sodales vehicula. Nunc eget vulputate arcu, ac auctor est.', '2022-10-04 20:12:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_comodidades`
--

CREATE TABLE `detalle_comodidades` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_comodidad` int(11) NOT NULL,
  `estado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_comodidades`
--

INSERT INTO `detalle_comodidades` (`id`, `id_categoria`, `id_comodidad`, `estado`, `fecha`) VALUES
(1, 8, 13, '1', '2022-12-01 00:00:02'),
(2, 8, 3, '1', '2022-12-01 00:00:02'),
(3, 8, 8, '1', '2022-12-01 00:00:02'),
(4, 8, 22, '1', '2022-12-01 00:00:02'),
(5, 8, 5, '1', '2022-12-01 00:00:02'),
(7, 8, 16, '1', '2022-12-01 00:00:02'),
(8, 8, 2, '1', '2022-12-01 00:00:02'),
(9, 8, 19, '1', '2022-12-01 00:00:02'),
(10, 8, 10, '1', '2022-12-01 00:00:02'),
(11, 8, 7, '1', '2022-12-01 00:00:02'),
(12, 8, 17, '1', '2022-12-01 00:00:02'),
(13, 8, 6, '1', '2022-12-01 00:00:02'),
(14, 8, 4, '1', '2022-12-01 00:00:02'),
(57, 6, 4, '1', '2022-12-04 03:32:21'),
(58, 6, 6, '1', '2022-12-04 03:32:21'),
(59, 6, 17, '1', '2022-12-04 03:32:21'),
(60, 6, 7, '1', '2022-12-04 03:32:21'),
(61, 6, 10, '1', '2022-12-04 03:32:21'),
(62, 6, 2, '1', '2022-12-04 03:32:21'),
(63, 6, 16, '1', '2022-12-04 03:32:21'),
(64, 6, 9, '1', '2022-12-04 03:32:21'),
(65, 6, 1, '1', '2022-12-04 03:32:21'),
(66, 6, 11, '1', '2022-12-04 03:32:21'),
(67, 6, 20, '1', '2022-12-04 03:32:21'),
(68, 6, 8, '1', '2022-12-04 03:32:21'),
(69, 6, 3, '1', '2022-12-04 03:32:21'),
(70, 6, 14, '1', '2022-12-04 03:32:21'),
(71, 6, 13, '1', '2022-12-04 03:32:21'),
(72, 5, 4, '1', '2022-12-04 03:47:07'),
(73, 5, 6, '1', '2022-12-04 03:47:07'),
(74, 5, 17, '1', '2022-12-04 03:47:07'),
(75, 5, 7, '1', '2022-12-04 03:47:07'),
(76, 5, 10, '1', '2022-12-04 03:47:07'),
(77, 5, 2, '1', '2022-12-04 03:47:07'),
(78, 5, 16, '1', '2022-12-04 03:47:07'),
(79, 5, 9, '1', '2022-12-04 03:47:07'),
(80, 5, 27, '1', '2022-12-04 03:47:07'),
(81, 5, 26, '1', '2022-12-04 03:47:07'),
(82, 5, 5, '1', '2022-12-04 03:47:07'),
(83, 5, 22, '1', '2022-12-04 03:47:07'),
(84, 5, 24, '1', '2022-12-04 03:47:07'),
(85, 5, 8, '1', '2022-12-04 03:47:07'),
(86, 5, 23, '1', '2022-12-04 03:47:07'),
(87, 5, 3, '1', '2022-12-04 03:47:07'),
(88, 5, 13, '1', '2022-12-04 03:47:07'),
(89, 4, 4, '1', '2022-12-04 03:48:31'),
(90, 4, 7, '1', '2022-12-04 03:48:31'),
(91, 4, 12, '1', '2022-12-04 03:48:31'),
(92, 4, 19, '1', '2022-12-04 03:48:31'),
(93, 4, 2, '1', '2022-12-04 03:48:31'),
(94, 4, 21, '1', '2022-12-04 03:48:31'),
(95, 4, 16, '1', '2022-12-04 03:48:31'),
(96, 4, 9, '1', '2022-12-04 03:48:31'),
(97, 4, 27, '1', '2022-12-04 03:48:31'),
(98, 4, 26, '1', '2022-12-04 03:48:31'),
(99, 4, 5, '1', '2022-12-04 03:48:31'),
(100, 4, 22, '1', '2022-12-04 03:48:31'),
(101, 4, 11, '1', '2022-12-04 03:48:31'),
(102, 4, 24, '1', '2022-12-04 03:48:31'),
(103, 4, 8, '1', '2022-12-04 03:48:31'),
(104, 4, 23, '1', '2022-12-04 03:48:31'),
(105, 4, 28, '1', '2022-12-04 03:48:31'),
(106, 3, 4, '1', '2022-12-04 04:07:24'),
(107, 3, 7, '1', '2022-12-04 04:07:24'),
(108, 3, 2, '1', '2022-12-04 04:07:24'),
(109, 3, 16, '1', '2022-12-04 04:07:24'),
(110, 3, 9, '1', '2022-12-04 04:07:24'),
(111, 3, 24, '1', '2022-12-04 04:07:24'),
(112, 3, 8, '1', '2022-12-04 04:07:24'),
(113, 3, 3, '1', '2022-12-04 04:07:24'),
(114, 1, 4, '1', '2022-12-04 23:27:56'),
(115, 1, 6, '1', '2022-12-04 23:27:56'),
(116, 1, 17, '1', '2022-12-04 23:27:56'),
(117, 1, 7, '1', '2022-12-04 23:27:56'),
(118, 1, 12, '1', '2022-12-04 23:27:56'),
(119, 1, 10, '1', '2022-12-04 23:27:56'),
(120, 1, 19, '1', '2022-12-04 23:27:56'),
(121, 1, 2, '1', '2022-12-04 23:27:56'),
(122, 1, 29, '1', '2022-12-04 23:27:56'),
(123, 1, 9, '1', '2022-12-04 23:27:56'),
(124, 1, 5, '1', '2022-12-04 23:27:56'),
(125, 1, 24, '1', '2022-12-04 23:27:56'),
(126, 1, 8, '1', '2022-12-04 23:27:56'),
(127, 1, 3, '1', '2022-12-04 23:27:56'),
(128, 12, 4, '1', '2022-12-07 03:23:50'),
(129, 12, 7, '1', '2022-12-07 03:23:51'),
(130, 12, 10, '1', '2022-12-07 03:23:51'),
(131, 12, 2, '1', '2022-12-07 03:23:51'),
(132, 12, 16, '1', '2022-12-07 03:23:51'),
(133, 12, 9, '1', '2022-12-07 03:23:51'),
(134, 12, 26, '1', '2022-12-07 03:23:51'),
(135, 12, 5, '1', '2022-12-07 03:23:51'),
(136, 12, 11, '1', '2022-12-07 03:23:51'),
(137, 12, 20, '1', '2022-12-07 03:23:51'),
(138, 12, 24, '1', '2022-12-07 03:23:52'),
(139, 12, 8, '1', '2022-12-07 03:23:52'),
(140, 12, 23, '1', '2022-12-07 03:23:52'),
(141, 12, 3, '1', '2022-12-07 03:23:52'),
(142, 12, 28, '1', '2022-12-07 03:23:52'),
(143, 11, 6, '1', '2022-12-07 03:46:52'),
(144, 11, 17, '1', '2022-12-07 03:46:52'),
(145, 11, 2, '1', '2022-12-07 03:46:52'),
(146, 11, 16, '1', '2022-12-07 03:46:52'),
(147, 11, 9, '1', '2022-12-07 03:46:52'),
(148, 11, 1, '1', '2022-12-07 03:46:52'),
(149, 11, 20, '1', '2022-12-07 03:46:52'),
(150, 11, 24, '1', '2022-12-07 03:46:52'),
(151, 11, 8, '1', '2022-12-07 03:46:52'),
(152, 11, 23, '1', '2022-12-07 03:46:52'),
(153, 11, 3, '1', '2022-12-07 03:46:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_conceptos`
--

CREATE TABLE `detalle_conceptos` (
  `id` int(11) NOT NULL COMMENT 'Id del detalle',
  `id_concepto` int(11) NOT NULL COMMENT 'El concepto que vamos a asociar',
  `id_ficha` int(11) NOT NULL COMMENT 'Id de la ficha a la que asignaremos los conceptos',
  `estado` text NOT NULL COMMENT 'Estado, campo fundamental para saber si el concepto lo aplicaremos o no a la hora de generar la nómina ... *** 1 - Activo para Ficha *** 2 - Inactivo para Ficha',
  `notas_concepto` text NOT NULL COMMENT 'Notas adicionales que se deban considerar para el concepto',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_conceptos`
--

INSERT INTO `detalle_conceptos` (`id`, `id_concepto`, `id_ficha`, `estado`, `notas_concepto`, `fecha`) VALUES
(1, 18, 6, '1', 'Nunc nec nisl ac urna lobortis faucibus.', '2022-10-11 22:31:24'),
(2, 19, 6, '1', '', '2022-10-11 22:31:29'),
(3, 29, 6, '1', 'Mauris ut nulla lectus. Nam malesuada dui a lectus lobortis malesuada. Sed ex eros, auctor id magna id, egestas convallis purus.', '2022-10-11 22:31:33'),
(4, 14, 6, '1', '', '2022-10-11 22:31:39'),
(5, 1, 16, '1', 'Este no debería aparecer', '2022-10-07 17:47:24'),
(6, 12, 6, '1', 'Agregando un concepto de prima para pruebas', '2022-10-11 22:31:44'),
(7, 11, 6, '1', 'Descripción para una licencia remunerada por temas de familiares', '2022-10-11 22:31:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `id` int(11) NOT NULL COMMENT 'Id de la ficha',
  `id_contrato` int(11) NOT NULL COMMENT 'Contrato de la ficha',
  `codigo_ficha` text NOT NULL COMMENT 'Código autogenerado de la ficha para una identificación completa para informes',
  `estado` text NOT NULL COMMENT '*** 1 - Ficha Abierta. *** 2 - Ficha Cerrada',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id`, `id_contrato`, `codigo_ficha`, `estado`, `fecha`) VALUES
(2, 13, 'FIC_297-85210336', '0', '2022-10-11 23:28:09'),
(3, 14, 'FIC_667-1002369994', '0', '2022-10-11 23:28:09'),
(4, 15, 'FIC_500-1452000365', '0', '2022-10-11 23:28:09'),
(5, 16, 'FIC_106-1326599986', '0', '2022-10-11 23:28:09'),
(6, 17, 'FIC_276-1002632101', '1', '2022-10-11 23:53:56'),
(7, 18, 'FIC_659-1203301021', '0', '2022-10-11 23:28:09'),
(8, 19, 'FIC_533-85966697', '0', '2022-10-11 23:28:09'),
(9, 20, 'FIC_222-96521369', '0', '2022-10-11 23:28:09'),
(10, 21, 'FIC_344-95632012', '0', '2022-10-11 23:28:09'),
(11, 22, 'FIC_160-1154563102', '0', '2022-10-11 23:28:09'),
(12, 23, 'FIC_856-98674066', '0', '2022-10-11 23:28:09'),
(13, 24, 'FIC_281-65230001', '0', '2022-10-11 23:28:09'),
(14, 25, 'FIC_692-12167179499', '0', '2022-10-11 23:28:09'),
(15, 26, 'FIC_454-89562332', '0', '2022-10-11 23:28:09'),
(16, 27, 'FIC_664-1215410231', '0', '2022-10-11 23:28:09'),
(17, 28, 'FIC_571-1420102362', '0', '2022-10-11 23:28:09'),
(18, 29, 'FIC_792-86520331', '0', '2022-10-11 23:28:09'),
(19, 30, 'FIC_491-75632110', '0', '2022-10-11 23:28:09'),
(20, 31, 'FIC_531-1216415231', '0', '2022-10-11 23:28:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id_h` int(11) NOT NULL,
  `tipo_h` int(11) NOT NULL,
  `estilo` text NOT NULL,
  `galeria` text NOT NULL,
  `video` text NOT NULL,
  `recorrido_virtual` text NOT NULL,
  `descripcion_h` text NOT NULL,
  `estado` text NOT NULL,
  `fecha_h` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id_h`, `tipo_h`, `estilo`, `galeria`, `video`, `recorrido_virtual`, `descripcion_h`, `estado`, `fecha_h`) VALUES
(1, 1, 'Oriental', '[\"views/img/suite/oriental01.jpg\", \"views/img/suite/oriental02.jpg\", \"views/img/suite/oriental03.jpg\",\"views/img/suite/oriental04.jpg\"]', 'JTu790_yyRc', 'views/img/suite/oriental-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN SUITE DE ESTILO ORIENTAL.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:08:48'),
(2, 1, 'Moderna', '[\"views/img/suite/moderna01.jpg\", \"views/img/suite/moderna02.jpg\", \"views/img/suite/moderna03.jpg\",\"views/img/suite/moderna04.jpg\"]', 'JTu790_yyRc', 'views/img/suite/moderna-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN SUITE DE ESTILO MODERNA.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:08:52'),
(3, 1, 'Africana', '[\"views/img/suite/africana01.jpg\", \"views/img/suite/africana02.jpg\", \"views/img/suite/africana03.jpg\",\"views/img/suite/africana04.jpg\"]', 'JTu790_yyRc', 'views/img/suite/africana-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN SUITE DE ESTILO AFRICANA.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:08:56'),
(4, 1, 'Clásica', '[\"views/img/suite/clasica01.jpg\", \"views/img/suite/clasica02.jpg\", \"views/img/suite/clasica03.jpg\",\"views/img/suite/clasica04.jpg\"]', 'JTu790_yyRc', 'views/img/suite/clasica-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN SUITE DE ESTILO CLÁSICA.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:08:59'),
(5, 1, 'Retro', '[\"views/img/suite/retro442.jpg\",\"views/img/suite/retro432.jpg\",\"views/img/suite/retro317.jpg\",\"views/img/suite/retro02.jpg\"]', 'JTu790_yyRc', 'views/img/suite/retro-360.jpg', '<p><strong>HABITACIÓN SUITE RETRO ESPECIALIZADA.</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.</p><h3>PLAN CONTINENTAL</h3><ul><li>(Precio x pareja 1 día 1 noche, incluye: desayuno) Temporada Baja: $300.000 COP Temporada Alta: $350.000 COP</li></ul><h3>PLAN AMERICANO</h3><ul><li>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo) Temporada Baja: $380.000 COP Temporada Alta: $420.000 COP</li></ul><p><br data-cke-filler=\"true\"></p>', '1', '2019-04-09 07:09:03'),
(6, 2, 'Oriental', '[\"views/img/especial/oriental01.jpg\", \"views/img/especial/oriental02.jpg\", \"views/img/especial/oriental03.jpg\",\"views/img/especial/oriental04.jpg\"]', 'JTu790_yyRc', 'views/img/especial/oriental-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN ESPECIAL DE ESTILO ORIENTAL.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:09:05'),
(7, 2, 'Moderna', '[\"views/img/especial/moderna01.jpg\", \"views/img/especial/moderna02.jpg\", \"views/img/especial/moderna03.jpg\",\"views/img/especial/moderna04.jpg\"]', 'JTu790_yyRc', 'views/img/especial/moderna-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN ESPECIAL DE ESTILO MODERNA.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:09:08'),
(8, 2, 'Africana', '[\"views/img/especial/africana01.jpg\", \"views/img/especial/africana02.jpg\", \"views/img/especial/africana03.jpg\",\"views/img/especial/africana04.jpg\"]', 'JTu790_yyRc', 'views/img/especial/africana-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN ESPECIAL DE ESTILO AFRICANA.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:09:11'),
(9, 2, 'Árabe', '[\"views/img/especial/arabe01.jpg\", \"views/img/especial/arabe02.jpg\", \"views/img/especial/arabe03.jpg\",\"views/img/especial/arabe04.jpg\"]', 'JTu790_yyRc', 'views/img/especial/arabe-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN ESPECIAL DE ESTILO ARABE.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:09:14'),
(10, 2, 'Romana', '[\"views/img/especial/romana01.jpg\", \"views/img/especial/romana02.jpg\", \"views/img/especial/romana03.jpg\",\"views/img/especial/romana04.jpg\"]', 'JTu790_yyRc', 'views/img/especial/romana-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN ESPECIAL DE ESTILO ROMANA.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:09:16'),
(11, 3, 'Caribeña', '[\"views/img/standar/caribena01.jpg\", \"views/img/standar/caribena02.jpg\", \"views/img/standar/caribena03.jpg\",\"views/img/standar/caribena04.jpg\"]', 'JTu790_yyRc', 'views/img/standar/caribena-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN STANDAR DE ESTILO CARIBEÑA.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:09:20'),
(12, 3, 'Colonial', '[\"views/img/standar/colonial01.jpg\", \"views/img/standar/colonial02.jpg\", \"views/img/standar/colonial03.jpg\",\"views/img/standar/colonial04.jpg\"]', 'JTu790_yyRc', 'views/img/standar/colonial-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN STANDAR DE ESTILO COLONIAL.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:09:26'),
(13, 3, 'Hindú', '[\"views/img/standar/hindu01.jpg\", \"views/img/standar/hindu02.jpg\", \"views/img/standar/hindu03.jpg\",\"views/img/standar/hindu04.jpg\"]', 'JTu790_yyRc', 'views/img/standar/hindu-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN STANDAR DE ESTILO HINDÚ.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:09:31'),
(14, 3, 'Marroquí', '[\"views/img/standar/marroqui01.jpg\", \"views/img/standar/marroqui02.jpg\", \"views/img/standar/marroqui03.jpg\",\"views/img/standar/marroqui04.jpg\"]', 'JTu790_yyRc', 'views/img/standar/marroqui-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN STANDAR DE ESTILO MARROQUÍ.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:09:34'),
(15, 3, 'Retro', '[\"views/img/standar/retro01.jpg\", \"views/img/standar/retro02.jpg\", \"views/img/standar/retro03.jpg\",\"views/img/standar/retro04.jpg\"]', 'JTu790_yyRc', 'views/img/standar/retro-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN STANDAR DE ESTILO RETRO.</b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2019-04-09 07:09:37'),
(16, 4, 'Africana', '[\"views/img/presidencial/africana01.jpg\", \"views/img/presidencial/africana02.jpg\", \"views/img/presidencial/africana03.jpg\",\"views/img/presidencial/africana04.jpg\"]', 'JTu790_yyRc', 'views/img/presidencial/africana-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN PRESIDENCIAL DE ESTILO AFRICANA.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 18:53:43'),
(17, 4, 'Campestre', '[\"views/img/presidencial/campestre01.jpg\", \"views/img/presidencial/campestre02.jpg\", \"views/img/presidencial/campestre03.jpg\",\"views/img/presidencial/campestre04.jpg\"]', 'JTu790_yyRc', 'views/img/presidencial/campestre-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN PRESIDENCIAL DE ESTILO CAMPESTRE.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 18:53:43'),
(18, 4, 'Moderna', '[\"views/img/presidencial/moderna01.jpg\", \"views/img/presidencial/moderna02.jpg\", \"views/img/presidencial/moderna03.jpg\",\"views/img/presidencial/moderna04.jpg\"]', 'JTu790_yyRc', 'views/img/presidencial/moderna-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN PRESIDENCIAL DE ESTILO MODERNO.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 18:53:43'),
(19, 4, 'Urbana', '[\"views/img/presidencial/urbana01.jpg\", \"views/img/presidencial/urbana02.jpg\", \"views/img/presidencial/urbana03.jpg\",\"views/img/presidencial/urbana04.jpg\"]', 'JTu790_yyRc', 'views/img/presidencial/urbana-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN PRESIDENCIAL DE ESTILO URBANA.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 18:53:43'),
(20, 4, 'Venecia', '[\"views/img/presidencial/venecia01.jpg\", \"views/img/presidencial/venecia02.jpg\", \"views/img/presidencial/venecia03.jpg\",\"views/img/presidencial/venecia04.jpg\"]', 'JTu790_yyRc', 'views/img/presidencial/venecia-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN PRESIDENCIAL DE ESTILO VENECIA.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 18:53:43'),
(21, 5, 'Hindú', '[\"views/img/penthouse/hindu01.jpg\", \"views/img/penthouse/hindu02.jpg\", \"views/img/penthouse/hindu03.jpg\",\"views/img/penthouse/hindu04.jpg\"]', 'JTu790_yyRc', 'views/img/penthouse/hindu-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN PENTHOUSE DE ESTILO HINDÚ.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 20:39:05'),
(22, 5, 'Moderna', '[\"views/img/penthouse/moderna01.jpg\", \"views/img/penthouse/moderna02.jpg\", \"views/img/penthouse/moderna03.jpg\",\"views/img/penthouse/moderna04.jpg\"]', 'JTu790_yyRc', 'views/img/penthouse/moderna-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN PENTHOUSE DE ESTILO MODERNO.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 20:39:05'),
(23, 5, 'Retro', '[\"views/img/penthouse/retro01.jpg\", \"views/img/penthouse/retro02.jpg\", \"views/img/penthouse/retro03.jpg\",\"views/img/penthouse/retro04.jpg\"]', 'JTu790_yyRc', 'views/img/penthouse/retro-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN PENTHOUSE DE ESTILO RETRO.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 20:39:05'),
(24, 5, 'Romana', '[\"views/img/penthouse/romana01.jpg\", \"views/img/penthouse/romana02.jpg\", \"views/img/penthouse/romana03.jpg\",\"views/img/penthouse/romana04.jpg\"]', 'JTu790_yyRc', 'views/img/penthouse/romana-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN PENTHOUSE DE ESTILO ROMANA.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 20:39:05'),
(25, 5, 'Vintage', '[\"views/img/penthouse/vintage01.jpg\", \"views/img/penthouse/vintage02.jpg\", \"views/img/penthouse/vintage03.jpg\",\"views/img/penthouse/vintage04.jpg\"]', 'JTu790_yyRc', 'views/img/penthouse/romana-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN PENTHOUSE DE ESTILO VINTAGE.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 20:39:05'),
(26, 6, 'Campestre', '[\"views/img/fullnoruega/campestre01.jpg\", \"views/img/fullnoruega/campestre02.jpg\", \"views/img/fullnoruega/campestre03.jpg\",\"views/img/fullnoruega/campestre04.jpg\"]', 'JTu790_yyRc', 'views/img/fullnoruega/campestre-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN FULL NORUEGA DE ESTILO CAMPESTRE.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 22:01:28'),
(27, 6, 'Caribeña', '[\"views/img/fullnoruega/caribeña01.jpg\", \"views/img/fullnoruega/caribeña02.jpg\", \"views/img/fullnoruega/caribeña03.jpg\",\"views/img/fullnoruega/caribeña04.jpg\"]', 'JTu790_yyRc', 'views/img/fullnoruega/caribeña-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN FULL NORUEGA DE ESTILO CARIBEÑA.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 22:01:28'),
(28, 6, 'Marroquí', '[\"views/img/fullnoruega/marroqui01.jpg\", \"views/img/fullnoruega/marroqui02.jpg\", \"views/img/fullnoruega/marroqui03.jpg\",\"views/img/fullnoruega/marroqui04.jpg\"]', 'JTu790_yyRc', 'views/img/fullnoruega/marroqui-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN FULL NORUEGA DE ESTILO MARROQUIN.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 22:01:28'),
(29, 6, 'Moderna', '[\"views/img/fullnoruega/moderna01.jpg\", \"views/img/fullnoruega/moderna02.jpg\", \"views/img/fullnoruega/moderna03.jpg\",\"views/img/fullnoruega/moderna04.jpg\"]', 'JTu790_yyRc', 'views/img/fullnoruega/moderna-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN FULL NORUEGA DE ESTILO MODERNA.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 22:01:28'),
(30, 6, 'Oriental', '[\"views/img/fullnoruega/oriental01.jpg\", \"views/img/fullnoruega/oriental02.jpg\", \"views/img/fullnoruega/oriental03.jpg\",\"views/img/fullnoruega/oriental04.jpg\"]', 'JTu790_yyRc', 'views/img/fullnoruega/oriental-360.jpg', '<p><b>ESTA ES LA DESCRIPCIÓN FALSA DE LA HABITACIÓN FULL NORUEGA DE ESTILO ORIENTAL.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.					</p>					<br>					<h3>PLAN CONTINENTAL</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>					Temporada Baja: $300.000 COP<br>					Temporada Alta: $350.000 COP</p>						<br>					<h3>PLAN AMERICANO</h3>					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>					Temporada Baja: $380.000 COP<br>					Temporada Alta: $420.000 COP</p>										<br>					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '1', '2020-02-12 22:01:28');
INSERT INTO `habitaciones` (`id_h`, `tipo_h`, `estilo`, `galeria`, `video`, `recorrido_virtual`, `descripcion_h`, `estado`, `fecha_h`) VALUES
(31, 8, 'Elegancia', '[\"views/img/romance/elegancia1.jpg\",\"views/img/romance/elegancia2.jpg\",\"views/img/romance/elegancia3.jpg\",\"views/img/romance/elegancia4.jpg\"]', 'wEk5b1ZQNfA', 'views/img/romance/elegancia-360.jpg', '<p>Habitación de la categoría de Romance, habitación Elegancia.</p><h4>Plan Continental</h4><ul><li>Alimentación básica para todos los asistentes (desayuno, almuerzo y cena)</li><li>Servicios de atención al cuarto y micro compra</li></ul><h4>Plan Americano</h4><ul><li>Lujos incluidos.</li><li>Alimentación de lujo para todos los asistentes (desayuno, media mañana, almuerzo, algo y cena ademas de merienda)</li><li>Servicios de transporte.</li><li>Servicio al cuarto.</li></ul>', '1', '2020-03-01 04:48:57'),
(35, 8, 'Monokai', '[\"views/img/romance/monokai1.jpg\",\"views/img/romance/monokai2.jpg\",\"views/img/romance/monokai3.jpg\",\"views/img/romance/monokai4.jpg\"]', 'lU6US3eKPJo', 'views/img/romance/monokai-360.jpg', '<p>Habitación <i><strong>MONOKAI </strong></i>para la<strong> Categoría Romance.</strong></p><p>Esta habitación cuenta cuenta con lujos de categoría media mas y bien la comodidad y la eficiencia del servicio hacen de esta habitación una experiencia inolvidable. Esta habitación posee un estilo suave para todos los gustos del consumidor.</p><h4><strong>Plan Continental.</strong></h4><ul><li>Servicio de atención de aperitivos.</li><li>Vino Chardonay de 20 años añejo.</li><li>Servicio alimentario básico.</li><li>No tenemos mas, somos pobreza.</li></ul><h4><strong>Plan Americana&nbsp;</strong></h4><ul><li>Servicio de alta gama en alimentación.</li><li>Cócteles de servicio.</li><li>Alimentación fuera del hotel.</li><li>Transporte.</li><li>Servicio de atención al cuarto.</li></ul>', '1', '2020-03-01 22:44:12'),
(36, 8, 'Moderna', '[\"views/img/romance/moderna1.jpg\",\"views/img/romance/moderna2.jpg\",\"views/img/romance/moderna4.jpg\",\"views/img/romance/moderna5.jpg\"]', 'bon17FIrI_E', 'views/img/romance/moderna-360.jpg', '<p><strong>HABITACIÓN ROMANCE ESTILO MODERNA.</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.</p><h3>PLAN CONTINENTAL</h3><ul><li>Almuerzo - Cena.</li><li>Tour especializado.</li></ul><h3>PLAN AMERICANO</h3><ul><li>Desayuno - Almuerzo - Cena.</li><li>Aperitivos entre comida.</li><li>Servicio al cuarto.</li></ul><p><br data-cke-filler=\"true\"></p>', '1', '2020-03-01 22:53:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `min_descripcion` text NOT NULL,
  `precio_alta` float NOT NULL,
  `precio_baja` float NOT NULL,
  `estado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `tipo`, `img`, `descripcion`, `min_descripcion`, `precio_alta`, `precio_baja`, `estado`, `fecha`) VALUES
(1, 'Romántico', 'views/img/planes/plan-romantico1.png', 'Plan con todas las comodidades incluidas para la pareja de enamorados; incluye comodidad de habitación así como servicio al cuarto, duchas especiales y camas de múltiples estilos, incluye transporte, tour y paisajes íntimos de comodidad además de sala Jacuzzi con views en el cuarto.', 'Plan con todas las comodidades incluidas para la pareja de enamorados; incluye comodidad de habitación así como servicio al cuarto, duchas especiales y camas de múltiples estilos, incluye transporte, tour y paisajes íntimos de comodidad además de sala Jacuzzi con views en el cuarto.', 130000, 85000, '1', '2022-11-14 04:19:50'),
(2, 'Luna de Miel', 'views/img/planes/plan-luna-de-miel1.png', 'Plan exclusivo para los recién casados, incluye las cómodas camas ExpressSouck además de las comodidades del plan romántico; se incluye además servicios de tour y aventura además de servicio al cuarto y utensilios convenientes para el tema.', 'Plan exclusivo para los recién casados, incluye las cómodas camas ExpressSouck además de las comodidades del plan romántico; se incluye además servicios de tour y aventura además de servicio al cuarto y utensilios convenientes para el tema.', 260000, 200000, '1', '2022-11-14 04:19:58'),
(3, 'Aventura', 'views/img/planes/259.png', '<p>El plan perfecto para aquellos aventureros que vienen a disfrutar de las maravillas de Noruega, se incluye canope además de rutas de escalada, senderos de montaña y tour globalizado por toda la zona; se incluye habitaciones de cómodas camas de relajación y un servicio al cuarto de spa; el paracaidismo se encuentra incluido.</p>', 'El plan perfecto para aquellos aventureros que vienen a disfrutar de las maravillas de Noruega, se incluye canope además de rutas de escalada, senderos de montaña y tour globalizado por toda la zona; se incluye habitaciones de cómodas camas de relajación y un servicio al cuarto de spa; el paracaidismo se encuentra incluido.', 115000, 70000, '1', '2022-11-14 04:20:04'),
(4, 'Spa', 'views/img/planes/plan-spa1.png', 'Además de disfrutar de las maravillas de Noruega, somos especialistas en dar un descanso y maso terapia dignos de ser recordados, usando piedras volcánicas y los mejores utensilios de trabajo, se incluye tour por las ciudades además de un micro express en tren por las montañas.', 'Además de disfrutar de las maravillas de Noruega, somos especialistas en dar un descanso y maso terapia dignos de ser recordados, usando piedras volcánicas y los mejores utensilios de trabajo, se incluye tour por las ciudades además de un micro express en tren por las montañas. ', 170000, 130000, '1', '2022-11-14 04:20:18'),
(5, 'Vacacional', 'views/img/planes/plan-vacaciones1.png', 'Un plan perfecto para la familia, contando con todos los servicios turísticos de nuestro hotel además de experiencias de canope y recorrido en barcas por los lagos mas preciosos Noruegos y servicios de spa, relajación, Jacuzzi y piscinas adaptadas para los climas; se incluyen camas estándares y de tipo unifamiliar.', 'Un plan perfecto para la familia, contando con todos los servicios turísticos de nuestro hotel además de experiencias de canope y recorrido en barcas por los lagos mas preciosos Noruegos y servicios de spa, relajación, Jacuzzi y piscinas adaptadas para los climas; se incluyen camas estándares y de tipo unifamiliar.', 195000, 170000, '1', '2022-11-14 04:20:26'),
(6, 'Turismo', 'views/img/planes/304.jpg', '<p>El plan ideal para aquellos que desean ampliar su conocimiento del mundo en estas maravillosas tierras; se incluye turismo por todos los paisajes característicos de Noruega y una amplia gama de atracciones, así como servicios de spa y carrusel con todas las comodidades del hotel, un plan bastante completo. holii 2</p>', 'El plan ideal para aquellos que desean ampliar su conocimiento del mundo en estas maravillosas tierras; se incluye turismo por todos los paisajes característicos de Noruega y una amplia gama de atracciones, así como servicios de spa y carrusel con todas las comodidades del hotel, un plan bastante completo.', 220000, 195000, '1', '2022-11-14 04:20:35'),
(7, 'Crucero', 'views/img/planes/plan-crucero1.png', 'El super plan para aquellos que desean pasar en suite especiales que se encuentren en movimiento, el crucero Merily Tomso cuenta con todos los lujos además de in centro de entretenimiento y Jacuzzi para todos los gustos, cuenta con habitaciones pequeñas aunque cómodas y el servicio de restaurante-bar incorporado.', 'El super plan para aquellos que desean pasar en suite especiales que se encuentren en movimiento, el crucero Merily Tomso cuenta con todos los lujos además de in centro de entretenimiento y Jacuzzi para todos los gustos, cuenta con habitaciones pequeñas aunque cómodas y el servicio de restaurante-bar incorporado.', 310000, 275000, '1', '2022-11-14 04:20:44'),
(9, 'Paseo Parapente', 'views/img/planes/Paseo Parapente-114.jpg', '<p>Paseo sobre nieve!, una experiencia fenomenal para aquellos que aman las aventuras sobre hielo; se incluye instructor si eres apenas un novato en este aspecto.</p>', 'Paseo a lo paracaidista!, una experiencia fenomenal para aquellos que aman las aventuras sobre las nubes; se incluye instructor si eres apenas un novato en este aspecto. Disfruta del mejor parapente de la zona viajando por todo el pueblo, pero por los aires.', 400000, 380000, '1', '2022-11-16 04:18:26'),
(11, 'Fiesta', 'views/img/planes/431.jpg', '<p>Plan de fiesta con tus amigos, incluye paseo por la ciudad los días de rumba así como la zona de discoteca del hotel exclusiva para aquellos que gozan de un gran ambiente musical y de licor. Promociones de bombones y barra libre para todos los gustos.</p>', 'Plan de fiesta con tus amigos, incluye paseo por la ciudad los días de rumba así como la zona de discoteca del hotel exclusiva para aquellos que gozan de un gran ambiente musical y de licor. Promociones de bombones y barra libre para todos los gustos.', 300000, 210000, '1', '2022-11-14 04:21:30'),
(15, 'Canotaje', 'views/img/planes/279.jpg', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose injected humour and the like. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'Plan de deporte extremo para aquellas personas que adoran disfrutar de paisajes preciosos y deportes de alta adrenalina al mismo tiempo. Disfruta de los preciosos rápidos de la localidad y al mismo tiempo de la hermosa flora que recorrerás en esta experiencia alucinante.', 189000, 75000, '1', '2022-11-14 18:23:18'),
(17, 'Thaza Té', 'views/img/planes/128.jpg', '', 'Plan Thaz de té familiar o romántica, perfecto para aquellos parches cortos, normalmente de u día para otro, donde solo deseas pasar una velada super atendida con tu acompañante, disfruta de nuestro excelente menú, al mejor estilo de la tacita de te gourmet.', 178000, 85000, '1', '2022-11-14 18:14:43'),
(18, 'Lum Yoga', 'views/img/planes/Zum Yoga-759.jpg', '', 'Experiencia de relajación maravillosa y especializada en medio de la naturaleza, disfruta de un excelente ambiente de paz y armonía con la naturaleza, acompañada de una serie de ejercicios que le ayudarán al manejo de chakras y paz interior.', 125000, 65000, '1', '2022-11-27 03:47:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla_alphus`
--

CREATE TABLE `plantilla_alphus` (
  `id` int(11) NOT NULL COMMENT 'Id general de la tupla',
  `logoGrande` text NOT NULL COMMENT 'Logo expandido del hotel',
  `microLogo` text NOT NULL COMMENT 'Micro logo del hotel',
  `mapa` text NOT NULL COMMENT 'Link proporcionado por google maps para el mapa del hotel',
  `footerText` text NOT NULL COMMENT 'Footer text del hotel para información adicional',
  `redesFacebook` text NOT NULL COMMENT 'Link de red social facebook',
  `redesTwitter` text NOT NULL COMMENT 'Link de red social Twitter',
  `redesYouTube` text NOT NULL COMMENT 'Link de red social de YouTube',
  `redesInstagram` text NOT NULL COMMENT 'Link de red social de Instagram',
  `redesLinkedin` text NOT NULL COMMENT 'Link de red de linkedin para identificaciones corporativas',
  `cardFooterVisitanos` text NOT NULL COMMENT 'Primer texto card informativo del hotel',
  `cardFooterNumerosFijos` text NOT NULL COMMENT 'Texto de números de teléfono fíjos como tal',
  `cardFooterNumerosMoviles` text NOT NULL COMMENT 'Texto de números de teléfono móviles como tal',
  `mensajeBienvenido` text NOT NULL COMMENT 'Mensaje de bienvenido cuando estamos presentando los planes',
  `nosotrosMision` text NOT NULL COMMENT 'Nosotros misión de la empresa',
  `nosotrosVision` text NOT NULL COMMENT 'Nosotros visión de la empresa',
  `imgFondoTestimoniales` text NOT NULL COMMENT 'Imagen de fondo de las testimoniales',
  `imgFondoCategorias` text NOT NULL COMMENT 'Imagen de fondo de las categorías de habitación donde empezamos a mostrar las habitaciones',
  `imgFondoLoginDashboard` text NOT NULL COMMENT 'Imagen del login para ingresar al administrador de contenido del sitio',
  `modoOscuroDashboard` text NOT NULL COMMENT '*** 1 - Aplicamos Modo Oscuro *** 2 - Aplicamos el Modo Claro \r\n-------------------------------\r\nAquí irá la clase aplicada de AdminLte especializada para poner en modo oscuro todo el sitio o en modo claro según la selección. Nota: Estamos Manejando AdminLte versión 3.2, usaremos la clase según el 1 o 2 que traigamos y lo plantearemos dinámicamente en el HTML gracias a PHP.\r\n\r\nNotas:\r\n\r\n*** Header : En header.php, en la etiqueta inicial nav, la clase navbar-white la cambiamos a navbar-dark si la queremos oscuro o lo dejamos navbar-white si se quiere claro.\r\n-------------------------------\r\n*** Body   : En plantilla.php, etiqueta Body con id="bodyPlantilla" le agregamos la clase dark-mode si lo queremos oscuro o se la quitamos si la queremos clara.\r\n-------------------------------\r\nEn conclusión, debemos mover en dos lados para que la clase dark-mode en general sea aplicada adecuadamente y se guarde/use dinámicamente',
  `fechaModificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plantilla_alphus`
--

INSERT INTO `plantilla_alphus` (`id`, `logoGrande`, `microLogo`, `mapa`, `footerText`, `redesFacebook`, `redesTwitter`, `redesYouTube`, `redesInstagram`, `redesLinkedin`, `cardFooterVisitanos`, `cardFooterNumerosFijos`, `cardFooterNumerosMoviles`, `mensajeBienvenido`, `nosotrosMision`, `nosotrosVision`, `imgFondoTestimoniales`, `imgFondoCategorias`, `imgFondoLoginDashboard`, `modoOscuroDashboard`, `fechaModificacion`) VALUES
(1, 'vistas/img/plantilla/alphus_complete_banner.png', 'vistas/img/plantilla/iconoAlphus.png', '', '', 'https://www.facebook.com/sebastyan.medyna/', '', 'https://www.youtube.com/channel/UCeVoQDwG0qwaNWZXquYSS4g', 'https://www.instagram.com/sebastianmedina117/', 'https://www.linkedin.com/in/juan-sebastian-medina-toro-887491249/', 'En el hotel Alphus estaremos encatados de atenderte.Cl. 30 #3584 #35- a, Arboletes, Antioquia. Hotel Alphus. Zona de Puerto Rey', '6042569874 - 6042569811', '3124652201 - 3145632214', 'En nuestro Hotel Alphus podemos ofrecerte diferentes planes de reserva, para hacer de tu estadía una experiencia maravillosa así como temática para la ocasión. Puede ver mas detalles sobre nuestros planes a continuación, ¡ Bienvenido !', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', '', '', 'vistas/img/plantilla/pexels-karolina-grabowska-7603108.jpg', '1', '2022-10-16 22:49:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillos`
--

CREATE TABLE `platillos` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `estado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `platillos`
--

INSERT INTO `platillos` (`id`, `img`, `descripcion`, `estado`, `fecha`) VALUES
(1, 'views/img/platillos/plato01.png', 'Mollejas de Cerdo Gratinadas.', '1', '2022-01-14 03:55:05'),
(4, 'views/img/platillos/plato04.png', 'Tacos Rellenos Especiales', '1', '2022-01-14 03:55:06'),
(6, 'views/img/platillos/plato06.png', 'Flang Cremoso', '1', '2022-01-14 03:55:07'),
(7, 'views/img/platillos/plato07.png', 'Picada de Carne Platinada', '1', '2022-01-14 03:55:07'),
(8, 'views/img/platillos/329.jpg', 'Nuggets Maritimos  Pinzados', '1', '2022-01-14 03:55:08'),
(9, 'views/img/platillos/949.jpg', 'Nachos Especiales de Queso', '1', '2022-01-14 03:55:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recorrido`
--

CREATE TABLE `recorrido` (
  `id` int(11) NOT NULL,
  `foto_peq` text NOT NULL,
  `foto_grande` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `estado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recorrido`
--

INSERT INTO `recorrido` (`id`, `foto_peq`, `foto_grande`, `titulo`, `descripcion`, `estado`, `fecha`) VALUES
(1, 'views/img/recorrido/152.jpg', 'views/img/recorrido/176.jpg', 'Paseo en Globo', 'Paseo en globo aerostático supervisado por profesionales, un paseo espectacular como si estuviéramos en la mismísima capadocia. Una experiencia a lo estilo 3 metros sobre el cielo.', '1', '2022-01-13 04:22:28'),
(2, 'views/img/recorrido/327.jpg', 'views/img/recorrido/334.jpg', 'Buceo', 'Explorando las maravillas que esconde el terreno submarino costero del hotel, una experiencia de buceo increíble por el área marítima que no debes dejar pasar.', '1', '2022-01-13 04:23:36'),
(3, 'views/img/recorrido/949.jpg', 'views/img/recorrido/254.jpg', 'Pesca', 'Para los amantes de la pesca tenemos esta experiencia maravillosa! disfruta de nuestros diferentes lagos y variedad de peces que pueden ofrecerte un desafío digno de paciencia y dedicación!.', '1', '2022-01-13 04:24:49'),
(4, 'views/img/recorrido/265.jpg', 'views/img/recorrido/391.jpg', 'Fiestas en Playa', 'Una \"bailadita\" para aquellos amantes a la música y el baile, una fiesta tipo Tomorrowland en la playa del hotel, música de todo tipo acompañada de un acompañamiento agradable y bebidas perfectas para el clima.', '1', '2022-01-13 04:35:31'),
(6, 'views/img/recorrido/284.jpg', 'views/img/recorrido/399.jpg', 'Paseo en Bote', 'Para aquellos que les gusta un recorrido relax, tenemos nuestro paseo en lancha por toda la zona costera, un paseo acompañado de música, buen ambiente e historia.', '1', '2022-01-13 04:37:01'),
(8, 'views/img/recorrido/648.jpg', 'views/img/recorrido/754.jpg', 'Pradera Ensueño', 'Recorrido precioso para los enamorados que gustan de un paseo en el clima de invierno, la ciudad acogedora recibe en brazos abiertos a los invitados en sus cálidos recintos. ', '0', '2022-01-13 04:27:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pago_reserva` float NOT NULL,
  `numero_transaccion` text NOT NULL,
  `orden_transaccion` text NOT NULL,
  `medio_transaccion` text NOT NULL,
  `codigo_reserva` text NOT NULL,
  `pasarela_pago` text NOT NULL,
  `descripcion_reserva` text NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado_pago` text NOT NULL,
  `dias` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_habitacion`, `id_usuario`, `pago_reserva`, `numero_transaccion`, `orden_transaccion`, `medio_transaccion`, `codigo_reserva`, `pasarela_pago`, `descripcion_reserva`, `fecha_ingreso`, `fecha_salida`, `fecha_reserva`, `estado_pago`, `dias`) VALUES
(4, 19, 19, 5900000, '1246972438', '4384916218', 'credit_card', 'RES-6PMNW372S8Y', 'Mercado Pago', 'Habitación Presidencial Urbana - Luna de Miel - 2 personas. La cantidad de días dispuestos para su reserva es de 6 contados desde la fecha de inicio de la reserva y entrada.', '2022-03-25', '2022-03-31', '2022-05-02 00:54:52', '1', '6'),
(5, 20, 19, 14852000, '1247120412', '4418634097', 'credit_card', 'RES-WZT44WABK4Q', 'Mercado Pago', 'Habitación Presidencial Venecia - Vacacional - 4 personas. La cantidad de días dispuestos para su reserva es de 9 contados desde la fecha de inicio de la reserva y entrada.', '2022-04-01', '2022-04-10', '2022-05-02 00:54:55', '1', '9'),
(6, 23, 19, 10464000, '4TH39621V8555921M', 'COMPLETED', 'API PayPal', 'RES-AM8XHW700T4', 'PayPal', 'Habitación PentHouse Retro - Spa - 3 personas. La cantidad de días dispuestos para su reserva es de 8 contados desde la fecha de inicio de la reserva y entrada.', '2022-05-07', '2022-05-15', '2022-05-02 00:54:57', '1', '8'),
(7, 26, 19, 16530000, '03L00715GN785405V', 'COMPLETED', 'API PayPal', 'RES-UG5TEQVQK35', 'PayPal', 'Habitación Noruega Campestre - Vacacional - 5 personas. La cantidad de días dispuestos para su reserva es de 7 contados desde la fecha de inicio de la reserva y entrada.', '2022-04-08', '2022-04-15', '2022-05-02 00:55:01', '1', '7'),
(8, 18, 19, 10791000, '1247203810', '4438714586', 'credit_card', 'RES-OWBN4CRBJW5', 'Mercado Pago', 'Habitación Presidencial Moderna - Turismo - 3 personas. La cantidad de días dispuestos para su reserva es de 8 contados desde la fecha de inicio de la reserva y entrada.', '2022-05-07', '2022-05-15', '2022-05-02 00:55:04', '1', '8'),
(10, 23, 19, 9460000, '8239935547608556149460000', '1403595826', 'VISA - CREDIT_CARD', 'RES-R6ZYA69XZ7E', 'PayU', 'Habitación PentHouse Retro - Luna de Miel - 2 personas. La cantidad de días dispuestos para su reserva es de 9 contados desde la fecha de inicio de la reserva y entrada.', '2022-05-20', '2022-05-29', '2022-05-02 00:55:07', '1', '9'),
(11, 13, 19, 5940000, '7868584620601204065940000', '1403598646', 'MASTERCARD - CREDIT_CARD', 'RES-1UI3Y6IE1MJ', 'PayU', 'Habitación Standar Hindú - Vacacional - 4 personas. La cantidad de días dispuestos para su reserva es de 5 contados desde la fecha de inicio de la reserva y entrada.', '2022-04-14', '2022-04-19', '2022-05-02 00:55:09', '1', '5'),
(13, 13, 19, 8184000, '40G2051483318741X', 'COMPLETED', 'API PayPal', 'RES-O70EYZENABU', 'PayPal', 'Habitación Standar Hindú - Vacacional - 4 personas. La cantidad de días dispuestos para su reserva es de 7 contados desde la fecha de inicio de la reserva y entrada.', '2022-04-24', '2022-05-01', '2022-05-02 00:55:12', '1', '7'),
(14, 4, 19, 10416000, '0FP682465K641854E', 'COMPLETED', 'API PayPal', 'RES-AG37B6N4KXA', 'PayPal', 'Habitación Suite Clásica - Vacacional - 4 personas. La cantidad de días dispuestos para su reserva es de 7 contados desde la fecha de inicio de la reserva y entrada.', '2022-05-07', '2022-05-14', '2022-05-02 00:55:15', '1', '7'),
(17, 28, 24, 10058000, '1247871521', '4657277799', 'credit_card', 'RES-7ETZGN915S1', 'Mercado Pago', 'Habitación Noruega Marroquí - Aventura - 4 personas. La cantidad de días dispuestos para su reserva es de 6 contados desde la fecha de inicio de la reserva y entrada.', '2022-05-12', '2022-05-18', '2022-05-02 02:57:49', '1', '6'),
(18, 35, 19, 9374000, '1248288152', '4846680005', 'credit_card', 'RES-9NPM9O75K4N', 'Mercado Pago', 'Habitación Romance Monokai - Romántico - 2 personas. La cantidad de días dispuestos para su reserva es de 9 contados desde la fecha de inicio de la reserva y entrada.', '2022-08-05', '2022-08-14', '2022-05-28 19:23:25', '1', '9'),
(19, 26, 29, 6042000, '25761675TL674120R', 'COMPLETED', 'API PayPal', 'RES-34CHOUVRVCA', 'PayPal', 'Habitación Noruega Campestre - Spa - 3 personas. La cantidad de días dispuestos para su reserva es de 4 contados desde la fecha de inicio de la reserva y entrada.', '2022-08-12', '2022-08-16', '2022-08-05 00:38:56', '1', '4'),
(20, 26, 19, 8460000, '7GS70121CM6389228', 'COMPLETED', 'API PayPal', 'RES-FYMWONYFE7I', 'PayPal', 'Habitación Noruega Campestre - Aventura - 4 personas. La cantidad de días dispuestos para su reserva es de 5 contados desde la fecha de inicio de la reserva y entrada.', '2022-08-23', '2022-08-28', '2022-08-16 03:05:01', '1', '5'),
(21, 26, 30, 18012000, '1306572988', '5400723079', 'credit_card', 'RES-YGF9I5DWBGF', 'Mercado Pago', 'Habitación Noruega Campestre - Vacacional - 4 personas. La cantidad de días dispuestos para su reserva es de 9 contados desde la fecha de inicio de la reserva y entrada.', '2022-09-09', '2022-09-18', '2022-08-05 02:38:18', '1', '9'),
(22, 23, 19, 7482000, '0T8355756V120625C', 'COMPLETED', 'API PayPal', 'RES-99J1YOD0A1W', 'PayPal', 'Habitación PentHouse Retro - Romántico - 2 personas. La cantidad de días dispuestos para su reserva es de 9 contados desde la fecha de inicio de la reserva y entrada.', '2022-10-06', '2022-10-15', '2022-08-16 03:05:06', '1', '9'),
(23, 26, 19, 19950000, '6W149403J0742450F', 'COMPLETED', 'API PayPal', 'RES-UJZS4EGVSPG', 'PayPal', 'Habitación Noruega Campestre - Vacacional - 4 personas. La cantidad de días dispuestos para su reserva es de 10 contados desde la fecha de inicio de la reserva y entrada.', '2022-10-05', '2022-10-15', '2022-08-09 05:28:09', '1', '10'),
(24, 23, 20, 7482000, '6UV32047DT1995502', 'COMPLETED', 'API PayPal', 'RES-ZRR30AMZP61', 'PayPal', 'Habitación PentHouse Retro - Romántico - 2 personas. La cantidad de días dispuestos para su reserva es de 9 contados desde la fecha de inicio de la reserva y entrada.', '2022-09-01', '2022-09-10', '2022-08-20 07:38:45', '1', '9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id_testimonio` int(11) NOT NULL,
  `id_reserva_t` int(11) NOT NULL,
  `id_usuario_t` int(11) NOT NULL,
  `id_habitacion_t` int(11) NOT NULL,
  `testimonio` text NOT NULL,
  `aprobado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id_testimonio`, `id_reserva_t`, `id_usuario_t`, `id_habitacion_t`, `testimonio`, `aprobado`, `fecha`) VALUES
(1, 22, 30, 23, 'Estoy actualizando la testimonial a ver que sale, versión 2 del elemento', 1, '2022-08-20 07:28:32'),
(2, 21, 30, 26, 'Una experiencia inolvidable, excelente habitación, excelente servicio, todo muy aseado y dispuesto para quedar con ganas de volver', 1, '2022-08-06 02:57:29'),
(3, 20, 5, 26, 'Han sido las mejores vacaciones de mi vida, no se escatima en detalles preciosos y la atención ha sido de ensueño, muy pero muy recomendado', 1, '2022-08-06 02:57:29'),
(6, 19, 29, 26, 'La habitación es espaciosa y perfecta para toda la familia, me ha gustado mucho la atención recibida y lo aseado del lugar, los detalles de los planes se cumplen con excesos incluso, muchas gracias! volveré!', 1, '2022-08-06 03:01:28'),
(7, 7, 19, 26, 'Ha sido de ensueño estar en este lugar con mi pareja, muchas gracias por la atención y el buen servicio, volveremos muy pronto es seguro!', 1, '2022-08-06 03:01:28'),
(8, 18, 19, 35, 'Una experiencia genial, ha sido fascinante lo que he vivido con mi pareja, muy buen servicio', 1, '2022-08-09 05:15:00'),
(9, 17, 24, 28, 'Una experiencia extranjera, es sin duda un lujo sentir la cultura oriental en una habitación de occidente, muy bien atendidos.', 1, '2022-08-09 05:15:00'),
(10, 14, 19, 4, 'Esta fue una testimonial clasica, no hay mucho que afirmar, sencillamente simple pero agradable', 1, '2022-08-09 05:17:26'),
(11, 13, 19, 13, 'Una nota a lo mas bien, que buen servicio y que habitación tan acogedora', 0, '2022-08-09 05:17:26'),
(12, 11, 19, 13, 'No hay mucho que decir pero tenemos el registro jajaja', 0, '2022-08-09 05:19:11'),
(13, 10, 19, 23, 'Habitación con los estilos deseados para algo mas retro a mi gusto, lo he disfrutado mucho con mi familia', 1, '2022-08-09 05:19:11'),
(14, 8, 19, 18, 'Moderno, elegante, con todo lo que necesito para que no me olvide del excelente servicio, muchas gracias', 1, '2022-08-09 05:21:19'),
(15, 6, 19, 23, 'Habitación retro espectacular sin duda, que gran servicio y atencion por parte del hotel', 1, '2022-08-09 05:21:19'),
(16, 5, 19, 20, 'Me encanta la experiencia italiana, me recuerda a mis viajes por Italia, he quedado maravillado con la habitación y la atención', 1, '2022-08-09 05:23:09'),
(17, 4, 19, 19, 'Estilo elegante, adecuado, me encanta sin duda', 1, '2022-08-09 05:23:09'),
(18, 23, 19, 26, 'Me ha encantado la experiencia que he vivido, me ha gustado la atención y cada detalle de amor y respeto que le colocan a las cosas, sencillamente, FENOMENAL.', 1, '2022-08-20 06:24:46'),
(19, 24, 20, 23, 'He esperado mucho por esta maravillosa experiencia con mi pareja, realmente es maravilloso el lugar, la habitación, el servicio, ha sino fenomenal! gracias', 1, '2022-08-20 07:56:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_u` int(11) NOT NULL,
  `numero_documento` text NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `celular` text NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL,
  `modo` text NOT NULL,
  `verificacion` int(11) NOT NULL,
  `email_encriptado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_u`, `numero_documento`, `nombre`, `email`, `celular`, `password`, `foto`, `modo`, `verificacion`, `email_encriptado`, `fecha`) VALUES
(5, '68542301', 'Luz Nelly Toro Sanchez', 'luznellytoro123@gmail.com', '3105301566', '$2a$07$asxx54ahjppf45sd87a5auUhB721lzgIImunAkOaxo68cBpoYDr4u', 'views/img/usuarios/5/1314.jpg', 'directo', 1, '6f5e6c62043d4c2606a375256155f8bf', '2022-08-05 00:44:25'),
(6, '60123012', 'Heriberto Toro Naranjo', 'heribertonarantjo@live.com', '3102365400', '$2a$07$asxx54ahjppf45sd87a5aua6XL0NCpRWd7dysMA080N1iGsX1Gx5i', '', 'directo', 0, 'b3548f19bc0b1f4de30fdf66e56f9fe4', '2022-04-06 04:12:50'),
(8, '45863012', 'Helena Maria Davilo', 'helenadavilo321@hotmail.com', '3156320899', '$2a$07$asxx54ahjppf45sd87a5auVDIFTXOITke7ua78/qplSWKTpRq5P7u', '', 'directo', 1, 'b5553287a940b698b85e85933a2a8dde', '2022-04-09 05:48:16'),
(10, '61852002', 'Maria Paulina Nuñez Taborda', 'mariapaulina999@gmail.com', '3156970344', '$2a$07$asxx54ahjppf45sd87a5auJnyEWu2I/LGrsdLfMawEZGMwUWnuJ6a', '', 'directo', 1, '44bb753ae884d702c23e6c5f3a7dd3ac', '2022-04-09 05:29:34'),
(17, '1212121212', 'aaaaaaaaaaaa', 'luznellytoro123@gmail.com', '3123123111', '$2a$07$asxx54ahjppf45sd87a5auwnm8Ge8XfxTGkTRPAGhzMKh/9TujBbi', '', 'directo', 0, '6f5e6c62043d4c2606a375256155f8bf', '2022-04-06 04:41:11'),
(18, '69032223', 'Luz Nelly Toro Sanchez', 'luznellytoro123@gmail.com', '3124121111', '$2a$07$asxx54ahjppf45sd87a5auoIO4f04vcwU5tufbLqFzu3NG9nq/DtW', '', 'directo', 1, '6f5e6c62043d4c2606a375256155f8bf', '2022-08-05 00:43:20'),
(19, '1216717948', 'Juan Sebastian Medina Toro', 'sebastianmedina@gmail.com', '3102356630', '$2a$07$asxx54ahjppf45sd87a5auxzNM.rH23RQRe64u3C5YAmYeOllKxfW', 'views/img/usuarios/19/19.jpg', 'directo', 1, '038a96f3639529b4452ae7b9b352d7d3', '2022-11-06 01:28:47'),
(20, '89420333', 'Melina Mendoza Zarro', 'melinamendozaz1@outlock.com', '3120104452', '$2a$07$asxx54ahjppf45sd87a5auT4WZH36522Mx4xBej24gxqwhhLIovYO', 'views/img/usuarios/20/1281.jpg', 'directo', 1, '9e6a09e1a4437d8694dad2881d8469fd', '2022-08-20 07:31:54'),
(22, 'null', 'Juan Sebastian Medina Toro', 'jsebastian19952011@gmail.com', 'null', 'null', 'https://lh3.googleusercontent.com/a-/AOh14GgA8BHhBShG3Ek-ahh_MSgpU9lrj7Obr_cApo7L9i8=s96-c', 'google', 1, 'null', '2022-04-18 02:03:40'),
(23, 'null', 'Fabio de Jesus Medina Henao', 'fabiomedinahenao@gmail.com', 'null', 'null', 'https://lh3.googleusercontent.com/a-/AOh14Gj_8sQSSzfDe8Nu-bc9-pWU9lxgqx6sppfyUwib=s96-c', 'google', 1, 'null', '2022-04-18 02:27:24'),
(24, '23541003', 'Jesucrito', 'misenorjesus@gmail.com', '3102654100', '$2a$07$asxx54ahjppf45sd87a5auwfiwafDOnQL4qIHucfFNVGXBONzt/Ge', '', 'directo', 1, '5f755644af6ec358a56aa160af7c0672', '2022-04-25 03:39:20'),
(25, '1904332891', 'Gabriel Ordoñez Casablanca', 'gabriuelcorreo@gmail.com', '3128910321', '$2a$07$asxx54ahjppf45sd87a5auCg6PwzW9yHEW2xM9Up/SmRhwfMiZ7LS', '', 'directo', 0, '8d461c828c4a16dd410a49fb505dbb83', '2022-05-29 20:54:47'),
(27, '48965091', 'Muriel Antonio Angostino', 'murielantonio123gostino@gmail.com', '3120912110', '$2a$07$asxx54ahjppf45sd87a5auvMu/D7pthgOm3WVAynQOCFRytWr0Mie', '', 'directo', 0, '4681ce7b4fefe229b597ee32a51a0a77', '2022-05-29 21:30:56'),
(29, '89650112', 'Clara Inés Díaz Maldonado', 'clarafiaz556@hotmail.com', '3126780900', '$2a$07$asxx54ahjppf45sd87a5auKv2ewYVxhp8dGGPBHOXiqIrcs8qVDPO', 'views/img/usuarios/29/902.jpg', 'directo', 1, 'ecb9e80c77f3fb6f4dbb480e5bebae84', '2022-05-29 23:43:28'),
(30, '1894330221', 'Amalia Medina Restrepo', 'amaliamed-2@gmail.com', '3120433321', '$2a$07$asxx54ahjppf45sd87a5auKN1DJwVAscGpFR8x8BYAYU/Wdmq800e', 'views/img/usuarios/30/1261.jpg', 'directo', 1, '5c2ba4922f4562b118003932a6aa2ef4', '2022-08-05 02:34:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos_empleado`
--
ALTER TABLE `cargos_empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comodidades`
--
ALTER TABLE `comodidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_comodidades`
--
ALTER TABLE `detalle_comodidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-detalleComodidad-categoria` (`id_categoria`),
  ADD KEY `fk-detalleComodidad-comodidad` (`id_comodidad`);

--
-- Indices de la tabla `detalle_conceptos`
--
ALTER TABLE `detalle_conceptos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id_h`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plantilla_alphus`
--
ALTER TABLE `plantilla_alphus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `platillos`
--
ALTER TABLE `platillos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recorrido`
--
ALTER TABLE `recorrido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id_testimonio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id PK de la tabla', AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cargos_empleado`
--
ALTER TABLE `cargos_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `comodidades`
--
ALTER TABLE `comodidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del concepto de nómina', AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del contrato', AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `detalle_comodidades`
--
ALTER TABLE `detalle_comodidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT de la tabla `detalle_conceptos`
--
ALTER TABLE `detalle_conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del detalle', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la ficha', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id_h` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `plantilla_alphus`
--
ALTER TABLE `plantilla_alphus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id general de la tupla', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `platillos`
--
ALTER TABLE `platillos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `recorrido`
--
ALTER TABLE `recorrido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id_testimonio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
