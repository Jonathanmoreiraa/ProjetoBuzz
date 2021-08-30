-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 15-Mar-2021 às 14:30
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aulanova`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `tittle` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `description_article` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `public_summary` text COLLATE utf8_unicode_ci NOT NULL,
  `access_quantity` int(11) NOT NULL DEFAULT 0,
  `robots_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `situations_id` int(11) NOT NULL,
  `articles_types_id` int(11) NOT NULL,
  `articles_categories_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `articles`
--

INSERT INTO `articles` (`id`, `tittle`, `description_article`, `content`, `image`, `slug`, `keywords`, `description`, `public_summary`, `access_quantity`, `robots_id`, `users_id`, `situations_id`, `articles_types_id`, `articles_categories_id`, `created`, `modified`) VALUES
(1, 'Artigo 1', '<p>Ut a accumsan est, ac interdum velit. Vivamus eu sapien ac mauris viverra lobortis. Proin eget magna luctus, sollicitudin lacus non, consequat justo. Ut finibus luctus diam, eu tempor augue facilisis at. In hac habitasse platea dictumst.&nbsp;</p>', '<p>Ut purus enim, ullamcorper ut eleifend in, semper non mi. Integer rutrum et erat vitae ullamcorper. Pellentesque libero arcu, consectetur vitae ultrices a, commodo vitae ex. Maecenas eleifend convallis mattis. Donec faucibus suscipit ligula ut euismod. Aliquam sodales justo eu felis porta maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</p><p>Proin ornare, lacus a dignissim laoreet, felis nisi vestibulum sem, nec gravida velit sapien a lorem. Duis vitae tellus vitae odio elementum dictum feugiat at enim. In luctus metus sit amet est placerat, et ullamcorper arcu ultrices. Aliquam sodales libero dolor, sed posuere magna imperdiet nec. Nulla facilisi. Praesent vitae dolor eu neque varius scelerisque et sed velit. Quisque imperdiet et nisi commodo pharetra.</p><h3><strong>Ut in tellus gravida</strong></h3><p>Placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat. Integer maximus ipsum eget ex efficitur interdum. Quisque non risus sit amet felis dapibus mattis. Aenean molestie, sapien et euismod sodales, ex nunc mollis ante, at sollicitudin libero eros at turpis. Proin lacus erat, condimentum faucibus neque vestibulum, aliquet fermentum massa.</p><p>&nbsp;</p><p>Aliquam erat volutpat. Aliquam quam velit, fringilla bibendum euismod eget, tincidunt sit amet arcu.</p>', 'arquitetura-classica10.jpg', 'artigo-um', 'artigo um', 'description artigo um', '<p><i><strong>Resumo publico Artigo um</strong></i></p>', 72, 1, 1, 2, 1, 1, '2021-03-01 11:53:59', '2021-03-12 10:24:00'),
(2, 'Titulo 2', '<p>Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.</p>', '<p>Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.</p><h3><strong>Ut in tellus gravida</strong></h3><p>Placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.</p><p>Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.</p>', 'arquitetura-classica08.jpg', 'artigo-dois', 'artigo dois', 'description artigo dois', '<p>Resumo</p>', 61, 1, 3, 2, 1, 1, '2021-03-01 13:06:50', '2021-03-12 12:47:47'),
(4, 'Titulo 3', '<p>Integer maximus ipsum eget ex efficitur interdum. Quisque non risus sit amet felis dapibus mattis. Aenean molestie, sapien et euismod sodales, ex nunc mollis ante, at sollicitudin libero eros at turpis.&nbsp;</p>', '<p>Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3 Conteúdo 3.</p><h3><strong>Conteúdo 3</strong></h3><p>Integer maximus ipsum eget ex efficitur interdum. Quisque non risus sit amet felis dapibus mattis. Aenean molestie, sapien et euismod sodales, ex nunc mollis ante, at sollicitudin libero eros at turpis.&nbsp;Integer maximus ipsum eget ex efficitur interdum. Quisque non risus sit amet felis dapibus mattis. Aenean molestie, sapien et euismod sodales, ex nunc mollis ante, at sollicitudin libero eros at turpis.&nbsp;Integer maximus ipsum eget ex efficitur interdum. Quisque non risus sit amet felis dapibus mattis. Aenean molestie, sapien et euismod sodales, ex nunc mollis ante, at sollicitudin libero eros at turpis.&nbsp;Integer maximus ipsum eget ex efficitur interdum. Quisque non risus sit amet felis dapibus mattis. Aenean molestie, sapien et euismod sodales, ex nunc mollis ante, at sollicitudin libero eros at turpis.&nbsp;Integer maximus ipsum eget ex efficitur interdum. Quisque non risus sit amet felis dapibus mattis. Aenean molestie, sapien et euismod sodales, ex nunc mollis ante, at sollicitudin libero eros at turpis.&nbsp;</p><p>Integer maximus ipsum eget ex efficitur interdum. Quisque non risus sit amet felis dapibus mattis. Aenean molestie, sapien et euismod sodales, ex nunc mollis ante, at sollicitudin libero eros at turpis.&nbsp;Integer maximus ipsum eget ex efficitur interdum. Quisque non risus sit amet felis dapibus mattis. Aenean molestie, sapien et euismod sodales, ex nunc mollis ante, at sollicitudin libero eros at turpis.&nbsp;Integer maximus ipsum eget ex efficitur interdum. Quisque non risus sit amet felis dapibus mattis. Aenean molestie, sapien et euismod sodales, ex nunc mollis ante, at sollicitudin libero eros at turpis.&nbsp;</p>', 'arquitetura-classica13.jpg', 'artigo-tres', 'artigo tres', 'description artigo tres', '<p>Resumo artigo três</p>', 8, 1, 2, 2, 3, 4, '2021-03-02 10:06:48', '2021-03-05 12:30:04'),
(5, 'Titulo 4', '<p>Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.</p>', '<p>Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.</p><h3><strong>Ut in tellus gravida</strong></h3><p>Placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.</p><blockquote><p>Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.</p></blockquote><p>Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam. Nulla viverra odio et erat aliquam, a malesuada odio feugiat.</p>', 'arquitetura-contemporanea12.jpg', 'artigo-4', 'artigo quatro', 'description artigo quatro', '<p>Ut in tellus gravida, placerat nulla vel, venenatis neque. Phasellus porta odio metus, id tempus nulla imperdiet nec. Nunc non mauris quam.&nbsp;</p>', 0, 1, 3, 2, 1, 1, '2021-03-12 13:46:27', '2021-03-12 13:46:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `articles_categories`
--

CREATE TABLE `articles_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `situations_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `articles_categories`
--

INSERT INTO `articles_categories` (`id`, `name`, `situations_id`, `created`, `modified`) VALUES
(1, 'PHP', 2, '2021-03-01 11:50:42', '2021-03-01 11:50:42'),
(2, 'Bootstrap', 2, '2021-03-01 11:50:53', '2021-03-01 11:50:53'),
(3, 'PHP OO', 2, '2021-03-01 11:51:01', '2021-03-01 11:51:09'),
(4, 'CakePHP', 2, '2021-03-01 11:51:39', '2021-03-01 11:51:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `articles_types`
--

CREATE TABLE `articles_types` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `articles_types`
--

INSERT INTO `articles_types` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Público', '2021-03-01 11:49:13', '2021-03-01 11:49:13'),
(2, 'Privado', '2021-03-01 11:49:21', '2021-03-01 11:49:21'),
(3, 'Privado com resumo público', '2021-03-01 11:49:39', '2021-03-01 11:49:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autors_sobs`
--

