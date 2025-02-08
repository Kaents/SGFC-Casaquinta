-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2024 a las 19:41:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fichasmedicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `custom_users`
--

CREATE TABLE `custom_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `specialty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `custom_users`
--

INSERT INTO `custom_users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `specialty`) VALUES
(14, 'test', 'test@test.cl', '994769271', NULL, '$2y$12$zsSQ5cS2poBuLwzn5o9vN.faxHMyws2rsLzIFpzRkBp5quRZqvflS', NULL, '2024-09-02 23:36:22', '2024-09-02 23:36:22', 'admin', NULL),
(30, 'Ana Pérez', 'ana.perez@example.com', '+56 9 1234 5678', NULL, '$2y$12$jtNiR7/PcIkP6Dek6JVlU.BgY5.vNczKFJ2aSaGTg5hSwMzoh1FMy', NULL, NULL, NULL, 'doctor', 'Fonoaudiólogo'),
(31, 'Carlos López', 'carlos.lopez@example.com', '+56 9 8765 4321', NULL, '$2y$12$p4Obnnp3tG0owLIbHV8MmOHOgGcrkC6sqaG21Fyrnaa6TrY3kqt0a', NULL, NULL, NULL, 'doctor', 'Psicólogo'),
(32, 'Sofía Martínez', 'sofia.martinez@example.com', '+56 9 4567 8910', NULL, '$2y$12$i.nyyZQLmUZCjRQQFt1LLuLsleQ71Qw3/BaDII2ilGta3mw0izrp6', NULL, NULL, NULL, 'doctor', 'Acupunturista'),
(33, 'Juan Rojas', 'juan.rojas@example.com', '+56 9 2345 6789', NULL, '$2y$12$g0rYXjtqtresHIS2BvQRC.LDeKAgaUmsEGIDrmSVsB90W3bV1t5.a', NULL, NULL, NULL, 'doctor', 'Psicopedagogo'),
(34, 'María Fernández', 'maria.fernandez@example.com', '+56 9 9876 5432', NULL, '$2y$12$DG4far3KZC/fp1J2TZ8f3uicTJXMDYTIknLbY5PtcFwb/ZjuIhbzm', NULL, NULL, NULL, 'doctor', 'Terapeuta Floral'),
(35, 'Pedro Morales', 'pedro.morales@example.com', '+56 9 7654 3210', NULL, '$2y$12$MJTAAZ4kL6gtBunp.V.6RuUwI9CuJ1KnEWhk8HfeseyWO617DiUH.', NULL, NULL, NULL, 'doctor', 'Terapeuta Ocupacional'),
(43, 'Manuel González', 'manuel.gonzalez@example.com', '+56 9 4567 8910', NULL, '$2y$12$bTktVj4t4vlPdDQviNXHeOZGab.Y6WE2hJ5jCkhgX.XFYTh0NzJyq', NULL, NULL, NULL, 'doctor', 'Cardiologo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `specialty`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'doctor uno', 'doctoruno@gmail.com', 'especialidad uno', '32459786345786', '2024-08-31 17:24:53', '2024-08-31 17:24:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medical_records`
--

