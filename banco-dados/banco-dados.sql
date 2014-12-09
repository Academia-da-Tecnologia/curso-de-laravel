-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2014 at 01:08 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `noticias-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_07_25_000608_create_table_categorias', 1),
('2014_07_25_001016_create_table_users', 1),
('2014_07_25_001613_create_table_posts', 1),
('2014_07_25_002250_create_table_comentarios', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_attributes_validate`
--

CREATE TABLE `tb_attributes_validate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tb_attributes_validate_key` varchar(50) DEFAULT NULL,
  `tb_attributes_validate_value` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_attributes_validate`
--

INSERT INTO `tb_attributes_validate` (`id`, `tb_attributes_validate_key`, `tb_attributes_validate_value`) VALUES
(1, 'nova', 'senha nova'),
(2, 'novamente', 'Digite novamente sua senha');

-- --------------------------------------------------------

--
-- Table structure for table `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_categoria_slug` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tb_categoria_nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_categorias`
--

INSERT INTO `tb_categorias` (`id`, `tb_categoria_slug`, `tb_categoria_nome`) VALUES
(6, 'tecnologia', 'Tecnologia'),
(7, 'mundo', 'Mundo'),
(8, 'filmes', 'Filmes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_comentario_post` int(11) NOT NULL,
  `tb_comentario_data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tb_comentario_autor` int(11) DEFAULT NULL,
  `tb_comentario_texto` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`id`, `tb_comentario_post`, `tb_comentario_data`, `tb_comentario_autor`, `tb_comentario_texto`) VALUES
