<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251127135741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jeux (id INT AUTO_INCREMENT NOT NULL, genre_id INT DEFAULT NULL, plateforme_id INT DEFAULT NULL, pegi_id INT DEFAULT NULL, marque_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_3755B50D4296D31F (genre_id), INDEX IDX_3755B50D391E226B (plateforme_id), INDEX IDX_3755B50DDD019E4A (pegi_id), INDEX IDX_3755B50D4827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom_marque VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, telephone VARCHAR(14) NOT NULL, email VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pegi (id INT AUTO_INCREMENT NOT NULL, age_pegi VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateforme (id INT AUTO_INCREMENT NOT NULL, lib_plateforme VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DDD019E4A FOREIGN KEY (pegi_id) REFERENCES pegi (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D4296D31F');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D391E226B');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DDD019E4A');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D4827B9B2');
        $this->addSql('DROP TABLE jeux');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE pegi');
        $this->addSql('DROP TABLE plateforme');
    }
}
