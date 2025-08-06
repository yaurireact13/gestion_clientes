-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2025 a las 03:04:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atlantic_city_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `dni` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `preferencias` text DEFAULT NULL,
  `segmento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `dni`, `email`, `telefono`, `fecha_registro`, `preferencias`, `segmento`) VALUES
(2, 'job', 'yauri', '61964437', 'yaurileonjob@gmail.com', '921876815', '2025-05-07', 'Billar\r\n', 'Nuevo'),
(14, 'Juan', 'Leon', '61964438', 'juan@gmail.com', '928785245', '2025-05-08', 'Casino', 'Nuevo'),
(20, 'Sheyla', 'Rosa', '74179352', 'sheyla56@gmail.com', '929331095', '2025-07-15', 'Casino', 'Nuevo'),
(21, 'Edith', 'Leon', '46008898', 'edith132@gmail.com', '936585662', '2025-07-15', 'Bingo', 'VIP'),
(22, 'Victor', 'Valdivia', '58565162', 'alexmanuelmanautrojas448@gmail.com', '957763880', '2025-07-23', 'Casino, billar', 'Regular'),
(23, 'Carlos', 'García', '12345670', 'carlos1@casino.com', '911111111', '2025-08-05', 'Tragamonedas', 'Regular'),
(24, 'Lucía', 'Pérez', '12345671', 'lucia2@casino.com', '911111112', '2025-08-05', 'Ruleta', 'VIP'),
(25, 'Pedro', 'Ramírez', '12345672', 'pedro3@casino.com', '911111113', '2025-08-05', 'Poker', 'Regular'),
(26, 'Ana', 'Torres', '12345673', 'ana4@casino.com', '911111114', '2025-08-05', 'Blackjack', 'Nuevo'),
(27, 'Luis', 'Fernández', '12345674', 'luis5@casino.com', '911111115', '2025-08-05', 'Ruleta', 'Regular'),
(28, 'María', 'López', '12345675', 'maria6@casino.com', '911111116', '2025-08-05', 'Bingo', 'VIP'),
(29, 'Jorge', 'Díaz', '12345676', 'jorge7@casino.com', '911111117', '2025-08-05', 'Poker', 'Nuevo'),
(30, 'Carmen', 'Sánchez', '12345677', 'carmen8@casino.com', '911111118', '2025-08-05', 'Ruleta', 'VIP'),
(31, 'Alberto', 'Rojas', '12345678', 'alberto9@casino.com', '911111119', '2025-08-05', 'Blackjack', 'Regular'),
(32, 'Sofía', 'Castro', '12345679', 'sofia10@casino.com', '911111120', '2025-08-05', 'Tragamonedas', 'VIP'),
(33, 'Diana', 'Muñoz', '12345680', 'diana11@casino.com', '911111121', '2025-08-05', 'Bingo', 'Regular'),
(34, 'Ricardo', 'Ortiz', '12345681', 'ricardo12@casino.com', '911111122', '2025-08-05', 'Poker', 'VIP'),
(35, 'Paola', 'Silva', '12345682', 'paola13@casino.com', '911111123', '2025-08-05', 'Blackjack', 'Regular'),
(36, 'Miguel', 'Herrera', '12345683', 'miguel14@casino.com', '911111124', '2025-08-05', 'Bingo', 'Nuevo'),
(37, 'Valeria', 'Reyes', '12345684', 'valeria15@casino.com', '911111125', '2025-08-05', 'Ruleta', 'Regular'),
(38, 'Daniel', 'Campos', '12345685', 'daniel16@casino.com', '911111126', '2025-08-05', 'Tragamonedas', 'VIP'),
(39, 'Fernanda', 'Mendoza', '12345686', 'fernanda17@casino.com', '911111127', '2025-08-05', 'Poker', 'Regular'),
(40, 'Oscar', 'Núñez', '12345687', 'oscar18@casino.com', '911111128', '2025-08-05', 'Blackjack', 'Nuevo'),
(41, 'Andrea', 'Cruz', '12345688', 'andrea19@casino.com', '911111129', '2025-08-05', 'Ruleta', 'Nuevo'),
(42, 'Eduardo', 'Morales', '12345689', 'eduardo20@casino.com', '911111130', '2025-08-05', 'Bingo', 'VIP'),
(43, 'Isabel', 'Flores', '12345690', 'isabel21@casino.com', '911111131', '2025-08-05', 'Poker', 'Regular'),
(44, 'Manuel', 'Ramos', '12345691', 'manuel22@casino.com', '911111132', '2025-08-05', 'Blackjack', 'VIP'),
(45, 'Laura', 'Vargas', '12345692', 'laura23@casino.com', '911111133', '2025-08-05', 'Tragamonedas', 'Nuevo'),
(46, 'Héctor', 'Guerrero', '12345693', 'hector24@casino.com', '911111134', '2025-08-05', 'Ruleta', 'VIP'),
(47, 'Natalia', 'Delgado', '12345694', 'natalia25@casino.com', '911111135', '2025-08-05', 'Bingo', 'Regular'),
(48, 'Sebastián', 'Vera', '12345695', 'sebastian26@casino.com', '911111136', '2025-08-05', 'Poker', 'Nuevo'),
(49, 'Camila', 'Peña', '12345696', 'camila27@casino.com', '911111137', '2025-08-05', 'Blackjack', 'Regular'),
(50, 'Andrés', 'Salazar', '12345697', 'andres28@casino.com', '911111138', '2025-08-05', 'Ruleta', 'VIP'),
(51, 'Renata', 'León', '12345698', 'renata29@casino.com', '911111139', '2025-08-05', 'Tragamonedas', 'Nuevo'),
(52, 'Felipe', 'Ibáñez', '12345699', 'felipe30@casino.com', '911111140', '2025-08-05', 'Bingo', 'VIP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `actividad` varchar(255) DEFAULT NULL,
  `gasto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `cliente_id`, `fecha`, `actividad`, `gasto`) VALUES