(3, 3, '2014-11-04 00:13:43', 2, 'Esse é meu primeiro comentário.'),
(4, 3, '2014-11-04 00:14:29', 2, 'Esse é meu segundo comentário.'),
(5, 2, '2014-11-04 00:19:46', 2, 'Primeiro comentário desse post.'),
(6, 1, '2014-11-05 23:22:35', 2, 'Primeiro comentario do post.'),
(7, 1, '2014-11-05 23:39:17', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor efficitur risus non cursus. Vestibulum bibendum massa vitae neque volutpat, vel sagittis nibh tincidunt. Vivamus sit amet vehicula nisi. Duis tristique vestibulum augue. Nulla eros arcu, laoreet nec aliquam pellentesque, dictum rhoncus felis. Mauris pharetra quis nisi vehicula sodales. Phasellus ex neque, sagittis et sapien ac, rutrum venenatis odio. Etiam eu tellus diam.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_posts`
--

CREATE TABLE `tb_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_post_titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tb_post_autor` int(11) NOT NULL,
  `tb_post_data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tb_post_foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tb_post_tags` text COLLATE utf8_unicode_ci NOT NULL,
  `tb_post_categoria` int(11) NOT NULL,
  `tb_post_slug` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tb_post_visitas` int(11) NOT NULL,
  `tb_post_thumb` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tb_post_mensagem` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_posts`
--

INSERT INTO `tb_posts` (`id`, `tb_post_titulo`, `tb_post_autor`, `tb_post_data`, `tb_post_foto`, `tb_post_tags`, `tb_post_categoria`, `tb_post_slug`, `tb_post_visitas`, `tb_post_thumb`, `tb_post_mensagem`) VALUES
(3, 'IWatch da Apple pode chegar junto de novos iPhones em setembro', 2, '2014-09-19 00:57:39', 'uploads/posts/8c4395da59842b316ed5ae34d64c609d.jpg', 'iwatch,apple,iphone,teste', 7, 'iwatch-chega-junto-com-iphones', 6, 'uploads/posts/thumbs/8c4395da59842b316ed5ae34d64c609d.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultricies, neque et convallis commodo, sem lorem aliquet libero, eu maximus justo ex a tellus. Nam feugiat mollis sem. Phasellus fermentum cursus nunc ac scelerisque. Praesent malesuada aliquet risus in suscipit. Ut facilisis, nunc sed mollis bibendum, purus lorem facilisis metus, ut blandit nisl tortor non tellus. Pellentesque maximus nunc diam, in fringilla orci maximus id. In quis lacus interdum, accumsan felis sit amet, fringilla metus. Praesent sed diam aliquet, egestas ante a, dictum velit. Vestibulum sed odio eu velit commodo laoreet ac id orci. Donec faucibus bibendum facilisis. Mauris in lobortis ex, at rhoncus ante. Fusce eleifend felis id faucibus molestie. Vestibulum auctor diam at sem sodales viverra.</p>\n<p>Donec nulla turpis, laoreet et tincidunt nec, tristique vitae eros. Sed hendrerit nunc arcu, aliquet volutpat ligula porttitor sit amet. Etiam venenatis vel nulla eget porttitor. Vestibulum commodo porttitor felis, vitae efficitur arcu blandit id. Suspendisse ut lacus purus. Proin egestas lacus sit amet nibh imperdiet varius. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc accumsan, nunc vel suscipit convallis, augue felis bibendum quam, vitae laoreet orci quam ut neque. Nam interdum felis vitae nisl rhoncus, a gravida arcu porta. Nulla laoreet leo vitae tortor commodo ullamcorper. Aenean massa lorem, blandit nec lacus a, consequat cursus nibh. Suspendisse finibus accumsan lorem, non sollicitudin mi euismod suscipit. Mauris vitae erat et ipsum euismod condimentum eget a metus. Phasellus libero augue, mollis a eros vel, accumsan viverra nunc.</p>\n<p>Donec sodales sapien id arcu dapibus, eget porta massa varius. Donec lacinia ligula vitae scelerisque consequat. Nulla luctus consequat massa ac rutrum. Cras mauris ligula, placerat eu massa nec, rutrum laoreet ex. Ut metus purus, scelerisque sit amet erat nec, egestas commodo tellus. In hac habitasse platea dictumst. Duis ac auctor risus. Donec vulputate leo suscipit posuere feugiat.</p>\n<p>Nunc mattis vel nibh eu tincidunt. Aenean eget pulvinar ligula. Aliquam tempus elit a lacinia porta. Quisque ac sodales mi. Sed congue efficitur diam in placerat. Pellentesque aliquam enim et risus varius bibendum. In vel interdum orci. Curabitur dui nisl, dignissim id fermentum vel, pretium sit amet orci. Sed auctor, justo eu volutpat condimentum, nisi velit tincidunt est, nec sodales arcu elit ac ligula. Proin eu consequat tellus, eu rhoncus nisi. Donec facilisis dictum metus, vel consequat diam feugiat id. Nullam commodo nulla sed bibendum varius. Quisque et ex mauris. Sed consectetur est quam, a auctor metus tempus vitae. Suspendisse ante magna, consectetur sed nulla et, ornare vestibulum arcu.</p>\n<p>Nulla non velit volutpat, cursus sem in, maximus ipsum. Sed tempor leo eu dui scelerisque fermentum. Curabitur tempus enim vitae elit malesuada ullamcorper. Nunc dignissim aliquam nulla non aliquet. Donec eleifend libero non dignissim auctor. Nulla dignissim vulputate velit quis bibendum. Aenean eu nisi eget arcu rhoncus lobortis. In egestas hendrerit risus, quis finibus orci varius non.</p>'),
(4, 'Teste de titulo 3', 2, '2014-11-12 00:43:57', 'uploads/posts/e6b23d43f823ceecffe0aa0e2cf52b8a.png', 'palmeiras,campeao,serieb', 8, 'angular-js', 0, 'uploads/posts/thumbs/e6b23d43f823ceecffe0aa0e2cf52b8a.png', '<p>teste</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb_user_nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tb_user_is_admin` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tb_user_foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tb_user_is_autor` int(11) NOT NULL,
  `tb_user_is_admin_geral` int(11) DEFAULT NULL,
  `tb_user_is_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `tb_user_nome`, `username`, `password`, `tb_user_is_admin`, `remember_token`, `tb_user_foto`, `tb_user_is_autor`, `tb_user_is_admin_geral`, `tb_user_is_user`) VALUES
(2, 'Alexandre Cardoso', 'xandecar@hotmail.com', '$2y$10$0Y8lKKr0RPexD6EWDO4O1.D3RxZbEMXQXG37s0wvoLh5Ob75RrtTG', 1, 'eeUhQq3dRjFxGdOsXUGOkR2jVF70QbrOQT8k6xaiSHEwdiFrd7lYmqLX2AFF', 'uploads/users/fcf0347c4e7c122ac8d002f0a012d87d.jpg', 0, 1, 0),
(6, 'Suzana', 'teste@suzana.com.br', '$2y$10$9XVwrrMgMK6JLDRxm2df9uSlwiLE0iGyE9QLcU15fkBrpXyo8LdgG', 1, '', '', 1, 0, 0),
(10, 'Alexandre', 'alecar2007@gmail.com', '$2y$10$dZBBa9/ce./cUtAQ/Ko56u9saU/qHMqyTlmZm/6XM6RMm6Rj9ApHW', 0, '', '', 0, 0, 1);
