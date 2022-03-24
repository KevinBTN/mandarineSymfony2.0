<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220324115211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calendrier_de_disponibilite (id INT AUTO_INCREMENT NOT NULL, gite_id_id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_C3008A0A955B6FC0 (gite_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, commentaire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_disponibilite (id INT AUTO_INCREMENT NOT NULL, contact_id_id INT NOT NULL, jour VARCHAR(255) NOT NULL, haure_debut TIME NOT NULL, heure_fin TIME NOT NULL, INDEX IDX_D228DA8526E8E58 (contact_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emplacement (id INT AUTO_INCREMENT NOT NULL, region_id INT UNSIGNED NOT NULL, departement_id INT UNSIGNED NOT NULL, ville_id INT UNSIGNED NOT NULL, INDEX IDX_C0CF65F698260155 (region_id), INDEX IDX_C0CF65F6CCF9E01E (departement_id), INDEX IDX_C0CF65F6A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gite (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gite_option_prix (id INT AUTO_INCREMENT NOT NULL, id_gite_id INT NOT NULL, id_option_id INT NOT NULL, prix INT NOT NULL, INDEX IDX_C6D90D14BBB107EB (id_gite_id), INDEX IDX_C6D90D1427F1A148 (id_option_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE calendrier_de_disponibilite ADD CONSTRAINT FK_C3008A0A955B6FC0 FOREIGN KEY (gite_id_id) REFERENCES gite (id)');
        $this->addSql('ALTER TABLE contact_disponibilite ADD CONSTRAINT FK_D228DA8526E8E58 FOREIGN KEY (contact_id_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE emplacement ADD CONSTRAINT FK_C0CF65F698260155 FOREIGN KEY (region_id) REFERENCES regions (id)');
        $this->addSql('ALTER TABLE emplacement ADD CONSTRAINT FK_C0CF65F6CCF9E01E FOREIGN KEY (departement_id) REFERENCES departments (id)');
        $this->addSql('ALTER TABLE emplacement ADD CONSTRAINT FK_C0CF65F6A73F0036 FOREIGN KEY (ville_id) REFERENCES cities (id)');
        $this->addSql('ALTER TABLE gite_option_prix ADD CONSTRAINT FK_C6D90D14BBB107EB FOREIGN KEY (id_gite_id) REFERENCES gite (id)');
        $this->addSql('ALTER TABLE gite_option_prix ADD CONSTRAINT FK_C6D90D1427F1A148 FOREIGN KEY (id_option_id) REFERENCES `option` (id)');
        $this->addSql('ALTER TABLE cities DROP FOREIGN KEY cities_department_code_foreign');
        $this->addSql('ALTER TABLE cities CHANGE department_code department_code VARCHAR(3) DEFAULT NULL');
        $this->addSql('ALTER TABLE cities ADD CONSTRAINT FK_D95DB16BD50F57CD FOREIGN KEY (department_code) REFERENCES departments (code)');
        $this->addSql('ALTER TABLE departments DROP FOREIGN KEY departments_region_code_foreign');
        $this->addSql('ALTER TABLE departments CHANGE region_code region_code VARCHAR(3) DEFAULT NULL');
        $this->addSql('ALTER TABLE departments ADD CONSTRAINT FK_16AEB8D4AEB327AF FOREIGN KEY (region_code) REFERENCES regions (code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact_disponibilite DROP FOREIGN KEY FK_D228DA8526E8E58');
        $this->addSql('ALTER TABLE calendrier_de_disponibilite DROP FOREIGN KEY FK_C3008A0A955B6FC0');
        $this->addSql('ALTER TABLE gite_option_prix DROP FOREIGN KEY FK_C6D90D14BBB107EB');
        $this->addSql('ALTER TABLE gite_option_prix DROP FOREIGN KEY FK_C6D90D1427F1A148');
        $this->addSql('DROP TABLE calendrier_de_disponibilite');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_disponibilite');
        $this->addSql('DROP TABLE emplacement');
        $this->addSql('DROP TABLE gite');
        $this->addSql('DROP TABLE gite_option_prix');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE cities DROP FOREIGN KEY FK_D95DB16BD50F57CD');
        $this->addSql('ALTER TABLE cities CHANGE department_code department_code VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE insee_code insee_code VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE zip_code zip_code VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cities ADD CONSTRAINT cities_department_code_foreign FOREIGN KEY (department_code) REFERENCES departments (code) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE departments DROP FOREIGN KEY FK_16AEB8D4AEB327AF');
        $this->addSql('ALTER TABLE departments CHANGE region_code region_code VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code code VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE departments ADD CONSTRAINT departments_region_code_foreign FOREIGN KEY (region_code) REFERENCES regions (code) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE regions CHANGE code code VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