(1, 2, '2025-07-15 00:00:00', 'consumio en el bar', 150.00),
(2, 14, '2025-12-15 00:00:00', 'Jugo en la ruleta', 300.00),
(3, 21, '2025-05-20 00:00:00', 'bebidas y ruleta', 630.00),
(4, 14, '2225-02-12 00:00:00', 'consumio en el bar', 233.00),
(5, 2, '2025-05-06 00:00:00', 'bebidas y ruleta', 100.00),
(35, 2, '2025-08-01 00:00:00', 'tragamonedas', 35.00),
(36, 14, '2025-08-01 00:00:00', 'ruleta', 45.00),
(37, 20, '2025-08-02 00:00:00', 'blackjack', 50.00),
(38, 21, '2025-08-02 00:00:00', 'poker', 60.00),
(39, 22, '2025-08-03 00:00:00', 'tragamonedas', 25.00),
(40, 23, '2025-08-03 00:00:00', 'bingo', 15.00),
(41, 24, '2025-08-04 00:00:00', 'ruleta', 70.00),
(42, 25, '2025-08-04 00:00:00', 'blackjack', 40.00),
(43, 26, '2025-08-05 00:00:00', 'tragamonedas', 55.00),
(44, 27, '2025-08-05 00:00:00', 'poker', 90.00),
(45, 28, '2025-08-06 00:00:00', 'bingo', 20.00),
(46, 29, '2025-08-06 00:00:00', 'blackjack', 45.00),
(47, 30, '2025-08-07 00:00:00', 'ruleta', 30.00),
(48, 31, '2025-08-07 00:00:00', 'tragamonedas', 75.00),
(49, 32, '2025-08-08 00:00:00', 'poker', 65.00),
(50, 33, '2025-08-08 00:00:00', 'bingo', 10.00),
(51, 34, '2025-08-09 00:00:00', 'blackjack', 55.00),
(52, 35, '2025-08-09 00:00:00', 'ruleta', 35.00),
(53, 36, '2025-08-10 00:00:00', 'tragamonedas', 80.00),
(54, 37, '2025-08-10 00:00:00', 'poker', 60.00),
(55, 38, '2025-08-11 00:00:00', 'bingo', 25.00),
(56, 39, '2025-08-11 00:00:00', 'blackjack', 50.00),
(57, 40, '2025-08-12 00:00:00', 'ruleta', 45.00),
(58, 41, '2025-08-12 00:00:00', 'tragamonedas', 70.00),
(59, 42, '2025-08-13 00:00:00', 'poker', 90.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_contacto`
--

CREATE TABLE `mensajes_contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `cliente_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes_contacto`
--

INSERT INTO `mensajes_contacto` (`id`, `nombre`, `email`, `telefono`, `mensaje`, `fecha`, `cliente_id`, `usuario_id`) VALUES
(2, 'CLAUDIA', 'yaurileonjob@gmail.com', '929331095', 'xd', '2025-07-20 18:05:25', NULL, NULL),
(3, 'Cristian', 'realstorechatgptplus@gmail.com', '9 4960 9925', 'hola', '2025-07-23 01:45:00', NULL, NULL),
(4, 'LUIS ALBERTO', 'sheylarosa56@gmail.com', '956115222', 'Tengo problemas al ingresar un nuevo usuario', '2025-08-06 00:53:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `segmento_objetivo` text DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `titulo`, `descripcion`, `fecha_inicio`, `fecha_fin`, `segmento_objetivo`, `estado`) VALUES
(1, 'Pocker + 500 soles', '100 soles + 3 jugadas en ruleta', '2025-05-08', '2025-05-17', 'Novato', 'Activo'),
(19, 'Tu Primera Apuesta Gratis', 'Te regalamos una ficha de S/20 para que disfrutes la emoción sin riesgo.', '2025-07-15', '2025-07-30', 'Novato', 'Activo'),
(21, 'Bienvenida Dorada', '¡Recibe un bono de S/50 para tu primera visita y 2 bebidas gratis en nuestra zona VIP!', '2025-07-14', '2025-07-20', 'VIP', 'Activo'),
(22, 'Sorteo VIP Agosto', 'Participa en nuestro sorteo mensual exclusivo para clientes VIP.', '2025-08-01', '2025-08-31', 'VIP', 'Activo'),
(23, 'Bono de Bienvenida', 'Recibe un bono al registrarte como nuevo jugador.', '2025-08-01', '2025-08-15', 'Novato', 'Activo'),
(24, 'Doble de puntos lunes', 'Los lunes ganas el doble de puntos jugando tragamonedas.', '2025-08-05', '2025-09-05', 'Regular', 'Activo'),
(25, 'Ruleta Dorada', 'Promoción especial para amantes de la ruleta.', '2025-08-10', '2025-08-20', 'VIP', 'Activo'),
(26, 'Semana del Jugador Frecuente', 'Bonificaciones especiales por fidelidad.', '2025-08-10', '2025-08-17', 'Jugadores frecuentes', 'Activo'),
(27, 'Bingo Night', 'Noche especial de bingo con premios dobles.', '2025-08-12', '2025-08-12', 'Regular', 'Activo'),
(28, 'Cashback Fin de Semana', 'Recibe devolución de pérdidas los fines de semana.', '2025-08-09', '2025-08-11', 'VIP', 'Activo'),
(29, 'Ruleta Relámpago', 'Evento express para jugadores VIP de ruleta.', '2025-08-15', '2025-08-15', 'VIP', 'Activo'),
(30, 'Torneo de Blackjack', 'Compite por el primer lugar en nuestro torneo semanal.', '2025-08-06', '2025-08-13', 'Regular', 'Activo'),
(31, 'Regalo de Cumpleaños', 'Bonificación especial por tu cumpleaños.', '2025-08-01', '2025-08-31', 'VIP', 'Activo'),
(32, 'Premio al Cliente Fiel', 'Reconocimiento especial por visitas continuas.', '2025-08-01', '2025-08-31', 'Jugadores frecuentes', 'Activo'),
(33, 'Recarga con Beneficio', 'Recarga tu cuenta y recibe un 10% adicional.', '2025-08-01', '2025-08-31', 'Regular', 'Activo'),
(34, 'Jueves Explosivos', 'Cada jueves sorpresas y premios instantáneos.', '2025-08-07', '2025-08-28', 'Regular', 'Activo'),
(35, 'Semana Novata', 'Descuentos especiales para jugadores nuevos.', '2025-08-01', '2025-08-07', 'Novato', 'Activo'),
(36, 'Sorteo de Viaje', 'Gana un viaje todo pagado jugando en agosto.', '2025-08-01', '2025-08-31', 'VIP', 'Activo'),
(37, 'Bingo VIP', 'Noche de bingo solo para jugadores VIP.', '2025-08-14', '2025-08-14', 'VIP', 'Activo'),
(38, 'Martes de Tragamonedas', 'Aumenta tus ganancias los martes.', '2025-08-05', '2025-08-26', 'Regular', 'Activo'),
(39, 'Club del Juego', 'Suscríbete al club y obtén beneficios mensuales.', '2025-08-01', '2025-08-31', 'Jugadores frecuentes', 'Activo'),
(40, 'Tarde de Poker', 'Evento semanal de poker con entrada libre.', '2025-08-03', '2025-08-24', 'Regular', 'Activo'),
(41, 'Blackjack Pro', 'Promoción especial para jugadores de blackjack.', '2025-08-10', '2025-08-17', 'VIP', 'Activo'),
(42, 'Descuento Buffet', 'Promoción combinada con nuestro buffet VIP.', '2025-08-01', '2025-08-31', 'VIP', 'Activo'),
(43, 'Juega y Gana Más', 'Promoción para incentivar el juego responsable.', '2025-08-01', '2025-08-31', 'Regular', 'Activo'),
(44, 'Happy Hour', 'Bonificación por juego entre las 5 y 7 p.m.', '2025-08-01', '2025-08-31', 'Jugadores frecuentes', 'Activo'),
(45, 'Madrugadores VIP', 'Bonos para los que juegan entre las 6 y 9 a.m.', '2025-08-01', '2025-08-31', 'VIP', 'Activo'),
(46, 'Viernes de Locura', 'Giros gratis y premios sorpresa.', '2025-08-01', '2025-08-31', 'Regular', 'Activo'),
(47, 'Black Weekend', 'Promoción especial en blackjack durante fines de semana.', '2025-08-02', '2025-08-30', 'VIP', 'Activo'),
(48, 'Juega y Cena Gratis', 'Juega 3 horas y obtén cena gratis.', '2025-08-01', '2025-08-31', 'Jugadores frecuentes', 'Activo'),
(49, 'Desafío Tragamonedas', '¿Puedes ganar 1000 puntos en un día?', '2025-08-01', '2025-08-31', 'Regular', 'Activo'),
(50, 'Promo Amigo', 'Trae a un amigo nuevo y gana fichas gratis.', '2025-08-01', '2025-08-31', 'Novato', 'Activo'),
(51, 'Blackjack Reload', 'Reingreso gratuito para jugadores fieles.', '2025-08-10', '2025-08-20', 'Jugadores frecuentes', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones_clientes`
--

CREATE TABLE `promociones_clientes` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `promocion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promociones_clientes`
--

INSERT INTO `promociones_clientes` (`id`, `cliente_id`, `promocion_id`) VALUES
(14, 21, 21),
(15, 21, 21),
(16, 21, 1),
(17, 2, 19),
(18, 14, 19),
(19, 20, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_atencion`
--

CREATE TABLE `solicitudes_atencion` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'pendiente',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes_atencion`
--

INSERT INTO `solicitudes_atencion` (`id`, `cliente_id`, `tipo`, `descripcion`, `estado`, `fecha_creacion`) VALUES
(1, 2, 'duda', 'como se juega el casino ', 'resuelto', '2025-05-07 22:19:28'),
(2, 2, 'duda', 'como se juega el casino ', 'en proceso', '2025-05-07 22:23:14'),
(20, 21, 'sugerencia', 'Estaria bien si gano en todo?', 'pendiente', '2025-07-20 20:22:40'),
(21, 2, 'Consulta', 'Consulta sobre beneficios de membresía VIP.', 'Pendiente', '2025-08-01 05:00:00'),
(22, 14, 'Reclamo', 'Máquina tragamonedas se detuvo inesperadamente.', 'Resuelto', '2025-08-01 05:00:00'),
(23, 20, 'Sugerencia', 'Agregar más variedad de bebidas en el bar.', 'Pendiente', '2025-08-02 05:00:00'),
(24, 21, 'Consulta', 'Horario de shows en vivo del casino.', 'En proceso', '2025-08-02 05:00:00'),
(25, 22, 'Reclamo', 'Ruido excesivo en área de descanso.', 'Resuelto', '2025-08-03 05:00:00'),
(26, 23, 'Sugerencia', 'Implementar zona para fumadores.', 'Pendiente', '2025-08-03 05:00:00'),
(27, 24, 'Consulta', 'Descuento para miembros frecuentes.', 'En proceso', '2025-08-04 05:00:00'),
(28, 25, 'Reclamo', 'Problemas con la tarjeta de puntos.', 'Pendiente', '2025-08-04 05:00:00'),
(29, 26, 'Sugerencia', 'Agregar más juegos de cartas.', 'Resuelto', '2025-08-05 05:00:00'),
(30, 27, 'Consulta', 'Dudas sobre el historial de jugadas.', 'En proceso', '2025-08-05 05:00:00'),
(31, 28, 'Reclamo', 'Atención deficiente en recepción.', 'Pendiente', '2025-08-06 05:00:00'),
(32, 29, 'Sugerencia', 'Más promociones para novatos.', 'Resuelto', '2025-08-06 05:00:00'),
(33, 30, 'Consulta', '¿Cómo canjear puntos acumulados?', 'Pendiente', '2025-08-07 05:00:00'),
(34, 31, 'Reclamo', 'No recibió correo de confirmación.', 'Resuelto', '2025-08-07 05:00:00'),
(35, 32, 'Sugerencia', 'Agregar música en vivo en sala VIP.', 'Pendiente', '2025-08-08 05:00:00'),
(36, 33, 'Consulta', 'Duración de promociones activas.', 'En proceso', '2025-08-08 05:00:00'),
(37, 34, 'Reclamo', 'Problema con retiro de premios.', 'Pendiente', '2025-08-09 05:00:00'),
(38, 35, 'Sugerencia', 'Instalar más pantallas interactivas.', 'Resuelto', '2025-08-09 05:00:00'),
(39, 36, 'Consulta', 'Disponibilidad de estacionamiento.', 'Pendiente', '2025-08-10 05:00:00'),
(40, 37, 'Reclamo', 'Error en historial de apuestas.', 'En proceso', '2025-08-10 05:00:00'),
(41, 38, 'Sugerencia', 'Ofrecer snacks gratuitos.', 'Pendiente', '2025-08-11 05:00:00'),
(42, 39, 'Consulta', 'Información sobre torneos.', 'Resuelto', '2025-08-11 05:00:00'),
(43, 40, 'Reclamo', 'Demora en atención al cliente.', 'Pendiente', '2025-08-12 05:00:00'),
(44, 41, 'Sugerencia', 'Crear app móvil del casino.', 'En proceso', '2025-08-12 05:00:00'),
(45, 42, 'Consulta', 'Cambio de datos personales.', 'Pendiente', '2025-08-13 05:00:00'),
(46, 2, 'Reclamo', 'Datos erróneos en la boleta.', 'Resuelto', '2025-08-13 05:00:00'),
(47, 14, 'Sugerencia', 'Incluir juegos temáticos mensuales.', 'Pendiente', '2025-08-14 05:00:00'),
(48, 20, 'Consulta', '¿Cómo ingresar al salón VIP?', 'En proceso', '2025-08-14 05:00:00'),
(49, 21, 'Reclamo', 'Se cerró sesión automáticamente.', 'Pendiente', '2025-08-15 05:00:00'),
(50, 22, 'Sugerencia', 'Agregar premios sorpresa diarios.', 'Resuelto', '2025-08-15 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `gasto` decimal(10,2) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id`, `cliente_id`, `tipo`, `gasto`, `fecha`) VALUES
(1, 2, 'apuesta', 2500.00, '2025-07-21 02:18:24'),
(3, 48, 'apuesta', 652.00, '2025-08-06 06:05:45'),
(93, 14, 'Tragamonedas', 35.00, '2025-08-01 05:00:00'),
(94, 20, 'Blackjack', 50.00, '2025-08-02 05:00:00'),
(95, 21, 'Poker', 60.00, '2025-08-02 05:00:00'),
(96, 22, 'Ruleta', 45.00, '2025-08-03 05:00:00'),
(97, 23, 'Bingo', 20.00, '2025-08-03 05:00:00'),
(98, 24, 'Tragamonedas', 30.00, '2025-08-04 05:00:00'),
(99, 25, 'Poker', 80.00, '2025-08-04 05:00:00'),
(100, 26, 'Blackjack', 25.00, '2025-08-05 05:00:00'),
(101, 27, 'Ruleta', 55.00, '2025-08-05 05:00:00'),
(102, 28, 'Bingo', 15.00, '2025-08-06 05:00:00'),
(103, 29, 'Tragamonedas', 70.00, '2025-08-06 05:00:00'),
(104, 30, 'Poker', 65.00, '2025-08-07 05:00:00'),
(105, 31, 'Blackjack', 40.00, '2025-08-07 05:00:00'),
(106, 32, 'Ruleta', 35.00, '2025-08-08 05:00:00'),
(107, 33, 'Bingo', 10.00, '2025-08-08 05:00:00'),
(108, 34, 'Tragamonedas', 60.00, '2025-08-09 05:00:00'),
(109, 35, 'Poker', 90.00, '2025-08-09 05:00:00'),
(110, 36, 'Blackjack', 50.00, '2025-08-10 05:00:00'),
(111, 37, 'Ruleta', 70.00, '2025-08-10 05:00:00'),
(112, 38, 'Bingo', 25.00, '2025-08-11 05:00:00'),
(113, 39, 'Tragamonedas', 55.00, '2025-08-11 05:00:00'),
(114, 40, 'Poker', 100.00, '2025-08-12 05:00:00'),
(115, 41, 'Blackjack', 45.00, '2025-08-12 05:00:00'),
(116, 42, 'Ruleta', 30.00, '2025-08-13 05:00:00'),
(117, 14, 'Bingo', 20.00, '2025-08-13 05:00:00'),
(118, 20, 'Tragamonedas', 75.00, '2025-08-14 05:00:00'),
(119, 21, 'Poker', 85.00, '2025-08-14 05:00:00'),
(120, 22, 'Blackjack', 55.00, '2025-08-15 05:00:00'),
(121, 23, 'Ruleta', 40.00, '2025-08-15 05:00:00'),
(122, 24, 'Bingo', 35.00, '2025-08-16 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`) VALUES
(1, 'yauri', '$2y$10$XI.lZ9RpGiqJROPJaQhGEOPmiq3sxH67OXY.cddJn6tUM0/URIlL.'),
(2, 'admin', '$2y$10$39hx0ctB0N71Zuf1kGZW7.0dVk2AzyxNGzAEp5U3qR1jsOGJZhUx2'),
(3, 'user', '$2y$10$Bl9ZZcfSzqUuLsvw9lSFced1f/NZez7jxBkF9GrPKFqCMMLle8iLi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mensaje_cliente` (`cliente_id`),
  ADD KEY `fk_mensajes_contacto_usuario` (`usuario_id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promociones_clientes`
--
ALTER TABLE `promociones_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `promocion_id` (`promocion_id`);

--
-- Indices de la tabla `solicitudes_atencion`
--
ALTER TABLE `solicitudes_atencion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `promociones_clientes`
--
ALTER TABLE `promociones_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `solicitudes_atencion`
--
ALTER TABLE `solicitudes_atencion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  ADD CONSTRAINT `fk_mensaje_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_mensajes_contacto_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `promociones_clientes`
--
ALTER TABLE `promociones_clientes`
  ADD CONSTRAINT `promociones_clientes_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `promociones_clientes_ibfk_2` FOREIGN KEY (`promocion_id`) REFERENCES `promociones` (`id`);

--
-- Filtros para la tabla `solicitudes_atencion`
--
ALTER TABLE `solicitudes_atencion`
  ADD CONSTRAINT `solicitudes_atencion_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `transacciones_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
