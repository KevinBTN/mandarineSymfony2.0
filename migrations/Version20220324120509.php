<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220324120509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gite ADD contact_id_id INT NOT NULL, ADD titre VARCHAR(255) NOT NULL, ADD description TINYTEXT NOT NULL, ADD image VARCHAR(255) NOT NULL, ADD animaux TINYINT(1) NOT NULL, ADD animaux_prix INT DEFAULT NULL, ADD tarif_haute_saison INT NOT NULL, ADD tarif_basse_saison INT NOT NULL, ADD emplacement VARCHAR(255) NOT NULL, ADD surface INT NOT NULL, ADD nombre_de_couchages INT NOT NULL, ADD nombre_de_chambres INT NOT NULL');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92C526E8E58 FOREIGN KEY (contact_id_id) REFERENCES contact (id)');
        $this->addSql('CREATE INDEX IDX_B638C92C526E8E58 ON gite (contact_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cities CHANGE department_code department_code VARCHAR(3) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE insee_code insee_code VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE zip_code zip_code VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE commentaire commentaire VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact_disponibilite CHANGE jour jour VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE departments CHANGE region_code region_code VARCHAR(3) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code code VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92C526E8E58');
        $this->addSql('DROP INDEX IDX_B638C92C526E8E58 ON gite');
        $this->addSql('ALTER TABLE gite DROP contact_id_id, DROP titre, DROP description, DROP image, DROP animaux, DROP animaux_prix, DROP tarif_haute_saison, DROP tarif_basse_saison, DROP emplacement, DROP surface, DROP nombre_de_couchages, DROP nombre_de_chambres');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `option` CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE regions CHANGE code code VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