CREATE TABLE `autors_sobs` (
  `id` int(11) NOT NULL,
  `tittle` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `situations_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `autors_sobs`
--

INSERT INTO `autors_sobs` (`id`, `tittle`, `description`, `situations_id`, `created`, `modified`) VALUES
(1, 'Sobre', '<p>Etiam porta sem<i> malesuada magna</i> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed <strong>consectetur</strong>.</p>', 2, '2021-03-05 10:18:50', '2021-03-05 11:18:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carousels`
--

CREATE TABLE `carousels` (
  `id` int(11) NOT NULL,
  `name_carousel` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `tittle` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tittle_button` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `positions_id` int(11) NOT NULL,
  `colors_id` int(11) NOT NULL,
  `situations_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `carousels`
--

INSERT INTO `carousels` (`id`, `name_carousel`, `image`, `tittle`, `description`, `tittle_button`, `link`, `ordem`, `positions_id`, `colors_id`, `situations_id`, `created`, `modified`) VALUES
(1, 'Slide 1', 'image01.jpg', 'Titulo 1', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'Visualizar', 'http://localhost/cakenovo/', 1, 1, 1, 2, '2021-02-12 13:42:51', '2021-03-04 14:19:25'),
(2, 'Slide 2', 'image02.jpg', '', '', '', '', 2, 3, 1, 2, '2021-02-17 12:44:23', '2021-02-23 13:21:24'),
(3, 'Slide 3', 'combustivel-4.png', '', '', '', '', 3, 3, 1, 2, '2021-02-17 12:45:02', '2021-02-23 13:21:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name_color` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `colors`
--

INSERT INTO `colors` (`id`, `name_color`, `color`, `created`, `modified`) VALUES
(1, 'Padrão', 'acess', '2021-02-12 00:00:00', '2021-02-12 00:30:00'),
(2, 'Verde', 'success', '2021-02-12 00:00:00', NULL),
(3, 'Cinza', 'secondary', '2021-02-12 00:00:00', NULL),
(4, 'Vermelho', 'danger', '2021-02-12 00:00:00', NULL),
(5, 'Amarelo', 'warning', '2021-02-12 00:00:00', NULL),
(6, 'Azul', 'primary', '2021-02-12 00:00:00', NULL),
(7, 'Azul Claro', 'info', '2021-02-12 00:00:00', NULL),
(8, 'Branco', 'light', '2021-02-12 00:00:00', NULL),
(9, 'Preto', 'dark', '2021-02-12 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `cont_message_situation_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `users_id`, `cont_message_situation_id`, `created`, `modified`) VALUES
(1, 'Name', 'email1@email.com', 'Subject', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum scelerisque, magna sit amet fringilla blandit, massa tortor vehicula erat, quis tempor dui lectus eu magna. Aenean elit justo, auctor in ligula id, maximus auctor tortor. \r\n\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer pulvinar tempor laoreet. Vestibulum quis neque at nunc vulputate pretium vitae in mi. Nulla posuere metus nunc, non dapibus elit malesuada ut.', 1, 2, '2021-02-25 10:10:25', '2021-03-01 09:15:11'),
(2, 'Teste 2', 'teste@test.com', 'Assunto', 'lalalallaala', NULL, 1, '2021-02-26 12:13:33', '2021-03-01 08:56:16'),
(3, 'Jubileu', 'email1@email.com', 'Assunto', 'Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem ', NULL, 2, '2021-02-26 14:05:40', '2021-03-01 08:55:32'),
(4, 'Teste 4', 'email10@email.com', 'Assunto', 'Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem Mensagem ', NULL, 3, '2021-02-28 23:31:21', '2021-03-01 08:55:59'),
(5, 'Teste 5', 'email5@gmail.com', 'Subject', 'Mensagem', NULL, 3, '2021-02-28 23:48:57', '2021-03-01 08:55:49'),
(6, 'name', 'email15@email.com', 'Assunto 6', 'Mensagem 6Mensagem 6Mensagem 6Mensagem 6Mensagem 6 Mensagem 6Mensagem 6Mensagem 6Mensagem 6Mensagem 6 Mensagem 6Mensagem 6Mensagem 6', NULL, 1, '2021-03-01 10:27:29', '2021-03-01 10:27:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cont_message_situations`
--

CREATE TABLE `cont_message_situations` (
  `id` int(11) NOT NULL,
  `name_message_situation` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `colors_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cont_message_situations`
--

INSERT INTO `cont_message_situations` (`id`, `name_message_situation`, `colors_id`, `created`, `modified`) VALUES
(1, 'Não lida', 5, '2021-02-25 10:06:32', '2021-02-25 10:11:44'),
(2, 'Aberto', 7, '2021-02-25 10:07:29', '2021-02-25 10:12:00'),
(3, 'Respondido', 2, '2021-02-25 10:07:47', '2021-02-25 10:07:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `depositions`
--

CREATE TABLE `depositions` (
  `id` int(11) NOT NULL,
  `name_dep` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `description_dep` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `video_one` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `video_two` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `video_three` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `depositions`
--

INSERT INTO `depositions` (`id`, `name_dep`, `description_dep`, `video_one`, `video_two`, `video_three`, `created`, `modified`) VALUES
(1, 'Depoimentos', 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.', '<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/hTWKbfoikeg\"                                  frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/hTWKbfoikeg\"                                  frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/hTWKbfoikeg\"                                  frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-02-22 13:49:47', '2021-02-23 09:05:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas_sobs`
--

CREATE TABLE `empresas_sobs` (
  `id` int(11) NOT NULL,
  `tittle` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `ordem` int(11) NOT NULL,
  `situations_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `empresas_sobs`
--

INSERT INTO `empresas_sobs` (`id`, `tittle`, `description`, `image`, `ordem`, `situations_id`, `created`, `modified`) VALUES
(1, 'Sobre a empresa 1', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.', 'image04.jpg', 1, 2, '2021-02-23 11:26:41', '2021-03-12 13:51:07'),
(2, 'Sobre a empresa 2', 'Nullam bibendum ante eu justo varius finibus. Mauris euismod elit ac eleifend dignissim. Quisque mattis suscipit dolor sed lobortis. Vivamus in risus sed urna feugiat viverra hendrerit non orci. In neque diam, ultricies a tempus a, eleifend ut ipsum. Nam venenatis sapien non hendrerit posuere.', 'arquitetura-classica11.jpg', 2, 2, '2021-02-24 11:32:34', '2021-03-12 13:51:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medias_socials`
--

CREATE TABLE `medias_socials` (
  `id` int(11) NOT NULL,
  `tittle` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `situations_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `medias_socials`
--

INSERT INTO `medias_socials` (`id`, `tittle`, `link`, `icon`, `situations_id`, `created`, `modified`) VALUES
(1, 'Facebook', 'https://www.facebook.com', '<i class=\"fab fa-facebook-square\"></i>', 2, '2021-03-05 11:45:44', '2021-03-12 10:05:26'),
(2, 'Instagram', 'https://www.instagram.com', '<i class=\"fab fa-instagram\"></i>', 2, '2021-03-05 13:40:56', '2021-03-12 10:06:19'),
(3, 'Twitter', 'https://www.twitter.com', '<i class=\"fab fa-twitter\"></i>', 2, '2021-03-05 13:58:00', '2021-03-12 10:06:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name_position` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `positions`
--

INSERT INTO `positions` (`id`, `name_position`, `position`, `created`, `modified`) VALUES
(1, 'Direito', 'text-right', '2021-02-12 00:00:00', NULL),
(2, 'Centralizado', 'text-center', '2021-02-12 00:00:00', NULL),
(3, 'Esquerdo', 'text-left', '2021-02-12 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `robots`
--

CREATE TABLE `robots` (
  `id` int(11) NOT NULL,
  `name` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `robots`
--

INSERT INTO `robots` (`id`, `name`, `type`, `created`, `modified`) VALUES
(1, 'Indexar a página e seguir os links', 'index,follow', '2021-03-01 11:44:26', '2021-03-01 11:44:36'),
(2, 'Não indexas as páginas, mas seguir os links', 'noindex,follow', '2021-03-01 11:45:23', '2021-03-01 11:45:23'),
(3, 'Indexar a página, mas não seguir os links', 'index,nofollow', '2021-03-01 11:45:50', '2021-03-01 11:45:50'),
(4, 'Não indexar a página e não seguir os links', 'noindex,nofollow', '2021-03-01 11:46:40', '2021-03-01 11:46:40'),
(5, 'Não exibir a versão em cache da página', 'noarchive', '2021-03-01 11:47:22', '2021-03-01 11:47:22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `tittle_ser` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `icon_one` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tittle_one` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description_one` text COLLATE utf8_unicode_ci NOT NULL,
  `icon_two` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tittle_two` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description_two` text COLLATE utf8_unicode_ci NOT NULL,
  `icon_three` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tittle_three` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description_three` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `tittle_ser`, `icon_one`, `tittle_one`, `description_one`, `icon_two`, `tittle_two`, `description_two`, `icon_three`, `tittle_three`, `description_three`, `created`, `modified`) VALUES
(1, 'Serviços', 'fas fa-plane', 'Serviço um', 'Vamos para praia, para curar a tristeza!', 'fas fa-train', 'Serviço dois', 'As melhores ofertas para você viajar, com as melhores vistas e conforto.', 'fas fa-bus-alt', 'Serviço três', 'Viaje de uma forma mais simples, gastando menos e se divertindo na mesma quantia.', '2021-02-22 09:35:30', '2021-02-22 11:17:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situations`
--

CREATE TABLE `situations` (
  `id` int(11) NOT NULL,
  `name_situation` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `colors_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `situations`
--

INSERT INTO `situations` (`id`, `name_situation`, `colors_id`, `created`, `modified`) VALUES
(1, 'Em análise', 5, '2021-02-12 00:00:00', NULL),
(2, 'Ativo', 2, '2021-02-12 00:00:00', NULL),
(3, 'Inativo', 4, '2021-02-12 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `cod_val_email` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `recuperar_senha` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_val` int(11) NOT NULL DEFAULT 2,
  `image` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `cod_val_email`, `recuperar_senha`, `email_val`, `image`, `created`, `modified`) VALUES
(1, 'Admin', 'email1@email.com', 'username1', '$2y$10$wLyV/TS9Ox52MVZjHjRjaulAUewQKKA5I2.kE1FFqpfkcSlWqkgsK', '', 'e05b9931cb4c0a56c703a6088167f51bacb579ff9467a51306cb47d4774ac2af', 2, 'capa-garagem.jpg', '2021-01-13 16:19:27', '2021-03-02 09:50:42'),
(2, 'Jon jones', 'jon@jon.com', 'jon', '$2y$10$E8BT00d89RcrM4AUx65VkuyXbRZY2h.24N02wLY1FezX2.UDWNDgS', '', '2c9d67d834f2ab403e47c32ad12d18bfe288606c5cd3167419943fa5a3f0cc2a', 2, 'capa-garagem.jpg', '2021-01-19 12:24:03', '2021-03-01 15:05:21'),
(3, 'name 2', 'name2@name.com', 'username2', '$2y$10$JszSuS/RcoTyhtv9yO/RFu6xKvMD7uIuc8p4ErdCBxmkOj4p.8JxG', '', NULL, 2, 'arquitetura-classica06.jpg', '2021-01-19 14:19:07', '2021-03-01 15:03:52');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `articles_categories`
--
ALTER TABLE `articles_categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `articles_types`
--
ALTER TABLE `articles_types`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `autors_sobs`
--
ALTER TABLE `autors_sobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cont_message_situations`
--
ALTER TABLE `cont_message_situations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `depositions`
--
ALTER TABLE `depositions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresas_sobs`
--
ALTER TABLE `empresas_sobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medias_socials`
--
ALTER TABLE `medias_socials`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `robots`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `situations`
--
ALTER TABLE `situations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `articles_categories`
--
ALTER TABLE `articles_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `articles_types`
--
ALTER TABLE `articles_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `autors_sobs`
--
ALTER TABLE `autors_sobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cont_message_situations`
--
ALTER TABLE `cont_message_situations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `depositions`
--
ALTER TABLE `depositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `empresas_sobs`
--
ALTER TABLE `empresas_sobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `medias_socials`
--
ALTER TABLE `medias_socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `robots`
--
ALTER TABLE `robots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `situations`
--
ALTER TABLE `situations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