CREATE TABLE `medical_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` text DEFAULT NULL,
  `activity` text DEFAULT NULL,
  `observation` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `attachments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attachments`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medical_records`
--

INSERT INTO `medical_records` (`id`, `patient_id`, `doctor_id`, `attachment`, `date`, `created_at`, `updated_at`, `content`, `activity`, `observation`, `comments`, `attachments`) VALUES
(43, 11, 30, '[]', '2024-09-05', '2024-11-14 17:37:54', '2024-11-14 17:37:54', 'Evaluación inicial de habilidades lingüísticas.', 'Pruebas de reconocimiento de sonidos.', 'Dificultad en sonidos complejos; recomendación de ejercicios auditivos.', NULL, NULL),
(44, 11, 30, '[]', '2024-09-12', '2024-11-14 17:38:19', '2024-11-14 17:38:19', 'Ejercicios de pronunciación de sílabas complejas.', 'Repetición guiada.', 'Mejoría en precisión al repetir sonidos.', NULL, NULL),
(45, 12, 30, '[]', '2024-09-06', '2024-11-14 17:39:15', '2024-11-14 17:39:15', 'Evaluación de comprensión auditiva.', 'Ejercicios de escucha de palabras.', 'Necesita pausas más frecuentes.', NULL, NULL),
(46, 12, 30, '[]', '2024-09-13', '2024-11-14 17:39:36', '2024-11-14 17:39:36', 'Mejora de comprensión de instrucciones.', 'Ejercicios de seguimiento de instrucciones.', 'Aumento en la precisión al seguir instrucciones.', NULL, NULL),
(47, 13, 30, '[]', '2024-09-07', '2024-11-14 17:42:06', '2024-11-14 17:42:06', 'Evaluación del habla espontánea.', 'Conversación guiada.', 'Pausas largas al hablar; ejercicios de fluidez recomendados.', NULL, NULL),
(48, 13, 30, '[]', '2024-09-14', '2024-11-14 17:42:29', '2024-11-14 17:42:29', 'Practica de articulación de palabras largas.', 'Lectura de frases largas.', 'Mejor fluidez; aún se observan pausas.', NULL, NULL),
(49, 14, 30, '[]', '2024-09-08', '2024-11-14 17:43:01', '2024-11-14 17:43:01', 'Evaluación de pronunciación en contextos.', 'Descripción de imágenes.', 'Dificultad al describir detalles; se sugiere práctica adicional.', NULL, NULL),
(50, 14, 30, '[]', '2024-09-15', '2024-11-14 17:43:23', '2024-11-14 17:43:23', 'Ejercicio de vocalización de frases comunes.', 'Repetición de frases.', 'Incremento en la claridad de la pronunciación.', NULL, NULL),
(51, 16, 31, '[]', '2024-09-03', '2024-11-14 17:58:36', '2024-11-14 17:58:36', 'Evaluación de factores de estrés laboral.', 'Discusión sobre el entorno de trabajo.', 'Reporta alta presión; se plantean estrategias de manejo del estrés.', NULL, NULL),
(52, 16, 31, '[]', '2024-09-10', '2024-11-14 17:59:09', '2024-11-14 17:59:09', 'Técnicas de relajación.', 'Entrenamiento en respiración profunda.', 'Nota leve reducción de ansiedad en el trabajo.', NULL, NULL),
(53, 19, 31, '[]', '2024-09-02', '2024-11-14 17:59:59', '2024-11-14 17:59:59', 'Evaluación inicial del estado emocional.', 'Conversación exploratoria sobre emociones y relaciones.', 'Expresa ansiedad en situaciones sociales; se sugiere terapia cognitivo-conductual.', NULL, NULL),
(54, 19, 31, '[]', '2024-09-09', '2024-11-14 18:00:28', '2024-11-14 18:00:28', 'Identificación de pensamientos negativos.', 'Registro de pensamientos.', 'Toma conciencia de patrones de pensamiento autocrítico.', NULL, NULL),
(55, 18, 31, '[]', '2024-09-04', '2024-11-14 18:02:20', '2024-11-14 18:02:20', 'Evaluación de síntomas depresivos.', 'Cuestionario de autoevaluación.', 'Indica estado de ánimo bajo; se propone seguimiento semanal.', NULL, NULL),
(56, 18, 31, '[]', '2024-09-11', '2024-11-14 18:02:44', '2024-11-14 18:02:44', 'Técnicas de reestructuración cognitiva.', 'Identificación de pensamientos negativos.', 'Paciente percibe algunos pensamientos negativos automáticos.', NULL, NULL),
(57, 21, 31, '[]', '2024-09-06', '2024-11-14 18:03:21', '2024-11-14 18:03:21', 'Evaluación de autoestima.', 'Escala de valoración personal.', 'Paciente presenta baja autoestima; se planea trabajar en autoimagen.', NULL, NULL),
(58, 21, 31, '[]', '2024-09-13', '2024-11-14 18:03:43', '2024-11-14 18:03:43', 'Ejercicios de autovaloración.', 'Lista de cualidades personales.', 'Mejora en la autopercepción; más receptiva a autoafirmaciones.', NULL, NULL),
(59, 20, 31, '[]', '2024-09-07', '2024-11-14 18:04:18', '2024-11-14 18:04:18', 'Evaluación de patrones de sueño.', 'Registro de hábitos de sueño.', 'Paciente reporta insomnio; se sugiere higiene del sueño.', NULL, NULL),
(60, 20, 31, '[]', '2024-09-14', '2024-11-14 18:04:41', '2024-11-14 18:04:41', 'Introducción a la higiene del sueño.', 'Establecimiento de una rutina nocturna.', 'Reporta leve mejora en el inicio del sueño.', NULL, NULL),
(61, 21, 32, '[]', '2024-09-03', '2024-11-14 18:06:30', '2024-11-14 18:06:30', 'Tratamiento para aliviar estrés crónico.', 'Inserción de agujas en puntos de relajación en cabeza y cuello.', 'Paciente reporta relajación significativa y reducción de la tensión.', NULL, NULL),
(62, 15, 32, '[]', '2024-09-05', '2024-11-14 18:07:20', '2024-11-14 18:07:20', 'Alivio de dolor en zona lumbar.', 'Aplicación de agujas en puntos de meridiano de la columna.', 'Disminución del dolor; se sugiere seguir con terapia de seguimiento.', NULL, NULL),
(63, 23, 33, '\"[]\"', '2024-09-02', '2024-11-14 18:14:57', '2024-11-14 18:15:52', 'Evaluación de comprensión lectora.', 'Lectura y análisis de un texto corto.', 'Dificultad para identificar ideas principales; se recomienda reforzar técnicas de comprensión.', NULL, NULL),
(64, 23, 33, '\"[]\"', '2024-09-09', '2024-11-14 18:15:22', '2024-11-14 18:16:31', 'Mejora de comprensión lectoras.', 'Ejercicios de subrayado y resumen.', 'Mejora leve en identificación de ideas.', NULL, NULL),
(65, 20, 33, '\"\\\"[]\\\"\"', '2024-09-02', '2024-11-14 18:18:48', '2024-11-14 18:19:52', 'Evaluación de comprensión lectora.', 'Lectura y análisis de un texto corto.', 'Dificultad para identificar ideas principales; se recomienda reforzar técnicas de comprensión.', NULL, NULL),
(66, 20, 33, '[]', '2024-09-09', '2024-11-14 18:19:09', '2024-11-14 18:19:09', 'Mejora de comprensión lectora.', 'Ejercicios de subrayado y resumen.', 'Mejora leve en identificación de ideas.', NULL, NULL),
(67, 21, 33, '[]', '2024-10-03', '2024-11-14 18:21:48', '2024-11-14 18:21:48', 'Evaluación de habilidades matemáticas básicas.', 'Ejercicios de sumas y restas con material manipulativo.', 'Dificultad en operaciones; se planifican sesiones de apoyo.', NULL, NULL),
(68, 21, 33, '[]', '2024-09-10', '2024-11-14 18:22:10', '2024-11-14 18:22:10', 'Refuerzo de operaciones básicas.', 'Juegos de operaciones con bloques.', 'Mayor precisión en sumas; sigue con problemas en restas.', NULL, NULL),
(69, 22, 33, '[]', '2024-06-04', '2024-11-14 18:23:19', '2024-11-14 18:23:19', 'Evaluación de habilidades de escritura.', 'Redacción de oraciones simples.', 'Presenta dificultad en coherencia de oraciones.', NULL, NULL),
(70, 22, 33, '[]', '2024-06-11', '2024-11-14 18:23:45', '2024-11-14 18:23:45', 'Ejercicio de construcción de oraciones.', 'Redacción de historias cortas guiadas.', 'Progreso en estructura de oraciones.', NULL, NULL),
(71, 23, 33, '[]', '2024-09-15', '2024-11-14 18:24:32', '2024-11-14 18:24:32', 'Evaluación de concentración.', 'Actividades de atención visual.', 'Distracción frecuente; se sugieren técnicas de enfoque.', NULL, NULL),
(72, 23, 33, '[]', '2024-09-12', '2024-11-14 18:25:09', '2024-11-14 18:25:09', 'Ejercicios de mejora de concentración.', 'Juegos de atención y memoria.', 'Mejor resistencia a la distracción.', NULL, NULL),
(73, 23, 34, '[]', '2024-11-06', '2024-11-14 18:45:13', '2024-11-14 18:45:13', 'Evaluación emocional y energética.', 'Aplicación de esencias florales para equilibrar emociones relacionadas con la ansiedad.', 'Paciente muestra señales de calma tras la aplicación, sin efectos secundarios.', NULL, NULL),
(74, 20, 34, '[]', '2024-11-07', '2024-11-14 18:45:53', '2024-11-14 18:45:53', 'Tratamiento para estrés y agotamiento.', 'Terapia floral utilizando esencias de flores relajantes.', 'El paciente reporta una leve sensación de alivio y relajación después de la sesión.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_28_010431_add_role_to_users_table', 2),
(6, '2024_08_30_015311_create_patients_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `education_level` varchar(255) DEFAULT NULL,
  `evaluation_date` date DEFAULT NULL,
  `therapy_start_date` date DEFAULT NULL,
  `first_progress_date` date DEFAULT NULL,
  `professional` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `phone`, `birth_date`, `age`, `education_level`, `evaluation_date`, `therapy_start_date`, `first_progress_date`, `professional`, `gender`, `address`, `created_at`, `updated_at`) VALUES
(11, 'Camila Constanza González Osses', 'camila.gonzalez@example.com', '+56 9 1123 4567', '2005-03-15', NULL, 'Superior', '2024-05-01', '2024-05-10', NULL, NULL, NULL, NULL, '2024-11-14 19:00:00', '2024-11-15 20:53:19'),
(12, 'Ricardo Pérez', 'ricardo.perez@example.com', '+56 9 2234 5678', '1985-09-22', NULL, 'Doctorado', '2021-05-02', '2021-05-12', NULL, NULL, NULL, NULL, '2024-11-14 19:01:43', '2024-11-14 20:44:04'),
(13, 'Teresa Araya', 'teresa.araya@example.com', '+56 9 3345 6789', '1998-12-05', NULL, 'Superior', '2023-07-12', '2023-07-23', NULL, NULL, NULL, NULL, '2024-11-14 19:02:41', '2024-11-14 20:44:14'),
(14, 'Felipe Morales', 'felipe.morales@example.com', '+56 9 4456 7890', '2010-07-18', NULL, 'Básica', '2024-03-15', '2024-03-23', NULL, NULL, NULL, NULL, '2024-11-14 19:04:07', '2024-11-14 20:43:45'),
(15, 'Valeria Castillo', 'valeria.castillo@example.com', '+56 9 5567 8901', '2001-10-29', NULL, 'Superior', '2022-05-20', '2022-05-30', NULL, NULL, NULL, NULL, '2024-11-14 19:06:29', '2024-11-14 20:44:30'),
(16, 'Mario Espinoza', 'mario.espinoza@example.com', '+56 9 6678 9012', '1992-11-12', NULL, 'Superior', '2024-06-06', '2024-05-21', NULL, NULL, NULL, NULL, '2024-11-14 19:12:43', '2024-11-14 19:14:08'),
(17, 'Daniela Romero', 'daniela.romero@example.com', '+56 9 7789 0123', '1988-01-30', NULL, 'Licenciatura', '2020-08-07', '2020-08-23', NULL, NULL, NULL, NULL, '2024-11-14 19:15:22', '2024-11-14 19:15:31'),
(18, 'Tomás Figueroa', 'tomas.figueroa@example.com', '+56 9 8890 1234', '2013-06-21', NULL, 'Básica', '2024-05-08', '2024-05-25', NULL, NULL, NULL, NULL, '2024-11-14 19:17:39', '2024-11-14 19:18:41'),
(19, 'Laura Vergara', 'laura.vergara@example.com', '+56 9 9901 2345', '1995-02-09', NULL, 'Superior', '2024-09-09', '2024-09-27', NULL, NULL, NULL, NULL, '2024-11-14 19:18:32', '2024-11-14 19:18:47'),
(20, 'Gabriel Soto', 'gabriel.soto@example.com', '+56 9 1012 3456', '2008-08-14', NULL, 'Media', '2024-06-10', '2024-06-29', NULL, NULL, NULL, NULL, '2024-11-14 19:27:29', '2024-11-14 20:45:00'),
(21, 'Fernanda González', 'fernanda.gonzalez@example.com', '+56 9 3456 7890', '1997-05-10', NULL, 'Superior', '2023-11-11', '2023-11-30', NULL, NULL, NULL, NULL, '2024-11-14 19:37:01', '2024-11-14 19:37:10'),
(22, 'Felipe Castillo', 'felipe.castillo@example.com', '+56 9 4567 8901', '2002-11-20', NULL, 'Superior', '2024-05-12', '2024-05-31', NULL, NULL, NULL, NULL, '2024-11-14 19:38:29', '2024-11-14 19:38:38'),
(23, 'Camila Arriagada', 'camila.arriagada@example.com', '+56 9 8535 7431', '1995-09-13', NULL, 'Superior', '2024-02-01', '2024-02-11', NULL, NULL, NULL, NULL, '2024-11-14 21:08:59', '2024-11-14 21:09:08'),
(25, 'Adrea Muñoz', 'andrea.munoz@example.com', '+56 9 4567 1234', '1990-03-15', NULL, 'Superior', '2024-10-05', '2024-10-05', NULL, NULL, NULL, NULL, '2024-11-15 20:51:02', '2024-11-15 20:51:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JusIXo5cdFG5Pb9SrOHsMD9NPQnj218ryir2WHDx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVUxUHlEZlltQzVQeUV1YVRJdnl1Yzl1aElPNVlvNEVpOExVeG1EYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1732068207),
('zdiUMsVUogMHfpRh189Py00dX6rKKT6jk079Ii8P', 14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYnBKTnBGOHhQUzlleVh5YUUwSjBvYkM3YUhENHBKVzNXRERzY09wcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZWRpY2FsX3JlY29yZHMvOTciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTQ7fQ==', 1731909902);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `specialties`
--

INSERT INTO `specialties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fonoaudiólogo', '2024-11-15 20:08:02', '2024-11-15 20:08:02'),
(2, 'Acupunturista', '2024-11-15 20:08:02', '2024-11-15 20:08:02'),
(3, 'Terapeuta Floral', '2024-11-15 20:08:02', '2024-11-15 20:08:02'),
(4, 'Terapeuta Ocupacional', '2024-11-15 20:08:02', '2024-11-15 20:08:02'),
(5, 'Psicólogo', '2024-11-15 20:08:02', '2024-11-15 20:08:02'),
(6, 'Psicopedagogo', '2024-11-15 20:08:02', '2024-11-15 20:08:02'),
(10, 'Cardiologo', '2024-11-17 04:26:07', '2024-11-17 04:31:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `custom_users`
--
ALTER TABLE `custom_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_patient` (`patient_id`),
  ADD KEY `fk_doctor` (`doctor_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `custom_users`
--
ALTER TABLE `custom_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `fk_doctor` FOREIGN KEY (`doctor_id`) REFERENCES `custom_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
