<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260317081929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cat_tournois (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, lib_genre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux (id INT AUTO_INCREMENT NOT NULL, genre_id INT DEFAULT NULL, plateforme_id INT DEFAULT NULL, pegi_id INT DEFAULT NULL, marque_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_3755B50D4296D31F (genre_id), INDEX IDX_3755B50D391E226B (plateforme_id), INDEX IDX_3755B50DDD019E4A (pegi_id), INDEX IDX_3755B50D4827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom_marque VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom_membre VARCHAR(255) NOT NULL, prenom_membre VARCHAR(255) NOT NULL, tel_membre VARCHAR(255) NOT NULL, mail_membre VARCHAR(100) NOT NULL, rue_membre VARCHAR(255) NOT NULL, cp_membre VARCHAR(10) DEFAULT NULL, ville_membre VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, telephone VARCHAR(14) NOT NULL, email VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pegi (id INT AUTO_INCREMENT NOT NULL, age_pegi VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateforme (id INT AUTO_INCREMENT NOT NULL, lib_plateforme VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournoi (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, libelle VARCHAR(40) NOT NULL, date DATETIME NOT NULL, date_creation DATETIME NOT NULL, INDEX IDX_18AFD9DFBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournoi_participant (tournoi_id INT NOT NULL, participant_id INT NOT NULL, INDEX IDX_9C531479F607770A (tournoi_id), INDEX IDX_9C5314799D1C3019 (participant_id), PRIMARY KEY(tournoi_id, participant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DDD019E4A FOREIGN KEY (pegi_id) REFERENCES pegi (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DFBCF5E72D FOREIGN KEY (categorie_id) REFERENCES cat_tournois (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tournoi_participant ADD CONSTRAINT FK_9C531479F607770A FOREIGN KEY (tournoi_id) REFERENCES tournoi (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tournoi_participant ADD CONSTRAINT FK_9C5314799D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D4296D31F');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D391E226B');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DDD019E4A');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D4827B9B2');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DFBCF5E72D');
        $this->addSql('ALTER TABLE tournoi_participant DROP FOREIGN KEY FK_9C531479F607770A');
        $this->addSql('ALTER TABLE tournoi_participant DROP FOREIGN KEY FK_9C5314799D1C3019');
        $this->addSql('DROP TABLE cat_tournois');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE jeux');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE pegi');
        $this->addSql('DROP TABLE plateforme');
        $this->addSql('DROP TABLE tournoi');
        $this->addSql('DROP TABLE tournoi_participant');
    }
}
