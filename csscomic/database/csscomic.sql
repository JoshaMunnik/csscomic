CREATE TABLE `cc_lessons`
(
  `id`           binary(16) NOT NULL,
  `created`      datetime    NOT NULL,
  `modified`     datetime    NOT NULL,
  `user_id`      binary(16) NOT NULL,
  `lesson_index` varchar(48) NOT NULL,
  `lesson_text`  text        NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `cc_users`
(
  `id`                   binary(16) NOT NULL,
  `created`              datetime     NOT NULL,
  `modified`             datetime     NOT NULL,
  `email`                varchar(511) NOT NULL,
  `password`             varchar(100) NOT NULL,
  `password_date`        datetime     NOT NULL,
  `name`                 varchar(128) NOT NULL,
  `administrator`        tinyint(1) NOT NULL,
  `password_reset_date`  datetime    DEFAULT NULL,
  `password_reset_token` varchar(64) DEFAULT NULL,
  `last_visit_date`      datetime    DEFAULT NULL,
  `language_code`        varchar(16)  NOT NULL,
  `account_delete_token` varchar(64) DEFAULT NULL,
  `account_delete_date`  datetime    DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `cc_lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_lesson_index` (`user_id`,`lesson_index`);

ALTER TABLE `cc_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

ALTER TABLE `cc_lessons`
  ADD CONSTRAINT `user_lessons` FOREIGN KEY (`user_id`) REFERENCES `cc_users` (`id`) ON DELETE CASCADE;
