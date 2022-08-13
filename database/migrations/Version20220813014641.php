<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220813014641 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $sql = <<<'SQL'

            CREATE TABLE IF NOT EXISTS `user` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `name` varchar(128) NOT NULL,
                `username` varchar(128) NOT NULL,
                `password_hash` varchar(255) NOT NULL,
                `created_at` int(10) unsigned NOT NULL,
                `updated_at` int(10) unsigned DEFAULT NULL,
                `last_login_at` int(10) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `user_username_idx` (`username`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SQL;
        $this->addSql($sql);

        $sql = <<<'SQL'

            INSERT INTO
                `user` (`id`, `name`, `username`, `password_hash`, `created_at`, `updated_at`, `last_login_at`)
            VALUES
	            (1, 'Test', 'test', '$2y$04$mT9JbvnLeM1l/41HewnKnOXpIBnNeY3C2NPjcERzWpNPvRLPpBxGG', 1658366203, NULL, NULL);
SQL;

        $this->addSql($sql);
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE `user`');
    }
}
