CREATE DATABASE mario_barber;

use mario_barber;

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS 'usuarios' (
  'id' int(10) NOT NULL,
  'nombre_completo' varchar(50) NOT NULL,
  'correo' varchar(75) NOT NULL,
  'usuario' int(25) NOT NULL,
  'contrasena' varchar(255) NOT NULL,
  'rol' varchar(20) NOT NULL,
  PRIMARY KEY ('id'),
  UNIQUE KEY ('usuario')
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;