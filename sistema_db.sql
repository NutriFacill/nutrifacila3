-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 19-Jun-2025 às 12:18
-- Versão do servidor: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `senha`) VALUES
(1, 'admin@admin.com', '7f861bcee185de001377d79e08af62e94b1e7718e2470e08520c917f8d953602');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimentos`
--

CREATE TABLE `alimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `calorias` float NOT NULL,
  `dieta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alimentos`
--

INSERT INTO `alimentos` (`id`, `nome`, `calorias`, `dieta_id`) VALUES
(1, 'Azeite de oliva', 347, 1),
(2, 'Salmão', 77, 1),
(3, 'Atum', 32, 1),
(4, 'Tomate', 399, 1),
(5, 'Queijo feta', 160, 1),
(6, 'Grão-de-bico', 145, 1),
(7, 'Berinjela', 134, 1),
(8, 'Abobrinha', 91, 1),
(9, 'Azeitonas', 397, 1),
(10, 'Pão integral', 72, 1),
(11, 'Eum', 376, 1),
(12, 'Beatae', 409, 1),
(13, 'Cupiditate', 486, 1),
(14, 'In', 309, 1),
(15, 'Ea', 74, 1),
(16, 'Quos', 332, 1),
(17, 'Debitis', 246, 1),
(18, 'Aperiam', 46, 1),
(19, 'Facilis', 45, 1),
(20, 'Illo', 77, 1),
(21, 'Incidunt', 141, 1),
(22, 'Neque', 149, 1),
(23, 'Ad', 288, 1),
(24, 'Nihil', 338, 1),
(25, 'Facere', 43, 1),
(26, 'Repellendus', 317, 1),
(27, 'Cum', 131, 1),
(28, 'Necessitatibus', 396, 1),
(29, 'Nostrum', 362, 1),
(30, 'Placeat', 389, 1),
(31, 'Officiis', 309, 1),
(32, 'Id', 244, 1),
(33, 'At', 142, 1),
(34, 'Deserunt', 259, 1),
(35, 'Eaque', 331, 1),
(36, 'Dicta', 172, 1),
(37, 'Eius', 444, 1),
(38, 'Nemo', 475, 1),
(39, 'Ratione', 33, 1),
(40, 'Aliquid', 418, 1),
(41, 'Odit', 442, 1),
(42, 'Unde', 111, 1),
(43, 'Dolores', 387, 1),
(44, 'Consequatur', 246, 1),
(45, 'Voluptas', 204, 1),
(46, 'Nulla', 172, 1),
(47, 'Fugit', 109, 1),
(48, 'Tenetur', 140, 1),
(49, 'Ex', 420, 1),
(50, 'Deleniti', 202, 1),
(51, 'Atque', 82, 1),
(52, 'Reprehenderit', 77, 1),
(53, 'Dolor', 224, 1),
(54, 'Ipsa', 79, 1),
(55, 'A', 213, 1),
(56, 'Quibusdam', 463, 1),
(57, 'Tempora', 206, 1),
(58, 'Adipisci', 339, 1),
(59, 'Expedita', 165, 1),
(60, 'Est', 443, 1),
(61, 'Sunt', 52, 1),
(62, 'Velit', 403, 1),
(63, 'Esse', 265, 1),
(64, 'Nesciunt', 304, 1),
(65, 'Maiores', 93, 1),
(66, 'Harum', 223, 1),
(67, 'Fugiat', 70, 1),
(68, 'Et', 312, 1),
(69, 'Sit', 180, 1),
(70, 'Molestias', 454, 1),
(71, 'Magni', 351, 1),
(72, 'Asperiores', 346, 1),
(73, 'Accusamus', 483, 1),
(74, 'Repellat', 471, 1),
(75, 'Maxime', 215, 1),
(76, 'Nam', 325, 1),
(77, 'Quam', 128, 1),
(78, 'Molestiae', 390, 1),
(79, 'Suscipit', 65, 1),
(80, 'Numquam', 53, 1),
(81, 'Cumque', 368, 1),
(82, 'Ipsum', 146, 1),
(83, 'Quisquam', 425, 1),
(84, 'Voluptatum', 178, 1),
(85, 'Laborum', 70, 1),
(86, 'Provident', 467, 1),
(87, 'Inventore', 149, 1),
(88, 'Ab', 473, 1),
(89, 'Itaque', 81, 1),
(90, 'Voluptatibus', 224, 1),
(91, 'Qui', 172, 1),
(92, 'Dignissimos', 262, 1),
(93, 'Sapiente', 355, 1),
(94, 'Corrupti', 457, 1),
(95, 'Libero', 216, 1),
(96, 'Eos', 113, 1),
(97, 'Earum', 219, 1),
(98, 'Possimus', 211, 1),
(99, 'Quis', 137, 1),
(100, 'Odio', 373, 1),
(101, 'Abacate', 156, 2),
(102, 'Ovos', 379, 2),
(103, 'Frango grelhado', 369, 2),
(104, 'Brócolis', 351, 2),
(105, 'Espinafre', 56, 2),
(106, 'Couve-flor', 331, 2),
(107, 'Queijo mussarela', 345, 2),
(108, 'Iogurte grego', 107, 2),
(109, 'Pepino', 293, 2),
(110, 'Amêndoas', 393, 2),
(111, 'Est', 155, 2),
(112, 'Quis', 113, 2),
(113, 'Deserunt', 266, 2),
(114, 'Iste', 224, 2),
(115, 'Tempore', 168, 2),
(116, 'Quo', 357, 2),
(117, 'Recusandae', 382, 2),
(118, 'Numquam', 315, 2),
(119, 'Voluptatibus', 142, 2),
(120, 'Expedita', 380, 2),
(121, 'Omnis', 196, 2),
(122, 'Commodi', 461, 2),
(123, 'Rerum', 423, 2),
(124, 'A', 427, 2),
(125, 'Facere', 58, 2),
(126, 'Et', 147, 2),
(127, 'Error', 450, 2),
(128, 'Temporibus', 46, 2),
(129, 'Pariatur', 442, 2),
(130, 'Delectus', 191, 2),
(131, 'Deleniti', 235, 2),
(132, 'Magnam', 167, 2),
(133, 'Voluptatem', 63, 2),
(134, 'Nam', 138, 2),
(135, 'Quae', 497, 2),
(136, 'Libero', 320, 2),
(137, 'Animi', 478, 2),
(138, 'Ea', 397, 2),
(139, 'Corporis', 191, 2),
(140, 'Facilis', 138, 2),
(141, 'Assumenda', 365, 2),
(142, 'Ipsa', 285, 2),
(143, 'Non', 232, 2),
(144, 'Itaque', 482, 2),
(145, 'Quam', 498, 2),
(146, 'Quaerat', 359, 2),
(147, 'Maiores', 264, 2),
(148, 'Alias', 103, 2),
(149, 'Dolorum', 165, 2),
(150, 'Exercitationem', 101, 2),
(151, 'Enim', 156, 2),
(152, 'Reiciendis', 411, 2),
(153, 'Autem', 317, 2),
(154, 'Quos', 305, 2),
(155, 'Hic', 164, 2),
(156, 'Dolor', 412, 2),
(157, 'Vitae', 329, 2),
(158, 'Accusamus', 249, 2),
(159, 'Nulla', 489, 2),
(160, 'Quidem', 328, 2),
(161, 'Fugit', 234, 2),
(162, 'Culpa', 215, 2),
(163, 'Dicta', 142, 2),
(164, 'Debitis', 100, 2),
(165, 'Dolore', 290, 2),
(166, 'Nisi', 282, 2),
(167, 'Porro', 76, 2),
(168, 'Natus', 416, 2),
(169, 'Beatae', 54, 2),
(170, 'Suscipit', 470, 2),
(171, 'Eveniet', 86, 2),
(172, 'Asperiores', 108, 2),
(173, 'Blanditiis', 351, 2),
(174, 'Officia', 111, 2),
(175, 'Voluptate', 435, 2),
(176, 'Esse', 378, 2),
(177, 'Iusto', 246, 2),
(178, 'Maxime', 335, 2),
(179, 'Odio', 62, 2),
(180, 'Cum', 227, 2),
(181, 'Laudantium', 225, 2),
(182, 'Sunt', 335, 2),
(183, 'Occaecati', 269, 2),
(184, 'Atque', 300, 2),
(185, 'Totam', 158, 2),
(186, 'Ut', 313, 2),
(187, 'Dolores', 470, 2),
(188, 'Excepturi', 35, 2),
(189, 'Praesentium', 378, 2),
(190, 'Ex', 399, 2),
(191, 'Aperiam', 88, 2),
(192, 'Ad', 379, 2),
(193, 'Molestias', 483, 2),
(194, 'In', 304, 2),
(195, 'Necessitatibus', 414, 2),
(196, 'Vel', 166, 2),
(197, 'Placeat', 423, 2),
(198, 'Soluta', 358, 2),
(199, 'Laboriosam', 204, 2),
(200, 'Id', 87, 2),
(201, 'Bacon', 170, 3),
(202, 'Manteiga', 242, 3),
(203, 'Creme de leite', 100, 3),
(204, 'Carne moída', 252, 3),
(205, 'Coco ralado', 21, 3),
(206, 'Queijo cheddar', 389, 3),
(207, 'Ovos cozidos', 388, 3),
(208, 'Azeite de oliva', 154, 3),
(209, 'Espinafre', 276, 3),
(210, 'Salmão', 111, 3),
(211, 'At', 289, 3),
(212, 'Accusamus', 497, 3),
(213, 'Sed', 84, 3),
(214, 'Quisquam', 475, 3),
(215, 'Beatae', 350, 3),
(216, 'Vitae', 182, 3),
(217, 'Et', 460, 3),
(218, 'Adipisci', 357, 3),
(219, 'Necessitatibus', 289, 3),
(220, 'Rerum', 341, 3),
(221, 'Labore', 131, 3),
(222, 'Neque', 108, 3),
(223, 'Fugiat', 221, 3),
(224, 'Numquam', 420, 3),
(225, 'Voluptas', 112, 3),
(226, 'Assumenda', 306, 3),
(227, 'Cumque', 428, 3),
(228, 'Ipsum', 301, 3),
(229, 'Deserunt', 500, 3),
(230, 'Molestiae', 30, 3),
(231, 'Iure', 336, 3),
(232, 'In', 195, 3),
(233, 'Qui', 280, 3),
(234, 'Aperiam', 39, 3),
(235, 'Inventore', 87, 3),
(236, 'Officia', 215, 3),
(237, 'Sit', 479, 3),
(238, 'Facere', 455, 3),
(239, 'Natus', 443, 3),
(240, 'Quam', 187, 3),
(241, 'Exercitationem', 152, 3),
(242, 'Temporibus', 59, 3),
(243, 'Iusto', 153, 3),
(244, 'Eos', 479, 3),
(245, 'Veritatis', 320, 3),
(246, 'Esse', 70, 3),
(247, 'Ipsa', 73, 3),
(248, 'Nam', 404, 3),
(249, 'Eum', 278, 3),
(250, 'Eligendi', 447, 3),
(251, 'Quae', 65, 3),
(252, 'Delectus', 419, 3),
(253, 'Repellendus', 302, 3),
(254, 'Tempore', 422, 3),
(255, 'Quasi', 94, 3),
(256, 'Animi', 95, 3),
(257, 'Corrupti', 367, 3),
(258, 'Molestias', 273, 3),
(259, 'Autem', 311, 3),
(260, 'Eius', 114, 3),
(261, 'Amet', 165, 3),
(262, 'Quia', 300, 3),
(263, 'Dolorum', 476, 3),
(264, 'Voluptatem', 340, 3),
(265, 'Omnis', 246, 3),
(266, 'Porro', 138, 3),
(267, 'Mollitia', 306, 3),
(268, 'Doloremque', 416, 3),
(269, 'Vero', 403, 3),
(270, 'Culpa', 383, 3),
(271, 'Atque', 132, 3),
(272, 'Asperiores', 395, 3),
(273, 'Cupiditate', 189, 3),
(274, 'Maxime', 234, 3),
(275, 'Incidunt', 373, 3),
(276, 'Deleniti', 362, 3),
(277, 'Ex', 221, 3),
(278, 'Velit', 254, 3),
(279, 'Sapiente', 490, 3),
(280, 'Quis', 294, 3),
(281, 'Dolore', 261, 3),
(282, 'Perferendis', 91, 3),
(283, 'Similique', 156, 3),
(284, 'Impedit', 145, 3),
(285, 'Expedita', 62, 3),
(286, 'Nobis', 203, 3),
(287, 'Minima', 40, 3),
(288, 'Provident', 331, 3),
(289, 'Ab', 313, 3),
(290, 'Nesciunt', 147, 3),
(291, 'A', 331, 3),
(292, 'Ducimus', 142, 3),
(293, 'Distinctio', 33, 3),
(294, 'Recusandae', 66, 3),
(295, 'Est', 392, 3),
(296, 'Dolorem', 353, 3),
(297, 'Itaque', 60, 3),
(298, 'Ratione', 147, 3),
(299, 'Tempora', 64, 3),
(300, 'Soluta', 493, 3),
(301, 'Tofu', 36, 4),
(302, 'Lentilha', 189, 4),
(303, 'Grão-de-bico', 56, 4),
(304, 'Arroz integral', 283, 4),
(305, 'Feijão preto', 141, 4),
(306, 'Brócolis', 162, 4),
(307, 'Cenoura', 362, 4),
(308, 'Batata-doce', 268, 4),
(309, 'Espinafre', 129, 4),
(310, 'Castanha de caju', 296, 4),
(311, 'Illo', 97, 4),
(312, 'Minima', 400, 4),
(313, 'Maiores', 481, 4),
(314, 'Quaerat', 322, 4),
(315, 'Voluptatem', 325, 4),
(316, 'Cumque', 272, 4),
(317, 'Labore', 154, 4),
(318, 'Ut', 431, 4),
(319, 'Magni', 272, 4),
(320, 'Non', 443, 4),
(321, 'Quam', 238, 4),
(322, 'Cum', 127, 4),
(323, 'Minus', 78, 4),
(324, 'Earum', 79, 4),
(325, 'Magnam', 367, 4),
(326, 'Eius', 250, 4),
(327, 'Eum', 211, 4),
(328, 'Architecto', 246, 4),
(329, 'Maxime', 240, 4),
(330, 'Incidunt', 269, 4),
(331, 'Iusto', 472, 4),
(332, 'Aspernatur', 403, 4),
(333, 'Ipsam', 57, 4),
(334, 'Error', 374, 4),
(335, 'Placeat', 364, 4),
(336, 'Occaecati', 360, 4),
(337, 'Corporis', 80, 4),
(338, 'Hic', 61, 4),
(339, 'Natus', 236, 4),
(340, 'Neque', 402, 4),
(341, 'Suscipit', 203, 4),
(342, 'Repudiandae', 439, 4),
(343, 'Animi', 471, 4),
(344, 'Qui', 85, 4),
(345, 'Alias', 157, 4),
(346, 'Reiciendis', 128, 4),
(347, 'Expedita', 127, 4),
(348, 'Exercitationem', 304, 4),
(349, 'Explicabo', 259, 4),
(350, 'Quibusdam', 101, 4),
(351, 'Delectus', 246, 4),
(352, 'Tempore', 123, 4),
(353, 'A', 172, 4),
(354, 'Iure', 266, 4),
(355, 'Aliquid', 157, 4),
(356, 'Ipsa', 477, 4),
(357, 'Beatae', 68, 4),
(358, 'Necessitatibus', 256, 4),
(359, 'Excepturi', 443, 4),
(360, 'Consequatur', 471, 4),
(361, 'Optio', 468, 4),
(362, 'Quas', 311, 4),
(363, 'Deserunt', 80, 4),
(364, 'Itaque', 55, 4),
(365, 'Voluptatum', 363, 4),
(366, 'Velit', 306, 4),
(367, 'Saepe', 458, 4),
(368, 'Provident', 37, 4),
(369, 'Nesciunt', 77, 4),
(370, 'Numquam', 415, 4),
(371, 'Temporibus', 464, 4),
(372, 'Officia', 151, 4),
(373, 'Consequuntur', 115, 4),
(374, 'Sapiente', 238, 4),
(375, 'Quisquam', 278, 4),
(376, 'Culpa', 276, 4),
(377, 'Sed', 139, 4),
(378, 'Quidem', 472, 4),
(379, 'Blanditiis', 235, 4),
(380, 'Quasi', 492, 4),
(381, 'Modi', 60, 4),
(382, 'Aut', 114, 4),
(383, 'Sit', 224, 4),
(384, 'Voluptate', 31, 4),
(385, 'Nostrum', 229, 4),
(386, 'Odit', 165, 4),
(387, 'Rerum', 431, 4),
(388, 'Nemo', 431, 4),
(389, 'Eligendi', 262, 4),
(390, 'Nam', 176, 4),
(391, 'Dicta', 246, 4),
(392, 'Asperiores', 386, 4),
(393, 'Doloremque', 404, 4),
(394, 'Laborum', 431, 4),
(395, 'Sequi', 314, 4),
(396, 'Molestiae', 368, 4),
(397, 'Esse', 397, 4),
(398, 'Officiis', 279, 4),
(399, 'Harum', 109, 4),
(400, 'Est', 127, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimentos_completos`
--

CREATE TABLE `alimentos_completos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` enum('proteína','carboidrato','legumes','verdura','fruta','outros') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dieta` enum('Mediterrânea','Low Carb','Cetogênica','Vegetariana') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantidade_gramas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alimentos_completos`
--

INSERT INTO `alimentos_completos` (`id`, `nome`, `categoria`, `dieta`, `quantidade_gramas`) VALUES
(1, 'Pão integral', 'carboidrato', 'Mediterrânea', 50),
(2, 'Ovos (galinha)', 'proteína', 'Mediterrânea', 100),
(3, 'Nozes', 'outros', 'Mediterrânea', 30),
(4, 'Morango', 'fruta', 'Mediterrânea', 50),
(5, 'Salmão', 'proteína', 'Mediterrânea', 150),
(6, 'Arroz integral', 'carboidrato', 'Mediterrânea', 100),
(7, 'Alface', 'verdura', 'Mediterrânea', 20),
(8, 'Tomate', 'legumes', 'Mediterrânea', 30),
(9, 'Pepino', 'legumes', 'Mediterrânea', 20),
(10, 'Maçã', 'fruta', 'Mediterrânea', 100),
(11, 'Laranja', 'fruta', 'Mediterrânea', 100),
(12, 'Castanha-do-Pará', 'outros', 'Mediterrânea', 40),
(13, 'Peito de frango grelhado', 'proteína', 'Mediterrânea', 120),
(14, 'Abobrinha', 'legumes', 'Mediterrânea', 80),
(15, 'Beringela', 'legumes', 'Mediterrânea', 60),
(16, 'Quinoa', 'carboidrato', 'Mediterrânea', 50),
(17, 'Pão integral', 'carboidrato', 'Low Carb', 50),
(18, 'Ovos (galinha)', 'proteína', 'Low Carb', 100),
(19, 'Mamão', 'fruta', 'Low Carb', 100),
(20, 'Peito de frango grelhado', 'proteína', 'Low Carb', 150),
(21, 'Cenoura', 'legumes', 'Low Carb', 50),
(22, 'Vagem', 'legumes', 'Low Carb', 40),
(23, 'Palmito', 'legumes', 'Low Carb', 50),
(24, 'Alface', 'verdura', 'Low Carb', 30),
(25, 'Amêndoas', 'outros', 'Low Carb', 40),
(26, 'Peito de peru', 'proteína', 'Low Carb', 80),
(27, 'Morango', 'fruta', 'Low Carb', 100),
(28, 'Kiwi', 'fruta', 'Low Carb', 50),
(29, 'Tilápia', 'proteína', 'Low Carb', 120),
(30, 'Abobrinha', 'legumes', 'Low Carb', 80),
(31, 'Tomate', 'legumes', 'Low Carb', 50),
(32, 'Ovos (galinha)', 'proteína', 'Cetogênica', 100),
(33, 'Abacate', 'fruta', 'Cetogênica', 80),
(34, 'Kiwi', 'fruta', 'Cetogênica', 50),
(35, 'Morango', 'fruta', 'Cetogênica', 70),
(36, 'Patinho', 'proteína', 'Cetogênica', 160),
(37, 'Brócolis', 'legumes', 'Cetogênica', 70),
(38, 'Couve', 'legumes', 'Cetogênica', 30),
(39, 'Alface', 'verdura', 'Cetogênica', 30),
(40, 'Tomate', 'legumes', 'Cetogênica', 50),
(41, 'Abobrinha', 'legumes', 'Cetogênica', 80),
(42, 'Peito de peru', 'proteína', 'Cetogênica', 100),
(43, 'Castanha-do-Pará', 'outros', 'Cetogênica', 50),
(44, 'Espinafre', 'verdura', 'Cetogênica', 30),
(45, 'Repolho', 'legumes', 'Cetogênica', 40),
(46, 'Pão integral', 'carboidrato', 'Vegetariana', 50),
(47, 'Ovos (galinha)', 'proteína', 'Vegetariana', 100),
(48, 'Grão-de-bico (cozido)', 'proteína', 'Vegetariana', 80),
(49, 'Arroz integral', 'carboidrato', 'Vegetariana', 100),
(50, 'Lentilha (cozida)', 'proteína', 'Vegetariana', 60),
(51, 'Soja cozida', 'proteína', 'Vegetariana', 60),
(52, 'Alface', 'verdura', 'Vegetariana', 30),
(53, 'Couve-flor', 'legumes', 'Vegetariana', 30),
(54, 'Castanha-do-Pará', 'outros', 'Vegetariana', 50),
(55, 'Morango', 'fruta', 'Vegetariana', 100),
(56, 'Laranja', 'fruta', 'Vegetariana', 120),
(57, 'Proteína de soja texturizada', 'proteína', 'Vegetariana', 100),
(58, 'Cenoura', 'legumes', 'Vegetariana', 50),
(59, 'Chuchu', 'legumes', 'Vegetariana', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimentos_novo`
--

CREATE TABLE `alimentos_novo` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calorias` int(11) NOT NULL,
  `dieta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimentos_selecionados`
--

CREATE TABLE `alimentos_selecionados` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `alimento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimentos_selecionados_novo`
--

CREATE TABLE `alimentos_selecionados_novo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `alimento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimentos_usuario_novo`
--

CREATE TABLE `alimentos_usuario_novo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `alimento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atualizacao`
--

CREATE TABLE `atualizacao` (
  `id` int(11) NOT NULL,
  `datahora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atualizacao`
--

INSERT INTO `atualizacao` (`id`, `datahora`) VALUES
(213, '2025-06-18 17:09:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contador_dias`
--

CREATE TABLE `contador_dias` (
  `id` int(11) NOT NULL,
  `data_inicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `contador_dias`
--

INSERT INTO `contador_dias` (`id`, `data_inicio`) VALUES
(1, '2025-06-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudos_extras`
--

CREATE TABLE `conteudos_extras` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `conteudos_extras`
--

INSERT INTO `conteudos_extras` (`id`, `titulo`, `descricao`, `criado_em`) VALUES
(6, 'Hidrate-se!', 'Beber pelo menos 2 litros de água por dia ajuda na digestão, na disposição e na eliminação de toxinas.', '2025-06-03 00:32:14'),
(7, 'Durma bem', 'O sono regula hormônios importantes para o emagrecimento e recuperação muscular. Tente dormir de 7 a 8 horas por noite.', '2025-06-03 00:32:22'),
(8, 'Movimento diário', 'Substitua elevador por escadas, estacione mais longe ou caminhe 10 minutos a mais por dia.', '2025-06-03 00:32:33'),
(9, 'Coma devagar', 'Mastigar bem os alimentos melhora a saciedade e a digestão. Faça suas refeições com atenção plena.', '2025-06-03 00:32:45'),
(10, 'Varie o treino', 'Alterne entre treinos de força e aeróbicos para melhores resultados e evitar platôs.', '2025-06-03 00:32:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_nutricionais`
--

CREATE TABLE `dados_nutricionais` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `idade` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `objetivo` varchar(50) NOT NULL,
  `imc` float NOT NULL,
  `tmb` float NOT NULL,
  `agua` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_nutricionais_novo`
--

CREATE TABLE `dados_nutricionais_novo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `idade` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `objetivo` varchar(50) NOT NULL,
  `imc` float NOT NULL,
  `tmb` float NOT NULL,
  `agua` float NOT NULL,
  `tempo_meta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados_nutricionais_novo`
--

INSERT INTO `dados_nutricionais_novo` (`id`, `usuario_id`, `peso`, `altura`, `idade`, `genero`, `objetivo`, `imc`, `tmb`, `agua`, `tempo_meta`) VALUES
(3, 1, 110, 1.85, 36, 'Masculino', 'Emagrecimento', 32.1402, 2081.25, 3.85, NULL),
(4, 2, 110, 185, 36, 'masculino', 'emagrecimento', 32.14, 2081.25, 3850, '3 meses'),
(5, 3, 89, 1.73, 42, 'Feminino', 'Emagrecimento', 29.737, 1600.25, 3.115, NULL),
(6, 4, 60, 1.7, 28, 'Masculino', 'Hipertrofia', 20.7612, 1527.5, 2.1, NULL),
(7, 5, 110, 1.85, 36, 'Masculino', 'Emagrecimento', 32.1402, 2081.25, 3.85, '6 meses'),
(8, 6, 110, 185, 36, 'masculino', 'emagrecimento', 32.14, 2081.25, 3850, '3 meses'),
(9, 7, 110, 185, 36, 'masculino', 'emagrecimento', 32.14, 2081.25, 3850, '6 meses'),
(10, 8, 70, 160, 32, 'masculino', 'hipertrofia', 27.34, 1545, 2450, '3 meses'),
(11, 9, 90, 173, 42, 'feminino', 'emagrecimento', 30.07, 1610.25, 3150, '3 meses'),
(12, 10, 83, 173, 22, 'masculino', 'hipertrofia', 27.73, 1806.25, 2905, '1 mês'),
(13, 11, 100, 182, 22, 'masculino', 'emagrecimento', 30.19, 2032.5, 3500, '3 meses'),
(14, 12, 83, 173, 22, 'masculino', 'emagrecimento', 27.73, 1806.25, 2905, '3 meses'),
(15, 13, 110, 185, 36, 'masculino', 'emagrecimento', 32.14, 2081.25, 3850, '6 meses'),
(16, 20, 99, 182, 22, 'masculino', 'emagrecimento', 29.89, 2022.5, 3465, '3 meses'),
(17, 22, 80, 182, 22, 'masculino', 'hipertrofia', 24.15, 1832.5, 2800, '3 meses'),
(18, 23, 99, 182, 22, 'masculino', 'emagrecimento', 29.89, 2022.5, 3465, '3 meses');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dietas`
--

CREATE TABLE `dietas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dietas`
--

INSERT INTO `dietas` (`id`, `nome`) VALUES
(1, 'Mediterrânea'),
(2, 'Low carb'),
(3, 'Cetogênica'),
(4, 'Vegetariana');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dietas_novo`
--

CREATE TABLE `dietas_novo` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dietas_novo`
--

INSERT INTO `dietas_novo` (`id`, `nome`) VALUES
(1, 'Mediterrânea'),
(2, 'Low carb'),
(3, 'Cetogênica'),
(4, 'Vegetariana');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dieta_gerada_novo`
--

CREATE TABLE `dieta_gerada_novo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `refeicao` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alimentos` text COLLATE utf8mb4_unicode_ci,
  `data_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `metas_tempo`
--

CREATE TABLE `metas_tempo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tempo_meta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `metas_tempo_novo`
--

CREATE TABLE `metas_tempo_novo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tempo_meta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `metas_tempo_novo`
--

INSERT INTO `metas_tempo_novo` (`id`, `usuario_id`, `tempo_meta`) VALUES
(1, 1, '3 meses'),
(2, 2, '3 meses'),
(3, 3, '3 meses'),
(4, 4, '12 meses');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento_novo`
--

CREATE TABLE `pagamento_novo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `metodo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Pendente','Pago') COLLATE utf8mb4_unicode_ci DEFAULT 'Pendente',
  `data_pagamento` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `preferencias_novo`
--

CREATE TABLE `preferencias_novo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `proteinas` text COLLATE utf8mb4_unicode_ci,
  `carboidratos` text COLLATE utf8mb4_unicode_ci,
  `legumes` text COLLATE utf8mb4_unicode_ci,
  `verduras` text COLLATE utf8mb4_unicode_ci,
  `frutas` text COLLATE utf8mb4_unicode_ci,
  `alergias` text COLLATE utf8mb4_unicode_ci,
  `dieta_escolhida` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objetivo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempo_meta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`id`, `titulo`, `descricao`, `criado_em`) VALUES
(2, 'Panqueca de Aveia', 'Aveia, ovo, banana e canela. Fica pronto em 10 minutos', '2025-06-03 00:41:41'),
(3, 'Salada Mediterrânea', 'Pepino, tomate, azeite de oliva, grão-de-bico e limão.', '2025-06-03 00:42:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinos`
--

CREATE TABLE `treinos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `treinos`
--

INSERT INTO `treinos` (`id`, `titulo`, `descricao`, `criado_em`) VALUES
(2, 'Treino em casa', '3 séries de agachamento, flexão, abdominal e prancha.', '2025-06-03 01:23:59'),
(3, 'Cardio rápido', 'Corrida leve ou pular corda por 20 minutos.', '2025-06-03 01:24:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `data_pedido` datetime NOT NULL,
  `sku_seller` varchar(255) NOT NULL,
  `titulo_produto` text NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_novo`
--

CREATE TABLE `usuarios_novo` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `token_recuperacao` varchar(100) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios_novo`
--

INSERT INTO `usuarios_novo` (`id`, `nome_completo`, `email`, `senha`, `token_recuperacao`, `criado_em`) VALUES
(1, 'Teste', 'teste@email.com', 'senha_hash', NULL, '2025-06-01 22:10:24'),
(2, 'Rafael Araujo', 'rafaozster@gmail.com', '$2y$10$dO72E/iCWtSg9AI1861FG.PQiiYk/OwoN5OsgJZ/M2gSm4zjk2i46', NULL, '2025-06-01 22:49:43'),
(3, 'Danielle emerick', 'dany357dany@gmail.com', '$2y$10$drAGNkPkuQLasX9.sWDlse5uvJjLegzvLrCa4LmaMhcuCDZ7S14x6', NULL, '2025-06-02 00:49:49'),
(4, 'Vinicius Henrique', 'viniciushenrique02@hotmail.com', '$2y$10$rmKKS6jAW/Qh6IFCS.HQZeDNNJg3A/aGnQRLi3nIymCcLimu9RGlq', NULL, '2025-06-02 11:29:17'),
(5, 'Usuario de Teste', 'teste@teste.com', '$2y$10$LUQV1Mb6bbkr4EjXyTGl3Om0jeLJT7MVX/x6wQdmQVr/u3yg4nhiS', NULL, '2025-06-03 00:02:53'),
(6, 'Usuario Teste 2', 'teste@teste.com.br', '$2y$10$kpHdn4bon2VPsT19KNz6L.Iwy/32ah3y04RTBzPMv2LmZVL.64wbS', NULL, '2025-06-03 01:54:09'),
(7, 'Araújo Rafael', 'rafael@teste.com', '$2y$10$iGvMJ0Cz9ZXYwjNyTT.prenkoNfEaLYBk7iIGBak3WDzhUKgWcflG', NULL, '2025-06-03 02:18:03'),
(8, 'Adelmo', 'testee@teste.com', '$2y$10$vRE.Xkavlll5m8ovQf9yUeJHFQVdICpdxYLOPxkPegt3/5PLStA6a', NULL, '2025-06-03 10:32:03'),
(9, 'Danielle Emerick', 'danielle@hotmail.com', '$2y$10$4sjVM.XtVvZXZr2jYUSglub1iA1U8sNoOCe8fYAEQeHIDeS9qkhmm', NULL, '2025-06-03 12:16:02'),
(10, 'Caio Magalhães', 'caiomagalhaesrabelooliveira10@gmail.com', '$2y$10$8CsCsOStfdLiiA8RJ5BC4.hq1AfY6PXLqukbcdFvTr.mDMRQ7MWge', NULL, '2025-06-03 17:50:26'),
(11, 'Tiago Araújo Pires', 'tiago.araujopires03@gmail.com', '$2y$10$XdvyaWfHZasygI2b2fV1JO4Dv5ZjOiNMKUrRBWPUKKvm78lm2t5E2', NULL, '2025-06-03 19:41:02'),
(12, 'Caio Magalhães', 'caiomroliveira@gmail.com.br', '$2y$10$cgBWTOJDJA6dCR48ks5bCeIoPIzAVKUNCM1r2umP9slJrmgsYumoe', NULL, '2025-06-04 12:30:55'),
(13, 'TESTE TESTE', 'teste@teste2.com.br', '$2y$10$almZXjFmd.6FZRFRfDf6I.Foskg8fuolWEiEUTSF/6eavzwR6B6jC', NULL, '2025-06-04 22:09:03'),
(14, 'Rafael Araujo', 'test@test.com', '$2y$10$/QajVyPeavjH1Le5De0WceXBGOcsKRUokx90LvCpLftWRtkDnooDS', NULL, '2025-06-18 17:01:22'),
(15, 'TESTE TESTE', 'tt@t.com', '$2y$10$ErijiEKYCepBjJZ2u6W.AOuf9HtEtV6BjqDBVaNiEhaeAhr1G2o16', NULL, '2025-06-18 20:34:54'),
(16, 'trwetetewt', 'tr@tr.com', '$2y$10$9I/KBGCSqzv3s5rkLdVw4.SUyl/tCewmqc7PjpkUD.SmNU4.pa1ci', NULL, '2025-06-18 20:36:09'),
(17, 'PROFESSORA SOBRENOME', 'prof@prof.com.br', '$2y$10$JSUFmBN09bXOMHFWNI3ceORjW.PVcGl0i6M6ZRhie2tN4woK1X0Ny', NULL, '2025-06-18 20:47:33'),
(18, 'Pedro Filipe de Oliveira Cupertino', 'pedrofilipe@gmail.com', '$2y$10$xD9z5VnlTKoXxyOFqtVcVeIQnBz77aFeY9QnXuA3RE2Wl9NvAhcf.', NULL, '2025-06-18 22:39:39'),
(19, 'Isabella Vitoria', 'isabelavcas@gmail.com', '$2y$10$Awox/I10GgLFpsiP9VH80OXJ2VDVrSQg6Yef28VDDPB4L1wjP7GUS', NULL, '2025-06-18 22:40:04'),
(20, 'Tiago Araújo Pires', 'titiago2003@gmail.com', '$2y$10$cZmFzC5e8h2lBHFFBWgpzu3JPrZS91vpZS1hSvrw.qTxvfJhzzfLG', NULL, '2025-06-18 22:41:58'),
(21, 'Caio Henrique', 'caiohfda@gmail.com', '$2y$10$1l.EnaXCvDL8WftobI1BSuBUqixIl5m1FXvUVEOSr5jB931AXuP9q', NULL, '2025-06-18 22:46:48'),
(22, 'Tiago Araújo Pires', 'testetiago@teste.com', '$2y$10$BZ30UfOSQBtEt8jq8lRQEelNrso5yaB.LPDNAMIo3CyEgc7xXOqYy', NULL, '2025-06-18 22:53:06'),
(23, 'Tiago Araújo Pires', 'teste123@una.com', '$2y$10$yHsbkZeB6q4oDHASVGn59uV32pgxfoYNfqm8/SokfC46jBPaK8s.G', NULL, '2025-06-18 22:57:14'),
(24, 'Rafael Araujo', 'rafael@nutrifacil.com.br', '$2y$10$1pIBjZSSVtzYpxoC0OabXuBPdWEWcJ9r80Rq7ZXRX4PRBDdJ5MsjS', NULL, '2025-06-18 23:21:17'),
(25, 'Rafael Araujo', 'rafael@gmail.com', '$2y$10$A.zo5bBoG4fY0DPYowFyQ.CffTKef.sfRxwwnQnJSBVBBJ0EGC7my', NULL, '2025-06-18 23:22:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dieta_id` (`dieta_id`);

--
-- Indexes for table `alimentos_completos`
--
ALTER TABLE `alimentos_completos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alimentos_novo`
--
ALTER TABLE `alimentos_novo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dieta_id` (`dieta_id`);

--
-- Indexes for table `alimentos_selecionados`
--
ALTER TABLE `alimentos_selecionados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `alimento_id` (`alimento_id`);

--
-- Indexes for table `alimentos_selecionados_novo`
--
ALTER TABLE `alimentos_selecionados_novo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `alimento_id` (`alimento_id`);

--
-- Indexes for table `alimentos_usuario_novo`
--
ALTER TABLE `alimentos_usuario_novo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `alimento_id` (`alimento_id`);

--
-- Indexes for table `atualizacao`
--
ALTER TABLE `atualizacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contador_dias`
--
ALTER TABLE `contador_dias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conteudos_extras`
--
ALTER TABLE `conteudos_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dados_nutricionais`
--
ALTER TABLE `dados_nutricionais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `dados_nutricionais_novo`
--
ALTER TABLE `dados_nutricionais_novo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `dietas`
--
ALTER TABLE `dietas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dietas_novo`
--
ALTER TABLE `dietas_novo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dieta_gerada_novo`
--
ALTER TABLE `dieta_gerada_novo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metas_tempo`
--
ALTER TABLE `metas_tempo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `metas_tempo_novo`
--
ALTER TABLE `metas_tempo_novo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `pagamento_novo`
--
ALTER TABLE `pagamento_novo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferencias_novo`
--
ALTER TABLE `preferencias_novo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treinos`
--
ALTER TABLE `treinos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_novo`
--
ALTER TABLE `usuarios_novo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;
--
-- AUTO_INCREMENT for table `alimentos_completos`
--
ALTER TABLE `alimentos_completos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `alimentos_novo`
--
ALTER TABLE `alimentos_novo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;
--
-- AUTO_INCREMENT for table `alimentos_selecionados`
--
ALTER TABLE `alimentos_selecionados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alimentos_selecionados_novo`
--
ALTER TABLE `alimentos_selecionados_novo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=442;
--
-- AUTO_INCREMENT for table `alimentos_usuario_novo`
--
ALTER TABLE `alimentos_usuario_novo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `atualizacao`
--
ALTER TABLE `atualizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;
--
-- AUTO_INCREMENT for table `conteudos_extras`
--
ALTER TABLE `conteudos_extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dados_nutricionais`
--
ALTER TABLE `dados_nutricionais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dados_nutricionais_novo`
--
ALTER TABLE `dados_nutricionais_novo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `dietas`
--
ALTER TABLE `dietas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dietas_novo`
--
ALTER TABLE `dietas_novo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dieta_gerada_novo`
--
ALTER TABLE `dieta_gerada_novo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `metas_tempo`
--
ALTER TABLE `metas_tempo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `metas_tempo_novo`
--
ALTER TABLE `metas_tempo_novo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pagamento_novo`
--
ALTER TABLE `pagamento_novo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `preferencias_novo`
--
ALTER TABLE `preferencias_novo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `treinos`
--
ALTER TABLE `treinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios_novo`
--
ALTER TABLE `usuarios_novo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alimentos`
--
ALTER TABLE `alimentos`
  ADD CONSTRAINT `alimentos_ibfk_1` FOREIGN KEY (`dieta_id`) REFERENCES `dietas` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `alimentos_novo`
--
ALTER TABLE `alimentos_novo`
  ADD CONSTRAINT `alimentos_novo_ibfk_1` FOREIGN KEY (`dieta_id`) REFERENCES `dietas_novo` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `alimentos_selecionados`
--
ALTER TABLE `alimentos_selecionados`
  ADD CONSTRAINT `alimentos_selecionados_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alimentos_selecionados_ibfk_2` FOREIGN KEY (`alimento_id`) REFERENCES `alimentos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `alimentos_selecionados_novo`
--
ALTER TABLE `alimentos_selecionados_novo`
  ADD CONSTRAINT `alimentos_selecionados_novo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios_novo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alimentos_selecionados_novo_ibfk_2` FOREIGN KEY (`alimento_id`) REFERENCES `alimentos_novo` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `alimentos_usuario_novo`
--
ALTER TABLE `alimentos_usuario_novo`
  ADD CONSTRAINT `alimentos_usuario_novo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios_novo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alimentos_usuario_novo_ibfk_2` FOREIGN KEY (`alimento_id`) REFERENCES `alimentos_novo` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `dados_nutricionais`
--
ALTER TABLE `dados_nutricionais`
  ADD CONSTRAINT `dados_nutricionais_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `dados_nutricionais_novo`
--
ALTER TABLE `dados_nutricionais_novo`
  ADD CONSTRAINT `dados_nutricionais_novo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios_novo` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `metas_tempo`
--
ALTER TABLE `metas_tempo`
  ADD CONSTRAINT `metas_tempo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `metas_tempo_novo`
--
ALTER TABLE `metas_tempo_novo`
  ADD CONSTRAINT `metas_tempo_novo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios_novo` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
