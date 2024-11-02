-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2024 a las 17:17:54
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
-- Base de datos: `sistema_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `id_plan` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `dni`, `fecha_nacimiento`, `direccion`, `telefono`, `email`, `fecha_inscripcion`, `id_plan`, `estado`) VALUES
(1, 'Juan', 'Pérez', '12345678', '1990-05-14', 'Calle Falsa 123', '1111111111', 'juan.perez@example.com', '2023-01-10', 1, 1),
(2, 'María', 'Gómez', '87654321', '1985-02-20', 'Avenida Siempre Viva 742', '2222222222', 'maria.gomez@example.com', '2023-01-12', 2, 1),
(3, 'Carlos', 'López', '23456789', '1992-07-30', 'Calle 45', '3333333333', 'carlos.lopez@example.com', '2023-02-01', 1, 0),
(4, 'Laura', 'Martínez', '98765432', '1988-11-22', 'Boulevard de los Sueños 456', '4444444444', 'laura.martinez@example.com', '2023-02-15', 3, 1),
(5, 'Javier', 'Hernández', '34567890', '1995-03-03', 'Calle de la Amargura 789', '5555555555', 'javier.hernandez@example.com', '2023-03-05', 2, 0),
(6, 'Ana', 'Fernández', '65432109', '1991-08-14', 'Plaza del Sol 101', '6666666666', 'ana.fernandez@example.com', '2023-03-20', 1, 1),
(7, 'Luis', 'Ramírez', '45678901', '1993-12-01', 'Avenida del Río 202', '7777777777', 'luis.ramirez@example.com', '2023-04-02', 3, 1),
(8, 'Sofía', 'Torres', '78901234', '1994-10-10', 'Calle de la Libertad 303', '8888888888', 'sofia.torres@example.com', '2023-04-15', 1, 0),
(9, 'Diego', 'Díaz', '89012345', '1989-09-09', 'Avenida de la Paz 404', '9999999999', 'diego.diaz@example.com', '2023-05-10', 2, 1),
(10, 'Lucía', 'Morales', '01234567', '1996-06-25', 'Calle de los Héroes 505', '1010101010', 'lucia.morales@example.com', '2023-05-20', 3, 1),
(11, 'Mateo', 'Gutiérrez', '23450987', '1997-04-18', 'Avenida de la Esperanza 606', '2020202020', 'mateo.gutierrez@example.com', '2023-06-01', 1, 1),
(12, 'Valentina', 'Castillo', '34561234', '1990-01-01', 'Calle de la Unión 707', '3030303030', 'valentina.castillo@example.com', '2023-06-15', 2, 1),
(13, 'Nicolás', 'Cruz', '45672345', '1995-05-05', 'Avenida de la Concordia 808', '4040404040', 'nicolas.cruz@example.com', '2023-07-10', 3, 0),
(14, 'Isabella', 'Mendoza', '56783456', '1987-11-30', 'Calle de la Amistad 909', '5050505050', 'isabella.mendoza@example.com', '2023-07-20', 1, 1),
(15, 'Fernando', 'Rojas', '67894567', '1982-03-15', 'Calle del Progreso 1010', '6060606060', 'fernando.rojas@example.com', '2023-08-05', 2, 1),
(16, 'Camila', 'Jiménez', '78905678', '1993-12-12', 'Avenida de la Libertad 1111', '7070707070', 'camila.jimenez@example.com', '2023-08-25', 1, 1),
(17, 'Emilio', 'Salazar', '89016789', '1988-02-20', 'Calle de la Verdad 1212', '8080808080', 'emilio.salazar@example.com', '2023-09-15', 2, 0),
(18, 'Paula', 'Vargas', '90127890', '1991-07-07', 'Avenida del Trabajo 1313', '9090909090', 'paula.vargas@example.com', '2023-09-30', 3, 1),
(19, 'Joaquín', 'Paniagua', '01238901', '1990-10-05', 'Calle de la Cultura 1414', '1010101010', 'joaquin.paniagua@example.com', '2023-10-12', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `id_entrenador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrenadores`
--

INSERT INTO `entrenadores` (`id_entrenador`, `nombre`, `apellido`, `dni`, `telefono`, `email`, `id_especialidad`, `fecha_contratacion`, `estado`) VALUES
(1, 'Juan', 'Pérez', '12345678A', '555-1234', 'juan.perez@example.com', 1, '2023-01-15', 1),
(2, 'María', 'Gómez', '23456789B', '555-5678', 'maria.gomez@example.com', 2, '2022-03-22', 1),
(3, 'Carlos', 'López', '34567890C', '555-8765', 'carlos.lopez@example.com', 1, '2024-04-01', 1),
(4, 'Laura', 'Martínez', '45678901D', '555-4321', 'laura.martinez@example.com', 3, '2023-07-11', 1),
(5, 'Diego', 'Sánchez', '56789012E', '555-9876', 'diego.sanchez@example.com', 2, '2022-09-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_entrenador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `nombre`, `id_entrenador`) VALUES
(1, 0, 1),
(2, 0, 2),
(3, 0, 3),
(4, 0, 4),
(5, 0, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto` decimal(11,2) NOT NULL,
  `metodo_pago` varchar(45) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id_plan` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `duracion` int(11) NOT NULL,
  `cantidad_sesiones` int(11) NOT NULL,
  `id_entrenador` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id_plan`, `codigo`, `nombre`, `descripcion`, `duracion`, `cantidad_sesiones`, `id_entrenador`, `estado`) VALUES
(1, 1, 'Musculación básica', 'Entrenamiento orientado a la ganancia de masa muscular.', 8, 3, 1, 1),
(2, 2, 'Cardio avanzado', 'Plan de entrenamiento cardiovascular para mejorar resistencia.', 6, 4, 2, 1),
(3, 3, 'Entrenamiento funcional', 'Programa de ejercicios que mejora la fuerza funcional.', 10, 2, 3, 1),
(4, 4, 'Yoga para principiantes', 'Introducción a las posturas y técnicas de respiración del yoga.', 5, 1, 4, 1),
(5, 5, 'HIIT para quemar grasa', 'Entrenamiento de intervalos de alta intensidad para la pérdida de peso.', 4, 5, 5, 1),
(6, 0, 'luca', 'pepepep', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `password`, `nombre`, `estado`) VALUES
(2, 'lucas@gmail.com', '$2a$07$tawfdgyaufiusdgopfhgjuW2Wp/lBA.pXiclG4DR9icxU6YiJQ0H.', 'Usuario Ejemplo', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `cliente_plan` (`id_plan`);

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`id_entrenador`),
  ADD KEY `entrenador_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `pago_cliente` (`id_cliente`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  MODIFY `id_entrenador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `cliente_plan` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id_plan`);

--
-- Filtros para la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD CONSTRAINT `entrenador_especialidad` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pago_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
