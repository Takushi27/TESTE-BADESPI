-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/08/2025 às 01:30
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_badespi`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `candidaturas`
--

CREATE TABLE `candidaturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `candidatoid` bigint(20) UNSIGNED NOT NULL,
  `vagaid` bigint(20) UNSIGNED NOT NULL,
  `curriculo` mediumblob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(191, '0001_01_01_000000_create_users_table', 1),
(192, '0001_01_01_000001_create_cache_table', 1),
(193, '0001_01_01_000002_create_jobs_table', 1),
(194, '2025_08_01_003930_create_usuarios_table', 1),
(195, '2025_08_01_035314_create_candidaturas_table', 1),
(196, '2025_08_01_214636_create_vagas', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
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
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('QTGzlP10JRyBmBeMLRs08zZnwT1erkB6MBXxZwI1', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoianpJdzNtWlF3ZEFKMkRaeUl2REdLQ3F1TzlIMUgxT3UzSk1KcXJBTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1754694491);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `recrutador` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `email`, `senha`, `recrutador`, `created_at`, `updated_at`) VALUES
(1, 'Teste-Teste', 'teste@gmail.com', '$2y$12$f10GJIicOwb7TYEHD7EDpuFScstDswVDcfKA/p1LPLdGWydCNi5Ky', 'sim', '2025-08-09 01:55:26', '2025-08-09 01:55:26'),
(2, 'Teste-candidato', 'testecandidato@gmail.com', '$2y$12$d.6NQagS70FKnaG4CPfJ5uLmEdxoFtnq066LvAWRX0RlZr8a1uJui', 'não', '2025-08-09 01:55:27', '2025-08-09 01:55:27'),
(3, 'Mrs. Shanon Pfeffer', 'jhoppe@example.org', '$2y$12$Yr8Z3luwRqcbKVvrUFc4.OagPQB2NjDye1j2y37yJ5/jIwq.enUX.', 'não', '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(4, 'Vergie Crooks', 'rbins@example.org', '$2y$12$n3lwJwvL6bDGiuRi4s7Gqe9BZF1FzjjzAcS1JYYQh8N9oJAnYm9rW', 'não', '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(5, 'Candido Gerhold', 'creola.vandervort@example.com', '$2y$12$mWnYgdq4thZAoSupEN6X4OsblVhbFEYuw8mjAkA84FhfCRhO0ycum', 'sim', '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(6, 'Eva Dooley', 'donald.douglas@example.org', '$2y$12$B0uNSe6gGb/qxvEi2XtHVuZXutiivm1em7ITmKYvyabf0qhiSx4oe', 'sim', '2025-08-09 01:55:28', '2025-08-09 01:55:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `descrição` text NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `salario` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `recrutadorid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `vagas`
--

INSERT INTO `vagas` (`id`, `name`, `quantidade`, `tipo`, `descrição`, `empresa`, `salario`, `status`, `recrutadorid`, `created_at`, `updated_at`) VALUES
(1, 'Desenvolvedor Front-End Júnior', 2, 'PJ', 'Estamos em busca de um desenvolvedor front-end júnior com conhecimento em HTML, CSS, JavaScript e frameworks como React ou Vue. Espera-se que o candidato tenha boa comunicação, senso estético e vontade de aprender novas tecnologias.', 'TechNova Soluções Digitais', 3200.00, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:59:12'),
(2, 'Designer Gráfico Freelancer', 3, 'Freelancer', 'Procuramos um designer gráfico criativo para criação de materiais digitais e impressos (posts, banners, e-books). Conhecimentos em Adobe Photoshop, Illustrator e noções de branding são essenciais. A vaga é por projeto, com possibilidade de prorrogação conforme desempenho.', 'Criativando Comunicação', 2000.00, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(3, 'Miss Roma Kunde MD', 39, 'CLT', 'Qui officiis maxime modi.', 'Hodkiewicz, McCullough and Mante', 7343.42, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(4, 'Monique Cummerata', 93, 'PJ', 'Porro expedita doloremque libero quas voluptatibus quas voluptas delectus.', 'Abernathy, Bahringer and Nienow', 2751.07, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(5, 'Prof. Carrie Sauer', 6, 'CLT', 'Qui exercitationem explicabo iure.', 'Schmitt PLC', 8754.44, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(6, 'Prof. Herman Ankunding PhD', 48, 'PJ', 'In et dolore sed vitae deleniti.', 'Glover Inc', 8806.86, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(7, 'Jarret Turner', 60, 'CLT', 'Quam animi exercitationem velit nihil est modi sit.', 'Bode-Rohan', 1061.40, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(8, 'Prof. Bethany Christiansen PhD', 66, 'CLT', 'Quas accusamus odio eligendi nesciunt laboriosam explicabo.', 'Towne Ltd', 5283.17, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(9, 'Miss Shaniya McLaughlin Jr.', 48, 'CLT', 'Cum nam eum ut animi non qui dolores.', 'Wunsch-Baumbach', 5107.67, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(10, 'Jesus Muller', 75, 'PJ', 'Est natus libero inventore enim aut inventore.', 'Block-Glover', 4287.29, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(11, 'Cade Kshlerin I', 40, 'Freelancer', 'Corrupti ut illo sed adipisci nesciunt.', 'Nader, McDermott and Weimann', 7994.39, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(12, 'Dr. Kyra Hilpert', 63, 'PJ', 'Deserunt aspernatur sapiente consectetur voluptas veniam similique optio.', 'Koss, Cole and Bosco', 7843.95, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(13, 'Cicero Murazik', 28, 'CLT', 'Et qui distinctio quasi reiciendis at quas dolore.', 'Harber, Dare and Schmitt', 1763.10, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(14, 'Mrs. Maymie Williamson Sr.', 85, 'Freelancer', 'Odio consectetur est voluptatibus sit.', 'O\'Kon and Sons', 3339.81, 1, 1, '2025-08-09 01:55:28', '2025-08-09 01:55:28'),
(15, 'Analista de Marketing Digital', 5, 'CLT', 'Responsável por planejar, executar e analisar campanhas de marketing digital, gerenciar redes sociais, otimizar SEO e produzir relatórios de desempenho. Necessário conhecimento em ferramentas como Google Ads, Facebook Ads e Google Analytics.', 'Tech Solutions Ltda.', 3500.00, 1, 1, '2025-08-09 01:56:28', '2025-08-09 01:56:28');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `candidaturas`
--
ALTER TABLE `candidaturas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vagas_recrutadorid_foreign` (`recrutadorid`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidaturas`
--
ALTER TABLE `candidaturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `vagas_recrutadorid_foreign` FOREIGN KEY (`recrutadorid`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
