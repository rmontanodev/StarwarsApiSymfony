<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230930164032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE characters (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, mass INT NOT NULL, height INT NOT NULL, gender VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movies_characters (id INT AUTO_INCREMENT NOT NULL, movie_id INT DEFAULT NULL, character_id INT DEFAULT NULL, INDEX IDX_6BDFABF88F93B6FC (movie_id), INDEX IDX_6BDFABF81136BE75 (character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movies_characters ADD CONSTRAINT FK_6BDFABF88F93B6FC FOREIGN KEY (movie_id) REFERENCES movies (id)');
        $this->addSql('ALTER TABLE movies_characters ADD CONSTRAINT FK_6BDFABF81136BE75 FOREIGN KEY (character_id) REFERENCES characters (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movies_characters DROP FOREIGN KEY FK_6BDFABF81136BE75');
        $this->addSql('ALTER TABLE movies_characters DROP FOREIGN KEY FK_6BDFABF88F93B6FC');
        $this->addSql('DROP TABLE characters');
        $this->addSql('DROP TABLE movies');
        $this->addSql('DROP TABLE movies_characters');
    }
}
