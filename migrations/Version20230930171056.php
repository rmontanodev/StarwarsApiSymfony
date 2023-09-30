<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230930171056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movies_characters DROP FOREIGN KEY FK_6BDFABF88F93B6FC');
        $this->addSql('CREATE TABLE Movie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, director VARCHAR(255) NOT NULL, releaseDate DATE NOT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE movies');
        $this->addSql('ALTER TABLE movies_characters DROP FOREIGN KEY FK_6BDFABF88F93B6FC');
        $this->addSql('ALTER TABLE movies_characters ADD CONSTRAINT FK_6BDFABF88F93B6FC FOREIGN KEY (movie_id) REFERENCES Movie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movies_characters DROP FOREIGN KEY FK_6BDFABF88F93B6FC');
        $this->addSql('CREATE TABLE movies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE Movie');
        $this->addSql('ALTER TABLE movies_characters DROP FOREIGN KEY FK_6BDFABF88F93B6FC');
        $this->addSql('ALTER TABLE movies_characters ADD CONSTRAINT FK_6BDFABF88F93B6FC FOREIGN KEY (movie_id) REFERENCES movies (id)');
    }
}
