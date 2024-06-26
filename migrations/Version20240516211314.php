<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240516211314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE lastname lastname VARCHAR(50) DEFAULT NULL, CHANGE username username VARCHAR(50) DEFAULT NULL, CHANGE gender gender VARCHAR(50) DEFAULT NULL, CHANGE age age VARCHAR(50) DEFAULT NULL, CHANGE location location VARCHAR(50) DEFAULT NULL, CHANGE competence competence VARCHAR(255) DEFAULT NULL, CHANGE domain domain VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` CHANGE lastname lastname VARCHAR(50) NOT NULL, CHANGE username username VARCHAR(50) NOT NULL, CHANGE gender gender VARCHAR(50) NOT NULL, CHANGE age age VARCHAR(50) NOT NULL, CHANGE location location VARCHAR(50) NOT NULL, CHANGE competence competence VARCHAR(255) NOT NULL, CHANGE domain domain VARCHAR(255) NOT NULL');
    }
}
